<?php
require_once('libs/Smarty.class.php');

    class evento_view {
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
        }

        public function show_eventos($eventos, $user_permiso){
            $this->smarty->assign('basehref', evento);
            $this->smarty->assign('evento_list', $eventos);
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->display('./templates/evento.tpl');
        }

         public function show_ediciones_evento($ediciones_evento, $user_permiso){
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->assign('basehref', ediciones_evento);
            $this->smarty->assign('ediciones_evento_details', $ediciones_evento);
            $this->smarty->display('./templates/ediciones_evento_details.tpl');
        }

        public function add_evento($user_permiso, $distritos, $usuarios, $subcategorias){
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->assign('distritos_list', $distritos);
            $this->smarty->assign('usuarios_list', $usuarios);
            $this->smarty->assign('subcategorias_list', $subcategorias);
            $this->smarty->display('./templates/add_evento.tpl');
        }

        public function show_update_evento($evento, $distritos, $usuarios, $subcategorias, $user_permiso){
            $this->smarty->assign('basehref', evento);
            $this->smarty->assign('evento_detail', $evento);
            $this->smarty->assign('distritos_list', $distritos);
            $this->smarty->assign('usuarios_list', $usuarios);
            $this->smarty->assign('subcategorias_list', $subcategorias);
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->display('./templates/update_evento.tpl');
        }

        //------------------------------------------------------

        public function show_game($game, $user_permiso){
            //$this->smarty->assign('basehref', game);
            $this->smarty->assign('game_details', $game);
            //$this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->display('./templates/game_details.tpl');
        }

        //done
        

        public function mostrar_juego(){
            $this->smarty->assign('BASE_URL', BASE_URL);
            $this->smarty->assign('titulo',"Mostrar Tareas");
            /*$this->smarty->assign('basehref', category);
            $this->smarty->assign('category_list', $categories);*/
            $this->smarty->display('./templates/ver_juegos_csr.tpl');
        }

    }