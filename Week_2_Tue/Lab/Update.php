<!DOCTYPE html>
<?php include './bootstrap.php' ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
        /*
         $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
         
        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();
        
        $emailDAO = new emailDAO($db);
        $emailModel = new emailModel();
        $util = new Util();
        $validator = new Validator();
        
        $EmailID = filter_input(INPUT_GET, 'id');
   
        $Values = $emailDAO->getAllRows($EmailID);
        
        if ( $util->isGetRequest() ) {
            
            $emailModel->map(filter_input_array($Values));
                       
        } else {
            $Emailid = filter_input(INPUT_GET, 'emailtypeid'); //finish looking at the code on Gabes page  https://github.com/gforti/PHPadvClassSpring2015/blob/master/week2/demos/tue/update.php
            $phonetypeModel = $phoneTypeDAO->getById($EmailID);
        }
        
        */
        ?>
        
        <h2>Update Info</h2>
        <form action="#" method="post">
            <input type="hidden" value="<?php echo $Emailid;  ?>" name="emailtypeid"/>
           Email: <input type="text" value="<?php echo $email;  ?>" name="email"/><br/>
           Active: <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" /><br/>
           <select name="emailtypeid"  text="<?php echo $getEmailType; ?>" value="<?php echo $emailTypeid; ?>" /><br/>
            <input type="button" value="Submit"/>
        </form>
        
    </body>
</html>
