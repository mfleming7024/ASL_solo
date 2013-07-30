<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_album_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function add_album(){

        $this->load->database();
        
        if ($this->input->post("album_name") == null || $this->input->post("album_name") == "") {
	         $data = array(
	         	'albumName'=>"Default Album",
	         	'userId'=>$this->input->post('id'),
            );
        } else {
	        $data = array(
	        	'albumName'=>$this->input->post('album_name'),
	        	'userId'=>$this->input->post('id'),
            );
        }
        
       
        $this->db->where('userId' ,$this->input->post('id'));
        $this->db->insert('album',$data);
    }

    function get($id){
        $query = $this->db->get_where('users', array('userId' => $id));
        $result = $query->row_array();
        return $result;
       // echo $result;
    }

    function get2(){
        $query2 = $this->db->query("SELECT * FROM album;");

        return $query2;
        foreach($query2->result() as $row){
        }
    }

}