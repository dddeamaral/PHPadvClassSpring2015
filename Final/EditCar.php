<!DOCTYPE html>
<html>
    <head>
         <?php include './bootstrap.php';
    
    function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }
    
    ?>
        
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
             $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();

        $cars = new CarDao($db);
        $availableCars = $cars->getAvailable();
        
        
        
        
        ?>
        
        
        
       
        
        <?php 
         
        foreach($availableCars as $value)
        {
           
            echo '<li>';
            
            echo $value->getCarMake(), ' ', $value->getCarName(),'- id: ' ,$value->getCarID(), ' ';
            echo '<a href="edit.php?id=' , $value->getCarID() , '">Edit</a>';
            echo '</li>';
        }
        
        ?>
        
    </body>
</html>
