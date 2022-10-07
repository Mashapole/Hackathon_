<html>

<body>

    
			<script type="text/javascript">

          
			function ErrorHandling() 
			
			    {
				var x = document.forms["getEr"]["studentNo"].value;
				
				if (x == "") 
				{
				alert("username must be filled out");
				return false;
				}
				}

            </script>

<?php

session_start();
include "Connection/Db.php";



$error=0;

$ema=(isset($_POST['studentNo']) ? $_POST['studentNo'] : '');
$pass=(isset($_POST['pass']) ? $_POST['pass'] : '');


 if(!empty($_SESSION['Student_Number']) && !empty($_SESSION['pas']))
 {

   echo '<script>window.location="menuBar.php"</script>';
	
 }
 else
 {
if($connect==false)
{
	print"Something is wrong with the connection";
}
else
     {

		 if($connect==true)
		 {
			 $select="Select* from student_registry where Student_Number='".$ema."' AND Password='".md5($pass)."'";
			 
			 $getResult=mysqli_query($connect,$select);
		
		     $fetc=mysqli_num_rows($getResult);
             $row=mysqli_fetch_array($getResult);
			 
			 
			 if($fetc==1)
			 {
				
				$_SESSION['Student_Number']=$row['Student_Number'];
				$_SESSION['Password']=$row['Password'];
				$_SESSION['email_Add']=$row['email_address'];
			    $_SESSION['stName']=$row['fName'];
				  echo '<script>window.location="menuBar.php"</script>';
			  
			 }
			 else if($fetc==0)
			 {
				 echo "<script> if(confirm('The Student Number or password is wrong')){window.location.href='current.php'};</script>";

			 }
	 }
	 }
			}
	 
?>

</html>

</body>

