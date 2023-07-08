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
.main_hader {
    box-shadow: 0 0 2px 2px #00000042;
}

.man_box{
    text-align: left;
    border: 1px solid rgba(0,0,0,.1);
/*    width: 30%;*/
    display: inline-block;
    vertical-align: top;
    margin: 0 1% 30px;
    padding: 40px;
    transition: all ease .3s;
}



.man_box a {
    color: #a7a7a7;
    transition: all ease .3s;
}
icon-jobs-sprite {
    background: url(../images/icon-jobs-sprite.png) no-repeat;
    background-size: 100%;
    width: 70px;
    height: 70px;
    display: inline-block;
    vertical-align: top;
    margin: 0 0 10px;
}
.man_box a p {
    font-size: 14px;
    text-transform: uppercase;
    display: inline-block;
    vertical-align: top;
    margin: 5px 0px;
    padding: 0px;
    width: 100%;
    font-weight: normal;
}

 .deati_l {
    font-size: 12px;
    letter-spacing: 2px;
    text-transform: uppercase;
    display: inline-block;
    vertical-align: top;
    margin: 0px;
    padding: 0px;
    width: 100%;
    color: #;
    font-weight: normal;
}

.man_box:hover {
    border: 1px solid rgba(0,0,0,.5);
    transition: all ease .3s;
}
.man_box:hover a {
    color: #222;
    transition: all ease .3s;
}

.man_box a span {
    font-size: 60px;
    margin-bottom: 8%;
}

.sendResumeWrap {
    background: #ff770e;
    border: none;
    /* min-height: 202px; */
    padding: 40px;
}

.sendResumeWrap a {
    color: #fff;
}
.sendResumeWrap a button {
    background: none;
    border: 1px solid #fff;
    font-weight: normal;
    text-transform: uppercase;
    border-radius: 5px;
    padding: 10px 40px 12px;
    margin: 37px 0 0;
    font-size: 15px;
    color: #fff;
}
.borde_r hr{
      display: inline-block;
    height: 5px;
    background-color: #f7770e;
    width: 100px;
    margin: auto;
    border-radius: 25px;
    opacity: 1;

}
h3.textheading {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 4%;
    color: #f74f02;
}
.keep{
     color: #f74f02; 
}
</style>
<!-- script-exam -->


<!-- top-nav -->
<!-- contact-us -->
<!-- banner-img -->
<section>
  <?php include('header.php'); ?>
</section>

<section class=" career">
<img src="http://preparetest.com/blocks/customhomepage/assets/career.jpg">
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <p class="text_05 text-center keep">What keeps us motivated?</p>
            </div>
            <div class="col-md-12">
                <p class="text_01">The undying support and love of our readers! Work in an insouciant atmosphere, put your innovative brain to test everyday, learn and grow tremendously with a friendly team who is eager to mentor you everytime. Think you have the zest to think out of the box? If yes, then join the team now!</p>
             
            </div>

        </div>
        <div class="row">
             <div class="col-md-12">
            <div class="hed_ing01">
            <p class="text_02 keep">The way we grow? </p>
            <p class="text_01">All unbridled ideas are welcome and are put to action, no matter how implausible it might sound. Pursue your passion in the field of your choice and grow tremendously. Learn at your pace!</p>

            <p class="text_02 keep">What we Offer? </p>
            <p class="text_01">At Adda247, we offer a lucrative career opportunity to learn and grow amongst the best. Being the largest Ed-Tech company of India, we are trying to change the age old education system of India. We expect the same from you. By being a part of Adda247, you can dream up new and quirky innovations and bring them to reality!</p>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="textheading text-center">Explore a career with us!</h3>
            </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="man_box">
                <a href="#">
                     <span class="fa fa-bar-chart"></span>
                      <p>Sales</p>
                      <div class="deati_l">No Openings</div>
                 </a>
            </div>
        </div>
       
         <div class="col-md-4">
            <div class="man_box">
                <a href="#">
                     <span class="fa fa-tachometer"></span>
                      <p>Technology</p>
                      <div class="deati_l">No Openings</div>
                 </a>
            </div>
        </div>
         <div class="col-md-4">
            <div class="man_box">
                <a href="#">
                     <span class="fa fa-desktop"></span>
                      <p>Marketing and Content</p>
                      <div class="deati_l">No Openings</div>
                 </a>
            </div>
        </div>
         <div class="col-md-4">
            <div class="man_box">
                <a href="#">
                     <span class="fa fa-user-o"></span>
                      <p>Be a faculty</p>
                      <div class="deati_l">No Openings</div>
                 </a>
            </div>
        </div>
          <div class="col-md-4">
            <div class="man_box">
                <a href="#">
                     <span class="fa fa-headphones"></span>
                      <p>Support</p>
                      <div class="deati_l">No Openings</div>
                 </a>
            </div>
        </div>
         <div class="col-md-4">
            <div class=" sendResumeWrap">
               <a href="" target="_blank"> 
                                    <div>Didn't Find Your Profile, Send your resume here!</div>
                                    <button class="btn_sub">Submit</button>
                                </a>
            </div>
        </div>

        <div class="col-md-12">
    <div class="borde_r mt-4 text-center">
        <hr>
    </div>
</div>
    </div>

</div>
</section>


<section>
    
