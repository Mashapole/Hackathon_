<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e26e4799e8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Hover-master/css/hover-min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="sty.css">
	
    <title>One Way To Reset Password</title>
	
	<style>
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

		input[type=submit]
		{
		  background-color: blue;
		  color: white;
		  padding: 12px 20px;
		  border: 2px solid black;
		  border-radius: 4px;
		  cursor: pointer;
		  width: 100%;
		}
		input[type=reset] {
		  background-color: blue;
		  color: white;
		  padding: 12px 20px;
		  border: 2px solid black;
		  border-radius: 4px;
		  cursor: pointer;
		   width: 100%;
		}
		

		input[type=submit]:hover 
		{
		  background-color: black;
		  color: white;
		}
		input[type=reset]:hover 
		{
		  background-color: black;
		  color: white;
		}

		.container 
		{
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 30px;
		}

		.col-25 {
		  float: left;
		  width: 25%;
		  margin-top: 6px;
		}

		.col-75 {
		  float: left;
		  width: 65%;
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
		.cen
		{
			 text-align: center;
		}
		.err
		{
			margin-top: 20px;
			margin-left: 20px;
			color: red;
			
		}
		.error {color: #FF0000;}

		
	</style>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e26e4799e8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Hover-master/css/hover-min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="sty.css">
	
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>

      <div class="home">
	  

       <nav class="navbar navbar-expand-md  navbar-dark fixed-top">

            <a class="navbar-brand" href="index.php"><img src="Images/Logo/logo.jpg" class="imagelogo" height="75" width="70"></a>
          
           
            <a class="navbar-toggler togg" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">

              <i class="fas fa-bars menu "></i>
            </a>
 
          </nav>
     </div>
	 
	 <br><br><br> 
<?php

	 session_start();
	 include "Connection/Db.php";
	 
	 $nameErr =$secondNameEr= $emailErr =$phoneError="";
	 
	$firstname =$lastname=$email=$mobile="" ;
	
	
	function test_input($data) 
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	 if ($_SERVER["REQUEST_METHOD"] == "POST") 
	 
	 {
	
	if (empty($_POST["firstname"])) 
	{
    $nameErr = "First Name is required";
	} 
	else 
	{
    $firstname = test_input($_POST["firstname"]);
 
 //collect1
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname))
	{
      $nameErr = "Only letters and white space allowed";
    }
	}
	
	if (empty($_POST["lastname"])) 
	{
    $secondNameEr = "Last Name is required";
	} 
	else 
	{
    $lastname = test_input($_POST["lastname"]);
 
 //collect2
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname))
	{
     $secondNameEr = "Only letters and white space allowed";
    }
	}
	
//collect4
	  if (empty($_POST["email"])) 
	  {
		$emailErr = "Email is required";
	  } else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
		}
	  }
	  
	  if (empty($_POST["mobile"])) 
	{
    $phoneError = "Phone Number is required";
	} 
	else 
	{
    $mobile = test_input($_POST["mobile"]);
 
    if (!preg_match( "/^\+27[0-9]{9}$/", $mobile))
	{
     $phoneError = "Please enter valid South African Number starting with code +27";
    }
	}
	if( preg_match( "/^\+27[0-9]{9}$/", $mobile) && filter_var($email, FILTER_VALIDATE_EMAIL)  && $firstname!="" && $lastname!="" && $email!="" && $mobile!="")
	{
	if(isset($_POST['submit']))
	{ 
      $select="Select* from student_registry where email_address='".(isset($_POST['email']) ? $_POST['email'] : '')."'";
		
		 $getResult=mysqli_query($connect,$select);
		
		     $fetc=mysqli_num_rows($getResult);
             $row=mysqli_fetch_array($getResult);
			 
			 
			 if($fetc==1)
			 {
				$_SESSION['email']=$row['email_address'];
				$_SESSION['firstName']=$row['fName'];
			    echo '<script>window.location="reset.php"</script>';
			 }
			 else if($fetc==0)
			 {
				 echo "<script> if(confirm('Check Your Primary Key Email.')){window.location.href='ResetPassword.php'};</script>";

			 }
	}
	}
	
  }
  
  
	 
	
?>
	  <br><br><br><br><br>
	  <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			<div class="row">
			  <div class="col-25">
				<label for="fname">First Name</label>
			  </div>
			  <div class="col-75">
				<input type="text" name="firstname" placeholder="Your name.." value="<?php echo $firstname;?>">
			  </div>
			  <div class="err">*</div>
			</div>
			<span class="error" align="center"> <?php echo $nameErr;?></span>
			<div class="row">
			  <div class="col-25">
				<label for="lname">Last Name</label>
			  </div>
			  <div class="col-75">
				<input type="text" id="lname" name="lastname" placeholder="Your last name.." value="<?php echo $lastname;?>">
			  </div><div class="err">*</div>
			</div>
			<span class="error" > <?php echo $secondNameEr;?></span>
			<div class="row">
			  <div class="col-25">
				<label for="email">e-mail address: </label>
			  </div>
			  <div class="col-75">
				 <input type="text" id="email" name="email"  placeholder="John@gmail.com" value="<?php echo $email;?>">
			  </div>
			  <div class="err">*</div>
			</div>
			<span class="error" > <?php echo $emailErr;?></span>
			<div class="row">
			  <div class="col-25">
			<label for="mobile">Learner mobile number:</label>
			  </div>
			  <div class="col-75">
				<input type="tel" id="mobile" name="mobile"  placeholder="+27798019243" value="<?php echo $mobile;?>" style="width: 100%; height:70%;" >
			  </div>
			 <span class="error" > <?php echo $phoneError;?></span>
			</div>
			<br>
			<div class="row">
			
			<div class="col-75" style="width: 100%;">
			  <input type="submit" name="submit" value="Research And Go To Reset">
			  </div>
			  <div class="col-75" style="width: 100%;">
			  <input type="reset" value="Reset">
			
			  </div>
			</div>
			 
		  </form>

		</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>