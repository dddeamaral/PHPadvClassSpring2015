<?php include './bootstrap.php'; ?>
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
           
               $pdo = new DB($dbConfig);
               $db = $pdo ->getDB();
           
            $emailtypeModel = new EmailTypeModel();
            $filterarray = filter_input_array(INPUT_POST);
           
            if($filterarray == null){
                $filterarray = array();
            }
                
                $emailtypeModel->map($filterarray);
           
            $emailtypeid = $emailtypeModel->getEmailtypeid();
            $emailType = $emailtypeModel->getEmailtype();
            $active = $emailtypeModel->getActive();  
            $emailTypeDAO = new EmailTypeDAO($db);
           
          
           
           $util = new Util();
      
           
           if( $util->isPostRequest() ){
               
               $validator = new Validator();
               $errors = array();
           
               if( !$validator->emailTypeIsValid( $emailType ) ){
                   $errors[] = 'email type is not valid';
               }
            
               if( !$validator->activeIsValid($active) ){
                   $errors[] = 'active is not valid.';
               }
           
               if( count($errors) > 0 ){
                   foreach ($errors as $errz){
                       echo '<p>' , $errz , '</p>';
                   }
               }else{
                   $emailtypeDAO = new emailtypeDAO($db);
                   
                   $emailtypeModel = new emailtypeModel();
                   $emailtypeModel->setActive($active);
                   $emailtypeModel->setEmailtype($emailType);
                   
                   if($emailtypeDAO->save($emailtypeModel)){
                       echo 'Email Type added.';
                   }
               }
           }
        
        ?>
        
        
        <h3>Add email type</h3>
        <form action="#" method="post">
            <input type="hidden" name="emailtypeid" value="<?php echo $emailtypeid; ?>" />
            <label>Email Type:</label> 
            <input type="text" name="emailtype" value="<?php echo $emailType; ?>" placeholder="" />
            <br /><br />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
             <br /><br />
            <input type="submit" value="Submit" />
            
            <table border="1" cellpadding="5">
                <tr>
                    <th>Email ID</th>
                    <th>Email Type</th>
                    <th>Active</th>
                    <th>Delete</th>
                    <th>Update</th>
                   
                </tr>
            <?php 
             $emailTypes = $emailTypeDAO->getAllRows();
                foreach ($emailTypes as $value) {
                  
                        echo '<tr><td>',$value->getEmailtypeid(),'</td><td>',$value->getEmailtype(),'</td>';  
                        echo  '<td>', ( $value->getActive() == 1 ? 'Yes' : 'No') ,'</td><td><a href="emailtype-delete.php?id=',$value->getEmailtypeid() ,'">Delete</a></td><td><a href="emailtype-update.php?id=' , $value->getEmailtypeid() , '">Update</a></td></tr>' ;
               
                }
            ?>
                </table>
        </form>
    </body>
</html>
