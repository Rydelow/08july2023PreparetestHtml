<?php
// require_once(__DIR__ .'/../config.php');


// $PAGE->set_title($SITE->fullname);
// $PAGE->set_heading($SITE->fullname);

// echo $OUTPUT->header();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<title>Contact Us</title>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
   <div class="row">
      <div class="col-md-12">
   <i class="fas fa-rocket fa_icon4">
    <a class="navbar-brand">Gradeup</a></i>
    <form class="d-flex">
          <i class="far fa-search fa_icon"></i>
      <ul class="navbar-nav  me-auto ">
      <li class="nav-item dropdown sele_cat ">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Select Exam Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Bank & Insurance</a></li>
            <li><a class="dropdown-item" href="#">SSC and Railway</a></li>
            <li>
            <a class="dropdown-item" href="#">ESE/GATE/PSUs</a>
         </li>
           <li>
            <a class="dropdown-item" href="#">UPSC Exams</a>
         </li>
           <li>
            <a class="dropdown-item" href="#">CAT & MBA</a>
         </li>
           <li>
            <a class="dropdown-item" href="#">CTET AND TEACHING</a>
         </li>
      </ul>
   </li>
</ul>

    
      <button class="btn1" type="submit">Register</button>
 </form>
</div>
</div>
</div>
</nav>


<div class=""> 
   <hr class="hr1">
   </div>

   <section class="bg_img" style="background-image:url('assets/img/clients/Hero_Banner_bg.png');">
   <div class="container">
      <div class="row">
         <div class="bread_crum">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
  </ol>
</nav>
</div>
</div>

   <div class="row">
      <div class="col-md-12">
      <div class="cont_us">
         <p class="cont_us1">Contact Us</p>
      </div>
   </div>
   <div class="col-md-12">
<div class="img_1">
   <img src="assets/img/blog/contact_2.jpg" class="img_2">
</div>
</div>
<div class="col-md-12">
<p class="text_1"> Learning Pvt. Ltd.</p>
</div>
<div class="col-md-12">
<p class="text_2">We would love you hear from you. Let us know if you are facing any problems, have any questions or want to share feedback. We are always happy to help!</p>
</div>
</div>
</div>
</section>

  <section class="bg_color">
    <div class="container">
      <div class="row">
         <div class="col-md-6">
            <p class="text_3"><i class="fas fa-map-marker-alt fa_icon2"></i>Windsor IT Park, Tower - A, 2nd Floor, Sector 125, Noida, Uttar Pradesh 201303</p>
          </div>
         <div class="col-md-3">
            <p class="text_4"><i class="fal fa-envelope fa_icon2"></i>support@gradeup.co</p>
         </div>
         <div class="col-md-3">
            <p class="text_4"><i class="fal fa-phone-alt fa_icon2"></i>+91 9650052904</p>
         </div>
      </div>
    </div>
  </section>

    <section>
      <div class="container">
        <div class="form1">
          <div class="row">
              <div class="col-md-6">
                <form action="contact.php" method="POST">
                  <div class="mb-3">
                    <input type="text" class="form-control" name="name" value="Name" placeholder="Enter Name">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" value="admin@gmail.com" placeholder="Enter Email">
                  </div>
                  <div class="mb-3">
                    <textarea type="text" class="form-control mess_age" name="message" value="Message" placeholder="Enter Message" required>Message</textarea>
                  </div>
                  <button type="submit" class="btn btn-success send_mes" name="submit">SEND</button>  
                </form>
              </div>
              <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.944213202897!2d77.39484671434953!3d28.541396482453813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce9b17ca40335%3A0x9585762ff9a51571!2sLDS%20Engineers%20Private%20Limited!5e0!3m2!1sen!2sin!4v1629796796965!5m2!1sen!2sin"width="100%" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
  </body>
</html>

