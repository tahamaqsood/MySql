<?php

// Database Connection
$con = mysqli_connect('localhost','root','','CRUD');
if($con!=true)
{
    echo "<script>alert('Database not connected!')</script>";
}
?>