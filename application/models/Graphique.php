<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Graphique extends CI_Model { 
        public function return_json() 
        { 
                // TODO renomer variables, description des fonctions
                $this->load->database(); 
                $query = $this->db->query('SELECT * FROM ingredient'); 
                
                $fromBdd = $query->result_array(); 
                
                return $fromBdd;
        }    
}