<?php
error_reporting(0);
?>

<?php
$server="localhost";
$username="root";
$password="";
$database="file_upload";

$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("error");

}
if($_POST['submit']){

    $filename=$_FILES['uploadfile']['name'];
$tempname=$_FILES['uploadfile']['tmp_name'];
$folder="Images/".$filename;
move_uploaded_file($tempname,$folder);

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];

    $datastore="INSERT INTO registration_form(name,email,mobile,address,image) VALUES('$name','$email','$mobile','$address','$folder')";
    $data=mysqli_query($con,$datastore);
    if($data){
        echo "<script>alert('Details are successfully save')</script>";
    }
    else{
        echo "<script>alert('failed')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6 mt-3" style="border: 2px solid rgba(0,0,0,0.5); padding: 5%; border-radius: 5px; background-color: aquamarine;">

    <h1 style="text-align: center;">Registration Form</h1><br>
    <form action="registration_form.php" method="post" enctype="multipart/form-data">
        <div class="form-floating">
            <input type="text" name="name" class="form-control" placeholder="Enter your Name" required>
            <label>Name</label>
        </div><br>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
            <label>Email</label>
        </div><br>
        <div class="form-floating">
            <input type="number" name="mobile" class="form-control" placeholder="Enter your Number" required>
            <label>mobile No.</label>
        </div><br>
        <div class="form-floating">
            <input type="text" name="address" class="form-control" placeholder="Enter your Address" required>
            <label>Address</label>
        </div><br>
        <label>Image : &ensp;</label>
        <input type="file" name="uploadfile" required><br><br>
        <input type="submit" name="submit" class="form-control btn btn-primary">
    </form>
  </div>
  <div class="col-sm-3"></div>
    </div>
</body>
</html>
<?php

?>