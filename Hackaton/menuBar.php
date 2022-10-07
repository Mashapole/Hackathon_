<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<title>Student Home </title>
<style>
body 
{
	font-family: "Lato", sans-serif;
	}

.sidebar 
{
  height: 100%;
  width: 230px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a 
{
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover 
{
  color: #f1f1f1;
}

.main {
  margin-left: 260px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
img 
{
  border-radius: 50%;
}
.center 
{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.center2
{
	text-align: center;
}
.head
{
	width: 100%;
	background-color: DodgerBlue;
	  padding-top: 16px;
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

</style>
</head>
<body>
<?php


session_start();
include "Connection/Db.php";


			 $getStudent=$_SESSION['Student_Number'];
			 $select="Select* from student_registry where Student_Number='".$getStudent."'";
			 $select2="select* from books where Student_Number!='".$getStudent."'";
			
			 $select3="select* from books";
			 $select4="select* from book_request where Student_Number='".$getStudent."'";
			
			 $getResult=mysqli_query($connect,$select);
		     $getResult2=mysqli_query($connect,$select2);
			 $getResult3=mysqli_query($connect,$select3);
			 $getResult4=mysqli_query($connect,$select4);
			  
			 $rows = mysqli_num_rows($getResult);
			 $rows2 = mysqli_num_rows($getResult3);
			 $rows3 = mysqli_num_rows($getResult4);
			   
		     $fetc=mysqli_num_rows($getResult);
             $row=mysqli_fetch_array($getResult);
			 
			 $studentName="";
			 $studentSurname="";
			 if($fetc==1)
			 {
			
				$studentSurname=$row['sName'];
			    $studentName=$row['fName'];

			  
			 }

?>
<div class="sidebar">

	<div class="top">
	<img src="Images/icon/userIcon.png" height="140" width="130" class="center"></img>
	<br>
	<div class="center2">
	<?php echo  $studentName."	".$studentSurname?><br><br>
	<a href="Logout.php">Sign Out</a>
	</div>
	</div>
	<br><br>
	<hr>
  <a href="#"><i class="fa fa-fw fa-home"></i> Dashboard</a><br>
  <hr>
  <a href="donate.php"><i class='fas fa-heart'></i> Donate</a><br>
  <hr>
  <a href="book.php"><i class="fa fa-book" aria-hidden="true"></i> Catalog</a><br>
  <hr>
  <a href="History.php"><i class="fa fa-history" aria-hidden="true"></i> Borrowed History</a><br>
  <hr>
  <a href="DonatedHistory.php"><i class="fa fa-history" aria-hidden="true"></i> Donation History</a><br>
  <hr>
</div>

<div class="main">
  <h2 align="center">Welcome To Portal <span style="color:blue;"><?php echo  $studentName."	".$studentSurname;?></span></h2>
  <br><br><br>
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

                    </div>
                </div>
            </section>
     
</body>
</html> 
