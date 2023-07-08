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
 * This script displays a particular page of a quiz attempt that is in progress.
 *
 * @package   mod_quiz
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/mod/quiz/locallib.php');

// Look for old-style URLs, such as may be in the logs, and redirect them to startattemtp.php.
if ($id = optional_param('id', 0, PARAM_INT)) {
    redirect($CFG->wwwroot . '/mod/quiz/startattempt.php?cmid=' . $id . '&sesskey=' . sesskey());
    
}   
 else if ($qid = optional_param('q', 0, PARAM_INT)) {
    if (!$cm = get_coursemodule_from_instance('quiz', $qid)) {
        print_error('invalidquizid', 'quiz');
    }
    redirect(new moodle_url('/mod/quiz/startattempt.php',
            array('cmid' => $cm->id, 'sesskey' => sesskey())));
}


// Get submitted parameters.
$attemptid = required_param('attempt', PARAM_INT);
$page = optional_param('page', 0, PARAM_INT);
$cmid = optional_param('cmid', null, PARAM_INT);
$attemptobj = quiz_create_attempt_handling_errors($attemptid, $cmid);
$page = $attemptobj->force_page_number_into_range($page);
$PAGE->set_url($attemptobj->attempt_url(null, $page));
// During quiz attempts, the browser back/forwards buttons should force a reload.
$PAGE->set_cacheable(false);

if (isloggedin()){
	
   if (!is_siteadmin()){ 
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
/*if(isguestuser()){

    echo "dfgfffff";
	echo "guestuser";
	/*$strquiz = "";
	global $DB;
    //redirect($CFG->wwwroot . '/mod/quiz/attempt.php?attempt=' . $attemptid . '&cmid=' . $cmid);
    $dataavail=$DB->get_record('role_assignments',array('userid'=>$USER->id));
	foreach($dataavail as $val)
	{
		$strquizrecord = implode("<br/>",array($val));
        $strquiz .= $strquizrecord;
		echo $strquiz;
	}
}
else
{
	echo "not guest user";die();
}*/
}


// Check login.
require_login($attemptobj->get_course(), false, $attemptobj->get_cm());

// Check that this attempt belongs to this user.
if ($attemptobj->get_userid() != $USER->id) {
    if ($attemptobj->has_capability('mod/quiz:viewreports')) {
        redirect($attemptobj->review_url(null, $page));
    } else {
        throw new moodle_quiz_exception($attemptobj->get_quizobj(), 'notyourattempt');
    }
}

// Check capabilities and block settings.
if (!$attemptobj->is_preview_user()) {
    $attemptobj->require_capability('mod/quiz:attempt');
    if (empty($attemptobj->get_quiz()->showblocks)) {
        $PAGE->blocks->show_only_fake_blocks();
    }

} else {
    navigation_node::override_active_url($attemptobj->start_attempt_url());
}

// If the attempt is already closed, send them to the review page.
if ($attemptobj->is_finished()) {
    redirect($attemptobj->review_url(null, $page));
} else if ($attemptobj->get_state() == quiz_attempt::OVERDUE) {
    redirect($attemptobj->summary_url());
}

// Check the access rules.
$accessmanager = $attemptobj->get_access_manager(time());
$accessmanager->setup_attempt_page($PAGE);
$output = $PAGE->get_renderer('mod_quiz');
$messages = $accessmanager->prevent_access();
if (!$attemptobj->is_preview_user() && $messages) {
    print_error('attempterror', 'quiz', $attemptobj->view_url(),
            $output->access_messages($messages));
}
if ($accessmanager->is_preflight_check_required($attemptobj->get_attemptid())) {
    redirect($attemptobj->start_attempt_url(null, $page));
}

// Set up auto-save if required.
$autosaveperiod = get_config('quiz', 'autosaveperiod');
if ($autosaveperiod) {
    $PAGE->requires->yui_module('moodle-mod_quiz-autosave',
            'M.mod_quiz.autosave.init', array($autosaveperiod));
}

// Log this page view.
$attemptobj->fire_attempt_viewed_event();

// Get the list of questions needed by this page.
$slots = $attemptobj->get_slots($page);

// Check.
if (empty($slots)) {
    throw new moodle_quiz_exception($attemptobj->get_quizobj(), 'noquestionsfound');
}

// Update attempt page, redirecting the user if $page is not valid.
if (!$attemptobj->set_currentpage($page)) {
    redirect($attemptobj->start_attempt_url(null, $attemptobj->get_currentpage()));
}

// Initialise the JavaScript.
$headtags = $attemptobj->get_html_head_contributions($page);
$PAGE->requires->js_init_call('M.mod_quiz.init_attempt_form', null, false, quiz_get_js_module());

// Arrange for the navigation to be displayed in the first region on the page.
$navbc = $attemptobj->get_navigation_panel($output, 'quiz_attempt_nav_panel', $page);
$regions = $PAGE->blocks->get_regions();
$PAGE->blocks->add_fake_block($navbc, reset($regions));

$headtags = $attemptobj->get_html_head_contributions($page);
$PAGE->set_title($attemptobj->attempt_page_title($page));
$PAGE->set_heading($attemptobj->get_course()->fullname);

if ($attemptobj->is_last_page($page)) {
    $nextpage = -1;
} else {
    $nextpage = $page + 1;
}

echo $output->attempt_page($attemptobj, $page, $accessmanager, $messages, $slots, $id, $nextpage);
