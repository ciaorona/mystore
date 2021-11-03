
        <!--========================LOGIN_FORM==================-->
        <?php
        //TO GET VALUES OF PRODUCT BY TIS ID
            if(isset($_GET['product_id'])){
                $product_id = $_GET['product_id'];
                $stmt = $connection->prepare("SELECT * FROM products WHERE product_id =? ");
                $stmt->execute(array($product_id));
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $product_name = $row['product_name'];
                    $product_category = $row['product_category'];
                    $product_img = $row['product_img'];
                    $product_price = $row['product_price'];
                    $product_brand = $row['product_brand'];
                    $product_company = $row['product_company'];
                }
                $stmt1 = $connection->prepare("SELECT * FROM product_information WHERE product_id =? ");
                $stmt1->execute(array($product_id));
                while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
                    $product_img1 = $row['product_img1'];
                    $product_img2 = $row['product_img2'];
                    $product_img3 = $row['product_img3'];
                    $product_img4 = $row['product_img4'];
                    $product_img5 = $row['product_img5'];
                    $product_description = $row['product_description'];  
                    $pic_availble = $row['pic_availble'];
                }
            }
        //TO UPDATE PRODUCT 
            if(isset($_POST['update_product'])){
                $name = $_POST['name'];
                $category = $_POST['category'];
                $brand = $_POST['brand'];
                $company = $_POST['company'];
                $price = $_POST['price'];
                $pic_avl = $_POST['pic_avl'];
                $description = $_POST['description'];
                //MAIN PHOTO
                $img = $_FILES['img_main'];
                $img_name = $img['name'];
                $img_temp = $img['tmp_name'];
                $img_error = $img['error'];
                $allowed_extention = array('jpg', 'jpeg', 'png', 'gif');
                $end =explode('.', $img_name);
                $img_extention = strtolower(end($end));
                if($img_error != 4){
                    if(in_array($img_extention, $allowed_extention)){
                        move_uploaded_file($img_temp, realpath(dirname(getcwd())) . '\images\\'. $img_name);
                    }else{
                        echo "<strong>PHOTO IS NOT VALID </strong>";
                    } 
                }
                //SIDE PHOTO
                $side_img = $_FILES['img_side'];
                $side_name = $side_img['name'];
                $side_temp = $side_img['tmp_name'];
                $side_error = $side_img['error'];
                $img_count = count($side_name);
                if($side_error[0] != 4){
                    for($i = 0; $i < $img_count; $i++){
                        $end_side = explode('.' , $side_name[$i] );
                        $side_extention = strtolower(end($end_side));
                        if(in_array($side_extention, $allowed_extention)){
                            move_uploaded_file($side_temp[$i], realpath(dirname(getcwd())) . '\images\\'. $side_name[$i]);
                        }else{
                            echo "<strong>PHOTO IS NOT VALID </strong>";
                        } 
                    }
                }
                    if(empty($side_name)){
                        $side0 = !empty( $side_name[0]) ? " $side_name[0]" : "$product_img1";
                        $side1 = !empty( $side_name[1]) ? " $side_name[1]" : "$product_img2";
                        $side2 = !empty( $side_name[2]) ? " $side_name[2]" : "$product_img3";
                        $side3 = !empty( $side_name[3]) ? " $side_name[3]" : "$product_img4";
                        $side4 = !empty( $side_name[4]) ? " $side_name[4]" : "$product_img5";
                    }
                $stmt = $connection->prepare("UPDATE products SET product_name =?, product_img=?, product_price=?, product_brand=?, product_company=?, product_date=? WHERE product_id =? ");
                $stmt->execute(array($name, $img_name , $price, $brand, $company,date("Y-m-d H:i:s"), $product_id));

                $stmt1 = $connection->prepare("UPDATE product_information SET product_id=?, product_img1=?, product_img2=?, product_img3=?, product_img4=?, product_img5=?, product_description=?, pic_availble=? WHERE product_id =?");
                $stmt1->execute(array( $product_id,$side0, $side1,$side2,$side3,$side4, $description, $pic_avl, $product_id));
                if($stmt && $stmt1){
                    echo "UPDATED SUCCESSFULLY";
                    header("location:product.php");
                }else{
                    echo "NOT UPDATED SUCCESSFULLY";
                }
            }
        ?>
        <div class="add">
            <div class="contener">    
                <form  method="POST" enctype="multipart/form-data">
                    <h2>Edit Product</h2>
                    <div class="input">
                        <label for="">Product Name</label>
                        <input type="text" name="name" id="" value="<?php echo $product_name; ?>">
                    </div>
                    <div class="input">
                        <label for="" style="padding-right:15px;">product category</label>
                        <select name="category" id="">
                            <?php
                               $cat = $connection->query("SELECT category_name FROM category");
                               while($row = $cat->fetch()){
                                   if($row['category_name'] == $product_category){
                                   ?>
                                   <option value="<?php echo $product_category; ?>"><?php echo$product_category; ?></option>
                                   <?php 
                                   }else{
                                   ?>
                                   <option value="<?php echo $row['category_name']?>"><?php echo $row['category_name']?></option>
                                   <?php 
                                   }  
                               }    
                            ?>
                        </select>
                    </div>
                    <div class="input">
                        <label for="">Brand</label>
                        <input type="text" name="brand" id="" value="<?php echo $product_brand; ?>">
                    </div>
                    <div class="input">
                        <label for="">Company</label>
                        <input type="text" name="company" id="" value="<?php echo $product_company; ?>">
                    </div>
                    <div class="input">
                        <label for="">price(Doller)</label>
                        <input type="number" name="price" id=""  min="0" value="<?php echo $product_price; ?>">
                    </div>
                    <div class="input">
                        <label for="">Main photo </label>
                        <span><img src="../images/<?php echo $product_img;?>" alt="" ></span>
                        <input type="file" name="img_main" id="" required>
                    </div>
                    <div class="input">
                        <label for="">Side photos</label>
                        <span><img src="../images/<?php echo $product_img1;?>" alt=""></span>
                        <span><img src="../images/<?php echo $product_img2;?>" alt=""></span>
                        <span><img src="../images/<?php echo $product_img3;?>" alt=""></span>
                        <span><img src="../images/<?php echo $product_img4;?>" alt=""></span>
                        <span><img src="../images/<?php echo $product_img5;?>" alt=""></span>
                        <input type="file" name="img_side[]" id="" accept="image/*" multiple>
                    </div>
                    <div class="input">
                        <label for="">pieces availble </label>
                        <input type="number" name="pic_avl" id=""  min="0" value="<?php echo $pic_availble; ?>">
                    </div>
                    <div class="input">
                        <label for="">Post Descraption </label>
                            <textarea type="text" name="description" id="" cols="30" rows="10" ><?php echo $product_description; ?></textarea>
                    </div>
                    <button type="submit" class="link" name="update_product">Update Product</button>
                </form>
            </div>
        </div>
    </div>
    <!-- scrept tag  -->
<script>
        CKEDITOR.replace('dscraption');
</script>
<?php include "footer.php";?>