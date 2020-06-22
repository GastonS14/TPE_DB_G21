<?php 
    require_once('libs/Smarty.class.php');

    class user_view {
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
        }

        //DONE
        public function show_top_users($users){
            $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_list',$user);
            $this->smarty->display('./templates/top_users.tpl');
        }

    }
