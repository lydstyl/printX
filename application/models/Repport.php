<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
 
    class Repport extends CI_Model { 
        public function getTable1($customerId) 
        { 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
            SELECT e.identification_number Matricule_materiel, p.name Batiment, f.name Etage, d.name Service, e.situation Situation, t.name Type, b.name Marque, m.brand_ref Reference
            FROM equipments e
            LEFT JOIN models m ON e.model_id = m.id
            LEFT JOIN brands b ON m.brand_id = b.id
            LEFT JOIN types t ON m.type_id = t.id
            LEFT JOIN places p ON e.place_id = p.id
            LEFT JOIN floors f ON e.floor_id = f.id
            LEFT JOIN departments d ON e.department_id = d.id
            LEFT JOIN customers c ON e.customer_id = c.id
            WHERE c.id = '. $customerId
            ); 
            $fromBdd = $query->result_array(); 
            return $fromBdd;
        }    
    }