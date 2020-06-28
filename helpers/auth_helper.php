<?php 
	
	class auth_helper{

		public function __construct(){
		}
		
		//DONE
		public function login($user){
			session_start();
			$_SESSION['user'] = $user->email;
			$_SESSION['permiso'] = $user->id_permiso;
		}

		//DONE
		public function check_login(){
            session_start();
            if(!isset($_SESSION['user']))
            	if($_SESSION['permiso'] != 3) {
            		header("Location: " . login);
	                die();
            	}
        }

        public function invited_login($id_permiso){
            session_start();
            $_SESSION['permiso'] = $id_permiso;
    		header("Location: ". category);
        }
        
        //DONE
        public function get_logged_id_permiso() {
	        if (session_status() != PHP_SESSION_ACTIVE)
	            session_start();
	        return $_SESSION['permiso'];
	    }

	    //DONE
        public function logout(){
        	session_start();
        	session_destroy();
        }
	}