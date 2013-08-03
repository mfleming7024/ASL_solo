<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

    function add_user() {
        $new_user_insert_data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'email' => $this->input->post('email'),
        );

        $this->db->insert('users', $new_user_insert_data);
                              
        return $new_user_insert_data;
    }
    
    function get_contacts($activeUser) {
    	$data = array("userId != " => $activeUser);
    	$this->db->where($data);
        $query = $this->db->get('users');
        return $query;
    }
    
    function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $query = $this->db->query("Select * from users where username= '" . $username . "' and password='" . $password ."'");   
        $row = $query->row_array();   
        
        return $row;
    }
    
    function get_userId($username="") {
	    $sql = "Select userId from users where username = '" . $username . "'";
	    
	    $query = $this->db->query($sql);
	    $row = $query->row_array();
	    
	    return $row;
    }
    
    function get_username($userId) {
	    $sql = "Select username from users where userId = '" . $userId . "'";
	    
	    $query = $this->db->query($sql);
	    
	    if (!isset($query)) {
		   	$row = null;
	   	} else {
			$row = $query->row_array();
	   	}
	    
	    return $row;
    }
    
    function get_messages($from, $to) {
	   	$sql =  "select message, senderId, recieverId, date from messages where (senderId = " . $from . " and recieverId = " . $to . ") or (senderId = " . $to . " and recieverId = " . $from . ")";

	    
	   	$query = $this->db->query($sql);
	   	
	   	if (!isset($query)) {
		   	$row = null;
	   	} else {
		   	$row = $query->result_array();
	   	}
	    
	    return $row;
    }
    
    function send_message($from, $to, $message) {
    	
    	date_default_timezone_set('America/New_York');
    
    	$messageData = array(
    	 	'message' => $message,
            'senderId' => $from,
            'recieverId' => $to,
            'date' => date("Y-m-d H:i:s"),
        );

        $this->db->insert('messages', $messageData);   
    }
    
    function delete_messages($from, $to) {
    	$data = array(
    		"senderId" => $from,
    		"recieverId" => $to
    	);
    	return $data;
	    /*
$this->db->where($data);
	    $this->db->delete("messages");
*/
    }

}
















