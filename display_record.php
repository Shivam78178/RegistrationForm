<title>| Display All Record |</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
$record="SELECT * FROM registration_form";

$data=mysqli_query($con,$record);

$result=mysqli_num_rows($data);
// echo $result;

// print_r ($result2);
if($result != 0){
    ?>
    <h1 style="text-align:center; margin-top:5px;"> Display All Record </h1>
   <center> <table class="table" border=1>
   <thead>     
   <tr>
            <th>SR.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Image</th>
        </tr>
</thead>
    <?php
    while ($result2=mysqli_fetch_assoc($data)) {
        // echo $result2[reg_id]." ".$result2[name]." ".$result2[email]." ".$result2[mobile]." ".$result2[address]." ".$result2[image]."<br> ";
    
    echo "

    <tbody>
    <tr>
    <td>$result2[reg_id]</td>
    <td>$result2[name]</td>
    <td>$result2[email]</td>
    <td>$result2[mobile]</td>
    <td>$result2[address]</td>
    <td><img src='$result2[image]' width=100px height=100px></td>
    </tr>
    </tbody>
    ";
    }
}
else{
    echo "no record found";
}
?>
</table></center>