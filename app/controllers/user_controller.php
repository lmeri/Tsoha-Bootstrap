<?php

class UsersBooksController extends BaseController{
    
    public static function usersbooks($id) {
        $books = Kirja::findUsersBooks($id);
        View::make('User/users_books.html', array('books' => $books));
    }
    
    
}