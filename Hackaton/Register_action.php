<?php 
 
include "Connection/Db.php";
session_start();
	
?>


<?php

include "Connection/Db.php";
session_start();

 $getSelection="Select* from student_registry";
			  
			   $SendResults=mysqli_query($connect,$getSelection);
			   $getRows = mysqli_num_rows($SendResults);
			  
			    if($getRows==0)
				{
					$pass="INSERT INTO `student_registry` (`Student_ID`, `Student_Number`, `fName`, `sName`, `pName`, `Nationality`, `Gender`, `email_address`, `contact`, `Password`) VALUES (NULL, '20210000', '', '', '', '', '', '', '', '')";
					$mes=mysqli_query($connect,$pass);
						
				}



if(isset($_POST['btnSubmit']))
{ 
$error=0;
if($error==0)
{
	//this statement returns false, meaning the connection is not working
	if($connect==False)
	{
		print "the is something wrong with the connection";
	
	}
	// if the statement is not false then the following sytement returns true
	else
	{
     if($error==0)
		  {
			    $select= "Select* from student_registry Order by student_ID DESC LIMIT 1";
            	$result=mysqli_query($connect,$select);
                $fetc=mysqli_fetch_assoc($result);
            
            	if($result==true)
            	{
            	    $calculate=$fetc['Student_Number']+1;
					
				}
			  //this select from table
			  $state="select* from  student_registry where email_address='".$_POST['email']."'";
			  
			  //passing query to actions
			  $getResult=mysqli_query($connect,$state);
			  
			  if($getResult==true)
			  {
				  //this is getting row
				  $row=mysqli_fetch_row($getResult);
				  
				  //if the row in table index 0 is null, then the table is empty
				  if($row[0]>0)
				  {
					  echo '<script>alert("THE EMAIL ENTERED IS ALREADY EXISTING, PLEASE RE_ENTER ANOTHER ONE!!!")</script>';
                      echo '<script>window.location="Add_Student.php"</script>';
				  }
				  else
				  {
					  //this statement is inserting to database's table
					  //Student_Number	fName	sName	pName	Nationality	Gender	email_address	contact	Password
					  $insert="insert into student_registry (Student_Number,fName,sName,pName,Nationality,Gender,email_address,contact,Password) values('".$calculate."','".(isset($_POST['firstname']) ? $_POST['firstname'] : null)."','".(isset($_POST['lastname']) ? $_POST['lastname'] : null)."','".(isset($_POST['pre_name']) ? $_POST['pre_name'] : null)."','".(isset($_POST['Nationality']) ? $_POST['Nationality'] : null)."','".(isset($_POST['Gender']) ? $_POST['Gender'] : null)."','".(isset($_POST['email']) ? $_POST['email'] : null)."','".(isset($_POST['mobile']) ? $_POST['mobile'] : null)."','".md5((isset($_POST['pass']) ? $_POST['pass'] : null))."')";
				      
					  //passing to the action 
					  $getAction=mysqli_query($connect,$insert);
					  
					  if($getAction==true)
					  {
						  
				    $sender = 'From: ralezemoshake@gmail.com';
					$getEmail=(isset($_POST['email']) ? $_POST['email'] : null);
					$userName=(isset($_POST['firstname']) ? $_POST['firstname'] : null);
					$recipient = $getEmail;

					$subject = "Application Is Received";
					$message = "Dear  ". $userName."\n\n"."Thank You For registaring with us. Your Account has been setup and you can login to the website using your registered details"."\n"."The user name Is :".$calculate."\n"."Password: For Security reasons use password you registered"."\n\n"."Kind Regards,"."\n"."The School Libriary";
					$headers = 'From:' . $sender;

					if (mail($recipient, $subject, $message, $headers))
					{
						 echo '<script>alert("You are registered")</script>';
                         echo '<script>window.location="current.php"</script>';
						  
					}
					else
					{
						  echo '<script>alert("Your Application Will Be Received But you wont get Email, or Connection reset by peer")</script>';
                           echo '<script>window.location="Add_Student.php"</script>';
					}
					  }
					  else
					  {
						  echo '<script>alert("OUPS, SOMETHING WENT WRONG")</script>';
                          echo '<script>window.location="Add_Student.php"</script>';
						  
						
					  }
				  
				  }
					  
			  }
		  }
		  
	  

	  
	}
}
}





?>
    
     
            	  
		 

