<?php

include('dbConnection.php');


/*

  Important Point To Be Noted:
  Since we know that GET method is used to show data in URL. And we used query string
  to get USER ID in URL after redirect to Update page. Now we use GET method to catch 
  that USER ID and store it in variable, named 'DeleteID'. Like this $DeleteId = $_GET['id']??"";

  */

  
$DeleteId = $_GET['id']??"";
$query = "delete from STUDENT where ID = '$DeleteId' ";

//For query execution
$exec = mysqli_query($con,$query);
if($exec==true)
{
  echo "<script>alert('Data deleted');
  window.location.href='Retrieval.php';
  </script>";

}
else
{
    echo "<script>alert('Data not deleted');
    window.location.href='Retrieval.php';
    </script>";
}

?>