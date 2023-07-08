<?php require_once("../../config.php");
   global $DB, $OUTPUT, $PAGE, $USER,$CFG,$SESSION;

   $id = optional_param('id','', PARAM_RAW);
   if(!is_numeric($id)){
    $recorddata=$DB->get_record('searchda_categories_seo',array('slug'=>$id));
    $id=$recorddata->th_id;
   }
   $alldata = $DB->get_record_sql("select st.id,st.title,ss.id as ssid,sc.id as fid, ss.title as sstitle,sc.title as ctitle,scs.slug as thirdslug,scc.slug as secondslug,scf.slug as firstslug, 
scs.title as seotitle,scs.keywords as seokeywords,scs.author as seoauther,scs.description,scs.status as seostatus
from {searchda_categories_seo} as scs
inner join {searchda_third} as st on scs.th_id=st.id 
left join {searchda_categories_secondseo} as scc on st.subid=scc.second_id
left join {searchda_categories_firstseo} as scf on scc.first_id=scf.first_id
INNER JOIN {searchda_secondc} as ss on st.subid=ss.id inner join {searchda_categories} as sc on ss.categoriesid=sc.id WHERE st.id='$id' or scs.slug='$id'");  
  $pageurl=$CFG->wwwroot.'/exam/'.$alldata->firstslug.'/'.$alldata->secondslug.'/'.$alldata->thirdslug;
  $params = array('id'=>$id);
  $PAGE->set_url('/exam/'.$alldata->firstslug.'/'.$alldata->secondslug.'/'.$alldata->thirdslug, $urlparams); 
if(empty($USER->id)){
$SESSION->wantsurl=$pageurl;
}
   ?>
<!DOCTYPE html>
<html>
<head>
<title><?= $alldata->seotitle; ?></title><meta charset="UTF-8"><meta name="description" content="<?= $alldata->description; ?>"><meta name="keywords" content="<?= $alldata->seokeywords; ?>">
<!-- script-exam -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="//preparetest.com/pluginfile.php/1/theme_lambda/favicon/1670156443/favicon.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/newlds.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<style type="text/css">
.test_quizz .owl-stage {
    height: 362px;
    padding-top: 27px;
}
.d_none{
  display: none;
}
.d_block{
  display: block !important;
}
.dropdown-menu{
    left:  100%;
}

</style>
</head>
<!--middel-sec-->
<!-- top-nav -->
<?php include('header.php'); ?>
</div>
</section>
<div class="TSeries_Breadcrumb">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="TS_breadcrumb_div">
               <li><a target="_self" href="<?php echo $CFG->wwwroot ?>">Home > </a></li>
               <li><a target="_self" href="#"><?= $alldata->ctitle; ?> > </a></li>
               <li><a target="_self" href="#"><?= $alldata->sstitle; ?> > </a></li>
               <li><?= $alldata->title; ?></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- top-nav -->
<!-- top-banner -->


<!-- top-banner -->
<!-- test-queze -->
<?php $headerbottomdata = $DB->get_record('searchda_headerbottom',array('thid'=>$id));
?>

<section class="quizz">
   <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="quiz_heading mb-1">
           <a style="text-decoration: none;" class="ng-binding "><?php if(!empty($headerbottomdata->title)){ echo$headerbottomdata->title;}else{ echo "Quizzes"; } ?>
            <?php if (is_siteadmin()) { ?>
            <span><a class="A_dd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/header_bottom_edit.php?id=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></span>
            <span class="pull-right mt-1"> <a class="E_dd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/add_quiz.php?id=<?php echo $id; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></span>
               <?php } ?>
             </a>
         </div>
        </div>
</div>
</div>
</section>

<?php if (is_siteadmin()) { 
                 // $quizdata=$DB->get_records('searchda_quiz',array('thid'=>$id));
                 $quizdata=$DB->get_records_sql("SELECT * FROM {searchda_quiz} where `thid`='".$id."' ORDER BY id desc");
             }else{
              $quizdata=$DB->get_records_sql("SELECT * FROM {searchda_quiz} where `thid`='".$id."'and `status`='0' ORDER BY id desc");
                 //$quizdata=$DB->get_records('searchda_quiz',array('thid'=>$id,'status'=>0));
             }
             if(!empty($quizdata)){
    ?>
<section class="quizz slider_sec pt-5 pb-5">
   <div class="container">
      <div class="row">

                 <?php 
           
         if(count($quizdata)>4){
         ?>
         <div class="col-md-12">
            <div class="test_quizz">
               <div class="carousel-wrap">
                  <div class="owl-carousel">
                      <?php foreach ($quizdata as $value) { ?>
                     <div class="item">
                        <div class="quiz_cover ng-scope slide_r slick-slide slick-current slick-active"   >
                                <?php if (is_siteadmin()) { ?>
                                    
                                          <div class=" h_icon sl_i_der">
                                       <a class="edd"  href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/add_quiz.php?id=<?php echo $id; ?>&cid=<?php echo $value->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                      <a class="add" onclick="return confirm('Are you sure you want to status update -<?= $value->title ?>')" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_update.php?id=<?= $value->id; ?>&table=searchda_quiz&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $id; ?>"><i class="fa <?php if($value->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>
                                        <a class="del click-off" postid="<?= $value->postid; ?>"   data-id="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete.php?id=<?= $value->id; ?>&table=searchda_quiz&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $id; ?>" href="javascript:void(0)" onclick="clickOffConfirmed =  confirm('Are you sure you want to delete <?= $value->title ?> Quiz')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                     </div>
                                       

                                           <?php } ?>
                                        

                           <div  class="quizzes">
                            <?php if(!empty($value->offer)){ ?>
                               <p class="offer"><span><?= $value->offer; ?></span></p>
                                    <?php } ?>
                                
                                            
                              <div class="quiz_details">
                                 <div class="quiz_name">
                                     <div style="flex: none; float: left;    ">
                                       <h4 id="quiz_heading_name"  class="ng-binding"><?=$value->title; ?></h4>
                                       <p id="quiz_heading_name" class="tim_e1 "><span> <i class="fas fa-clock"></i></span> <?= date("d-M-Y",$value->duedate); ?></p>
                                    </div>
                                   <!--  <div class="timer_image" style="float: right;">
                                      
                                       <i class="fas fa-clock"></i>
                                    </div> -->
                                 </div>
                                 <div class="quiz_time_mark_count">
                        <p><span class="ng-binding"><?=$value->question; ?></span><span class="ng-binding"><?=$value->qmark; ?></span></p>
                                    <p><span class="ng-binding"><?=$value->mark; ?></span><span class="ng-binding"><?=$value->qumark; ?></span></p>
                                    <p><span class="ng-binding"><?=$value->minute; ?></span><span class="ng-binding"><?=$value->qminute; ?> </span></p>
                                      <?php 



         $checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid));
           if(!empty($checkatmornot)){

             $quizurl=parse_url($value->moodleurl);
         parse_str($quizurl['query'],$output);
         $course_module=$output['id'];
         $quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

          if(!empty($quizallatemdata)){
                          if($quizallatemdata->state=='inprogress'){
                          ?><p><span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span></p><?php 
                          }
                          if($quizallatemdata->state=='finished'){
                           ?>  <p><span class="ng-binding"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                                   <span class="ng-binding"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$value->price; ?></b> <span>
                                                  </p><?php 
                         
                          }


          }else{

             echo'<p><span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span></p>';
          }



          }else{




                                      if(!empty($value->price)){ ?>
                                  
                                                  <?php if($value->quiz_type!=1){ ?> 
                                           <p>
                                             <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                             <span class="ng-binding"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$value->price; ?></b> <span>
                                            </p>
                                     <?php }else{
                                   $datar=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));
                                   if(!empty($datar)){?>
                                            <p>
                                             <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                             <span class="ng-binding"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$value->price; ?></b> <span>
                                            </p>

                                               
                                               <?php }else{ ?>  <p>
                                             <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span>
                                              </p>
                                            <?php  } } ?>

                                      <?php }else{ ?>
                                     <p>
                                     <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span>
                                      </p>
                                    <?php  }  } ?>

                                 </div>
                             
                              <div class="start_quiz">


                                 <?php if(empty($USER->id)){
                                  ?>
                                  <a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/user-login/"> <p class="start_quiz_p">Start Test</p></a>
                                  <?php
                                 }else{ 

                        $checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid));
                          if(!empty($checkatmornot)){

                            $quizurl=parse_url($value->moodleurl);
                        parse_str($quizurl['query'],$output);
                        $course_module=$output['id'];
                        $quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

                                  if(!empty($quizallatemdata)){

                                                  if($quizallatemdata->state=='inprogress'){
                                                   ?>

                        <p class="view_more_quez"><a class="start_test_btn ng-binding" href="<?= $value->moodleurl; ?>">Continue My Test</a></p>

                                     <?php
                                                 
                                                  }
                                                  if($quizallatemdata->state=='finished'){
                                                   ?>

<!--fstart--->
 <?php if(empty($value->price)){  ?>
          <a class="start_test_btn ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>" base="searchda_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> <p class="start_quiz_p">Start Test</p></a>
          <?php }else{

    if(empty($value->moodleurl)){
      $url="";
    }else{
      $url=$value->moodleurl;
    }

        $senddata = array('action'=>'searchda_quiz',           
        "firstname" => $USER->firstname,
        "lastname"=>$USER->lastname,
        "email"=>$USER->email,
        "redirect_url"=>$url,
        "userid"=>$USER->id,
    "actionid"=>$value->id);  

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));

if($value->quiz_type!=1){
   ?>
<a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>"> <p class="start_quiz_p">Start Test</p></a>

  
<?php }else{ 
if(empty($dataqcheck)){

  ?>
 <a class="start_test_btn ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>"  base="searchda_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> <p class="start_quiz_p">Start Test</p></a>
  
<?php }else{ ?>

<a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>"> <p class="start_quiz_p">Start Test</p></a>
<?php 
}

 } 


          } ?>
                     <!---fend -->




                                                   <?php
                                                 
                                                  }


                                  }else{

                                     
                                     ?>

                        <p class="view_more_quez"><a class="start_test_btn ng-binding" href="<?= $value->moodleurl; ?>">Continue My Test</a></p>

                                     <?php
                                  }



                          }else{ ?>

          <?php if(empty($value->price)){  ?>
          <a class="start_test_btn ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>" base="searchda_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> <p class="start_quiz_p">Start Test</p></a>
          <?php }else{

    if(empty($value->moodleurl)){
      $url="";
    }else{
      $url=$value->moodleurl;
    }

        $senddata = array('action'=>'searchda_quiz',           
        "firstname" => $USER->firstname,
        "lastname"=>$USER->lastname,
        "email"=>$USER->email,
        "redirect_url"=>$url,
        "userid"=>$USER->id,
    "actionid"=>$value->id);  

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));

