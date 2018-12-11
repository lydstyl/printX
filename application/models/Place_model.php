<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    
    class Place_model extends CI_Model { 
        public function add($name) 
        { 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                INSERT INTO places (
                        name 
                    )
                    VALUES (
                        "' . $name . '"
                );
            '); 
        }     
    }