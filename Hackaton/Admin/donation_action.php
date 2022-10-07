<html>

<title>Donation_Resp</title>


<head>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<style>
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
  

</style></head>


<body>
<?php
  
  include "../Connection/Db.php";
  $getMess1 = mysqli_num_rows(mysqli_query($connect,"select count(req_id) from book_request"));
  $getMess = mysqli_num_rows(mysqli_query($connect,"select count(temp_id) from book_temp"));
  ?>
<!-- Top navigation -->
<div class="topnav">

  <!-- Centered link -->
  <div class="topnav-centered">
  
  <a href="../Admin/donation_action.php" class="notification active"> <span>Donations Made</span>
  <span class="badge" style="margin-top: -10px;">(<?php echo $getMess;?>)</span></a>
  </div>
  

  <!-- Left-aligned links (default) -->
  <a href="../Admin/Home.php" >Home</a>
  <a href="../Admin/Add_book.php">Add Book</a>

   <a href="../Admin/Manage.php" class="notification"> <span>Book Request</span>
  <span class="badge" style="margin-top: -10px;">(<?php echo $getMess1;?>)</span></a>
  <!-- Right-aligned links -->
  <div class="topnav-right">
   <a href="../Admin/Catalog.php">View Catalog</a>
   <a href="../Admin/Logout.php">SIgn Out</a>
  </div>
</div>

<br><br>
<h1 align="center">Donations Made</h1>


<div class="Outer">

<div class="head">
Donation List
</div>


<div class="outer2">

<div class="table-responsive">
                               
					
   <div class="table-responsive">
   	 <form method="post" >
                                <table class="table table-hover">
                                   
								   <thead>
                                        <tr>
										
                                            <th style="width:2%;">#</th>
                                            <th >Tittle</th>
                                            <th>ISBN</th>
                                            <th>author name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Category</th>
											<th>Publisher</th>
											<th>Donator</th>
											<th>Action</th>
                                        </tr>
                                   		</thead>			
<?php 

session_start();
include "../Connection/Db.php";

$sql = "Select* from book_temp";
$sendReq = mysqli_query($connect,$sql );
            
							if(mysqli_num_rows($sendReq) > 0)
							 {
							 while($row2 = mysqli_fetch_array($sendReq))
							 {
								 $cnt=1;
							 ?>
							
						
							  
							  
                                        <tr>
										   <td class="center"><?php echo $row2["temp_id"]; ?></td>
                                            <td class="center"><?php echo $row2["Tittle"]; ?></td>
                                            <td class="center"><?php echo $row2["ISBN"]; ?></td>
                                            <td class="center"><?php echo $row2["author_name"]; ?></td>
                                            <td class="center"><?php echo $row2["Description"]; ?></td>
                                            <td class="center">
											 <div style="border:3px solid blue;  border-radius:5px; padding:16px;  
													 max-width: 220px;
													 min-width: 320px;
													 max-height:auto;
													 min-height: 350px;" align="center">
													 
													 
											 <img src="../upload/images/<?php echo $row2['Image']; ?>" height="300px" width="80%"></img><br>
											 </a>
											 </div>
											</td>
											<td class="center"><?php echo $row2["Category"]; ?></td>
											<td class="center"><?php echo $row2["Publisher"]; ?></td>
											<td class="center"><a href="Donor_Details.php?bookid=<?php echo $row2["temp_id"]; ?>"><?php echo $row2["Student_Number"]; ?></a></td>
											<td class="center">
											
											<a href="approve.php?bookid=<?php echo $row2["temp_id"]; ?>">  Approve</a>
											 <br><br>
											 <i class=""></i><a href="deleteDonation.php?del=<?php echo $row2["temp_id"]; ?>">   Delete</a>
											 
											 <br><br>                                         
											</td>
                                        </tr>                 
							 <?php  }?>
                                </table>
                            </div>
							 <br>
							
													<?php }?>
													
													 </form>
							
</div>

</div>
</body>
</html>