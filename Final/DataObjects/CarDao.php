<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarDao
 *
 * @author Anthonyyy
 */
class CarDao {
    
    private $DB = null;
  
    
    public function __construct( PDO $db ) {        
        $this->setDB($db);    
    }
    
    private function setDB( PDO $DB) {        
        $this->DB = $DB;
    }
    
    private function getDB() {
        return $this->DB;
    }
    
    function getAvailable(){
        $values = array();
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM final_carrental WHERE rentable = 1");
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $value) {
               $model = new Car($db);
               $model->reset()->map($value);
               $values[] = $model;
            }
             
        }   else {            
           //log($db->errorInfo() .$stmt->queryString ) ;           
        }  
        
         $stmt->closeCursor();         
         return $values;
     }
    
    
    function getUnAvailable()
    {
        $values = array();
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM final_carrental WHERE rentable = 0");
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $value) {
               $model = new Car($db);
               $model->reset()->map($value);
               $values[] = $model;
            }
             
        }   else {            
           //log($db->errorInfo() .$stmt->queryString ) ;           
        }  
        
         $stmt->closeCursor();         
         return $values;
    }
    
        
    function getAllcars()
    {
        $values = array();
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM final_carrental");
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $value) {
               $model = new Car($db);
               $model->reset()->map($value);
               $values[] = $model;
            }
             
        }   else {            
           //log($db->errorInfo() .$stmt->queryString ) ;           
        }  
        
         $stmt->closeCursor();         
         return $values;
    }
    
      public function GetCarByID($id){
         $values = array();
          $db = $this->getDB();         
         $stmt = $db->prepare("Select * FROM `final_carrental` WHERE `Car ID` = :carId");
         
         if ( $stmt->execute(array(':carId' => $id)) && $stmt->rowCount() > 0 ) {
             
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($results as $value) {
            $model = new Car($db);
            $model->reset()->map($value);
            $values[] = $model;
            }
         }
    
    } 
    
}
