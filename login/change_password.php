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
 * Change password page.
 *
 * @package    core
 * @subpackage auth
 * @copyright  1999 onwards Martin Dougiamas  http://dougiamas.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../config.php');
require_once($CFG->dirroot.'/user/lib.php');
require_once('change_password_form.php');
require_once($CFG->libdir.'/authlib.php');
require_once($CFG->dirroot.'/webservice/lib.php');
require_once('lib.php');

$id     = optional_param('id', SITEID, PARAM_INT); // current course
$return = optional_param('return', 0, PARAM_BOOL); // redirect after password change

$systemcontext = context_system::instance();

$PAGE->set_url('/login/change_password.php', array('id'=>$id));

$PAGE->set_context($systemcontext);

if ($return) {
    // this redirect prevents security warning because https can not POST to http pages
    if (empty($SESSION->wantsurl)
            or stripos(str_replace('https://', 'http://', $SESSION->wantsurl), str_replace('https://', 'http://', $CFG->wwwroot.'/login/change_password.php')) === 0) {
        $returnto = "$CFG->wwwroot/user/preferences.php?userid=$USER->id&course=$id";
    } else {
        $returnto = $SESSION->wantsurl;
    }
    unset($SESSION->wantsurl);

    redirect($returnto);
}

$strparticipants = get_string('participants');

if (!$course = $DB->get_record('course', array('id'=>$id))) {
    print_error('invalidcourseid');
}

// require proper login; guest user can not change password
if (!isloggedin() or isguestuser()) {
    if (empty($SESSION->wantsurl)) {
        $SESSION->wantsurl = $CFG->wwwroot.'/login/change_password.php';
    }
    redirect(get_login_url());
}

$PAGE->set_context(context_user::instance($USER->id));
$PAGE->set_pagelayout('admin');
$PAGE->set_course($course);

// do not require change own password cap if change forced
if (!get_user_preferences('auth_forcepasswordchange', false)) {
    require_capability('moodle/user:changeownpassword', $systemcontext);
}

// do not allow "Logged in as" users to change any passwords
if (\core\session\manager::is_loggedinas()) {
    print_error('cannotcallscript');
}

if (is_mnet_remote_user($USER)) {
    $message = get_string('usercannotchangepassword', 'mnet');
    if ($idprovider = $DB->get_record('mnet_host', array('id'=>$USER->mnethostid))) {
        $message .= get_string('userchangepasswordlink', 'mnet', $idprovider);
    }
    print_error('userchangepasswordlink', 'mnet', '', $message);
}

// load the appropriate auth plugin
$userauth = get_auth_plugin($USER->auth);

if (!$userauth->can_change_password()) {
    print_error('nopasswordchange', 'auth');
}

if ($changeurl = $userauth->change_password_url()) {
    // this internal scrip not used
    redirect($changeurl);
}

$mform = new login_change_password_form();
$mform->set_data(array('id'=>$course->id));

$navlinks = array();
$navlinks[] = array('name' => $strparticipants, 'link' => "$CFG->wwwroot/user/index.php?id=$course->id", 'type' => 'misc');

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


if ($mform->is_cancelled()) {
    redirect($CFG->wwwroot.'/user/preferences.php?userid='.$USER->id.'&amp;course='.$course->id);
} else if ($data = $mform->get_data()) {

    if (!$userauth->user_update_password($USER, $data->newpassword1)) {
        print_error('errorpasswordupdate', 'auth');
    }

    user_add_password_history($USER->id, $data->newpassword1);

    if (!empty($CFG->passwordchangelogout)) {
        \core\session\manager::kill_user_sessions($USER->id, session_id());
    }

    if (!empty($data->signoutofotherservices)) {
        webservice::delete_user_ws_tokens($USER->id);
    }

    // Reset login lockout - we want to prevent any accidental confusion here.
    login_unlock_account($USER);

    // register success changing password
    unset_user_preference('auth_forcepasswordchange', $USER);
    unset_user_preference('create_password', $USER);

    $strpasswordchanged = get_string('passwordchanged');

    // Plugins can perform post password change actions once data has been validated.
    core_login_post_change_password_requests($data);

    $fullname = fullname($USER, true);

    $PAGE->set_title($strpasswordchanged);
    $PAGE->set_heading(fullname($USER));
    echo $OUTPUT->header();

    notice($strpasswordchanged, new moodle_url($PAGE->url, array('return'=>1)));

    echo $OUTPUT->footer();
    exit;
}

$strchangepassword = get_string('changepassword');

$fullname = fullname($USER, true);

$PAGE->set_title($strchangepassword);
$PAGE->set_heading($fullname);
echo $OUTPUT->header();

if (get_user_preferences('auth_forcepasswordchange')) {
    echo $OUTPUT->notification(get_string('forcepasswordchangenotice'));
}
$mform->display();
echo $OUTPUT->footer();
