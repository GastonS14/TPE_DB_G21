<?php
    
    class user_model{

        private $db;
        function __construct(){
            $this->db = new PDO('postgresql:host=dbases.exa.unicen.edu.ar;'.'dbname=cursada;charset=utf8', 'root', '');
        }

        public function get_top_users_events(){
            $sentence = $this->db->prepare("SELECT * FROM g21_top_usuarios_events");
            $sentence->execute();
            return $sentence->fetchAll(PDO::FETCH_OBJ);
        }

    } 