<?php

class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        //$this->authenticate();
        $this->load->helper(array('form', 'url'));
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('http://friend.ly');
    }

    function authenticate()
    {
        if (!$this->session->userdata('is_logged_in'))
        {
            redirect('home/require_login');
        }
    }

    function perform_register(){
        $this->load->library('form_validation');

        //fieldname , errormessage, validation rules
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email');


        if($this->form_validation->run() == FALSE)
        {
			$data['main'] = 'home';
			$data["error"] = "Unsuccessful login";
			
            $this->load->view('includes/template', $data);
        }else{
            $this->load->model('user_model');
            
           $user = $this->user_model->add_user();       

           $userId = $this->user_model->get_userId($user["username"]);
           
           $userData = array(
           		"userId" => $userId["userId"],
           		"username" => $user["username"],
           		"password" => $user["password"]
           	);
           	
           $this->session->set_userdata($userData);
           
           redirect('user/application');
        }
    }
    
    function application() {
    	$this->load->model("user_model");
		$data["main"] = "application";
        $contactList = $this->user_model->get_contacts($this->session->userdata("userId"));
    	$data["contacts"] = $contactList;
    	            	
        $this->load->view("includes/template", $data);    
    }
    
    function login() {
    	$this->load->model("user_model");
    	$result = $this->user_model->login();
    	
    	if (!isset($result) || is_null($result)) {
	    	$data["message"] = "Invalid Username or Password";
	    	$data["main"] = "home";
	 
	        $this->load->view("includes/template", $data);
    	} else {
	    	$contactList = $this->user_model->get_contacts($result["userId"]);
	    	$data["contacts"] = $contactList;
	    	
		    $userData = array(
	       		"userId" => $result["userId"],
	       		"username" => $result["username"],
	       		"password" => $result["password"]
	       	);
	       	
	       	$this->session->set_userdata($userData);
	
			$data["main"] = "application";
	            	
	        $this->load->view("includes/template", $data);   
	   } 
    }
    
    function chat($id) {
    	$this->load->model("user_model");
    	
    	$messages = $this->user_model->get_messages($this->session->userdata("userId"), $id);
    	$data["messages"] = $messages;
    	
    	$reciever = $this->user_model->get_username($id);
    	$data["username"] = $reciever;
    	
    	$contactList = $this->user_model->get_contacts($this->session->userdata("userId"));
    	$data["contacts"] = $contactList;
    	
    	$data["main"] = "application";
            	
    	$this->load->view("includes/template", $data);  
    }
    
    function message($recieverUsername) {
	    $this->load->model("user_model");
	    
	    $message = $this->input->post("message");
	    $recieverId = $this->user_model->get_userId($recieverUsername);
	    $senderId = $this->session->userdata("userId");

	    $this->user_model->send_message($senderId, $recieverId["userId"], $message);
	    redirect("/user/chat/" . $recieverId["userId"]);
    }
    
    function delete($recieverId) {
	    $this->load->model("user_model");
	    
	    $senderId = $this->session->userdata("userId");

	    $result = $this->user_model->delete_messages($senderId, $recieverId);
	    
	    var_dump($result);
/* 	    redirect("/user/chat/" . $recieverId["userId"]); */

    }

}
