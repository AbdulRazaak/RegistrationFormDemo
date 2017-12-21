<?php include 'database.php'; ?>
<?php
    $query = "SELECT * FROM user ORDER BY id";
    $results = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="container">
    <header>
        <h1>Admin Panel</h1>
    </header>
    <table>
        <tr>
           <th width="36%">User Name</th>
            <th width="50%">Password</th>

        </tr>
        <tr>
            <?php
                if (mysqli_num_rows($results) > 0){
                    while ($RetrieveInfo = mysqli_fetch_array($results)) {
                        echo '<td>'.$RetrieveInfo["name"].'</td>
                              <td>'.$RetrieveInfo["password"].'</td>';
                    }
                }
            ?>
        </tr>
    </table>
    <footer>
    </footer>
</div>

