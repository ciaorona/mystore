<?php include "includes/header.php";
include "includes/db.php";
?>
        
        <!--================================MAIN_CONTENT=====================-->
        <div class="main_content">
            <div class="contener">
                <div class="collection">
                    <a href="">
                        <img src="images/laptop_main.jpg">
                        <span class="content_collection">
                            <p>Laptops</p>
                            <p> collection</p>
                            <p>Show more <i class="fas fa-chevron-right"></i></p>
                        </span>
                    </a>
                </div>
                <div class="collection">
                    <a href="">
                        <img src="images/camera_main.jpg">
                        <span class="content_collection">
                            <p>Cameras </p>
                            <p>collection</p>
                            <p>Show more <i class="fas fa-chevron-right"></i></p>
                        </span>
                    </a>
                </div>
                <div class="collection">
                    <a href="">
                        <img src="images/photo_main.jpg">
                        <span class="content_collection">
                            <p>Phones </p>
                            <p>collection</p>
                            <p>Show more <i class="fas fa-chevron-right"></i></p>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!--================CATAGORIES============-->
        <div class="categories">
            <div class="contener">
                <span>PRODUCTS</span>
                <div class="text_categories ">
                    <a data_filter="all" class="button active">All</a>
                    <?php
                    $connect = $connection->query('SELECT  category_name FROM category ');
                        while ( $row= $connect->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <a data_filter="<?php echo $row['category_name']; ?> " id="<?php echo $row['category_name']; ?>" class="button" ><?php echo $row['category_name']; ?></a>
                   <?php } ?>
                </div>
            </div>
        </div>

        <!--================PRODUCTS================-->
        <div class="products_card">
            <div class="contener">

            <?php
            $query="SELECT * FROM products";
            $connect=$connection->prepare($query);
            $connect->execute();

            while($row= $connect->fetch(PDO::FETCH_ASSOC)){
            ?>
                <div class="card filter <?php echo $row["product_category"]; ?> ">
                    <div class="product_img">
                        <a href="product_info.php?id=<?php echo $row["product_id"]; ?>"><img src="images/<?php echo $row["product_img"]; ?>"></a>
                    </div>
                    <div class="content_card">
                        <h4><?php echo $row["product_name"]; ?></h4>
                        <p><?php echo $row["product_brand"]; ?></p>
                        <strong>$<?php echo $row["product_price"]; ?></strong>
                    </div>
                    <fieldset>
                        <legend>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </legend>
                        <div class="product_icon">
                            <a class="add_wish"><i class="fas fa-heart">
                            <input type="hidden" value="<?php echo $row["product_id"]; ?>">
                            </i></a>
                            <i class="fas fa-exchange-alt"></i>
                            <a href="product_info.php?id=<?php echo $row["product_id"]; ?>"  style="color:#000;"><i class="far fa-eye"></i></a>
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