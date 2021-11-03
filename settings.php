<?php include "includes/header.php"; ?>
<?php 
// echo __Dir__ . '\admin\\images\\'. $img_name;
$profile_info=$connection->prepare("SELECT * FROM users WHERE  username=?");
$profile_info->execute(array($_SESSION['name']));

$row=$profile_info->fetch(PDO::FETCH_ASSOC);

?>
<div class="add">
            <div class="contener">    
                <form  method="POST" enctype="multipart/form-data">
                    <h2> Edit Your info</h2>   
                    <div class="input">
                        <label>Name</label>
                        <input type="text" name="Name"    value="<?php echo $row['per_name']?>">
                    </div>
                    <div class="input">
                        <label>Photo</label>
                        <span><img src="admin/images/<?php echo $row['per_img']?>" alt=""></span>
                        <input type="file" name="Photo"   >
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


    $img = $_FILES['Photo'];
    $img_name = $img['name'];
    $img_temp = $img['tmp_name'];
    $img_error = $img['error'];
    $allowed_extention = array('jpg', 'jpeg', 'png', 'gif');
    $end =explode('.', $img_name);
    $img_extention = strtolower(end($end));
    if($img_error != 4){
        if(in_array($img_extention, $allowed_extention)){
            move_uploaded_file($img_temp, __Dir__ . '\admin\\images\\'. $img_name);
        }else{
            echo "<strong>PHOTO IS NOT VALID </strong>";
        } 
    }
    //FOR UPLOADING EMPTY PHOTO 
    $image = !empty( $img_name) ? " $img_name" : "$user_img";
    $query="UPDATE users set per_name=?,bio=?,per_phone=?,address=?,per_img=?  WHERE username = ?";
    $stmt1 = $connection->prepare($query);
    $stmt1->execute(array($name,$bio,$phone,$Address,$img_name, $_SESSION['name']));
    if($stmt1){
        header("location:profile.php");
    }
    
}
?>
   <!--===========SOCIAL_ICONS===============-->
   <?php include "includes/footer.php"; ?>        