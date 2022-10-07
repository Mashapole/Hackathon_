<?php

 session_start();
 include "../Connection/Db.php";

   $bookID = $_GET['bookID'];
 $query = "DELETE FROM book_request WHERE req_id ='".$bookID."'";
 
  $result = mysqli_query($connect, $query);
  
  if(!$result)
  {
    echo "Error Says:" . mysqli_error($connect);
    exit;
  }
  else
  {
	   echo '<script>alert("The Book Is Deleted")</script>';
	   echo '<script>window.location="../Admin/Manage.php"</script>';
  }
?>