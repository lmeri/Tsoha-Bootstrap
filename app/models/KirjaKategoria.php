<?php

class KirjaKategoria extends BaseModel{
    
    public $kirja_id, $kategoria_id, $kategoria_nimi;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO KirjaKategoria (kategoria_id, kirja_id) VALUES (:kategoria_id, :kirja_id)');
        $query->execute(array(
            'kategoria_id' => $this->kategoria_id,
            'kirja_id' => $this->kirja_id
        ));
        $row = $query->fetch();
    }
    
    public static function findCategories($id) {
        $query = DB::connection()->prepare('SELECT KirjaKategoria.*, Kategoria.nimi AS kategoria_nimi FROM KirjaKategoria INNER JOIN Kategoria ON KirjaKategoria.kategoria_id = Kategoria.id WHERE KirjaKategoria.kirja_id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $categories = array();
        
        foreach ($rows as $row) {
            $categories[] = new KirjaKategoria(array(
                'kategoria_id' => $row['kategoria_id'],
                'kirja_id' => $row['kirja_id'],
                'kategoria_nimi' => $row['kategoria_nimi']
            ));
        }
        return $categories;
    }
}