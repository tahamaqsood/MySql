<?php
session_start();
include('dbConnection.php');
if($_SESSION['AdminName']==null)
{
    header("Location:Login.php");
}

$DeletedId = $_GET['id']??"";
$query1 = "select * from USERS where ID='$DeletedId'";
$result = mysqli_query($con,$query1);
$data = mysqli_fetch_assoc($result);

$img = $data['IMAGE_PATH'];

$query2 = "delete from USERS where ID='$DeletedId'";
$exec = mysqli_query($con,$query2);
if($exec==true)
{
    $_SESSION['Deletion'] = $data['ID'];
    unlink($img);
    header("Location:Retrieval.php");
}



?>