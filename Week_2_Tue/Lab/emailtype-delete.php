<!DOCTYPE html>
<?php include './bootstrap.php' ?>
<html>
    <head>
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

            $EmailtypeModel = new emailtypeModel();
            $EmailtypeDAO = new emailtypeDAO($db);
            
            
             $GetemailID = filter_input(INPUT_GET, 'id');
    
            $EmailtypeDAO->delete($EmailtypeModel->getEmailtypeid());
            if ( NULL !== $GetemailID ) 
            {
                var_dump($GetemailID);
                if ( $EmailtypeDAO->delete($GetemailID) ) 
                {
                    echo 'Email type was deleted';
                }else{
                    echo 'Email was not deleted';
                }
                
            }


echo '<p><a href="',filter_input(INPUT_SERVER, 'HTTP_REFERER'),'">Go back</a></p>';

        
        ?>
    </body>
</html>
