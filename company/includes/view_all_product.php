
<!--========================LOGIN_FORM==================-->
            <div class="view_all">
                <div class="categories">
                    <div class="contener">
                        <span>PRODUCTS</span>
                        <div class="text_categories ">
                            <a data_filter="all" class="button active">All</a>
                            <a data_filter="laptops" class="button" >Laptops</a>
                            <a data_filter="cameras" class="button">Cameras</a>
                            <a data_filter="phones" class="button">Phones</a>
                            <a data_filter="accessories" class="button">Accessories</a>
                        </div>
                    </div>
                </div>
                <div class="contener">
                <input type="search" placeholder="search by name" id ="search-input">
                    <table class="filter">
                       <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>company</th>
                            <th>image</th>
                            <th>category</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                           <?php
                            if(isset($_GET['remove'])){
                                $id=$_GET['remove'];
                                $query = "DELETE  FROM comments  WHERE product_id = ?";  
                                $delete = $connection->prepare($query);
                                $result = $delete->execute(array($id));
                                $query = "DELETE  FROM product_information  WHERE product_id = ?";  
                                $delete = $connection->prepare($query);
                                $result = $delete->execute(array($id));
                                $query = "DELETE  FROM product_color  WHERE product_id = ?";  
                                $delete = $connection->prepare($query);
                                $result = $delete->execute(array($id));
                                $query = "DELETE  FROM cart  WHERE product_id = ?";  
                                $delete = $connection->prepare($query);
                                $result = $delete->execute(array($id));
                                $query = "DELETE  FROM wishlist  WHERE product_id = ?";  
                                $delete = $connection->prepare($query);
                                $result = $delete->execute(array($id));
                                $query = "DELETE  FROM products  WHERE product_id = ?";  
                                $delete = $connection->prepare($query);
                                $result = $delete->execute(array($id));
                                
                            }
                            $query ="SELECT * FROM products ";
                            $connect=$connection->prepare($query);
                            $connect->execute(); 
                            while($row=$connect->fetch(PDO::FETCH_ASSOC)){
                           ?>
                        <tr>
                            <td data-title="Name" class="td"><?php echo $row['product_name']?></td>
                            <td data-title="Price"><?php echo $row['product_price']?></td>
                            <td data-title="company"><?php echo $row['product_company']?></td>
                            <td data-title="image"><img src="../images/<?php echo $row['product_img']?>" ></td>
                            <td data-title="category"><?php echo $row['product_category']?></td>
                            <td data-title="Status"></td>
                            <td data-title="Date"><?php echo $row['product_date']?></td>
                            <td><a href="product.php?bdgs=edit_product&product_id=<?php echo $row['product_id']?>" title="Edit"><i class="fas fa-edit"></i></a></td>
                            <td><a href="?remove=<?php echo $row['product_id']?>" title=" Delete"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
    </div>
    <!-- scrept tag  -->
<<?php include "footer.php";?>
