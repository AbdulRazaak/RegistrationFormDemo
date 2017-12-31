<?php include 'database.php';
?>
<?php
if (!empty($_POST['name']) && !empty($_POST['pass1'])) {
    $name = $_POST['name'];
    $password = $_POST['pass1'];
    $query = "INSERT INTO user (name,password) VALUES ('$name','$password')";
    if (!mysqli_query($con,$query)){
        echo 'Error: '.mysqli_error($con);
    } else {
        header("Location: admin.php");
    }
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
    <h1>Adding New User</h1>
    <form method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label class="control-label col-sm-2">Name:     </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Name">
                <span class="alert-danger"><?php echo $nameErr;?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Password: </label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="pass1" id="pass" placeholder="Enter Password">
                <span class="alert-danger"><?php echo $passErr1;?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" name="register" id="submit" value="Add">
                <a href="admin.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    <footer>
    </footer>
</div>
</body>
</html>

