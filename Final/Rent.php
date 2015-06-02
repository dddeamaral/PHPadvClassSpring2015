<!DOCTYPE html>
 <?php include './bootstrap.php';
    
    function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }
    
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<div>
    <a href="AvailableForRent.php" style="border-style: outset; border-width: medium"> Avaliable for Rent </a>&nbsp;&nbsp;
    <a href="Rented.php" style="border-style: outset; border-width: medium"> Out for Rent </a>&nbsp;&nbsp;
    <a href="AddCar.php" style="border-style: outset; border-width: medium"> Add Car </a>&nbsp;&nbsp;
    <a href="Login.php" style="border-style: outset; border-width: medium"> Login </a>&nbsp;&nbsp;
</div>
    <br/><br/><br/>
        <?php
           $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
        
        
        $carid = filter_input(INPUT_GET, 'id');
        $car = new Car($dbConfig);
        if(isPostRequest()){
         
            $customerid = filter_input(INPUT_POST, 'customerID');
            if($car->RentCar($carid, $customerid)){
                echo '<h1>Rent was successful</h1>';
            }else{
                echo 'Rent was unsuccessful';
            }
        }
        
        
        ?>
        
        <form action="#" method="post">
        Enter a customer ID to rent this car, Then hit submit.</br>
        Customer ID:&nbsp;<input type="text" name="customerID"  />
        <input type="submit" value="Submit"/>
        </form>
        
    </body>
</html>
