<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\models\services;

use App\models\interfaces\IDAO;
use App\models\interfaces\IModel;
use App\models\interfaces\ILogging;
use \PDO;

class EmailDAO extends BaseDAO implements IDAO 
{
    
    public function __construct( PDO $db, IModel $model, ILogging $log ) {     //default constructor   
        $this->setDB($db);
        $this->setModel($model);
        $this->setLog($log);
    }
    
    public function idExisit($id) {//checks for an email where the id matches the one passed in
                
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT emailid FROM email WHERE emailid = :emailid");
         
        if ( $stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        }
         return false;
    }
 
    public function read($id) {
         
         $model = clone $this->getModel();//read statement/select statement
         
         $db = $this->getDB();
         
         $stmt = $db->prepare("SELECT email.emailid, email.email, email.emailtypeid, emailtype.emailtype, emailtype.active as emailtypeactive, email.logged, email.lastupdated, email.active"
                 . " FROM email LEFT JOIN emailtype on email.emailtypeid = emailtype.emailtypeid WHERE emailid = :emailid");
         
        if ( $stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
             $model->map($results);
        }
         
        return $model;
         
        
    }
    
    public function create(IModel $model) {//create function otherwise known as an insert into the email table

     $db = $this->getDB();
     $binds = array( ":email" => $model->getEmail(),
                     ":active" => $model->getActive(),
                     ":emailtypeid" => $model->getEmailtypeid()             
                );

     if ( !$this->idExisit($model->getEmailid()) ) {

         $stmt = $db->prepare("INSERT INTO email SET email = :email, emailtypeid = :emailtypeid, active = :active, logged = now(), lastupdated = now()");

         if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return true;
         }
     }


     return false;
}   
    public function update(IModel $model) { //takes in a model

             $db = $this->getDB();
           
            $binds = array( ":email" => $model->getEmail(), 
                            ":active" => $model->getActive(),
                            ":emailtypeid" => $model->getEmailtypeid(),
                            ":emailid" => $model->getEmailid()
                        );


             if ( $this->idExisit($model->getEmailid()) ) {//uses IDExisit function from above to check for an existing ID and updates it below

                 $stmt = $db->prepare("UPDATE email SET email = :email, emailtypeid = :emailtypeid,  active = :active, lastupdated = now() WHERE emailid = :emailid");

                 if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
                    return true;
                 } else {
                     $error = implode(",", $db->errorInfo());
                     $this->getLog()->logError($error);
                 }

             } 

             return false;
        }
    
    public function delete($id) {
     
        $db = $this->getDB();     //Take in an ID from the hidden field and delete returns bool    
        $stmt = $db->prepare("Delete FROM email WHERE emailid = :emailid");

        if ( $stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        } else {
            $error = implode(",", $db->errorInfo());
            $this->getLog()->logError($error);
        }
         
         return false;
    }
  
    public function getAllRows() {
       $db = $this->getDB();
       $values = array();
                                                //Select statement to get all the rows and returns an array with values from db
        $stmt = $db->prepare("SELECT email.emailid, email.email, email.emailtypeid, emailtype.emailtype, emailtype.active as emailtypeactive, email.logged, email.lastupdated, email.active"
                 . " FROM email LEFT JOIN emailtype on email.emailtypeid = emailtype.emailtypeid");
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $value) {
               $model = clone $this->getModel();
               $model->reset()->map($value);
               $values[] = $model;
            }
        }
        
        $stmt->closeCursor();
         return $values;
    }
    
}

