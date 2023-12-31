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
 * This page is the entry page into the quiz UI. Displays information about the
 * quiz to students and teachers, and lets students see their previous attempts.
 *
 * @package   mod_quiz
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir.'/gradelib.php');
require_once($CFG->dirroot.'/mod/quiz/locallib.php');
require_once($CFG->libdir . '/completionlib.php');
require_once($CFG->dirroot . '/course/format/lib.php');

$id = optional_param('id', 0, PARAM_INT); // Course Module ID, or ...
//echo $id; echo "<br/>";
$q = optional_param('q',  0, PARAM_INT);  // Quiz ID.
//echo $q;
if ($id) {
    //echo "id is given";
    if (!$cm = get_coursemodule_from_id('quiz', $id)) {
        print_error('invalidcoursemodule');
    }
    if (!$course = $DB->get_record('course', array('id' => $cm->course))) {
        print_error('coursemisconf');
    }
} else {
    echo "if not id";
    if (!$quiz = $DB->get_record('quiz', array('id' => $q))) {
        print_error('invalidquizid', 'quiz');
    }
    if (!$course = $DB->get_record('course', array('id' => $quiz->course))) {
        print_error('invalidcourseid');
    }
    if (!$cm = get_coursemodule_from_instance("quiz", $quiz->id, $course->id)) {
        print_error('invalidcoursemodule');
    }
}

// Check login and get context.
require_login($course, false, $cm);
$context = context_module::instance($cm->id);
require_capability('mod/quiz:view', $context);

// Cache some other capabilities we use several times.
$canattempt = has_capability('mod/quiz:attempt', $context);
$canreviewmine = has_capability('mod/quiz:reviewmyattempts', $context);
$canpreview = has_capability('mod/quiz:preview', $context);

// Create an object to manage all the other (non-roles) access rules.
$timenow = time();
$quizobj = quiz::create($cm->instance, $USER->id);
$accessmanager = new quiz_access_manager($quizobj, $timenow,
        has_capability('mod/quiz:ignoretimelimits', $context, null, false));
$quiz = $quizobj->get_quiz();

// Trigger course_module_viewed event and completion.
quiz_view($quiz, $course, $cm, $context);
?>
<style type="text/css">
    #inst21{
        display: none;
    }
</style>
<?php
// Initialize $PAGE, compute blocks.
$PAGE->set_url('/mod/quiz/view.php', array('id' => $cm->id));

// Create view object which collects all the information the renderer will need.
$viewobj = new mod_quiz_view_object();
$viewobj->accessmanager = $accessmanager;
$viewobj->canreviewmine = $canreviewmine || $canpreview;

// Get this user's attempts.
$attempts = quiz_get_user_attempts($quiz->id, $USER->id, 'finished', true);
$lastfinishedattempt = end($attempts);
$unfinished = false;
$unfinishedattemptid = null;
if ($unfinishedattempt = quiz_get_user_attempt_unfinished($quiz->id, $USER->id)) {
    $attempts[] = $unfinishedattempt;

    // If the attempt is now overdue, deal with that - and pass isonline = false.
    // We want the student notified in this case.
    $quizobj->create_attempt_object($unfinishedattempt)->handle_if_time_expired(time(), false);

    $unfinished = $unfinishedattempt->state == quiz_attempt::IN_PROGRESS ||
            $unfinishedattempt->state == quiz_attempt::OVERDUE;
    if (!$unfinished) {
        $lastfinishedattempt = $unfinishedattempt;
    }
    $unfinishedattemptid = $unfinishedattempt->id;
    $unfinishedattempt = null; // To make it clear we do not use this again.
}
$numattempts = count($attempts);

$viewobj->attempts = $attempts;
$viewobj->attemptobjs = array();
foreach ($attempts as $attempt) {
    $viewobj->attemptobjs[] = new quiz_attempt($attempt, $quiz, $cm, $course, false);
}

