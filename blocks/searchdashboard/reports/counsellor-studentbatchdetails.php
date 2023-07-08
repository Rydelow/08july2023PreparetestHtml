<?php
require('../../../config.php');
require_once($CFG->dirroot . '/mod/assign/locallib.php');
require('../gear.php');
$PAGE->set_context(context_system::instance());
global $DB, $USER;
require_login();
$pagetitle = 'Counsellor Student Batch Details';
$PAGE->set_title($pagetitle);
echo $OUTPUT->header();
$current_time=strtotime("now");

$batchinfo = $DB->get_records_sql("select a.id,a.bundle_name,a.course_type,a.courseid,a.total_amount,a.publish,a.bundlestart,a.bundlend,(select count(b.id) from {coursebundle_user} b  where a.id=b.bundleid) total_student,(select userid from {coursebundle_user} d  where a.id=d.bundleid and d.userpassword != 'NULL') userid,(select coursename from {course_image} where id in(a.courseid)) coursename,(select u.firstname from {user} u where u.id=userid)firstname,(select u.lastname from {user} u where u.id=userid)lastname, (select u.email from {user} u where u.id=userid)email,(select u.phone1 from {user} u where u.id=userid)phone from {course_bundle} a");
 /*echo '<pre>';
 print_r($batchinfo);*/
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
 <script>
	$(document).ready(function() {
		$('#usetTable').DataTable(); 
	} );
</script>
<div class="container-fluid">
	
<div class="bundle_table">
	<div class="table_heading"> Counsellor Student Batch Details  </div>
	<table id="usetTable" border="1">
		<thead> 
		<tr>
			<th>Sr.No.</th>
			<th>Student Details</th>
			<th>Course Details</th>
			<th>Batch Type</th>
			<th>Batch Month Wise</th>
			<th>Batch Date Wise</th>
			<th>Admission Source</th>
			
		</tr>
		</thead>
		<tbody> 
			<?php foreach ($batchinfo as $batchrow) {
		
		?>
		<tr>
			<td><?=$batchrow->id?></td>
			<td><?=$batchrow->firstname?></td>
			<td><?=$batchrow->lastname?></td>
			<td><?=$batchrow->email?></td>
			<td><?=$batchrow->phone?></td>
			<td><?=$batchrow->total_amount?></td>
			<td><?=$batchrow->total_amount?></td>
			
			
		</tr>
	<?php } ?>
		</tbody>
	</table>
</div>

<style>


.table_heading {
    color: #fff;
    font-size: 30px;
    text-align: center;
    margin: 10px 0;
    background: #3376d2;
}
.bundle_table{
	margin-top:50px;
}
.bundle_table table tr th,.bundle_table table tr td{
    padding:6px 8px; 
}
.bundle_table thead{
	background:#79aaf1;
}
.bundle_table table{
	border:1px solid #ddd;
}
.btn_section{
	padding-left: 6px;
}
.btn1{
	color:#fff;
	background: #302f61; 
	border:none;
	padding:8px;
}
.btn2{
	color:#fff;
	background: #eb5c09; 
	border:none;
	padding:8px;
}
.form_head{
	color: #eb5c09;
}
.form_head h2{
	padding:20px 0;
}
.red_text{
	color:red;
	margin:0;
}
header#page-header {
    display: none;
}
section#region-main {
    padding: 0 !important;
}

</style>

<?php echo $OUTPUT->footer(); ?>
<?php gear(); ?>