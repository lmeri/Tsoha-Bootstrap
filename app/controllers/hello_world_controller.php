<?php

  class HelloWorldController extends BaseController{
      
    public static function login(){
        View::make('User/login.html');
    }
    
    public static function list_books(){
        View::make('Books/list_books.html');
    }
    
    public static function book_intro(){
        View::make('Books/book_intro.html');
    }
    
    public static function categories(){
        View::make('Categories/categories.html');
    }
    
    public static function register(){
        View::make('User/register.html');
    }
    
    public static function category_list(){
        View::make('Categories/category_list.html');
    }
    
    public static function toplists(){
        View::make('Books/toplists.html');
    }

    public static function index(){
        View::make('home.html');
    }
    
    public static function book_edit(){
        View::make('Books/book_edit.html');
    }
    
    public static function book_add(){
        View::make('Books/book_add.html');
    }
    
    public static function category_edit(){
        View::make('Categories/category_edit.html');
    }
    
    public static function category_add(){
        View::make('Categories/category_add.html');
    }
    
    public static function users_books(){
        View::make('User/users_books.html');
    }
    
    

    public static function sandbox(){ 
      
        $potter = Kirja::find(1);
        $kirjat = Kirja::all();
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
        Kint::dump($kirjat);
        Kint::dump($potter);
    }
}

