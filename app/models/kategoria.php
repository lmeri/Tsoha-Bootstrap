<?php

class Kategoria extends BaseModel{
    
    public $id, $nimi;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function all(){
        $query = DB::connection()->prepare('SELECT * FROM Kategoria');
        $query->execute();
        $rows = $query->fetchAll();
        $categories = array();
        
        foreach ($rows as $row){
            $categories[] = new Kategoria(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));
        }
        return $categories;
    }
    
    
    public static function find($id){
        $query = DB::connection()->prepare('SELECT * FROM Kategoria WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        
        if ($row){
            $category = new Kategoria(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));
        return $category;
        }
        
    return null;    
    }
    
    public function save(){
        $query = DB::connection()->prepare('INSERT INTO Kategoria (nimi) VALUES (:nimi) RETURNING id');
        $query->execute(array('nimi' => $this->nimi));
        $row = $query->fetch();
        $this->id = $row['id'];
         
    }
    
}