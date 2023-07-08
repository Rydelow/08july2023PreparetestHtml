<?php require_once("../../config.php");
   global $DB, $OUTPUT, $PAGE, $USER,$CFG;
   $id = optional_param('id', '0', PARAM_INT);
   	
$alldata = $DB->get_record_sql("select st.id,st.title,ss.id as ssid,sc.id as fid, ss.title as sstitle,sc.title as ctitle from {searchda_third} as st INNER JOIN {searchda_secondc} as ss on st.subid=ss.id inner join {searchda_categories} as sc on ss.categoriesid=sc.id WHERE st.id=$id ");
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
<style type="text/css">
</style>
<!-- script-exam -->
<header class="bg-dark-blue">
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
<?php   $topbardataone = $DB->get_record('customhmp_top_bar',array('id'=>'1')); 
   $topbardatatwo = $DB->get_record('customhmp_top_bar',array('id'=>'2')); 
   
   ?>
<div class="container">
   <nav class="navbar navbar-light justify-content-between">
      <a class="navbar-brand" href="http://preparetest.com/"><img src="http://preparetest.com/blocks/customhomepage/assets/logo.svg"> </a>
      <ul class="nav navbar-right loc">
         <li class="nav-item item-flex"><a class="nav-link"><img src="http://preparetest.com/theme/lambda/layout/image/Icon feather-phone-call.svg"> <?= $topbardataone->content_one; ?><br><?= $topbardataone->content_two; ?></a>
         </li>
         <li class="item-flex"><a class="nav-link" ><img src="http://preparetest.com/theme/lambda/layout/image/Icon%20feather-map-pin.svg"><?= $topbardatatwo->content_one; ?></a></li>
         <li class=" user"><a class="nav-link pr-0" href="<?php echo $CFG->wwwroot."/login/index.php"; ?>"><i class="fas fa-user-tie mr-2"></i> <span class="login">Login / Register </span><img src="http://preparetest.com/theme/lambda/layout/image/Search.svg" class="float-right"></a> </li>
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
   </div>
</section>
<!--middel-sec-->
<!-- top-nav -->
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

