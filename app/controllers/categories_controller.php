<?php

class CategoriesController extends BaseController{
    public static function categorylist(){
        $categories = Kategoria::all();
        View::make('Categories/categories.html', array('categories' => $categories)); 
    }
    
    public static function add(){
        View::make('Categories/category_add.html');    
    }
    
    public static function store(){
        $params = $_POST;
        $categories = new Kategoria(array(
        'nimi' => $params['nimi']
    ));
        
    $categories->save();
    
    Redirect::to('/categories', array('message' => 'Kategoria on luotu!'));
    }

    
}
