<!DOCTYPE html>
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
         $db = new DB($dbConfig);
         
        $Renter = new Renter();
        
        $Name = filter_input(input, 'Name');
        $Address = filter_input(input_post, 'Address');
        $InsuranceProvider = filter_input(input_post, 'InsuranceProvider');
        
        $PostValues = array(
            //Insert key names into here
            
        );
        
        $Renter->map(filter_input_array(INPUT_POST));
       $Renter->save();//Need to make saving the user work.
        ?>
        
        <h1>Store your information</h1>
        <form action="#" method="post">
           
            Name:<input type="text" name="Name" />
             Address:<input type="text" name="Address"/>
             Insurance Provider:<input type="text" name="InsuranceProvider" />
          
             <input type="submit" value="Submit" />
            
        </form>
  
        
        
    </body>
</html>
