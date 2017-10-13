<?php

class Arvostelu extends BaseModel{
    
    public $kirja_id, $kayttaja_id, $arvostelu;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    //Tallenna arvostelu
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Arvostelu (kirja_id, kayttaja_id, arvostelu) VALUES (:kirja_id, :kayttaja_id, :arvostelu)');
        $query->execute(array(
            'kirja_id' => $this->kirja_id,
            'kayttaja_id' => $this->kayttaja_id,
            'arvostelu' => $this->arvostelu
        ));
        $row = $query->fetch();
    }
    
    //Palauttaa true, jos tietokannasta löytyy jo käyttäjän arvostelu 
    //tietylle kirjalle.
    
    public static function find($id, $kayttaja_id) {
        $query = DB::connection()->prepare('SELECT Arvostelu.* FROM Arvostelu WHERE Arvostelu.kayttaja_id = :kayttaja_id AND Arvostelu.kirja_id = :id LIMIT 1');
        $query->execute(array('id' => $id, 'kayttaja_id' => $kayttaja_id));
        $row = $query->fetch();
        
        if ($row){
            return true;
        }
        return false;
    }
    
    //Etsii käyttäjän arvostelun kirjalle.
    
    public static function findRating($id, $kayttaja_id) {
        $query = DB::connection()->prepare('SELECT Arvostelu.* FROM Arvostelu WHERE Arvostelu.kayttaja_id = :kayttaja_id AND Arvostelu.kirja_id = :id LIMIT 1');
        $query->execute(array('id' => $id, 'kayttaja_id' => $kayttaja_id));
        $row = $query->fetch();
        
        if ($row){
            $rating = new Arvostelu(array(
                'kayttaja_id' => $row['kayttaja_id'],
                'kirja_id' => $row['kirja_id'],
                'arvostelu' => $row['arvostelu']
            ));
        return $rating;
        }
    }
    
    public function update($id, $kayttaja){
        $query = DB::connection()->prepare('UPDATE Arvostelu SET kayttaja_id = :kayttaja_id, kirja_id = :kirja_id, arvostelu = :arvostelu WHERE kayttaja_id = :kayttaja_id AND kirja_id = :kirja_id');
        $query->execute(array('kirja_id' => $id, 'kayttaja_id' => $kayttaja, 'arvostelu' => $this->arvostelu)); 
    }
    
    
}