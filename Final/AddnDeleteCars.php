<!DOCTYPE html>
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
                background-color: Blue;
                border-color: black;
                border-style: dashed;
                display: table;
                margin: 0 auto;
            }
            
        </style>
        
    </head>
    <body>
        <?php
        
        $CarName = filter_input(INPUT_POST, 'CarName');
        $Id = filter_input(INPUT_POST, 'CarID');
        $CarMake = filter_input(INPUT_POST, 'CarMake');
        $Rentable = filter_input(INPUT_POST, 'Rentable');
        
        
        
        ?>
        <!--  --> 
        <div class="createdelete">
        <h1>ADD OR DELETE A CAR</h1>
        <div class="form1">
        <form action="#" method="post" >
             <input type="hidden" id="CarID"/> <br/> <!--Car ID that will be used to delete--> 
       Car Name: <input type="text" id="CarName" /><br/>
       Car Make:<input type="text" id="CarMake"/><br/>
       Car Rentable:<input type="text" id="Rentable"/><br/>
       <input type="submit" value="ADD" id="Add" />&nbsp;&nbsp;&nbsp;
       <input type="submit" value="DELETE" id="Delete"/>
        </form>
            </div>
        </div>
    </body>
</html>
