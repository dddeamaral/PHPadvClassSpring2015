<!DOCTYPE html>
<?php
include './bootstrap.php';


    $util = new Util();

        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();

        $DAO = new EmailDAO($db);
        $emailID = filter_input(INPUT_GET, 'id');

        $values = $DAO->getById($emailID);

        $email = filter_input(INPUT_POST, 'email');
        $active = filter_input(INPUT_POST, 'active');
        $emailTypeId = filter_input(INPUT_POST, 'emailtypeid');
        $emailtypeactive = $values->getEmailtypeactive();
        $emailType = $values->getEmailtype();
        $logged = $values->getLogged();
        $lastUpdated = $values->getLastupdated();
     
        $retrieveActive = $values->getActive();
        $retrieveEmail = $values->getEmail();
       
        $retrieveEmailType = $values->getEmailtype();
        $retrieveEmailTypeId = $values->getEmailtypeid();

        $arr = array(
            'emailid' => $emailID,
            'email' => $email,
            'emailtypeid' => $emailTypeId,
            'emailtype' => $emailType,
            'emailtypeactive' => $emailtypeactive,
            'logged' => $logged,
            'lastupdated' => $lastUpdated,
            'active' => $active
        );
        
        $emailTypeDAO = new EmailTypeDAO($db);
        $emailTypes = $emailTypeDAO->getAllRows();
        

        if($util->isPostRequest())
        {
                
            $model = new EmailModel();
            $model->map($arr);

            if ( $emailID !== NULL ) {
           
                if ( $DAO->save($model) ) {
                    echo 'Update Successful';
                    header('Location: Email-Test.php');
                }
                else{
                    echo 'Updated was unsuccessful. Try again.';
                    echo '<p><a href="Email-Test.php">Go back</a></p>'; 
                }
            }
        }
?>
        <h3>Update Your Information</h3>
        <form action="#" method="post">
        
            <label>Email:</label>            
        <input type="text" name="email" value="<?php echo $retrieveEmail; ?>" placeholder="" />
        <br />
        
        <label>Active:</label>
        <input type="number" max="1" min="0" name="active" value="<?php echo $retrieveActive; ?>" />

        <br />
        <label>Email Type:</label>
        <select name="emailtypeid" text="<?php echo $retrieveEmailType; ?>" value="<?php echo $retrieveEmailType; ?>" >
            
        <?php 
            foreach ( $emailTypes as $value ) {
                if ( $value->getEmailtypeid() == $retrieveEmailTypeId ) 
                {
                    echo '<option value="',$value->getEmailtypeid(),'" selected="selected">',$value->getEmailtype(),'</option>';  
                } 
                else 
                    {
                    echo '<option value="',$value->getEmailtypeid(),'">',$value->getEmailtype(),'</option>';
                    }
            }
        ?>
        </select>
            
             <br /><br />
            <input type="submit" value="Update" />
        </form>