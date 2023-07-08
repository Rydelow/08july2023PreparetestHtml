<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('CampusTutr for Tutors');
$PAGE->set_heading('CampusTutr for Tutors');

$PAGE->navbar->add(('CampusTutr for Tutors'), new moodle_url('/blocks/customhomepage/campustutr_for_tutors.php'));
$PAGE->set_url('/blocks/customhomepage/campustutr_for_tutors.php');
echo $OUTPUT->header();

?>


<div class="container">
<div class="row">
	<div class="col-md-6">
		<div class="campustutr_for_tutor-heading">
			<h3 class="headeing">CampusTutr for Tutors</h3>
		</div>
		<div class="campustutr_for_tutor-content">
			<p>For Tutors / Tuition Masters :
			<p>You can register as Tutor  Create y our lessons plans for classes and each subject, we will provide initial training how
			 to use the  System</p>
			<p>You can create accounts to our student and assign lessons and teach live with Zoom / Skype
			Create Tests and grade an send Grades    </p>
		</div>
	</div>
		<div class="col-md-6">                                    
		<div class="row">
			<div class="col-md-6">
				<div class="campustutr_school-image first">
					<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/12.png" class="img-responsive"></figure>
				<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/13.png" class="img-responsive"></figure>
				<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/16.png" class="img-responsive"></figure>
				</div>
			</div>
			<div class="col-md-6">
				<div class="campustutr_school-image">
					<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/14.png" class="img-responsive"></figure>
				<figure><img src="https://www.campustutr.com/blocks/customhomepage/image/15.png" class="img-responsive"></figure>
				</div>
			</div>
		</div>
	</div>

</div>
</div>






<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
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
.campustutr_school-image.first img {
    margin-left: 4em;
}
@media only screen and (max-width: 768px) {
	section#region-main .row {
    display: inline-block;
    justify-content: space-between;
}
.campustutr_school-image.first img {
    margin-left: 0em;
}
}
</style>
  



<?php
echo $OUTPUT->footer();

?>
