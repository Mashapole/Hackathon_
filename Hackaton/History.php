<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>History</title>
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

<!-- Top navigation -->
<div class="topnav">

  <!-- Centered link -->
  <div class="topnav-centered">
    <a href="#" class="active">Book History</a>
  </div>
  
  <!-- Left-aligned links (default) -->
  <a href="menuBar.php">Home</a>
  <a href="Logout.php">Sign Out</a>
  
  <!-- Right-aligned links -->
  <div class="topnav-right">
    <a href="Donate.php">Donate</a>
    <a href="book.php">Catalog</a>
  </div>
  
</div>

 <h1 align="center">Borrowed Book History</h1>

 <div class="container">
 <br />

 <?php
session_start();
include "Connection/Db.php";

 $user=$_SESSION['Student_Number'];
$query="SELECT b.author_name,b.Tittle,b.Image,b.Publisher,b.ISBN, br.DateOfRequest,br.Book_ID,br.Period,br.Reason from books b, book_request br where b.Book_Id=br.Book_ID AND br.Book_ID IS NOT NULL AND br.Student_Number='".$user."' AND br.Book_ID IS NOT NULL;";
 
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
 <h4 class="text-info"><?php echo $row["Tittle"]; ?></h4>
  <a href="delete.php?bookID=<?php echo $row['Book_ID']; ?>">
 <img src="./upload/images/<?php echo $row['Image']; ?>" height="300px"></img><br>
 </a>
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
    <td style="width:90px">Requested Date :</td>
    <td><?php echo $row["DateOfRequest"]; ?><br></td>
  </tr>
    <tr>
    <td>Period:</td>
     <td><?php echo $row["Period"]; ?></td>
  </tr>
 </table>
  <br>
  
 </div>
 
 </form>
 <br>
 </div>
 <?php } } 
 ?>
</body>
</html>
