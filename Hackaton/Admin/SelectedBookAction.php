<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Certain Book</title>
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
 th, td 
 {
  padding: 15px;
}
img 
{
  border-radius: 50%;
}
tr 
{
  border-bottom: 1px solid #ddd;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>


<div class="topnav">

  <!-- Centered link -->
  <div class="topnav-centered">  
  <a href="../Admin/SelectedBookAction.php" class="active">Manupulate Record</a>
  </div>
  
  <!-- Left-aligned links (default) -->
  <a href="../Admin/Home.php" >Home</a>


  
  <!-- Right-aligned links -->
  <div class="topnav-right">
   <a href="../Admin/Logout.php">SIgn Out</a>
  </div>
  
</div>


<br>
 <?php
 
 session_start();
 include "../Connection/Db.php";
 
  $bookID = $_GET['bookID'];
  $_SESSION['ID']=$bookID;
  $query = "SELECT * FROM books WHERE Book_Id  = '$bookID'";
  
  $result = mysqli_query($connect, $query);
  
  if(!$result)
  {
    echo "Error Says:" . mysqli_error($connect);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  
  if(!$row)
  {
    echo "Empty Details";
    exit;
  }
?>
     <h1 align="center">Book Tittle: <?php echo $row['Tittle']; ?></h1>
	 <br><br>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="../upload/images/<?php echo $row['Image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Book Description</h4>
          <p><?php echo $row['Description']; ?></p>
       
        <table>
				   <h2>Book Details</h2>
		      <tr>
				<th style="width:350px"></th>
				<th style="width:350px"></th>
			  </tr>

		   <br>
		  <tr>
		    <td> <h4>Author Name:</h4></td>
			<td><?php echo $row['author_name']; ?></td>
			
		  </tr>
		   <tr>
		    <td> <h4>ISBN:</h4></td>
			<td><?php echo $row['ISBN']; ?></td>
			
		  </tr>
		  <tr>
		    <td> <h4>Publisher:</h4></td>
			<td><?php echo $row['Publisher']; ?></td>
			
		  </tr>
	</table>
	<br><br><br>
          <form method="post" action="update.php">
            <input type="hidden" name="bookisbn" value="<?php echo $bookID;?>">
            <button type="submit" name="btnEdit" style="width: 100%;">Edit</button>  
          </form>
		  <br><br>
		  <form method="post" action="Delete.php">
            <input type="hidden" name="bookisbn" value="<?php echo $bookID;?>">
            <button type="submit" name="btnDelete" style="width: 100%;">Delete</button>  
          </form>
       	</div>
      </div>
</body>
</html>
