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
        $customerId = filter_input(INPUT_POST, 'customerId');
       
        
    }
    
    ?>
    
    
<div>
    <a href="AvailableForRent.php" style="border-style: outset; border-width: medium"> Avaliable for Rent </a>&nbsp;&nbsp;
    <a href="Rented.php" style="border-style: outset; border-width: medium"> Out for Rent </a>&nbsp;&nbsp;
<a href="" style="border-style: outset; border-width: medium"> Customer Status </a>&nbsp;&nbsp;
<a href="" style="border-style: outset; border-width: medium"> Admin </a>&nbsp;&nbsp;
</div>
<br />
<br />


<div id = "results" style="border-style: inset; border-width: medium">

    <ul>
        <?php 
         
        foreach($availableCars as $value)
        {
           
            echo '<li>';
            
            echo $value->getCarMake(), ' ', $value->getCarName(),'- id: ' ,$value->getCarID(), ' ';
            echo '<a href="RentCar.php">Rent</a>';
            echo '</li>';
        }
        
        ?>
        
    </ul>
    
</div>


</body>
</html>
