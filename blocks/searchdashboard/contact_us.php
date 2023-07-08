<?php require_once("../../config.php");
   global $DB, $OUTPUT, $PAGE, $USER,$CFG;
   $id = optional_param('id', '0', PARAM_INT);   
$alldata = $DB->get_record_sql("select st.id,st.title,ss.id as ssid,sc.id as fid, ss.title as sstitle,sc.title as ctitle from {searchda_third} as st INNER JOIN {searchda_secondc} as ss on st.subid=ss.id inner join {searchda_categories} as sc on ss.categoriesid=sc.id WHERE st.id=$id ");
$dataquery = $DB->get_record('other_seo_url',array('url'=>$_SERVER['REQUEST_URI']));
   ?>
<!DOCTYPE html>
<html  dir="ltr" lang="en" xml:lang="en"><head><title><?php echo $dataquery->title; ?></title>
<meta charset="UTF-8">
<meta name="description" content="<?php echo $dataquery->description; ?>">
<meta name="keywords" content="<?php echo $dataquery->keywords; ?>">
<link rel="shortcut icon" href="//preparetest.com/pluginfile.php/1/theme_lambda/favicon/1670156443/favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">  
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>  
<style type="text/css">

/*---form---- */
.fa_icon {
    padding: 15px;
    margin-right: 10px;
    font-size: 20px;
}
.btn1 {
    color: white!important;
    border-color: #198754;
    background: #198754!important;
    display: inline-block;
    font-weight: 500;
    margin: 5px!important;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    padding: .375rem .75rem;
    font-size: 14px;
    border-radius: 5px;
    /* transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out; */
    margin-right: 100px!important;
}
.navbar-nav .nav-link {
    padding-right: 10px;
    padding-left: 10px;
}
.bg-light {
    background-color: white!important;
}
hr.hr1 {
    height: 3px;
    color: darkolivegreen;
}
hr {
    margin:0!important; 
    color: inherit;
    background-color: currentColor;
    border: 0;
    opacity: .25;
}
.bread_crum {
    margin-top: 10px;
}   
.breadcrumb-item+.breadcrumb-item::before {
    float: left;
    padding-right: .5rem;
    color: white;
    content: var(--bs-breadcrumb-divider, ">");
}
.breadcrumb-item a {
   color:  #ff4f01;
    text-decoration: none;
}
   
li.nav-item.dropdown.sele_cat {
    margin-right: 25px;
    margin-top: 5px;
}
li.breadcrumb-item.active {
    color: white;
}
.dropdown-menu {
    position: absolute!important;
    top: 100%;
    z-index: 1000;
    display: none;
    min-width: 10rem;
    padding: .5rem 0;
    margin: 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
}
.cont_us1 {
    text-align: center;
    font-weight: 900;
    font-size: 35px;
    margin-bottom: 20px;
       color:  #ff4f01;

}
.img_1 {
    text-align: center;

}
img.img_2 {
    width: 50%;
    height: 350px;
}
.bg_color {
    background: #f74f02;
        padding: 4px 0;
}
.text_1 {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    font-weight: 500;
    color:  #ff4f01;
}
.text_2 {
       text-align: center;
    font-size: 22px;
    color: white;
    margin-bottom: 22px;
}
p.text_3 {
    color: white;
  margin-top: 2px;
  margin-bottom: 0;
      font-size: 16px;
}
p.text_4 {
    color: white;
  margin-top: 2px;
  margin-bottom: 0;
      font-size: 16px;
}
p.text_5 {
    color: white;
    margin-top: 10px;
    margin-bottom: 0;
        font-size: 16px;
}
.fa_icon2 {
    margin-right: 10px;
}
.form1 {
    margin: 40px;
}

.btn-success {
    color: #fff;
    background-color: #198754;
    border-color: #198754;
    width: 100%;
}
.form-control {
    line-height: 2.5;
    border: none;
    background: #f2f2f2;
    color: #383535;
    height: 46px;
    margin-bottom: 21px;
}
.send_mes {
    font-size: 1.25rem;
}
.breadcrumb{
  background-color: transparent;
}
section.c_banner {
    box-shadow: 0 2px 4px 0px #646464;
}


