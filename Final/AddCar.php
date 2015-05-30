<!DOCTYPE html>
<?php  include 'bootstrap.php' ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            
            .createdelete{
                background-color: red;
                text-align: center;
                width:100%;
            }
            .form1{
                width:25%;
                height:250px;
                text-align: center;
                color:white;
                background-color: #66CCFF;
                border-color: black;
                border-style: dashed;
                display: table;
                margin: 0 auto;
            }
            
        </style>
        
    </head>
    <body>
        <?php
         $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );

        $car = new Car($dbConfig);
        
        
        if($car->isPostRequest()){
        $CarName = filter_input(INPUT_POST, 'CarName');
       
        $CarMake = filter_input(INPUT_POST, 'CarMake');
        $Rentable = filter_input(INPUT_POST, 'Rentable');

        $car->setCarMake($CarMake);
        $car->setCarName($CarName);
        $car->setRentable($Rentable);
       
        if($car->save($car)){
            echo 'Car was added';
        }else{
            echo 'car was not added';
        }

        }
        ?>
        <!--  --> 
        <div class="createdelete">
        <h1>ADD A CAR</h1>
        <div class="form1">
        <form action="#" method="post" >
             
       Car Name: <input type="text" name="CarName" /><br/>
       Car Make:<input type="text" name="CarMake"/><br/>
       Rentable:<select name="Rentable">
           <option value="1">True</option>
           <option value="0">False</option>
       </select>
       <!--Car Rentable:<input type="text" name="Rentable"/><br/>-->
       <input type="submit" value="ADD" name="Add" />&nbsp;&nbsp;&nbsp;

        </form>
            </div>
        </div>
    </body>
</html>
