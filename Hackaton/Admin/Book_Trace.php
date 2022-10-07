<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Borrow Option</title>
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
.topnav a 
{
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover
{
  background-color: #ddd;
  color: black;
}

.topnav a.active 
{
  background-color: #04AA6D;
  color: white;
}

.topnav-centered a 
{
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.topnav-right 
{
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

		label
		{
		  padding: 12px 12px 12px 0;
		  display: inline-block;
		}

		input[type=submit] {
		  background-color: #04AA6D;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		  float: right;
		}
	input[type=reset] {
		  background-color: #04AA6D;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		  float: left;
		  width: 200px;
		}

		input[type=submit]:hover 
		{
		  background-color: #45a049;
		}

		.container 
		{
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
	
</style>
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(
		
		function(){
			$("#ajaxdata").load("allrecords2.php");
			
			$("#price_dropdown").change(function()
			{
				var selected=$(this).val();
				$("#ajaxdata").load("search2.php",{selected_price: selected});
			});
			
			$("#refresh").click(function(){
				$("#ajaxdata").load("allrecords2.php");
			});
			
		});
	</script>
<body>

<!-- Top navigation -->
<div class="topnav">

  <!-- Centered link -->
  <div class="topnav-centered">
    <a href="#" class="active">Book Tracing</a>
	
  </div>
  
  <!-- Left-aligned links (default) -->
    <a href="../Admin/Home.php" class="">Home</a>
	
  <!-- Right-aligned links -->
  <div class="topnav-right">
    <a href="../Admin/Logout.php">Sign Out</a>
  </div>
  
</div>
<br>
<h1 align="center">Book Trace</h1>
<br>
<br>

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
					<option>---Select One---</option>
					<option val="Returned">Returned</option>
				</select>
			</div>
			<br><br>
			<button style="width: 100%; height: 50px;" type="button" name="refresh" id="refresh" class="btn btn-primary">Refresh</button>
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




