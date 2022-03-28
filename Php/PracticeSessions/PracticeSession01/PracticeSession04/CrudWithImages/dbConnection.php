<?php
$con = mysqli_connect('localhost','root','','DEMO');
if($con!=true)
{
    echo "<script>alert('Database not connected')</script>";
}
?>