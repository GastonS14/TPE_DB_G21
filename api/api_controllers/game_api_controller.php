<?php
require_once '././models/game_model.php';
require_once 'api/api_controllers/api_controller.php';
require_once 'api/api_models/comments_model.php';
require_once 'api/api_views/json_view.php';
require_once 'helpers/auth_helper.php';

class game_api_controller extends api_controller{

    private $model;
    private $view;
    private $comments_model;
    private $auth_helper;

    public function __construct() { 
       parent::__construct();
       $this->model = new game_model();
       $this->comments_model = new comments_model();
       $this->view = new json_view();
       $this->auth_helper = new auth_helper();
    }

    public function get_games($params = null) {
        $games = $this->model->get_games();
        if (isset($games))
            return $this->view->response($games, 200);   
        else
            return $this->view->response(null, 404);
    }

    public function get_game($params = null) {
        $id_juego = $params[':ID'];
        $game = $this->model->get_game($id_juego);
        if($game)
            $this->response($game, 200);   
        else
            $this->response("No existe el juego con el id={$id_juego}", 404);
    }

    public function delete_game($params = []) {
        $this->auth_helper->check_login();
        $id_juego = $params[':ID'];
        $game = $this->model->get_game($id_juego);
        if($game) {
            $this->model->delete_game($id_juego);
            $this->response("Juego eliminado con éxito", 200);
        }
        else 
            $this->response("Juego not found", 404);
    }

    public function add_game($params = []){  
        $this->auth_helper->check_login();   
        $game = $this->get_data();
        $id_juego = $this->model->add_game($game->nombre, $game->plataforma, $game->categoria, $game->imagen);
        $new_game = $this->model->get_game($id_juego);
        if($new_game)
            $this->response($new_game, 200);
        else
            $this->response("Error al insertar juego", 500);
    }

    public function update_game($params = []) {
        $id_juego = $params[':ID'];
        $game = $this->model->get_game($id_juego);
        if ($game) {
            $body = $this->get_data();
            $nombre = $body->nombre;
            $plataforma = $body->plataforma;
            $categoria = $body->categoria;
            $path_imagen = null;
            $this->model->update_game($id_juego, $nombre, $plataforma, $categoria, $path_imagen);
            $this->response("Juego actualizado con éxito", 200);
        }
        else 
            $this->response("Juego not found", 404);
    }

    public function add_comment($params = []){
        $comment = $this->get_data();
        $fecha = strftime("%Y-%m-%d-%H-%M-%S", time());
        $id_comentario = $this->comments_model->add_comment($comment->id_juego, $comment->comentario, $comment->puntaje, $fecha);
        $new_comment = $this->comments_model->get_comment($id_comentario);
        if($new_comment)
            $this->view->response($new_comment, 200);
        else
            $this->view->response("Error al insertar juego", 500);
    }

    public function get_comments_game($params = null) {
        $id_juego = $params[':ID'];
        $comments = $this->comments_model->get_comments_game($id_juego);
        if ($comments)
            return $this->response($comments, 200);   
        else
            return $this->response("El juego no tiene comentarios", 404);
    }

    public function get_comment_rating($params = null) {
        $id_juego = $params[':ID'];
        $comment_raiting = $this->comments_model->get_comment_rating($id_juego);
        if($comment_raiting>0)
            return $this->response($comment_rating, 200); 
        else
            return $this->response("El juego no tiene comentarios", 404);
    }

     public function delete_comment($params = []) {
        $id_comentario = $params[':ID'];
        $comment = $this->comments_model->get_comment($id_comentario);
        if($comment) {
            $this->comments_model->delete_comment($id_comentario);
            $this->response("Comentario eliminado con éxito", 200);
        }
        else 
            $this->response("Comentario not found", 404);
    }

    public function get_comment($params = null) {
        $id_comentario = $params[':ID'];
        $comment = $this->comments_model->get_comment($id_comentario);
        if($comment)
            $this->response($comment, 200);   
        else
            $this->response("No existe el comentario", 404);
    }
}