// Work out the final grade, checking whether it was overridden in the gradebook.
if (!$canpreview) {
    $mygrade = quiz_get_best_grade($quiz, $USER->id);
} else if ($lastfinishedattempt) {
    // Users who can preview the quiz don't get a proper grade, so work out a
    // plausible value to display instead, so the page looks right.
    $mygrade = quiz_rescale_grade($lastfinishedattempt->sumgrades, $quiz, false);
} else {
    $mygrade = null;
}

$mygradeoverridden = false;
$gradebookfeedback = '';

$grading_info = grade_get_grades($course->id, 'mod', 'quiz', $quiz->id, $USER->id);
if (!empty($grading_info->items)) {
    $item = $grading_info->items[0];
    if (isset($item->grades[$USER->id])) {
        $grade = $item->grades[$USER->id];

        if ($grade->overridden) {
            $mygrade = $grade->grade + 0; // Convert to number.
            $mygradeoverridden = true;
        }
        if (!empty($grade->str_feedback)) {
            $gradebookfeedback = $grade->str_feedback;
        }
    }
}

$title = $course->shortname . ': ' . format_string($quiz->name);
$PAGE->set_title($title);
$PAGE->set_heading($course->fullname);
$output = $PAGE->get_renderer('mod_quiz');

// Print table with existing attempts.
if ($attempts) {
    // Work out which columns we need, taking account what data is available in each attempt.
    list($someoptions, $alloptions) = quiz_get_combined_reviewoptions($quiz, $attempts);

    $viewobj->attemptcolumn  = $quiz->attempts != 1;

    $viewobj->gradecolumn    = $someoptions->marks >= question_display_options::MARK_AND_MAX &&
            quiz_has_grades($quiz);
    $viewobj->markcolumn     = $viewobj->gradecolumn && ($quiz->grade != $quiz->sumgrades);
    $viewobj->overallstats   = $lastfinishedattempt && $alloptions->marks >= question_display_options::MARK_AND_MAX;

    $viewobj->feedbackcolumn = quiz_has_feedback($quiz) && $alloptions->overallfeedback;
}

$viewobj->timenow = $timenow;
$viewobj->numattempts = $numattempts;
$viewobj->mygrade = $mygrade;
$viewobj->moreattempts = $unfinished ||
        !$accessmanager->is_finished($numattempts, $lastfinishedattempt);
$viewobj->mygradeoverridden = $mygradeoverridden;
$viewobj->gradebookfeedback = $gradebookfeedback;
$viewobj->lastfinishedattempt = $lastfinishedattempt;
$viewobj->canedit = has_capability('mod/quiz:manage', $context);
$viewobj->editurl = new moodle_url('/mod/quiz/edit.php', array('cmid' => $cm->id));
$viewobj->backtocourseurl = new moodle_url('/course/view.php', array('id' => $course->id));
$viewobj->startattempturl = $quizobj->start_attempt_url();

if ($accessmanager->is_preflight_check_required($unfinishedattemptid)) {
    $viewobj->preflightcheckform = $accessmanager->get_preflight_check_form(
            $viewobj->startattempturl, $unfinishedattemptid);
}
$viewobj->popuprequired = $accessmanager->attempt_must_be_in_popup();
$viewobj->popupoptions = $accessmanager->get_popup_options();

// Display information about this quiz.
$viewobj->infomessages = $viewobj->accessmanager->describe_rules();
if ($quiz->attempts != 1) {
    $viewobj->infomessages[] = get_string('gradingmethod', 'quiz',
            quiz_get_grading_option_name($quiz->grademethod));
}

