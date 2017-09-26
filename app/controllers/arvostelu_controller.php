<?php

class RatingController extends BaseController{
    
    public static function store($id) {
        $params = $_POST;
        $book = $id;
        $kayttaja_id = self::get_user_logged_in()->id;
        
        $rating = new Arvostelu(array(
        'kirja_id' => $book,
        'kayttaja_id' => 1,
        'arvostelu' => $params['rating']
        ));
        
        $rating->save();
        
        Redirect::to('/books', array('message' => 'Arvostelu lisätty!'));
    }
    
    
}