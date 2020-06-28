<?php
require_once ('./models/category_model.php');
require_once ('./views/category_view.php');
require_once ('./helpers/auth_helper.php');

class category_controller{
    private $model;
    private $view;

    function __construct(){
        $this->model = new category_model();
        $this->view = new category_view();
        $this->auth_helper = new auth_helper();
    }

    public function get_categories(){
        $this->auth_helper->check_login();
        $categories = $this->model->get_categories();
        $this->view->show_categories($categories, $_SESSION['permiso']);
    }

    public function delete_category($params=null){
        $this->auth_helper->check_login();
        if($this->auth_helper->get_logged_id_permiso()==1 || $this->auth_helper->get_logged_id_permiso()==2){
            $id = $params [':ID'];
            $this->model->delete_category($id);
        }
        header("Location: " . category);
    }

    public function add_category(){
        $this->auth_helper->check_login();
        $this->view->add_category($_SESSION['permiso']);
    }

    public function update_category($params=null){
        $this->auth_helper->check_login();
        if($this->auth_helper->get_logged_id_permiso()==1 || $this->auth_helper->get_logged_id_permiso()==2){
            $id_categoria = $params[':ID'];
            $category = $this->model->get_category($id_categoria);
            $this->view->show_update_category($category, $_SESSION['permiso']);
        }else
            header("Location: " . category);    
    }

    public function save_update_category(){
        $this->auth_helper->check_login();
        $id_categoria = $_POST['id_categoria'];
        $nombre_categoria = $_POST['nombre_categoria'];
        $save = $_POST['save'];
        if((isset($save))&&(!empty($id_categoria)) && (!empty($nombre_categoria)))
            $old_id_categoria = $this->model->get_category($id_categoria, $nombre_categoria);
            $this->model->update_category($id_categoria, $nombre_categoria);
        header("Location: " . category);
    }
    
    public function save_category(){
        $this->auth_helper->check_login();
        $id_categoria = $_POST['id_categoria'];
        $nombre_categoria = $_POST['nombre_categoria'];
        $save = $_POST['save'];
        if(isset($save))
            if((!empty($id_categoria)) && (!empty($nombre_categoria)))
                $this->model->add_category($id_categoria, $nombre_categoria);
        header("Location: " . category);
    }


    //SUBCATEGORY
    public function save_subcategory(){
        $this->auth_helper->check_login();
        $id_categoria = $_POST['id_categoria'];
        $id_subcategoria = $_POST['id_subcategoria'];
        $nombre_subcategoria = $_POST['nombre_subcategoria'];
        $save = $_POST['save'];
        if(isset($save))
            if((!empty($id_categoria)) && (!empty($id_subcategoria)) && (!empty($nombre_subcategoria)))
                $this->model->add_subcategory($id_categoria, $id_subcategoria, $nombre_subcategoria);
        header("Location: " . category);
    }

    public function add_subcategory($params=null){
        $this->auth_helper->check_login();
        $id_categoria = $params[':ID'];
        $this->view->add_subcategory($_SESSION['permiso'], $id_categoria);
    }

    public function get_subcategories($params=null){
        $this->auth_helper->check_login();
        $id_categoria= $params[':ID'];
        $subcategories = $this->model->get_subcategories($id_categoria);
        $this->view->show_subcategories($subcategories, $_SESSION['permiso']);
    }

    public function delete_subcategory($params=null){
        $this->auth_helper->check_login();
        if($this->auth_helper->get_logged_id_permiso()==1 || $this->auth_helper->get_logged_id_permiso()==2){
            $id_categoria = $params [':ID'];
            $id_subcategoria = $params [':IG'];
            $this->model->delete_subcategory($id_categoria, $id_subcategoria);
        }
        header("Location: " . category);
    }


    //----------------------------------------------------------


}