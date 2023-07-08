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
 * This page prints a summary of a quiz attempt before it is submitted.
 *
 * @package   mod_quiz
 * @copyright 2009 The Open University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/mod/quiz/locallib.php');

$attemptid = required_param('attempt', PARAM_INT); // The attempt to summarise.
$cmid = optional_param('cmid', null, PARAM_INT);

$PAGE->set_url('/mod/quiz/summary.php', array('attempt' => $attemptid));
// During quiz attempts, the browser back/forwards buttons should force a reload.
$PAGE->set_cacheable(false);

$attemptobj = quiz_create_attempt_handling_errors($attemptid, $cmid);



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

// Check that this attempt belongs to this user.
if ($attemptobj->get_userid() != $USER->id) {
    if ($attemptobj->has_capability('mod/quiz:viewreports')) {
        redirect($attemptobj->review_url(null));
    } else {
        throw new moodle_quiz_exception($attemptobj->get_quizobj(), 'notyourattempt');
    }
}

// Check capabilites.
if (!$attemptobj->is_preview_user()) {
    $attemptobj->require_capability('mod/quiz:attempt');
}

if ($attemptobj->is_preview_user()) {
    navigation_node::override_active_url($attemptobj->start_attempt_url());
}

// Check access.
$accessmanager = $attemptobj->get_access_manager(time());
$accessmanager->setup_attempt_page($PAGE);
$output = $PAGE->get_renderer('mod_quiz');
$messages = $accessmanager->prevent_access();
if (!$attemptobj->is_preview_user() && $messages) {
    print_error('attempterror', 'quiz', $attemptobj->view_url(),
            $output->access_messages($messages));
}
if ($accessmanager->is_preflight_check_required($attemptobj->get_attemptid())) {
    redirect($attemptobj->start_attempt_url(null));
}

$displayoptions = $attemptobj->get_display_options(false);

// If the attempt is now overdue, or abandoned, deal with that.
$attemptobj->handle_if_time_expired(time(), true);

// If the attempt is already closed, redirect them to the review page.
if ($attemptobj->is_finished()) {
    redirect($attemptobj->review_url());
}

// Arrange for the navigation to be displayed.
if (empty($attemptobj->get_quiz()->showblocks)) {
    $PAGE->blocks->show_only_fake_blocks();
}

$navbc = $attemptobj->get_navigation_panel($output, 'quiz_attempt_nav_panel', -1);
$regions = $PAGE->blocks->get_regions();
$PAGE->blocks->add_fake_block($navbc, reset($regions));

$PAGE->navbar->add(get_string('summaryofattempt', 'quiz'));
$PAGE->set_title($attemptobj->summary_page_title());
$PAGE->set_heading($attemptobj->get_course()->fullname);

// Display the page.
echo $output->summary_page($attemptobj, $displayoptions);

// Log this page view.
$attemptobj->fire_attempt_summary_viewed_event();
