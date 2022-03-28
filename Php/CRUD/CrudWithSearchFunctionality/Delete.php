

<?php
//Including Database Connection
include('dbConnection.php');
/*
Catching User ID from URL with the help of GET Method. Also using null coalescing operator to avoid
error after the page refreshes.
*/
$DeleteID = $_GET['id']??"";

//MySql query
$query = "delete from STUDENT where ID = '$DeleteID'";

//Method for executing MySql query
$exec = mysqli_query($con,$query);
if($exec==true)
{
   echo "<script>window.location.href='Retrieval.php';</script>";
}
?>