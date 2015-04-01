<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of emailtypeDB
 *
 * @author 001327813
 */
class emailtypeDB {
    
    public function storeEmailType($db, $emailType){
        
    
        
        
          $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',      //sets the dbConfig variable to an array
        "DB_PASSWORD"=>''
        );

      
        
        
         $stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");   //prepares the statement variable with the statement
                    
         $values = array(":emailtype"=>$emailType); // not entirely sure what this is doing...***********ask**************

            if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) { //run the statement at the execute function and check the row count
                return 'Email Added';
            }       
       
    }
    
 
    
}
