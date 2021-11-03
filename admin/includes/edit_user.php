<?php
        if(isset($_GET['edit_user'])){
            $user_id = $_GET['edit_user'];
            $stmt = $connection->query("SELECT * FROM users WHERE per_id= $user_id");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $user_name = $row['per_name'];
                $username = $row['username'];
                $user_email = $row['per_email'];
                $user_img = $row['per_img'];
                $user_role =$row['per_role'];
                $bio =$row['bio'];
                $user_phone = $row['per_phone'];
                $address = $row['address'];
            }
        }
        if(isset($_POST['update'])){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $bio = $_POST['bio'];
            $user_role = $_POST['user_role'];
            //USER IMAGE
            $img = $_FILES['user_img'];
            $img_name = $img['name'];
            $img_temp = $img['tmp_name'];
            $img_error = $img['error'];
            $allowed_extention = array('jpg', 'jpeg', 'png', 'gif');
            $end =explode('.', $img_name);
            $img_extention = strtolower(end($end));
            if($img_error != 4){
                if(in_array($img_extention, $allowed_extention)){
                    move_uploaded_file($img_temp, realpath(dirname(getcwd())) . '\admin\\images\\'. $img_name);
                }else{
                    echo "<strong>PHOTO IS NOT VALID </strong>";
                } 
            }
            //FOR UPLOADING EMPTY PHOTO 
            $image = !empty( $img_name) ? " $img_name" : "$user_img";
            $stmt = $connection->prepare("UPDATE users SET per_name =?, username=?, per_email=?, per_role=?, per_phone=?, per_img=?, bio=?, address=? WHERE per_id =? ");
            $stmt-> execute(array($name, $username, $email, $user_role,$phone, $image, $bio, $address, $user_id));
            if($stmt){
                echo "<strong>ADDED SUCCESSFULY</strong>";
                if($user_role == "admin"){
                    header("location:user.php?bdgs=view_admin");
                }else if($user_role == "user"){
                    header("location:user.php");              
                }else if($user_role == "company"){
                    header("location:product.php?bdgs=view_comp");
                }
            }else{
                echo "<strong>NO ONE ADDDED IN DATABASE</strong>";
            }
        }
    ?>
    <div class="add">
        <div class="contener">
            <h2>Edit One</h2>
            <form  method="POST" enctype="multipart/form-data"> 
            <div class="input">
                <label >user  name</label>
                <input type="text" name="name" value="<?php echo $user_name  ?> " required>
            </div>
            <div class="input">
                <label >Username</label>
                <input type="text" name="username" value="<?php echo $username  ?>" required>
            </div>
            <div class="input">
                <label >User Email</label>
                <input type="text" name="email" value="<?php echo $user_email ?>" required>
            </div>
            <div class="input">
                <label >Phone</label>
                <input type="number" name="phone" min="0" value="<?php echo $user_phone ?>" required>
            </div>
            <div class="input">
                <label >user photo </label>
                <span><img src="images/<?php echo $user_img ?>" alt="" ></span>
                <input type="file" name="user_img" value="<?php echo $user_img  ?>">
            </div>
            <div class="input">
                <label style="padding-right:15px;">User role</label>
                <select name="user_role" id="" required>
                    <?php
                    $role = array('user', 'company', 'admin');
                    for($i =0; $i<count($role); $i++){
                        if($role[$i]  == $user_role){
                            echo '<option value="' .$role[$i] . '" selected>' . $role[$i] .'</option>';
                        }else{
                            echo '<option value="' .$role[$i] . '">' . $role[$i] .'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="input">
                <label >Address</label>
                <input type="text" name="address" value="<?php echo $address  ?>" >
            </div>
            <div class="input">
                <label >Bio</label>
                <textarea type="text" name="bio" value="<?php echo $bio  ?>" >
                </textarea>
            </div>
            <button type="submit" class="link" name="update">update </button>

            </form>
        </div>
    </div>
</div>
<script>
        CKEDITOR.replace('bio');
</script>
<?php include "footer.php";?>