// Determine wheter a start attempt button should be displayed.
$viewobj->quizhasquestions = $quizobj->has_questions();
$viewobj->preventmessages = array();
if (!$viewobj->quizhasquestions) {
    $viewobj->buttontext = '';

} else {
    if ($unfinished) {
        if ($canattempt) {
            $viewobj->buttontext = get_string('continueattemptquiz', 'quiz');
        } else if ($canpreview) {
            $viewobj->buttontext = get_string('continuepreview', 'quiz');
        }

    } else {
        if ($canattempt) {
            $viewobj->preventmessages = $viewobj->accessmanager->prevent_new_attempt(
                    $viewobj->numattempts, $viewobj->lastfinishedattempt);
            if ($viewobj->preventmessages) {
                $viewobj->buttontext = '';
            } else if ($viewobj->numattempts == 0) {
                $viewobj->buttontext = get_string('attemptquiznow', 'quiz');
            } else {
                $viewobj->buttontext = get_string('reattemptquiz', 'quiz');
            }

        } else if ($canpreview) {
            $viewobj->buttontext = get_string('previewquiznow', 'quiz');
        }
    }

    // If, so far, we think a button should be printed, so check if they will be
    // allowed to access it.
    if ($viewobj->buttontext) {
        if (!$viewobj->moreattempts) {
            $viewobj->buttontext = '';
        } else if ($canattempt
                && $viewobj->preventmessages = $viewobj->accessmanager->prevent_access()) {
            $viewobj->buttontext = '';
        }
    }
}

$viewobj->showbacktocourse = ($viewobj->buttontext === '' &&
        course_get_format($course)->has_view_page());

if (isloggedin()){
   if (!is_siteadmin()) { 
  global $DB;
  $dataavl=$DB->get_record('role_assignments',array('userid'=>$USER->id));
if(empty($dataavl)){
    //redirect($CFG->wwwroot."/blocks/searchdashboard/index.php");
}else{
    $dataavll=$DB->get_record('role_assignments',array('roleid'=>'5','userid'=>$USER->id));
    if(!empty($dataavll)){ ?>

<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" />

<!-- <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<style type="text/css">
<style >
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    padding-top: 0!important;
}
.navbar .nav>li>a {
    color: #000000!important;
    }
.main_hader {
    background-color: #fff;
    padding: 5px 0;
}

#page-mod-quiz-view button:hover, button:focus, button:active, .btn:hover, .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default, input.form-submit:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, button:focus, input.form-submit:focus, input[type="button"]:focus, input[type="submit"]:focus, input[type="reset"]:focus, button.active, input.form-submit.active, input.active[type="button"], input.active[type="submit"], input.active[type="reset"], button:active, input.form-submit:active, input[type="button"]:active, input[type="submit"]:active, input[type="reset"]:active, input.form-submit:hover, input#id_submitbutton:hover, input#id_submitbutton2:hover, .path-admin .buttons input[type="submit"]:hover, td.submit input:hover, input.form-submit:focus, input#id_submitbutton:focus, input#id_submitbutton2:focus, .path-admin .buttons input[type="submit"]:focus, td.submit input:focus, input.form-submit:active, input#id_submitbutton:active, input#id_submitbutton2:active, .path-admin .buttons input[type="submit"]:active, td.submit input:active, input.form-submit.active, input#id_submitbutton.active, input#id_submitbutton2.active, .path-admin .buttons input.active[type="submit"], td.submit input.active, input.form-submit.disabled, input#id_submitbutton.disabled, input#id_submitbutton2.disabled, .path-admin .buttons input.disabled[type="submit"], td.submit input.disabled, input.form-submit[disabled], input#id_submitbutton[disabled], input#id_submitbutton2[disabled], .path-admin .buttons input[type="submit"][disabled], td.submit input[disabled], #notice .singlebutton+.singlebutton input:hover {
    background-color: #35008c00!important;
    color: #000!important;
    transition: all 0.3s ease 0.1s;
}
#page-mod-quiz-view button:hover, button:focus, button:active, .btn:hover, .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default, input.form-submit:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, button:focus, input.form-submit:focus, input[type="button"]:focus, input[type="submit"]:focus, input[type="reset"]:focus, button.active, input.form-submit.active, input.active[type="button"], input.active[type="submit"], input.active[type="reset"], button:active, input.form-submit:active, input[type="button"]:active, input[type="submit"]:active, input[type="reset"]:active, input.form-submit:hover, input#id_submitbutton:hover, input#id_submitbutton2:hover, .path-admin .buttons input[type="submit"]:hover, td.submit input:hover, input.form-submit:focus, input#id_submitbutton:focus, input#id_submitbutton2:focus, .path-admin .buttons input[type="submit"]:focus, td.submit input:focus, input.form-submit:active, input#id_submitbutton:active, input#id_submitbutton2:active, .path-admin .buttons input[type="submit"]:active, td.submit input:active, input.form-submit.active, input#id_submitbutton.active, input#id_submitbutton2.active, .path-admin .buttons input.active[type="submit"], td.submit input.active, input.form-submit.disabled, input#id_submitbutton.disabled, input#id_submitbutton2.disabled, .path-admin .buttons input.disabled[type="submit"], td.submit input.disabled, input.form-submit[disabled], input#id_submitbutton[disabled], input#id_submitbutton2[disabled], .path-admin .buttons input[type="submit"][disabled], td.submit input[disabled], #notice .singlebutton+.singlebutton input:hover{
background-color: #35008c00!important;
}

button.d_rop_dwn_user: focus{
background-color: transparent!important;
}




ul.nav.navbar-right.loc li a.nav-link {
    color: #000!important;
    display: inline-flex;
}
.navbar .nav>.active>a:focus, .navbar .nav>.active>a:hover, .navbar .nav>li>a:focus, .navbar .nav>li>a:hover{
    background-color: transparent!important;
}

.continuebutton{
    display: none;
}

.u_er_drop button#dropdownMenuButton {
    background-color: transparent!important;
    border: none;
    color: #000!important;
    box-shadow: none;
}
#page-header {
    display: none;
    }
  header.navbar {
    display: none;
}
.breadcrumb-nav .breadcrumb {
    display: none;
}
.activity-navigation {

    display: none;
}
#page-mod-quiz-view #wrapper {
        width: 86%!important;
}
header#page-header {
    display: none;
}




