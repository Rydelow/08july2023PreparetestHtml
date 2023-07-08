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
 * This page prints a review of a particular quiz attempt
 *
 * It is used either by the student whose attempts this is, after the attempt,
 * or by a teacher reviewing another's attempt during or afterwards.
 *
 * @package   mod_quiz
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/mod/quiz/locallib.php');
require_once($CFG->dirroot . '/mod/quiz/report/reportlib.php');

$attemptid = required_param('attempt', PARAM_INT);
$page      = optional_param('page', 0, PARAM_INT);
$showall   = optional_param('showall', null, PARAM_BOOL);
$cmid      = optional_param('cmid', null, PARAM_INT);

$url = new moodle_url('/mod/quiz/review.php', array('attempt'=>$attemptid));
if ($page !== 0) {
    $url->param('page', $page);
} else if ($showall) {
    $url->param('showall', $showall);
}
$PAGE->set_url($url);

$attemptobj = quiz_create_attempt_handling_errors($attemptid, $cmid);
$page = $attemptobj->force_page_number_into_range($page);

// Now we can validate the params better, re-genrate the page URL.
if ($showall === null) {
    $showall = $page == 0 && $attemptobj->get_default_show_all('review');
}
$PAGE->set_url($attemptobj->review_url(null, $page, $showall));

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
}


// Check login.
require_login($attemptobj->get_course(), false, $attemptobj->get_cm());
$attemptobj->check_review_capability();

// Create an object to manage all the other (non-roles) access rules.
$accessmanager = $attemptobj->get_access_manager(time());
$accessmanager->setup_attempt_page($PAGE);

$options = $attemptobj->get_display_options(true);

// Check permissions - warning there is similar code in reviewquestion.php and
// quiz_attempt::check_file_access. If you change on, change them all.
if ($attemptobj->is_own_attempt()) {
    if (!$attemptobj->is_finished()) {
        redirect($attemptobj->attempt_url(null, $page));

    } else if (!$options->attempt) {
        $accessmanager->back_to_view_page($PAGE->get_renderer('mod_quiz'),
                $attemptobj->cannot_review_message());
    }

} else if (!$attemptobj->is_review_allowed()) {
    throw new moodle_quiz_exception($attemptobj->get_quizobj(), 'noreviewattempt');
}

// Load the questions and states needed by this page.
if ($showall) {
    $questionids = $attemptobj->get_slots();
} else {
    $questionids = $attemptobj->get_slots($page);
}

// Save the flag states, if they are being changed.
if ($options->flags == question_display_options::EDITABLE && optional_param('savingflags', false,
        PARAM_BOOL)) {
    require_sesskey();
    $attemptobj->save_question_flags();
    redirect($attemptobj->review_url(null, $page, $showall));
}

// Work out appropriate title and whether blocks should be shown.
if ($attemptobj->is_own_preview()) {
    navigation_node::override_active_url($attemptobj->start_attempt_url());

} else {
    if (empty($attemptobj->get_quiz()->showblocks) && !$attemptobj->is_preview_user()) {
        $PAGE->blocks->show_only_fake_blocks();
    }
}

// Set up the page header.
$headtags = $attemptobj->get_html_head_contributions($page, $showall);
$PAGE->set_title($attemptobj->review_page_title($page, $showall));
$PAGE->set_heading($attemptobj->get_course()->fullname);

// Summary table start. ============================================================================

// Work out some time-related things.
$attempt = $attemptobj->get_attempt();
$quiz = $attemptobj->get_quiz();
$overtime = 0;

if ($attempt->state == quiz_attempt::FINISHED) {
    if ($timetaken = ($attempt->timefinish - $attempt->timestart)) {
        if ($quiz->timelimit && $timetaken > ($quiz->timelimit + 60)) {
            $overtime = $timetaken - $quiz->timelimit;
            $overtime = format_time($overtime);
        }
        $timetaken = format_time($timetaken);
    } else {
        $timetaken = "-";
    }
} else {
    $timetaken = get_string('unfinished', 'quiz');
}

// Prepare summary informat about the whole attempt.
$summarydata = array();
if (!$attemptobj->get_quiz()->showuserpicture && $attemptobj->get_userid() != $USER->id) {
    // If showuserpicture is true, the picture is shown elsewhere, so don't repeat it.
    $student = $DB->get_record('user', array('id' => $attemptobj->get_userid()));
    $userpicture = new user_picture($student);
    $userpicture->courseid = $attemptobj->get_courseid();
    $summarydata['user'] = array(
        'title'   => $userpicture,
        'content' => new action_link(new moodle_url('/user/view.php', array(
                                'id' => $student->id, 'course' => $attemptobj->get_courseid())),
                          fullname($student, true)),
    );
}

