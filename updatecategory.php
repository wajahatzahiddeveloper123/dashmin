<?php
include("header.php");
if (isset($_GET['catId'])) {
    $catId=$_GET['catId'];
    $query=$pdo->prepare('select * from category where id=:pid');
    $query->bindParam('pid',$catId);
    $query->execute();
    $row=$query->fetch(PDO::FETCH_ASSOC);
?>


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light">
                    
                    <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Form</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="hidden" name="catId" value="<?php echo $row['id']?>">
                                    <label for="exampleInputEmail1" class="form-label">Add Category</label>
                                    <input type="text" class="form-control" name="catName" id="exampleInputEmail1"
                                    value="<?php echo $row['cat_name'] ?>" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Category Image</label>
                                    <input type="file" class="form-control" name="catImage"
                                    value="<?php echo $row['cat_image'] ?>"  id="exampleInputPassword1">
                                    <img src="img/category/<?php echo $row['cat_image']?>" width="80px" class="img-fluid" alt="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary" name="updatecategory">Update Category</button>
                            </form>
                        </div>
                    
                </div>
            </div>
            <!-- Blank End -->
<?php
}
?>

            <?php
include("footer.php");
?>
           