if($value->quiz_type!=1){
   ?>
<a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>"> <p class="start_quiz_p">Start Test</p></a>

  
<?php }else{ 
if(empty($dataqcheck)){

  ?>
 <a class="start_test_btn ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>"  base="searchda_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> <p class="start_quiz_p">Start Test</p></a>
  
<?php }else{ ?>

<a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>"> <p class="start_quiz_p">Start Test</p></a>
<?php 
}

 } 


          } ?>
                                                     


                        <?php } } ?>




                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                            </div>
                        <?php } ?>
                    
                  </div>
               </div>
            </div>
         </div><!----col-12-end--->
         <?php } else{
           ?>
        <!----col-12-end--->
        <div class="col-md-12">
           <div class="select_test_form">
           <?php foreach ($quizdata as $value) { ?>
            
           <div class="test_form  ">
           <div  class="test_slider">

                                    <?php if (is_siteadmin()) { ?>
                            <div class=" h_icon sl_i_der ">
                                       <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/add_quiz.php?id=<?php echo $id; ?>&cid=<?php echo $value->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" onclick="return confirm('Are you sure you want to status update -<?= $value->title ?>')" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_update.php?id=<?= $value->id; ?>&table=searchda_quiz&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $id; ?>"><i class="fa <?php if($value->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>
                                        <a class="del click-off" postid="<?= $value->postid; ?>"   data-id="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete.php?id=<?= $value->id; ?>&table=searchda_quiz&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $id; ?>" href="javascript:void(0)" onclick="clickOffConfirmed =  confirm('Are you sure you want to delete <?= $value->title ?> Quiz')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                           <?php } ?>
        
                            <div class="quizzes_kit">
                                    <?php if(!empty($value->offer)){ ?>
                               <p class="offer"><span><?= $value->offer; ?></span></p>
                                    <?php } ?>


                              <div class="quiz_details">
                                 <div class="quiz_name">
                                    <div style="flex: none; float: left;    ">
                                       <h4 id="quiz_heading_name" class="ng-binding"><?=$value->title; ?></h4>
                                       <p id="quiz_heading_name" class="tim_e1"> <span class="cloc_k"> <i class="fas fa-clock"></i></span> <?= date("d-M-Y",$value->duedate); ?></p>
                                    </div>
                                   <!--  <div class="timer_image" style="float: right;">
                                   <i class="fas fa-clock"></i>
                                    </div> -->
                                 </div>
                                 <div class="quiz_time_mark_count">
                                    <p><span class="ng-binding"><?=$value->question; ?></span><span class="ng-binding"><?=$value->qmark; ?></span></p>
                                    <p><span class="ng-binding"><?=$value->mark; ?></span><span class="ng-binding"><?=$value->qumark; ?></span></p>
                                    <p><span class="ng-binding"><?=$value->minute; ?></span><span class="ng-binding"><?=$value->qminute; ?> </span></p>
                                      <?php


         $checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid));
           if(!empty($checkatmornot)){

             $quizurl=parse_url($value->moodleurl);
         parse_str($quizurl['query'],$output);
         $course_module=$output['id'];
         $quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

          if(!empty($quizallatemdata)){

                          if($quizallatemdata->state=='inprogress'){
                           echo'<p><span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span></p>';
                         
                          }
                          if($quizallatemdata->state=='finished'){
                           ?><p><span class="ng-binding"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                                   <span class="ng-binding"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$value->price; ?></b> <span>
                                                  </p><?php
                         
                          }


          }else{

             echo'<p><span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span></p>';
          }



  }else{



                                       if(!empty($value->price)){ ?>
                                  
                                                  <?php if($value->quiz_type!=1){ ?> 


                                           <p>
                                             <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                             <span class="ng-binding"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$value->price; ?></b> <span>
                                            </p>





                                              <?php }else{
  $datar=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));
  if(!empty($datar)){?>
                                            <p>
                                             <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Price</b></span>
                                             <span class="ng-binding"><b style="color: #4e556c;font-size: 18px;" ><i class="fa fa-inr" aria-hidden="true"></i></b>  <b style="color: #f74f02;font-size: 27px;"><?=$value->price; ?></b> <span>
                                            </p>

                                               
                                               <?php }else{ ?>  <p>
                                             <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span>
                                              </p>
                                            <?php  } } ?>

                                      <?php }



                                      else{ ?>
                                     <p>
                                     <span class="ng-binding"><b style="font-size: 23px;color: #212947;">Free</b></span>
                                      </p>
                                    <?php  } 

                                  }?>



                        </div>
                                                   </div>
                                                   <div class="start_quiz">
                                                    <?php if(empty($USER->id)){
                                  ?>
                                  <a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/user-login/"> <p class="start_quiz_p">Start Test</p></a>
                                  <?php
                                 }else{ 

                

                     $checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid));
                       if(!empty($checkatmornot)){

                         $quizurl=parse_url($value->moodleurl);
                     parse_str($quizurl['query'],$output);
                     $course_module=$output['id'];
                     $quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

                               if(!empty($quizallatemdata)){

                                               if($quizallatemdata->state=='inprogress'){
                                                ?>

                     <p class="view_more_quez"><a class="start_test_btn ng-binding" href="<?= $value->moodleurl; ?>">Continue My Test</a></p>

                                  <?php
                                              
                                               }
                                               if($quizallatemdata->state=='finished'){
                                                ?>

                      <?php if(empty($value->price)){  ?>
          <a class="start_test_btn ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>"  base="searchda_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> <p class="start_quiz_p">Start Test</p></a>
          <?php }else{

    if(empty($value->moodleurl)){
      $url="";
    }else{
      $url=$value->moodleurl;
    }

        $senddata = array('action'=>'searchda_quiz',           
        "firstname" => $USER->firstname,
        "lastname"=>$USER->lastname,
        "email"=>$USER->email,
        "redirect_url"=>$url,
        "userid"=>$USER->id,
    "actionid"=>$value->id);  

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));

if($value->quiz_type!=1){
   ?>
<a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>"> <p class="start_quiz_p">Start Test</p></a>

  
<?php }else{ 
if(empty($dataqcheck)){

  ?>
 <a class="start_test_btn ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>"  base="searchda_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> <p class="start_quiz_p">Start Test</p></a>
  
<?php }else{ ?>

<a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>"> <p class="start_quiz_p">Start Test</p></a>
<?php 
}

 } 


          } ?>




                                                <?php
                                              
                                               }


                               }else{

                                  
                                  ?>

                    <a class="start_test_btn ng-binding" href="<?= $value->moodleurl; ?>"> <p class="view_more_quez">Continue My Test</p></a>

                                  <?php
                               }



                       }else{ ?>

                             




                              <?php if(empty($value->price)){  ?>
          <a class="start_test_btn ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>"  base="searchda_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> <p class="start_quiz_p">Start Test</p></a>
          <?php }else{

    if(empty($value->moodleurl)){
      $url="";
    }else{
      $url=$value->moodleurl;
    }

        $senddata = array('action'=>'searchda_quiz',           
        "firstname" => $USER->firstname,
        "lastname"=>$USER->lastname,
        "email"=>$USER->email,
        "redirect_url"=>$url,
        "userid"=>$USER->id,
    "actionid"=>$value->id);  

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));

