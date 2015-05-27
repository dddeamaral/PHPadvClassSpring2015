<!DOCTYPE html>
<?php include './bootstrap.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        <?php
       $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',      
        "DB_PASSWORD"=>''
        );

        //$pdo = new DB($dbConfig);
       
       $User = new User($dbConfig);
        //$User->setDbConfig($dbConfig);
        if($User->isPostRequest()){
            
            
        
        $Username = filter_input(INPUT_POST, 'txtUserName');
        $Email = filter_input(INPUT_POST, 'txtEmail');
        $Password = filter_input(INPUT_POST, 'txtPassword');
//        var_dump($Username);
//        var_dump($Email);     //Gets expected information
        //var_dump($Password);
        echo '<br/>';
       $hashword = password_hash($Password, PASSWORD_DEFAULT);
      
      
       $User->setEmail($Email);
       $User->setUsername($Username);
       $User->setPassword($hashword);
        var_dump($User);
        echo '<br/>';
            if($User->save($User)){
                echo 'User was saved successfully';

            }else{
                echo 'User was not saved successfully.';
            }
        }
        ?>
        
            <title>Home</title>
    <style type="text/css">
    a { color: inherit; } 
    
    .Login
    {
        background-color: #dedede;
        text-align:center;
        color: darkblue;
        border-color: blue;
        
    }
    </style>
</head>
<body>
<div>
<a href="" style="border-style: outset; border-width: medium"> Avaliable for Rent </a>&nbsp;&nbsp;
<a href="" style="border-style: outset; border-width: medium"> Out for Rent </a>&nbsp;&nbsp;
<a href="" style="border-style: outset; border-width: medium"> Customer Status </a>&nbsp;&nbsp;
<a href="" style="border-style: outset; border-width: medium"> Admin </a>&nbsp;&nbsp;
</div>
<br/>
    <div class="Login">
        <h1>REGISTER A USER</h1>
        
        <form action="#" method="post">
        Username:<input type="text" name="txtUserName" /><br/>
        Email:<input type="text" name="txtEmail" /><br/>
        Password:<input type="password" name="txtPassword"/><br/>
        <input type="submit" value="Sign up!" />
     
        </form>
    </div>
    
    </body>
</html>
