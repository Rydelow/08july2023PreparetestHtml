<?php require_once("../../config.php");
   global $DB, $OUTPUT, $PAGE, $USER,$CFG;
   if(empty($USER->id)){
    redirect($CFG->wwwroot.'/login/index.php');

   }


  function theme_get_course_image($courseid) {
    global $DB, $CFG;
    $context = context_course::instance($courseid, MUST_EXIST);
    $file = $DB->get_record_sql("select * from {files} where contextid=? and component=? and filearea = ? and filename != '.'", array($context->id, "course", "overviewfiles"));


    if($file){
      $url=$CFG->wwwroot.'/pluginfile.php/'. $file->contextid. '/'. $file->component. '/'. $file->filearea. $file->filepath. $file->filename;
     // $url = '. /pluginfile.php/'. $file->contextid. '/'. $file->component. '/'. $file->filearea. $file->filepath. $file->filename;

      
    
    
    }

    if(empty($file->filename)){
$url=$CFG->wwwroot.'/theme/lambda/layout/image/elegant-white.jpg';
      }

         return $url;
    // require_once('./lib/coursecatlib.php');
    // // require_once($CFG->libdir. '/coursecatlib.php');
    // $courserecord = $DB->get_record('course', array('id' => $courseid));
    // $coursessss = new course_in_list($courserecord);
    // print_r($coursessss->get_course_overviewfiles());
    // $imageurl= $CFG->wwwroot."/theme/lambda/pix/upcoming/no-image.png";
    // foreach ($course->get_course_overviewfiles() as $file) {
    //  print_r($file);die();
    // $isimage = $file->is_valid_image();
    // $url = file_encode_url("$CFG->wwwroot/pluginfile.php", '/'. $file->get_contextid(). '/'. $file->get_component(). '/'. $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
    // return $url;
    // }
    return $imageurl;
  }


   ?>
<!-- script-exam -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>


<!-- script-exam -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





<style type="">
.loder{
    text-align: center;
        display: block;
}
   .loder img {
    width: 6%;
}

.card.mb-0.car_d_p{
    border: none;
}
a.card-title {
    cursor: pointer;
    text-decoration: none;
    font-weight: bolder;
}
.card-body {
    width: 99%;
    margin: auto;
    /* border: 1px solid #eee!important; */
    /* margin-top: 0px; */
    
    background-color: #ffff;
    border-top: none!important;
    width: 98%;
    margin: auto;
    border: 1px solid #eee!important;
    margin-top: -1px;
    /* z-index: 9999; */
    /* background-color: #ffff; */
    border-top: none!important;
}

.to_p_man, .section.bg-img {
    position: relative;
}
.accordion>.card>.card-header {
    border-radius: 0;
    margin-bottom: 0px;
    border-radius: 5px;
}
</style>
<!--middel-sec-->
<!-- top-nav -->
<div class="to_p_man">
<?php include('header.php'); ?>
  <div class="row">
      <?php   $topbardata = $DB->get_record('customhmp_slider_content',array('id'=>'1'));
      $sug=array(unserialize($topbardata->slider_content));
      foreach ($sug as $val){ $descpt= $val['text'];}
      echo $descpt; ?>

     <!--  <div class="col-md-5">
        <div class="banner-image">
        
        </div>
      </div> -->
    </div>

  </div>
    <img src="http://preparetest.com/blocks/customhomepage/assets/banner-img.png" class="teacher">
  </div>
</section>



<section class="exp_exam">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

<div class="col-md-6 offset-md-3 col-12">
<div class="sear_ch">
    <input type="text" name="" placeholder="Search" id="searchdata" autocomplete="off">
    <div id="filterSearchdata"></div>
    <svg role="presentation" class="i-search" viewBox="0 0 32 32" width="18" height="18" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
  <circle cx="14" cy="14" r="12" />
  <path d="M23 23 L30 30" />
</svg>
</div>
</div>

