<?php
// Including Database Connection
include('dbConnection.php');


// Storing id in php variable from query string
$DeleteID = $_GET['id']??"";


// Query
$query = "delete from USERS where ID='$DeleteID'";

// Executing Query
$exec = mysqli_query($con,$query);
if($exec==true)
{
    echo "<script>window.location.href='Retrieval.php'</script>";
}

?>
