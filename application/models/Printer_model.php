<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    
    class Printer_model extends CI_Model { 
        public function add(
            $customer_id, 
            $identification_number, 
            $modelId,
            $departmentId,
            $situation,
            $place_id,
            $floorId
        ){ 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            // INSERT INTO table_name (column1, column2, column3, ...)
            // VALUES (value1, value2, value3, ...);
            $query = $this->db->query('
                INSERT INTO equipments (
                        customer_id, 
                        identification_number,
                        model_id,
                        department_id,
                        situation,
                        place_id,
                        floor_id
                    )
                    VALUES (
                        "' . $customer_id . '", 
                        "' . $identification_number . '",
                        "' . $modelId . '",
                        "' . $departmentId . '",
                        "' . $situation . '",
                        "' . $place_id . '",
                        "' . $floorId . '"
                );'
            ); 
        }    
        public function edit(
            $equipmentId,
            $customer_id, 
            $identification_number, 
            $modelId,
            $departmentId,
            $situation,
            $place_id,
            $floorId
        ){ 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                UPDATE equipments
                SET 
                    customer_id = "' . $customer_id . '", 
                    identification_number = "' . $identification_number . '", 
                    model_id = "' . $modelId . '", 
                    department_id = "' . $departmentId . '", 
                    situation = "' . $situation . '", 
                    place_id = "' . $place_id . '", 
                    floor_id = "' . $floorId . '"
                WHERE id = "' . $equipmentId . '";
            ');
        }    
        public function getTable1WithId($customerId) 
        { 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                SELECT e.id Id_Equipement, e.identification_number Matricule_materiel, p.name Batiment, f.name Etage, d.name Service, e.situation Situation, t.name Type, b.name Marque, m.brand_ref Reference
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
        public function duplicate($equipementId) 
        { 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                INSERT INTO equipments (customer_id, identification_number, model_id, department_id, situation, place_id, floor_id)
                SELECT e.customer_id, e.identification_number, e.model_id, e.department_id, e.situation, e.place_id, e.floor_id
                FROM equipments e
                WHERE id = '. $equipementId
            ); 
        }    
        public function del($equipementId) 
        { 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                DELETE FROM `equipments` WHERE `equipments`.`id` = '. $equipementId
            ); 
        }    
        public function getCustomerId($equipementId) 
        { 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                SELECT customer_id FROM `equipments` WHERE id = ' . $equipementId
            ); 
            $fromBdd = $query->result_array(); 
            return $fromBdd[0]['customer_id'];
        }    
        public function get($equipementId) 
        { 
            $this->load->database(); 
            // TODO améliorer la sécurité en utilisant les méthodes Codeigniter plutot que la requete SQL brute
            $query = $this->db->query('
                SELECT * FROM `equipments` WHERE id = ' . $equipementId
            ); 
            $fromBdd = $query->result_array(); 
            // var_dump($fromBdd);
            return $fromBdd[0];
        }    
    }