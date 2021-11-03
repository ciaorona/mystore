<?php include 'db.php';

session_start();?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>My Store</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/8cadf86cae.js" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script src="js/jquery-3.5.1.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script>
            $(document).ready(function() {
                  $(".button").click(function(){
                    var name =$(this).attr("data_filter");
                    if (name=="all"){
                        $(".filter").show("2000");
                    }
                    else{
                        
                        if($(".filter").filter("."+name  ).length ===0){
                            $('.products_card .contener').append('<span class="none">No products with category '+name +'</span>');
                        }else{
                            $(".products_card .contener .none").hide();
                        }
                        $(".filter").filter("."+name  ).show("2000");
                        $(".filter").not("."+name).hide("2000");
                       
                        
                        
                    }
                    });
               
                $(".text_categories a").click(function(){
                    $(this).addClass("active").siblings().removeClass("active");
                });
                
            });    
            </script>
    </head>

    <body>
        <!-- ===================HEADER======================== -->

        <!----------------HEADER///PART_ONE-------------->
        <div class="part_one"  id="part_one">
            <div class="contener">
                <div class="links">
                    <a href=""><i class="fas fa-phone-alt"></i><span class="hidden_two">+987-44-58-78</span></a>
                    <a href=""><i class="fas fa-envelope"></i><span class="hidden_two">example@gmail.com</span></a>
                </div>
                <div class="money_type">
                    <select name="coin" id="">
                        <option>&#36;&nbsp;&nbsp;USD</option>
                        <option value="">&#8364;&nbsp;&nbsp;Europ</option>
                        <option value="">&#163;&nbsp;&nbsp;UK</option>
                        <option value="">&#65020;&nbsp;&nbsp;المملكه السعودية</option>
                    </select>
                    
                    <?php
                        if(isset($_SESSION['name'])){
                            $profile_info=$connection->prepare("SELECT * FROM users WHERE  username=?");
                            $profile_info->execute(array($_SESSION['name']));
                            $row=$profile_info->fetch(PDO::FETCH_ASSOC);
                            if($row['per_role'] == "admin"){
                                echo'<a href="admin/dashboard.php"><i class="fas fa-user"></i>Admin <a href="index.php?logout"><i class="fas fa-sign-out-alt"></i></a></a>';
                            }else if($row['per_role'] == "company"){
                                echo'<a href="company/dashboard.php"><i class="fas fa-user"></i>Admin<a href="index.php?logout"><i class="fas fa-sign-out-alt"></i></a></a>';
                            }else if($row['per_role'] == "user"){
                                echo'<a href="profile.php"><i class="fas fa-user"></i>Account <a href="index.php?logout"><i class="fas fa-sign-out-alt"></i></a></a>';
                            }     
                        }else{
                            echo '<a href="login.php"><i class="fas fa-sign-in-alt"></i>Log in</a>';

                        }


                        if(isset($_GET['logout'])){
                            session_unset();
                            session_destroy();
                            header("location:login.php");
                        }
                    ?>

                   
                </div>
            </div>
        </div>
        <!----------------HEADER///PART_TWO-------------->
        <div class="part_two"id="part_two">
            <div class="contener">
            <h1><a href="index.php" style="color:white;">My Store</a></h1>
                <div class="search_part" id="search_part">
                    <input type="search" name="" id="" placeholder="search..">
                    <button type="submit"><i class="fas fa-search"></i>search</button>
                </div>
                <div class="links_two">
                    <a href="wishlist.php" ><i class="fas fa-heart wish_contaner">
                    <?php
                        if(isset($_SESSION['name']))
                            {
                                ?>
                                <span class="show_wish">
                                    <?php 
                                
                                    $count =$connection->prepare("SELECT * FROM wishlist WHERE username=?" );
                                    $count->execute([$_SESSION['name']]);
                                    $num = $count->rowCount();
                                    echo $num;
                                ?>
                                </span>
                                <?php
                            }
                    ?>
                    </i><span class="hidden_one">Wish List</span></a>
                    <a href="cart.php"><i class="fas fa-shopping-cart cart_icon">
                        <?php
                        if(isset($_SESSION['name']))
                        {
                            ?>
                            <span class="show_cart">
                                <?php 
                               
                                $count =$connection->prepare("SELECT * FROM cart WHERE username=?" );
                                $count->execute([$_SESSION['name']]);
                                $num = $count->rowCount();
                                echo $num;
                              ?>
                            </span>
                            <?php
                        }
                        ?>
                    </i><span class="hidden_one">Your Cart</span></a>
                    <a  class="search_icon" id="search_icon"><i class="fas fa-search"></i></a>
                    <a  class="hidden_bars" id="hidden_bars" ><i class="fas fa-bars"></i></a>
                </div>
            </div>
        </div>
        
        <!-------------HEADER///PART_THREE-------------->
        <div class="part_three" id="part_three">
            <div class="contener">
                <a href="index.php">Home</a>
                <a href="index.php">Hot Deals</a>
                <a href="index.php" id="Laptopsup">Laptops</a>
                <a id="Phonesup">Phones</a>
                <a  id="Accessoriesup">Accessories</a>
                <a  id="Camerasup">Cameras</a>
            </div>
        </div>

