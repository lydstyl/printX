<?php

    class Auth_model extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function getUserAndPassword($user, $pass) {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where(array('username'=>$user, 'password'=>$pass));

            $query = $this->db->get();
            return $user = $query->row();   
        }

        public function createNewUser($data){
            $this->db->insert('users',$data);
        }
    }
?>