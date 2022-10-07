<?php

 session_start();
 include "Connection/Db.php";

 $bookID= $_SESSION['ID'];
 $query = "DELETE FROM book_request WHERE Book_ID ='".$bookID."'";
 
  $result = mysqli_query($connect, $query);
  
  if(!$result)
  {
    echo "Error Says:" . mysqli_error($connect);
    exit;
  }
  else
  {
	   echo '<script>alert("The Book History Is Deleted")</script>';
	   echo '<script>window.location="menuBar.php"</script>';
  }
?>