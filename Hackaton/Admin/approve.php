<?php
 session_start();
 include "../Connection/Db.php";

 $bookID = $_GET['bookid'];
 
  $query = "SELECT * FROM book_temp WHERE temp_id  = '$bookID'";
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_assoc($result);
   
  if(!$result)
  {
    echo "Error Says:" . mysqli_error($connect);
    exit;
  }
  else
  {
	 //	
$title=$row['Tittle'];
$isbn=$row['ISBN'];
$author=$row['author_name'];
$description=$row['Description'];
$image=$row['Image'];
$publisher=$row['Publisher'];
$Category=$row['Category'];
$getStudent=$row['Student_Number'];

$query2 = "INSERT INTO books(Tittle,ISBN,author_name,Description,Image,Publisher,Category,Student_Number) VALUES ('" . $title . "', '" . $isbn . "', '" . $author . "', '" . $description . "', '" .$image. "', '" . $publisher . "','".$Category."', '" . $getStudent . "')";
$result2 = mysqli_query($connect, $query2);


if(!$result2)
		{
			echo "The Caught Error" . mysqli_error($connect);
			exit;
		} else 
		{
			$query3 = "DELETE FROM book_temp WHERE temp_id ='".$bookID."'";
			$result3 = mysqli_query($connect, $query3);
			
			 if(!$result3)
			  {
				echo "Error Says:" . mysqli_error($connect);
				exit;
			  }
			  else
			  {
				echo '<script>alert("The Book Is Added To Catalog")</script>';
				echo '<script>window.location="../Admin/Home.php"</script>';
			  }
			
		}
  }

?>