@media only screen and (max-width: 600px) {
.fa_icon4 {
    margin: 15px;
}
.btn1 {
     margin-right: 0px!important;
}
.fa_icon {
    padding: 15px;
    margin-right: 0px!important;
}
.navbar-nav .nav-link {
    padding-right: 0px!important;
    padding-left: 0px!important;
}
.cont_us1 {
    font-size: 30px;
}
img.img_2 {
    width: 100%;
}
.text_1 {
    font-size: 25px;
}
.text_2 {
    font-size: 16px;
    justify-content: space-around;
}
.g_map {
    margin-top: 10%;
}
.g_map iframe {
    width: 100%;
}
.form1 {
  margin: 0;
    padding-top: 46px;
}
.img_1 img{width: 80%!important;}


}

</style>
<!-- script-exam -->
</head>



<!-- top-nav -->
<!-- contact-us -->
<!-- banner-img -->
<section>
  <?php include('header.php'); ?>
</section>


<section class="bg_img" style="background-image:url('https://preparetest.com/blocks/customhomepage/assets/Hero_Banner_bg.png');">
<section class="c_banner">
     
          <img src="https://preparetest.com/blocks/customhomepage/assets/contact_banner.png" class="contact" style="width: 100%;">
       
</section>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="cont_us">
         
            <div class="row">
              <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <?php if(isset($_GET['msg'])){
                    if ($_GET['msg']==1) { ?>
                      <div class="alert alert-success" role="alert" id="successAlert">
                        <strong>Success!</strong> Mail sent successfull.
                      </div>
                    <?php } else { ?>
                      <div class="alert alert-danger" role="alert" id="dangerAlert"> 
                        <strong>Mail not send.!</strong> 
                      </div>
                </div>
               <?php  } } ?>
              <div class="col-sm-4"></div>
            </div>
          </div>
        </div>
      <div class="col-md-12">
       
      </div>
      <div class="col-md-12">
        <p class="text_1"> Preparetest</p>
      </div>
      <div class="col-md-12">
        <p class="text_2">We would love you hear from you. Let us know if you are facing any problems, have any questions or want to share feedback. We are always happy to help!</p>
      </div>
    </div>
  </div>
</section>
<!-- banner-img -->
<!-- address -->
<section class="bg_color">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="text_3"><i class="fas fa-map-marker-alt fa_icon2"></i>4th floor, Kandi Towers, Opposite Raheja Mindspace, Phase II, Hitech City Hyderabad, TS-500081</p>
      </div>
      <div class="col-md-3">
        <a href="mailto:support@preparetest.com"><p class="text_4"><i class="fal fa-envelope fa_icon2"></i>support@preparetest.com</p></a>
      </div>
      <div class="col-md-3">
        <a href="tel:+91-97012-94401"><p class="text_4"><i class="fal fa-phone-alt fa_icon2"></i>+91-97012-94401</p></a>
        <p class="text_4"></p>
      </div>
    </div>
  </div>
</section>
<!-- address -->
<!-- form -->
<section>
  <div class="container">
    <div class="form1">
      <div class="row">
          <div class="col-md-6">
            <form action="<?php echo $CFG->wwwroot; ?>/blocks/searchdashboard/contact_mail.php" method="POST">
              <div class="mb-3">
                <input type="text" class="form-control" name="name"  placeholder="Enter Name" pattern="[A-Za-z].{1,}" required="">
              </div>
              <div class="mb-3">
                <input type="number" class="form-control" name="mobile"  placeholder="Enter Mobile Number" required="">
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" name="email"  placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
              </div>
              <div class="mb-3">
                <textarea type="text" class="form-control mess_age" name="message" placeholder="Message" required></textarea>
              </div>
              <button type="submit" class="btn btn-success send_mes" name="submit">SEND</button>  
            </form>
          </div>
          <div class="col-md-6">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3810.3192298233184!2d80.15796931487445!3d17.251783988160007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a3459ea2f85c907%3A0x725ef940f51960e!2sIT%20HUB%20KHAMMAM!5e0!3m2!1sen!2sin!4v1630051516076!5m2!1sen!2sin" width="600" height="359" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
           
          </div>
      </div>
    </div>
  </div>
</section>
<!-- /form -->

<section>
  <?php include('footer.php'); ?>
</section>






<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
   jQuery(document).ready(function( $ ) {
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });
   });

   $(document).ready(function () {
     $("#successAlert").show().delay(2000).fadeOut();
     $("#dangerAlert").show().delay(2000).fadeOut();
   });
   
   
</script>

<!-- eaxm-point -->