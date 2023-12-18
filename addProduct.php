<?php
include("header.php");
?>


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light">
                    
                    <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Form</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="pr_name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" name="pr_price" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" name="pr_qua" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" name="pr_img" id="exampleInputPassword1">
                                </div>

                                <select class="form-select" name="proCatId" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Select Category</option>
                                    <?php
                                    $query=$pdo->query("select * from category");
                                    $row=$query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $catItem){
                                        ?>
                                        <option value="<?php echo $catItem['id']?>"><?php echo $catItem['cat_name']?></option>
                                        <?php
                                    }
                                    ?>
                                    
                                    
                                </select>
                                
                                <button type="submit" class="btn btn-primary mt-4" name="product">Add Product</button>
                            </form>
                        </div>
                    
                </div>
            </div>
            <!-- Blank End -->

            <?php
include("footer.php");
?>
           