if($value->quiz_type!=1){
   ?>
<a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>"> <p class="start_quiz_p">Start Test</p></a>

  
<?php }else{ 
if(empty($dataqcheck)){

  ?>
 <a class="start_test_btn ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>"  base="searchda_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> <p class="start_quiz_p">Start Test</p></a>
  
<?php }else{ ?>

<a class="start_test_btn ng-binding" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>"> <p class="start_quiz_p">Start Test</p></a>
<?php 
}

 } 


          } ?>

          


                  <?php } } ?>




                              </div>
                           </div>
                   </div>
                   </div>
                 <?php } ?> 
      


              </div>
        </div>
      <?php } ?>
        <!----col-12-end--->
          </div>
            </div>
 </section>

<?php } ?>
<!-- test-queze -slider end-->
<!-- test-section -->
<?php $test_heading = $DB->get_record('searchda_test_heading',array('thid'=>$id));

if (is_siteadmin()) { 

 ?>
<section class="te_st" id="free_test">
   <div class="container">
      <div class="row" >
         <div class="col-md-3 p-3">
            <div class="quest_paper_tab ">
               <div class="quest_topictablinks ng-binding" > <?php if(!empty($test_heading->title)){ echo $test_heading->title;}else{ echo "Test Series"; } ?>
                  <span class="ed_icon">
                     <?php if (is_siteadmin()) { ?>
                     <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/test_heading.php?id=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> <?php }?>
                    <!--  <a class="add" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                   </span> 
                </div>
               <ul class="TStopic_sub_links">
                  <!-- ngRepeat: x in all_test.L3 -->
                <?php  

                if (is_siteadmin()) {
                $testdata=$DB->get_records('searchda_test',array('thid'=>$id));
                }else{
                $testdata=$DB->get_records('searchda_test',array('thid'=>$id,'status'=>0)); 
                }
                $rfirstdata=$DB->get_record('searchda_test',array('thid'=>$id));

                $i=1;
                foreach ($testdata as $value) {


                   ?>
                  <li class="ng-scope_s <?php if($i++==1){ echo "active"; } ?>" data-test="<?=$value->id; ?>"><a  class="ng-binding"><?=$value->title; ?></a>
                      <?php if (is_siteadmin()) { 

$quizc=array();
$catequizdata=$DB->get_records('searchda_ca_quiz',array('quizcategories'=>$value->id,'thid'=>$id));
foreach ($catequizdata as $cvalue) {
$quizc[]=$cvalue->postid;
  }
  $quizs=array();
$catequizdatasecond=$DB->get_records('searchda_testpaper_quiz',array('quizcategories'=>$value->id,'thid'=>$id));
foreach ($catequizdatasecond as $csvalue) {
$quizs[]=$csvalue->postid;
  }




                        ?>
                      <span class=" h_icon">
                     <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/test_edit.php?id=<?php echo $id; ?>&cid=<?php echo $value->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                     <a class="add" onclick="return confirm('Are you sure you want to status update -<?= $value->title ?>')" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_update.php?id=<?= $value->id; ?>&table=searchda_test&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $id; ?>"><i class="fa <?php if($value->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>
                      <a class="del multidelete-off" multi-delte="<?php echo implode(',',array_merge($quizc,$quizs)); ?>" quizallurl="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete.php?id=<?= $value->id; ?>&table=searchda_test&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?=$id; ?>" href="javascript:void(0)" onclick="clickOffConfirmed =  confirm('Are you sure you want to delete <?= $value->title ?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                   </span> <?php  } ?>
                  </li>
                <?php } ?>
                  
                  
                  <?php if (is_siteadmin()) { ?>
                
                   <li  class="ng-scope_s ng_btn">
                     <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/test_edit.php?id=<?php echo $id; ?>">
                    <button><i class="fa fa-plus" aria-hidden="true"></i> Add </button></a>
                    </li> <?php  } ?>

                  <!-- end ngRepeat: x in all_test.L3 -->
               </ul>
            </div>
         </div>
         <div class="col-md-9   ">
            <!-- left_side -->
            <div class="left_side mt-3">
               <div class="exam_course_test_section">
                  <!-- loder -->

<?php if(!empty($rfirstdata->id)){ ?>
<input type="hidden" id="firstcategoryData" value="<?php echo $rfirstdata->id;?>">
                  <div id="loader"> 
                     <span class="loder">
                        <img src="<?php echo $CFG->wwwroot ?>/theme/lambda/layout/image/loading.gif" alt="gif">
                        <br>Please Wait
                     </span>
                  </div>
                 
 
<div id="quizAlldata"></div>
<?php }else{ 
echo "<h3 style='color:red;'>No Data Avl</h3>";

} ?>



<!-- collapse -->
 <!-- exam_course_test_section-end -->
</div>

<!-- collapse -->
            </div>
            <!-- left_side -end-->
         </div>
      
   </div>
</section>


<?php


}else{
      $testdata=$DB->get_records('searchda_test',array('thid'=>$id,'status'=>0)); 
    if(!empty($testdata)){
  ?>
  
  <section class="te_st" id="free_test">
   <div class="container">
      <div class="row" >
         <div class="col-md-3 p-3">
            <div class="quest_paper_tab ">
               <div class="quest_topictablinks ng-binding" > <?php if(!empty($test_heading->title)){ echo $test_heading->title;}else{ echo "Test Series"; } ?>
                  <span class="ed_icon">
                     <?php if (is_siteadmin()) { ?>
                     <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/test_heading.php?id=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> <?php }?>
                    <!--  <a class="add" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                   </span> 
                </div>
               <ul class="TStopic_sub_links">
                  <!-- ngRepeat: x in all_test.L3 -->
                <?php  

                if (is_siteadmin()) {
                $testdata=$DB->get_records('searchda_test',array('thid'=>$id));
                }else{
                $testdata=$DB->get_records('searchda_test',array('thid'=>$id,'status'=>0)); 
                }
                $rfirstdata=$DB->get_record('searchda_test',array('thid'=>$id));

                $i=1;
                foreach ($testdata as $value) {


                   ?>
                  <li class="ng-scope_s <?php if($i++==1){ echo "active"; } ?>" data-test="<?=$value->id; ?>"><a  class="ng-binding"><?=$value->title; ?></a>
                      <?php if (is_siteadmin()) { 

$quizc=array();
$catequizdata=$DB->get_records('searchda_ca_quiz',array('quizcategories'=>$value->id,'thid'=>$id));
foreach ($catequizdata as $cvalue) {
$quizc[]=$cvalue->postid;
  }
  $quizs=array();
$catequizdatasecond=$DB->get_records('searchda_testpaper_quiz',array('quizcategories'=>$value->id,'thid'=>$id));
foreach ($catequizdatasecond as $csvalue) {
$quizs[]=$csvalue->postid;
  }




                        ?>
                      <span class=" h_icon">
                     <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/test_edit.php?id=<?php echo $id; ?>&cid=<?php echo $value->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                     <a class="add" onclick="return confirm('Are you sure you want to status update -<?= $value->title ?>')" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_update.php?id=<?= $value->id; ?>&table=searchda_test&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $id; ?>"><i class="fa <?php if($value->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>
                      <a class="del multidelete-off" multi-delte="<?php echo implode(',',array_merge($quizc,$quizs)); ?>" quizallurl="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete.php?id=<?= $value->id; ?>&table=searchda_test&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?=$id; ?>" href="javascript:void(0)" onclick="clickOffConfirmed =  confirm('Are you sure you want to delete <?= $value->title ?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                   </span> <?php  } ?>
                  </li>
                <?php } ?>
                  
                  
                  <?php if (is_siteadmin()) { ?>
                
                   <li  class="ng-scope_s ng_btn">
                     <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/test_edit.php?id=<?php echo $id; ?>">
                    <button><i class="fa fa-plus" aria-hidden="true"></i> Add </button></a>
                    </li> <?php  } ?>

                  <!-- end ngRepeat: x in all_test.L3 -->
               </ul>
            </div>
         </div>
         <div class="col-md-9   ">
            <!-- left_side -->
            <div class="left_side mt-3">
               <div class="exam_course_test_section">
                  <!-- loder -->

<?php if(!empty($rfirstdata->id)){ ?>
<input type="hidden" id="firstcategoryData" value="<?php echo $rfirstdata->id;?>">
                  <div id="loader"> 
                     <span class="loder">
                        <img src="<?php echo $CFG->wwwroot ?>/theme/lambda/layout/image/loading.gif" alt="gif">
                        <br>Please Wait
                     </span>
                  </div>
                 
 
<div id="quizAlldata"></div>
<?php }else{ 
echo "<h3 style='color:red;'>No Data Avl</h3>";

} ?>



<!-- collapse -->
 <!-- exam_course_test_section-end -->
</div>

<!-- collapse -->
            </div>
            <!-- left_side -end-->
         </div>
      
   </div>
</section>
  
<?php } } ?> 
  
<!-- test-section -->
<!--middel-sec-->
    
    <div class="container-fluid pt-3">

        <div class="container">
              <div class="row space-between align-items-center w-100 mobile-center">
                <div class="row mobile-row pl-4">
<?php 
if (is_siteadmin()) { 
                 $quizcdata=$DB->get_records('searchda_quiz_title',array('thid'=>$id));
             }else{
               $quizcdata=$DB->get_records('searchda_quiz_title',array('thid'=>$id,'status'=>0));
             }
             if(!empty($quizcdata)){
              $g=1;
              $y=1;
             foreach ($quizcdata as $quizcondata) {
           
?>

                      <div class="dropdown">
                          <button class="presentation px-4 c_cont content<?php echo $quizcondata->id; ?> <?php if($y++=='1'){ echo"active"; } ?>" type="button" data-id="content<?php echo $quizcondata->id; ?>" >
                <div class="row align-items-center">
                   <i class="<?php echo  $quizcondata->icon; ?>"></i> 
                   <?php echo  $quizcondata->title; ?>
                     <?php if (is_siteadmin()) { ?>
                    <div class="onHoverShowBtn position-absolute">
                       <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/title.php?thid=<?php echo  $id; ?>&id=<?php echo  $quizcondata->id; ?>">  <i class="fa fa-pencil text-primary " aria-hidden="true"></i> </a>
                  <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_title_content.php?thid=<?php echo  $id; ?>&id=<?php echo  $quizcondata->id; ?>">  <i class="fa <?php if($quizcondata->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?> text-success" aria-hidden="true"></i> </a>
                  <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete_title_content.php?thid=<?php echo  $id; ?>&id=<?php echo  $quizcondata->id; ?>">  <i class="fa fa-trash text-danger" aria-hidden="true"></i> </a>
                  
                </div>
            <?php } ?>
            </div>
            </button>

<?php 
        if (is_siteadmin()) { 
                 $quizimportantdata=$DB->get_record('searchda_quiz_t_imp',array('titleid'=>$quizcondata->id));
             }else{
               $quizimportantdata=$DB->get_record('searchda_quiz_t_imp',array('titleid'=>$quizcondata->id,'status'=>0));
             }




   if(is_siteadmin()) { 
    ?>
                <div class="dropdown-menu p-0 text-uppercase rounded-0 border-0x d<?php echo $quizcondata->id; ?> <?php if($g++=='1'){ echo"d-block"; } ?>" >
                      <a class="dropdown-item table-item" >
                     <div class="row align-items-center text-center">
                        <div class="importantd" im-dt="<?php echo $quizcondata->id; ?>">
                      <i class="fa fa-calendar fa-fw"></i>
                            important date
                        </div>
                <!--     <div class="onHoverShowBtn position-absolute">
                         <i class="fa fa-pencil text-primary" aria-hidden="true"></i> 
                    <i class="fa fa-eye text-success" aria-hidden="true"></i>
                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                  
                </div> -->
              </div>

                        </a>
                   
                </div>

<?php
}else{
    if(!empty($quizimportantdata)){

     ?>

<div class="dropdown-menu p-0 text-uppercase rounded-0 border-0x d<?php echo $quizcondata->id; ?> <?php if($g++=='1'){ echo"d-block"; } ?>">
                      <a class="dropdown-item table-item" >
                     <div class="row align-items-center text-center">
                        <div class="importantd" im-dt="<?php echo $quizcondata->id; ?>">
                      <i class="fa fa-calendar fa-fw"></i>
                            important date
                        </div>

              </div>

                        </a>
                   
</div>
 <?php }  } ?>
   
        </div>
 <?php } } ?>

                </div>
             
 <?php if (is_siteadmin()) { ?>
                <div class="add-btn">
             <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/title.php?thid=<?php echo  $id; ?>"> <button type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
               add</button></a>
          </div>
      <?php } ?>
    </div>


        </div>


       

        </div>



                <!-- content -->
        <div class="container pt-5 dropdown-content" >
 <?php               
 if(!empty($quizcdata)){
$i=1;
             foreach ($quizcdata as $quizconndata) {  ?>

 <div class="tcontent d_none <?php if($i++=='1'){ echo"d_block"; } ?> container p-0" id="content<?php echo $quizconndata->id; ?>">
                     <?php if (is_siteadmin()) { ?>
                <div class="row edit-btn justify-content-end mt-3">

                 <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/title_content.php?thid=<?php echo  $id; ?>&id=<?php echo $quizconndata->id; ?>"><button type="button">
                <i class="fas fa-pencil-alt"></i>edit</button></a>



            </div>

<?php } ?>
                <h5 style="
    padding: 5px;
    font-weight: 600;
    font-size: 20px;"><?php echo  $quizconndata->title; ?> </h5>

                <span><?php $sug=array(unserialize($quizconndata->t_content));
            foreach ($sug as $val){ $descpt= $val['text'];}


echo $descpt; ?></span>
                 </div>



<div class="dcontent d_none" id="tablecontent<?php echo $quizconndata->id; ?>">

<?php if (is_siteadmin()) { ?>
  
  <div class="row edit-btn justify-content-end mt-3">

        <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/important.php?thid=<?php echo  $id; ?>&titleid=<?php echo  $quizconndata->id; ?>"> <button type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
               add</button></a>



            </div>

      <?php } ?>


<?php 
if (is_siteadmin()) { 
                 $titledata=$DB->get_records('searchda_quiz_t_imp',array('titleid'=>$quizconndata->id));
             }else{
               $titledata=$DB->get_records('searchda_quiz_t_imp',array('titleid'=>$quizconndata->id,'status'=>0));
             }
             if(!empty($titledata)){ ?>
<div class="row">

 

  <br>
   <h5 class="pd-1" style="text-indent: 12px;    text-indent: 12px;
    padding: 5px;
    font-weight: 600;
    font-size: 20px;"><?php echo  $quizconndata->title; ?> </h5></div>

   <div class="fulcontent">
                    <table class="table table-hovered table-boxed mt-20">

                        <tbody>
<?php 
           foreach ($titledata as $titledatavalue) {
              ?>
                          
                               <tr>
                            <th class="table-color"><?=$titledatavalue->name; ?></th>
                            <th>:</th>
                            <td class="text-center">
                                <?php if (is_siteadmin()) { ?>
                    <div class="">
                       <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/important.php?thid=<?php echo  $id; ?>&id=<?php echo  $titledatavalue->id; ?>&titleid=<?php echo  $quizcondata->id; ?>">  <i class="fa fa-pencil text-primary " aria-hidden="true"></i> </a>
                  <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_important.php?thid=<?php echo  $id; ?>&id=<?php echo  $titledatavalue->id; ?>&titleid=<?php echo  $quizcondata->id; ?>">  <i class="fa <?php if($titledatavalue->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?> text-success" aria-hidden="true"></i> </a>
                  <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete_important.php?thid=<?php echo  $id; ?>&id=<?php echo  $titledatavalue->id; ?>&titleid=<?php echo  $quizcondata->id; ?>">  <i class="fa fa-trash text-danger" aria-hidden="true"></i> </a>
                  
                </div>
            <?php } ?>   
                                    <?php $sug=array(unserialize($titledatavalue->content));
            foreach ($sug as $val){ $descptt= $val['text'];}


echo $descptt; ?>
                             
                            </td>
                        </tr>
                      <?php }  ?>
                      

                    
                       
                        </tbody>
                    </table>
                    </div>
                    

               

<?php } ?>











</div>
        


<?php } } ?>
</div>





<?php 
  
include('footer.php'); ?>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
    
     jQuery(document).ready(function( $ ) {
      
    $('.importantd').click(function(){
          var dataid=$(this).attr('im-dt');
          $('.presentation').removeClass('active');
           $('.content'+dataid).addClass('active');
$('#'+dataid).addClass('d-block');
$('.dropdown-menu').removeClass('d-block');
$('.d'+dataid).addClass('d-block');
$('.dcontent').removeClass('d-block');
$('#tablecontent'+dataid).addClass('d-block');  

         });
$('.presentation').click(function(){
     var dataid=$(this).attr('data-id');
$('.dcontent').removeClass('d-block');
     $('.presentation').removeClass('active');
     $(this).addClass('active');
     $('.tcontent').removeClass('d_block');

     $('#'+dataid).addClass('d_block');

    });

    });


   $('.presentation').click(function(){
    $('.presentation').parent(".dropdown").children('.dropdown-menu').removeClass('d-block');
   $(this).parent(".dropdown").children('.dropdown-menu').addClass('d-block');
});



 //    $('.dropdown-menu').click(function(){
 //     var important=$(this).attr('data-id');
 //     $('.dropdown-menu').removeClass('active');
 //     $(this).addClass('active');
 // $('.dcontent').removeClass('d_block');
 //     $('#'+important).addClass('d_block');


        jQuery(document).ready(function( $ ) {
            $('.dropdown-menu').click(function(){
               $('.imp-content').find('.d_block').removeClass('d_block');
               $('#important-date').addClass('d_block');
            });

             $('.table-item').click(function(){
                console.log('enter');
                $('.dropdown-content').find('.d_block').removeClass('d_block');
                $('.dcontent').addClass('d_none');
                $('#table-item-content').addClass('d_block');
            });

            $('#stream-item').click(function(){
                console.log('enter');
                $('.dropdown-content').find('.d_block').removeClass('d_block');
                $('.dcontent').addClass('d_none');
                $('#stream-item-content').addClass('d_block');
            });
             $('#collage-item').click(function(){
                console.log('enter');
                $('.dropdown-content').find('.d_block').removeClass('d_block');
                $('.dcontent').addClass('d_none');
                $('#collage-item-content').addClass('d_block');
            });
        });


        
        //     jQuery(document).ready(function( $ ) {
        //     $('.dropdown-menu').click(function(){
        //        $('.imp-content').find('.d_block').removeClass('d_block');
        //        $('#streamContent').addClass('d_block');
        //     });
        // });

        //     jQuery(document).ready(function( $ ) {
        //     $('.dropdown-menu').click(function(){
        //        $('.imp-content').find('.d_block').removeClass('d_block');
        //        $('#collageContent').addClass('d_block');
        //     });
        // });


</script>


<script>
   jQuery(document).ready(function( $ ) {
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
   
   });
   
   
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
<script type="text/javascript">
   $('.owl-carousel').owlCarousel({
    loop: false,
    margin: 5,
    nav: true,
    navText: [
      "<i class='fa fa-caret-left'></i>",
      "<i class='fa fa-caret-right'></i>"
    ],
    autoplay: false,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 4
      }
    }
   })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="http://preparetest.com/theme/lambda/layout/js/jquery.counterup.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->

<?php if (is_siteadmin()) { ?>
  <script >   
$(document).ready(function(){


$(document).on('click','.multidelete-off',function () {
if (!clickOffConfirmed) return false;
var quizallurl = $(this).attr('quizallurl');
var datapostid = $(this).attr('multi-delte');

                $.ajax({
                type: "POST",
                url: "<?php echo $CFG->wwwroot; ?>/allcourses/wp-content/plugins/customlds/ajax.php",
                data: { 'action':'multideleteproduct','datapostid':datapostid},
                cache: false,
                success: function(searchquizdata)
                    {
                 

             window.location.href=quizallurl;
              

            
                       }
                   });

})















$(document).on('click','.search-off',function () {
if (!clickOffConfirmed) return false;
var url = $(this).attr('quiz-url');
var postid = $(this).attr('quiz-cate');
var datapostid = $(this).attr('data-postid');

                $.ajax({
                type: "POST",
                url: "<?php echo $CFG->wwwroot; ?>/allcourses/wp-content/plugins/customlds/ajax.php",
                data: { 'action':'multideleteproduct','datapostid':datapostid},
                cache: false,
                success: function(searchquizdata)
                    {
                 

             window.location.href=url;
              

            
                       }
                   });

})





$(document).on('click','.quiz-off',function () { 
if (!clickOffConfirmed) return false;
var url = $(this).attr('wdata-url');
var postid = $(this).attr('ppostid');

                $.ajax({
                type: "POST",
                url: "<?php echo $CFG->wwwroot; ?>/allcourses/wp-content/plugins/customlds/ajax.php",
                data: { 'action':'deleteproduct','postid':postid},
                cache: false,
                success: function(ndata)
                    {
             window.location.href=url;
              

            
                       }
                   });

})









$(document).on('click','.cate-off',function () { 
if (!clickOffConfirmed) return false;
var url = $(this).attr('wdata-id');
var postid = $(this).attr('wpostid');

                $.ajax({
                type: "POST",
                url: "<?php echo $CFG->wwwroot; ?>/allcourses/wp-content/plugins/customlds/ajax.php",
                data: { 'action':'deleteproduct','postid':postid},
                cache: false,
                success: function(ndata)
                    {
             window.location.href=url;
              

            
                       }
                   });

})

$('.click-off').click(function () {
if (!clickOffConfirmed) return false;
var url = $(this).attr('data-id');
var postid = $(this).attr('postid');




                                $.ajax({
                            type: "POST",
                            url: "<?php echo $CFG->wwwroot; ?>/allcourses/wp-content/plugins/customlds/ajax.php",
                            data: { 'action':'deleteproduct','postid':postid},
                            cache: false,
                            success: function(ndata)
                                {
                         window.location.href=url;
                            

                        
                                     }
                                 });






})
});
</script>
<?php } ?>

<script type="text/javascript">
  $(document).ready(function(){
$(document).on('click','.dafree',function () { 

var userid="<?php echo $USER->id; ?>";
var base=$(this).attr("base");
var baseid=$(this).attr("baseid");
var postid=$(this).attr("postid");
var datahref=$(this).attr("data-href");
 

           jQuery.ajax({
            type: "POST",
            url: '<?php echo $CFG->wwwroot.'/blocks/searchdashboard/ajaxdata.php'; ?>',
            data: {
            action: 'datainternal',
            userid: userid,
            base: base,
            baseid: baseid,
            postid: postid
            
            },
            success: function (data) {  
              window.location.href =datahref;
            }
            });
      });
     $('.dafree').on('click', function () {
var userid="<?php echo $USER->id; ?>";
var base=$(this).attr("base");
var baseid=$(this).attr("baseid");
var postid=$(this).attr("postid");
var datahref=$(this).attr("data-href");
 

           jQuery.ajax({
            type: "POST",
            url: '<?php echo $CFG->wwwroot.'/blocks/searchdashboard/ajaxdata.php'; ?>',
            data: {
            action: 'datainternal',
            userid: userid,
            base: base,
            baseid: baseid,
            postid: postid
            
            },
            success: function (data) {  
              window.location.href =datahref;
            }
            });
      });
$("#start_free_test").click(function() { 
    $('html, body').animate({
      scrollTop:eval($('#free_test').offset().top - 50)
    }, 800);
});
$(".ng-scope_s").click(function() { 
$('.ng-scope_s').removeClass('active');
$(this).addClass('active');
 
 var catequizid=$(this).attr('data-test');  
 var thid="<?php echo $id; ?>";  
  quizdata(catequizid,thid);
});


});
</script>

<script type="text/javascript">
    $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });

quizdata($('#firstcategoryData').val(),<?php echo $id; ?>);
function quizdata(catequizid,thid){
$.ajax({
    type: "POST",
    url: "http://learning.preparetest.com/blocks/searchdashboard/ajaxdata.php",
    data: { 'action':'quizdata','catequizid':catequizid,'thid':thid,'userid':'<?php echo $USER->id; ?>' },
    cache: false,
    beforeSend: function() {
     $('#loader').css('display','block');
     $('#quizAlldata').css('display','none');
  },
  complete: function(){
     $('#loader').css('display','none');
     $('#quizAlldata').css('display','block');
  },
    success: function(data)
        {    
          $('#loader').css('display','none');
          $('#quizAlldata').css('display','block');
            $('#quizAlldata').html(data);
        }
    });

}
</script>
<!-- eaxm-point -->
<?php 
$PAGE->set_url('/blocks/searchdashboard/exam_explore.php', $urlparams); 
?>