<br>
            <div class="col-md-12">
                <h2 class="Nhm_heading-1 mt-0 Nhm_heading-2 ng-binding">Popular Exams </h2>
            </div>
            <div class="col-md-12">
               <div class="cours_e">
                 <?php $dataquery = $DB->get_records_sql("select mst.id,mst.subid,mst.iconfiletype,f.filename,mst.classname,mst.title,f.pathnamehash,scs.slug as thirdslug from {searchda_third} as mst left join {searchda_categories_seo} as scs on mst.id=scs.th_id left JOIN {files} as f on mst.icon_file=f.itemid where mst.status='0' and mst.popular_exams='1' and f.filename!='.' ORDER BY mst.sorting ASC");
        foreach ($dataquery as $value) {
$seodata=$DB->get_record_sql("select scs.slug as secondslug,scf.slug as firstslug from {searchda_categories_secondseo} as scs
left join mo_searchda_categories_firstseo as scf on scs.first_id=scf.first_id
 where scs.second_id='".$value->subid."'");
         ?>

                   <div class="Nhm-popularDiv ng-scope" ng-repeat="popularExam in popularExamsData">
                    <a target="_top" href="<?php echo $CFG->wwwroot.'/exam/'.$seodata->firstslug.'/'.$seodata->secondslug.'/'.$value->thirdslug;?>" class="Nw_ExmPopular">
                    <span class="Nw_ExmPoprIcon">

                   

<?php if($value->iconfiletype=='svg'){

                      if(!empty($value->filename)){
                      $backgrounddata=$CFG->wwwroot.'/local/file.php/'.$value->pathnamehash.'/0/'.$value->filename;
 ?>
        <img class="img-responsive lozad"  src="<?= $backgrounddata ?>"  > 
<?php } } ?>
<?php if($value->iconfiletype=='fontawesome'){ ?>

          <i class="fa <?=$value->classname; ?>" aria-hidden="true"></i> 
<?php } ?>




                    </span>
                    <p ng-bind="popularExam.name" class="ng-binding"><?php echo$value->title; ?></p>
                    </a>
                    </div>
                    
        <?php } ?>
                   

               </div>
            </div>
       

<br>


                
                <h2 class="Nhm_heading-1 Nhm_heading-2 ng-binding">Explore your Exam</h2>
      <div class="owl-carousel owl-theme t_next_b">
 
    <?php $dataquery = $DB->get_records_sql("select sc.id,sc.iconfiletype,f.filename,f.itemid,sc.icon_file,sc.classname,sc.title,f.pathnamehash from {searchda_categories} as sc left join {files} as f on sc.icon_file=f.itemid where f.filename!='.' and sc.status='0'");
        $i=1;
        foreach ($dataquery as $value) { ?>
      <a class="item  <?php if($i++==1){echo 'current'; } ?>" data-toggle="tab" data-id="<?= $value->id; ?>" href="#menu<?= $value->id; ?> "> 

<?php if($value->iconfiletype=='svg'){

                      if(!empty($value->filename)){
                      $backgrounddata=$CFG->wwwroot.'/local/file.php/'.$value->pathnamehash.'/0/'.$value->filename;
 ?>
        <img class="crasun_img"  alt="icon" src="<?= $backgrounddata ?>"  > 
<?php } } ?>
<?php if($value->iconfiletype=='fontawesome'){ ?>

          <i class="fa <?=$value->classname; ?>" aria-hidden="true"></i> 
<?php } ?>
    <?= $value->title; ?>  </a>
   
    
   
    <?php } ?>
  
</div>

 

  
<div class="tab_contant_out">
  <div class="tab-content">
  <div id="loader"> 
<span class="loder"><img src="<?php echo $CFG->wwwroot ?>/theme/lambda/layout/image/loading.gif" alt="gif"></span>
</div>

    <div id="menu1" class="container tab-pane active">
   

      
     <div id="exploredata"></div>




    </div>

 </div>
</div>

      </div>
    </div>
  </div>

</section>
 <!-- text-start -->
<section class="popular mb-0 ">
    <div class="container">
      <div class="row">
            <div class="col-md-12">
               <h2 class="Nhm_heading-1 mt-0 Nhm_heading-2 ng-binding">My  Test </h2>
            </div>
          </div>
         
          <div class="row">

<?php $testdata=$DB->get_records_sql("SELECT * from {searchda_complte_payment} where userid='".$USER->id."' ORDER by id DESC limit 0,4");
if(!empty($testdata)){
foreach ($testdata as $tvalue) {
$record=$DB->get_record($tvalue->base,array('id'=>$tvalue->baseid));

 ?>

            <div class="col-md-4">
              <div class="test_form  mb-3 ">
           <div class="test_slider">
                       <div class="quizzes_kit">
                              <div class="quiz_details">
                                 <div class="quiz_name">
                                    <div style="flex: none; float: left;    ">
                                       <h4 id="quiz_heading_name" class="ng-binding"><?php echo $record->title; ?></h4>
                                       <p id="quiz_heading_name" class="tim_e"> <span class="cloc_k"> <i class="fas fa-clock"></i></span> <?= date("d-M-Y",$record->duedate); ?></p>
                                    </div>
                                 </div>
                                 <div class="quiz_time_mark_count">
                                    <p><span class="ng-binding"><?=$record->question; ?></span><span class="ng-binding"><?=$record->qmark; ?></span></p>
                                    <p><span class="ng-binding"><?=$record->mark; ?></span>
                                      <span class="ng-binding"><?=$record->qumark; ?></span></p>
                                    <p><span class="ng-binding"><?=$record->minute; ?></span><span class="ng-binding"><?=$record->qminute; ?> </span></p>
                                   
                                      
                                   <?php 
$quizurl=parse_url($record->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$atemdata=$DB->get_record_sql("SELECT qa.id from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."' and qa.`state`='finished'");

if(empty($atemdata)){
  echo '<p><span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span></p>';
}else{



                                    if(!empty($record->price)){ ?>
                                  
                                                  <?php if($record->quiz_type!=1){ ?> 
                                              <?php if($tvalue->payment_type="free"){ ?>    
                                           <p>
                                             <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                             <span class="ng-binding"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$record->price; ?></b> <span>
                                            </p>
                                          <?php }else{ ?>
                                             <!--- quizatem-->
                                            <p>
                                             <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                             <span class="ng-binding p_ri_ce"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$record->price; ?></b> <span>
                                            </p>
                                         <?php } ?>

                                              <?php }else{ ?>

                                            <p>
                                             <span class="ng-binding p_ri_ce"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                             <span class="ng-binding p_ri_ce"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$record->price; ?></b> <span>
                                            </p>

  
                                    <?php  } }else{

                                      echo '<span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span>';
                                    }  } ?>




                                                                    
                                                                       </div>
                              </div>
                              <div class="start_quiz">
 <?php
                                 if(empty($atemdata)){ ?>
 <p class="view_more_quez"><a class="start_test_btn ng-binding" href="<?=$record->moodleurl; ?>">Continue My Test</a></p>


                                  <?php 
                                 }else{
                                if($tvalue->payment_type="free"){ ?> 
                                 <p class="start_quiz_p"><a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/instruction.php?id=<?= $record->id; ?>&base=<?php echo base64_encode($tvalue->base); ?>">Start Test</a></p>

<?php }else{ ?>
<p class="start_quiz_p"><a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/instruction.php?id=<?= $record->id; ?>&base=<?php echo base64_encode($tvalue->base); ?>">Start Test</a></p>
<?php } } ?>


                              </div>



                           </div>
                   </div>
                   </div>
            </div>
               
 <?php } ?>   


 <?php }else{ ?>
<p style="text-indent: 15px;color: red;font-weight: 600;">No Record Found</p>

                                  <?php } ?>          
    <?php if(count($testdata)>4){ ?>       
<div class=" col-md-12 rea_dmore text-right mt-4">
  <a class="read_more" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/mytest.php">Read More</a>
</div>
<?php } ?>
          </div>

</div>
</section>
<!-- text-end -->






<?php $wel_comedata = $DB->get_record('customhmp_wel_come_to',array('id'=>'1')); 
?>
<section class=" bg-prepare">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div class="row">
          <div class="col-md-5 col-12">
            <div class="prepare_test">
              <img src="http://preparetest.com/blocks/customhomepage/assets/cour_se_img.png" class="img-fluid" style="width: 73.2%">
            </div>  
          </div>
          <div class="col-md-6 col-12">
            <div class="prepare_content">
              <?php $sug=array(unserialize($wel_comedata->wel_come_to));
                   foreach ($sug as $vall){ $descptionn= $vall['text'];}
                   echo $descptionn;
             ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
            <div class="row bg-white text-center">
              <div class="col-md-6">
                <div class="counter-image">
                  <img src="http://preparetest.com/blocks/customhomepage/assets/counterimg.jpeg" class="img-fluid">
                </div>
              </div>
              <div class="col-md-6">
                <div class="counter-image">
                  <img src="http://preparetest.com/blocks/customhomepage/assets/welcome2.png" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="row bg-white">
              <div class="col-md-4">
                <div class="counter-heading bg-prepare">
                  <h1><span class="counter">2</span><span>K+</span></h1>
                  <p>EXAMS</p>
                </div> 
              </div> 
              <div class="col-md-4">
                <div class="counter-heading bg-prepare">
                  <h1><span class="counter">90</span><span>%</span></h1>
                  <p>Graduates</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="counter-heading bg-prepare">
                  <h1><span class="counter">500</span><span>+</span></h1>
                  <p>Graduates</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">  
        </div>
      </div>
    </div>
  </div>  
</section>
<section class="pt-5">

  <div class="container">

    <div class="row pb-4">

      <div class="col-md-12">

        <div class="upcoming-header ">

          <div class="headings"> 

            <h2 class="text-center"><span class="bold_heading"> </span> FEATURES</h2>

          </div>

        </div>

      </div>

    </div>

    <div class="row pt-4">
<?php $awesome_featuresdata = $DB->get_record('customhmp_awesome_features',array('id'=>'1')); ?>
      <div class="col-md-4">
        <div class="feature_box text-center mt-4">
          <span class="feature-icon">
            <img src="http://preparetest.com/blocks/customhomepage/assets/Icon%20metro-books.svg" class="img-fluid">
          </span>
          <div class="feature_box-header_top">
          <div class="feature_box-header pb-3">
            <h4><?php echo $awesome_featuresdata->awesome_features; ?></h4>
          </div>
          <div class="feature_box-content pb-4">
            <?php $data=array(unserialize($awesome_featuresdata->awesome_features_desc));
            foreach ($data as $value) { $fdesc=$value['text']; }
            echo $fdesc; ?>
          </div>
        </div>
        </div>
      </div>    

      <div class="col-md-4">
        <?php $awesome_featuresdatatwo = $DB->get_record('customhmp_awesome_features',array('id'=>'2')); ?>
        <div class="feature_box text-center mt-4">
          <span class="feature-icon">
            <img src="http://preparetest.com/blocks/customhomepage/assets//Icon%20ionic-ios-time.svg" class="img-fluid">
          </span>
          <div class="feature_box-header_top">
          <div class="feature_box-header pb-3">
            <h4><?php echo $awesome_featuresdatatwo->awesome_features; ?></h4>
          </div>

          <div class="feature_box-content pb-4">
            <?php $datatwo=array(unserialize($awesome_featuresdatatwo->awesome_features_desc));
            foreach ($datatwo as $valuetwo) { $ftwodesc=$valuetwo['text']; }
            echo $ftwodesc; ?>
          </div>
        </div>
      </div>

      </div>

      <div class="col-md-4">
        <?php $awesome_featuresdatathree = $DB->get_record('customhmp_awesome_features',array('id'=>'3')); ?>
        <div class="feature_box text-center mt-4">
          <span class="feature-icon">
            <img src="http://preparetest.com/blocks/customhomepage/assets/Icon%20awesome-pen-fancy.svg" class="img-fluid">
          </span>
          <div class="feature_box-header_top">
          <div class="feature_box-header pb-3">
            <h4><?php echo $awesome_featuresdatathree->awesome_features; ?></h4>
          </div>
          <div class="feature_box-content pb-4">
            <?php $datathree=array(unserialize($awesome_featuresdatathree->awesome_features_desc));
            foreach ($datathree as $valuethree) { $fthreedesc=$valuethree['text']; }
            echo $fthreedesc; ?>
          </div>
        </div>
      </div>

      </div>

    </div>

  </div>
</section>



<!-- this-section-remove---12-8-21 -->

<!-- *********************************************************************** -->

<section class=" mt-5 pt-5 pb-4">
  <div class="container">

    <div class="row pb-4">

      <div class="col-md-12">

        <div class="upcoming-header ">

          <div class="headings"> 

            <h2 class="text-center "><span class="bold_heading">STUDENTS  </span>TESTIMONIALS</h2>

          </div>

        </div>


      </div>

    </div>
    <div class="row">
      <div class="col-md-12">
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">

  <?php $testimonialcontent = $DB->get_records('customhmp_testimonialcontent'); 
  $i=1;
foreach ($testimonialcontent as $testimonialcontent) { 
  $fileinfo = $DB->get_record_sql("SELECT * FROM {files} WHERE itemid=$testimonialcontent->image_id and filename!='.'");
if("1"==$i++){
  ?>

                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img src="<?php echo $CFG->wwwroot.'/local/file.php/'.$fileinfo->pathnamehash.'/0/'.$fileinfo->filename; ?>" class="img-fluid img-circle">
                          <?php $sug=array(unserialize($testimonialcontent->testimonial_content));
                   foreach ($sug as $vall){ $descptintest= $vall['text'];}
                   echo $descptintest;  ?>
                            <h4><?php echo $testimonialcontent->name; ?></h4>
                        </div>
                    </div>

<?php }else{ ?>

                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                           <img src="<?php echo $CFG->wwwroot.'/local/file.php/'.$fileinfo->pathnamehash.'/0/'.$fileinfo->filename; ?>" class="img-fluid img-circle">
                            <?php $sug=array(unserialize($testimonialcontent->testimonial_content));
                   foreach ($sug as $vall){ $descptionnt= $vall['text'];}
                   echo $descptionnt;  ?> 
                            <h4><?php echo $testimonialcontent->name; ?></h4>
                        </div>
                    </div>
                 <?php } } ?>


                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
      </div>
    </div>
  </div>
</section>

<?php include('footer.php'); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
  jQuery(document).ready(function( $ ) {
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });

  });


</script>



<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="http://preparetest.com/theme/lambda/layout/js/jquery.counterup.min.js"></script>

<!-- eaxm-point -->
<script >
  $('.owl-carousel').owlCarousel({
  loop: false,
  margin: 10,
  nav: true,
  mouseDrag  : false,
  navText: [
    "<i class='l_ef fa fa-angle-double-left' ></i>",
    "<i class='r_eh fa fa-angle-double-right' ></i>"
  ],
  autoplay: false,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 2
    },
    600: {
      items: 3
    },
    1000: {
      items: 5
    }
  }
})


