<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        <?php
        $username = filter_input(INPUT_POST, 'txtUserName');
        $Email = filter_input(INPUT_POST, 'txtEmail');
        $Password = filter_input(INPUT_POST, 'txtPassword');
        
       $hashword = password_hash($Password, PASSWORD_DEFAULT);
       
       $Renter = new Renter();
       
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
        <<form action="#" method="post">
        Username:<input type="text" id="txtUserName" /><br/>
        Email:<input type="text" id="txtEmail" /><br/>
        Password:<input type="password" id="Password"/><br/>
        <input type="submit" value="Sign up!" />
        </form>
    </div>
    
    </body>
</html>
