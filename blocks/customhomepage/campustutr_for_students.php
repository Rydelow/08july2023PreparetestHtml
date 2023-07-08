<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('CampusTutr for Students');
$PAGE->set_heading('CampusTutr for Students');

$PAGE->navbar->add(('CampusTutr for Students'), new moodle_url('/blocks/customhomepage/campustutr_for_students.php'));
$PAGE->set_url('/blocks/customhomepage/campustutr_for_students.php');
echo $OUTPUT->header();

?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="campus_tutur-header">
				<h3 class="headeing">CampusTutr for Students </h3>
				<div class="campus_tutur-content">
				<p>For students :</p>
				<p>You can register for any available lessons and complete study or take test.</p>
				<p>Check with your school or college for the class material if any thing they added for you.</p>
			</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
			<div class="campus_tutur-image first">
				<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/1.png" class="img-responsive"></figure>
				<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/2.png" class="img-responsive"></figure>
				<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/3.png" class="img-responsive"></figure>
			</div>
		</div>
			<div class="col-md-6">
			<div class="campus_tutur-image">
				<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/4.png" class="img-responsive"></figure>
				<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/5.png" class="img-responsive"></figure>
			</div>
		</div>
	</div>
		</div>
	</div>
</div>

 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<style>
	     .headeing {
    color: #ffae00;
} 
section#region-main {
    width: 100%!important;
    display: inline-block;
}
section#region-main .row {
    display: inline-flex;
    justify-content: space-between;
}
aside#block-region-side-pre {
    display: none;
}
.campus_tutur-image.first img {
    margin-left: 4em;
}
@media only screen and (max-width: 768px) {
	section#region-main .row {
    display: inline-block;
    justify-content: space-between;
}
.campus_tutur-image.first img {
    margin-left: 0em;
}
}
</style>
  



<?php
echo $OUTPUT->footer();

?>
