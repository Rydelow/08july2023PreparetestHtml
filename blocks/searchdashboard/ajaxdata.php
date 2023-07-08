<?php 
require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;
if($_REQUEST['action']=="sortingdata")
{
  $topbar_slider=new stdClass();
   $topbar_slider->id=$_REQUEST['id'];
   $topbar_slider->sorting=$_REQUEST['sorting'];
$DB->update_record('searchda_third', $topbar_slider,true);
echo"Sucessfully";
}

if($_REQUEST['action']=="quizdata")
{
  $id=$_REQUEST['catequizid'];
  $thid=$_REQUEST['thid'];
  $testdata=$DB->get_record('searchda_test',array('id'=>$id,'thid'=>$thid));
?>
 <!-- loder -->
                  <div class="getTs_About_div" id="TS_exam_testSeries">
                     <h2 class="getTs_AbtHeading ng-binding" ng-bind="sub_data.name"><?php echo $testdata->title; ?>
 <?php if (is_siteadmin()) { ?>
                        <a class="E_di_t" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/test_edit.php?id=<?php echo $thid; ?>&cid=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                         <a class="A_dd pull-right" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/categories_add_quiz.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                     <?php } ?>

                     </h2>
                  </div>
                  <div class="course_se">
                  
<?php if (is_siteadmin()) {
  $catequizdata=$DB->get_records('searchda_ca_quiz',array('quizcategories'=>$id,'thid'=>$thid),'id desc');
}else{
 $catequizdata=$DB->get_records('searchda_ca_quiz',array('quizcategories'=>$id,'thid'=>$thid,'status'=>'0'),'id desc');
}
  foreach ($catequizdata as $value) {

    $checkquizavl=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_ca_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));
?>

                     <div class="quest_paper_nobtabcontent hidden-content <?php
$checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_ca_quiz','baseid'=>$value->id,'postid'=>$value->postid));
  if(!empty($checkatmornot)){

    $quizurl=parse_url($value->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

          if(!empty($quizallatemdata)){

                          if($quizallatemdata->state=='inprogress'){
                      

echo "quest_paper_startBg";

         
                         
                          }
                          if($quizallatemdata->state=='finished'){
                       

 echo "quest_paper_UnlockBg";




                         
                          }


          }else{

             
             

echo "quest_paper_startBg";

            
          }



  }else{ 

if(empty($value->price)){
echo 'quest_paper_startBg';
}else{

                     if($value->quiz_type!=1){echo 'quest_paper_UnlockBg';}else{
if(empty($checkquizavl)){
                      echo 'quest_paper_startBg'; }else{ echo 'quest_paper_UnlockBg'; }

                    } } } ?>" >
                        <div class="exam_course_test_paper">
                          <?php if (is_siteadmin()) { ?>
                            <div class=" h_icon sl_i_der test">
                                       <a class="edd"  href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/categories_add_quiz.php?id=<?php echo $thid; ?>&cid=<?php echo $value->id; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" onclick="return confirm('Are you sure you want to status update -<?= $value->title ?>')" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_update.php?id=<?= $value->id; ?>&table=searchda_ca_quiz&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $thid; ?>"><i class="fa <?php if($value->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>
                                        <a class="del cate-off" wpostid="<?= $value->postid; ?>"   wdata-id="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete.php?id=<?= $value->id; ?>&table=searchda_ca_quiz&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?=$thid; ?>" href="javascript:void(0)" onclick="clickOffConfirmed =  confirm('Are you sure you want to delete <?= $value->title ?> Quiz')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                               <?php } ?>



                           <div class="exam_course_test_paper_name">
                              <h3  class="ng-binding"><?php echo $value->title; ?></h3>
                              <p class="mb-0"><span  class="ng-binding"><?php echo $value->qmark ?></span> <span  class="ng-binding"><?php echo $value->question ?></span> &nbsp;|&nbsp; <span class="ng-binding"><?php echo $value->qumark ?></span> <span  class="ng-binding"><?php echo $value->mark ?></span>&nbsp;|&nbsp;<span  class="ng-binding"><?php echo $value->qminute ?> <?php echo $value->minute ?> </span></p>
                             <p  class="mb-2 mt-2">
                              <?php 

$checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_ca_quiz','baseid'=>$value->id,'postid'=>$value->postid));
  if(!empty($checkatmornot)){

    $quizurl=parse_url($value->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

          if(!empty($quizallatemdata)){

                          if($quizallatemdata->state=='inprogress'){
                           ?>

<span class="free_height">&nbsp;</span>

             <?php
                         
                          }
                          if($quizallatemdata->state=='finished'){
                           ?>

 <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i></strong>  <strong style="font-size: 25px;color: #f74f02;"><?php echo $value->price ?></strong></span>




                           <?php
                         
                          }


          }else{

             
             ?>

<span class="free_height free_texto">Free</span>

             <?php
          }



  }else{ 


                                if(empty($value->price)){ echo '<span class="free_height">&nbsp;</span>';}else{

                              if($value->quiz_type!=1){

                                ?>
                                 <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i></strong>  <strong style="font-size: 25px;color: #f74f02;"><?php echo $value->price ?></strong></span>
                                    <?php }else{
                    if(empty($checkquizavl)){

                                      ?>
                                      <span class="free_height free_texto">Free</span>

                                    <?php }else{ ?>
   <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i></strong>  <strong style="font-size: 25px;color: #f74f02;">
                                    <?php echo $value->price ?></strong></span>

                                   <?php  }


                                     } ?>



                                 <?php  }  } ?>

                              </p>

                           </div>
                           <div class="exam_course_test_paper_start " ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding "  >E</span>
                                 <span class="new_abc ng-binding " >ह</span>
                              </p>
                              <?php 
if(empty($USER->id)){
  ?>
  <a class="ng-binding " href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/login.php"> Start Test</a>
  <?php
}else{
$checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_ca_quiz','baseid'=>$value->id,'postid'=>$value->postid));
  if(!empty($checkatmornot)){

    $quizurl=parse_url($value->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

          if(!empty($quizallatemdata)){

                          if($quizallatemdata->state=='inprogress'){
                           ?>

<a class="ng-bg_color" href="<?= $value->moodleurl; ?>"> Continue My Test</a>

             <?php
                         
                          }
                          if($quizallatemdata->state=='finished'){
                           
// <!------F---->
if(empty($value->price)){ ?>
  <a class="ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>" base="searchda_ca_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> Start Test</a>
<?php  }else{

 if(empty($value->moodleurl)){
      $url="";
    }else{
      $url=$value->moodleurl;
    }

        $senddata = array('action'=>'searchda_ca_quiz',           
        "firstname" => $USER->firstname,
        "lastname"=>$USER->lastname,
        "email"=>$USER->email,
        "redirect_url"=>$url,
        "userid"=>$USER->id,
    "actionid"=>$value->id);  

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_ca_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));
                              if($value->quiz_type!=1){?>
                                <a class="ng-binding ng-scope" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>">  <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                              <?php }else{

                                  if(empty($checkquizavl)){ ?>
                               <a class="ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>" base="searchda_ca_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> Start Test</a>
<?php }else{?>

   <a class="ng-binding ng-scope" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>">
  <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>

                              <?php } } }
// <!------E---->


                          }


          }else{

             
             ?>

<a class="ng-bg_color" href="<?= $value->moodleurl; ?>"> Continue My Test</a>

             <?php
          }



  }else{ 

if(empty($value->price)){ ?>
  <a class="ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>" base="searchda_ca_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> Start Test</a>
<?php  }else{

 if(empty($value->moodleurl)){
      $url="";
    }else{
      $url=$value->moodleurl;
    }

        $senddata = array('action'=>'searchda_ca_quiz',           
        "firstname" => $USER->firstname,
        "lastname"=>$USER->lastname,
        "email"=>$USER->email,
        "redirect_url"=>$url,
        "userid"=>$USER->id,
    "actionid"=>$value->id);  

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_ca_quiz','baseid'=>$value->id,'postid'=>$value->postid,'payment_type'=>"free"));









                              if($value->quiz_type!=1){?>
                                <a class="ng-binding ng-scope" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>">  <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                              <?php }else{

                                  if(empty($checkquizavl)){ ?>
                               <a class="ng-binding dafree" data-href="<?php echo $value->moodleurl; ?>" base="searchda_ca_quiz" baseid="<?php echo $value->id; ?>" postid="<?php echo $value->postid; ?>" href="javascript:void(0);"> Start Test</a>
<?php }else{?>

   <a class="ng-binding ng-scope" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $value->postid; ?>&base=<?php echo $lastdata; ?>">
  <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>

                              <?php } } } 
}
}
                              ?>
                           </div>
                        </div>
                     </div>
                    
<?php } ?>



                  </div>
              

<?php if (is_siteadmin()) {

  $section_catequizdata=$DB->get_records('searchda_quiz_section_ca',array('quizcategories'=>$id,'thid'=>$thid),'id desc');
}else{
 $section_catequizdata=$DB->get_records('searchda_quiz_section_ca',array('quizcategories'=>$id,'thid'=>$thid,'status'=>'0'),'id desc');
}

  foreach ($section_catequizdata as $value) { 


if (is_siteadmin()) {
  $cate_quizdata=array();
$admintestpaper_catequizdata=$DB->get_records('searchda_testpaper_quiz',array('quizcategories'=>$id,'thid'=>$thid,'testpaperid'=>$value->id),'id desc');

foreach ($admintestpaper_catequizdata as $valueadmin) {
  $cate_quizdata[]=$valueadmin->postid;
}

}


    ?>




<!-- collapse2-start -->
<div class="course_se mt-5">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <?php if(!empty($value->freetext)){ ?>
   <div class="TS_free_ribbon ng-scope" ng-if="sub.free>0 &amp;&amp; !sub_data.package_bought">
         <span class="TS_free_content"><span class="ng-binding"> <?= $value->freetext; ?></span>
         <br></span>
          </div>
<?php } ?>
   <div class="panel panel-default">
    <?php if (is_siteadmin()) { ?>
    <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&cid=<?php echo $value->id; ?>&quizcategories=<?php echo $id; ?>">  <i class="fa fa-pencil test_pen" style="top: 10px;left: 35%;" aria-hidden="true"></i>
         </a>        

                            <div class=" h_icon co_ap ">
                                       <a class="add_d" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                       <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&cid=<?php echo $value->id; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" onclick="return confirm('Are you sure you want to status update -<?= $value->title ?>')" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_update.php?id=<?= $value->id; ?>&table=searchda_quiz_section_ca&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $thid; ?>"><i class="fa <?php if($value->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>
                                        <a class="del search-off"  data-postid="<?php echo implode(',',$cate_quizdata); ?>"  quiz-cate="<?= $value->id; ?>"   quiz-url="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete.php?id=<?= $value->id; ?>&table=searchda_quiz_section_ca&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?=$thid; ?>" href="javascript:void(0)" onclick="clickOffConfirmed =  confirm('Are you sure you want to delete <?= $value->title ?> Quiz')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                                <?php } ?>

         
    <div class="panel-heading  bo_t_collapse" role="tab" id="headingtow">

      <h4 class="panel-title">

         <a role="button" class="m-0" data-toggle="collapse" data-parent="#accordion" href="#collapsetow<?php echo $value->id; ?>" aria-expanded="true" aria-controls="collapsetow<?php echo $value->id; ?>">
           

 <div class="ac_text m-0 f_Reetext">
           <p class=""><?php echo $value->title; ?></p>
           <span><?php echo $value->testpaper; ?></span>
        </div>
        </a>
      </h4>
    </div>
   <div id="collapsetow<?php echo $value->id; ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingtow">
      <div class="panel-body">
        <div class="course_se">
          <?php if (is_siteadmin()) { ?>
         <p class="text-right mb-3"><a class="A_dd " href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/testpaper_categories_quiz.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>&testpaper=<?php echo $value->id; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></p>
                   
<?php } ?>
<?php if (is_siteadmin()) {
$testpaper_catequizdata=$DB->get_records('searchda_testpaper_quiz',array('quizcategories'=>$id,'thid'=>$thid,'testpaperid'=>$value->id),'id desc');
}else{
 $testpaper_catequizdata=$DB->get_records('searchda_testpaper_quiz',array('quizcategories'=>$id,'thid'=>$thid,'status'=>'0','testpaperid'=>$value->id),'id desc');
}
  foreach ($testpaper_catequizdata as $testpaper_value) { 
$testcheckquizavl=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_testpaper_quiz','baseid'=>$testpaper_value->id,'postid'=>$testpaper_value->postid,'payment_type'=>"free"));

    ?>

                     <div class="quest_paper_nobtabcontent hidden-content <?php 

$checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_testpaper_quiz','baseid'=>$testpaper_value->id,'postid'=>$testpaper_value->postid));
  if(!empty($checkatmornot)){

    $quizurl=parse_url($testpaper_value->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

          if(!empty($quizallatemdata)){

                          if($quizallatemdata->state=='inprogress'){
                      

echo "quest_paper_startBg";

         
                         
                          }
                          if($quizallatemdata->state=='finished'){
                       

 echo "quest_paper_UnlockBg";




                         
                          }


          }else{

             
             

echo "quest_paper_startBg";

            
          }



  }else{

                     if(empty($testpaper_value->price)){
echo 'quest_paper_startBg';
}else{   if($testpaper_value->quiz_type!=1){echo 'quest_paper_UnlockBg';}else{

 if(empty($testcheckquizavl)){
                      echo 'quest_paper_startBg'; 
                      }else{
                       echo 'quest_paper_UnlockBg'; 
                     }


} }  } ?>">
                        <div class="exam_course_test_paper">
                                             <?php if (is_siteadmin()) { ?>
                            <div class=" h_icon sl_i_der test">
                                       <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/testpaper_categories_quiz.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>&testpaper=<?php echo $value->id; ?>&cid=<?php echo$testpaper_value->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 

                                       <a class="add" onclick="return confirm('Are you sure you want to status update -<?= $testpaper_value->title ?>')" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_update.php?id=<?= $testpaper_value->id; ?>&table=searchda_testpaper_quiz&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?= $thid; ?>"><i class="fa <?php if($testpaper_value->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>

                                        <a class="del quiz-off" ppostid="<?= $testpaper_value->postid; ?>"   wdata-url="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete.php?id=<?= $testpaper_value->id; ?>&table=searchda_testpaper_quiz&url=<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?=$thid; ?>" href="javascript:void(0)" onclick="clickOffConfirmed =  confirm('Are you sure you want to delete <?= $testpaper_value->title ?> Quiz')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                               <?php } ?>

                           <div class="exam_course_test_paper_name">
                              <h3 class="ng-binding"><?=$testpaper_value->title; ?></h3>
                            

                                <p><span  class="ng-binding"><?php echo $testpaper_value->qmark ?></span> <span  class="ng-binding"><?php echo $testpaper_value->question ?></span> &nbsp;|&nbsp; <span class="ng-binding"><?php echo $testpaper_value->qumark ?></span> <span  class="ng-binding"><?php echo $testpaper_value->mark ?></span>&nbsp;|&nbsp;<span  class="ng-binding"><?php echo $testpaper_value->qminute ?> <?php echo $testpaper_value->minute ?> </span></p>


                                 <p  class="mb-2 mt-2">
                                  <?php 


$checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_testpaper_quiz','baseid'=>$testpaper_value->id,'postid'=>$testpaper_value->postid));
  if(!empty($checkatmornot)){

    $quizurl=parse_url($value->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

          if(!empty($quizallatemdata)){

                          if($quizallatemdata->state=='inprogress'){
                           ?>

<span class="free_height free_texto">Free</span>


             <?php
                         
                          }
                          if($quizallatemdata->state=='finished'){
                           ?>

 <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i></strong>  <strong style="font-size: 25px;color: #f74f02;"><?php echo $testpaper_value->price ?></strong></span>




                           <?php
                         
                          }


          }else{

             
             ?>

<span class="free_height free_texto">Free</span>


             <?php
          }



  }else{ 


 if(empty($testpaper_value->price)){ echo '<span class="free_height">&nbsp;</span>';
}else{

                                  if($testpaper_value->quiz_type!=1){ ?>
                                 <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i></strong>  <strong style="font-size: 25px;color: #f74f02;"><?php echo $testpaper_value->price ?></strong></span>
                                    <?php }else{

                                      
                                      if(empty($testcheckquizavl)){

                                      ?>
                                   <span class="free_height free_texto">Free</span>

                                    <?php }else{ ?>

                                      <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i></strong>  <strong style="font-size: 25px;color: #f74f02;">
                                    <?php echo $testpaper_value->price ?></strong></span>
                                    <?php }

                                  } }  


                                } ?>
                              </p>
                           </div>
                           <div class="exam_course_test_paper_start ng-scope" ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding">E</span>
                                 <span class="new_abc ng-binding">ह</span>
                              </p>
                              <?php

if(empty($USER->id)){
?>
 <a class="ng-binding" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/login.php"> Start Test</a>
<?php
}else{


$checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_testpaper_quiz','baseid'=>$testpaper_value->id,'postid'=>$testpaper_value->postid));
  if(!empty($checkatmornot)){

    $quizurl=parse_url($value->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."'");

          if(!empty($quizallatemdata)){

                          if($quizallatemdata->state=='inprogress'){
                           ?>

<a class="ng-bg_color" href="<?= $testpaper_value->moodleurl; ?>"> Continue My Test</a>

             <?php
                         
                          }
                          if($quizallatemdata->state=='finished'){
                          
                           if(empty($testpaper_value->price)){ ?>
                                     <a class="ng-binding " href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/instruction.php?id=<?= $testpaper_value->id; ?>&base=<?php echo base64_encode('searchda_testpaper_quiz'); ?>"> Start Test</a>
                                   <?php }else{

    if(empty($testpaper_value->moodleurl)){
      $url="";
    }else{
      $url=$testpaper_value->moodleurl;
    }

        $senddata = array('action'=>'searchda_testpaper_quiz',           
        "firstname" => $USER->firstname,
        "lastname"=>$USER->lastname,
        "email"=>$USER->email,
        "redirect_url"=>$url,
        "userid"=>$USER->id,
    "actionid"=>$testpaper_value->id);  

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_testpaper_quiz','baseid'=>$testpaper_value->id,'postid'=>$testpaper_value->postid,'payment_type'=>"free"));      

                               if($testpaper_value->quiz_type!=1){?>
                                <a class="ng-binding ng-scope" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $testpaper_value->postid; ?>&base=<?php echo $lastdata; ?>"> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                              <?php }else{?>

<?php if(empty($testcheckquizavl)){

                                      ?>
                                     

    <a class="ng-binding dafree" data-href="<?php echo $testpaper_value->moodleurl; ?>"  base="searchda_testpaper_quiz" baseid="<?php echo $testpaper_value->id; ?>" postid="<?php echo $testpaper_value->postid; ?>" href="javascript:void(0);"> Start Test</a>

                                    <?php }else{ ?>
                                      <a class="ng-binding ng-scope" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $testpaper_value->postid; ?>&base=<?php echo $lastdata; ?>"> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                          
<?php } ?>


                              <?php } } 
                         
                          }


          }else{

             
             ?>

<a class="ng-bg_color" href="<?= $testpaper_value->moodleurl; ?>"> Continue My Test</a>

             <?php
          }



  }else{ 

                                if(empty($testpaper_value->price)){ ?>
                                     <a class="ng-binding dafree" data-href="<?php echo $testpaper_value->moodleurl; ?>" base="searchda_ca_quiz" baseid="<?php echo $testpaper_value->id; ?>" postid="<?php echo $testpaper_value->postid; ?>" href="javascript:void(0);"> Start Test</a>
                                   <?php }else{

    if(empty($testpaper_value->moodleurl)){
      $url="";
    }else{
      $url=$testpaper_value->moodleurl;
    }

        $senddata = array('action'=>'searchda_testpaper_quiz',           
        "firstname" => $USER->firstname,
        "lastname"=>$USER->lastname,
        "email"=>$USER->email,
        "redirect_url"=>$url,
        "userid"=>$USER->id,
    "actionid"=>$testpaper_value->id);  

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>'searchda_testpaper_quiz','baseid'=>$testpaper_value->id,'postid'=>$testpaper_value->postid,'payment_type'=>"free"));      

                               if($testpaper_value->quiz_type!=1){?>
                                <a class="ng-binding ng-scope" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $testpaper_value->postid; ?>&base=<?php echo $lastdata; ?>"> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                              <?php }else{?>

<?php if(empty($testcheckquizavl)){

                                      ?>
                                     

    <a class="ng-binding dafree" data-href="<?php echo $testpaper_value->moodleurl; ?>"  base="searchda_testpaper_quiz" baseid="<?php echo $testpaper_value->id; ?>" postid="<?php echo $testpaper_value->postid; ?>" href="javascript:void(0);"> Start Test</a>

                                    <?php }else{ ?>
                                      <a class="ng-binding ng-scope" href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $testpaper_value->postid; ?>&base=<?php echo $lastdata; ?>"> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                          
<?php } ?>


                              <?php } } 

                            } 
}


                            ?>
                           </div>
                        </div>
                     </div>
                    <?php } ?>
                   
                
                  </div>
      </div>
    </div>
  </div>
   
</div>
</div>


<?php } ?>


<?php
if(count($section_catequizdata)==0){
  if (is_siteadmin()) {
?>

<!-- collapse2-start -->
<div class="course_se mt-5">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <div class="TS_free_ribbon ng-scope" ng-if="sub.free>0 &amp;&amp; !sub_data.package_bought">
         <span class="TS_free_content"><span  class="ng-binding">1</span> <span class="ng-binding">Free Test</span>
         <br></span>

          <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>">  <i class="fa fa-pencil free_test" aria-hidden="true"></i>
         </a>
          </div>
   <div class="panel panel-default">
                                     
                            <div class=" h_icon co_ap " style="display: none;">
                                       <a class="add_d" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                             

         
    <div class="panel-heading  bo_t_collapse" role="tab" id="headingtow">

      <h4 class="panel-title">

         <a role="button" class="m-0" data-toggle="collapse" data-parent="#accordion" href="#collapsetow" aria-expanded="true" aria-controls="collapsetow">
           

 <div class="ac_text m-0 f_Reetext">
           <p class="">Tests Name <small>Added Section Like this</small></p>
           <span>8 Test Papers</span>
        </div>
        </a>
      </h4>
    </div>
   <div id="collapsetow" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingtow">
      <div class="panel-body">
        <div class="course_se">
         <p class="text-right mb-3"><a class="A_dd " href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></p>
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_startBg">
                        <div class="exam_course_test_paper">
                                              <!-- edite-icon -->
                            <div class=" h_icon sl_i_der test">
                                       <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                               <!-- edite-icon -->

                           <div class="exam_course_test_paper_name">
                              <h3 class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span class="ng-binding">100</span> <span class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span class="ng-binding">Marks</span>&nbsp;|&nbsp;<span class="ng-binding">120 Min </span></p>
                                 <p  class="mb-2 mt-2">
                                 <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i>.</strong>  <strong style="font-size: 25px;color: #f74f02;">400</strong></span>
                              </p>
                           </div>
                           <div class="exam_course_test_paper_start ng-scope" ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding">E</span>
                                 <span class="new_abc ng-binding">ह</span>
                              </p>
                              <a class="ng-binding" href="">Start Test</a>
                           </div>
                        </div>
                     </div>
                     <!-- start -->
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_UnlockBg">
                        <div class="exam_course_test_paper">
                                              <!-- edite-icon -->
                            <div class=" h_icon sl_i_der test">
                                       <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/quiz_section_edit.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                               <!-- edite-icon -->

                           <div class="exam_course_test_paper_name">
                              <h3 class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span class="ng-binding">100</span> <span class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span class="ng-binding">Marks</span>&nbsp;|&nbsp;<span class="ng-binding">120 Min </span></p>
                                   <p  class="mb-2 mt-2" >
                                 <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i>.</strong>  <strong style="font-size: 25px;color: #f74f02;">400</strong></span>
                              </p>
                           </div>
                           <div class="exam_course_test_paper_start " ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding ">E</span>
                                 <span class="new_abc ng-binding ">ह</span>
                              </p>
                              <a class="ng-binding ng-scope" href=""> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                           </div>
                        </div>
                     </div>
                   
                    
                  </div>
      </div>
    </div>
  </div>
   
</div>
</div>




<?php } } ?>


<?php $more=$DB->get_record('searchda_testcomeing',array('quizcategories'=>$id,'thid'=>$thid));
if(!empty($more->title)){

 ?>
 <p class="text-center mt-2"><b style="color: #383737;font-size: 20px;font-weight: 500;"><?= $more->title; ?> 
<?php if (is_siteadmin()) { ?>  <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/more_test_comming.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-pencil " style="    border: 2px solid #219812;
    padding: 7px 7px;
    border-radius: 25px;
    font-size: 20px;
color: #219812;" aria-hidden="true"></i></a>
<?php } ?>
</b></p>

<?php }else{
  if (is_siteadmin()) {
 ?>

<p class="text-center mt-2"><b style="color: #383737;font-size: 20px;font-weight: 500;">More Tests are Comming Soon <small> Added Content </small> 
  <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/more_test_comming.php?id=<?php echo $thid; ?>&quizcategories=<?php echo $id; ?>"><i class="fa fa-pencil " style="    border: 2px solid #219812;
    padding: 7px 7px;
    border-radius: 25px;
    font-size: 20px;
color: #219812;" aria-hidden="true"></i></a>

</b></p>


 <?php
}
} ?>












<?php


}



if($_REQUEST['action']=="sub_categoriescreateproduct")
{
  $topbar_slider=new stdClass();
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
 $topbar_slider->quizcategories=$_REQUEST['quizcategories'];
 $topbar_slider->quiz_type=$_REQUEST['quiz_type'];
$topbar_slider->duedate=strtotime($_REQUEST['duedate']);
$topbar_slider->question=$_REQUEST['question'];
$topbar_slider->qmark=$_REQUEST['qmark'];
$topbar_slider->mark=$_REQUEST['mark'];
$topbar_slider->qumark=$_REQUEST['qumark'];
$topbar_slider->minute=$_REQUEST['minute'];
$topbar_slider->qminute=$_REQUEST['qminute'];
$topbar_slider->postid=$_REQUEST['postid'];
$topbar_slider->moodleurl=$_REQUEST['moodleurl'];
$topbar_slider->price=$_REQUEST['price'];
$topbar_slider->createdtime=time();
 $DB->insert_record('searchda_sub_quiz', $topbar_slider,true);


}



if($_REQUEST['action']=="sub_categoriesupdateproduct")
{
  $topbar_slider=new stdClass();
 $topbar_slider->id=$_REQUEST['id'];
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
  $topbar_slider->quizcategories=$_REQUEST['quizcategories'];
 $topbar_slider->quiz_type=$_REQUEST['quiz_type'];
$topbar_slider->duedate=strtotime($_REQUEST['duedate']);
$topbar_slider->question=$_REQUEST['question'];
$topbar_slider->qmark=$_REQUEST['qmark'];
$topbar_slider->mark=$_REQUEST['mark'];
$topbar_slider->qumark=$_REQUEST['qumark'];
$topbar_slider->minute=$_REQUEST['minute'];
$topbar_slider->qminute=$_REQUEST['qminute'];
$topbar_slider->postid=$_REQUEST['postid'];
$topbar_slider->moodleurl=$_REQUEST['moodleurl'];
$topbar_slider->price=$_REQUEST['price'];
$topbar_slider->modifiedtime=time();
   $DB->update_record('searchda_sub_quiz', $topbar_slider,true);


}

if($_REQUEST['action']=="testpaper_categoriescreateproduct")
{
  $topbar_slider=new stdClass();
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
 $topbar_slider->quizcategories=$_REQUEST['quizcategories'];
 $topbar_slider->testpaperid=$_REQUEST['testpaperid'];
 $topbar_slider->quiz_type=$_REQUEST['quiz_type'];
$topbar_slider->duedate=strtotime($_REQUEST['duedate']);
$topbar_slider->question=$_REQUEST['question'];
$topbar_slider->qmark=$_REQUEST['qmark'];
$topbar_slider->mark=$_REQUEST['mark'];
$topbar_slider->qumark=$_REQUEST['qumark'];
$topbar_slider->minute=$_REQUEST['minute'];
$topbar_slider->qminute=$_REQUEST['qminute'];
$topbar_slider->postid=$_REQUEST['postid'];
$topbar_slider->moodleurl=$_REQUEST['moodleurl'];
$topbar_slider->price=$_REQUEST['price'];
$topbar_slider->createdtime=time();
 $DB->insert_record('searchda_testpaper_quiz', $topbar_slider,true);
}


if($_REQUEST['action']=="testpaper_categoriesupdateproduct")
{
  $topbar_slider=new stdClass();
 $topbar_slider->id=$_REQUEST['id'];
  $topbar_slider->testpaperid=$_REQUEST['testpaperid'];
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
  $topbar_slider->quizcategories=$_REQUEST['quizcategories'];
 $topbar_slider->quiz_type=$_REQUEST['quiz_type'];
$topbar_slider->duedate=strtotime($_REQUEST['duedate']);
$topbar_slider->question=$_REQUEST['question'];
$topbar_slider->qmark=$_REQUEST['qmark'];
$topbar_slider->mark=$_REQUEST['mark'];
$topbar_slider->qumark=$_REQUEST['qumark'];
$topbar_slider->minute=$_REQUEST['minute'];
$topbar_slider->qminute=$_REQUEST['qminute'];
$topbar_slider->postid=$_REQUEST['postid'];
$topbar_slider->moodleurl=$_REQUEST['moodleurl'];
$topbar_slider->price=$_REQUEST['price'];
$topbar_slider->modifiedtime=time();
   $DB->update_record('searchda_testpaper_quiz', $topbar_slider,true);


}


if($_REQUEST['action']=="categoriescreateproduct")
{
  $examcitydata=json_decode($_REQUEST['examcitydata']);
  $topbar_slider=new stdClass();
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
 $topbar_slider->quizcategories=$_REQUEST['quizcategories'];
 $topbar_slider->quiz_type=$_REQUEST['quiz_type'];
$topbar_slider->duedate=strtotime($_REQUEST['duedate']);
$topbar_slider->question=$_REQUEST['question'];
$topbar_slider->qmark=$_REQUEST['qmark'];
$topbar_slider->mark=$_REQUEST['mark'];
$topbar_slider->qumark=$_REQUEST['qumark'];
$topbar_slider->minute=$_REQUEST['minute'];
$topbar_slider->qminute=$_REQUEST['qminute'];
$topbar_slider->postid=$_REQUEST['postid'];
$topbar_slider->moodleurl=$_REQUEST['moodleurl'];
$topbar_slider->price=$_REQUEST['price'];
$topbar_slider->createdtime=time();
 $mooldleinsertID=$DB->insert_record('searchda_ca_quiz', $topbar_slider,true);
if(!empty($examcitydata)){
    foreach ($examcitydata as $value) {
      $examcity=explode("-",$value);
      $cityaction=$examcity['0'];
      $insertdata=new stdClass();
      $insertdata->exam_table="searchda_ca_quiz";
      $insertdata->exam_id=$mooldleinsertID;
      $insertdata->action_country=$examcity['0'];
      $insertdata->exam_categoryid=$_REQUEST['exam_category'];
      $insertdata->createdtime=time();
      switch ($cityaction) {
        case "state":  
        $insertdata->state_id=$examcity['1'];
          break;
        case "city":
        $rdata=$DB->get_record_sql("SELECT * FROM {exam_city} where `id`='".$examcity['1']."'");
        $insertdata->city_id=$examcity['1'];
        $insertdata->state_id=$rdata->state_id;
          break;
        case "district":
        $rdata=$DB->get_record_sql("SELECT * FROM {exam_district} where `id`='".$examcity['1']."'");
        $insertdata->state_id=$rdata->state_id;
        $insertdata->district_id=$examcity['1'];
          break;     
      }
     $DB->insert_record('exam_listing', $insertdata,true); 
    }
  }else{
      $insertdata=new stdClass();
      $insertdata->exam_table="searchda_ca_quiz";
      $insertdata->exam_id=$mooldleinsertID;
      $insertdata->action_country='India';
      $insertdata->exam_categoryid=$_REQUEST['exam_category'];
      $insertdata->createdtime=time();
      $DB->insert_record('exam_listing', $insertdata,true); 
    }

}



if($_REQUEST['action']=="categoriesupdateproduct")
{
  $topbar_slider=new stdClass();
 $topbar_slider->id=$_REQUEST['id'];
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
  $topbar_slider->quizcategories=$_REQUEST['quizcategories'];
 $topbar_slider->quiz_type=$_REQUEST['quiz_type'];
$topbar_slider->duedate=strtotime($_REQUEST['duedate']);
$topbar_slider->question=$_REQUEST['question'];
$topbar_slider->qmark=$_REQUEST['qmark'];
$topbar_slider->mark=$_REQUEST['mark'];
$topbar_slider->qumark=$_REQUEST['qumark'];
$topbar_slider->minute=$_REQUEST['minute'];
$topbar_slider->qminute=$_REQUEST['qminute'];
$topbar_slider->postid=$_REQUEST['postid'];
$topbar_slider->moodleurl=$_REQUEST['moodleurl'];
$topbar_slider->price=$_REQUEST['price'];
$topbar_slider->modifiedtime=time();
   $DB->update_record('searchda_ca_quiz', $topbar_slider,true);
$udata=$DB->get_records_sql("SELECT * FROM {exam_listing} where `exam_id`='".$_REQUEST['id']."' and `exam_table`='searchda_ca_quiz'"); 
 if(!empty($udata)){
  foreach ($udata as $value) {
    $updateexam=new stdClass();
    $updateexam->id=$value->id;
    $updateexam->exam_categoryid=$_REQUEST['exam_category'];
    $DB->update_record('exam_listing', $updateexam,true);
  }
  }else{
    $updateexam=new stdClass();
    $updateexam->exam_table='searchda_ca_quiz';
    $updateexam->exam_id=$_REQUEST['id'];
    $updateexam->action_country="India";
    $updateexam->createdtime=time();
    $updateexam->exam_categoryid=$_REQUEST['exam_category'];
    $DB->insert_record('exam_listing', $updateexam,true);
}
  

   $examcitydata=json_decode($_REQUEST['examcitydata']);
   $oldexamcity=json_decode($_REQUEST['oldexamcity']);
   
   $result=array_diff($oldexamcity,$examcitydata);
   foreach ($result as $value) {
      $examcity=explode("-",$value);
      $cityaction=$examcity['0'];
      if($value=='India'){
        $idata=$DB->get_record_sql("SELECT * FROM {exam_listing} where `action_country`='India' and `exam_id`='".$_REQUEST['id']."' and `exam_table`='searchda_ca_quiz'");  
        $DB->delete_records('exam_listing',array('id'=>$idata->id));
      }
      switch ($cityaction) {
        case "state":
        $sdata=$DB->get_record_sql("SELECT * FROM {exam_listing} where `action_country`='state' and `exam_id`='".$_REQUEST['id']."' and `state_id`='".$examcity['1']."' and `exam_table`='searchda_ca_quiz'");  
        $DB->delete_records('exam_listing',array('id'=>$sdata->id));
          break;
        case "city":
        $cdata=$DB->get_record_sql("SELECT * FROM {exam_listing} where `action_country`='city' and `exam_id`='".$_REQUEST['id']."'  and `city_id`='".$examcity['1']."' and `exam_table`='searchda_ca_quiz'");  
        $DB->delete_records('exam_listing',array('id'=>$cdata->id));
          break;
        case "district":
        $ddata=$DB->get_record_sql("SELECT * FROM {exam_listing} where `action_country`='district' and `exam_id`='".$_REQUEST['id']."'  and `district_id`='".$examcity['1']."' and `exam_table`='searchda_ca_quiz'");  
        $DB->delete_records('exam_listing',array('id'=>$ddata->id));
          break;     
      }
    }

    $newresult=array_diff($examcitydata,$oldexamcity);
// echo "new";
// print_r($newresult);
foreach ($newresult as $value) {
        if($value=='India'){
          $insertdata=new stdClass();
      $insertdata->exam_table="searchda_quiz";
      $insertdata->exam_id=$_REQUEST['id'];
      $insertdata->action_country='India';
      $insertdata->exam_categoryid=$_REQUEST['exam_category'];
      $insertdata->createdtime=time();
      $DB->insert_record('exam_listing', $insertdata,true); 
        }

      $examcity=explode("-",$value);
      $cityaction=$examcity['0'];
      $insertdata=new stdClass();
      $insertdata->exam_table="searchda_quiz";
      $insertdata->exam_id=$_REQUEST['id'];
      $insertdata->action_country=$examcity['0'];
      $insertdata->exam_categoryid=$_REQUEST['exam_category'];
      $insertdata->createdtime=time();
      switch ($cityaction) {
        case "state":  
        $insertdata->state_id=$examcity['1'];
          break;
        case "city":
        $rdata=$DB->get_record_sql("SELECT * FROM {exam_city} where `id`='".$examcity['1']."'");
        $insertdata->city_id=$examcity['1'];
        $insertdata->state_id=$rdata->state_id;
          break;
        case "district":
        $rdata=$DB->get_record_sql("SELECT * FROM {exam_district} where `id`='".$examcity['1']."'");
        $insertdata->state_id=$rdata->state_id;
        $insertdata->district_id=$examcity['1'];
          break;     
      }
     $DB->insert_record('exam_listing', $insertdata,true); 
     
      
    }

}





if($_REQUEST['action']=="createproduct")
{

  $examcitydata=json_decode($_REQUEST['examcitydata']);
  $topbar_slider=new stdClass();
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
 $topbar_slider->offer=$_REQUEST['offer'];
 $topbar_slider->quiz_type=$_REQUEST['quiz_type'];
$topbar_slider->duedate=strtotime($_REQUEST['duedate']);
$topbar_slider->question=$_REQUEST['question'];
$topbar_slider->qmark=$_REQUEST['qmark'];
$topbar_slider->mark=$_REQUEST['mark'];
$topbar_slider->qumark=$_REQUEST['qumark'];
$topbar_slider->minute=$_REQUEST['minute'];
$topbar_slider->qminute=$_REQUEST['qminute'];
$topbar_slider->postid=$_REQUEST['postid'];
$topbar_slider->moodleurl=$_REQUEST['moodleurl'];
$topbar_slider->price=$_REQUEST['price'];
$topbar_slider->createdtime=time();
   $mooldleinsertID=$DB->insert_record('searchda_quiz', $topbar_slider,true);
  if(!empty($examcitydata)){
    foreach ($examcitydata as $value) {
      $examcity=explode("-",$value);
      $cityaction=$examcity['0'];
      $insertdata=new stdClass();
      $insertdata->exam_table="searchda_quiz";
      $insertdata->exam_id=$mooldleinsertID;
      $insertdata->action_country=$examcity['0'];
      $insertdata->exam_categoryid=$_REQUEST['exam_category'];
      $insertdata->createdtime=time();
      switch ($cityaction) {
        case "state":  
        $insertdata->state_id=$examcity['1'];
          break;
        case "city":
        $rdata=$DB->get_record_sql("SELECT * FROM {exam_city} where `id`='".$examcity['1']."'");
        $insertdata->city_id=$examcity['1'];
        $insertdata->state_id=$rdata->state_id;
          break;
        case "district":
        $rdata=$DB->get_record_sql("SELECT * FROM {exam_district} where `id`='".$examcity['1']."'");
        $insertdata->state_id=$rdata->state_id;
        $insertdata->district_id=$examcity['1'];
          break;     
      }
     $DB->insert_record('exam_listing', $insertdata,true); 
    }
  }else{
      $insertdata=new stdClass();
      $insertdata->exam_table="searchda_quiz";
      $insertdata->exam_id=$mooldleinsertID;
      $insertdata->action_country='India';
      $insertdata->exam_categoryid=$_REQUEST['exam_category'];
      $insertdata->createdtime=time();
      $DB->insert_record('exam_listing', $insertdata,true); 
    }


}


if($_REQUEST['action']=="updateproduct")
{
  $topbar_slider=new stdClass();
 $topbar_slider->id=$_REQUEST['id'];
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
 $topbar_slider->offer=$_REQUEST['offer'];
 $topbar_slider->quiz_type=$_REQUEST['quiz_type'];
$topbar_slider->duedate=strtotime($_REQUEST['duedate']);
$topbar_slider->question=$_REQUEST['question'];
$topbar_slider->qmark=$_REQUEST['qmark'];
$topbar_slider->mark=$_REQUEST['mark'];
$topbar_slider->qumark=$_REQUEST['qumark'];
$topbar_slider->minute=$_REQUEST['minute'];
$topbar_slider->qminute=$_REQUEST['qminute'];
$topbar_slider->postid=$_REQUEST['postid'];
$topbar_slider->moodleurl=$_REQUEST['moodleurl'];
$topbar_slider->price=$_REQUEST['price'];
$topbar_slider->modifiedtime=time();

   $DB->update_record('searchda_quiz', $topbar_slider,true);

  $udata=$DB->get_records_sql("SELECT * FROM {exam_listing} where `exam_id`='".$_REQUEST['id']."' and `exam_table`='searchda_quiz'"); 
  if(!empty($udata)){
    foreach ($udata as $value) {
    $updateexam=new stdClass();
    $updateexam->id=$value->id;
    $updateexam->exam_categoryid=$_REQUEST['exam_category'];
    $DB->update_record('exam_listing', $updateexam,true);
  }

}else{
    $updateexam=new stdClass();
    $updateexam->exam_table='searchda_quiz';
    $updateexam->exam_id=$_REQUEST['id'];
    $updateexam->action_country="India";
    $updateexam->action_country="India";
    $updateexam->createdtime=time();
    $updateexam->exam_categoryid=$_REQUEST['exam_category'];
    $DB->insert_record('exam_listing', $updateexam,true);
}
  
   $examcitydata=json_decode($_REQUEST['examcitydata']);
   $oldexamcity=json_decode($_REQUEST['oldexamcity']);
   
   $result=array_diff($oldexamcity,$examcitydata);
   foreach ($result as $value) {
      $examcity=explode("-",$value);
      $cityaction=$examcity['0'];
      if($value=='India'){
        $idata=$DB->get_record_sql("SELECT * FROM {exam_listing} where `action_country`='India' and `exam_id`='".$_REQUEST['id']."' and `exam_table`='searchda_quiz'");  
        $DB->delete_records('exam_listing',array('id'=>$idata->id));
      }
      switch ($cityaction) {
        case "state":
        $sdata=$DB->get_record_sql("SELECT * FROM {exam_listing} where `action_country`='state' and `exam_id`='".$_REQUEST['id']."' and `state_id`='".$examcity['1']."' and `exam_table`='searchda_quiz'");  
        $DB->delete_records('exam_listing',array('id'=>$sdata->id));
          break;
        case "city":
        $cdata=$DB->get_record_sql("SELECT * FROM {exam_listing} where `action_country`='city' and `exam_id`='".$_REQUEST['id']."'  and `city_id`='".$examcity['1']."' and `exam_table`='searchda_quiz'");  
        $DB->delete_records('exam_listing',array('id'=>$cdata->id));
          break;
        case "district":
        $ddata=$DB->get_record_sql("SELECT * FROM {exam_listing} where `action_country`='district' and `exam_id`='".$_REQUEST['id']."'  and `district_id`='".$examcity['1']."' and `exam_table`='searchda_quiz'");  
        $DB->delete_records('exam_listing',array('id'=>$ddata->id));
          break;     
      }
    }

    $newresult=array_diff($examcitydata,$oldexamcity);
// echo "new";
// print_r($newresult);
foreach ($newresult as $value) {
        if($value=='India'){
          $insertdata=new stdClass();
      $insertdata->exam_table="searchda_quiz";
      $insertdata->exam_id=$_REQUEST['id'];
      $insertdata->action_country='India';
      $insertdata->exam_categoryid=$_REQUEST['exam_category'];
      $insertdata->createdtime=time();
      $DB->insert_record('exam_listing', $insertdata,true); 
        }

      $examcity=explode("-",$value);
      $cityaction=$examcity['0'];
      $insertdata=new stdClass();
      $insertdata->exam_table="searchda_quiz";
      $insertdata->exam_id=$_REQUEST['id'];
      $insertdata->action_country=$examcity['0'];
      $insertdata->exam_categoryid=$_REQUEST['exam_category'];
      $insertdata->createdtime=time();
      switch ($cityaction) {
        case "state":  
        $insertdata->state_id=$examcity['1'];
          break;
        case "city":
        $rdata=$DB->get_record_sql("SELECT * FROM {exam_city} where `id`='".$examcity['1']."'");
        $insertdata->city_id=$examcity['1'];
        $insertdata->state_id=$rdata->state_id;
          break;
        case "district":
        $rdata=$DB->get_record_sql("SELECT * FROM {exam_district} where `id`='".$examcity['1']."'");
        $insertdata->state_id=$rdata->state_id;
        $insertdata->district_id=$examcity['1'];
          break;     
      }
     $DB->insert_record('exam_listing', $insertdata,true); 
     
      
    }

}



if($_REQUEST['action']=="exploreexam")
{



?>
<!--start- accordian -->


<?php   $dataquery = $DB->get_records('searchda_secondc',array('categoriesid'=>$_REQUEST['dataid'],'status'=>0));
        $i=0;
        $k=1;
        $l=1;
        $h=1;
        foreach ($dataquery as $value) {  
$r=$i++;
          ?>

    <div id="accordion<?= $value->id; ?>" class="accordion">
        <div class="card mb-0 car_d_p ">
            <div class="card-header  card_b <?php if($k++==1){ 
            }else{ echo 'collapsed'; } ?>" data-toggle="collapse" href="#collapseOne<?= $value->id; ?>">
                <a class="card-title"> <?= $value->title; ?>  </a>
            </div>
            <div id="collapseOne<?= $value->id; ?>" class="card-body <?php if($l++==1){ 
            }else{ echo 'collapse'; } ?>" data-parent="#accordion<?= $value->id; ?>">
              <div class="text_ma_n">
                <ul style="column-count: 3;">
<?php  

  $data = $DB->get_records_sql("SELECT st.*,scs.slug as thirdslug,scs.title as seotitle,scs.keywords as seokeywords,scs.author as seoauther,scs.description,scs.status as seostatus FROM {searchda_third} as st left join {searchda_categories_seo} as scs on st.id=scs.th_id WHERE st.subid='".$value->id."' and st.status='0'");


// $data = $DB->get_records('searchda_third',array('subid'=>$value->id,'status'=>0));
       $m=0;
        foreach ($data as $val) {  
$m=$i++;
$seodata=$DB->get_record_sql("select scs.slug as secondslug,scf.slug as firstslug from {searchda_categories_secondseo} as scs
left join mo_searchda_categories_firstseo as scf on scs.first_id=scf.first_id
 where scs.second_id='".$val->subid."'");
          ?><li> <a href="<?php echo $CFG->wwwroot.'/exam/'.$seodata->firstslug.'/'.$seodata->secondslug.'/'.$val->thirdslug?>"><?php echo $val->title; ?></a></li>
                  <?php } ?>  
<?php if(empty($m)){ 
}
?>
<div class="clear"></div>
                </ul>
              </div>
            </div>        
        </div>
    </div>
<?php
}

if(empty($r)){

  //echo "<span style='color:red'>Data not available </span>";
}
}


if($_REQUEST['action']=="datasearch")
{

$alldata=$DB->get_records_sql("SELECT th.id,th.title,sc.title as sectitle,scs.slug as thirdslug,th.subid FROM {searchda_third} as th left join {searchda_categories_seo} as scs on th.id=scs.th_id inner join {searchda_secondc} as sc on th.subid=sc.id WHERE th.title LIKE '".$_POST['title']."%'");
if(!empty($alldata)){
echo "<ul class='mydatas'>";
foreach ($alldata as $value) {
$seodata=$DB->get_record_sql("select scs.slug as secondslug,scf.slug as firstslug from {searchda_categories_secondseo} as scs
left join mo_searchda_categories_firstseo as scf on scs.first_id=scf.first_id
 where scs.second_id='".$value->subid."'");
echo "<li class='dataclass'><a href='".$CFG->wwwroot."/exam/".$seodata->firstslug."/".$seodata->secondslug."/".$value->thirdslug."'>".$value->title." <small>(".$value->sectitle.")<small> </li>";
}

echo "</ul>";
}else{
  echo"<p class='nodata'>Sorry Data not available</p>";
}

  }

  if($_REQUEST['action']=="datainternal")
{


$checkmoodle=$DB->get_record($_POST['base'],array('id'=>$_POST['baseid']));
$quizurl=parse_url($checkmoodle->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$atemdata=$DB->get_record('course_modules',array('id'=>$course_module));

if(!empty($atemdata)){

  $endtime=strtotime("+6 months");
enrolCourse($atemdata->course,$_POST['userid'],'5',$endtime,time());





        $qdata=new stdClass();
        $qdata->userid=$_POST['userid'];
        $qdata->base=$_POST['base'];
        $qdata->baseid=$_POST['baseid'];
        $qdata->postid=$_POST['postid'];
        $qdata->payment_type="free";
        $qdata->createdtime=time();
        $data=$DB->get_record('searchda_complte_payment',array('userid'=>$_POST['userid'],'base'=>$_POST['base'],'baseid'=>$_POST['baseid'],'postid'=>$_POST['postid'],'payment_type'=>"free"));
        if(empty($data)){
        $DB->insert_record('searchda_complte_payment', $qdata,true);
        }



}





echo "sucessfully";
}



function enrolCourse($courseid, $userid, $roleid,$endtime,$startime) {
    global $DB, $CFG;
    $query = 'SELECT * FROM {enrol} WHERE enrol = "manual" AND courseid = '.$courseid;
    $enrollmentID = $DB->get_record_sql($query);
    if(!empty($enrollmentID->id)) {
        if (!$DB->record_exists('user_enrolments', array('enrolid'=>$enrollmentID->id, 'userid'=>$userid))) {
            $userenrol = new stdClass();
            $userenrol->status = 0;
            $userenrol->userid = $userid;
            $userenrol->enrolid = $enrollmentID->id;
            $userenrol->timestart  = $startime;
            $userenrol->timeend = $endtime;
            $userenrol->modifierid  = 2;
            $userenrol->timecreated  = time();
            $userenrol->timemodified  = time();
            //print_r($userenrol);die;
            $enrol_manual = enrol_get_plugin('manual');
            $enrol_manual->enrol_user($enrollmentID, $userid, $roleid, $userenrol->timestart, $userenrol->timeend);
            // add_to_log($courseid, 'course', 'enrol', '../enrol/users.php?id='.$courseid, $courseid, $userid);
             //there should be userid somewhere!
            //redirect('http://lln.axisinstitute.edu.au/my');
        } else {
            $oldenroll = $DB->get_record('user_enrolments', array('enrolid'=>$enrollmentID->id, 'userid'=>$userid));
            $oldenroll->timestart = $startime;
            $oldenroll->timeend = $endtime;
            if($oldenroll){
                $insertRecords=$DB->update_record('user_enrolments', $oldenroll);
            }
        }
    }
}