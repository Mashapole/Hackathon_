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
	
    <title>Current Student Login</title>
	
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
	 
	 $nameErr =$secondNameEr=$preferNameErr=$nationalityErr= $emailErr =$phoneError=$passwordErr= $gendError="";
	 
	$firstname =$lastname=$pre_name=$Nationality=$email=$mobile=$pass= $gender="" ;
	
	
	function test_input($data) 
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	$uppercase=$lowercase=$number=$specialChars=""; 
	 if (empty($_POST["pass"])) 
	{
    $passwordErr = "Password is required";
	} 
	else 
	{
    $pass = test_input($_POST["pass"]);
	
	$uppercase = preg_match('@[A-Z]@', $pass);
	$lowercase = preg_match('@[a-z]@', $pass);
	$number    = preg_match('@[0-9]@', $pass);
	$specialChars = preg_match('@[^\w]@', $pass);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
		$passwordErr="Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
	}
	else
	{
	if(isset($_POST['submit']))
	{
		$userEmail=$_SESSION['email'];
		$name=$_SESSION['firstName'];
		
     $sql = "UPDATE `student_registry` SET `Password` ='".md5($pass)."' WHERE email_address = '".$userEmail."'";
      $getResult=mysqli_query($connect,$sql);

     if($getResult==true)
	 { 
 
					$sender = 'From: ralezemoshake@gmail.com';
				
					$recipient = $userEmail;

					$subject = "Password Reseted";
					$message = "Dear  ". $name."\n\n"."Your Password Is being reseted"."\n\n"."Kind Regards,"."\n"."The School Libriary";
					$headers = 'From:' . $sender;

					if (mail($recipient, $subject, $message, $headers))
					{
						    echo '<script>alert("The Password is being reseted")</script>';
							echo '<script>window.location="current.php"</script>';
						  
					}
					else
					{
						  echo '<script>alert("Your Password is reseted but Email Is Invalid")</script>';
                           echo '<script>window.location="current.php"</script>';
					}

	   
	   
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
			<label for="mobile">Account Password</label>
			  </div>
			  <div class="col-75">
				<input type="password" id="pass" name="pass" value="<?php echo $pass;?>" style="width: 100%; height:70%;">
			  </div>
			  <div class="err">*</div>
			</div>
			<span class="error" > <?php echo $passwordErr;?></span>
			<div class="col-75" style="width: 100%;">
			  <input type="submit" name="submit" value="Fefactor Password">
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