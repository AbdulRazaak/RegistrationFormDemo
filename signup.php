<?php include 'database.php'; ?>
<?php
    if (!empty($_POST['name']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $password_1= mysqli_real_escape_string($con, $_POST['pass1']);
        $password_2 = mysqli_real_escape_string($con, $_POST['pass2']);
        if ($password_1 != $password_2) {
            echo "The two passwords do not match!";
        } else {
            $password = password_hash($password_1,PASSWORD_DEFAULT);
            $query = "INSERT INTO user (name, password) VALUES ('$name','$password')";

            if (!mysqli_query($con,$query)){
                echo 'Error: '.mysqli_error($con);
            } else {
                echo "Registered Successfully";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="container">
    <header>
        <h1>Register User</h1>
    </header>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Name:     </label>
        <input type="text" name="name" id="name" placeholder="Enter User Name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        <label>Password: </label>
        <input type="password" name="pass1" id="pass" placeholder="Enter Password">
        <span class="error">* <?php echo $passErr1;?></span>
        <br><br>
        <label>Confirm Password: </label>
        <input type="password" name="pass2" id="pass" placeholder="Confirm Password">
        <span class="error">* <?php echo $passErr2;?></span>
        <br><br>
        <input type="submit" name="register" id="submit" value="Register">
    </form>
    <footer>
    </footer>
</div>
</body>


</html>
