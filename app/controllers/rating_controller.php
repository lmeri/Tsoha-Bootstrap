<?php

class RatingController extends BaseController{
    
    //Tallentaa käyttäjän arvosanan kirjalle
    public static function store($id) {
        self::check_logged_in();
        
        $params = $_POST;
        $book = $id;
        $kayttaja_id = self::get_user_logged_in()->id;
        $arvostelu = $params['rating'];
        
        $rating = new Arvostelu(array(
        'kirja_id' => $book,
        'kayttaja_id' => $kayttaja_id,
        'arvostelu' => $arvostelu
        ));
        
        if ($rating->find($book, $kayttaja_id)) {
            $rating->update($book, $kayttaja_id);
        } else {
            $rating->save();
        }

        Redirect::to('/books', array('message' => 'Your rating has been counted'));
    }
    
    
}