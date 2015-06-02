<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
        <?php include './bootstrap.php'; ?>
    <title>Rented</title>
    <style type="text/css">
        #Year
        {
            width: 100px;
        }
        #Make
        {
            width: 100px;
        }
        #Model
        {
            width: 125px;
        }
    </style>
</head>
<body>
    
        <?php
        // put your code here
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
    $pdo = new DB($dbConfig);
    $db = $pdo->getDB();
        
    $cars = new CarDao($db);
    $availableCars = $cars->getUnAvailable();
    
    
    ?>
    
<div>
    <a href="AvailableForRent.php" style="border-style: outset; border-width: medium"> Avaliable for Rent </a>&nbsp;&nbsp;
    <a href="Rented.php" style="border-style: outset; border-width: medium"> Out for Rent </a>&nbsp;&nbsp;
    <a href="AddCar.php" style="border-style: outset; border-width: medium"> Add Car </a>&nbsp;&nbsp;
    <a href="Login.php" style="border-style: outset; border-width: medium"> Login </a>&nbsp;&nbsp;
</div>
<br />
<br />


<div id = "results" style="border-style: inset; border-width: medium">

    
    <ul>
        <?php 
        foreach($availableCars as $value)
        {
            
            echo '<li>';
            echo $value->getCarMake(), ' ', $value->getCarName(),'- id: ' ,$value->getCarID(),'- Rented To: ', $value->getCustomerID() , ' <a href="ReturnCar.php?id=' , $value->getCarID() , '">Return</a>';
            echo '</li>';
            
        }
        
        ?>
        
    </ul>
    
</div>




</body>
</html>