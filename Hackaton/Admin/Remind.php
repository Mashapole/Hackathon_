<?php


 session_start();
 include "../Connection/Db.php";
 
  $bookID = $_GET['bookID'];

  $query = "SELECT * FROM student_registry WHERE Student_Number  = '$bookID'";
  
  $result = mysqli_query($connect, $query);
  
  if(!$result)
  {
    echo "Error Says:" . mysqli_error($connect);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  
  if(!$row)
  {
    echo "Empty Details";
    exit;
  }

	$email=$row['email_address'];
	$fname=$row['fName'];
	
					$sender = 'From: ralezemoshake@gmail.com';
					$recipient = $email;

					$subject = "Reminder For Book Return";
					$message = "Dear  ".$fname."\n\n"."Please be reminded that you haven't returned the book you borrowed."."\n"."Kindly Return the book before your return book pass to avoid hash punishment."."\n\n"."Kind Regards,"."\n"."The School Libriary";
					$headers = 'From:' . $sender;

					if (mail($recipient, $subject, $message, $headers))
					{
						 echo '<script>alert("The reminder email is being sent")</script>';
						 echo '<script>window.location="../Admin/Home.php"</script>';
					}
					else
					{
						  echo '<script>alert(" Email Is Invalid")</script>';
                          echo '<script>window.location="../Admin/Home.php"</script>';
					}
	
	

?>