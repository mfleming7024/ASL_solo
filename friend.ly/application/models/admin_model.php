<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = md5($this->input->post('password'));

        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        // Run the query
        $query = $this->db->get_where('users');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {

            if($query){

                $result = $query->result_array();
                $usertype = $result[0]['userType'];
                $uid = $usertype;

                $userId = $result[0]['userId'];
                $usId = $userId;

                $lastn = $result[0]['lastname'];
                $last = $lastn;

                $firstn = $result[0]['firstname'];
                $first = $firstn;

                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => true,
                    'userType' => $uid,
                    'userId' => $usId,
                    'lastname' => $last,
                    'firstname' => $first
                );

                $this->session->set_userdata($data);
                return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
        }
     }

    function get(){

        $query = $this->db->query("SELECT * FROM users;");

        return $query;
        foreach ($query->result('User') as $row)
        {

        }

    }
    public function usertype(){
       $this->load->database();

        $this->db->select('userType');
        $this->db->where('userType');
        $query = $this->db->get('users');

        return $query->result();

    }
    function sessions(){
        $data = array(

         'session_id'=> randomhash,
         'ip_address'=>'string - user IP address',
         'user_agent'=> 'string - user agent data',
         'last_activity'=> timestamp
        );

        $this->db->insert('ci_sessions',$data);
    }
}
?>