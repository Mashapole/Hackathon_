<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Borrow Option</title>
<style>
body 
{
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav 
{
  position: relative;
  overflow: hidden;
  background-color: #333;
}
.topnav a 
{
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover
{
  background-color: #ddd;
  color: black;
}

.topnav a.active 
{
  background-color: #04AA6D;
  color: white;
}

.topnav-centered a 
{
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.topnav-right 
{
  float: right;
}

/* Responsive navigation menu (for mobile devices) */
@media screen and (max-width: 600px) {
  .topnav a, .topnav-right {
    float: none;
    display: block;
  }
  
  .topnav-centered a {
    position: relative;
    top: 0;
    left: 0;
    transform: none;
  }
}

		* {
		  box-sizing: border-box;
		}

		input[type=text], select, textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  resize: vertical;
		}

		label
		{
		  padding: 12px 12px 12px 0;
		  display: inline-block;
		}

		input[type=submit] {
		  background-color: #04AA6D;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		  float: right;
		}
	input[type=reset] {
		  background-color: #04AA6D;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		  float: left;
		  width: 200px;
		}

		input[type=submit]:hover 
		{
		  background-color: #45a049;
		}

		.container 
		{
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 20px;
		}

		.col-25 {
		  float: left;
		  width: 25%;
		  margin-top: 6px;
		}

		.col-75 {
		  float: left;
		  width: 75%;
		  margin-top: 6px;
		}

		/* Clear floats after the columns */
		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {
		  .col-25, .col-75, input[type=submit] {
			width: 100%;
			margin-top: 0;
		  }
		}
	
</style>
</head>
<body>

<!-- Top navigation -->
<div class="topnav">

  <!-- Centered link -->
  <div class="topnav-centered">
    <a href="#" class="active">Borrow Option</a>
	
  </div>
  
  <!-- Left-aligned links (default) -->
  <a href="menuBar.php">Home</a>
	
  <!-- Right-aligned links -->
  <div class="topnav-right">
    <a href="Logout.php">Sign Out</a>
  </div>
  
</div>
<br>
<h1 align="center">FIll The Following Form</h1>
<br>
<br>
       <?php
	   
	   session_start();
		include "Connection/Db.php";


		$user=$_SESSION['Student_Number'];
		
		
	   $select = "SELECT* FROM student_registry where Student_Number='".$user."'";
	   $getResult=mysqli_query($connect,$select);
		
		     $fetc=mysqli_num_rows($getResult);
             $row=mysqli_fetch_array($getResult);
			  $studentNumber="";
			   $userName="";
			    $surname="";
				$emailAddress="";
				 $contact="";
				 $book="";
			 if($fetc==1)
			 {
				 $studentNumber=$row['Student_Number'];
				 $userName=$row['fName'];
				 $surname=$row['sName'];
				 $emailAddress=$row['email_address'];
				 $contact=$row['contact'];
			     $book=  $_SESSION['ID'];
			 }
	   
	   
	   ?>
	   <div class="container">
		  <form action="#" method="post">
			<div class="row">
			  <div class="col-25">
				<label for="fname" >First Name</label>
			  </div>
			  <div class="col-75">
				<input type="text" id="fname" name="firstname" value="<?php echo  $userName;?>" disabled>
			  </div>
			</div>
			<div class="row">
			  <div class="col-25">
				<label for="lname">Last Name</label>
			  </div>
			  <div class="col-75">
				<input type="text" id="lname" name="lastname" value="<?php echo  $surname;?>" disabled>
			  </div>
			</div>
			<div class="row">
			  <div class="col-25">
				<label for="studentNo">StudentNumber</label>
			  </div>
			  <div class="col-75">
				<input type="text" id="pre_name" name="pre_name" value="<?php echo$studentNumber;?>" disabled>
			  </div>
			</div>
			<div class="row">
			  <div class="col-25">
				<label for="email">e-mail address: </label>
			  </div>
			  <div class="col-75">
				 <input type="text" id="email" name="email" value="<?php echo  $emailAddress;?>"  placeholder="John@gmail.com" required>
			  </div>
			</div>
			<div class="row">
			  <div class="col-25">
			<label for="mobile">Learner mobile number:</label>
			  </div>
			  <div class="col-75">
				<input type="tel" id="mobile" name="mobile" value="<?php echo  $contact;?>" style="width:100%; height:40px;"  placeholder="0798019243" required>
			  </div>
			</div>
			<div class="row">
			  <div class="col-25">
				<label for="reason">Reson For Borrowing:</label><br>
			  </div>
			  <div class="col-75">
			  
				<select name="reason" id="reason" required>
				<option >-------Select One-------</option>
				<option value="Exam Preperation">Exam Preperation</option>
				<option value="For Writing Assignment">For Writing Assignment</option>
				<option value="other">other</option>
				</select>
			  </div>
			</div>
			<div class="row">
			  <div class="col-25">
				<label for="period">Period Of Time</label><br>
			  </div>
			  <div class="col-75">
			  
				<select name="period" id="period" required>
				<option >-------Select One-------</option>
				<option value="One Week">One Week</option>
				<option value="Two Weeks">Two Weeks</option>
				<option value="Three Weeks">Three Weeks</option>
				<option value="1 Month">1 Month</option>
				<option value="Whole Semester">Whole Semester</option>
				<option value="other">other</option>
				</select>
			  </div>
			</div>
			<br><br>
			  <input type="reset" value="Reset">
			 <input type="submit" name="btnSubmit" value="Confirm/Borrow Book">
			
		
			  
	
			</div>
			
		  </form>
		
		
		</div>
	<?php

		if(isset($_POST['btnSubmit']))
		{
			
			$date= date("Y/m/d");
			$u=$_SESSION['Student_Number'];
			//ReasonPeriod,DateOfRequest,Student_Number
			$insert="Insert Into book_request(Reason,Period,DateOfRequest,Student_Number,Book_ID) values('".(isset($_POST['reason']) ? $_POST['reason'] : null)."','".(isset($_POST['period']) ? $_POST['period'] : null)."','".$date."','".$u."','".$book."')";
			$getAction=mysqli_query($connect,$insert);
			
			 if($getAction==true)
					  {
						
					
					$sender = 'From: ralezemoshake@gmail.com';
					$getEmail=(isset($_POST['email']) ? $_POST['email'] : '');
					$recipient = $getEmail;

					$subject = "Request For Borrowing Book Received";
					$message = "Dear  ". $userName."\n\n"."Your Application For Borrowing Book Is being Received."."\n"."The school libriary will send you email containing details of when and what time to collect the book"."\n\n"."Kind Regards,"."\n"."The School Libriary";
					$headers = 'From:' . $sender;

					if (mail($recipient, $subject, $message, $headers))
					{
						 echo '<script>alert("The request for borrowing book has being made")</script>';
						 echo '<script>window.location="menuBar.php"</script>';
					}
					else
					{
						  echo '<script>alert("Your Application Will Be Received But Email Is Invalid")</script>';
                          echo '<script>window.location="menuBar.php"</script>';
					}
	
					}
					  else
					  {
						  echo '<script>alert("OUPS, SOMETHING WENT WRONG")</script>';
                          echo '<script>window.location="menuBar.php"</script>';

					  }
		}
		?>
</body>
</html>
