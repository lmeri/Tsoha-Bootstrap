<?php

class UserController extends BaseController{
    
    //Käyttäjän arvostelemat kirjat
    public static function usersbooks() {
        self::check_logged_in();
        
        try {
            $user = self::get_user_logged_in();
            $id = $user->id;
            $books = Kirja::findUsersBooks($id);

            View::make('User/users_books.html', array('books' => $books));
        } catch (Exception $ex) {
            
        }
        
    }
    
    
    //Kirjautumissivu
    public static function login() {
        View::make('User/login.html');
    }
    
    //Kirjautumisen käsittely
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
    
    //Rekisteröintisivu
    public static function register() {
        View::make('User/register.html');
    }
    
    //Rekisteröinnin käsittely
    public static function handle_register() {
        $params = $_POST;
        
        $attributes = array(
            'tunnus' => $params['tunnus'],
            'salasana' => $params['salasana'],
        );
        
        $salasana = $params['salasana'];
        $salasana2 = $params['salasanaUudestaan'];
        
        if ($salasana != $salasana2) {
            View::make('User/register.html', array('error' => 'Check that you wrote same password twice.', 'attributes' => $attributes));
        } else {
            $user = new Kayttaja($attributes);
            $errors = $user->errors();
            if (count($errors) == 0) {
                $user->save();
                Redirect::to('/login', array('message' => 'You have created an account!'));
            } else {
                View::make('User/register.html', array('attributes' => $attributes, 'errors' => $errors));
            }
        }
        
    }
    
    //Uloskirjautuminen
    public static function logout() {
        $_SESSION['user'] = null;
        Redirect::to('/login', array('message' => 'You have logged out!'));
    }
    
    //Etusivu
    public static function index(){
        View::make('home.html');
    }
    
    
}