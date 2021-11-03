<?php include "includes/header.php"; ?>
<?php 
$profile_info=$connection->prepare("SELECT * FROM users WHERE  username=?");
$profile_info->execute(array($_SESSION['name']));

$row=$profile_info->fetch(PDO::FETCH_ASSOC);


?>


<div class="add">
            <div class="contener">    
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                    <h2> Edit Your info</h2>
                    
                    <div class="input">
                        <label>Name</label>
                        <input type="text" name="Name"    value="<?php echo $row['per_name']?>">
                    </div>
                    <div class="input">
                        <label>Username</label>
                        <input  name="Username" class="readonly"  readonly value="<?php echo $row['username']?>" >
                    </div>
                    <div class="input">
                        <label>Photo</label>
                        <input type="file" name="Photo"   >
                    </div>
                    <div class="input">
                        <label>Email</label>
                        <input  name="Email" class="readonly" readonly  value="<?php echo $row['per_email']?>">
                    </div>

                    <div class="input">
                        <label>Address </label>
                        <input type="text" name="Address"   value="<?php echo $row['address']?>">
                    </div>
                    <div class="input">
                        <label> phone</label>
                        <input type="number" name="phone"   value="<?php echo $row['per_phone']?>">
                    </div>
                    <div class="input">
                        <label>bio </label>
                        <textarea type="text" name="bio" ><?php echo $row['bio']?></textarea>
                    </div>
                    
                    <button type="submit" class="link" name="update_profile">Add Product</button>
                </form>
            </div>
        </div>
    </div>
    <?php
if(isset($_POST["update_profile"])){
    $name = $_POST['Name'];
    $Address = $_POST['Address'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    
    
     
        $query="UPDATE users set per_name=?,bio=?,per_phone=?,address=?  WHERE username = ?";
        $stmt1 = $connection->prepare($query);
        $stmt1->execute(array($name,$bio,$phone,$Address,$_SESSION['name']));
       
    
}

?>
<script src="../js/jquery-3.5.1.js"></script>
<script src="js/script.js"></script>



