<?php

    class comments_model{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=juegos;charset=utf8', 'root', '');
    }

    //done
    public function get_comments_game($id_juego){
        $sentence = $this->db->prepare("SELECT * FROM comentarios WHERE id_juego=? ORDER BY puntaje DESC, fecha DESC");
        $sentence->execute(array($id_juego));
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    //done
    public function get_comment($id_comentario){
        $sentence = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario=?");
        $sentence->execute(array($id_comentario));
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    //DONE
    public function add_comment($id_juego, $comentario, $puntaje, $fecha){
        $sentence = $this->db->prepare("INSERT INTO comentarios(id_juego, comentario, puntaje, fecha) VALUES(?,?,?,?)");
        $sentence->execute(array($id_juego, $comentario, $puntaje, $fecha));
        return $this->db->lastInsertId();
    }

    //DONE
    public function delete_comment($id_comentario){
        $sentence = $this->db->prepare ("DELETE FROM comentarios WHERE id_comentario=?");
        $sentence->execute(array($id_comentario));
    }

    public function get_comment_rating($id_juego){
        $puntaje_total = $this->db->prepare("SELECT AVG(puntaje) FROM comentarios WHERE id_juego=?");
        $puntaje_total->execute(array($id_juego));
        return $puntaje_total;
    }

 }