<?php $headerdataa = $DB->get_record('searchda_header',array('thid'=>$id)); ?>
<div class="TS_head_bg" style="background-image:url('https://testseries.edugorilla.com/static/images/L0_Images/528.png">
   <div class="container">
      <div class="row exam_course_details">
         <h1 class="exam_course_heading"><?= $alldata->title; ?></h1>
         <div class="col-xs-4 col-sm-4 col-md-4 tst_user_exam_nob tst_user_exam_seprator">
            <b  class="ng-binding"><?php if(!empty($headerdataa->digitone)){ echo $headerdataa->digitone; }else{ echo"70"; } ?></b>
            <p  ng-show="show_quizes_section" class="ng-binding" style=""><?php if(!empty($headerdataa->titleone)){ echo $headerdataa->titleone; }else{ echo"Tests and Quizzes"; } ?></p>
         </div>
         <div class="col-xs-4 col-sm-4 col-md-4 tst_user_exam_nob tst_user_exam_seprator">
            <b  class="ng-binding"><?php if(!empty($headerdataa->digitone)){ echo $headerdataa->digittwo; }else{ echo"4,08,826"; } ?></b>
            <p  class="ng-binding"><?php if(!empty($headerdataa->titletwo)){ echo $headerdataa->titletwo; }else{ echo"Tests Taken"; } ?></p>
         </div>
         <div class="col-xs-4 col-sm-4 col-md-4 tst_user_exam_nob">
           <div class="st_udent">
            <?php if (is_siteadmin()) { ?>
             <a class="eddit" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/header_edit.php?id=<?php echo $id; ?>"><i class="fas fa-pencil "></i></a> <?php } ?>
            <b  class="ng-binding"><?php if(!empty($headerdataa->digitthree)){ echo $headerdataa->digitthree; }else{ echo"53,910"; } ?></b>
            <p  class="ng-binding"><?php if(!empty($headerdataa->titlethree)){ echo $headerdataa->titlethree; }else{ echo"Students"; } ?></p>
         </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 Ts_freeTest_link">
            <span  id="start_free_test" class="btn btn-primary center-block test_series_signup_btn ">Start free test</span> 
         </div>
      </div>
   </div>
</div>
<!-- top-banner -->
<!-- test-queze -->
<?php $headerbottomdata = $DB->get_record('searchda_headerbottom',array('thid'=>$id));
?>

<section class="quizz">
   <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="quiz_heading mb-5">
           <a style="text-decoration: none;" class="ng-binding "><?php if(!empty($headerbottomdata->title)){ echo$headerbottomdata->title;}else{ echo "Quizzes"; } ?>
            <?php if (is_siteadmin()) { ?>
            <span><a class="A_dd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/header_bottom_edit.php?id=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></span>
            <span class="pull-right mt-1"> <a class="E_dd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/add_quiz.php?id=<?php echo $id; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></span>
               <?php } ?>
             </a>
         </div>
        </div>

        <?php $quizdata=$DB->get_records('searchda_quiz',array('thid'=>$id));
if(count($quizdata)>4){
?>
         <div class="col-md-12">
            <div class="test_quizz">
               <div class="carousel-wrap">
                  <div class="owl-carousel">
                      <?php foreach ($quizdata as $value) { ?>
                     <div class="item">
                        <div class="quiz_cover ng-scope slick-slide slick-current slick-active"   >
                           <div  class="quizzes">
                              <div class="quiz_details">
                                 <div class="quiz_name">
                                    <div style="flex: none; float: left;">
                                       <h4 id="quiz_heading_name"  class="ng-binding"><?=$value->title; ?></h4>
                                       <h4 id="quiz_heading_name" class="ng-binding"> (<?= date("d-M-Y",$value->duedate); ?>)</h4>
                                    </div>
                                    <div class="timer_image" style="float: right;">
                                       <?php if (is_siteadmin()) { ?>
                                       <a  href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/add_quiz.php?id=<?php echo $id; ?>&cid=<?php echo $value->id; ?>"><i class="fas fa-pencil pen"></i></a> <?php } ?>
                                       <i class="fas fa-clock"></i>
                                    </div>
                                 </div>
                                 <div class="quiz_time_mark_count">
                        <p><span class="ng-binding"><?=$value->question; ?></span><span class="ng-binding"><?=$value->qmark; ?></span></p>
                                    <p><span class="ng-binding"><?=$value->mark; ?></span><span class="ng-binding"><?=$value->qumark; ?></span></p>
                                    <p><span class="ng-binding"><?=$value->minute; ?></span><span class="ng-binding"><?=$value->qminute; ?> </span></p>
                                 </div>
                              </div>
                              <div class="start_quiz">
                                 <p   class="start_quiz_p"><a   class="start_test_btn ng-binding" href="" >Start Test</a></p>
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
            <div class="quizzes_kit">
                              <div class="quiz_details">
                                 <div class="quiz_name">
                                    <div style="flex: none; float: left;">
                                       <h4 id="quiz_heading_name" class="ng-binding"><?=$value->title; ?></h4>
                                       <h4 id="quiz_heading_name" class="ng-binding"> (<?= date("d-M-Y",$value->duedate); ?>)</h4>
                                    </div>
                                    <div class="timer_image" style="float: right;">
                                       <?php if (is_siteadmin()) { ?>
                                       <a  href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/add_quiz.php?id=<?php echo $id; ?>&cid=<?php echo $value->id; ?>"><i class="fas fa-pencil pen"></i></a> <?php } ?>
                                                                              <i class="fas fa-clock"></i>
                                    </div>
                                 </div>
                                 <div class="quiz_time_mark_count">
                                    <p><span class="ng-binding"><?=$value->question; ?></span><span class="ng-binding"><?=$value->qmark; ?></span></p>
                                    <p><span class="ng-binding"><?=$value->mark; ?></span><span class="ng-binding"><?=$value->qumark; ?></span></p>
                                    <p><span class="ng-binding"><?=$value->minute; ?></span><span class="ng-binding"><?=$value->qminute; ?> </span></p>
                                 </div>
                              </div>
                              <div class="start_quiz">
                                 <p class="start_quiz_p"><a class="start_test_btn ng-binding" href="">Start Test</a></p>
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
<!-- test-queze -slider end-->
<!-- test-section -->
<?php $test_heading = $DB->get_record('searchda_test_heading',array('thid'=>$id)); ?>
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
                foreach ($testdata as $value) {
                   ?>
                  <li class="ng-scope_s active" style="" data-test="<?=$value->id; ?>"><a  class="ng-binding"><?=$value->title; ?></a>
                      <?php if (is_siteadmin()) { ?>
                      <span class=" h_icon">
                     <a class="edd" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/test_edit.php?id=<?php echo $id; ?>&cid=<?php echo $value->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                     <a class="add" href=""><i class="fa <?php if($value->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>
                      <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
         <div class="col-md-9	">
            <!-- left_side -->
            <div class="left_side mt-3">
               <div class="exam_course_test_section">
                  <div class="getTs_About_div" id="TS_exam_testSeries">
                     <h2 class="getTs_AbtHeading ng-binding" ng-bind="sub_data.name">Mock Tests</h2>
                  </div>
                  <div class="course_se">
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_startBg" >
                        <div class="exam_course_test_paper">
                           <div class="exam_course_test_paper_name">
                              <h3  class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span  class="ng-binding">100</span> <span  class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span  class="ng-binding">Marks</span>&nbsp;|&nbsp;<span  class="ng-binding">120 Min </span></p>
                           </div>
                           <div class="exam_course_test_paper_start " ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding "  >E</span>
                                 <span class="new_abc ng-binding " >ह</span>
                              </p>
                              <a class="ng-binding " href="">Start Test</a>
                           </div>
                        </div>
                     </div>
                     <!-- start -->
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_UnlockBg" >
                        <div class="exam_course_test_paper">
                           <div class="exam_course_test_paper_name">
                              <h3  class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span  class="ng-binding">100</span> <span  class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span  class="ng-binding">Marks</span>&nbsp;|&nbsp;<span  class="ng-binding">120 Min </span></p>
                           </div>
                           <div class="exam_course_test_paper_start " ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding "  >E</span>
                                 <span class="new_abc ng-binding " >ह</span>
                              </p>
                              <a class="ng-binding " href=""> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                           </div>
                        </div>
                     </div>
                     <!-- start -->
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_UnlockBg" >
                        <div class="exam_course_test_paper">
                           <div class="exam_course_test_paper_name">
                              <h3  class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span  class="ng-binding">100</span> <span  class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span  class="ng-binding">Marks</span>&nbsp;|&nbsp;<span  class="ng-binding">120 Min </span></p>
                           </div>
                           <div class="exam_course_test_paper_start " ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding "  >E</span>
                                 <span class="new_abc ng-binding " >ह</span>
                              </p>
                              <a class="ng-binding " href=""> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                           </div>
                        </div>
                     </div>
                     <!-- start -->
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_UnlockBg" >
                        <div class="exam_course_test_paper">
                           <div class="exam_course_test_paper_name">
                              <h3  class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span  class="ng-binding">100</span> <span  class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span  class="ng-binding">Marks</span>&nbsp;|&nbsp;<span  class="ng-binding">120 Min </span></p>
                           </div>
                           <div class="exam_course_test_paper_start " ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding "  >E</span>
                                 <span class="new_abc ng-binding " >ह</span>
                              </p>
                              <a class="ng-binding " href=""> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                           </div>
                        </div>
                     </div>
                     <!-- start -->
                  </div>
              

<!-- cossapse -->
<div class="wrapper center-block course_se colla_pse">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
    
  <div class="panel panel-default">
    <div class="panel-heading bo_t_collapse" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed pb-0" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
             <div class="TS_free_ribbon ng-scope" ng-if="sub.free>0 &amp;&amp; !sub_data.package_bought">
         <span class="TS_free_content"><span  class="ng-binding">1</span> <span class="ng-binding">Free Test</span>
         <br></span>
          </div>
           <div class="ac_text mt-3">
           <p>UP Police SI Mock Tests</p>
           <span>8 Test Papers</span>
        </div>
        </a>
      </h4>
    </div>
    <div id="collapseThree " class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <div class="course_se">
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_startBg">
                        <div class="exam_course_test_paper">
                           <div class="exam_course_test_paper_name">
                              <h3 class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span class="ng-binding">100</span> <span class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span class="ng-binding">Marks</span>&nbsp;|&nbsp;<span class="ng-binding">120 Min </span></p>
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
                           <div class="exam_course_test_paper_name">
                              <h3 class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span class="ng-binding">100</span> <span class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span class="ng-binding">Marks</span>&nbsp;|&nbsp;<span class="ng-binding">120 Min </span></p>
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
                     <!-- start -->
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_UnlockBg">
                        <div class="exam_course_test_paper">
                           <div class="exam_course_test_paper_name">
                              <h3 class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span class="ng-binding">100</span> <span class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span class="ng-binding">Marks</span>&nbsp;|&nbsp;<span class="ng-binding">120 Min </span></p>
                           </div>
                           <div class="exam_course_test_paper_start " ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding ">E</span>
                                 <span class="new_abc ng-binding ">ह</span>
                              </p>
                              <a class="ng-binding " href=""> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                           </div>
                        </div>
                     </div>
                     <!-- start -->
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_UnlockBg">
                        <div class="exam_course_test_paper">
                           <div class="exam_course_test_paper_name">
                              <h3 class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p><span class="ng-binding">100</span> <span class="ng-binding">Question</span>d&nbsp;|&nbsp; <span class="ng-binding">100</span> <span class="ng-binding">Marks</span>&nbsp;|&nbsp;<span class="ng-binding">120 Min </span></p>
                           </div>
                           <div class="exam_course_test_paper_start " ng-if="paper[4] == 1">
                              <p class="lang_style">
                                 <span class="new_abc ng-binding ">E</span>
                                 <span class="new_abc ng-binding ">ह</span>
                              </p>
                              <a class="ng-binding " href=""> <i class="fa fa-lock" aria-hidden="true"></i>  Unlock</a>
                           </div>
                        </div>
                     </div>
                     <!-- start -->
                  </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- collapse -->



         <!-- exam_course_test_section-end -->

</div>

<!-- collapse -->
            </div>
            <!-- left_side -end-->
         </div>
      </div>
   </div>
</section>
<!-- test-section -->
<!--middel-sec-->
<?php $footer_data = $DB->get_record('customhmp_footer_sec',array('id'=>'1')); 
   ?>
<footer class="bg-prepare mt-5 pt-5 pb-4">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="footer-content">
               <div class="footer-logo text-white">
                  <img src="http://preparetest.com/blocks/customhomepage/assets/bottom_logo.svg" class="img-fluid">
                  <div class="footer-caption pt-3">
                     <?php $sug=array(unserialize($footer_data->footer_content));
                        foreach ($sug as $vall){ $footerdesc= $vall['text'];}
                        echo $footerdesc;  ?> 
                  </div>
               </div>
               <div class="footer-social">
                  <ul>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/fb_footer.svg"></a></li>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/twitter_footer.svg"></a></li>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/insta_footer.svg"></a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="address text-white">
               <span>Address</span>
               <div class="address-list pt-3">
                  <ul>
                     <li> <a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/map.svg"><?= $footer_data->location; ?></a></li>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/phone.svg"> <?= $footer_data->phone; ?></a></li>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/Icon%20ionic-ios-mail.svg"> <?= $footer_data->email; ?></a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="footer-links text-white">
               <span>Quick links</span>
               <div class="quick_list pt-3">
                  <ul>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Home </a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">About Us</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Features</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Blogs</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Forums</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Pricing</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Contact Us</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <hr class="border-top pt-2 pb-2">
      <div class="copyright-text text-white text-center w-100">
         <span>Copyright 2021 PrepareTest. All Rights Reserved.</span>
      </div>
   </div>
</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
   jQuery(document).ready(function( $ ) {
   	$('.counter').counterUp({
   		delay: 10,
   		time: 1000
   	});
   
   });
   
   
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
<script type="text/javascript">
   $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 5,
    nav: true,
    navText: [
      "<i class='fa fa-caret-left'></i>",
      "<i class='fa fa-caret-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
   })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script >
   
$(document).ready(function(){

$("#start_free_test").click(function() { 

    $('html, body').animate({
      scrollTop:eval($('#free_test').offset().top - 50)
    }, 800);
});
$(".ng-scope_s").click(function() { 
$('.ng-scope_s').removeClass('active');
$(this).addClass('active');
  alert('alert'); 
});


});
</script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>





<script type="text/javascript">
    $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="http://preparetest.com/theme/lambda/layout/js/jquery.counterup.min.js"></script>
<!-- eaxm-point -->