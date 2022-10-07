<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e26e4799e8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Hover-master/css/hover-min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="sty.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <title>Index Page</title>
	
	<style>
	
		img
		{
		  border-radius: 50%;
		}
		.header1 .h1
		{
			color: white;
		}
		
		
	</style>
	
</head>
<body>

     
        <nav class="navbar navbar-expand-md  navbar-dark fixed-top">

            <a class="navbar-brand" href="index.php"><img src="Images/Logo/logo.jpg" class="imagelogo" height="75" width="70"></a>
          
           
            <a class="navbar-toggler togg" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">

              <i class="fas fa-bars menu "></i>
            </a>
  
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav navbar-t">
               
					<li class="nav-item">
					  <a class="nav-link" href="index.php" style="background-color: blue;">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="current.php">Current Student</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Add_Student.php" >Register</a>
                  </li>
				  
              </ul>
              
              
            </div>
          </nav>
		  
		  

		 <div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div class="first-section" style="background-image:url('Images/background/books.jpg'); background-size: cover; min-height: 100vh;width: 100%;overflow: hidden;position: relative;   background-repeat: no-repeat;">
					<div align="center" class="header1" style="margin-top: 200px; color: white;">
		  
				     <h2 class="h1">Welcome To Our book Site</h2>
                     <br>
					 <h3  data-aos="fade-right" data-aos-duration="1000">
					 Everything you need for a better future and success has already been written.<br>
					 And guess what? All you have to do is come to the library</h3>
													
				 </div>
					
				</div>
			</div>
			<div class="carousel-item">
				<div class="first-section" style="background-image:url('Images/background/Donate.jpg'); background-size: cover; min-height: 100vh;width: 100%;overflow: hidden;position: relative;   background-repeat: no-repeat;">
					
			<div class="home-content">
		  
					   <h1 style="color: white">True generosity is giving for free</h1>
					  
						  <br>
						<h3 data-aos="fade-right"
						data-aos-duration="1000" style="color: white">
						
						   We are all from different backgrounds, Donate to the needy;<br>
						   by donating you are not seeking for publicity, but helping <br>
						   the needy ones  
						  </h3>  
							 <div class="home-btn">
								<a href="current.php"> <button class="btnl bt" data-aos="fade-down"
								 data-aos-duration="1000">Donate Now</button></a>
							 </div>
          </div>
				</div>
			</div>
			<div class="carousel-item">
				<div  class="first-section" style="background-image:url('Images/background/purpose.jpg'); background-size: cover; min-height: 100vh;width: 100%;overflow: hidden;position: relative;   background-repeat: no-repeat;">
					
					<div class="home-content" >
		  
					   <h1 style="color: white">What You Do Is What Discribes You</h1>
					    <br>
						<h3 data-aos="fade-right"
						data-aos-duration="1000" style="color: white">
						
						  That’s what we consider true generosity: You give your all, and yet you
						  always feel as if it costs you nothing. We make a living by what we get,
						  but we make a life by what we give  
						  </h3>  
          </div>
				</div>
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
   


 <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
    
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<footer class="footer">
  
  </footer>
</body>
</html>