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

     public function closeDB() {    //9:10 5/26/2015    
        $this->db = null;        
    }
    
    function getUserId() {//9:10 5/26/2015
        return $this->UserId;
    }

    function setUserId($UserId) {//9:10 5/26/2015
        $this->UserId = $UserId;
    }
    
    function getUsername() {//9:10 5/26/2015
        return $this->Username;
    }

    function getEmail() {//9:10 5/26/2015
        return $this->Email;
    }

    function getPassword() {//9:10 5/26/2015
        return $this->Password;
    }

    function setUsername($Username) {//9:10 5/26/2015
        $this->Username = $Username;
    }

    function setEmail($Email) {//9:10 5/26/2015
        $this->Email = $Email;
    }

    function setPassword($Password) {//9:10 5/26/2015
        $this->Password = $Password;
    }

     public function isPostRequest() { //9:10 5/26/2015
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
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
    public function login($model) {
         
        $email = $model->getEmail();
        $password = $model->getPassword();
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM final_users WHERE Email = :Email");
        if ( $stmt->execute(array(':Email' => $email)) && $stmt->rowCount() > 0 ) {            
            $results = $stmt->fetch(PDO::FETCH_ASSOC);            
            return password_verify($password, $results['Password']);            
        }
         
        return false;
    }
    
        
        public function idExist($id) {//9:10 5/26/2015
        
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM final_users WHERE UserID = :UserId");
         
        if ( $stmt->execute(array(':UserId' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        }
         return false;
    }
    
     public function redirect($page, array $params = array()) {
        header('Location: ' . $this->createLink($page, $params));
        die();
    }
//        
//    public function Login($username, $password){
//         $db = $this->getDB();
//    
//         $values = array(
//             ":Username"=> $username,
//             ":Password"=>$password
//         );
//         $stmt = $db->prepare("SELECT Username, Password FROM final_users Where Password = :Password AND Username = :Username");
//         
//          if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
//            return true;
//         }
//         return false;
//    }
    
      public function save($model) {//9:10 5/26/2015
                 
         $db = $this->getDB();
         
         $values = array( ":Username" => $model->getUsername(),
                          ":Email" => $model->getEmail(),
                          ":Password" => $model->getPassword(),
                    );
                
//         if ( $this->idExist($model->getUserId()) ) {
//             $values[":UserId"] = $model->getUserId();
//             $stmt = $db->prepare("UPDATE final_users SET UserID = :UserId, Username = :Username, "
//                     ."Email = :Email, Password = :Password WHERE UserID = :UserId");
//         } else {             
             $stmt = $db->prepare("INSERT INTO `final_users`(`Username`, `Email`, `Password`) VALUES (:Username,:Email,:Password)");
         //}
         
         if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
            return true;
         }
         return false;
    }

    
    public function update($model) {     //9:10 5/26/2015
                 
         $db = $this->getDB();
         
         $values = array( ":UserId" => $model->getUserId(),
                          ":Username" => $model->getUsername(),
                          ":Email" => $model->getEmail(),
                          ":Password" => $model->getPassword(),
                    );
                
         if ( $this->idExist($model->getUserId()) ) {
             $values[":UserId"] = $model->getUserId();
             $stmt = $db->prepare("UPDATE final_users SET UserID = :UserId, Username = :Username, "
                     ."Email = :Email, Password = :Password WHERE UserID = :UserId");
         } else {             
             $stmt = $db->prepare("INSERT INTO `final_users`(`Username`, `Email`, `Password`) VALUES (:Username,:Email,:Password)");
         }
         
         if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
            return true;
         }
         return false;
    }
    
    
}
