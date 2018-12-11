<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repports extends CI_Controller {
	public function index()
	{
		if (!empty($_GET['customerId'])) {
			$customerId = $_GET['customerId'];
		}else{
			$customerId = FALSE;
			echo '<br>IL MANQUE UN CUSTOMER ID POUR AFFICHER LE RAPPORT !<br><br><br>';
		}

		$this->load->model('printer_model');  
		$fromBdd = $this->printer_model->getTable1WithId($customerId);
		$fromBdd = json_encode($fromBdd);

		$data = array(
			'pageTitle' => 'Rapports',
			'mainClass' => 'repports',

			'customerId' => $customerId,
			'fromBdd' => $fromBdd
		);
		$this->load->view('repports', $data);
	}
}