</style>

        <?php    


        require_once('/var/www/html/blocks/searchdashboard/header.php');
        
        ?>
    </div>
</section>
        <?php  
    }
} 
}
if ($quiz->blockguests == 1) {
    //echo "Test when blockguests condition is true";
    require_login($course->id);
   
}
else
{
      if(isguestuser()) {
        global $DB;
        $strquiz = "";
        $strpreviewlink = "";
		$strattempt = "";
        $quizsql = "select mo_quiz.name,mo_quiz.intro,mo_quiz.attempts from mo_quiz,mo_course_modules where mo_course_modules.instance=mo_quiz.id and mo_course_modules.id=?";
        $quizrecord = $DB->get_record_sql($quizsql, [$id]);
        print_r($quizrecord);
        foreach($quizrecord as $strquizrecor)
        {
        $strquizrecord = implode("<br/>",array($strquizrecor));
        $strquiz .= $strquizrecord;
		//$strattempt .= $strquizrecor[2];  
        }
		//$attemptidhidden = '<form><input type="text" name="attemptid" value="'. $strattempt .'"/></form>'; 
        $strpreviewlink .='<a href="'.$CFG->wwwroot.'/mod/quiz/startattempt.php?cmid='.$id .'&sesskey='.sesskey().'">Preview</a>';
		//$strpreviewlink .='<a href="'.$CFG->wwwroot.'/mod/quiz/attempt.php?cmid='.$id .'&sesskey='.sesskey().'">Preview</a>';
		//$strpreviewlink .='<a href="'.$CFG->wwwroot.'/mod/quiz/attempt.php?attempt=108&cmid='.$id .'">Preview</a>';
    }   
}
}


echo $OUTPUT->header();

/*if (isguestuser()) {
    // Guests can't do a quiz, so offer them a choice of logging in or going back.
    echo $output->view_page_guest($course, $quiz, $cm, $context, $viewobj->infomessages);
} else if (!isguestuser() && !($canattempt || $canpreview
          || $viewobj->canreviewmine)) {
    // If they are not enrolled in this course in a good enough role, tell them to enrol.
    echo $output->view_page_notenrolled($course, $quiz, $cm, $context, $viewobj->infomessages);
} else {
    echo $output->view_page($course, $quiz, $cm, $context, $viewobj);
}*/

echo $strquiz;

echo $strpreviewlink;

//echo $attemptidhidden;

echo $OUTPUT->footer();
?>