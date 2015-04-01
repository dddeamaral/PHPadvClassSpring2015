<!DOCTYPE html>
<?php include './bootstrap.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $util = new Util(); //initializes the class
        $validator = new Validator(); //initializes the class in the lib folder
        $emaildb = new emailtypeDB();
        
        $emailType = filter_input(INPUT_POST, 'emailtype');
        $errors = array();
                
        
        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',      //sets the dbConfig variable to an array
        "DB_PASSWORD"=>''
        );

        $pdo = new DB($dbConfig); //creates the instance with the dbconfig to use in the next statement 
        $db = $pdo->getDB();//I think? that the dbcongif doesn't get passed in getDB since it was passed in initialization above.

        
        
        if( $util->isPostRequest() ){
        
            if( $validator->emailTypeIsValid($emailType) ){ //validation to check if the email type is valid. function in
                echo 'Everything is okay.'; //validator class. Stores the message in errrors array  
            }else{
                 $errors[] = 'Email type is not valid. Please try again';
                
            }
        
        }
        
        if( count($errors) > 0 ){ //if there is stuff stored in errors, then enter the statement block
            
            foreach($errors as $value){ //for every index, echo out its 'value'
            echo '<p>' . $value . '</p>'; //echoing out the value/error in between paragraph tags
            }
        } else {
            
          $emaildb->storeEmailType($db, $emailType);
            
         //$stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");   //prepares the statement variable with the statement
                    
        // $values = array(":emailtype"=>$emailType); // not entirely sure what this is doing...***********ask**************

         //   if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) { //run the statement at the execute function and check the row count
            //     echo 'Email Added';
         //   }       
        }
            
        
        
        ?>
        
         <h3>Add email type</h3>
        <form action="#" method="post">
            <label>Email Type:</label> 
            <input type="text" name="emailtype" value="<?php echo $emailType; ?>" placeholder="" />
            <input type="submit" value="Submit" />
        </form>
        
         
          <?php 
       
    $stmt = $db->prepare("SELECT * FROM emailtype where active = 1"); //selects all from the table basically

    if ($stmt->execute() && $stmt->rowCount() > 0) { //executes and checks to see if the rowcount is more than 0
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); //if it is, fetch all of the results and store it into results

        foreach ($results as $value) {//for each value in the results array
            echo '<strong><p>', $value['emailtype'], '</p></strong>'; //echo it out
        }
    } else { //else echo no data
        echo '<p>No Data</p>';
    }
    ?>
        
    </body>
</html>
