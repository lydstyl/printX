<?php
    class Situation_model extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        public function delete($table, $id){
            $this->db->delete($table, array('id' => $id));
        }
    }
?>