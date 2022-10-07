<?php
session_start();
include "../Connection/Db.php";

  $bookID =   $_SESSION['ID'];
	if(isset($_POST['btnDonate']))
	{
		
		$title = trim($_POST['book_tittle']);
		$title = mysqli_real_escape_string($connect, $title);
		
		$isbn = trim($_POST['txt_isbn']);
		$isbn = mysqli_real_escape_string($connect, $isbn);

		$author = trim($_POST['txt_author']);
		$author = mysqli_real_escape_string($connect, $author);
		
		$description = trim($_POST['txt_subject']);
		$description = mysqli_real_escape_string($connect, $description);
		
		$publisher = trim($_POST['publish']);
		$publisher = mysqli_real_escape_string($connect, $publisher);

	
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../upload/images/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}
		$getStudent=0;
		//Book_Id,Tittle,ISBN,author_name,Description,Image,Publisher,Student_Number
		$query = "UPDATE books SET Tittle='" . $title . "', ISBN='" . $isbn . "', author_name='" . $author . "', Description='" . $description . "', Image='" .$image. "', Publisher='" . $publisher . "', Student_Number='" . $getStudent . "' WHERE Book_Id='".$bookID."'";
		$result = mysqli_query($connect, $query);
		
		if(!$result)
		{
			echo "The Caught Error" . mysqli_error($connect);
			exit;
		} else 
		{
			echo '<script>alert("The Book Details Is been Update")</script>';
			echo '<script>window.location="../Admin/Home.php"</script>';
		}
	}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Update Book</title>
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

<div class="topnav">

  <!-- Centered link -->
  <div class="topnav-centered">  
  <a href="../Admin/update.php" class="active">Update Record</a>
  </div>
  
  <!-- Left-aligned links (default) -->
  <a href="../Admin/Home.php" >Home</a>


  
  <!-- Right-aligned links -->
  <div class="topnav-right">
   <a href="../Admin/Logout.php">Sign Out</a>
  </div>
  
</div>

 <?php
 
 include "../Connection/Db.php";
 

  $query = "SELECT * FROM books WHERE Book_Id = '$bookID'";
  
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
 <h1 align="center">Update Book Details Here</h1>
 
 <div class="container">
  <form action="#" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="book_tittle">Book Tittle</label>
      </div>
      <div class="col-75">
        <input type="text" id="book_tittle" value="<?php echo $row['Tittle']; ?>" name="book_tittle" placeholder="Programming Logic And Design">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="isbn">ISBN</label>
      </div>
      <div class="col-75">
        <input type="text" id="txt_isbn" value="<?php echo $row['ISBN']; ?>" name="txt_isbn" placeholder="978-0-321-94786-4">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
		<label for="author">Author Name</label>
      </div>
      <div class="col-75">
              <input type="text" value="<?php echo $row['author_name']; ?>" id="txt_author" name="txt_author" placeholder="Cengage">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Book Description</label>
      </div>
      <div class="col-75">
        <textarea id="txt_subject" name="txt_subject" placeholder="Write something.." style="height:200px"> <?php echo $row['Description']; ?></textarea>
      </div>
    </div>
	 <div class="row">
      <div class="col-25">
		<label for="image">Image</label>
      </div>
      <div class="col-75">
        <input type="file" name="image">
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="publish">Publisher</label>
      </div>
      <div class="col-75">
       <input type="text" value="<?php echo $row['Publisher']; ?>" name="publish" required>
      </div>
    </div>
	<br><br>
	
	<table>
  <tr>
    <th><input type="submit" name="btnDonate" value="Update Book Details"></th>
    <th><input type="reset" value="Reset"></th>
  </tr>
  <table>
  </form>
</div>



</body>
</html>
