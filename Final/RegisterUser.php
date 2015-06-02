<!DOCTYPE html>
<?php include './bootstrap.php'; 

   function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }

?>
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
            
            
        
//        var_dump($Username);
//        var_dump($Email);     //Gets expected information
        //var_dump($Password);
//        echo '<br/>';
      
      
      $feedback = '';
      
      if(isPostRequest()){
//            echo '<br/>';
       
       
        $Username = filter_input(INPUT_POST, 'txtUserName');
        $Email = filter_input(INPUT_POST, 'txtEmail');
        $Password = filter_input(INPUT_POST, 'txtPassword');
        
         $hashword = password_hash($Password, PASSWORD_DEFAULT);
        
        $User->setEmail($Email);
       $User->setUsername($Username);
       $User->setPassword($hashword);
       
        
          if($Username != null && $Email != null && $Password != null){
                    if($User->save($User)){
                        $feedback = 'User was saved <b>successfully</b>';
                    }else{
                        $feedback = 'User was <b>not</b> saved successfully.';
                    }
                }else{
                    $feedback = 'Please enter all fields.';
                }
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

<br/>
    <div class="Login">
        <h1>REGISTER A USER</h1>

                    <h1><?php if(isset($feedback)){ echo $feedback; }                        ?></h1>
                    
        <br/>
        <form action="#" method="post">
        Username:<input type="text" name="txtUserName" /><br/>
        Email:<input type="text" name="txtEmail" /><br/>
        Password:<input type="password" name="txtPassword"/><br/>
        <input type="submit" value="Sign up!" />
     
        </form>
    </div>
    
    </body>
</html>
