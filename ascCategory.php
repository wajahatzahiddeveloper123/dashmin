<?php
include('header.php');
?>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Table</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="">
                                        <th scope="col">id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" class="text-center" colspan="2">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
            $query=$pdo->query("select * from category order by cat_name ASC");
            $result= $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                ?>
                 <tr>
                                        <td scope="row"><?php echo $row['id']?></td>
                                        <td><?php echo $row['cat_name']?></td>
                                        <td><img src="img/category/<?php echo $row['cat_image']?>" width="70px" class="img-fluid" alt=""></td>
                                        <td scope="row"><a href="updatecategory.php?catId=<?php echo $row['id']?>" type="submit" class="btn btn-secondary m-2">Edit</a></td>
                                        <td scope="row"><a href="?did=<?php echo $row['id']?>" type="submit" class="btn btn-danger m-2">Delete</a></td>
                                    </tr>
                                   <?php
            }
                                   ?>
                                   <?php
            
            if (isset($_GET['did'])) {
                $did=$_GET['did'];
                $query=$pdo->prepare('delete from category where id=:duid');
                $query->bindParam('duid',$did);
                $query->execute();
                echo "<script>alert('this data has been deleted');
                location.assign('viewcategory.php');</script>";
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