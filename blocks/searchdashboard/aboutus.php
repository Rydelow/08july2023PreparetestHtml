<?php require_once("../../config.php");
   global $DB, $OUTPUT, $PAGE, $USER,$CFG;
   $id = optional_param('id', '0', PARAM_INT);
if("/blocks/searchdashboard/aboutus.php"==$_SERVER['REQUEST_URI']){
  redirect($CFG->wwwroot."/about-us/");
} 
$alldata = $DB->get_record_sql("select st.id,st.title,ss.id as ssid,sc.id as fid, ss.title as sstitle,sc.title as ctitle from {searchda_third} as st INNER JOIN {searchda_secondc} as ss on st.subid=ss.id inner join {searchda_categories} as sc on ss.categoriesid=sc.id WHERE st.id=$id ");
$dataquery = $DB->get_record('other_seo_url',array('url'=>$_SERVER['REQUEST_URI']));
   ?><!DOCTYPE html>
<html  dir="ltr" lang="en" xml:lang="en"><head><title><?php echo $dataquery->title; ?></title>
<meta charset="UTF-8">
<meta name="description" content="<?php echo $dataquery->description; ?>">
<meta name="keywords" content="<?php echo $dataquery->keywords; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="//preparetest.com/pluginfile.php/1/theme_lambda/favicon/1670156443/favicon.png" />
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


@media only screen and (max-width: 600px) {


}



/* Aditya---*/

</style>
<!-- script-exam -->


<!-- top-nav -->
<!-- contact-us -->
<!-- banner-img -->
<section>
  <?php include('header.php'); ?>
</section>

<section class=" abou_t_us">

<div class="container">
<div class="row">

<div class="col-md-12">
<p class="text_05">About Us</p>
</div>
<div class="col-md-12">
<p class="text_01">Prepare Test (Arohak Technologies Pvt. Ltd.) is India's largest exam preparation destination, loved by millions of aspirants across the country. Through our website and app, we help more than 1.1 crore registered students to prepare actively for various exams & score better.</p>
<p class="text_01">At our heart lies the belief that people prepare better when they prepare together; by questioning, helping & challenging each other. Hence at the very core of our being lies a community of students & expert mentors. We have established & nurtured highly engaging exam-specific communities of students and mentors for SSC, Banking, Railways, Teaching, JEE, GATE, NEET, UPSC, Defence and State level exams. The Prepare Test community lets users collectively solve each other’s doubts, and interactively learn and compete with each other through quizzes and mock tests. It gives them access to prep material & previous years papers to score better in their exams.</p>
<p class="text_01">We also appreciate the value of structured preparation, not just the quantity of it but also the approach. It is only by preparing actively everyday & making small but significant head ways can one ensure continuous improvement.</p>
</div>
<div class="col-md-12">
<div class="hed_ing01">
<p class="text_02">Vision : </p>
<p class="text_01">We aspire to be India’s largest and most comprehensive online preparation destination for competitive exams.</p>

<p class="text_02">Mission : </p>
<p class="text_01">We believe that these exams can make a huge impact in a student's life. We help them prepare actively for these exams & score better.</p>

<p class="text_02">Core Belief :</p>
<p class="text_01">We believe that collaboration is the future of learning and have thus brought together students & community experts from across the country.</p>
</div>
</div>
<div class="col-md-12">
<p class="text_03">Prepare Test provides the World's Largest Online Formative and Summative Assessment System technology based blended learning solutions for all competitive exams and goal is to make its learning initiative to all seekers at reasonable cost. Prepare Test Provide e-learning and scientific formative assessment system for students, institutions and corporate like Free Online Mock Test, Mock Test Series, Speed Test Online Preparation to help to prepare for Engineering, Medical, MBA, BANK PO, CLERK, SO, SSC, UPSC, INSURANCE, MCA, NIFT, LAW, RBI, PCS at Prepare Test</p>
<p class="text_03">Prepare Test has developed leading e-assessment & e-teaching product to engaging the latest technological helps to build scientific formative assessment system to students. All those students who are preparing for Engineering, Medical, MBA, BANK PO, CLERK, SO, SSC, UPSC, INSURANCE, MCA, NIFT, LAW, RBI, PCS and other competitive exams benefit from the creating learning environments that promotes active learning, critical thinking, collaborative learning, and knowledge creation and disseminate knowledge to learners and teachers using 21st Century technologies online preparation for competitive exams in the most scientific way.</p>

<p class="text_03">Online Exam Preparation & Mock Test Series is most important preparing e-learning tool to the students which help them to improve their knowledge everyday. So practice speed test online mock tests for government and Non government exams prepared by Prepare Test SME (Subject Matter Experts) will help the students to get real experience before the competition exam as “Experience generates confidence and will put many doubts and fears to rest Before Actual Exam”.</p>

<p class="text_03">Prepare Test  Subject Matter Experts (SME) have prepared test series and provide free mock test for Engineering, Medical, MBA, BANK PO, CLERK, SO, SSC, UPSC, INSURANCE, MCA, NIFT, LAW, RBI, PCS and all other exams in detailed analysis, in-depth analysis and in a simple way such that students can ace all Entrance and Recruitment competitive exams at one place. For each exam online test being prepared by our expert faculty by following latest syllabus, exam pattern, and previous year question paper and along with maintaining the difficulty level of each questions as it will came in the actual last year exam papers.
</p>

<p class="text_03">Prepare Test offers dynamic classes, blended learning with online coaching and live online classes, online study materials, mock tests, Free Online Mock Test, Mock Test Series, Speed Test and Online Preparation through daily General Awareness and Current Affairs, Quizzes etc. which help the students of various competitive exams prepare for various Entrance and Recruitment exams. All the online study material is prepared and designed by a team of subject wise educational experts in different field by using latest technology methods and depth analytics.</p>
<p class="text_03">Prepare Test provide facility in being connected to its students through various Social Media like Facebook, Twitter, Youtube, Instagram, Linkedin groups and also a sections Testimonial & Live chat on the website where students directly ask the questions from expert ,Prepare Test Blog forum and Tips for Preparation & Short-cut Method Trick to provide help, guidance, doubt clarification and preparation strategy to the all competitive exam students.</p>



<p class="text_03">Prepare Test Scientific approach to be an admired company in e-Assessments, e-Teaching, Blended Learning to all Entrance and Recruitment exam preparation ensures your success in the most successful manner</p>
</div>
</div>
</div>
</section>




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
   
   
</script>

<!-- eaxm-point -->