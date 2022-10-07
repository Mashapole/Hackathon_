<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Available Books</title>
<style>
body {
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
 th, td 
 {
  padding: 15px;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="topnav">

<?php
include "../Connection/Db.php";
$getMess1 = mysqli_num_rows(mysqli_query($connect,"select count(req_id) from book_request"));


?>
  <!-- Centered link -->
  <div class="topnav-centered">
 
	
   <a href="#" class="notification active"> <span>Book Request</span>
  <span class="badge" style="margin-top: -10px;">(<?php echo $getMess1;?>)</span></a>
  </div>
  
  <!-- Left-aligned links (default) -->
  <a href="../Admin/Home.php">Home</a>
  <a href="../Admin/Add_book.php">Add Book</a>

  
  <!-- Right-aligned links -->
  <div class="topnav-right">
   <a href="../Admin/Catalog.php">View Catalog</a>
   <a href="../Admin/Logout.php">SIgn Out</a>
  </div>
</div>

 <h1 align="center">Book Request Made</h1>

 <div class="container">
 <br />

 <?php
session_start();



 $query = "SELECT sr.Student_Number,sr.fName,sr.sName,sr.email_address,sr.contact,b.author_name,b.Tittle,b.Image,b.Publisher,b.ISBN,b.Description,br.req_id,br.Reason,br.Period,br.DateOfRequest,br.Book_ID from student_registry sr,books b,book_request br where sr.Student_Number=br.Student_Number AND b.Book_ID=br.Book_ID ORDER by br.DateOfRequest ASC";
 $result = mysqli_query($connect, $query);
 

 if(mysqli_num_rows($result) > 0)
 {
 while($row = mysqli_fetch_array($result))
 {
 ?>
 <div class="col-md-4">
 <form method="post" >
  <div style="border:3px solid blue;  border-radius:5px; padding:16px;  
         max-width: 450px;
         min-width: 350px;
         max-height:auto;
         min-height: 350px;" align="center">
		 
		 
 <h4 class="text-info"><?php echo "Book Tittle: <br><br>".$row["Tittle"]; ?></h4>
 <img src="../upload/images/<?php echo $row['Image']; ?>" height="300px"></img><br>

  <br>
 
 <table>

  <tr>
    <td style="width:90px">Author :</td>
    <td><?php echo $row["author_name"]; ?><br></td>
  </tr>
    <tr>
    <td>Publisher:</td>
     <td><?php echo $row["Publisher"]; ?></td>
  </tr>
    <tr>
    <td>ISBN :</td>
      <td><?php echo $row["ISBN"]; ?></td>
  </tr>
  <tr>
    <td style="width:90px">****************************</td>
    <td><br></td>
  </tr>
    <tr>
    <td style="width:90px">Requester Name</td>
    <td><?php echo $row["fName"]; ?></td>
  </tr>
  <tr>
    <td style="width:90px">Requester Surname</td>
    <td><?php echo $row["sName"]; ?></td>
  </tr>
    <tr>
    <td style="width:90px">Requester StudentNo</td>
    <td><?php echo $row["Student_Number"]; ?></td>
  </tr>
  <tr>
    <td style="width:90px">Requester Date</td>
    <td><?php echo $row["DateOfRequest"]; ?></td>
  </tr>
  <tr>
    <td style="width:90px">Requester Period</td>
    <td><?php echo $row["Period"]; ?></td>
  </tr>
  <tr>
    <td style="width:90px">Requester contact</td>
    <td><?php echo $row["contact"]; ?></td>
  </tr>
  <tr>
    <td style="width:90px">Requester email</td>
    <td><a href="mailto:<?php echo $row["email_address"];?>"><?php echo $row["email_address"]; ?></a></td>
  </tr>
    <tr>
    <td style="width:90px">****************************</td>
    <td><br></td>
  </tr>
 </table>
   <br>  <br>
   <table>
   
   <tr >
   <td style="width:150px"><a href="DeleteRequest.php?bookID=<?php echo $row['req_id']; ?>" >Delete Request</a> </td>
   <td><a href="RespondRequest.php?bookID=<?php echo $row['req_id']; ?>">Respond To Request</a></td>
   </tr>
   </table>
  <br>
 </div>
 
 </form>
<br>
 </div>

 <?php } }?>

</body>
</html>
