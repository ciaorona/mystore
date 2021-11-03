
        <!--========================LOGIN_FORM==================-->
            <div class="view_all">
                <div class="contener">
                <input type="search" placeholder="search by name" id ="search-input">
                    <table class="filter">
                       <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>Photo</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Role</th>
                        </tr>
                       </thead>
                       <tbody>
                           <?php
                            if(isset($_GET['remove'])){
                                $id=$_GET['remove'];
                                $query = "DELETE FROM users WHERE per_id = ?";        
                                $delete = $connection->prepare($query);
                                $result = $delete->execute(array($id));
                                header("location:user.php");
                            }
                            $query ="SELECT * FROM users WHERE per_role = 'user'";
                            $connect=$connection->prepare($query);
                            $connect->execute(); 
                            while($row=$connect->fetch(PDO::FETCH_ASSOC)){
                           ?>
                        <tr>
                            <td data-title="Name" class="td"><?php echo $row['per_name']?></td>
                            <td data-title="username"><?php echo $row['username']?></td>
                            <td data-title="email"><?php echo $row['per_email']?></td>
                            <td data-title="image"><img src="images/<?php echo $row['per_img']?>" ></td>
                            <td data-title="phone"><?php echo $row['per_phone']?></td>
                            <td data-title="address"><?php echo $row['address']?></td>
                            <td data-title="role"><?php echo $row['per_role']?></td>
                            <td><a href="user.php?bdgs=edit_user&edit_user=<?php echo $row['per_id']?>" title="Edit"><i class="fas fa-edit"></i></a></td>
                            <td><a href="?remove=<?php echo $row['per_id']?>" title="Delete"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
    </div>
    <!-- scrept tag  -->
    <?php include "footer.php";?>
