<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Renter
 *
 * @author 001327813
 */
class Renter {
    private $CustomerID;
    private $Name;
    private $Address;
    private $InsuranceProvider;
    private $CarRented;
    private $CarID;
    private $RentalID;
    
    function getCustomerID() {
        return $this->CustomerID;
    }

    function getName() {
        return $this->Name;
    }

    function getAddress() {
        return $this->Address;
    }

    function getInsuranceProvider() {
        return $this->InsuranceProvider;
    }

    function getCarRented() {
        return $this->CarRented;
    }

    function getCarID() {
        return $this->CarID;
    }

    function getRentalID() {
        return $this->RentalID;
    }

    function setCustomerID($CustomerID) {
        $this->CustomerID = $CustomerID;
    }

    function setName($Name) {
        $this->Name = $Name;
    }

    function setAddress($Address) {
        $this->Address = $Address;
    }

    function setInsuranceProvider($InsuranceProvider) {
        $this->InsuranceProvider = $InsuranceProvider;
    }

    function setCarRented($CarRented) {
        $this->CarRented = $CarRented;
    }

    function setCarID($CarID) {
        $this->CarID = $CarID;
    }

    function setRentalID($RentalID) {
        $this->RentalID = $RentalID;
    }

     public function map(array $values) {
        
        foreach ($values as $key => $value) {
           $method = 'set' . $key;
            if ( method_exists($this, $method) ) {
                $this->$method($value);
            }       
        } 
        return $this;
    }
    
        public function idExist($id) {
        
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM final_userinfo WHERE Customer ID = :CustomerID");
         
        if ( $stmt->execute(array(':CustomerID' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        }
         return false;
    }
    
        public function save(IModel $model) {
                 
         $db = $this->getDB();
         
         $values = array( ":CustomerID" => $model->getCustomerID(),
                          ":Name" => $model->getName(),
                          ":Address" => $model->getAddress(),
                          ":InsuranceProvider" => $model->getInsuranceProvider(),
                          ":CarRented" => $model->getCarRented(),
                          ":CarID" => $model->getCarID(),
                          ":RentalID" => $model->getRentalID()
                    );
         
                
         if ( $this->idExist($model->getPhonetypeid()) ) {
             $values[":CustomerID"] = $model->getCustomerID();
             $stmt = $db->prepare("UPDATE final_userinfo SET Customer ID = :CustomerID, Name = :Name, Address = :Address, Insurance Provider = :InsuranceProvider"
                     . "Car Rented = :CarRented, Car ID = :CarID, Rental ID = :RentalID WHERE Customer ID = :CustomerID");
         } else {             
             $stmt = $db->prepare("INSERT INTO final_userinfo SET Customer ID = :CustomerID, Name = :Name, Address = :Address, Insurance Provider = :InsuranceProvider"
                     . "Car Rented = :CarRented, Car ID = :CarID, Rental ID = :RentalID");
         }
         
         if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
            return true;
         }
         
         return false;
    }
    
    
    
}