<!--
<div id="#modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title f_text3">Job Application Form</h2>
         
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            <p class="f_text1">Pls fill in your details</p>
        <p class="f_text2"><span class="required1">*</span>Required</p>
      </div>
      <div class="container">
<form action="" >
    <div class="query_form1">
        <div class="query_form2">
            <label class="la_bel"for="name">Full name<span class="required">*</span></label>
    </div>
    <input type="text" class="query_form" name="name" value="Your answer">
  </div>


 <div class="query_form1">
        <div class="query_form2">
    <label for="contact" class="la_bel">Contact Number<span class="required">*</span></label>
    </div>
    <input type="text" class="query_form" name="contact" value="Your answer">
  </div>


 <div class="query_form1">
        <div class="query_form2">
    <label for="email" class="la_bel">Email ID<span class="required">*</span></label>
    </div>
    <input type="email" class="query_form" name="email" value="Your answer" required>
  </div>


 <div class="query_form1">
        <div class="query_form2">
    <label for="name" class="la_bel">Date of Birth<span class="required">*</span></label>
    </div>
    <input type="date" class="query_form" name="name" value="Your answer">
  </div>

   <div class="query_form1">
        <div class="query_form2">
    <label for="name" class="la_bel">Role (for which you want to apply) <span class="required">*</span></label>
    </div>

<select name="role_pro" id="role_pro">
  <option class="opt_select" value="Choose">Choose</option>
  <option class="opt_select" value="team">Software Developer (Technology Team)</option>
  <option class="opt_select" value="content">Content Writer (bankersadda, sscadda, books, test papers)</option>
  <option class="opt_select" value="counsel">Counsellor / Sr Counsellor</option>
  <option class="opt_select" value="manager">Managers / Assistant Manager</option>
  <option class="opt_select" value="faculty">Faculty Positions</option>
  <option class="opt_select" value="senior">Senior Management Roles</option>
    <option class="opt_select" value="sales">Sales / Marketing / Business Development</option>
      <option class="opt_select" value="deve">Sales / Marketing / Business Development</option>
        <option class="opt_select" value="anyrole">Any other role</option>
</select>
  </div>


   <div class="query_form1">
        <div class="query_form2">
    <label for="exp" class="la_bel">Total Experience (in years) <span class="required">*</span></label>
    </div>
    <input type="text" class="query_form" name="exp" value="Your answer">
  </div>



  <div class="query_form1">
        <div class="query_form2">
    <label for="location" class="la_bel">Preferred Location ? (Pls note all HO roles are based out of Delhi/Gurgaon) <span class="required">*</span></label>
    </div>
    <input type="text" class="query_form" name="location" value="Your answer">
  </div>
  <div class="query_form1">
        <div class="query_form2">
    <label for="lastexp" class="la_bel">Mention the names of last two companies, you have worked with?</label>
    </div>
    <input type="text" class="query_form" name="lastexp" value="Your answer">
  </div>
  <div class="query_form1">
        <div class="query_form2">
    <label for="profile" class="la_bel">Describe your profile in last company, mentioning your expertise?</label>
    </div>
    <input type="text" class="query_form" name="profile" value="Your answer">
  </div>
<div class="query_form1">
        <div class="query_form2">
    <label for="looking" class="la_bel">What kind of role you are looking in our company and why we should hire you?</label>
    </div>
    <input type="text" class="query_form" name="looking" value="Your answer">
  </div>

        <button type="submit" name="submit" class="btn_submit">Submit</button>
  </div>
</form>
</div>
</div>
</div>
</div>
-->

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
   </script>
   <script>
   $(document).ready(function() {
   $('.btn_sub').click(function(){
   $('.modal').show();
   });
});
    $('.close').click(function(){
   $('.modal').hide();
   });
</script>
<style type="text/css">
    .modal-header {
  
    display: inline-block!important;  
}
.fa_ficon {
    color: red;
    margin-right: 10px;
    font-size: 10px;
}
.f_text2 {
    font-size: 12px;
    color: red;
}
.f_text1 {
    margin-top: 10px;
    margin-bottom: 0px;
    font-weight: 550;
}
.fa_ficon1 {
    color: red;
    font-size: 10px;
    margin-left: 5px;
}
.query_form {
    outline: 0;
    border-width: 0 0 2px;
    border-color: black;
    margin-bottom: 15px;
}
.query_form1 {

    border: 1px solid gray;
    margin-top: 5%;
    padding: 3%;
    border-radius: 10px;
}
.query_form:focus {
  border-color: #673ab7;
}
.modal{
    overflow: auto;
}
.f_text3 {
    color: #673ab7;
}
.la_bel{
     color: #673ab7;  
}
.btn_submit {
    margin-top: 30px;
    margin-bottom: 20px;
    color: white;
    background: #673ab7!important;
    border: 0px!important;
    padding: 5px 20px 5px 20px;
    font-weight: 700;
}
select#role_pro {
    padding: 10px;
}
    .query_form2 {
    margin-bottom: 20px;
    margin-top: 10px;
}
.lab_el{
  vertical-align: top;
}

.required {
    color: red;
    margin-left: 5px;
}
.required1 {
    color: red;
    margin-right: 3px;
}
.modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
   border: none; 
    border-radius: .3rem;
    outline: 0;
    margin-left: -10%;
}
</style>
<!-- eaxm-point -->