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
    <title>Admin Login</title>
	
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
		
		.frm
		{
			justify-content: center;
			display:flex;
			margin-top: 125px;
			
		}

		form
		{
				width: 400px;
			height: 20px;
		}
		h2
		{
			text-align: center;
			font-family: "Courier New",monospace;
		}
		
		
</style>
		
	</style>
</head>
<body>

  <?php

session_start();
include "../Connection/Db.php";


if(isset($_POST['save']))
{ 
$error=0;

$ema=(isset($_POST['username']) ? $_POST['username'] : '');
$pass=(isset($_POST['pass']) ? $_POST['pass'] : '');


if(!empty($_SESSION['admin']) && !empty($_SESSION['passAdmin']))
 {

   echo '<script>window.location="../Admin/Home.php"</script>';
	
 }
 else
 {
	 if($connect==true)
		 {
			 $select="Select* from admin where username='".$ema."' AND password='".$pass."'";
			 
			 $getResult=mysqli_query($connect,$select);
		
		     $fetc=mysqli_num_rows($getResult);
             $row=mysqli_fetch_array($getResult);
			 
			 
			 if($fetc==1)
			 {
			
				$_SESSION['admin']=$row['username'];
				$_SESSION['passAdmin']=$row['password'];
				
				echo '<script>alert("Welcome To Your Portal")</script>';
				echo '<script>window.location="../Admin/Home.php"</script>';
			 }
			 else if($fetc==0)
			 {
				 echo "<script> if(confirm('The Username or password is wrong')){window.location.href='../Admin/Login.php'};</script>";
			 }
	 }
 }

}

	 
?>

	 
	 <br><br><br> 
	 
	   <div class="frm">
    <form name="getEr" id="getEr" onsubmit="return ErrorHandling()"  action="#" method="post" enctype="multipart/form-data">
		<h2 >Login</h2>
		<br>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required" style="width: 100%;">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <button type="submit" name="save" style="background-color: black" class="btn btn-success btn-lg btn-block">Login</button>
        </div>
    </form>

    


    
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