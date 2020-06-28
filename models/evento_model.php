<?php

    class evento_model{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=local;charset=utf8', 'root', '');
    }

    public function get_eventos(){
        $sentence = $this->db->prepare("SELECT * FROM g21_evento");
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_ediciones_evento($id_evento){
        $sentence = $this->db->prepare( "SELECT * FROM g21_evento_edicion WHERE id_evento=?");
        $sentence->execute(array($id_evento));
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_distritos(){
        $sentence = $this->db->prepare("SELECT id_distrito FROM g21_distrito");
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_usuarios(){
        $sentence = $this->db->prepare("SELECT email FROM g21_usuario");
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

   public function get_user($email){
        $sentence = $this->db->prepare("SELECT * FROM g21_usuario WHERE email=?");
        $sentence->execute(array($email));
        return $sentence->fetch(PDO::FETCH_OBJ);
    }

    public function get_subcategorias(){
        $sentence = $this->db->prepare("SELECT id_categoria, id_subcategoria FROM g21_subcategoria");
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    public function add_evento($id_evento, $nombre_evento, $descripcion_evento, $id_categoria, $id_subcategoria, $id_usuario, $id_distrito, $dia_evento, $mes_evento, $repetir){
        if($id_distrito == null){
            $sentence = $this->db->prepare("INSERT INTO g21_evento(id_evento, nombre_evento, descripcion_evento, id_categoria, id_subcategoria, id_usuario, dia_evento, mes_evento, repetir) VALUES(?,?,?,?,?,?,?,?,?,)");
            $sentence->execute(array($id_evento, $nombre_evento, $descripcion_evento, $id_categoria, $id_subcategoria, $id_usuario, $id_distrito, $dia_evento, $mes_evento, $repetir));
        }else{
            $sentence = $this->db->prepare("INSERT INTO g21_evento(id_evento, nombre_evento, descripcion_evento, id_categoria, id_subcategoria, id_usuario, id_distrito, dia_evento, mes_evento, repetir) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $sentence->execute(array($id_evento, $nombre_evento, $descripcion_evento, $id_categoria, $id_subcategoria, $id_usuario, $id_distrito, $dia_evento, $mes_evento, $repetir));
        }
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    /*public function add_category($id_categoria, $nombre_categoria){
        $sentence = $this->db->prepare("INSERT INTO g21_categoria(id_categoria, nombre_categoria) VALUES(?,?)");
        $sentence->execute(array($id_categoria, $nombre_categoria));
    }*/

     public function get_evento($id_evento){
        $sentence = $this->db->prepare("SELECT * FROM g21_evento WHERE id_evento=?");
        $sentence->execute(array($id_evento));
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

     public function update_evento($id_evento, $nombre_evento, $descripcion_evento, $id_categoria, $id_subcategoria, $id_usuario, $id_distrito, $dia_evento, $mes_evento, $repetir){
        echo '/ model '.$id_evento.'/ '.$nombre_evento.'/ '.$descripcion_evento.'/ '.$id_categoria.'/ '.$id_subcategoria.'/ '.$id_usuario.'/ '.$id_distrito.'/ '.$dia_evento.'/ '.$mes_evento.'/ '.$repetir.'////';
        $sentence = $this->db->prepare("UPDATE g21_evento SET nombre_evento=?, descripcion_evento=?, id_categoria=?, id_subcategoria=?, id_usuario=?, $id_distrito=?, dia_evento=?, mes_evento=?, repetir=? WHERE id_evento=?");
        $sentence->execute(array($id_evento, $nombre_evento, $descripcion_evento, $id_categoria, $id_subcategoria, $id_usuario, $id_distrito, $dia_evento, $mes_evento, $repetir));
        //return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    //------------------------------------------------------------

    public function get_sorted_games($categoria){
        $sentence = $this->db->prepare("SELECT id_juego, nombre, plataforma, categoria FROM juego WHERE categoria=? ORDER BY nombre ASC, plataforma ASC");
        $sentence->execute(array($categoria));
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    public function update_game($id_juego, $nombre, $plataforma, $categoria, $path_imagen){
        $sentence = $this->db->prepare("UPDATE juego SET nombre=?, plataforma=?, categoria=?, imagen=? WHERE id_juego=?");
        $sentence->execute(array($nombre,$plataforma,$categoria,$path_imagen,$id_juego));
        //return $this->db->lastInsertId();// QUE DEVUELVO ACA SI ES UN ADD? POR QUE NECESITO DEVOLVERLO?
        //return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    //NEW
    public function upload_image($imagen){
        $target = 'img/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $target);
        return $target;
    }

    //DONE
    public function delete_game($id_juego){
        $sentence = $this->db->prepare ("DELETE FROM juego WHERE id_juego=?");
        $sentence->execute(array($id_juego));
    }
 }