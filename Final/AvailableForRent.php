<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
   <head>
    <?php include './bootstrap.php';
    
    function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }
    
    ?>

    <title>Available</title>
    <style type="text/css">
        #CustomerId
        {
            width: 100px;
        }
        #results{
            background-color: #98d9e0;
            text-align: center;
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
    $customers = new RenterDao($db);
    $RenterId = $customers->getAllRows();
    $availableCars = $cars->getAvailable();
    
    
    if(isPostRequest())
    {
       $customerId = filter_input(INPUT_POST, 'customerID');
       $carid = filter_input(INPUT_GET, 'id');
       
       
    }
    
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
    <form action="#" method="post">
    <ul>
        <?php 
         
        foreach($availableCars as $value)
        {
           
            echo '<li>';
            
            echo $value->getCarMake(), ' ', $value->getCarName(),'- id: ' ,$value->getCarID(), ' ';
            echo '<a href="Rent.php?id=' , $value->getCarID() , '">Rent</a>';
            echo '</li>';
        }
        
        ?>
        </form>
    </ul>
    
</div>


</body>
</html>
