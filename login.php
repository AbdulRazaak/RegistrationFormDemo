<?php include 'database.php'; ?>

<?php

if (!empty($_POST['name']) && !empty($_POST['pass1'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['pass1']);
    $result = mysqli_query($con,"SELECT id FROM user WHERE name='$name'");
    if ($name == "admin" && $password == "root"){
        header("Location: admin.php");
    } elseif (mysqli_num_rows($result) == 1) {
        $result = mysqli_query($con, "SELECT password FROM user WHERE name='$name'");
        $retrievepassword = mysqli_fetch_assoc($result);
        if($retrievepassword['password'] !== $password) //!password_verify($password, $retrievepassword['password']))
        {
            echo "Password is incorrect";
        }
        else
        {
            header("location: profile.php");
        }
    }
    else
    {
        echo "Your User Name is Incorrect";
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
    <h2>Login</h2>
    <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                <input type="submit" class="btn btn-success" name="register" id="submit" value="Login">
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    <footer>
    </footer>
</div>
</body>
