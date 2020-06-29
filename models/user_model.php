<?php
    
    class user_model{

        private $db;
        function __construct(){
            //$this->db = new PDO('mysql:host=localhost;'.'dbname=local;charset=utf8', 'root', '');
            $this->db = new PDO('pgsql:host=localhost;'.'dbname=postgres;port=5432 user=postgres password=petit1415');
        }

        public function get_user($e_mail){
            $sentence = $this->db->prepare("SELECT * FROM g21_usuario WHERE e_mail=?");
            $sentence->execute(array($e_mail));
            return $sentence->fetch(PDO::FETCH_OBJ);
        }

        public function get_login_user($e_mail){
            $sentence = $this->db->prepare("SELECT * FROM g21_usuario WHERE e_mail=?");
            $sentence->execute(array($e_mail));
            return $sentence->fetchAll(PDO::FETCH_OBJ);
        }

        public function get_id_permiso($permiso){
            $sentence = $this->db->prepare("SELECT id_permiso FROM permisos WHERE permiso=?");
            $sentence->execute(array($permiso));
            return $sentence->fetchAll(PDO::FETCH_OBJ);
        }

        public function get_permisos(){
            $sentence = $this->db->prepare("SELECT * FROM g21_permisos");
            $sentence->execute();
            return $sentence->fetchAll(PDO::FETCH_OBJ);
        }

        public function add_user($id_usuario, $nombre, $apellido, $e_mail, $password, $id_permiso){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sentence= $this->db->prepare("INSERT INTO g21_usuario (id_usuario, nombre, apellido, e_mail, password, id_permiso) VALUES (?,?,?,?,?,?)");
            $sentence->execute(array($id_usuario, $nombre, $apellido, $e_mail, $hash, $id_permiso));
        }

        public function get_users(){
            $sentence = $this->db->prepare("SELECT * FROM g21_usuario");
            $sentence->execute();
            return $sentence->fetchAll(PDO::FETCH_OBJ);
        }

        public function get_e_mail_usuarios(){
        $sentence = $this->db->prepare("SELECT e_mail FROM g21_usuario");
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

        public function update_user($e_mail,$id_permiso){
            $sentence =$this->db->prepare("UPDATE g21_usuario SET id_permiso=? WHERE e_mail=?");
            $sentence->execute(array($id_permiso, $e_mail));
            return $sentence->fetchAll(PDO::FETCH_OBJ);
        }

        /*
        //optimization
        public function search_user($email){
            $sentence = $this->db->prepare("SELECT email FROM usuario WHERE email=?");
            $sentence->execute(array($email));
            return $sentence->fetch(PDO::FETCH_OBJ);
        }*/
    } 