<?php

class Kirja extends BaseModel{
    
    public $id, $isbn, $nimi, $kirjailija, $vuosi, $kuvaus, $arvostelu;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function all(){
        $query = DB::connection()->prepare('SELECT Kirja.*, AVG(Arvostelu.arvostelu) AS arvostelu FROM Kirja LEFT JOIN Arvostelu ON Kirja.id=Arvostelu.kirja_id GROUP BY Kirja.id ORDER BY Kirja.nimi ASC');
        $query->execute();
        $rows = $query->fetchAll();
        $books = array();
        
        foreach ($rows as $row){
            $books[] = new Kirja(array(
                'id' => $row['id'],
                'isbn' => $row['isbn'],
                'nimi' => $row['nimi'],
                'kirjailija' => $row['kirjailija'],
                'vuosi' => $row['vuosi'],
                'kuvaus' => $row['kuvaus'],
                'arvostelu' => $row['arvostelu']
            ));
        }
        return $books;
    }
    
    
    public static function find($id){
        $query = DB::connection()->prepare('SELECT Kirja.*, AVG(Arvostelu.arvostelu) AS arvostelu FROM Kirja LEFT JOIN Arvostelu ON Kirja.id=Arvostelu.kirja_id WHERE id = :id GROUP BY Kirja.id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        
        if ($row){
            $book = new Kirja(array(
                'id' => $row['id'],
                'isbn' => $row['isbn'],
                'nimi' => $row['nimi'],
                'kirjailija' => $row['kirjailija'],
                'vuosi' => $row['vuosi'],
                'kuvaus' => $row['kuvaus'],
                'arvostelu' => $row['arvostelu']
            ));
        return $book;
        }
          
    }
    
    public static function findFromCategory($id){
        $query = DB::connection()->prepare('SELECT Kirja.*, AVG(Arvostelu.arvostelu) AS arvostelu FROM Kirja LEFT JOIN Arvostelu ON Kirja.id=Arvostelu.kirja_id LEFT JOIN KirjaKategoria ON Kirja.id=KirjaKategoria.kirja_id WHERE KirjaKategoria.kategoria_id  = :id GROUP BY Kirja.id ORDER BY arvostelu DESC');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $books = array();
        
        foreach ($rows as $row){
            $books[] = new Kirja(array(
                'id' => $row['id'],
                'isbn' => $row['isbn'],
                'nimi' => $row['nimi'],
                'kirjailija' => $row['kirjailija'],
                'vuosi' => $row['vuosi'],
                'kuvaus' => $row['kuvaus'],
                'arvostelu' => $row['arvostelu']
            ));
        }
        return $books;   
    }
    
    public static function bestRated(){
        $query = DB::connection()->prepare('SELECT Kirja.*, AVG(Arvostelu.arvostelu) AS arvostelu FROM Kirja LEFT JOIN Arvostelu ON Kirja.id=Arvostelu.kirja_id GROUP BY Kirja.id ORDER BY arvostelu DESC');
        $query->execute();
        $rows = $query->fetchAll();
        $books = array();
        
        foreach ($rows as $row){
            $books[] = new Kirja(array(
                'id' => $row['id'],
                'isbn' => $row['isbn'],
                'nimi' => $row['nimi'],
                'kirjailija' => $row['kirjailija'],
                'vuosi' => $row['vuosi'],
                'kuvaus' => $row['kuvaus'],
                'arvostelu' => $row['arvostelu']
            ));
        }
        return $books;   
    }
    
    public function save(){
        $query = DB::connection()->prepare('INSERT INTO Kirja (nimi, isbn, kirjailija, vuosi, kuvaus) VALUES (:nimi, :isbn, :kirjailija, :vuosi, :kuvaus) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'isbn' => $this->isbn, 'kirjailija' => $this->kirjailija, 'vuosi' => $this->vuosi, 'kuvaus' => $this->kuvaus));
        $row = $query->fetch();
        $this->id = $row['id'];
         
    }
    
    
    
    
}
