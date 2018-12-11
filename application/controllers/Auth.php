<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Auth extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('auth_model');
        }

        public function login(){

            // Required fields for log in
            $this->form_validation->set_rules('username','Username', 'required');
            $this->form_validation->set_rules('password','Password', 'required|min_length[8]');
            
            // If correct form, query DB to check if user  exist
            if($this->form_validation->run() == TRUE){
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $user = $this->auth_model->getUserAndPassword($username, $password);            

                // User found => redirect to profile
                if(isset($user->username)){
                    $this->session->set_flashdata("success", "Vous êtes connecté !");

                    $_SESSION['user_logged'] = TRUE;
                    $_SESSION['username'] = $user->username;
                    //TODO : Créer içi une variable de rang (modération / droits / restrictions)

                    redirect("/index.php/home", "refresh");
                }else{
                    $this->session->set_flashdata("error", "Ce compte n'existe pas.");
                    redirect("/index.php/auth/login", "refresh");
                }
                
            }

            $this->load->view('login');
        }

        public function register(){
            if (isset($_POST['register'])){
                $this->form_validation->set_rules('username','Nom d\'utilisateur', 'required');
                $this->form_validation->set_rules('email','Email', 'required|valid_email');
                $this->form_validation->set_rules('password','Mot de passe', 'required|min_length[5]');
                $this->form_validation->set_rules('password','Confirmation du mot de passe', 'required|min_length[8]|matches[password]');
            
                if($this->form_validation->run() == TRUE){
                    $data = array(
                        'username'=>$_POST['username'],
                        'email'=>$_POST['email'],
                        'password'=>md5($_POST['password'])                      
                    );

                    $user = $this->auth_model->createNewUser($data);
                    
                    $this->session->set_flashdata("success", "Votre compte a été créé et validé avec succès ! <br />Vous pouvez desormais vous connecter.");
                    redirect("index.php/auth/login", "refresh");
                }
            }

            $this->load->view('register');
        }

        public function logout(){
            unset($_SESSION);
            session_destroy();
            redirect("/index.php/auth/login", "refresh");
        }
    }

?>