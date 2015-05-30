<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        ?>
        
        <table>
            <tr>
                <th>Car Name</th>
                <th>Car Make</th>
                <th>Rentable</th>
                <th>Delete</th>
                    
            </tr>
            <?php  echo  '<td><a href="DeleteCar.php?id=',$value->getCarID() ,'">Delete</a></td>' ?>
            
        </table>
        
    </body>
</html>
