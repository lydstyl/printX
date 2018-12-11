<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('customer_model');
	}

	public function index() {
		$customersList = $this->customer_model->get();
		$data = array(
			'pageTitle' => 'Clients',
			'mainClass' => 'customers',
			'customersList' => $customersList
		);
		$this->load->view('customer/customers', $data);
	}
	public function add() {
		if (!empty($_GET['form']) && $_GET['form'] == 'add') { // we want to go to the form to create a new customer
			$data = array(
				'pageTitle' => 'Ajouter un client',
				'mainClass' => 'addCustomer',
				'formAction' => base_url('index.php/customer/add'),
				'customerName' => ''
			);
			$this->load->view('customer/form', $data);
			return;
		}
		$cutomerUrl = base_url('index.php/customer');
		if (!empty($_POST["name"])) { // we want to add to database the customer
			$data = array(
				'name'=>$_POST['name'],                   
			);
			$this->customer_model->add($data);
			redirect($uri = $cutomerUrl, $method = 'auto', $code = NULL);
		}else{  // we want to see the list of customers
			redirect($uri = $cutomerUrl, $method = 'auto', $code = NULL);
		}
	}
	public function del(){
		if (!empty($_GET['customerId'])) {
			$this->customer_model->del($_GET['customerId']);
			redirect($uri = base_url('index.php/customer'), $method = 'auto', $code = NULL);
		}
	}
	public function edit(){
		if (!empty($_GET['form']) && $_GET['form'] == 'edit') { // we want to go to the form to edit a customer
			$data = array(
				'pageTitle' => 'Éditer un client',
				'mainClass' => 'editCustomer',
				'formAction' => base_url('index.php/customer/edit') . '?customerId=' . $_GET['customerId'],
				'customerName' => $_GET['customerName']
			);
			$this->load->view('customer/form', $data);
			return;	
		}
		if (!empty($_GET['customerId'])) { // we want to edit the customer in the database
            $data = array(
				'id' => $_GET['customerId'],
				'name'  => $_POST['name']
			);
			$this->customer_model->edit($data);
			redirect($uri = base_url('index.php/customer'), $method = 'auto', $code = NULL);
		}
	}
}
