<?php

$con = mysqli_connect('localhost','root','','USMAN');
if($con==false)
{
    echo "<script>alert('Database not connected..!!')</script>";
}

?>