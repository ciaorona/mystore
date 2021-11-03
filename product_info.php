<?php include "includes/header.php"; ?>
    <!--=============================PRODUCT_INFO==========================-->
    <?php
    $id= $_GET['id'];

    // connect to products table and choose product where product id == $id; 
    // and use foreach to display data;
    $stm1=$connection->prepare("SELECT * FROM products WHERE product_id =?");
    $stm1->execute(array($id));
    $product =$stm1->fetch(PDO::FETCH_ASSOC);



    // connect to product_information table and choose info where product id the same product 
    // and use foreach to display information
    $product_information=$connection->prepare("SELECT * FROM product_information WHERE product_id =?");
    $product_information->execute(array($id));
    $product_info=$product_information->fetch(PDO::FETCH_ASSOC);
   
   ?> 
    <div class="product_info">
        <div class="contener">
            <div class="img_part">
                <div class="exzoom" id="exzoom">
                    <div class="exzoom_img_box">
                        <ul class='exzoom_img_ul'>
                            <li><img src="images/<?php echo $product_info['product_img1']?>" ></li>
                            <li><img src="images/<?php echo $product_info['product_img2'];?>" /></li>
                            <li><img src="images/<?php echo $product_info['product_img3'];?>" /></li>
                            <li><img src="images/<?php echo $product_info['product_img4'];?>" /></li>
                            <li><img src="images/<?php echo $product_info['product_img5'];?>"/></li>
                        </ul>
                    </div>
                    <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                    <div class="exzoom_nav"></div>
                    <!-- Nav Buttons -->
                    <p class="exzoom_btn">
                        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                    </p>
                </div>
                <script>
                    $(function () {
                        $("#exzoom").exzoom({
                            // thumbnail nav options
                            "navWidth": 55,
                            "navHeight": 60,                        
                            "navItemMargin": 7,
                            "navBorder": 1,

                            // autoplay
                            "autoPlay": true,

                            // autoplay interval in milliseconds
                            "autoPlayTimeout": 4000
                        });
                    });
                </script>
            </div>
            <div class="info_part">
                <h1> <?php  echo $product  ['product_name']?>
                </h1>  
                <p class="name_com">By  <?php  echo $product  ['product_company']?><a href="">
                <?php $product  ['product_company']; ?>
                </a></p>
                <p>Brand: 
                <?php echo $product  ['product_brand']; 
                ?>    
                </p>
                <p>Category: 
                <?php 
                        echo $product  ['product_category'];
                        $product_category=$product['product_category'];
                ?>
                </p>
                <p>Available: 
                <?php  
                    echo $product_info["pic_availble"];
                
                ?>    
                pieces</p>
                <h3>Select Your Product</h3>
                <div class="color"> 
                    <select name="" id="">

                        <span>Color :</span>
                        <?php 
                        // connect to color table and choose color where product id the same product ;
                        $color=$connection->prepare("SELECT * FROM product_color WHERE product_id =?");
                        $color->execute(array($id));
                        while($product_color =$color->fetch(PDO::FETCH_ASSOC)){
                            ?>
                                <option> <?php echo $product_color['product_color'];?> </option>    
                        <?php   
                        }
                        ?>
                    </select>
                </div>
                
                <p class="mny">$<?php echo $product['product_price'];?>
                </p>
                <p>EX Tax: 60.00</p>
                <div  class="qty">
                    <input type="number" name="" id="" min="1" value="1">
                    <a href="">Buy Now</a>
                </div>
                <div class="product_icon">
                    <a class="add_card"><i class="fa fa-cart-plus" >
                    <input type="hidden" value="<?php echo $product["product_id"]; ?>">
                    </i></a>
                    <a class="add_wish"><i class="fas fa-heart">
                            <input type="hidden" value="<?php echo $product["product_id"]; ?>">
                            </i></a>
                    <i class="fas fa-exchange-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <!--=============DESCREPTION========================== -->
    <div class="description">
        <h1>Description</h1>
        <div class="contener">
            
            <div class="descrip_img">
                <h2>PHYSICAL FEATURES</h2>
                <img height="400px" src="images/<?php echo $product_info['product_img3'];?>">
            </div>
            <div class="descrip_text">
                <h2>KEY FEATURES</h2>
                <p><i class="fas fa-exclamation-circle"></i>242 MP</p>
                <p><i class="fas fa-exclamation-circle"></i>SLR Camera</p>
                <p><i class="fas fa-exclamation-circle"></i>18-135mm IS USM</p>
                <p><i class="fas fa-exclamation-circle"></i>CMOS Sensor</p>
                <p><i class="fas fa-exclamation-circle"></i>45-point all cross-type</p>
                <p><i class="fas fa-exclamation-circle"></i>Black</p>
                <p> 
                <?php  echo $product_info['product_dscraption'];
                    
                    
                    ?> 
                </p>
                </div>
            
        </div>
    </div>

    <!--============================COMMENTS========================-->
    <div class="comments">
        <h1>Reviews</h1>
        <div class="contener">
            <div class="wr_comment">
                <h3>Rate this product:</h3>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <?php

            // connect to color table and choose color where product id the same product ;
            $comment=$connection->prepare("SELECT * FROM comments WHERE product_id =?");
            $comment->execute(array($id));
            if($comment->rowCount() > 0){
                while($comment_row =$comment->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <div class="ath_comment">
                            <h4><?php echo $comment_row['per_name'];  ?></h4>
                            <p><?php echo $comment_row['comment_date'];  ?><p>
                            <span>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                            <div class="text">
                            <?php echo $comment_row['comment'];  ?>
                            </div>
                        </div>
                    <?php
                    } 
            }else{
                echo '<p align=center >No Comments yet</p>';
            }
            ?>
            
        </div>
    </div>
    <!--=============================RELATED_ PRODUCT========================== -->
    <div class="related_product products_card">
        <h1>Related Product</h1>
        <div class="contener">
            <?php
            $product_similar=$connection->prepare("SELECT * FROM products  WHERE product_category =? LIMIT 3");
            $product_similar->execute(array($product_category));
          
            while($row =$product_similar->fetch(PDO::FETCH_ASSOC)){
                ?>

                    <div class="card">
                        <div class="product_img">
                            <a href="?id=<?php echo $row['product_id'];?>"><img src="images/<?php echo $row['product_img']; ?>"></a>
                        </div>
                        <div class="content_card">
                            <h4><?php echo $row['product_name'] ?></h4>
                            <p><?php echo $row['product_category'] ?></p>
                            <del>$<?php echo $row['product_price'] ?></del>
                        </div>
                        <fieldset>
                            <legend>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </legend>
                            <div class="product_icon" >
                            <a class="add_wish"><i class="fas fa-heart">
                            <input type="hidden" value="<?php echo $row["product_id"]; ?>">
                            </i></a>
                                <i class="fas fa-exchange-alt"></i>
                                <a href="?id=<?php echo $row['product_id'];?>" style="color:black;"><i class="far fa-eye"></i></a>
                            </div>
                        </fieldset>
                        <div class="dropdown">
                            <div class="add_card">
                                <input type="hidden" value="<?php echo $row["product_id"]; ?>">
                                <a >Add to Card</a> 
                            </div>
                        </div>
                    </div>
            <?php
            }
            ?> 
        </div>
    </div>
    
    <!--===========SOCIAL_ICONS===============-->
<?php include "includes/footer.php"; ?>
