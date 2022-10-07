<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Available Books</title>
<style>
body
 {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav 
{
  position: fixed;
  overflow: hidden;
  width:100%;
  background-color: #333;
  top: 0;
  left: 0;
}

.topnav a 
{
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(
		
		function(){
			$("#ajaxdata").load("allrecords.php");
			
			$("#price_dropdown").change(function()
			{
				var selected=$(this).val();
				$("#ajaxdata").load("search.php",{selected_price: selected});
			});
			
			$("#refresh").click(function(){
				$("#ajaxdata").load("allrecords.php");
			});
			
			$("#btnSearch").click(function(e)
			{
				var input = document.getElementById('search').value;
				
				if(input=="")
				{
					alert("Please fill the field");
				}
				else
				{
					$("#ajaxdata").load("searchDisplay.php",{passedValue: input});
					e.preventDefault();
				}
			});
		});
	</script>
</head>
<body>

<div class="topnav">


  
  <!-- Left-aligned links (default) -->
  <a href="../Admin/Home.php">Home</a>
  <a href="../Admin/Add_book.php" >Add Book</a>

  
  <!-- Right-aligned links -->
  <div class="topnav-right">
   <a href="../Admin/Catalog.php" class="active">Catalog</a>
   <a href="../Admin/Logout.php">Sign Out</a>
  </div>
  
</div>
<br><br><br><br>
 <h1 align="center">Book Catalog</h1>

 <div class="container">
	<br><br>
	<br>
	<div class="row">
		
		
		
		<form method="post" class="form-horizontal">
		
		   <table style="width:100%;" class="table-striped table-responsive">
		     <tr >
			 <th></th>
			 <th></th>
			 
			 </tr>
			 <td style="  background-color: #e9e9e9;height: 70px;">
			<label for="price" class="control-label col-sm-3 col-sm-offset-2" >Category: </label>
			
			<div class="col-sm-2" >
				<select name="price" class="form-control" id="price_dropdown">
					<option>------</option>
					<option val="Diploma in IT in Software Development">Diploma in IT in Software Development</option>
					<option val="Diploma in IT Management">Diploma in IT Management</option>
					<option val="Diploma in IT in Network Management">Diploma in IT in Network Management</option>
					<option val="other">other</option>
				</select>
			</div>
			<button type="button" name="refresh" id="refresh" class="btn btn-primary">Refresh</button>
			</td>
			<td style="  background-color: #e9e9e9;">
			
			<input style="width: 70%; padding: 6px;margin-top: 8px;font-size: 17px;border: none;" type="text" placeholder="Search Tittle/ISBN/Author/Publisher" id="search" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
			<button type="submit" id="btnSearch" style="padding: 6px 10px;margin-right: 16px;cursor: pointer;"><i class="fa fa-search"></i></button>
			</td>
			</table>
		</form>

	</div>
	<br><br>
	<div id="ajaxdata">
		
	</div>
</div>
 
 </form>
 <br>
 </div>


</body>
</html>
