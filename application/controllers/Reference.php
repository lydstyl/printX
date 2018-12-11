<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reference extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->load->model('reference_model');
        
        if (empty($_GET['do'])) {
            // we get data from database to show the table
            $fromBdd = $this->reference_model->getTable();
            $fromBdd = json_encode($fromBdd);
            
            $data = array(
                'pageTitle' => 'Références',
                'mainClass' => 'reference',
                'fromBdd' => $fromBdd // data for Table
            );
            $this->load->view('printer/reference', $data);
        }else{
            switch ($_GET['do']) {
            case 'add':
                $this->add();
                break;
            case 'del':
                $this->del();
                break;
            case 'duplicate':
                $this->duplicate();
                break;
            case 'edit':
                $this->edit();
                break;
            default:
                echo "Action GET do non connue";
            }
        }
    }
    public function add(){
        $this->load->model('forms_model');
        // Get infos from DB
        $allTypes = $this->forms_model->getTypes();
        $allBrands = $this->forms_model->getBrands();
        
        $baseData = array(
            'allTypes' =>  $allTypes,
            'allBrands' => $allBrands
        );
        
        if (empty($_POST['type']) && empty($_POST['brand']) && empty($_POST['reference'])) {
            // we will see the table of all references
            $pageData = array(
                'pageTitle' => 'Ajout d\'une référence',
                'mainClass' => 'addReference',
                'action' => base_url('index.php/reference/add'),
            );
            $data = array_merge($baseData, $pageData);
            $this->load->view('printer/referenceForm', $data);
        }else {
            $newRefTypeId =  $_POST['type'];
            $newBrandId =  $_POST['brand'];
            $newRefName = $_POST['reference'];
            $addType = $_POST['addType'];
            $addBrand = $_POST['addbrand'];

            if($newRefTypeId == 0 && $addType){
                // Adding a new type in BDD
                $this->forms_model->createNewType($addType);
                // Set the current newRefTypeId with that new entry
                $newRefTypeId = $this->forms_model->getTypeIdFromTypeName($addType);
            }

            if($newBrandId == 0 && $addBrand){
                // Adding a new brand in BDD
                $this->forms_model->createNewBrand($addBrand);
                // Set the current newRefBrandId with that new entry
               $newBrandId = $this->forms_model->getBrandIdFromBrandName($addBrand);
            }

            //Check if we have a type, brand and ref and if it's and edit
            if(isset($_GET['refId']) && $newRefTypeId && $newBrandId && $newRefName){
                $modelId = $_GET['refId'];
                // Edit that ref in BDD
                $this->forms_model->editModel($modelId, $newRefName, $newBrandId, $newRefTypeId);
            }else if($newRefTypeId && $newBrandId && $newRefName){
                // Add that ref in BDD
                $this->forms_model->createNewModel($newRefName, $newBrandId, $newRefTypeId);
            }

            redirect("/index.php/reference", "refresh");
        }
    }
    
    public function del(){
        $this->load->model('reference_model');
        $this->reference_model->del($_GET['refId']);
        redirect("/index.php/reference", "refresh");
    }
    public function duplicate(){
        $this->load->model('reference_model');
        $this->reference_model->duplicate($_GET['refId']);
        redirect("/index.php/reference", "refresh");
    }
    public function edit(){
        $this->load->model('forms_model');
        
        // if we come frome the edit button, we get the type, brand and ref data
        $refId = $_GET['refId'];
        $allTypes = $this->forms_model->getTypes();
        $allBrands = $this->forms_model->getBrands();
        $modelInfos = $this->forms_model->getModelInfosFromId($refId);
        $editingRefTypeId = $modelInfos->type_id;
        $editingRefBrandId = $modelInfos->brand_id;
        $editingReference = $modelInfos->brand_ref;

        // and we go to the form
        $data = array(
            'pageTitle' => 'Edition d\'une référence',
            'mainClass' => 'editReference',
            'action' => base_url('index.php/reference/add'). '?refId=' . $refId,
            'refid' => $refId,
            'allTypes' => $allTypes,
            'allBrands' => $allBrands,
            'editingRefTypeId' => $editingRefTypeId,
            'editingRefBrandId' => $editingRefBrandId,
            'editingReference' => $editingReference
        );

        $this->load->view('printer/referenceForm', $data);
    }
}
