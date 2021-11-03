
        <!--========================LOGIN_FORM==================-->
        <?php
            if(isset($_POST['add_product'])){
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
                }else{
                    echo "<strong>SHOULD UPLOAD A PHOTO</strong>";
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
                }else{
                    echo "<strong>SHOULD UPLOAD A PHOTO</strong>";
                }
                $side0 = !empty( $side_name[0]) ? " $side_name[0]" : "NULL";
                $side1 = !empty( $side_name[1]) ? " $side_name[1]" : "NULL";
                $side2 = !empty( $side_name[2]) ? " $side_name[2]" : "NULL";
                $side3 = !empty( $side_name[3]) ? " $side_name[3]" : "NULL";
                $side4 = !empty( $side_name[4]) ? " $side_name[4]" : "NULL";
                $stmt3 = $connection->prepare("INSERT INTO products(product_name, product_img, product_category, product_price, product_brand, product_company, product_date) 
                VALUES (?,?,?,?,?,?,?) ");
                $stmt3 -> execute(array($name, $img_name , $category, $price, $brand, $company,date("Y-m-d H:i:s") ));
                // choose the last inserted id in the data base  
                $id=$connection->lastInsertId();  
                $query="INSERT INTO  product_information (product_id,product_img1,product_img2,product_img3,product_img4, product_img5,product_description,pic_availble) VALUES (?,?,?,?,?,?,?,?)";
                $stmt1 = $connection->prepare($query);
                $stmt1->execute(array($id,$side0, $side1,$side2,$side3,$side4, $description, $pic_avl));
                if($stmt3 && $query){
                header("location:product.php");
                }
                }
        ?>
        <div class="add">
            <div class="contener">    
                <form  method="POST" enctype="multipart/form-data">
                    <h2>Add Product</h2>
                    <div class="input">
                        <label for="">Product Name</label>
                        <input type="text" name="name" id="" required>
                    </div>
                    <div class="input">
                        <label for="" style="padding-right:15px;">product category</label>
                        <select name="category" id="" required>
                            <?php
                                $cat = $connection->query("SELECT category_name FROM category");
                                while($row = $cat->fetch()){
                                    ?>
                                    <option value="<?php echo $row['category_name']?>"><?php echo $row['category_name']?></option>
                                    <?php   
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input">
                        <label for="">Brand</label>
                        <input type="text" name="brand" id="" required>
                    </div>
                    <div class="input">
                        <label for="">Company</label>
                        <input type="text" name="company" id="" required>
                    </div>
                    <div class="input">
                        <label for="">price(Doller)</label>
                        <input type="number" name="price" id=""  min="0" required>
                    </div>
                    <div class="input">
                        <label for="">Main photo </label>
                        <input type="file" name="img_main" id="" required>
                    </div>
                    <div class="input">
                        <label for="">Side photos</label>
                        <input type="file" name="img_side[]" id="" accept="image/*" multiple  required>
                    </div>
                    <div class="input">
                        <label for="">pieces availble </label>
                        <input type="number" name="pic_avl" id=""  min="0" required>
                    </div>
                    <div class="input">
                        <label for="">Post Descraption </label>
                        <textarea type="text" name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="link" name="add_product">Add Product</button>
                </form>
            </div>
        </div>
    </div>
    <!-- scrept tag  -->
<script>
        CKEDITOR.replace('dscraption');
</script>
<?php include "footer.php";?>
