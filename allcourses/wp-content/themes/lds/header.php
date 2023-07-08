<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lds
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://preparetest.com/theme/lambda/layout/style/customhome.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lds' ); ?></a>
 -->
 <?php if(empty($_GET['base'])){ ?>
	<!-- <header class="bg-dark-blue">

	<div class="container ">

		<div class="row">

			<div class="col-md-12">

				<div class="top-social-icon">

					<ul class="nav navbar-right social-list">

						<li><a class="nav-link" href=""><i class="fab fa-facebook-f"></i></a></li>

						<li><a class="nav-link" href=""><i class="fab fa-twitter"></i></a></li>

						<li><a class="nav-link" href=""><i class="fab fa-instagram"></i></a></li>

					</ul>

				</div>

			</div>

		</div>

	</div>

</header>



	<div class="container">
<nav class="navbar navbar-light justify-content-between">


		<a class="navbar-brand" href="http://preparetest.com/"><img src="http://preparetest.com/blocks/customhomepage/assets/logo.svg"> </a>

		<ul class="nav navbar-right loc">

			<li class="nav-item item-flex"><a class="nav-link"><img src="http://preparetest.com/theme/lambda/layout/image/Icon feather-phone-call.svg">  91-97012-94401<br>support@preparetest.com</a>

			</li>

			<li class="item-flex"><a class="nav-link" ><img src="http://preparetest.com/theme/lambda/layout/image/Icon%20feather-map-pin.svg">5 th floor, IT Hub, Khammam - 507002</a></li>

			<li class=" user"><a class="nav-link pr-0" href="https://preparetest.com/login/index.php"><i class="fas fa-user-tie mr-2"></i> <span class="login">Login / Register </span><img src="http://preparetest.com/theme/lambda/layout/image/Search.svg" class="float-right"></a> </li>

		</ul>

	</div>

</nav>

<section class="bg-img">

	<div class="container">
<nav class="navbar navbar-expand-lg navbar-light menu-list">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">

			<li><a class="nav-link" href="">Home</a></li>

				<li><a class="nav-link" href="">About Us</a></li>

				<li><a class="nav-link" href="">Features</a></li>

				<li><a class="nav-link" href="https://preparetest.com/allcourses/">All Courses</a></li>

				<li><a class="nav-link" href="">Forms</a></li>

				<li><a class="nav-link" href="">Pricing</a></li>

				<li><a class="nav-link" href="">Contact us</a></li>

			</ul>

		</div>
</nav>
		<div class="row">
			<div class="col-md-7">

				<div class="banner-text">

					<p class="welcome">WELCOME TO THE MOST ELEGANT ONLINE PREPARE TEST PORTAL</p>
					<br>
					<div class="explore">Explore Our Brilliant</div>
					<div class="exams">Competitive Exams</div>
					<br>
					<p class="banner-bottom">Prepare Test is the best solution for you to analyze your preparation and be exam ready.</p>
					<div class="banner-button">
					<a href="#"><button class="btn btn-deault">START NOW</button></a>
					</div>
				</div>



			</div>			<div class="col-md-5">
				<div class="banner-image">
					<img src="http://preparetest.com/blocks/customhomepage/assets/banner-img.jpeg" class="">
				</div>
			</div>
		</div>
	</div>
</section> -->






<style type="text/css">
	.goog-logo-link {
   display:none !important;
}

.goog-te-gadget {
   color: transparent !important;
}
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
    .sele_ct_box select {
     padding: 5px 0px !important;
  
    }
    body {
    top: 0px !important; 
    }
    .user_icon img {
    width: 49% !important; 
    overflow: hidden;
}
.user_icon {
  
    height: 160px;
    width: 160px;
}
.pull-right, .pull-xs-right {
    float: right;
}
.dangerr p{
	color: red;
}
</style>

<?php


foreach( WC()->cart->get_cart() as $cart_item ){
    $product_id = $cart_item['product_id'];
}
 $product = wc_get_product($product_id);
echo do_shortcode("[datadefault]");

 ?>
<header class="to_p new_topb">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="to_p_header">
					<img src="https://preparetest.com/blocks/customhomepage/assets/logo.svg" alt="logo">  
					<span><?php echo $product->name; ?></span>
				</div>
			</div>
		</div>
	</div>
</header>

<?php }else{

	?>



<style type="text/css">
	.goog-logo-link {
   display:none !important;
}

.goog-te-gadget {
   color: transparent !important;
}
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
    .sele_ct_box select {
     padding: 5px 0px !important;
  
    }
    body {
    top: 0px !important; 
    }
    .user_icon img {
    width: 49% !important; 
    overflow: hidden;
}
.user_icon {
  
    height: 160px;
    width: 160px;
}
.pull-right, .pull-xs-right {
    float: right;
}
.dangerr p{
	color: red;
}
</style>

<?php


foreach( WC()->cart->get_cart() as $cart_item ){
    $product_id = $cart_item['product_id'];
}
 $product = wc_get_product($product_id);
echo do_shortcode("[datadefault]");

 ?>
<header class="to_p new_topb">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="to_p_header">
					<img src="https://preparetest.com/blocks/customhomepage/assets/logo.svg" alt="logo">  
					<span><?php echo $product->name; ?></span>
				</div>
			</div>
		</div>
	</div>
</header>
	<?php
}