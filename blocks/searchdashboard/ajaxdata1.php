<?php 
require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;

if($_REQUEST['action']=="quizdata")
{
  $id=$_REQUEST['catequizid'];
  $thid=$_REQUEST['thid'];
  $testdata=$DB->get_record('searchda_test',array('id'=>$id,'thid'=>$thid));
?>
 <!-- loder -->
                  <div class="getTs_About_div" id="TS_exam_testSeries">
                     <h2 class="getTs_AbtHeading ng-binding" ng-bind="sub_data.name"><?php echo $testdata->title; ?>
                        <a class="E_di_t" href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                         <a class="A_dd pull-right" href=""><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                     </h2>
                  </div>
                  <div class="course_se">
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_startBg" >
                        <div class="exam_course_test_paper">
                           <!-- edite-icon -->
                            <div class=" h_icon sl_i_der test">
                                       <a class="edd"  href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/add_quiz.php?id=<?php echo $id; ?>&cid=<?php echo $value->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                               <!-- edite-icon -->



                           <div class="exam_course_test_paper_name">
                              <h3  class="ng-binding">ITI Electrician / Fitter Mock Test - 1</h3>
                              <p class="mb-0"><span  class="ng-binding">100</span> <span  class="ng-binding">Question</span>d &nbsp;|&nbsp; <span class="ng-binding">100</span> <span  class="ng-binding">Marks</span>&nbsp;|&nbsp;<span  class="ng-binding">120 Min </span></p>
                             <p  class="mb-2 mt-2">
                                 <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i>.</strong>  <strong style="font-size: 25px;color: #f74f02;">400</strong></span>
                              </p>

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
                                  <p  class="mb-2 mt-2">
                                 <span class="mr-0"><strong style="color: #212947;
                                     font-size: 24px;
                                     padding-right: 12px;
                                     padding-left: 8px;">Price</strong></span>
                                   <span><strong style="color: #45c35f;"><i class="fa fa-inr" aria-hidden="true"></i>.</strong>  <strong style="font-size: 25px;color: #f74f02;">400</strong></span>
                              </p>                           </div>
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

<div class="wrapper center-block mt-4 course_se colla_pse">

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <div class="panel panel-default">
    <a href="#">  <i class="fa fa-pencil test_pen" aria-hidden="true"></i>
         </a>
       <!-- edite-icon -->
                            <div class=" h_icon co_ap " style="display: none;">
                                       <a class="add_d" href=""><i class="fa fa-plus" aria-hidden="true"></i></a>
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                               <!-- edite-icon -->

         
    <div class="panel-heading  bo_t_collapse" role="tab" id="headingOne">

      <h4 class="panel-title">

         <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
   <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class="course_se">
         <p class="text-right mb-3"><a class="A_dd " href=""><i class="fa fa-plus" aria-hidden="true"></i> Add</a></p>
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_startBg">
                        <div class="exam_course_test_paper">
                                              <!-- edite-icon -->
                            <div class=" h_icon sl_i_der test">
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<!-- collapse2-start -->
<div class="course_se">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <div class="TS_free_ribbon ng-scope" ng-if="sub.free>0 &amp;&amp; !sub_data.package_bought">
         <span class="TS_free_content"><span  class="ng-binding">1</span> <span class="ng-binding">Free Test</span>
         <br></span>

          <a href="#">  <i class="fa fa-pencil test_pen" aria-hidden="true"></i>
         </a>
          </div>
   <div class="panel panel-default">
    <a href="#">  <i class="fa fa-pencil test_pen" style="top: 4px;left: 35%;" aria-hidden="true"></i>
         </a>
       <!-- edite-icon -->
                            <div class=" h_icon co_ap " style="display: none;">
                                       <a class="add_d" href=""><i class="fa fa-plus" aria-hidden="true"></i></a>
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                               <!-- edite-icon -->

         
    <div class="panel-heading  bo_t_collapse" role="tab" id="headingtow">

      <h4 class="panel-title">

         <a role="button" class="m-0" data-toggle="collapse" data-parent="#accordion" href="#collapsetow" aria-expanded="true" aria-controls="collapsetow">
           

 <div class="ac_text m-0">
           <p class="">UP Police SI Mock Tests</p>
           <span>8 Test Papers</span>
        </div>
        </a>
      </h4>
    </div>
   <div id="collapsetow" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingtow">
      <div class="panel-body">
        <div class="course_se">
         <p class="text-right mb-3"><a class="A_dd " href=""><i class="fa fa-plus" aria-hidden="true"></i> Add</a></p>
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_startBg">
                        <div class="exam_course_test_paper">
                                              <!-- edite-icon -->
                            <div class=" h_icon sl_i_der test">
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<!-- 3start -->
<div class="course_se">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <div class="panel panel-default">
    <a href="#">  <i class="fa fa-pencil test_pen" style="top: 4px;left: 35%;" aria-hidden="true"></i>
         </a>
       <!-- edite-icon -->
                            <div class=" h_icon co_ap " style="display: none;">
                                       <a class="add_d" href=""><i class="fa fa-plus" aria-hidden="true"></i></a>
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div>
                               <!-- edite-icon -->

         
    <div class="panel-heading  bo_t_collapse" role="tab" id="heading3">

      <h4 class="panel-title">

         <a role="button" class="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">

 <div class="ac_text m-0">
           <p class="">UP Police SI Mock Tests</p>
           <span>8 Test Papers</span>
        </div>
        </a>
      </h4>
    </div>
   <div id="collapse3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading3">
      <div class="panel-body">
        <div class="course_se">
         <p class="text-right mb-3"><a class="A_dd " href=""><i class="fa fa-plus" aria-hidden="true"></i> Add</a></p>
                     <!-- start -->
                     <div class="quest_paper_nobtabcontent hidden-content quest_paper_startBg">
                        <div class="exam_course_test_paper">
                                              <!-- edite-icon -->
                            <div class=" h_icon sl_i_der test">
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                                       <a class="edd" href="https://preparetest.com/blocks/searchdashboard/add_quiz.php?id=3&amp;cid=2"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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




if($_REQUEST['action']=="categoriescreateproduct")
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
 $DB->insert_record('searchda_ca_quiz', $topbar_slider,true);


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


}





if($_REQUEST['action']=="createproduct")
{
  $topbar_slider=new stdClass();
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
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
  $DB->insert_record('searchda_quiz', $topbar_slider,true);


}


if($_REQUEST['action']=="updateproduct")
{
  $topbar_slider=new stdClass();
 $topbar_slider->id=$_REQUEST['id'];
 $topbar_slider->thid=$_REQUEST['thid'];
 $topbar_slider->title=$_REQUEST['title'];
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
              	<ul>
<?php   $data = $DB->get_records('searchda_third',array('subid'=>$value->id,'status'=>0));
       $m=0;
        foreach ($data as $val) {  
$m=$i++;
        	?>


              		<li> <a href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/exam_explore.php?id=<?php echo $val->id; ?>"><?php echo $val->title; ?></a></li>
              		<?php } ?>	

<?php if(empty($m)){
	echo "<span style='color:red'>Data not available </span>";
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

	echo "<span style='color:red'>Data not available </span>";
}
}