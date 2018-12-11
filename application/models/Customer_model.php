<?php
    class Customer_model extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        public function get(){
            $this->db->select('id');
            $this->db->select('name');
            $this->db->from('customers');

            $query = $this->db->get();

            return $customerList = $query->result();
        }
        public function add($data){
            $this->db->insert('customers', $data);
        }
        public function del($id){
            $this->db->delete('customers', array('id' => $id));
        }
        public function edit($data){
            $this->db->replace('customers', $data);
        }
        public function getName($customerId) 
        { 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                SELECT `name` FROM `customers` WHERE `id` = ' . $customerId
            ); 
            $fromBdd = $query->result_array(); 
            return $fromBdd[0]['name'];
        }
}