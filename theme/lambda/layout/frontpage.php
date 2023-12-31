<?php
   // This file is part of Moodle - http://moodle.org/
   
   //
   
   // Moodle is free software: you can redistribute it and/or modify
   
   // it under the terms of the GNU General Public License as published by
   
   // the Free Software Foundation, either version 3 of the License, or
   
   // (at your option) any later version.
   
   //
   
   // Moodle is distributed in the hope that it will be useful,
   
   // but WITHOUT ANY WARRANTY; without even the implied warranty of
   
   // MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   
   // GNU General Public License for more details.
   
   //
   
   // You should have received a copy of the GNU General Public License
   
   // along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
   
   
   
   /**
   
    *
   
    * @package   theme_lambda
   
    * @copyright 2020 redPIthemes
   
    *
   
    */
   if (isloggedin()){
      if (!is_siteadmin()) { 
     global $DB;
     $dataavl=$DB->get_record('role_assignments',array('userid'=>$USER->id));
   if(empty($dataavl)){
       redirect($CFG->wwwroot."/blocks/searchdashboard/index.php");
   }else{
       $dataavll=$DB->get_record('role_assignments',array('roleid'=>'5','userid'=>$USER->id));
       if(!empty($dataavll)){
               redirect($CFG->wwwroot."/blocks/searchdashboard/index.php");
       }
   } 
   }
   }
   
   $lambda_body_attributes = 'has-region-side-pre has-region-side-post';
   
   $hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
   
   if ($hassidepre) {$lambda_body_attributes .= ' used-region-side-pre';} else {$lambda_body_attributes .= ' empty-region-side-pre';}
   
   $hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
   
   if ($hassidepost) {$lambda_body_attributes .= ' used-region-side-post';} else {$lambda_body_attributes .= ' empty-region-side-post';}
   
   $blockstyle = theme_lambda_get_setting('block_style');
   
   if ($blockstyle == 0) {$lambda_body_attributes .= ' blockstyle-01';}
   
   if ($blockstyle == 1) {$lambda_body_attributes .= ' blockstyle-02';}
   
   if ($blockstyle == 2) {$lambda_body_attributes .= ' blockstyle-03';}
   
   
   
   $hasfrontpageblocks = ($PAGE->blocks->region_has_content('side-pre', $OUTPUT) || $PAGE->blocks->region_has_content('side-post', $OUTPUT));
   
   $carousel_pos = $PAGE->theme->settings->carousel_position;
   
   $pagewidth = $PAGE->theme->settings->pagewidth;
   
   $standardlayout = FALSE;
   
   if ($PAGE->theme->settings->block_layout == 1) {$standardlayout = TRUE;}
   
   $sidebar = FALSE;
   
   if ($PAGE->theme->settings->block_layout == 2) {$sidebar = TRUE;}
   
   if (($sidebar) && ($PAGE->blocks->region_has_content('side-pre', $OUTPUT) == FALSE) && (strpos($OUTPUT->body_attributes(), 'editing') == FALSE)) {$sidebar = FALSE;}
   
   if ($sidebar) {theme_lambda_init_sidebar($PAGE); $sidebar_stat = theme_lambda_get_sidebar_stat(); $lambda_body_attributes .= ' sidebar-enabled '.$sidebar_stat;}
   
   
   
   if (right_to_left()) {
   
       $regionbsid = 'region-bs-main-and-post';
   
   } else {
   
       $regionbsid = 'region-bs-main-and-pre';
   
   }
   echo $OUTPUT->doctype() ?><html <?php echo $OUTPUT->htmlattributes(); ?>><head><title><?php echo $OUTPUT->page_title(); ?></title><link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" /><?php if (isloggedin()){
         ?><?php echo $OUTPUT->standard_head_html() ?><?php }
         if (!isloggedin()){
             ?><meta content="width=device-width,initial-scale=1"name="viewport"><link href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/bootstrapmin.css" rel="stylesheet" type="text/css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/bootstrapmin.js"></script><link href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" rel="stylesheet" type="text/css"><link href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/explore_exam.css" rel="stylesheet" type="text/css"><link href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/owl_crosuel_min.css" rel="stylesheet" type="text/css"><script src="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/owl_carousel_min.js"></script><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><script async src="https://www.googletagmanager.com/gtag/js?id=G-DR39V5ZQT0"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'G-DR39V5ZQT0');</script><?php } ?>
      <?php
         if (isloggedin()){  ?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <noscript>
         <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/style/nojs.css" />
      </noscript>
      <!-- Google web fonts -->
      <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
      <?php }  ?></head><body <?php echo $OUTPUT->body_attributes("$lambda_body_attributes"); ?>><?php if (!isloggedin()){
         ?><?php require_once("home.php"); ?>
<?php } ?>
<?php if (isloggedin()){ 
   echo $OUTPUT->standard_top_of_body_html(); ?>
<?php if ($sidebar) { ?>
<div id="sidebar" class="">
   <?php echo $OUTPUT->blocks('side-pre');?>
   <div id="sidebar-btn"><span></span><span></span><span></span></div>
</div>
<?php } ?>
<div id="wrapper">
   <?php require_once(dirname(__FILE__).'/includes/header.php'); ?>
   <?php require_once(dirname(__FILE__).'/includes/slideshow.php'); ?>
   <div id="page" class="container-fluid">
      <div id ="page-header-nav" class="clearfix"> </div>
      <div id="page-content" class="row-fluid">
         <?php if ($hasfrontpageblocks==1) { ?>
         <div id="<?php echo $regionbsid ?>" class="span9">
            <div class="row-fluid">
               <?php if ($standardlayout) { ?>
               <section id="region-main" class="span8 pull-right">
               <?php } else { ?>
               <section id="region-main" class="span8">
               <?php } ?>
               <?php } else { ?>
               <div id="<?php echo $regionbsid ?>">
                  <div class="row-fluid">
                     <section id="region-main" class="span12">
                        <?php } 
                           require_once($CFG->dirroot.'/blocks/userdashboard/frontpage.php'); 
                           
                                            echo $OUTPUT->course_content_header();
                           
                                            if ($carousel_pos=='0') require_once(dirname(__FILE__).'/includes/carousel.php');
                           
                                            echo $OUTPUT->main_content();
                           
                                            echo $OUTPUT->course_content_footer();
                           
                                            if ($carousel_pos=='1') require_once(dirname(__FILE__).'/includes/carousel.php');
                           
                                        ?>
                     </section>
                     <?php
                        if ($hasfrontpageblocks==1) { 
                        
                        if ($standardlayout) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-left');}
                        
                        else if (!$sidebar) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-right');}
                        
                        } ?>
                  </div>
               </div>
               <?php echo $OUTPUT->blocks('side-post', 'span3'); ?>
            </div>
            <?php if (is_siteadmin()) { ?>
            <div class="hidden-blocks">
               <div class="row-fluid">
                  <h4><?php echo get_string('visibleadminonly', 'theme_lambda') ?></h4>
                  <?php
                     echo $OUTPUT->blocks('hidden-dock');
                     
                     ?>
               </div>
            </div>
            <?php } ?>
            <a href="#top" class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i><span class="lambda-sr-only"><?php echo get_string('back'); ?></span></a>
         </div>
         <?php if ($CFG->version >= 2018120300) {echo $OUTPUT->standard_after_main_region_html();} ?>
         <footer id="page-footer" class="container-fluid">
            <?php require_once(dirname(__FILE__).'/includes/footer.php'); echo $OUTPUT->login_info();?>
         </footer>
      </div>
   </div>
</div>
<?php echo $OUTPUT->lambda_footer_scripts(); ?>
<?php if ($hasslideshow) {echo $OUTPUT->lambda_fp_slideshow();} ?>
<?php if ($hascarousel) {echo $OUTPUT->lambda_fp_carousel();} ?>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
<script></script>
<script src="https://kit.fontawesome.com/yourcode.js"></script>
<?php } ?>
<?php if (!is_siteadmin()) { ?><span style="display: none;" ><?php echo $OUTPUT->main_content(); ?></span><script src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/js/customhome.js"></script></body></html>
<?php }else{ } ?>
</body>
</html>