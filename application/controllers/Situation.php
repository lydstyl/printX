<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Situation extends CI_Controller {
		public function __construct() {
			parent::__construct();
		}
		public function index() {
			$data = array(
				'pageTitle' => 'Accueil',
				'mainClass' => 'home'
			);
			$this->load->view('home', $data);
        }
        public function remove(){
            $table = $_GET['table'];
            $id = $_GET['theId'];
            $this->load->model('situation_model');
            $this->situation_model->delete($table, $id);
        }
}
