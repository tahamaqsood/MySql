<?php
$con = mysqli_connect('localhost','root','','USMAN');
if(!$con)
{
    echo "<script>alert('Database not connected')</script>";
}
?>