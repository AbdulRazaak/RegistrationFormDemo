<?php include 'database.php'; ?>
<?php
if (!empty($_POST['name']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password_1= mysqli_real_escape_string($con, $_POST['pass1']); //Preventing SQL Injection
    $password_2 = mysqli_real_escape_string($con, $_POST['pass2']);
    if ($password_1 != $password_2) {
        echo "The two passwords do not match!";
    } else {
        //$password = password_hash($password_1,PASSWORD_DEFAULT);
        $query = "INSERT INTO user (name,password) VALUES ('$name','$password_1')";

        if (!mysqli_query($con,$query)){
            echo 'Error: '.mysqli_error($con);
        } else {
            echo'<div class="alert alert-success alert-dismissible">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Registered Successfully!Please login here:  </strong><a class="btn-link" href="login.php">Login</a>
                 </div>';
        }
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
    <h1>Register User</h1>
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
            <label class="control-label col-sm-2">Confirm Password: </label>
                <div class="col-sm-10">
                <input type="password" class="form-control" name="pass2" id="pass" placeholder="Confirm Password">
                <span class="alert-danger"><?php echo $passErr2;?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" name="register" id="submit" value="Register">
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    <footer>
    </footer>
</div>
</body>
</html>
