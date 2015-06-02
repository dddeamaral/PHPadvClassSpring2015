<!DOCTYPE html>
<html>
    <?php include './bootstrap.php';?>
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
           
        $car = new Car($dbConfig);
           
        $carid = filter_input(INPUT_GET, 'id');
        var_dump($carid);
        if($car->ReturnCar($carid)){
            echo 'Return was success';
        }else{
            echo 'it wasnt';
        }
        
        ?>
    </body>
</html>
