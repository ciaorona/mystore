<?php include "includes/header.php"; 
    $profile_info=$connection->prepare("SELECT * FROM users WHERE  username=?");
    $profile_info->execute(array($_SESSION['name']));
?> 
        <div class="profile-page-admin">
            <div class=profile-contact">
                <div class="contact-content">
                <?php
                while($user =$profile_info->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <div class="profile_img"> <img src="images\<?php echo $user['per_img'];?>"></div>
                        <h1> <?php echo $user['per_name'];?> </h1>
                        <small><?php echo $user['username'];?></small>
                        <p><i class="fas fa-map-marker-alt"></i><?php echo $user['address'];?></p>
                        <p ><i class="fas fa-envelope"></i><?php echo $user['per_email'];?></p>
                        <p > <i class="fas fa-phone-alt"></i><?php echo $user['per_phone'];?></p>
                        <p><?php echo $user['bio'];?></p>
                    <a href="settings.php"class="settings-button">Settings</a>

                <?php 
                } ?>
                </div>
            </div>
        </div>
    </div>


    <script src="../js/jquery-3.5.1.js"></script>
<script src="js/script.js"></script>