if ($attemptobj->has_capability('mod/quiz:viewreports')) {
    $attemptlist = $attemptobj->links_to_other_attempts($attemptobj->review_url(null, $page,
            $showall));
    if ($attemptlist) {
        $summarydata['attemptlist'] = array(
            'title'   => get_string('attempts', 'quiz'),
            'content' => $attemptlist,
        );
    }
}

// Timing information.
$summarydata['startedon'] = array(
    'title'   => get_string('startedon', 'quiz'),
    'content' => userdate($attempt->timestart),
);

$summarydata['state'] = array(
    'title'   => get_string('attemptstate', 'quiz'),
    'content' => quiz_attempt::state_name($attempt->state),
);

if ($attempt->state == quiz_attempt::FINISHED) {
    $summarydata['completedon'] = array(
        'title'   => get_string('completedon', 'quiz'),
        'content' => userdate($attempt->timefinish),
    );
    $summarydata['timetaken'] = array(
        'title'   => get_string('timetaken', 'quiz'),
        'content' => $timetaken,
    );
}

if (!empty($overtime)) {
    $summarydata['overdue'] = array(
        'title'   => get_string('overdue', 'quiz'),
        'content' => $overtime,
    );
}

// Show marks (if the user is allowed to see marks at the moment).
$grade = quiz_rescale_grade($attempt->sumgrades, $quiz, false);
if ($options->marks >= question_display_options::MARK_AND_MAX && quiz_has_grades($quiz)) {

    if ($attempt->state != quiz_attempt::FINISHED) {
        // Cannot display grade.

    } else if (is_null($grade)) {
        $summarydata['grade'] = array(
            'title'   => get_string('grade', 'quiz'),
            'content' => quiz_format_grade($quiz, $grade),
        );

    } else {
        // Show raw marks only if they are different from the grade (like on the view page).
        if ($quiz->grade != $quiz->sumgrades) {
            $a = new stdClass();
            $a->grade = quiz_format_grade($quiz, $attempt->sumgrades);
            $a->maxgrade = quiz_format_grade($quiz, $quiz->sumgrades);
            $summarydata['marks'] = array(
                'title'   => get_string('marks', 'quiz'),
                'content' => get_string('outofshort', 'quiz', $a),
            );
        }

        // Now the scaled grade.
        $a = new stdClass();
        $a->grade = html_writer::tag('b', quiz_format_grade($quiz, $grade));
        $a->maxgrade = quiz_format_grade($quiz, $quiz->grade);
        if ($quiz->grade != 100) {
            $a->percent = html_writer::tag('b', format_float(
                    $attempt->sumgrades * 100 / $quiz->sumgrades, 0));
            $formattedgrade = get_string('outofpercent', 'quiz', $a);
        } else {
            $formattedgrade = get_string('outof', 'quiz', $a);
        }
        $summarydata['grade'] = array(
            'title'   => get_string('grade', 'quiz'),
            'content' => $formattedgrade,
        );
    }
}

// Any additional summary data from the behaviour.
$summarydata = array_merge($summarydata, $attemptobj->get_additional_summary_data($options));

// Feedback if there is any, and the user is allowed to see it now.
$feedback = $attemptobj->get_overall_feedback($grade);
if ($options->overallfeedback && $feedback) {
    $summarydata['feedback'] = array(
        'title'   => get_string('feedback', 'quiz'),
        'content' => $feedback,
    );
}

// Summary table end. ==============================================================================

if ($showall) {
    $slots = $attemptobj->get_slots();
    $lastpage = true;
} else {
    $slots = $attemptobj->get_slots($page);
    $lastpage = $attemptobj->is_last_page($page);
}

$output = $PAGE->get_renderer('mod_quiz');

// Arrange for the navigation to be displayed.
$navbc = $attemptobj->get_navigation_panel($output, 'quiz_review_nav_panel', $page, $showall);
$regions = $PAGE->blocks->get_regions();
$PAGE->blocks->add_fake_block($navbc, reset($regions));

echo $output->review_page($attemptobj, $slots, $page, $showall, $lastpage, $options, $summarydata);

// Trigger an event for this review.
$attemptobj->fire_attempt_reviewed_event();
