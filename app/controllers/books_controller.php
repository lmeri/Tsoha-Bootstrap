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
        $categories = $params['categories'];

        foreach ($categories as $category) {
            $bc = new KirjaKategoria(array('kategoria_id' => $category, 'kirja_id' => $book->id));
            $bc->save();
        }
        Redirect::to('/books/' . $book->id, array('message' => 'Kirja on lisätty kirjastoosi!'));
    } else {
        View::make('Books/book_add.html', array('errors' => $errors, 'attributes' => $attributes));
    }}
    
    public static function bookintro($id){
        $book = Kirja::find($id);
        $bookcategories = KirjaKategoria::findCategories($id);
        if ($bookcategories == NULL) {
            $bookcategories = "";
        }
        View::make('Books/book_intro.html', array('book' => $book, 'bookcategories' => $bookcategories)); 
    }
    
    public static function destroy($id){
    $book = new Kirja(array('id' => $id));
    $book->destroy();

    Redirect::to('/books', array('message' => 'Kirja on poistettu onnistuneesti!'));
    }
    
    public static function edit($id){
        $categories = Kategoria::all();
        $book = Kirja::find($id);
        View::make('Books/book_edit.html', array('categories' => $categories, 'book' => $book));     
    }
    
    public static function update($id){
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
        
        
        Redirect::to('/books/' . $id, array('message' => 'Kirjaa on muokattu onnistuneesti!'));
    } else{
      View::make('Books/book_edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }
  }
    
    
}

