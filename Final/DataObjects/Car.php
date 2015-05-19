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


}
