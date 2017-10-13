<?php

class BooksController extends BaseController{
    
    //Listaa kaikki kirjat
    public static function booklist(){
        $books = Kirja::all();
        View::make('Books/list_books.html', array('books' => $books)); 
    }
    
    //Etsii tietyn kategorian kirjat
    public static function categorybooks($id){
        $category = Kategoria::find($id);
        $books = Kirja::findFromCategory($id);
        if ($category != NULL) {
            View::make('Categories/category_list.html', array('books' => $books, 'category' => $category));
        } else {
            Redirect::to('/category', array('error' => 'Category cannot be found.'));
        }   
    }
    
    //Parhaat arvosanat saaneet kirjat
    public static function bestbooks(){
        $books = Kirja::bestRated();
        View::make('Books/toplists.html', array('books' => $books));      
    }
    
    //Kirjan lisäyssivu
    public static function add(){
        self::check_admin_logged_in();
        
        $categories = Kategoria::all();
        View::make('Books/book_add.html', array('categories' => $categories));     
    }
    
    //Kirjan tallennus tietokantaan
    public static function store(){
        self::check_admin_logged_in();
        
        $params = $_POST;
        $categories = Kategoria::all();
        $attributes = array(
            'nimi' => $params['nimi'],
            'isbn' => $params['isbn'],
            'kirjailija' => $params['kirjailija'],
            'vuosi' => $params['vuosi'],
            'kuvaus' => $params['kuvaus'] 
        );
        $book = new Kirja($attributes);

        $errors = $book->errors();

        if (count($errors) == 0) {
            $book->save();
            
            try {
                $categories = $params['categories'];

                foreach ($categories as $category) {
                    $bc = new KirjaKategoria(array('kategoria_id' => $category, 'kirja_id' => $book->id));
                    $bc->save();
                }
            } catch (Exception $ex) {
                
            }
            Redirect::to('/books/' . $book->id, array('message' => 'Book has been added!'));
        } else {
            View::make('Books/book_add.html', array('errors' => $errors, 'attributes' => $attributes, 'categories' => $categories));
        }
    }
    
    //Kirjan esittely
    public static function bookintro($id){
        $user = self::get_user_logged_in();
        $book = Kirja::find($id);
        $bookcategories = KirjaKategoria::findCategories($id);
        $rating = Arvostelu::findRating($book->id, $user->id);
        if ($bookcategories == NULL) {
            $bookcategories = "";
        }
        View::make('Books/book_intro.html', array('book' => $book, 'bookcategories' => $bookcategories, 'user' => $user, 'rating' => $rating)); 
    }
    
    //Kirjan poisto
    public static function destroy($id){
        self::check_admin_logged_in();
        
        $book = new Kirja(array('id' => $id));
        $book->destroy();

        Redirect::to('/books', array('message' => 'Book has been deleted!'));
    }
    
    //Kirjan muokkaus
    public static function edit($id){
        self::check_admin_logged_in();
        
        $categories = Kategoria::all();
        $book = Kirja::find($id);
        View::make('Books/book_edit.html', array('categories' => $categories, 'book' => $book));     
    }
    
    //Kirjan tietokantakohteen muokkaus
    public static function update($id){
        self::check_admin_logged_in();
        
        $params = $_POST;

        $attributes = array(
            'nimi' => $params['nimi'],
            'isbn' => $params['isbn'],
            'kirjailija' => $params['kirjailija'],
            'vuosi' => $params['vuosi'],
            'kuvaus' => $params['kuvaus']
        );

        $book = new Kirja($attributes);
        $errors = $book->errors();

        if(count($errors) == 0){
            $book->update($id);
            KirjaKategoria::destroy($id);

            try {
                $categories = $params['categories'];

                foreach ($categories as $category) {
                    $bc = new KirjaKategoria(array('kategoria_id' => $category, 'kirja_id' => $id));
                    $bc->save();
                }
            } catch (Exception $ex) {

            }


            Redirect::to('/books/' . $id, array('message' => 'Book has been edited!'));
        } else{
          View::make('Books/book_edit.html', array('errors' => $errors, 'attributes' => $attributes));
        }
  }
    
    
}

