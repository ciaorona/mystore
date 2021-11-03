
    <?php
        if(isset($_POST['add_one'])){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $haspass = sha1($password);
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
            $user_role = $_POST['user_role'];
            $phone = $_POST['phone'];
            $stmt = $connection->prepare("INSERT INTO users(per_name, username, per_email, per_role, per_password, per_phone, per_img) 
                                            VALUES (?,?,?,?,?,?,?)");
            $stmt-> execute(array($name, $username, $email, $user_role, $haspass,$phone, $img_name ));
            if($stmt){
                echo "<strong color='green'>ADDED SUCCESSFULY</strong>";
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
            <h2>Add One</h2>
            <form method="POST" enctype="multipart/form-data"> 
            <div class="input">
                <label >user  name</label>
                <input type="text" name="name"  required>
            </div>
            <div class="input">
                <label >Username</label>
                <input type="text" name="username"  required>
            </div>
            <div class="input">
                <label >User Email</label>
                <input type="text" name="email"  required>
            </div>
            <div class="input">
                <label >Password</label>
                <input type="password" name="password"  required>
            </div>
            <div class="input">
                <label >Phone</label>
                <input type="number" name="phone" min="0" required>
            </div>
            <div class="input">
                <label >user photo </label>
                <input type="file" name="user_img">
            </div>
            <div class="input">
                <label style="padding-right:15px;">User role</label>
                <select name="user_role" id="" required>
                    <?php
                    $role = array('user', 'company', 'admin');
                    for($i =0; $i<count($role); $i++){
                        echo '<option value="' .$role[$i] . '">' . $role[$i] .'</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="link" name="add_one">Add One</button>

            </form>
        </div>
    </div>
</div>
<?php include "footer.php";?>