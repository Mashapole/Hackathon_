<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e26e4799e8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Hover-master/css/hover-min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="sty.css">
	
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Add Student</title>
	
	<style>
		img
		{
		  border-radius: 50%;
		}
		.line
		{
		 width:50%;
		 background-color: red;
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
		
	</style>
</head>
<body>

      <div class="home">
	  

       <nav class="navbar navbar-expand-md  navbar-dark fixed-top">

            <a class="navbar-brand" href="index.php"><img src="Images/Logo/logo.jpg" class="imagelogo" height="75" width="70"></a>
          
           
            <a class="navbar-toggler togg" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">

              <i class="fas fa-bars menu "></i>
            </a>
  
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav navbar-t">
               
					<li class="nav-item">
					  <a class="nav-link" href="index.php" ">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="current.php" >Current Student</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Add_Student.php" style="background-color: blue;">Register</a>
                  </li>
				  
              </ul>
              
              
            </div>
          </nav>
     </div>
	 
	 <br><br><br> <br><br><br> <br>
	 
	 <?php
	 
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
	
	//collect3
	if (empty($_POST["pre_name"])) 
	{
    $preferNameErr = "Prefered Name is required";
	} 
	else 
	{
    $pre_name = test_input($_POST["pre_name"]);
 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$pre_name))
	{
     $preferNameErr = "Only letters and white space allowed";
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
	  
  if (empty($_POST["gender"])) 
  {
    $gendError = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
    if (empty($_POST["Nationality"])) 
  {
    $nationalityErr = "Nationality is required";
  } else 
  {
    $Nationality = test_input($_POST["Nationality"]);
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
	}
	
	//start
	
	if( preg_match( "/^\+27[0-9]{9}$/", $mobile) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z-' ]*$/",$firstname) && preg_match("/^[a-zA-Z-' ]*$/",$lastname) && preg_match("/^[a-zA-Z-' ]*$/",$pre_name) && $firstname!="" && $lastname!="" && $pre_name!="" && $Nationality!="" && $email!="" && $mobile!="" && $pass!="" && $gender!="")
	{

//session_start();

 $getSelection="Select* from student_registry";
			  
			   $SendResults=mysqli_query($connect,$getSelection);
			   $getRows = mysqli_num_rows($SendResults);
			  
			    if($getRows==0)
				{
					$pass="INSERT INTO `student_registry` (`Student_ID`, `Student_Number`, `fName`, `sName`, `pName`, `Nationality`, `Gender`, `email_address`, `contact`, `Password`) VALUES (NULL, '20210000', '', '', '', '', '', '', '', '')";
					$mes=mysqli_query($connect,$pass);
						
				}



if(isset($_POST['submit']))
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
						  echo '<script>alert("Your Application Will Be Received But Email Is Invalid")</script>';
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
//end


	}
	
	}
	 ?>
	   <h1 align="center">Enter The Following To Register</h1>
	   <br><br>
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
				<label for="country">Prefered Name</label>
			  </div>
			  <div class="col-75">
				<input type="text" id="pre_name" name="pre_name"  placeholder="John" value="<?php echo $pre_name;?>">
			  </div><div class="err">*</div>
			</div>
			<span class="error" > <?php echo $preferNameErr;?></span>
			 <hr align="center" style="background-color: blue; width: 91%;">
			<div class="row">
			  <div class="col-25">
				<label for="Nationality">Nationality:</label><br>
			  </div>
			  <div class="col-75">
			  
			  <input type="radio" name="Nationality" <?php if (isset($Nationality) && $Nationality=="RSA") echo "checked";?> value="RSA">&nbsp;&nbsp;RSA<br>
				<input type="radio" name="Nationality" <?php if (isset($Nationality) && $Nationality=="Other") echo "checked";?> value="Other">&nbsp;&nbsp;Other
			  </div>
			  <div class="err">*</div>
			 
			</div>
			  <hr align="center" style="background-color: blue; width: 91%;">
			<span class="error" > <?php echo $nationalityErr;?></span>
			<div class="row">
			  <div class="col-25">
				<label for="gender">Gender:</label><br>
			  </div>
			  <div class="col-75">
				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">&nbsp;&nbsp;Female<br>
				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">&nbsp;&nbsp;Male
			  </div>
			  <div class="err">*</div>
			</div>
			 <hr align="center" style="background-color: blue; width: 91%;">
			 <span class="error"><?php echo $gendError;?></span>
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
			  <div class="err">*</div>
			</div>
			<span class="error"><?php echo $phoneError;?></span>
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
			<div class="row">
			
			<div class="col-75" style="width: 100%;">
			  <input type="submit" name="submit" value="Register">
			  </div>
			  <div class="col-75" style="width: 100%;">
			  <input type="reset" value="Reset">
			
			  </div>
			  <br>
			  
	
			</div>
			
		  </form>
		  <br>
		  <a href="current.php" class="cen">Already Registered Student?</a>
		</div>
<br>
    <footer style="background-color: #24262b; padding: 70px 0;">
	
	</footer>


    
     
            	  
		 


    
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