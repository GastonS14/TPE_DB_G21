<?php
    require_once ('./models/user_model.php');
    require_once ('./views/user_view.php');
    require_once ('./helpers/auth_helper.php');
    
    class user_controller{
        private $model;
        private $view;
        private $auth_helper;

        function __construct(){
            $this->model = new user_model();
            $this->view = new user_view();
            $this->auth_helper = new auth_helper();
        }

        public function get_user($params=null){
            $this->auth_helper->check_login();
            $e_mail = $params[':ID'];
            $user = $this->model->get_user($e_mail);
            $this->view->show_user($user);
        }

        public function get_users(){
            $this->auth_helper->check_login();
            if($this->auth_helper->get_logged_id_permiso()==1){
                $users = $this->model->get_users();
                $this->view->show_users($users, $_SESSION['permiso']);
            }else
                header("Location: " . game);    
        }

        public function update_user($params=null){
            $this->auth_helper->check_login();
            if($this->auth_helper->get_logged_id_permiso()==1){
                $e_mail = $params[':ID'];
                $user = $this->model->get_login_user($e_mail);
                $permisos = $this->model->get_permisos();
                $this->view->show_update_user($user, $permisos, $_SESSION['permiso']);
            }else
                header("Location: " . user);
        }
        
        public function save_update_user(){
            $this->auth_helper->check_login();
            if($this->auth_helper->get_logged_id_permiso()==1){
                $e_mail = $_POST['e_mail'];
                $permiso = $_POST['permiso'];
                if($permiso == 'Administrador')
                    $id_permiso = 1;
                else if($permiso == 'Registrado')
                    $id_permiso = 2;
                else
                    $id_permiso=3;
                $save= $_POST['save'];
                if(isset($save))
                    if(!empty($e_mail))
                        $this->model->update_user($e_mail, $id_permiso);
            }    
            header("Location: " . user);
        }

        public function delete_user($params=null){
            $this->auth_helper->check_login();
            if($this->auth_helper->get_logged_id_permiso()==1){
                $e_mail= $params[':ID'];
                $this->model->delete_user($e_mail);
            }
            header('Location: ' . user);
        }

        public function login(){
            $this->view->show_login();
        }

        public function logout(){
            $this->auth_helper->logout();
            header("Location: " . login);
        }

        public function login_verify(){
            $id_usuario = $_POST['id_usuario'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $e_mail = $_POST['e_mail'];
            $pass = $_POST['password'];
            if(isset($_POST['register'])){//REGISTRAR
                if(!empty($id_usuario) && !empty($nombre) && !empty($apellido) && !empty($e_mail) && !empty($pass)){//trajo todos los datos
                    $user_data = $this->model->get_user($e_mail);//existe en la base?
                    if($user_data == null){//si no existe -> registrarlo
                        $id_permiso = 2;
                        $this->model->add_user($id_usuario, $nombre, $apellido, $e_mail, $pass, $id_permiso);
                        $user_data = $this->model->get_user($e_mail);
                        $this->auth_helper->login($user_data);
                        header("Location: " . evento);
                    }else
                        $this->view->show_login("Usted ya posee una cuenta");
                }
                else
                    $this->view->show_login("Complete todos los datos por favor");
            }else if(isset($_POST['login'])){//LOGUEAR
                if(!empty($e_mail) && !empty($pass)){
                    $user_data = $this->model->get_user($e_mail);
                    if(!empty($user_data)){
                        if(password_verify($pass, $user_data->password)){
                            $this->auth_helper->login($user_data);
                            header("Location: " . evento);
                        }else
                            $this->view->show_login("Contraseña incorrecta");
                    }else
                        $this->view->show_login("Usuario no existente");
                }else{
                    $this->view->show_login("Faltan datos, completelos por favor");
                }
            }else{//INVITADO
                $id_permiso = 3;
                $this->auth_helper->invited_login($id_permiso);
                $this->auth_helper->check_login();
                header("Location: " . evento);
            }
        }
    }