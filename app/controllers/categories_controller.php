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
        $attributes = array(
            'nimi' => $params['nimi']
        );
        
        $category = new Kategoria($attributes);
                
        $errors = $category->errors();        
                
        if (count($errors) == 0) {
            $category->save();
            Redirect::to('/categories', array('message' => 'Kategoria on luotu!'));
        } else {
            View::make('Categories/category_add.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }
    
    public static function destroy($id){
    $category = new Kategoria(array('id' => $id));
    $category->destroy();

    Redirect::to('/categories', array('message' => 'Kategoria on poistettu onnistuneesti!'));
    }
    
    public static function edit($id){
        $category = Kategoria::find($id);
        View::make('Categories/category_edit.html', array('category' => $category));     
    }
    
    public static function update($id){
    $params = $_POST;

    $attributes = array(
        'nimi' => $params['nimi']
    );

    $category = new Kategoria($attributes);
    $errors = $category->errors();

    if(count($errors) == 0){
        $category->update($id);

        Redirect::to('/categories/' . $id, array('message' => 'Kirjaa on muokattu onnistuneesti!'));
    } else{
        View::make('Categories/category_edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }
  }

    
}
