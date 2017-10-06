<?php

class Kategoria extends BaseModel{
    
    public $id, $nimi;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_category');
    }
    
    //Kaikki kategoriat
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
    
    //Yksi tietty kategoria id:n perusteella
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
    
    public function destroy(){
        $query = DB::connection()->prepare('DELETE FROM KirjaKategoria WHERE kategoria_id = :id');
        $query->execute(array('id' => $this->id));
        $query = DB::connection()->prepare('DELETE FROM Kategoria WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }
    
    public function update($id){
        $query = DB::connection()->prepare('UPDATE Kategoria SET nimi = :nimi WHERE id = :id');
        $query->execute(array('nimi' => $this->nimi, 'id' => $id)); 
    }
    
}