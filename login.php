<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in </title>
    <script src="https://kit.fontawesome.com/8cadf86cae.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <div class="contener">
            <h1>Welcome to My Store</h1>
            <a href="index.php" class="link">Continue As a Guest</a>
        </div>
    </div>
    <!--========================LOGIN_FORM==================-->
    <?php include 'includes/db.php'?>
    <?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        $hashpass = sha1($password);
        $stmt = $connection->prepare("SELECT * FROM users WHERE username=? AND per_password =?");
        $stmt->execute(array($username, $hashpass));
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);    

        if($count > 0 ){
            if ($row['per_role']==='admin'){
                $_SESSION['name'] = $row['username'];
                header("location:admin\dashboard.php");
                // comp---any role---------------
            }else{
                header("location:index.php");    
            }
        }else{
             echo"NOT FOUND" ;
        }
    }
    ?>
    <div class="login_form">
       
        <div class="contener"> 
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <h2>log in</h2>
                <div class="input">
                    <label for="">Username</label>
                    <input type="text" name="username" id="" required>
                </div>
                <div class="input">
                    <label for="">Password </label>
                    <input type="password" name="password" id="" autocomplete="oof" required>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="" id="">remember me 
                </div>
                <button type="submit">Log in</button>
                <p>Don't have a acount? <a href="signup.php">Sign up</a></p>
            
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
    <?php include "includes/footer.php"; ?>