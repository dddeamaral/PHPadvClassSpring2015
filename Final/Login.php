<!DOCTYPE html>
<?php  include 'bootstrap.php' ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    <style>
        .Login
        {
            background-color: #3399FF;
            text-align: center;
             vertical-align: middle;
            height:250px;
        }
        .LoginBox
        {
        background-color:  #66CCFF;
        text-align: center;
        width: 20%;
        height:150px;
        margin: 0 auto;
        margin-top: auto;
        display: inline-block;
      
        }
        .content{
            vertical-align: auto;
            text-align: center;
        }
        
    </style>
    
    <body>
        <?php
          $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
        $User = new User($dbConfig);
        
        $Email = filter_input(INPUT_POST, 'txtEmail');
        $Password = filter_input(INPUT_POST, 'txtPassword');
        
        $User->setEmail($Email);
        $User->setPassword($Password);
        $feedback = '';
      
        if($User->isPostRequest()){
            
            if($User->login($User))
            {
                $feedback = '<h1>Login was successful</h1>';
                header('AddCar.php');
                //$_SESSION['Loggedin'] = true;  MEANT TO MAKE SESSSIONED LOGINS FUNCTION.
            }
            else
            {
               $feedback = '<h1>Login was not successful</h1>';
               // $_SESSION['Loggedin'] = '';           
            }
            
        }
        ?>
        <div class="Login">
        <form action="#" method="post">
            <p><?php  if(isset($feedback)){  echo $feedback; } ?></p>
            <h1>Login</h1>
            <div class="LoginBox">  
                <div class="content">
                Email:<input name="txtEmail" type="text" /><br/>
                Password:<input name="txtPassword" type="password" /><br/>
                <input value="Log In!" type="submit" />
                </div>
            </div>
        </form>
        </div>
        
        
    </body>
</html>
