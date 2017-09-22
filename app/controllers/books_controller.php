<?php

class BooksController extends BaseController{
    public static function booklist(){
        $books = Kirja::all();
        View::make('Books/list_books.html', array('books' => $books)); 
    }

    public static function categorybooks($id){
        $category = Kategoria::find($id);
        $books = Kirja::findFromCategory($id);
        if ($category != NULL) {
            View::make('Categories/category_list.html', array('books' => $books, 'category' => $category));
        } else {
            Redirect::to('/category', array('error' => 'Kategoriaa ei löydy.'));
        }
         
    }
    
    public static function bestbooks(){
        $books = Kirja::bestRated();
        View::make('Books/toplists.html', array('books' => $books));      
    }
    
    public static function add(){
        $categories = Kategoria::all();
        View::make('Books/book_add.html', array('categories' => $categories));     
    }
    
    public static function store(){
        $params = $_POST;
        $book = new Kirja(array(
        'nimi' => $params['nimi'],
        'isbn' => $params['isbn'],
        'kirjailija' => $params['kirjailija'],
        'vuosi' => $params['vuosi'],
        'kuvaus' => $params['kuvaus']  
    ));
        
    $book->save();
    $categories = $params['categories'];
    
    foreach ($categories as $category) {
    $bc = new KirjaKategoria(array('kategoria_id' => $category, 'kirja_id' => $book->id, ));
    $bc->save();
    }
        
    Redirect::to('/books/' . $book->id, array('message' => 'Kirja on lisätty kirjastoosi!'));
    }
    
    public static function bookintro($id){
        $book = Kirja::find($id);
        $bookcategories = KirjaKategoria::findCategories($id);
        if ($bookcategories == NULL) {
            $bookcategories = "";
        }
        View::make('Books/book_intro.html', array('book' => $book, 'bookcategories' => $bookcategories)); 
    }
    
    
}

