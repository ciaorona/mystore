<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store- Sign up </title>
    <script src="https://kit.fontawesome.com/8cadf86cae.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <div class="contener">
            <h1>Welcome to My Store</h1>
            <a href="index.html">Continue As a Guest</a>
        </div>
    </div>
    <!--========================LOGIN_FORM==================-->
    
    <?php include "includes/db.php"; ?>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conf_password = $_POST['confirm_password'];
        $hashpass = sha1($password);    
        $stmt = $connection-> prepare('INSERT INTO users( per_name, username, per_email, per_password) VALUES (?, ?,?,?)');
        $stmt -> execute(array($name, $username, $email, $hashpass));
        echo"thanks, you are sing up ";
        }else{
            echo"so bad ";
        }
    ?>
    <div class="login_form">
       
        <div class="contener">
            
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <h2>Sign Up</h2>
                <div class="input">
                    <label for="">Your name</label>
                    <input type="text" name="name" id="" required>
                </div>
                <div class="input">
                    <label for="">User Name</label>
                    <input type="text" name="username" id="" required>
                </div>
                <div class="input">
                    <label for="">Your Email</label>
                    <input type="text" name="email" id="" required>
                </div>
                <div class="input">
                    <label for="">Password </label>
                    <input type="password" name="password" id="" required>
                </div>
                <div class="input">
                    <label for="">Confirm your password </label>
                    <input type="password" name="confirm_password" id="" required>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="" id="">remember me 
                </div>
                <button type="submit">Sign Up</button>
                <p>Do you have an acount? <a href="login.php">log in</a></p>
            
            <div class="social_links">
                <p>Sign up with social Media</p>
                <a href=""><i class="fab fa-facebook-square"></i></a>
                <a href=""><i class="fab fa-google"></i></a>
                <a href=""><i class="fab fa-twitter-square"></i></a>
            </div>
        </form>
        </div>
    </div>
    
    <!--===========SOCIAL_ICONS===============-->
    <?php include"includes/footer.php"; ?>