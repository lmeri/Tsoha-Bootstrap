<?php

  class BaseController{

    public static function get_user_logged_in(){
        if(isset($_SESSION['user'])) {
            $userid = $_SESSION['user'];
          
            $user = Kayttaja::find($userid);
                return $user;
        }
        return null;
    }
    

    public static function check_logged_in(){
        if (!isset($_SESSION['user'])) {
            Redirect::to('/login', array('message' => 'Please login.'));
        }
    }
    
    public static function check_admin_logged_in(){
        if (isset($_SESSION['user'])) {
            $userid = $_SESSION['user'];
            $user = Kayttaja::find($userid);
            if (!$user->adminko) {
                Redirect::to('/login', array('message' => 'Please login as admin.'));
            }
            
        }
    }

  }
