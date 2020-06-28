<?php
require_once('libs/Smarty.class.php');

	class category_view {
		private $smarty;

	    function __construct(){
	    	$this->smarty = new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
	    }

	    public function show_subcategories($subcategories, $user_permiso){
	    	$this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->assign('basehref', subcategories);
            $this->smarty->assign('subcategories_details', $subcategories);
	        $this->smarty->display('./templates/subcategories_details.tpl');
	    }

	    public function show_update_category($category, $user_permiso){
	    	$this->smarty->assign('basehref', category);
	    	$this->smarty->assign('category_detail',$category);
	    	$this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
	        $this->smarty->display('./templates/update_category.tpl');
	    }

	    public function show_categories($category, $user_permiso){
			$this->smarty->assign('basehref', category);
	        $this->smarty->assign('category_list',$category);
	        $this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
	        $this->smarty->display('./templates/category.tpl');
	    }  

	    public function add_category($user_permiso){
	    	$this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->display('./templates/add_category.tpl');
        }

        public function add_subcategory($user_permiso, $id_categoria){
	    	$this->smarty->assign('basehref', user);
            $this->smarty->assign('user_permiso', $user_permiso);
            $this->smarty->assign('add_categoria', $id_categoria);
            $this->smarty->display('./templates/add_subcategory.tpl');
        }


	} 