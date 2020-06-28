<?php

require_once ("api/api_views/json_view.php");
    class api_controller{

        protected $data;
        private $view;
        private $model; 

        public function __construct() {
            $this->view = new json_view();
            $this->data = file_get_contents("php://input"); 
            $this->model = new game_model();
        }
        
        public function response($data, $status) {
            header("Content-Type: application/json");
            header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
            echo json_encode($data);
        }

        private function _requestStatus($code){
            $status = array(
              200 => "OK",
              404 => "Not found",
              500 => "Internal Server Error"
            );
            return (isset($status[$code]))? $status[$code] : $status[500];
        }

        public function get_data(){ 
            return json_decode($this->data); 
        }  

    }