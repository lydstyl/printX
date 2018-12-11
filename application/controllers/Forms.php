<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Forms extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('forms_model');
		}

		public function index() {
			
			$data = array(
				'pageTitle' => 'Gestions des dossiers et données clients',
				'mainClass' => 'forms'
			);
			$this->load->view('forms', $data);
		}

		public function newCustomer() {
			if (isset($_POST['registerCustomer'])){
				$this->session->set_flashdata("success", null, "error", null);
                $this->form_validation->set_rules('customerName','Nom du client', 'required');
            
                if($this->form_validation->run() == TRUE){
                    $data = array(
                        'name'=>$_POST['customerName'],                   
                    );

                    $user = $this->forms_model->createNewCustomer($data);
                    
                    $this->session->set_flashdata("success", "Succès");
                }
			}else{
				$this->session->set_flashdata("error", "Erreur.");
			}
			
			$data = array(
				'pageTitle' => 'Création d\'un nouveau client',
				'mainClass' => 'forms'
			);
			$this->load->view('newCustomer', $data);
		}

		public function selectClient() {
			
			// Get the customers list from DB
			$customersList = $this->forms_model->getCustomerList();

			if (isset($_POST['customerChosen'])){
				// Reset error an success messages
				$this->session->set_flashdata("success", null, "error", null);

				// Define required fields
				$this->form_validation->set_rules('customerName','Nom du client', 'required');
            
                if($this->form_validation->run() == TRUE){

					$_SESSION['customerName'] = $_POST['customerName'];

					redirect("/index.php/Forms/showCustomerForm", "refresh");
                }else{
					$this->session->set_flashdata("error", "");
				}
			}

			$data = array(
				'pageTitle' => 'Reprendre le dossier de...',
				'mainClass' => 'forms',
				'customersList' => $customersList
			);

			$this->load->view('selectClient', $data);
		}

		public function showCustomerForm() {
			// Get infos from DB
			$customerInfos = $this->forms_model->getCustomerInfos($_SESSION['customerName']);
			
			$data = array(
				'pageTitle' => 'Dossier de '. $_SESSION['customerName'],
				'mainClass' => 'forms',
				'customerName' => $_SESSION['customerName'],
				'customerInfos' => $customerInfos
			);

			$this->load->view('showCustomerForm', $data);  
		}

		public function addPrinter() {
			// Get infos from DB
			$types = $this->forms_model->getTypes();
			$brands = $this->forms_model->getBrands();
			$models = $this->forms_model->getModels();
			$places = $this->forms_model->getPlaces();
			$floors = $this->forms_model->getFloors();
			$departments = $this->forms_model->getDepartments();

			$data = array(
				'pageTitle' => 'Ajouter une machine',
				'mainClass' => 'forms',
				'types' => $types,
				'brands' => $brands,
				'models' => $models,
				'places' => $places,
				'floors' => $floors,
				'departments' => $departments
			);

			$this->load->view('addPrinter', $data);  
		}
	}
?>
