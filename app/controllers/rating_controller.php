<?php

class RatingController extends BaseController{
    
    //Tallentaa käyttäjän arvosanan kirjalle
    public static function store($id) {
        self::check_logged_in();
        
        $params = $_POST;
        $book = $id;
        $kayttaja_id = self::get_user_logged_in()->id;
        
        $rating = new Arvostelu(array(
        'kirja_id' => $book,
        'kayttaja_id' => $kayttaja_id,
        'arvostelu' => $params['rating']
        ));
        
        $rating->save();
        
        Redirect::to('/books', array('message' => 'Arvostelu lisätty!'));
    }
    
    
}