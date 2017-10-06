<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        $errors = array_merge($errors, $this->{$validator}());
      }

      return $errors;
    }
    
    public function validate_name() {
        $errors = array();
        
        if($this->nimi == '' || $this->nimi == null){
            $errors[] = 'Name cannot be empty.';
        }
        if(strlen($this->nimi) < 3){
            $errors[] = 'Name must be at least 3 characters.';
        }
        if(strlen($this->nimi) > 60){
            $errors[] = 'Name must not be over 60 characters.';
        }
        return $errors;
    }
    
    public function validate_isbn() {
        $errors = array();
        
        if($this->isbn == '' || $this->isbn == null){
            $errors[] = 'ISBN cannot be empty.';
        }
        if(strlen($this->isbn) != 13){
            $errors[] = 'ISBN must be 13 characters.';
        }
        return $errors;
    }
    
    public function validate_writer() {
        $errors = array();
        
        if($this->kirjailija == '' || $this->kirjailija == null){
            $errors[] = 'Writer cannot be empty.';
        }
        if(strlen($this->kirjailija) < 3){
            $errors[] = 'Writer must be at least 3 characters.';
        }
        if(strlen($this->kirjailija) > 50){
            $errors[] = 'Writer must not be over 50 characters.';
        }
        return $errors;
    }
    
    public function validate_year() {
        $errors = array();
        
        if($this->vuosi == '' || $this->vuosi == null){
            $errors[] = 'Released cannot be empty.';
        }
        if(strlen($this->vuosi) != 4){
            $errors[] = 'Release year must be 4 characters.';
        }
        return $errors;
    }
    
    public function validate_description() {
        $errors = array();
        
        if($this->kuvaus == '' || $this->kuvaus == null){
            $errors[] = 'Introduction cannot be empty.';
        }
        if(strlen($this->kuvaus) > 300){
            $errors[] = 'Introduction must not be over 300 characters.';
        }
        return $errors;
    }
    
    public function validate_category() {
        $errors = array();
        
        if($this->nimi == '' || $this->nimi == null){
            $errors[] = 'Name cannot be empty.';
        }
        if(strlen($this->nimi) < 3){
            $errors[] = 'Name must be at least 3 characters.';
        }
        if(strlen($this->nimi) > 20){
            $errors[] = 'Name must not be over 20 characters.';
        }
        return $errors;
    }
    
    public function validate_username() {
        $errors = array();
        
        if($this->tunnus == '' || $this->tunnus == null){
            $errors[] = 'Username cannot be empty.';
        }
        if(strlen($this->tunnus) < 3){
            $errors[] = 'Username must be at least 3 characters.';
        }
        if(strlen($this->tunnus) > 50){
            $errors[] = 'Username must not be over 50 characters.';
        }
        return $errors;
    }
    
    public function validate_password() {
        $errors = array();
        
        if($this->salasana == '' || $this->salasana == null){
            $errors[] = 'Password cannot be empty.';
        }
        if(strlen($this->salasana) < 5){
            $errors[] = 'Password must be at least 5 characters.';
        }
        if(strlen($this->salasana) > 50){
            $errors[] = 'Password must not be over 50 characters.';
        }
        return $errors;
    }

  }