$(document).ready(function(){

  $('#searchdata').on('keyup', function () {
        var title=$(this).val();
       
        if(title.length>0){

  jQuery.ajax({
            type: "POST",
            url: '<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/ajaxdata.php',
            data: {
            action: 'datasearch',
            title: title
            },
            success: function (data) {  
              $('#filterSearchdata').html(data);
            }
            });

        }else{
            $('#filterSearchdata').html('');
        }
    });


$('.item').on('click', function(){
$(this).removeClass('active');
});

$('.item').on('click', function(){
exploreexamdata($(this).attr('data-id'));
});


});


exploreexamdata('3');



function exploreexamdata(dataid){
$.ajax({
    type: "POST",
    url: "<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/ajaxdata.php",
    data: { 'action':'exploreexam','dataid': dataid },
    cache: false,
    beforeSend: function() {
     $('#loader').css('display','block');
      $('#menu1').css('display','none');
  },
  complete: function(){
     $('#loader').css('display','none');
      $('#menu1').css('display','block');
  },
    success: function(data)
        {
          
          $('#loader').css('display','none');
          $('#menu1').css('display','block');
            $('#exploredata').html(data);
        }
    });


}
 $('#menu1').css('display','none');



$('.owl-stage-outer a').on('click', function(){
    $('.item.current').removeClass('current');
    $(this).addClass('current');
});
</script>
<!-- eaxm-point -->
