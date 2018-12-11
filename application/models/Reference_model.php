<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    
    class Reference_model extends CI_Model {   
        public function get($modelId){ 
            $this->db->select('*');
            $this->db->from('models');
            $this->db->where('id', $modelId);

            $query = $this->db->get();
            return $query->row();
        }     

        public function getTable()
        {
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                SELECT m.id Ref_ID, t.name Type, b.name Marque, m.brand_ref Reference
                FROM models m
                LEFT JOIN brands b ON m.brand_id = b.id
                LEFT JOIN types t ON m.type_id = t.id
            '); 
            $fromBdd = $query->result_array(); 
            return $fromBdd;
        }

        public function del($refId){
            $this->db->where('id', $refId);
            $this->db->delete('models');
        }    

        public function duplicate($refId){ 
            $this->load->database(); 
            $query = $this->db->query('
                INSERT INTO models (type_id, brand_id, brand_ref)
                SELECT m.type_id, m.brand_id, "new"
                FROM models m
                WHERE id = '. $refId
            ); 
        } 
    }