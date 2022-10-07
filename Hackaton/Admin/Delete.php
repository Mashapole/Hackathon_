<?php

 session_start();
 include "../Connection/Db.php";

 $bookID= $_SESSION['ID'];
 $query = "DELETE FROM books WHERE Book_Id ='".$bookID."'";
 
  $result = mysqli_query($connect, $query);
  
  if(!$result)
  {
    echo "Error Says:" . mysqli_error($connect);
    exit;
  }
  else
  {
	   echo '<script>alert("The Book Is Deleted")</script>';
	   echo '<script>window.location="../Admin/Home.php"</script>';
  }
?>