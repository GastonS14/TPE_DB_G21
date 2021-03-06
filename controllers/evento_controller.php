<?php
    require_once ('./models/evento_model.php');
    require_once ('./views/evento_view.php');
    require_once ('./helpers/auth_helper.php');
    require_once ('category_controller.php');

    class evento_controller{
        private $model;
        private $view;
        private $auth_helper;
        private $category_controller;

        function __construct(){
            $this->model = new evento_model();
            $this->user_model = new user_model();
            $this->view = new evento_view();
            $this->auth_helper = new auth_helper();
        }

        public function get_eventos(){
            $this->auth_helper->check_login();
            $eventos = $this->model->get_eventos();
            $this->view->show_eventos($eventos, $_SESSION['permiso']);
        }

        public function get_ediciones_evento($params=null){
            $this->auth_helper->check_login();
            $id_evento = $params[':ID'];
            $ediciones_evento = $this->model->get_ediciones_evento($id_evento);
            $this->view->show_ediciones_evento($ediciones_evento, $_SESSION['permiso']);
        }

        public function add_evento(){
            $this->auth_helper->check_login();
            $distritos = $this->model->get_distritos();
            $usuarios = $this->user_model->get_e_mail_usuarios();
            $subcategorias = $this->model->get_subcategorias();
            $this->view->add_evento($_SESSION['permiso'], $distritos, $usuarios, $subcategorias);
        }

        public function save_evento(){
            $this->auth_helper->check_login();
            $id_evento = $_POST['id_evento'];
            $nombre_evento = $_POST['nombre_evento'];
            $descripcion_evento = $_POST['descripcion_evento'];
            //split atributo multiple
            $split_subcategoria = $_POST['id_categoria/id_subcategoria'];
            $split = explode("/", $split_subcategoria);
            $id_categoria = $split[0];
            $id_subcategoria = $split[1];
            $e_mail = $_POST['e_mail'];
            $id_distrito = $_POST['id_distrito'];
            $dia_evento = $_POST['dia_evento'];
            $mes_evento = $_POST['mes_evento'];
            $repetir = $_POST['repetir'];
            $save = $_POST['save'];   
            if(isset($save))
                if((!empty($id_evento)) && (!empty($nombre_evento)) && (!empty($descripcion_evento)) && (!empty($dia_evento)) && (!empty($mes_evento)) && (!empty($repetir))){
                    $user = $this->user_model->get_user($e_mail);
                    $this->model->add_evento($id_evento, $nombre_evento, $descripcion_evento, $id_categoria, $id_subcategoria, $user->id_usuario, $id_distrito, $dia_evento, $mes_evento, $repetir);
                } 
            header("Location: " . evento);
        }

        public function get_top_users(){
            $this->auth_helper->check_login();
            $top_users = $this->model->get_top_users();
            $this->view->show_top_users($top_users, $_SESSION['permiso']);
        }

        public function get_last_event_first_tri(){
            $this->auth_helper->check_login();
            $last_event = $this->model->get_last_event_first_tri();
            $this->view->show_last_event($last_event, $_SESSION['permiso']);
        }

        public function get_count_event_distrito(){
            $this->auth_helper->check_login();
            $distrito_count = $this->model->get_count_event_distrito();
            $this->view->show_distrito_count($distrito_count, $_SESSION['permiso']);
        }

        public function get_categories_subcategories_events(){
            $this->auth_helper->check_login();
            $categories_subcategories_events = $this->model->get_categories_subcategories_events();
            $this->view->show_categories_subcategories_events($categories_subcategories_events, $_SESSION['permiso']);
        }

        public function update_evento($params=null){
            $this->auth_helper->check_login();
            if($this->auth_helper->get_logged_id_permiso()==1 || $this->auth_helper->get_logged_id_permiso()==2){
                $id_evento = $params[':ID'];
                $evento = $this->model->get_evento($id_evento);
                $distritos = $this->model->get_distritos();
                $usuarios = $this->user_model->get_e_mail_usuarios();
                $subcategorias = $this->model->get_subcategorias();
                $this->view->show_update_evento($evento, $distritos, $usuarios, $subcategorias, $_SESSION['permiso']);
            }else
                header("Location: " . evento);
        }

        public function save_update_evento($params=null){
            $this->auth_helper->check_login();
            $id_evento = $_POST['id_evento'];
            $nombre_evento = $_POST['nombre_evento'];
            $descripcion_evento = $_POST['descripcion_evento'];
             //split atributo multiple
            $split_subcategoria = $_POST['id_categoria/id_subcategoria'];
            $split = explode("/", $split_subcategoria);
            $id_categoria = $split[0];
            $id_subcategoria = $split[1];;
            $e_mail = $_POST['email'];
            $id_distrito = $_POST['id_distrito'];
            $dia_evento = $_POST['dia_evento'];
            $mes_evento = $_POST['mes_evento'];
            $repetir = $_POST['repetir'];
            $save= $_POST['save'];
            if(isset($save)){
                $user = $this->user_model->get_user($e_mail);
                if((!empty($id_evento)) && (!empty($nombre_evento)) && (!empty($descripcion_evento)) && (!empty($dia_evento)) && (!empty($mes_evento)) && (!empty($repetir))){
                    echo '/ '.$id_evento.'/ '.$nombre_evento.'/ '.$descripcion_evento.'/ '.$id_categoria.'/ '.$id_subcategoria.'/ '.$user->id_usuario.'/ '.$id_distrito.'/ '.$dia_evento.'/ '.$mes_evento.'/ '.$repetir.'////';
                    $this->model->update_evento($id_evento, $nombre_evento, $descripcion_evento, $id_categoria, $id_subcategoria, $user->id_usuario, $id_distrito, $dia_evento, $mes_evento, $repetir);
                }
            }
            header("Location: " . evento);
        }

        //---------------------------------------------------------------
        
        public function add_ejvento(){
            $this->auth_helper->check_login();
            if($this->auth_helper->get_logged_id_permiso() == 1 || $this->auth_helper->get_logged_id_permiso() == 2){
                $categories = $this->cat_model->get_categories();
                $current_date = strftime("%Y-%m-%d-%H-%M-%S", time());
                $this->view->add_evento($categories, $_SESSION['permiso']);
            }
            header('Location: ' . game);
        }
        
        public function delete_game($params=null){
            $this->auth_helper->check_login();
            if($this->auth_helper->get_logged_id_permiso()==1){
                $id= $params[':ID'];
                $this->model->delete_game($id);
            }    
            header('Location: ' . game);
        }

    
        public function sorted_games($params=null){
            $this->auth_helper->check_login();
            $categoria = $params[':ID'];
            $game = $this->model->get_sorted_games($categoria);
            $this->view->show_game($game, $_SESSION['permiso']);
        }

        

        
        
    }

