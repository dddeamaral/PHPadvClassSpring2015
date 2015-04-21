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

            $EmailModel = new EmailModel();
            $EmailDAO = new EmailDAO($db);
            
            
             $GetemailDAO = filter_input(INPUT_GET, 'id');
    
            $EmailDAO->delete($EmailModel->getEmailid());
            if ( NULL !== $GetemailDAO ) 
            {
                if ( $EmailDAO->delete($GetemailDAO) ) 
                {
                    echo 'Email was deleted';
                }
            }


echo '<p><a href="',filter_input(INPUT_SERVER, 'HTTP_REFERER'),'">Go back</a></p>';

        ?>
        
    </body>
</html>
