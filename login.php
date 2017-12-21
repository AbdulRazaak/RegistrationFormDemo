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
        if(!password_verify($password, $retrievepassword['password']))
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
</head>
<body>
<div id="container">
    <header>
        <h1>Login</h1>
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
        <input type="submit" name="register" id="submit" value="Login">
    </form>
    <footer>
    </footer>
</div>
</body>
