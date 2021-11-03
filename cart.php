<?php include"includes/header.php"; ?>
        <!--================================SHOPPING_CART======================-->
        <?php
if(isset($_SESSION['name'])){
        ?>
        <div class="shopping_cart">
            <h1>Shopping Cart (<?php $count =$connection->prepare("SELECT * FROM cart WHERE username=?" );
                                $count->execute([$_SESSION['name']]);
                                $num = $count->rowCount();
                                echo $num;?>)</h1>
            <div class="contener">
                <div class="all_carts">
                <?php
                     if(isset($_GET['delete'])){
                        $id=$_GET['delete'];
                        $query = "DELETE FROM cart WHERE product_id = ?";        
                        $delete = $connection->prepare($query);
                        $result = $delete->execute(array($id));
                    }
                    $query=" SELECT p.product_name,p.product_img,p.product_price,c.product_id FROM products P INNER JOIN cart c ON P.product_id=c.product_id WHERE c.username=?";
                    $cart=$connection->prepare($query);
                    $cart->execute(array($_SESSION['name']));
                    if($cart->rowCount()>0){
                    while($row =$cart->fetch()){
                ?>
                       <div class="cart">
                            <div class="cart_img">
                                <img src="images/<?php echo $row['product_img'] ?>">
                            </div>
                            <div class="cart_text">
                                <h3><?php echo $row['product_name'] ?></h3>
                                <span>
                                    QTY:
                                    <select>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                    </select>
                                </span>
                                <span><a href="product_info.php?id=<?php echo $row['product_id'] ?>">Details</a></span>
                                <a href="?delete=<?php echo $row['product_id'] ?>">DELETE</a>  
                            <p class="money">$<?php echo $row['product_price'] ?></p>
                            </div>
                        </div>
                <?php
                    }
                ?>
                        <div class="total">
                            <div class="content">
                                <h4>Total:</h4>
                                <span class="mny">$50777</span><br>
                                <a>ADD Coupon:</a>
                                <input type="text" name="" id="">
                            </div>
                            <a href="">CHECK OUT</a>
                        </div>

                    <?php
                    }else{
                        echo "<h3 align=center >you didn't ad any products yet!!!!!!!!</h3>";
                    }
                    ?> 
            </div>
        </div>
<?php
    }else{
        ?>
        <div class="wishList">
            <h1>YOUr Wish list </h1>
            <div class="contener">
                <div class="all_carts">
                    <h3 align="center"> login so you can add products</h3>
                </div> 
            </div>
        </div>
        <?php
        }
        ?>
        <!--===========SOCIAL_ICONS===============-->
<?php include "includes/footer.php"; ?>