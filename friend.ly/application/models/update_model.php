<?php

class Update_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function update_users(){

        $this->load->database();

        $data = array(
            'lastname'=>$this->input->post('lastname'),
            'firstname'=>$this->input->post('firstname'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'email'=>$this->input->post('email'),
            'notes'=>$this->input->post('notes'),

        );
        $this->db->where('userId' ,$this->input->post('id'));
        $this->db->update('users',$data);

    }

    function get($id){
        $this->load->database();
        $query = $this->db->get_where('users', array('userId' => $id));
        return $query->row_array();
    }

    function entry_insert(){
        $this->load->database();
        $data = array(
            'lastname'=>$this->input->post('lastname'),
            'firstname'=>$this->input->post('firstname'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'email'=>$this->input->post('email'),
            'notes'=>$this->input->post('notes'),
        );
        $this->db->insert('users',$data);
    }

}