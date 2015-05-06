<!DOCTYPE html>
<?php include './bootstrap.php' ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
   
        $util = new Util();

        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();

        $EmailTypeDAO = new emailtypeDAO($db);
        $ID = filter_input(INPUT_GET, 'id');
        
        $values = $EmailTypeDAO->getById($ID);

        $emailTypeId = filter_input(INPUT_POST, 'emailtypeid');
        $postEmailType = filter_input(INPUT_POST, 'emailtype');
        $emailactive = filter_input(INPUT_POST, 'active');
        
        $arr = array(
            'emailtypeid' => $emailTypeId,
            'emailtype' => $postEmailType,
            'active' => $emailactive
        );
       
       
        $emailTypes = $EmailTypeDAO->getAllRows();
        
        
        if($util->isPostRequest())
        {
           
            $model = new emailtypeModel();
            $model->map($arr);
            
            if ( $ID !== NULL ) {
            
                if ( $EmailTypeDAO->save($model) ) {
                    echo 'Update Successful';
                    header('Location: emailtype-Test.php');
                }
                else{
                    echo 'Update was unsuccessful. Try again.';
                    echo '<p><a href="emailtype-test.php">Go back</a></p>'; 
                }
            }
        }
?>
        <h3>Update Your Information</h3>
        <form action="#" method="post">
        
            <input name="emailtypeid" type="hidden" value="<?php echo $values->getEmailtypeid(); ?>"/>
            
        <label>Active:</label>
        <input type="number" max="1" min="0" name="active" value="<?php echo $values->getActive(); ?>" />

        <br />
        <label>Email Type:</label>
        <select name="emailtype" text="<?php echo $values->getEmailtype(); ?>" value="<?php echo $values->getEmailtype(); ?>" >
            
        <?php 
            foreach ( $emailTypes as $value ) {
                if ( $value->getEmailtypeid() == $values->getEmailtypeid() ) 
                {
                    echo '<option value="',$values->getEmailtype(),'" selected="selected">',$values->getEmailtype(),'</option>';  
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
        
    </body>
</html>
