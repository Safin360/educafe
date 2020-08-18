<?php 
require_once('config/db_con.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- Responsive Meta-->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- Website SEO -->
		<meta name="keyword" content="lms, online education, school, online school" />
		<meta name="description" content="Free online School Management System" />
		<!-- Author -->
		<meta name="author" content="Sahab Uddin" />
		<!-- Favicon icon -->
		<link rel="icon" type="image/png" href="assets/img/favicon.png" />
		<meta name="robots" content="noindex">
		<!-- Page Title -->
		<title>Home | LMS</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<!-- OWl-Carousel CSS -->
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
		<!-- Lightbox CSS -->
		<link rel="stylesheet" href="assets/css/lightbox.min.css" />
		<!-- Animate CSS -->
		<link rel="stylesheet" href="assets/css/animate.min.css" />
		<!-- Fontawesome CSS-->
		<link rel="stylesheet" href="assets/font/css/font-awesome.min.css" />
		<!-- Custom Style CSS -->
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<!-- ============== Top Header Start ====================== -->
		<header id="top" class="first_bg_color">
			<div class="container">
				<div class="d-flex justify-content-between">
					<!-- ================= Left Top Side Start========== -->
					<div class="first">
						<ul class="d-flex flex-row bd-highlight mb-3 top_list">
							<li class="">
								<a href="#" class="text-white">
									<i class="fa fa-mobile" aria-hidden="true"></i> <span class="d_class">+(00) 112 233 445 56</span>
								</a>
							</li>
							<li class="">
								<a href="#" class="text-white">
									<i class="fa fa-envelope" aria-hidden="true"></i> <span class="d_class"> crazycafe.net@gmail.com</span>
								</a>
							</li>
							<li class="">
								<a href="#" class="text-white">
									<i class="fa fa-calendar" aria-hidden="true"></i> <span class="d_class">Sun-Mon (9am-4pm) </span>
								</a>
							</li>
						</ul>
					</div>
					<!-- ============= Left To Side End ============== -->
					<!-- ============= Right To Side Start ============== -->
					<div class="second">
						<ul class="d-flex flex-row bd-highlight mb-3 top_list">
							<li >
								<a href="#" class="text-white">
									Login
								</a>
								</li> <span class="login_border">|</span>
								<li class="">
									<a href="#" class="text-white">
										Register
									</a>
								</li>
								
							</ul>
						</div>
						<!-- ============ Right Top Side End ============ -->
					</div>
				</div>
			</header>
			<!-- ============== Top Header End ====================== -->
			<!-- ============== Nav Header Start ====================== -->
			<div class="navsection custom_nv_bg_col" id="navstart">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light ">
						<a class="navbar-brand" href="#">
							<img src="assets/img/logo/logo-dark.png" alt="!">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item active">
									<a class="nav-link" href="#">Home <span class="sr-only"></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">About</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Courses</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Events</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Pages</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Contact</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- ============== Nav Header End ====================== -->
			<!-- ============== Slider Section Start ================ -->
			<section class="slider">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
                    <?php
                    if($dbh){
                        $sql = "SELECT * FROM `slider` where status = 1";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($row as $val){
                    ?>
						<div class="carousel-item <?php if($val['id'] == 1) echo 'active';?>">
							<img class="d-block w-100" src="admin/<?php echo $val['image']; ?>" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<h2 class="text-dark"> <?php echo $val['h_title']; ?></h2>
								<p class="text-dark">
                                <?php echo $val['p_title']; ?>
								</p>
								<a href=" <?php echo $val['f_b_link']; ?>" class="btn first_bg_color text-light">VIEW COURSES</a>
								<a href=" <?php echo $val['l_b_link']; ?>" class="btn btn-outline-success text-dark">READ MORE</a>
							</div>
						</div>
                        <?php
                            }
                        }
                        ?>
						
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</section>
			<!-- ============== Slider Section End ================ -->
			<!-- ============== About Us Section Start =============-->
			<section id="about">
				<div class="commn_margin custom_left_margin">
					<div class="row">
						<div class="col-md-5 mr-1">
							<h2 class="custom_h2">Message From The Principal</h2>
							<p class="text-justify custom_padding">Investigationes demonstraverun lectores legere me lius quod ii leg
								unt saepius Claritas est etiam processus dynamicus, qui sequiturm
								utationem consuetudium lectorum Mirum est notare quam litterag
								othica, quam nunc putamus parum claram, anteposuerit litterarum
								formas humanitatis per seacula quarta decima et quinta decimaEo
							dem modo typi qui nunc nobis videntur .</p>
							<img src="assets/img/signature.png" alt="!">
							<p>Principal of Educare</p>
						</div>
						<div class="col-md-6 ">
							<div class="about_bg">
								<img src="assets/img/principle.png" alt="" class="principle_img">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============== About Us Section End =============-->
			<!-- ============== Courses Section Start =============-->
			<section class="courses">
				<div class="container">
					<div class="course_content">
						<h2 class="text-center">
						Our Popular Courses
						</h2>
						<p class="text-center">
							Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet <br>
							doming id quod mazim placerat facer possim assum.
						</p>
					</div>
					<!-- Owl Start -->
					<div class="owl-carousel owl-theme">
                    <?php
                    if($dbh){
                        $sql = "SELECT * FROM `course` where status = 1";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($row as $val){
                    ?>
						<!--Single Slide Start -->
						<div class="item">
							<div class="card">
								<img class="card-img-top" src="admin/<?php echo $val['image']; ?>" alt="Card image cap" style="max-height:200px;">
								<div class="card-body">
									<h5 class="card-title text-center"><?php echo $val['name']; ?></h5>
									<p class="text-center">by <span class="first_color">Joseph Langdon</span></p>
									<p class="card_border"></p>
									<p class="card-text text-center"><?php echo $val['short_description']; ?></p>
									<ul class="list d-flex justify-content-between">
										<li class="list-item">
											<i class="fa fa-user"></i> 300
										</li>
										<li class="list-item">APPLY NOW</li>
										<li class="list-item"> $<?php echo $val['course_price']; ?></li>
									</ul>
								</div>
							</div>
						</div>
                        <?php
                        }
                    }
                        ?>
						<!--Single Slide End -->
						
					</div>
					<!-- Owl End -->
					<div class="text-center custom_padding_2">
						<button class="btn btn-outline-success text-dark">BROWSE ALL COURSES</button>
					</div>
				</div>
			</section>
			<!-- ============== Courses Section End =============-->
			<!-- ============== Facts Section Start =============-->
			<section class="facts">
				<div class="facts_bg">
					<div class="container">
						<div class="row d-flex align-items-center custom_row">
							<div class="col-md-4 facts_custom">
								<h2 class="text-white">Important Facts</h2>
								<p class="text-white">
									Nam liber tempor cum soluta nobis eleifend option  doming id quod mazim facer possim assum.
								</p>
								<button class="btn btn-outline-light">CONTACT US</button>
							</div>
							<div class="col-md-2 text-center">
								<h2 class="counter text-white">300+</h2>
								<p class="text-white">Teachers</p>
							</div>
							<div class="col-md-2 text-center">
								<h2 class="counter text-white">8978+</h2>
								<p class="text-white">Students</p>
							</div>
							<div class="col-md-2 text-center">
								<h2 class="counter text-white">257</h2>
								<p class="text-white">Courses</p>
							</div>
							<div class="col-md-2 text-center">
								<h2 class="counter text-white">500+</h2>
								<p class="text-white">Award Winning</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============== Facts Section End =============-->
			<!-- ============== Recent News Start ============ -->
			<section class="news">
				<div class="container">
					<div class="news-heading">
						<h1 class="text-center">
						Recent News
						</h1>
						<p class="text-center"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet <br>doming id quod mazim placerat facer possim assum.</p>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-lg-6">
							<div class="card">
								<img src="assets/img/recent1.png" class="card-img" alt="...">
								<div class="card-body custom_body">
									<h5 class="card-title">InterAmerican Campus Open House</h5>
									<p>By  <span class="first_color">Rechard Jones</span></p>
									<p>17 Oct 2016 | <i class="fa fa-comments" aria-hidden="true"></i> 75</p>
									<p class="card-text text-left">
										Vel illum dolore eu feugiat nulla fa Vel illum dolore eu feugiat nulla fa
										at vero eros et acsan et iusto. at vero eros et acsan et iusto.
									</p>
									<button class="btn text-left">
									READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 custom_pt_news">
							
							<div class="card mb-3">
								<div class="row no-gutters">
									<div class="col-xs-12 col-sm-12 col-md-5">
										<img src="assets/img/recent2.png" class="card-img custom_card_img" alt="...">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-7">
										<div class="custom_body_2">
											<h4 class="card-title"><b>InterAmerican Campus Open House</b></h4>
											<p>By  <span class="first_color">Rechard Jones</span></p>
											<p>17 Oct 2016 | <i class="fa fa-comments" aria-hidden="true"></i> 75</p>
											<p class="card-text text-left">
												Vel illum dolore eu feugiat nulla fa
												at vero eros et acsan et iusto.
											</p>
											<button class="btn text-left">
											READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
											</button>
										</div>
										<!--  -->
									</div>
								</div>
							</div>
							
							<!--  -->
							
							<div class="card mb-3" style="">
								<div class="row no-gutters">
									<div class="col-xs-12 col-sm-12 col-md-5">
										<img src="assets/img/recent3.png" class="card-img custom_card_img" alt="..." >
									</div>
									<div class="col-xs-12 col-sm-12 col-md-7">
										<div class="custom_body_2">
											<h4 class="card-title"><b>InterAmerican Campus Open House</b></h4>
											<p>By  <span class="first_color">Rechard Jones</span></p>
											<p>17 Oct 2016 | <i class="fa fa-comments" aria-hidden="true"></i> 75</p>
											<p class="card-text text-left">
												Vel illum dolore eu feugiat nulla fa
												at vero eros et acsan et iusto.
											</p>
											<button class="btn text-left">
											READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
											</button>
										</div>
										<!--  -->
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="text-center custom_padding_2">
						<button class="btn btn-outline-success text-dark">BROWSE ALL NEWSES</button>
					</div>
				</section>
				
				<!-- ============== Recent News End   ============ -->
				<!-- ============== Testimonial Section Start ============ -->
				<section class="testimonial">
					<div class="container">
						<div class="testimonial-heading">
							<h1 class="text-center">
							What Student Says?
							</h1>
							<p class="text-center"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet <br>
							doming id quod mazim placerat facer possim assum.</p>
						</div>
						<!-- Owl Start -->
						<div class="testi owl-carousel owl-theme">
							<!--Single Slide Start -->
							<div class="item">
								<div class="main_card">
									<div class="d-flex justify-content-center z_calsss">
										<div>
											<img class="custom_image" src="assets/img/lacturer1.png" alt="Card image cap">
										</div>
										
									</div>
									
									<div class="card custom_card_main">
										<div class="custom_test_card">
											
											<p class="card-text text-left">Nam liber tempor cum soluta nobis eleif
												end option congue nihil impediet doming
												id quod mazim placerat facer possim ass
											um. Typi non habent claritatem.</p>
											<p>
												<b>Rubel Hossen</b><br>
											Department of management</p>
											
										</div>
									</div>
								</div>
								
							</div>
							<!--Single Slide End -->
							<!--Single Slide Start -->
							<div class="item">
								<div class="main_card">
									<div class="d-flex justify-content-center z_calsss">
										<div>
											<img class="custom_image" src="assets/img/lacturer2.png" alt="Card image cap">
										</div>
										
									</div>
									
									<div class="card custom_card_main">
										<div class="custom_test_card">
											
											<p class="card-text text-left">Nam liber tempor cum soluta nobis eleif
												end option congue nihil impediet doming
												id quod mazim placerat facer possim ass
											um. Typi non habent claritatem.</p>
											<p>
												<b>Rubel Hossen</b><br>
											Department of management</p>
											
										</div>
									</div>
								</div>
								
							</div>
							<!--Single Slide End -->
							<!--Single Slide Start -->
							<div class="item">
								<div class="main_card">
									<div class="d-flex justify-content-center z_calsss">
										<div>
											<img class="custom_image" src="assets/img/lacturer3.png" alt="Card image cap">
										</div>
										
									</div>
									
									<div class="card custom_card_main">
										<div class="custom_test_card">
											
											<p class="card-text text-left">Nam liber tempor cum soluta nobis eleif
												end option congue nihil impediet doming
												id quod mazim placerat facer possim ass
											um. Typi non habent claritatem.</p>
											<p>
												<b>Rubel Hossen</b><br>
											Department of management</p>
											
										</div>
									</div>
								</div>
								
							</div>
							<!--Single Slide End -->
							
						</div>
						<!-- Owl End -->
						
					</div>
				</section>
				
				<!-- ============== Testimonial Section End   ============ -->
				<!-- ============== NewsLetter Section Start  ============ -->
				<section class="newsletter first_bg_color">
					<div class="container">
						<div class="newsletter-heading">
							<h1 class="text-center text-light">
							SUBSCRIBE TO OUR NEWSLETTER
							</h1>
							<p class="text-center text-light"> Signup to receive email updates about courses</p>
						</div>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-5 text-center">
								<div class="input-group">
									<form action="">
										<input type="email" name="" id="" placeholder="Your email">
										<button type="submit" class="mailbtn"><i class="fa fa-envelope" aria-hidden="true"></i></button>
									</form>
									
								</div>
								
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</section>
				<!-- ============== NewsLetter Section End  ============ -->
				<!-- ============== Footer Section Start    =============-->
				<footer class="footer">
					<div class="container">
						<div class="row custom_padding_footer pb-3">
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<img src="assets/img/logo_dark.png" alt="">
								<p class="footer_text text-light text-justify">
									Lorem ipsum dolor sit ame consectetu
									adipiscing elit sed diam nonummynibh
									euismod tincidunt ut laoreet dolorema
									ad minim veniam.
								</p>
								<ul class="list">
									<li><a href="#" class="text-white"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp;33 (555) 565688</a></li>
									<li><a href="#" class="text-white"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;crazycafe.net@gmail.com</a></li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 custom_padding_l">
								<h5 class="text-light">Link</h5>
								<div class="row">
									<div class="col-6">
										<ul class="list">
											<li><a href="#" class="text-white"><i class="fa fa-angle-right first_color" aria-hidden="true"></i> Home</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> Courses</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> News</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> Events</a></li>
										</ul>
									</div>
									<div class="col-6">
										<ul class="list">
											<li><a href="#" class="text-white"><i class="fa fa-angle-right first_color" aria-hidden="true"></i> Gallery</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> Courses</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> News</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> Events</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 custom_padding_l">
								<h5 class="text-light">Support</h5>
								<ul class="list">
											<li><a href="#" class="text-white"><i class="fa fa-angle-right first_color" aria-hidden="true"></i> Documentation</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> Forums</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> Language Packs</a></li>
											<li><a href="#" class="text-white"> <i class="fa fa-angle-right first_color" aria-hidden="true"></i> Release Status</a></li>
										</ul>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 custom_padding_t">
								<h5 class="text-light">Flickr Album</h5>
								<div class="row footer_text">
									<div class="col-4">
										<a href="assets/img/albump1.png" data-lightbox="roadtrip">
											<img src="assets/img/albump1.png" alt="">
										</a>
										
									</div>
									<div class="col-4">
										<a href="assets/img/albump2.png" data-lightbox="roadtrip">
											<img src="assets/img/albump2.png" alt="">
										</a>
									</div>
									<div class="col-4">
										<a href="assets/img/albump3.png" data-lightbox="roadtrip">
											<img src="assets/img/albump3.png" alt="">
										</a>
									</div>
									<div class="col-4">
										<a href="assets/img/albump1.png" data-lightbox="roadtrip">
											<img src="assets/img/albump1.png" alt="">
										</a>
										
									</div>
									<div class="col-4">
										<a href="assets/img/albump2.png" data-lightbox="roadtrip">
											<img src="assets/img/albump2.png" alt="">
										</a>
									</div>
									<div class="col-4">
										<a href="assets/img/albump3.png" data-lightbox="roadtrip">
											<img src="assets/img/albump3.png" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="footer_bottom">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-light pt-3 pb-3 copy">
									&copy; Copyright <span id="date"></span>. All Ri.ght Reserved
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center text-white pt-3 pb-3">
									Design by <a href="http://sahab.wiztecbd.com">Sahab Uddin</a>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pt-3 pb-3">
									<ul class="list d-flex justify-content-center custom_list">
										<li class="c_p"><a href="#" class="custom_text_color">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a></li>
										<li><a href="#" class="custom_text_color">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a></li>
										<li><a href="#" class="custom_text_color">
											<i class="fa fa-google-plus" aria-hidden="true"></i>
										</a></li>
										<li><a href="#" class="custom_text_color">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
										</a></li>
										<li><a href="#" class="custom_text_color">
											<i class="fa fa-linkedin" aria-hidden="true"></i>
										</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<!-- ============== Footer Section End    =============-->
				<!-- ============== Scroll buttom Start   ============= -->

<button class="btn  scroll-top" data-scroll="up" type="button">
<i class="fa fa-chevron-up"></i>
</button>
				<!-- ============== Scroll  buttom End  ============= -->
				<!-- jQuery JS -->
				<script src="assets/js/jquery.min.js"></script>
				<!-- Bootstrap JS -->
				<script src="assets/js/bootstrap.min.js"></script>
				<!-- Lightbox JS -->
				<script src="assets/js/lightbox.min.js"></script>
				<!-- Owl Carousel JS-->
				<script src="assets/js/owl.carousel.min.js"></script>
				<!-- WOW JS -->
				<!-- <script src="assets/js/wow.min.js"></script> -->
				<!-- Custom JS -->
				<script src="assets/js/main.js"></script>
				<!--  -->
				<script>
					var d = new Date();
  					var n = d.getFullYear();
  					document.getElementById("date").innerHTML = n;
				</script>
			</body>
		</html>