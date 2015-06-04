<!DOCTYPE html>
<html>
    <head>
         <?php include './bootstrap.php';
    
    function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }?>
        
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
        $carID = filter_input(INPUT_GET, 'id');
        $car = new Car($dbConfig);
        $car = $cars->GetCarByID($carID);   
     
        var_dump($carID);
        var_dump($car);
       
        ?>
        
         <form action="#" method="post">
        <input type="text" name="carMake"/>
        <input type="text" name="carModel"/>
        <input type="hidden" name="carId"/>
        <input type="submit" value="Edit"/>
        </form>
        
        
    </body>
</html>
