<?php

class Kayttaja extends BaseModel{
    
    public $id, $tunnus, $salasana, $adminko;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
        $query->execute(array(
            'id' => $id
        ));
        $row = $query->fetch();
        
        if ($row){
            $user = new Kayttaja(array(
                'id' => $row['id'],
                'tunnus' => $row['tunnus'],
                'salasana' => $row['salasana'],
                'adminko' => $row['adminko']
            ));
        return $user;
        }
    }
    
    public static function authenticate($tunnus, $salasana) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE tunnus = :tunnus AND salasana = :salasana LIMIT 1');
        $query->execute(array(
            'tunnus' => $tunnus,
            'salasana' => $salasana
        ));
        $row = $query->fetch();
        
        if ($row) {
            $user = new Kayttaja(array(
            'id' => $row['id'],
            'tunnus' => $row['tunnus'],
            'salasana' => $row['salasana'],
            'adminko' => $row['adminko']
            ));
            return $user;
        } else {
            return null;
        }
    }
    
    
}