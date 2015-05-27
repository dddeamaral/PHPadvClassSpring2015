<?php

/**
 * Description of User
 *
 * @author 001327813
 */
class User {
    private $Username;
    private $Email;
    private $Password;
    
    function getUsername() {
        return $this->Username;
    }

    function getEmail() {
        return $this->Email;
    }

    function getPassword() {
        return $this->Password;
    }

    function setUsername($Username) {
        $this->Username = $Username;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }


}
