<?php
include 'conn.php';
$id=$_GET['updateid'];

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="update `crudoperation` set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "<script> alert('updated successfully');
                  window.location='display.php';
        </script>";
    }
    else
    {
        die(mysqli_error($conn));
    }
    
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<?php

$sql="select * from `crudoperation` where id='$id'";
$result1=mysqli_query($conn,$sql);
$row1=mysqli_fetch_array($result1);



?>

    <div class="container my-5">
        <form class="" action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">name</label>
                <input type="text" name="name" value="<?php echo $row1['name'] ?>" class="form-control" id="exampleInputEmail1" >

                <label for="exampleInputEmail1" class="form-label">email</label>
                <input type="email" name="email" value="<?php echo $row1['email'] ?>" class="form-control" id="exampleInputEmail1" >

                <label for="exampleInputEmail1" class="form-label">mobile</label>
                <input type="text" name="mobile" value="<?php echo $row1['mobile'] ?>"class="form-control" id="exampleInputEmail1">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" value="<?php echo $row1['password'] ?>"class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>