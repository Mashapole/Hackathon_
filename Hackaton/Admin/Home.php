<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Home</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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

/* ----- Statistic ----- */
.statistic {
    padding-top: 57px;
}

.statistic__item {
    border: 1px solid #e5e5e5;
    background: #fff;
    padding: 20px 30px;
    position: relative;
    min-height: 180px;
    overflow: hidden;
    margin-bottom: 40px;
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item {
        padding: 20px 10px;
    }
}

.statistic__item h2 {
    font-size: 36px;
    font-weight: 300;
    color: #4272d7;
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item h2 {
        font-size: 22px;
    }
}

.statistic__item .desc {
    font-size: 18px;
    text-transform: uppercase;
    font-weight: 300;
    color: rgba(128, 128, 128, 0.6);
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item .desc {
        font-size: 13px;
    }
}

.statistic__item .icon {
    display: inline-block;
    position: absolute;
    bottom: -50px;
    right: -7px;
}

.statistic__item .icon i {
    font-size: 180px;
    color: #808080;
    opacity: .2;
    line-height: 1;
    vertical-align: baseline;
}

.statistic__item--green {
    background: #00b26f;
}

.statistic__item--orange {
    background: #ff8300;
}

.statistic__item--blue {
    background: #00b5e9;
}

.statistic__item--red {
    background: #fa4251;
}

/* ----- Statistic 2 ----- */
.statistic2 {
    padding-top: 50px;
}

.statistic2 .statistic__item {
    border: none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
}

.statistic2 .statistic__item h2 {
    color: #fff;
}

.statistic2 .statistic__item .desc {
    color: rgba(255, 255, 255, 0.6);
}
.min
{
	width: 50%;
	
}
</style>


</head>
<body>

<?php


session_start();
include "../Connection/Db.php";


			 $select="Select* from student_registry";
			 
			 //done
			 $select2="select* from books where Student_Number!=0";
			
			 $select3="select* from books";
			 $select4="select* from book_request";
			
			 $select5="select* from trace_book";
			 
			 $getResult=mysqli_query($connect,$select);
		     $getResult2=mysqli_query($connect,$select2);
			 $getResult3=mysqli_query($connect,$select3);
			 $getResult4=mysqli_query($connect,$select4);
			 $getResult5=mysqli_query($connect,$select5);
			  
			  
			 $rows = mysqli_num_rows($getResult2);
			 $rows2 = mysqli_num_rows($getResult3);
			 $rows3 = mysqli_num_rows($getResult4);
			 $rows5 = mysqli_num_rows($getResult5);
			 $rows4 = mysqli_num_rows($getResult);
		    

?>
<!-- Top navigation -->
<div class="topnav">

<?php
  
  
  $getMess = mysqli_num_rows(mysqli_query($connect,"select count(req_id) from book_request"));
  $getMess1 = mysqli_num_rows(mysqli_query($connect,"select count(temp_id) from book_temp"));
  $getMess2 = mysqli_num_rows(mysqli_query($connect,"select count(trace_id) from trace_book"));
  ?>
  <!-- Centered link -->
  <div class="topnav-centered">
  <a href="../Admin/Manage.php" class="notification "> <span>Book Request</span>
  <span class="badge" style="margin-top: -10px;">(<?php echo $getMess;?>)</span></a>
	
  </div>
  
  <!-- Left-aligned links (default) -->
  <a href="../Admin/Home.php" class="active">Home</a>
  <a href="../Admin/Add_book.php">Add Book</a>
  <a href="../Admin/donation_action.php" class="notification"> <span>Donations Made</span>
  <span class="badge" style="margin-top: -10px;">(<?php echo $getMess1;?>)</span></a>
  
  <!-- Right-aligned links -->
  <div class="topnav-right">
  <a href="../Admin/Book_Trace.php" class="notification "> <span>Book Tracing</span>
  <span class="badge" style="margin-top: -10px;">(<?php echo $getMess2;?>)</span></a>
   <a href="../Admin/Catalog.php">View Catalog</a>
   <a href="../Admin/Logout.php">SIgn Out</a>
  </div>
</div>

<br><br>

<div align="center">
           <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><?php echo  $rows;?></h2>
                                <span class="desc">Total Number Of Books Donated</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><?php echo  $rows2;?></h2>
                                <span class="desc">Total Number of Catalog Book</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"><?php echo  $rows3;?></h2>
                                <span class="desc">Total Number of Borrowed Book</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
						
						 <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"><?php echo  $rows4;?></h2>
                                <span class="desc">Total Number of Student</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
						
						 <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"></h2>
                                <span class="desc"></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
						<div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><?php echo  $rows5;?></h2>
                                <span class="desc">Book Tracing</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
						<div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"></h2>
                                <span class="desc"></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
      </div>

 

</body>
</html>
