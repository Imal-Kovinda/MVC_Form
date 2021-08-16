<?php
require '../model/use.php';
class UseCtrl extends User{
    public function createStudent($FirstName,$LastName,$password){
        $this->insert($FirstName,$LastName,$password);
        
    }
}