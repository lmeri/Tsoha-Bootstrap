<?php

class UserController extends BaseController{
    
    public static function usersbooks() {
        try {
            $user = self::get_user_logged_in();
            $id = $user->id;
            $books = Kirja::findUsersBooks($id);

            View::make('User/users_books.html', array('books' => $books));
        } catch (Exception $ex) {
            
        }
        
    }
    
    public static function login() {
        View::make('User/login.html');
    }
    
    public static function handle_login() {
        $params = $_POST;
        
        $user = Kayttaja::authenticate($params['tunnus'], $params['salasana']);
        
        if(!$user) {
            View::make('User/login.html', array('error' => 'Wrong username or password.', 'tunnus' => $params['tunnus']));
        } else {
            $_SESSION['user'] = $user->id;
            Redirect::to('/', array('message' => 'You are now logged in ' . $user->tunnus . '!'));
        }
    }
    
    
}