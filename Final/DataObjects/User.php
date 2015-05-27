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
    private $UserId;
    protected $db = null;
    private $dbConfig = array();
   
 
    public function __construct($dbConfig) {
        $this->setDbConfig($dbConfig);      
    }
    
    private function getDbConfig() {
        return $this->dbConfig;
    }

    private function setDbConfig($dbConfig) {
        $this->dbConfig = $dbConfig;
    }
    
    public function getDB() { 
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

     public function closeDB() {        
        $this->db = null;        
    }
    
    
    function getUserId() {
        return $this->UserId;
    }

    function setUserId($UserId) {
        $this->UserId = $UserId;
    }

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

//    public function reset(){
//        
//    }
//    
//    
//    
//     public function map(array $values) {
//        
//        foreach ($values as $key => $value) {
//           $method = 'set' . $key;
//            if ( method_exists($this, $method) ) {
//                $this->$method($value);
//            }       
//        } 
//        return $this;
//    }
//    
//    public function getAllValues(){
//        
//    }
        
        public function idExist($id) {
        
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM final_users WHERE UserID = :UserId");
         
        if ( $stmt->execute(array(':UserId' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        }
         return false;
    }
    
    
    
      public function save($model) {
                 
         $db = $this->getDB();
         
         $values = array( ":UserId" => $model->getUserId(),
                          ":Username" => $model->getUsername(),
                          ":Email" => $model->getEmail(),
                          ":Password" => $model->getPassword(),
                    );
         
                
         if ( $this->idExist($model->getPhonetypeid()) ) {
             $values[":UserID"] = $model->getUserId();
             $stmt = $db->prepare("UPDATE final_users SET UserID = :UserId, Username = :Username, "
                     ."Email = :Email, Password = :Password WHERE UserID = :UserId");
         } else {             
             $stmt = $db->prepare("INSERT INTO final_users SET UserID = :UserId, Username = :Username,"
                     ." Email = :Email, Password = :Password");
         }
         
         if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
            return true;
         }
         return false;
    }

}
