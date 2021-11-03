<?php include "includes/header.php"; ?>
        <!--========================LOGIN_FORM==================-->
            <div class="view_all dashboard">
                <div class="contener">
                    <div class="row">
                        <div class="counter1 counter">
                            <i class="fas fa-laptop-code"></i>
                            <a href=""><p title="view more">Laptops<i class="fas fa-arrow-circle-right"></i></p></a>
                            <?php
                                $stmt = $connection->prepare(" SELECT * FROM products WHERE product_category = 'Laptops'");
                                $stmt->execute();
                                $count = $stmt->rowCount();
                                echo "<span>$count</span>";
                            ?>
                        </div>
                        <div class="counter2 counter">
                            <i class="fas fa-camera"></i>
                            <a href=""><p title="view more">Cameras <i class="fas fa-arrow-circle-right"></i></p></a>
                            <?php
                                $stmt = $connection->prepare(" SELECT * FROM products WHERE product_category = 'Cameras'");
                                $stmt->execute();
                                $count = $stmt->rowCount();
                                echo "<span>$count</span>";
                            ?>
                        </div>
                        <div class="counter3 counter">
                            <i class="fas fa-mobile-alt"></i>
                            <a href=""><p title="view more">Phones <i class="fas fa-arrow-circle-right"></i></p></a>
                            <?php
                                $stmt = $connection->prepare(" SELECT * FROM products WHERE product_category = 'Phones'");  
                                $stmt->execute();
                                $count = $stmt->rowCount();
                                echo "<span>$count</span>";
                            ?>
                        </div>
                        <div class="counter4 counter">
                            <i class="fas fa-headphones"></i>
                            <a href=""><p title="view more">Accessories <i class="fas fa-arrow-circle-right"></i></p></a>
                            <?php
                                $stmt = $connection->prepare(" SELECT * FROM products WHERE product_category = 'Accessories'");
                                $stmt->execute();
                                $count = $stmt->rowCount();
                                echo "<span>$count</span>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- scrept tag  -->
<?php   include "includes/footer.php"; ?>
        