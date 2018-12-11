<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller { 

        public function profile(){
            if($_SESSION['user_logged'] == FALSE){
                $this->session->set_flashdata("error", "Vous devez être connecté  pour accéder à cette page.");
                redirect("index.php/auth/login");
            }
            
            $data = array(
				'pageTitle' => 'Profil',
                'mainClass' => 'profile',
                
			);
			$this->load->view('profile', $data);
        }
    }
?>