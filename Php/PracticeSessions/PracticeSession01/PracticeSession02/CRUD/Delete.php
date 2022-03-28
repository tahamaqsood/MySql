<?php

include('dbConnection.php');
$DeleteID = $_GET['id'];

$query = "delete from USERS where ID='$DeleteID'";
$exec = mysqli_query($con,$query);
if($exec==true)
{
    echo "<script>window.location.href='Retrieval.php'</script>";
}

?>