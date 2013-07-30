<?php
class Delete_model extends CI_Model{

    function delete($id)
    {
        $this->db->where('userId', $id);
        $this->db->delete('users');
    }

    function album_delete($id)
    {
        $this->db->where('albumId', $id);
        $this->db->delete('album');
    }
}