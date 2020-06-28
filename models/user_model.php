<?php
    
    class user_model{

        private $db;
        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=local;charset=utf8', 'root', '');
        }

        public function get_user($email){
            $sentence = $this->db->prepare("SELECT * FROM g21_usuario WHERE email=?");
            $sentence->execute(array($email));
            return $sentence->fetch(PDO::FETCH_OBJ);
        }

        public function get_login_user($email){
            $sentence = $this->db->prepare("SELECT * FROM g21_usuario WHERE email=?");
            $sentence->execute(array($email));
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

        public function add_user($id_usuario, $nombre, $apellido, $email, $password, $id_permiso){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sentence= $this->db->prepare("INSERT INTO g21_usuario (id_usuario, nombre, apellido, email, password, id_permiso) VALUES (?,?,?,?,?,?)");
            $sentence->execute(array($id_usuario, $nombre, $apellido, $email, $hash, $id_permiso));
        }

        public function get_users(){
            $sentence = $this->db->prepare("SELECT * FROM g21_usuario");
            $sentence->execute();
            return $sentence->fetchAll(PDO::FETCH_OBJ);
        }

        public function update_user($email,$id_permiso){
            $sentence =$this->db->prepare("UPDATE g21_usuario SET id_permiso=? WHERE email=?");
            $sentence->execute(array($id_permiso, $email));
            return $sentence->fetchAll(PDO::FETCH_OBJ);
        }

        //NOT USED
        /*public function delete_user($email){
            $sentence = $this->db->prepare("DELETE FROM g21_usuario WHERE email=?");
            $sentence->execute(array($email));
        }*/

        /*
        //optimization
        public function search_user($email){
            $sentence = $this->db->prepare("SELECT email FROM usuario WHERE email=?");
            $sentence->execute(array($email));
            return $sentence->fetch(PDO::FETCH_OBJ);
        }*/
    } 