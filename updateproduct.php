<?php
include("header.php");
if (isset($_GET['proId'])) {
    $proId=$_GET['proId'];
    $query=$pdo->prepare('select * from products where product_id=:pid');
    $query->bindParam('pid',$proId);
    $query->execute();
    $row=$query->fetch(PDO::FETCH_ASSOC);
?>


<div class="container-fluid pt-4 px-4">
                <div class="row bg-light">
                    
                    <div class="bg-light rounded ">
                            <h6 class="mb-4">Basic Form</h6>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="proId"
                                value="<?php echo $row['product_id']?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="pr_name" id="exampleInputEmail1"
                                        value="<?php echo $row['product_name']?>">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" name="pr_price" id="exampleInputEmail1"
                                    value="<?php echo $row['product_price']?>">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" name="pr_qua" id="exampleInputEmail1"
                                    value="<?php echo $row['product_quantity']?>">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" name="pr_img" 
                                    value="<?php echo $row['product_image']?>">
                                    <img src="img/product/<?php echo $row['product_image']?>" width="80px" class="img-fluid" alt="">
                                </div>

                                <select class="form-select" name="proCatId" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Select Category</option>
                                    <?php
                                    $query=$pdo->query("select * from category");
                                    $cat=$query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($cat as $catItem){
                                        ?>
                                        <option value="<?php echo $catItem['id']?>"
                                        <?=$row['category_type']==$catItem['id']? 'selected':''?>>
                                        <?php echo $catItem['cat_name']?></option>
                                        <?php
                                    }
                                    ?>
                                    
                                    
                                </select>
                                
                                <button type="submit" class="btn btn-primary mt-5" name="updateproduct">Update Product</button>
                            </form>
                        </div>
                    
                </div>
            </div>
<?php
}
?>
            <?php
include("footer.php");
?>
           