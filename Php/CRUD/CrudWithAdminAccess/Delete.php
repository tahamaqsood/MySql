<?php
include('dbConnection.php');
session_start();
if($_SESSION['username']==null)
{
   header('location:Login.php');
}

$DeleteId = $_GET['id']??"";
$query = "delete from USERS where ID='$DeleteId'";
$exec = mysqli_query($con,$query);
header('location:Retrieval.php');

?>