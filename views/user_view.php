<?php 
    require_once('libs/Smarty.class.php');

    class user_view {
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
        }

        //DONE
        public function show_login($message = ''){
            $this->smarty->assign('basehref', login);
            $this->smarty->assign('message', $message);
            $this->smarty->display('./templates/user_login.tpl');
        }

        //DONE
        public function show_users($user, $user_permiso){
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_list',$user);
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->display('./templates/user.tpl');
        }

         //done
        public function show_update_user($user, $permisos, $user_permiso){
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_detail', $user);
            $this->smarty->assign('basehref', category);
            $this->smarty->assign('user_permisos', $permisos);
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->display('./templates/update_user.tpl');
        }
    }
