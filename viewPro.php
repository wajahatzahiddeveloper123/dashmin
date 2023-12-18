<?php
include('header.php');
if(!isset($_SESSION['userEmail']) ) {
  echo"<script>alert('login First');
  location.assign('signin.php')
  </script>";
}
?>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    <?php
      if(isset($_GET['id'])){
        $id = $_GET['id'];
            $query=$pdo->prepare("select * from users where id=:pid");
            $query->bindParam('pid',$id);
            $query->execute();
            $result= $query->fetch(PDO::FETCH_ASSOC);
      }
            
                ?>
      <img src="img/user.jpg" width="300px" height="300px" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
    
        <h5 class="card-title">Name: <?php echo $result['name']?></h5>
        <p class="card-text">Email: <?php echo $result['email']?></p>
        <p class="card-text">Password: <?php echo $result['password']?></p>
        <p class="card-text">Role: <?php echo $result['role']?></p>
        <div class="row">
            <div class="col-lg-2">
            <a href="updateprofile.php?id=<?php echo $result['id'] ?>" class="btn btn-primary ">Edit</a>
            </div>
        <div class="col-lg-2 g-0">  
        <form action="" method="post">
            <input type="hidden" name="ID" value="<?php echo $result['id'] ?>" >
        <button class="btn btn-danger ms-5" name="delete" type="submit">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php

if(isset($_POST['delete'])){
    $id=$_POST['ID'];
    $query=$pdo->prepare('delete from users where id=:pid');
    $query->bindParam('pid',$id);
    $query->execute();

    echo "<script>alert('profile has been deleted');
    location.assign('signup.php')
    </script>";

    session_destroy();
}
?>
<?php
include('footer.php');
?>