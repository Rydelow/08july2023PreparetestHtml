<?php 
require('../../config.php');
global $DB,$CFG;
require_once($CFG->dirroot. '/course/renderer.php');
require_once($CFG->dirroot. '/theme/edumy/ccn/course_handler/ccn_course_handler.php');
require_once($CFG->dirroot. '/theme/edumy/ccn/block_handler/ccn_block_handler.php');

$lang = required_param('slang', PARAM_RAW);
$query = required_param('q' , PARAM_RAW);

$query = rtrim($query);

$PAGE->set_context(context_system::instance());
$PAGE->set_heading(get_string('youhavesearched', 'block_coursesearchlang', format_string($query)));
$PAGE->set_pagelayout('standard');
$PAGE->set_title(get_string('pluginname', 'block_coursesearchlang'));
$PAGE->set_url( new moodle_url('/blocks/coursesearchlang/search.php', array('lang' => $lang, 'q' => $query )));
echo $OUTPUT->header();

// Search form start again
$langs = get_string_manager()->get_list_of_translations();

if ($lang) {
    $currentlang = $lang;
}else{
    $currentlang = current_language();
}

$html  = '';
$html .= html_writer::start_tag('div' , array('class' => 'container' ));
$html .= html_writer::start_tag('form', array('action' => $CFG->wwwroot.'/blocks/coursesearchlang/search.php', 'method' => 'get' , 'class' => 'searchform' ));
$html .= html_writer::start_tag('div', array('class' => 'searchdiv' ));
$html .= html_writer::select($langs, 'slang', $currentlang, false, array());
$html .= html_writer::start_tag('input', array('name' => 'q', 'value' => $query, 'class' => 'searchforminput', 'placeholder' => get_string('placeholder', 'block_coursesearchlang') ));
$html .= html_writer::end_tag('input');
$html .= html_writer::start_tag('button', array('class' => 'searchbutton' , 'type' => 'submit' ));
$html .= html_writer::start_span('searchicon') . '<span class="flaticon-magnifying-glass"></span>' . html_writer::end_span();
$html .= html_writer::end_tag('button');
$html .= html_writer::end_tag('div');
$html .= html_writer::end_tag('form');
$html .= html_writer::end_tag('div');

echo $html;

// Search form end here.

// First check for category.
$catsql = "SELECT DISTINCT(id) FROM {course_categories} WHERE name LIKE '%".$query."%' or description LIKE '%".$query."%'";
$cats = $DB->get_records_sql($catsql);
$crscat = array();
$catcourses = array();
if (!empty($cats)) {
	foreach ($cats as $key => $cat) {
		array_push($crscat, $cat->id);
	}
}

// Get the courses by category.
if (!empty($crscat)) {
	$catcrssql = "SELECT DISTINCT(id) FROM {course} WHERE category IN (".implode(',', $crscat).")";
	$catcourses = $DB->get_records_sql($catcrssql);
}

// Check if match in course.
$courses = array();
$coursesql = "SELECT DISTINCT(id) FROM {course} WHERE fullname LIKE '%".$query."%' or shortname LIKE '%".$query."%' or summary LIKE '%".$query."%'";
$courses = $DB->get_records_sql($coursesql);

$cat1 = array_keys($catcourses);
$crs1 = array_keys($courses);
$all = array_merge($cat1, $crs1);

$all = array_unique($all);

// Final course data 
if (!empty($all)) {
    $allcoursesql = "SELECT * FROM {course} WHERE id IN (".implode(',', $all).")";
    $allcourses = $DB->get_records_sql($allcoursesql);
}

