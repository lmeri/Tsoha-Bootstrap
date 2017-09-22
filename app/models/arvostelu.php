<?php

class Arvostelu extends BaseModel{
    
    public $kirja_id, $kayttaja_id, $arvostelu;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Arvostelu (kirja_id, kayttaja_id, arvostelu) VALUES (:kirja_id, :kayttaja_id, :arvostelu)');
        $query->execute(array(
            'kirja_id' => $this->kirja_id,
            'kayttaja_id' => $this->kayttaja_id,
            'arvostelu' => $this->arvostelu
        ));
        $row = $query->fetch();
    }
    
    
}