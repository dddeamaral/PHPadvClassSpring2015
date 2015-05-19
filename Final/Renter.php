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

}
