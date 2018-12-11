<?php
    class Forms_model extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function createNewCustomer($data){
            $this->db->insert('customers', $data);
        }

        public function getCustomerList(){
            $this->db->select('name');
            $this->db->from('customers');

            $query = $this->db->get();

            return $customerList = $query->result();
        }

        public function getCustomerIdFromName($name){
            $this->db->select('id');
            $this->db->from('customers');
            $this->db->where('name', $name);

            $query = $this->db->get();

            return $customerId = $query->row();
        }

        public function getCustomerInfos($customerName){
            $id = $this->forms_model->getCustomerIdFromName($customerName);
            $id = $id->id;

            $this->db->select('*');
            $this->db->from('equipments');
            $this->db->where('customer_id', $id);

            $query = $this->db->get();
            
            return $customerInfos = $query->result();
        }

        public function getTypes(){
            $this->db->select('*');
            $this->db->from('types');

            $query = $this->db->get();
            
            return $customerInfos = $query->result();
        }

        public function createNewType($typeName){
            $data = array(
                'name' => $typeName
            );

            $this->db->insert('types', $data);
        }

        public function getTypeIdFromTypeName($typeName){
            $this->db->select('id');
            $this->db->from('types');
            $this->db->where('name', $typeName);

            $query = $this->db->get();

            return $typeId = $query->row()->id;
        }

        public function getBrands(){
            $this->db->select('*');
            $this->db->from('brands');

            $query = $this->db->get();
            
            return $customerInfos = $query->result();
        }

        public function createNewBrand($brandName){
            $data = array(
                'name' => $brandName
            );

            $this->db->insert('brands', $data);
        }

        public function getBrandIdFromBrandName($brandName){
            $this->db->select('id');
            $this->db->from('brands');
            $this->db->where('name', $brandName);

            $query = $this->db->get();

            return $brandId = $query->row()->id;
        }

        // in case of a new name for any table
        public function insertName($name, $tableName){
            $data = array(
                'name' => $name // eg batiment A, 3 ième étage, etc.
            );
            $this->db->insert($tableName, $data); // can be places, floors, etc.
        }
        public function getIdFromName($name, $tableName){
            $this->db->select('id');
            $this->db->from($tableName);
            $this->db->where('name', $name);
            $query = $this->db->get();
            return $brandId = $query->row()->id;
        }

        public function getModels(){
            $this->db->select('*');
            $this->db->from('models');

            $query = $this->db->get();
            
            return $modelsInfos = $query->result();
        }

        public function getModelInfosFromId($id){
            $this->db->select('*');
            $this->db->from('models');
            $this->db->where('id', $id);

            $query = $this->db->get();
            
            return $modelInfos = $query->row();
        }

        public function createNewModel($brandRef, $brandId, $typeId){
            $data = array(
                'brand_ref' => $brandRef,
                'brand_id' => $brandId,
                'type_id' => $typeId
            );

            $this->db->insert('models', $data);
        }

        public function editModel($modelId, $brandRef, $brandId, $typeId){
            $data = array(
                'brand_ref' => $brandRef,
                'brand_id' => $brandId,
                'type_id' => $typeId
            );
            $this->db->where('id', $modelId);
            $this->db->update('models', $data);
        }

        public function getPlaces(){
            $this->db->select('*');
            $this->db->from('places');

            $query = $this->db->get();
            
            return $customerInfos = $query->result();
        }

        public function getFloors(){
            $this->db->select('*');
            $this->db->from('floors');

            $query = $this->db->get();
            
            return $customerInfos = $query->result();
        }

        public function getDepartments(){
            $this->db->select('*');
            $this->db->from('departments');

            $query = $this->db->get();
            
            return $customerInfos = $query->result();
        }

    }
?>