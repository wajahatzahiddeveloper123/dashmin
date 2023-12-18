<?php
include('header.php');
?>
<div class="container-fluid pt-4 px-4">
    <h1>Product</h1>
                <div class="row g-4">
                    <div class="">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">All Products</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="">
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Category Type</th>
                                        <th scope="col" class="text-center" colspan="2">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
            $query=$pdo->query("SELECT `products`.*, `category`.`cat_name`
            FROM `products` 
                inner JOIN `category` ON `products`.`category_type` = `category`.`id`;");
            $row= $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($row as $proAll){
                ?>
                <tr>
                    <td><?php echo $proAll['product_id'] ?></td>
                    <td><?php echo $proAll['product_name'] ?></td>
                    <td><img src="img/product/<?php echo $proAll['product_image'] ?>" width="80px" alt=""></td>
                    <td><?php echo $proAll['product_quantity'] ?></td>
                    <td><?php echo $proAll['product_price'] ?></td>
                    <td><?php echo $proAll['cat_name'] ?></td>
                    <td><a href="updateproduct.php?proId=<?php echo $proAll['product_id']?>" type="submit" class="btn btn-primary">Edit</a></td>
                    <td><a href="?proid=<?php echo $proAll['product_id']?>" type="submit" class="btn btn-warning">Delete</a></td>

                </tr>
                <?php
            }
            ?>

<?php
            
            if (isset($_GET['proid'])) {
                $did=$_GET['proid'];
                $query=$pdo->prepare('delete from products where product_id=:duid');
                $query->bindParam('duid',$did);
                $query->execute();
                echo "<script>alert('this data has been deleted');
                location.assign('viewproduct.php');</script>";
            }
            
            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
include('footer.php');
?>