<?php

 class category_model{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=local;charset=utf8', 'root', '');
    }

    public function get_categories(){
        $sentence = $this->db->prepare( "SELECT * FROM g21_categoria ORDER BY id_categoria");
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_category($id_categoria){
        $sentence = $this->db->prepare( "SELECT * FROM g21_categoria WHERE id_categoria=?");
        $sentence->execute(array($id_categoria));
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    public function add_category($id_categoria, $nombre_categoria){
        $sentence = $this->db->prepare("INSERT INTO g21_categoria(id_categoria, nombre_categoria) VALUES(?,?)");
        $sentence->execute(array($id_categoria,$nombre_categoria));
    }

    public function update_category($id_categoria,$nombre_categoria){
        $sentence =$this->db->prepare("UPDATE g21_categoria SET nombre_categoria=? WHERE id_categoria=?");
        $sentence->execute(array($nombre_categoria, $id_categoria));
    }

    public function delete_category($id_categoria){
        $sentence = $this->db->prepare ("DELETE FROM g21_categoria WHERE id_categoria=?");
        $sentence->execute(array($id_categoria));
    }

    //SUBCATEGORIAS
    public function add_subcategory($id_categoria, $id_subcategoria, $nombre_subcategoria){
        $sentence = $this->db->prepare("INSERT INTO g21_subcategoria(id_categoria, id_subcategoria, nombre_subcategoria) VALUES(?,?,?)");
        $sentence->execute(array($id_categoria, $id_subcategoria, $nombre_subcategoria));
    }

    public function get_subcategories($id_categoria){
        $sentence = $this->db->prepare( "SELECT * FROM g21_subcategoria WHERE id_categoria=?");
        $sentence->execute(array($id_categoria));
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

     public function get_cant_subcategories($id_categoria){
        $sentence = $this->db->prepare( "SELECT count(*) FROM g21_subcategoria WHERE id_categoria=?");
        $sentence->execute(array($id_categoria));
        return $sentence->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete_subcategory($id_categoria, $id_subcategoria){
        $sentence = $this->db->prepare ("DELETE FROM g21_subcategoria WHERE id_categoria=? AND id_subcategoria=?");
        $sentence->execute(array($id_categoria, $id_subcategoria));
    }
 }