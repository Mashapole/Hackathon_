<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Respond</title>
<style>

body
 {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  position: relative;
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav-centered a {
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.topnav-right {
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

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  width: 30%;
  cursor: pointer;
  float: left;
}

input[type=reset] {
  background-color: #04AA6D;
  color: white;
  width: 50%;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
input[type=submit]:hover {
  background-color: #45a049;
}

.container {
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
table
 {
  width: 100%;
}
</style>
</head>
<body>
<?php

session_start();
include "../Connection/Db.php";
		
 $reg = $_GET['bookID'];
$query = "SELECT sr.Student_Number,sr.fName,sr.sName,sr.email_address,sr.contact,b.author_name,b.Tittle,b.Image,b.Publisher,b.ISBN,b.Description,br.req_id,br.Reason,br.Period,br.DateOfRequest,br.Book_ID from student_registry sr,books b,book_request br where sr.Student_Number=br.Student_Number AND b.Book_ID=br.Book_ID AND br.req_id='".$reg."'";

$getResult=mysqli_query($connect,$query);

 $fetc=mysqli_num_rows($getResult);
 $row=mysqli_fetch_array($getResult);
 
				$tittle="";
				$isbn="";
				$emailAddress="";
				$userName="";
			if($fetc==1)
			 {
				 $tittle=$row['Tittle'];
				 $isbn=$row['ISBN'];
				 $userName=$row['fName'];
				 $emailAddress=$row['email_address'];
				 $description=$row['Description'];
				 $Image=$row['Image'];
				 $Publisher=$row['Publisher'];
				 $Category="";
				 $Date_Borrowed=$row['DateOfRequest'];
				 $Date_Expected_Returned="Was/Valid For  ".$row['Period'];
				 $Status="";
				 $Student_Number=$row['Student_Number'];

			 }
			 
			 
			if(isset($_POST['btnDonate'])) 
			{
					$sender = 'From: ralezemoshake@gmail.com';
					$getEmail=$emailAddress;
					$recipient = $getEmail;

					$subject = "Libriary Feedback";
					$message = "Dear  ". $userName."\n\n\n"."Thanks For Waiting"."\n\n"."As Promised To get Back To You. Kindly Collect Your Book From Libriary On ".$_POST['dateCollection'].". Time For Your Book Collection is between ".$_POST['timeFrom']." And ".$_POST['timeTo']."\n\n"."Kind Regards,"."\n"."The School Libriary";
					$headers = 'From:' . $sender;


					if (mail($recipient, $subject, $message, $headers))
					{
						  echo '<script>alert("The Respond Sent To The Student")</script>';
						  
						     $bookID = $_GET['bookID'];
							 
							 
							 //trace_id,Tittle,ISBN,Description,Image,Publisher,Category,Date_Borrowed,Date_Expected_Returned,Status,Student_Number
							 
							 $ret="";
							 $insert_Data="Insert into trace_book(trace_id,Tittle,ISBN,Description,Image,Publisher,Category,Date_Borrowed,Date_Expected_Returned,Date_Of_Return,Status,Student_Number) values (null,'".$tittle."','".$isbn."','".$description."','".$Image."','".$Publisher."','".$Category."','". $Date_Borrowed."','".$Date_Expected_Returned."','".$ret."','".$Status."','". $Student_Number."')";
							 $feed_Quesry=mysqli_query($connect, $insert_Data);
							 
							 if($feed_Quesry==true)
							 {
							 $query2 = "DELETE FROM book_request WHERE req_id ='".$bookID."'";
							 $result = mysqli_query($connect, $query2);
							 echo '<script>window.location="../Admin/Home.php"</script>';
							 }
					}
					else
					{
						  echo '<script>alert("Your Application Will Be Received But Email Is Invalid")</script>';
                          echo '<script>window.location="../Admin/Home.php"</script>';
					}
			 
			}
 
?>

 <h1 align="center">Respond To Request</h1>
 
 <div class="container">
  <form action="#" method="post" enctype="multipart/form-data">
  
   <div class="row">
      <div class="col-25">
        <label for="To">Respond Request To</label>
      </div>
      <div class="col-75">
        <input type="text" id="txtTo" name="txtTo" value="<?php echo $emailAddress;?>" placeholder="Shake" disabled>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="book_tittle">Book Tittle</label>
      </div>
      <div class="col-75">
        <input type="text" id="book_tittle" name="book_tittle" value="<?php echo $tittle;?>" placeholder="Programming Logic And Design" disabled>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="isbn">ISBN</label>
      </div>
      <div class="col-75">
        <input type="text" id="txt_isbn" name="txt_isbn" value="<?php echo $isbn;?>" placeholder="978-0-321-94786-4" disabled>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
		<label for="dateCollection">Date Of Collection</label>
      </div>
      <div class="col-75">
              <input type="date" id="dateCollection" name="dateCollection" style="width: 100%;" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="timeFrom">Time From</label>
      </div>
      <div class="col-75">
        <input type="time" id="timeFrom" name="timeFrom" style="width: 100%;" required>
      </div>
    </div>
	 <div class="row">
      <div class="col-25">
        <label for="timeTo">Time To</label required>
      </div>
      <div class="col-75">
        <input type="time" id="timeTo" name="timeTo" style="width: 100%;">
      </div>
    </div>
	<br><br>
	
	<table>
  <tr>
    <th><input type="submit" name="btnDonate" value="Respond The Request"></th>
    <th><input type="reset" value="Reset"></th>
  </tr>
  <table>
  </form>
</div>



</body>
</html>
