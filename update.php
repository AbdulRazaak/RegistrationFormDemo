<?php include 'database.php'; ?>
<?php //Edit user name and password from user table ?>
<?php
  $id1 = $_GET['id'];
  $query1 = mysqli_query($con,"SELECT * FROM user WHERE id=$id1");
  $RetrieveInfo = mysqli_fetch_assoc($query1);
?>
<?php
//Update Selected User Name and Password
if (!empty($_POST['name']) && !empty($_POST['pass1'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['pass1'];
    $query = "UPDATE user SET name='$name', password='$password' WHERE id=$id";
    mysqli_query($con,$query);
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Edit User Name and Password</h2>
    <form method="post" class="form-horizontal" action="update.php">
        <div class="form-group">
            <label class="control-label col-sm-2">Name:     </label>
            <div class="col-sm-10">
                <input type="hidden" name="id" class="form-control hidden" value="<?php echo $RetrieveInfo['id']; ?>">
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $RetrieveInfo['name']; ?>">
                <span class="alert-danger"><?php echo $nameErr;?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Password: </label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="pass1" id="pass" value="<?php echo $RetrieveInfo['password']; ?>">
                <span class="alert-danger"><?php echo $passErr1;?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="submit" value="Update">
                <a href="admin.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    <footer>
    </footer>
</div>




