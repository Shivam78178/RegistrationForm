<?php
  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|File Upload|</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadfile"><br><br>
        <input type="submit" name="submit" value="Upload file">
    </form>
</body>
</html>

<?php
 $filename=$_FILES['uploadfile']['name'];
 $tempname=$_FILES['uploadfile']['tmp_name'];
 $folder="Images/".$filename;
//  echo $folder;
 move_uploaded_file($tempname,$folder);
echo"<img src='$folder' width='100px' height='100px'>"; 
?>
