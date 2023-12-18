<?php
session_start();
// unset($_SESSION["userEmail"]);
include('connection.php');
?>
<!-- sign up -->
<?php
if (isset($_POST['dash'])) {
    $uname=$_POST['uname'];
    $email=$_POST['uemail'];
    $password=$_POST['upassword'];
    $query=$pdo->prepare('insert into users(name,email,password)
     values(:pn,:pe,:pp)');
     $query->bindParam("pn",$uname);
     $query->bindParam("pe",$email);
     $query->bindParam("pp",$password);
     $query->execute();
     echo "<script>alert('user sign up their account successfully');
     location.assign('signin.php');</script>";
}


//sign in//

if(isset($_POST['signin'])){
    $email=$_POST['uemail'];
    $pass=$_POST['upass'];
    $query=$pdo->prepare("select * from users where email=:pe and password=:pp");
    $query->bindParam("pe",$email);
    $query->bindParam("pp",$pass);
    $query->execute();
    $row=$query->fetch(PDO::FETCH_ASSOC);
    if($row){
      $_SESSION['userName']=$row['name'];
      $_SESSION['userEmail']=$row['email'];
      $_SESSION['userPass']=$row['password'];
      $_SESSION['userId']=$row['id'];
      $_SESSION['userRole']=$row['role'];
      echo "<script>alert('login successfully');
      location.assign('index.php');</script>";
  }else{
    echo "<script>alert('invalid email or password');
    location.assign('signin.php');</script>";
  }
  }
  //category_Image//

  if(isset($_POST['addcategory'])){
    $catName=$_POST['catName'];
    $catImageName=$_FILES['catImage']['name'];
    $catTmpName=$_FILES['catImage']['tmp_name'];
    $extension=pathinfo($catImageName,PATHINFO_EXTENSION);
    $designation="img/category/".$catImageName;
      if($extension=="jpg" || $extension=="jpeg" || $extension=="webp" || 
      $extension=="png" || $extension=="jfif"){
      if(move_uploaded_file($catTmpName, $designation)){
    $query=$pdo->prepare("insert into category(cat_name,cat_image)
     values(:cn,:ci)");
     $query->bindParam("cn",$catName);
     $query->bindParam("ci",$catImageName);
     $query->execute();
     echo "<script>alert('category added successfully');</script>";
  }
}
  }

   //update_category_Image//

   if(isset($_POST['updatecategory'])){
    $catId=$_POST['catId'];
    $catName=$_POST['catName'];
    $catImageName=$_FILES['catImage']['name'];
    if(!empty($catImageName)){
    $catTmpName=$_FILES['catImage']['tmp_name'];
    $extension=pathinfo($catImageName,PATHINFO_EXTENSION);
    $designation="img/category/".$catImageName;
      if($extension=="jpg" || $extension=="jpeg" || $extension=="webp" || 
      $extension=="png" || $extension=="jfif"){
      if(move_uploaded_file($catTmpName, $designation)){
    $query=$pdo->prepare("update category set cat_name=:catn, cat_image=:cati where id=:cid");
     $query->bindParam("catn",$catName);
     $query->bindParam("cati",$catImageName);
     $query->bindParam("cid",$catId);
     $query->execute();
     echo "<script>alert('category updated with image successfully');
     location.assign('viewcategory.php');</script>";
  }
}
  }else{
    $query=$pdo->prepare("update category set cat_name=:catn where id=:cid");
     $query->bindParam("catn",$catName);
     $query->bindParam("cid",$catId);
     $query->execute();
     echo "<script>alert('category updated without image successfully');
     location.assign('viewcategory.php');</script>";
  }
}

// add product //
if(isset($_POST['product'])){
  $prName=$_POST['pr_name'];
  $prPrice=$_POST['pr_price'];
  $prQua=$_POST['pr_qua'];
  $proCatId=$_POST['proCatId'];
  $proImageName=$_FILES['pr_img']['name'];
  $proTmpName=$_FILES['pr_img']['tmp_name'];
  $extension=pathinfo($proImageName,PATHINFO_EXTENSION);
  $designation="img/product/".$proImageName;
    if($extension=="jpg" || $extension=="jpeg" || $extension=="webp" || 
    $extension=="png" || $extension=="jfif"){
    if(move_uploaded_file($proTmpName, $designation)){
  $query=$pdo->prepare("insert into products(product_name,product_quantity,
  product_price,product_image,category_type)
   values(:pron,:proq,:prop,:proimg,:cattype)");
   $query->bindParam("pron",$prName);
   $query->bindParam("proq",$prQua);
   $query->bindParam("prop",$prPrice);
   $query->bindParam("proimg",$proImageName);
   $query->bindParam("cattype",$proCatId);
   $query->execute();
   echo "<script>alert('Product added successfully');</script>";
}
}
}

//updateproduct//

if(isset($_POST['updateproduct'])){
  $productId=$_POST['proId'];
  $proId=$_POST['proCatId'];
  $prName=$_POST['pr_name'];
  $prPrice=$_POST['pr_price'];
  $prQua=$_POST['pr_qua'];
  if(!empty($_FILES['pr_Img']['name'])){
    $proImageName=$_FILES['pr_Img']['name'];
  $proTmpName=$_FILES['pr_Img']['tmp_name'];
  $extension=pathinfo($proImageName,PATHINFO_EXTENSION);
  $designation="img/product/".$proImageName;
    if($extension=="jpg" || $extension=="jpeg" || $extension=="webp" || 
    $extension=="png" || $extension=="jfif"){
    if(move_uploaded_file($proTmpName, $designation)){
  $query=$pdo->prepare("update products set product_name=:pron, product_quantity=:proq,
  product_price=:prop, product_image=:proimg , category_type=:cattype where product_id=:prid");
  $query->bindParam("pron",$prName);
  $query->bindParam("prid",$productId);

   $query->bindParam("proq",$prQua);
   $query->bindParam("prop",$prPrice);
   $query->bindParam("proimg",$proImageName);
   $query->bindParam("cattype",$proId);
   $query->execute();
   echo "<script>alert('product updated with image successfully');
   location.assign('viewproduct.php');</script>";
}
}
}else{
  $query=$pdo->prepare("update products set product_name=:pron, product_quantity=:proq,
  product_price=:prop, category_type=:cattype where product_id=:prid");
  $query->bindParam("pron",$prName);
  $query->bindParam("prid",$productId);
  $query->bindParam("proq",$prQua);
  $query->bindParam("prop",$prPrice);
  $query->bindParam("cattype",$proId);
   $query->execute();
   echo "<script>alert('product updated without image successfully');
   location.assign('viewproduct.php');
</script>";
}
}
?>
