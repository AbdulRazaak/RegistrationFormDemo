<?php include 'database.php'; ?>
<?php

$id =  $_GET['id'];
$query = "DELETE FROM user WHERE id = $id";
mysqli_query($con,$query);

echo'<div class="alert alert-info alert-dismissible">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Remove Successfully!
     </div>';
header("Location: admin.php");
?>
