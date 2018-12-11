<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printer extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('customer_model');
	}
	public function index() {
		if (!empty($_GET['customerId'])){
			$customerId = $_GET['customerId'];
			$this->load->model('printer_model');  
			if (!empty($_POST['postType'])) {
				// we come from the equipment form
				if($_POST['place'] == 0 || $_POST['floor'] == 0 || $_POST['department'] == 0){
					$this->load->model('forms_model');
					if($_POST['addPlace']){
						$this->forms_model->insertName($_POST['addPlace'], 'places'); // Adding in DB
						$_POST['place'] = $this->forms_model->getIdFromName($_POST['addPlace'], 'places');
					}
					if($_POST['addFloor']){
						$this->forms_model->insertName($_POST['addFloor'], 'floors');
						$_POST['floor'] = $this->forms_model->getIdFromName($_POST['addFloor'], 'floors');
					}
					if($_POST['addDepartment']){
						$this->forms_model->insertName($_POST['addDepartment'], 'departments');
						$_POST['department'] = $this->forms_model->getIdFromName($_POST['addDepartment'], 'departments');
					}
				}	
				if ($_POST['postType'] == 'add') {
					// we come from the ADD equipment form
					if (!empty($_POST['username'])) { 
						$this->load->model('printer_model');  
						$types = $this->printer_model->add(
							$_GET['customerId'], 
							$_POST['username'], 
							$_POST['model'], 
							$_POST['department'], 
							$_POST['situation'], 
							$_POST['place'], 
							$_POST['floor']
						);
					}
					// we get data from database
					$fromBdd = $this->printer_model->getTable1WithId($customerId); // width equipement id (eid)
					$fromBdd = json_encode($fromBdd);
					$data = array(
						'pageTitle' => 'Equipement du client id = '. $customerId,
						'mainClass' => 'customers',
						'customerId' => $customerId,
						'fromBdd' => $fromBdd // data for Table
					);
					$this->load->view('printer/printers', $data);
				} elseif (($_POST['postType']  == 'edit')) {
					// we come from the EDIT equipment form
					if (!empty($_POST['username'])) { 
						$this->load->model('printer_model');  
						$types = $this->printer_model->edit(
							$_POST['equipmentId'], 
							$_GET['customerId'], 
							$_POST['username'], 
							$_POST['model'], 
							$_POST['department'], 
							$_POST['situation'], 
							$_POST['place'],
							$_POST['floor']
						);
					}
					// we get data from database
					$fromBdd = $this->printer_model->getTable1WithId($customerId); // width equipement id (eid)
					$fromBdd = json_encode($fromBdd);
					$data = array(
						'pageTitle' => 'Equipement du client id = '. $customerId,
						'mainClass' => 'customers',
						'customerId' => $customerId,
						'fromBdd' => $fromBdd // data for Table
					);
					$this->load->view('printer/printers', $data);
				} else {
					// there is a problem
					echo 'Error : on est dans le else';
				}
			}
			if (empty($_POST['postType'])) {
				// we come from a LINK to see customer equipment
				// we get data from database
				$fromBdd = $this->printer_model->getTable1WithId($customerId); // width equipement id (eid)
				$fromBdd = json_encode($fromBdd);
				$data = array(
					'pageTitle' => 'Equipement du client id = '. $customerId,
					'mainClass' => 'customers',
					'customerId' => $customerId,
					'fromBdd' => $fromBdd // data for Table
				);
				$this->load->view('printer/printers', $data);
			}
		} else{
			echo 'Il manque le customerId dans l\'url';
		}
	}
	public function add() {
		if (!empty($_GET['customerId'])){
			$customerId = $_GET['customerId'];

			$this->load->model('customer_model');  
			$customerName = $this->customer_model->getName($customerId);
			
			$this->load->model('forms_model');  
			$types = $this->forms_model->getTypes();
			$brands = $this->forms_model->getBrands();
			$models = $this->forms_model->getModels();

			$this->load->model('reference_model');
			$refsWithBrand = $this->reference_model->getTable();

			$places = $this->forms_model->getPlaces();
			$floors = $this->forms_model->getFloors();
			$departments = $this->forms_model->getDepartments();

			$actionUrl = base_url('index.php/printer') . '?customerId=' . $customerId;

			$data = array(
				'pageTitle' => 'Ajout d\'un équipement pour le client ' . $customerName,
				'mainClass' => 'printerForm',
				'types' => $types,
				'brands' => $brands,
				'models' => $models,
				'refsWithBrand' => $refsWithBrand,
				'places' => $places,
				'floors' => $floors,
				'departments' => $departments,

				'actionUrl' => $actionUrl,
				'postType' => 'add'
			);
			$this->load->view('printerForm', $data);
		} else{
			echo 'Il manque le customerId dans l\'url';
		}
	}
	public function duplicate(){
		if (!empty($_GET['equipementId'])){
			$this->load->model('printer_model');  
			$fromBdd = $this->printer_model->duplicate($_GET['equipementId']);
			if (!empty($_GET['customerId'])){
				$url = base_url('index.php/printer?customerId=' . $_GET['customerId']); 
				redirect($uri = $url, $method = 'auto', $code = NULL); 		
			}else{
				echo 'Il manque le customerId dans l\'url';
			}
		}else{
			echo 'Il manque l\'equipementId dans l\'url';
		}
	}
	public function edit(){
		if (!empty($_GET['equipementId'])){
			$equipmentId = $_GET['equipementId'];

			$this->load->model('printer_model');  
			$customerId = $this->printer_model->getCustomerId($equipmentId);
			$equipment = $this->printer_model->get($equipmentId);
			$modelId = $equipment['model_id'];
			$equipment = json_encode($equipment);
			
			$this->load->model('reference_model');  
			$reference = $this->reference_model->get($modelId);
			$typeId = $reference->type_id;
			$brandId = $reference->brand_id;

			$this->load->model('customer_model');  
			$customerName = $this->customer_model->getName($customerId);
			
			$this->load->model('forms_model');  
			$types = $this->forms_model->getTypes();
			$brands = $this->forms_model->getBrands();
			$models = $this->forms_model->getModels();
			$this->load->model('reference_model');
			$refsWithBrand = $this->reference_model->getTable();
			$places = $this->forms_model->getPlaces();
			$floors = $this->forms_model->getFloors();
			$departments = $this->forms_model->getDepartments();
			
			$actionUrl = base_url('index.php/printer') . '?customerId=' . $customerId;
			

			$data = array(
				'pageTitle' => 'Édition d\'un équipement pour le client ' . $customerName,
				'mainClass' => 'printerForm',
				'types' => $types,
				'brands' => $brands,
				'models' => $models,
				'refsWithBrand' => $refsWithBrand,
				'places' => $places,
				'floors' => $floors,
				'departments' => $departments,
				'actionUrl' => $actionUrl,
				'postType' => 'edit',
				'equipment' => $equipment,
				'modelId' => $modelId,
				'typeId' => $typeId,
				'brandId' => $brandId,
				'equipmentId' => $equipmentId
			);
			
			$this->load->view('printerForm', $data);
		}else{
			echo 'Il manque l\'equipementId dans l\'url';
		}
	}
	public function del(){
		if (!empty($_GET['equipementId'])){
			$this->load->model('printer_model');  
			$fromBdd = $this->printer_model->del($_GET['equipementId']);
			if (!empty($_GET['customerId'])){
				$url = base_url('index.php/printer?customerId=' . $_GET['customerId']); 
				redirect($uri = $url, $method = 'auto', $code = NULL); 		
			}else{
				echo 'Il manque le customerId dans l\'url';
			}
		}else{
			echo 'Il manque l\'equipementId dans l\'url';
		}
	}
}
