<?php

 session_start();
 include "../Connection/Db.php";
 
  $bookID = $_GET['bookID'];

  $status="Returned";
  $date=date("Y/m/d");
  $query="Update trace_book set Date_Of_Return='".$date."' , Status='".$status."' where trace_id='".$bookID."'";
  $result = mysqli_query($connect, $query);
  
  if(!$result)
  {
    echo "Error Says:" . mysqli_error($connect);
    exit;
  }
  else
  {
	   echo '<script>alert("Book Is Returned")</script>';
		echo '<script>window.location="../Admin/Home.php"</script>';
  }


?>
