<?php
session_start();
include('dbConnection.php');
$DeleteID = $_GET['id']??"";

// Creating Session for Sweet Alert2 popup message
$_SESSION['del'] = $DeleteID;

$query1 = "select * from USERS where ID='$DeleteID'";

$result = mysqli_query($con,$query1);
$data = mysqli_fetch_assoc($result);
$img = $data['IMAGE_PATH'];

$query2 = "delete from USERS where ID='$DeleteID'";
$exec = mysqli_query($con,$query2);
if($exec==true)
{
    unlink($img); //Deletes a file from a folder
    echo "<script> window.location.href='Retrieval.php';</script>";  //Redirect to retrieval page
}
?>