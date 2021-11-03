<?php include "includes/header.php";
    $profile_info=$connection->prepare("SELECT * FROM users WHERE  username=?");
    $profile_info->execute(array($_SESSION['name']));
?>
    <div class="profile-page">
        <div class="contener">
       
        <div class="profile-contact">
            <div class="contact-content">
                <?php
                while($user =$profile_info->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <div class="profile_img"> <img src="admin/images\<?php echo $user['per_img'];?>"></div>
                        <h1> <?php echo $user['per_name'];?> </h1>
                        <small><?php echo $user['username'];?></small>
                        <p><i class="fas fa-map-marker-alt"></i><?php echo $user['address'];?></p>
                        <p ><i class="fas fa-envelope"></i><?php echo $user['per_email'];?></p>
                        <p > <i class="fas fa-phone-alt"></i><?php echo $user['per_phone'];?></p>
                        <p><?php echo $user['bio'];?></p>
                <?php 
                } ?>
                <a href="settings.php"class="settings-button">Settings</a>
            </div>
        </div>
        <div class="sold-products">
            <div class="sold-content">
                <h2> Sold Products</h2>
                <div class="sold-cards">
                        <div class="sold-card">
                            <a >
                                <img src="images\camera canon3.jpg">
                                <p style="color:black;"> Canon Camera</p>
                            </a>
                        </div>
                        <div class="sold-card">
                            <a >
                                <img src="images/headphones3.jpg">
                                <p style="color:black;"> HeadPhone</p>
                            </a>
                        </div>
                        <div class="sold-card">
                            <a >
                                <img src="images/keyboard.jpg">
                                <p style="color:black;"> Keyboard</p>
                            </a>
                        </div>
                        <div class="sold-card">
                            <a >
                                <img src="images/photo_main.jpg">
                                <p style="color:black;"> camera</p>
                            </a>
                        </div>
                        <div class="sold-card">
                            <a >
                                <img src="images/StockSnap_86KP51GXIC.jpg">
                                <p style="color:black;"> Accessories</p>
                            </a>
                        </div>
                        <div class="sold-card">
                            <a >
                                <img src="images\camera canon3.jpg">
                                <p style="color:black;"> product name</p>
                            </a>
                        </div>
                        <div class="sold-card">
                            <a >
                                <img src="images\camera canon3.jpg">
                                <p style="color:black;"> product name</p>
                            </a>
                        </div>
                        <div class="sold-card">
                            <a >
                                <img src="images\camera canon3.jpg">
                                <p style="color:black;"> product name</p>
                            </a>
                        </div>
                            
                </div>
            </div>
        </div>



        </div>
    </div>

   <!--===========SOCIAL_ICONS===============-->
<?php include "includes/footer.php"; ?>        