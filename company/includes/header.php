<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <script src="https://kit.fontawesome.com/8cadf86cae.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/adstyle.css">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<body>
    
<?php include "../includes/db.php"?>
<body>
<div class="header">
        <div class="contener">
            <span class=" admin-menu"> <i class="fas fa-bars"></i></span>
            <h2>Welcome to Dashboard</h2>
            <div class="nav-buttons">
                <a href="../index.php" class="link">Home Site</a>
                <ul  class="link admin_pro">
                    <li  >
                        <span class="dropdown_admin_name">
                            <?php
                            session_start();
                        
                            if(isset($_SESSION['name'])){
                                echo $_SESSION['name'];
                            }else{
                                header("location:../login.php");
                            }
                            ?>
                        
                        <i class="fas fa-sort-down"></i></span>
                        <ul class="dropdown_manu">
                            <li><a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a></li>
                            <li><a href="dashboard.php?logout"><i class="fas fa-sign-out-alt"></i>Log Out</i></a></li>
                            <?php
                                if(isset($_GET['logout'])){
                                    session_unset();
                                    session_destroy();
                                    header("location:../login.php");
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content_pro">
            <div class="nav">
            <ul class="main">
                    <li class="sub_name2 sub_name"><span><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard </a></span></li>
                    <li><a href="product.php"><i class="fas fa-object-ungroup"></i>All Products</a></li>
                    <li><a href="product.php?bdgs=add_product"><i class="fas fa-folder-plus"></i>Add Product</a></li>                </ul>
            </div>