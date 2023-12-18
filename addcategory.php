<?php
include('header.php');
?>


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light">
                    
                    
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Form</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text"  class="form-control" name="catName" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Category Image</label>
                                    <input type="file"  class="form-control"  name="catImage" id="exampleInputPassword1">
                                </div>
                               
                                <button type="submit"  class="btn btn-primary" name="addcategory">Add Category</button>
                            </form>
                        </div>
                
                </div>
            </div>
            <!-- Blank End -->

            <?php
include('footer.php');
?>
            