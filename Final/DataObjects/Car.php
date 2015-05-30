<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Car
 *
 * @author 001327813
 */
class Car {
    private $carName;
    private $CustomerID;
    private $CarMake;
    private $CarID;
    private $Rentable;
    private $WeeksToBeRented;
    private $RentalID;
    private $db;
    private $dbConfig;
      
    public function __construct($dbConfig) {//9:10 5/26/2015
        $this->setDbConfig($dbConfig);      
    }
    
    private function getDbConfig() {//9:10 5/26/2015
        return $this->dbConfig;
    }

    private function setDbConfig($dbConfig) {//9:10 5/26/2015
        $this->dbConfig = $dbConfig;
    }

    public function getDB() { //9:10 5/26/2015
        if ( null != $this->db ) {
            return $this->db;
        }
        try {
            $config = $this->getDbConfig();
            $this->db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        } catch (Exception $ex) {
          
           $this->closeDB();
        }
        return $this->db;        
    }
    
    
    function getCarName() {
        return $this->carName;
    }

    function getCustomerID() {
        return $this->CustomerID;
    }

    function getCarMake() {
        return $this->CarMake;
    }

    function getCarID() {
        return $this->CarID;
    }

    function getRentable() {
        return $this->Rentable;
    }

    function getWeeksToBeRented() {
        return $this->WeeksToBeRented;
    }

    function getRentalID() {
        return $this->RentalID;
    }

    function setCarName($carName) {
        $this->carName = $carName;
    }

    function setCustomerID($CustomerID) {
        $this->CustomerID = $CustomerID;
    }

    function setCarMake($CarMake) {
        $this->CarMake = $CarMake;
    }

    function setCarID($CarID) {
        $this->CarID = $CarID;
    }

    function setRentable($Rentable) {
        $this->Rentable = $Rentable;
    }

    function setWeeksToBeRented($WeeksToBeRented) {
        $this->WeeksToBeRented = $WeeksToBeRented;
    }

    function setRentalID($RentalID) {
        $this->RentalID = $RentalID;
    }

     public function isPostRequest() { //7:50 5/28/2015
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    /*
     * 
     * Save Function 
     * Takes a "Model" or an object that has the values CarName, Car Make and Rentable from the model. The model
     * in this case would be the class that we are in..Car. Example on the AddCarPage of how it is used.
     */
    public function save($model) {
                 
         $db = $this->getDB();
         
         $values = array( ":CarName" => $model->getCarName(),
                          ":CarMake" => $model->getCarMake(),
                          ":Rentable" => $model->getRentable()
                    );
                
                  
             $stmt = $db->prepare("INSERT INTO `final_carrental`(`Car Name`, `Car Make/Model`, `Rentable`) VALUES (:CarName,:CarMake, :Rentable)");
         
         //"INSERT INTO `final_carrental`(`Car Name`, `Car Make/Model`, `Rentable`) VALUES ('Honda','Civic', 1)";
             //This was what statement worked when I tried doing it in the SQL console in php my admin. I just adjusted it to keys instead of hard coded values.
         if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
            return true;
         }
         return false;
    }

    
      public function getAllRows(){
        //Figure this out to retrieve all rows. and return an array
         $values = array();         
        $db = $this->getDB();               
        $stmt = $db->prepare("SELECT final_carrental.Car ID, final_carrental.Car Make, final_carrental.Car Name, FROM final_carrental ");
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $value) {
               $model = new Car();
               $model->reset()->map($value);
               $values[] = $model;
            }
             
        }   else {            
                    
        }  
        
        $stmt->closeCursor();         
         return $values;
        
    }
    
        public function delete($id){
        
          $db = $this->getDB();         
         $stmt = $db->prepare("Delete FROM final_carrental WHERE Car ID = :carID");
         
         if ( $stmt->execute(array(':carId' => $id)) && $stmt->rowCount() > 0 ) {
             return true;
         }
         return false;
    } 

    

}
