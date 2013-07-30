<?php

class Upload_model extends CI_Model{

    public function insert_file($filename)
    {
        $data = array(
            'name'=> $filename,
            'albumId'=>$this->input->post('id'),

        );
        $this->db->where('albumId' ,$this->input->post('id'));
        $this->db->insert('images',$data);
    }
    function get($id){
        $query = $this->db->get_where('images', array('albumId' => $id));
        $result = $query->row_array();
        return $result;
    }

    function get2(){
        $query2 = $this->db->query("SELECT * FROM images;");

        return $query2;
        foreach($query2->result() as $row){
        }
    }

    function get3($id){
        $query = $this->db->get_where('album', array('albumId' => $id));
        $result = $query->row_array();
        return $result;
    }
}