if (count($all)>0) { ?>

<div class="container my-2">
    <div class="row"> <p> Records Found : <?php echo count($all); ?> </p> </div>
</div>

<div id="ccn-main">
    <div class="courses row category-browse-3">

        <!-- Course Area Start -->
        <?php

        $total_courses = count($all);

        if($total_courses < 2) {
          $col_class = 'col-md-12';
        } else if($total_courses == 2) {
          $col_class = 'col-md-6';
        } else if($total_courses == 3) {
          $col_class = 'col-md-4';
        } else  {
          $col_class = 'col-md-6 col-lg-4 col-xl-3';
        }

        $htmlcourse ='';

        foreach ($allcourses as $course) {
              if ($DB->record_exists('course', array('id' => $course->id))) {

                $ccnCourseHandler = new ccnCourseHandler();
                $ccnCourse = $ccnCourseHandler->ccnGetCourseDetails($course->id);

                $maxlength = 100;
                $hoveraccent = '';
                $hovertext = 'Preview Course';
                $enrolbtntxt = 'Enrol';
                $topCoursesClass = 'ccnWithFoot';
                $ccnBlockShowImg = 1;
                $ccnBlockShowDesc = 1;
                $ccnBlockShowBottomBar = 1;
                $ccnBlockShowEnrolBtn = 1;
                $ccnBlockShowPrice = 1;
                $ccnCourseDescription = $ccnCourseHandler->ccnGetCourseDescription($course->id, $maxlength);

                $courseCategory = $DB->get_record('course_categories',array('id' => $course->category));
                $courseCategory = core_course_category::get($courseCategory->id);
                $hoveraccent = $courseCategory->get_formatted_name();

                $htmlcourse .='<div class="'.$col_class.' cat-'.$course->category.'"><div class="top_courses '.$topCoursesClass.'">';
                
                if($ccnBlockShowImg){
                    $htmlcourse .='<a href="'. $ccnCourse->url .'"><div class="thumb">'.$ccnCourse->ccnRender->coverImage.'<div class="overlay">';
                    
                    if($hoveraccent){
                     $htmlcourse .=' <div class="tag" data-ccn="hover_accent">'.format_text($hoveraccent, FORMAT_HTML, array('filter' => true)).'</div>';
                    }

                    if($hovertext){
                     $htmlcourse .='<span class="tc_preview_course" data-ccn="hover_text">'.format_text($hovertext, FORMAT_HTML, array('filter' => true)).'</span>';
                    }

                    $htmlcourse .='</div></div></a>';
                }

                      $htmlcourse .='<div class="details"><div class="tc_content">';
                      $htmlcourse .=  $hoveraccent;
                      $htmlcourse .=  $ccnCourse->ccnRender->title;
                      
                      if($ccnBlockShowDesc){
                        $htmlcourse .='<p>'.$ccnCourseDescription.'</p>';
                      }

                      $htmlcourse .= $ccnCourse->ccnRender->starRating;
                      $htmlcourse .='</div></div>';

                      if($ccnBlockShowBottomBar == 1){
                      
                      $htmlcourse .='<div class="tc_footer"><ul class="tc_meta float-left">'.$ccnCourse->ccnRender->enrolmentIcon . $ccnCourse->ccnRender->announcementsIcon.'</ul>';

                       if($ccnBlockShowEnrolBtn){
                         $htmlcourse .='<a href="'.$ccnCourse->enrolmentLink.'" class="tc_enrol_btn float-right" data-ccn="enrol_btn_text">'.format_text($enrolbtntxt, FORMAT_HTML, array('filter' => true)).'</a>';
                       }

                       if($ccnBlockShowPrice){
                         $htmlcourse .= '<div class="tc_price float-right">'.$ccnCourse->price.'</div>';
                       }
                        $htmlcourse .='</div>';
                      }
                    
                    $htmlcourse .='</div></div>';
              
              }
        
        } 
        echo $htmlcourse; ?>
        <!-- Course Area End -->
    </div>
</div>
<?php } else { ?>

<div class="container my-2">
    <div class="row"> <p> Records Found : <?php echo count($all); ?> </p> </div>
</div>

<?php } echo $OUTPUT->footer();