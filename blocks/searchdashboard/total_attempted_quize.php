<?php require('../../config.php');

  global $DB, $OUTPUT, $PAGE, $USER, $CFG;?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">  
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>  
<style type="text/css">
/** {
    margin: 0;
    padding: 0;
    font-family: 'Lato', sans-serif;
}
*/
.progress {
    position: absolute;
    height: 184px;
    width: 243px;
    cursor: pointer;
    top: 50%;
    left: 50%;
    margin: -73px 0 0 -82px;
    background-color: transparent;
}
.abc{
	    height: 300px;
    position: relative;
}

.progress-circle {
  transform: rotate(-90deg);
	margin-top: -40px;
}

.progress-circle-back {
	fill: none; 
	stroke: #D2D2D2;
	stroke-width:10px;
}

.progress-circle-prog {
	fill: none; 
	stroke: #7E3451;
	stroke-width: 10px;  
	stroke-dasharray: 0 999;    
	stroke-dashoffset: 0px;
    transition: stroke-dasharray 0.7s linear 0s;
}

.progress-text {
	 width: 100%;
    position: absolute;
    top: 77px;
    text-align: center;
    font-size: 2em;
    left: -33px;
}
.clear{
	clear: both;
}

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
.text_course{
	text-align: center;
    padding-top: 20px;
    color: #ff4f01;
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

</style>
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
                      <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> Mail sent successfull.
                      </div>
                    <?php } else { ?>
                      <div class="alert alert-danger" role="alert"> 
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

<!-- address -->
<section class="bg_color">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="text_3"><i class="fas fa-map-marker-alt fa_icon2"></i>5 th floor, IT Hub, Khammam - 507002</p>
      </div>
      <div class="col-md-3">
        <p class="text_4"><i class="fal fa-envelope fa_icon2"></i>support@preparetest.com</p>
      </div>
      <div class="col-md-3">
        <p class="text_4"><i class="fal fa-phone-alt fa_icon2"></i>+91-97012-94401</p>
      </div>
    </div>
  </div>
</section>
<!-- address -->
<?php
	
   $couseData = $DB->get_records_sql("SELECT c.instanceid,cs.fullname FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id INNER JOIN {course} as cs on c.instanceid = cs.id WHERE (rs.roleid='5' or rs.roleid='3') and c.contextlevel='50' and rs.userid='".$USER->id."'");

   $totalCourseQuiz = 0;
   $totalAtteCourseQuiz = 0;

      foreach ($couseData as $key => $course_id) {
      	// echo $course_id->instanceid;
      	$total_quz = count($DB->get_records_sql("SELECT * FROM `mo_quiz` where course='$course_id->instanceid'")); 

      	$totalCourseQuiz = $totalCourseQuiz + $total_quz;
      
      	$total_attempt_quize = count($DB->get_records_sql("SELECT * FROM `mo_quiz_attempts` as qa INNER JOIN  mo_quiz as q on qa.quiz = q.id where qa.userid='$USER->id' and q.course='$course_id->instanceid'")); 
      	  // echo $total_attempt_quize."total_attempt_quize ";
      	$totalAtteCourseQuiz = $totalAtteCourseQuiz + $total_attempt_quize;
	   ?>
	   <?php }
   	
   		if(($totalAtteCourseQuiz)!=''  && ($totalCourseQuiz)!=''){
	         $total_percentage = ($totalAtteCourseQuiz/$totalCourseQuiz*100);

	       
	    //      if(($total_percentage % 1) >= 0.5){

					// 	echo $total_percentage_val = (floor($total_percentage)+1);
					// } else {
					// 	echo $total_percentage_val = floor($total_percentage);
					// }
     //       // echo floor($total_percentage);

	         ?>
	         <div class="abc">
	         	<h3 class="text_course"> Toata attempt course quiz graph </h3>
		         <div class="progress">
					   <svg class="progress-circle" width="200px" height="200px" xmlns="http://www.w3.org/2000/svg">
						   <circle class="progress-circle-back" cx="80" cy="80" r="74"></circle>
					      <circle class="progress-circle-prog" cx="80" cy="80" r="74"></circle>
					   </svg>
						 <div class="progress-text" data-progress="0"><?php echo number_format(round($total_percentage, 2)) ?>%</div>
						  <input type="hidden" name="" id="total_quz" value="<?php echo $totalCourseQuiz ?>">
						  <input type="hidden" name="" id="total_attempt_quize" value="<?php echo $totalAtteCourseQuiz?>">
						  <input type="hidden" name="" id="total_percentage" value="<?php echo number_format(round($total_percentage,2)) ?>">
					</div> 
				<div class="clear"></div>
			</div>
	    <?php  }

   	// echo $totalCourseQuiz."totalCourseQuiz ";
   	// echo  $totalAtteCourseQuiz."totalAtteCourseQuiz ";     	
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var col = 30;
		var total_quz = $("#total_quz").val();
		var total_attempt_quize = $("#total_attempt_quize").val();
		var total_percentage = $("#total_percentage").val();
		// alert(total_percentage);

		if(total_percentage <= 50){
			$(".progress-circle-prog").css('stroke','red');
		} else if (total_percentage>=50 && total_percentage<=70) {
			$(".progress-circle-prog").css('stroke','yellow');
		} else if (total_percentage>=70 && total_percentage<=100) {
			$(".progress-circle-prog").css('stroke','blue');
		}

		function progressBar(progressVal,totalPercentageVal) {
	   var strokeVal = (4.64 * 100) /  totalPercentageVal;
		var x = document.querySelector('.progress-circle-prog');
	   x.style.strokeDasharray = progressVal * (strokeVal) + ' 999';
		var el = document.querySelector('.progress-text'); 
		var from = $('.progress-text').data('progress');
		$('.progress-text').data('progress', progressVal);
		var start = new Date().getTime();
	  
			setTimeout(function() {
			    var now = (new Date().getTime()) - start;
			    var progress = now / 700;
			    // el.innerHTML = round(progressVal / totalPercentageVal * 100);
			    if (progress < 1) setTimeout(arguments.callee, 10);
			}, 10);

	   }
    progressBar(total_attempt_quize,total_quz);
   });

</script>
	<section>
  		<?php include('footer.php'); ?>
   </section>  