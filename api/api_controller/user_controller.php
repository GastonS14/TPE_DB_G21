<?php
    require_once ('./api_model/user_model.php');
    require_once ('./api_view/user_view.php');
    
    class user_controller{
        private $model;
        private $view;

        function __construct(){
            $this->model = new user_model();
            $this->view = new user_view();
        }

        public function get_top_user_events(){
            $users = $this->model->get_top_users_events();
            $this->view->show_top_users($users);
        }       

    }
