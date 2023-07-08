<?php
require('../../../config.php');
require_once($CFG->dirroot . '/mod/assign/locallib.php');
require('../gear.php');
$PAGE->set_context(context_system::instance());
global $DB, $USER;
require_login();
$pagetitle = 'Student Details';
$PAGE->set_title($pagetitle);
echo $OUTPUT->header();
$current_time=strtotime("now");

if(isset($_GET['bundle_id']) && $_GET['bundle_id']!=''){
	$bundle_id=$_GET['bundle_id'];

	/*echo $stu_id="SELECT userid from {coursebundle_user} where userid in(SELECT DISTINCT userid  FROM {role_assignments} where roleid=5) and bundleid='".$bundle_id."'";*/

	$stu_ids=$DB->get_records_sql("SELECT userid from {coursebundle_user} where userid in(SELECT DISTINCT userid  FROM {role_assignments} where roleid=5) and bundleid='".$bundle_id."'");


	if($stu_ids){
					$students=array();
					foreach ($stu_ids as $total_stu) {
						$students[]=$total_stu->userid;
					}

					$students=implode(',', $students);
			}

}

 $query="SELECT a.userid,(select firstname from {user} where id=a.userid)firstname,(select lastname from {user} where id=a.userid)lastname,(select phone1 from {user} where id=a.userid)phone,(select email from {user} where id=a.userid)email,(select count(userid) from {user_payment} where userid=a.userid)payment_times,(select sum(paidamount) from {user_payment} where userid=a.userid)total_paid_amount,(select total_amount from {course_bundle} where id=1)total_amount,(select discount_amount from {course_bundle} where id=1)discount_amount  from {coursebundle_user} a where a.userid in(SELECT DISTINCT userid  FROM {role_assignments} where roleid=5) and a.bundleid='".$bundle_id."'";

$batchinfo=$DB->get_records_sql($query,array());

//$batchinfo = $DB->get_records_sql("select * from {user} where id IN($students)");

//$oldenroll = $DB->get_record('course_bundle', array('id'=>$bundle_id));
  //          $t_amount=$oldenroll->total_amount;
    //         $d_amount=$oldenroll->discount_amount;

//$total_amount=$t_amount-$d_amount;






// echo '<pre>';
 //print_r($amount);
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
	<div class="table_heading"> Student Details Table </div>
	<table id="usetTable" border="1">
		<thead> 
		<tr>
			<th>Sr.No.</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone No.</th>
			<th>Fees Paid</th>
			<th>Fees Status</th>
			<th>Total Amount</th>
			<th>Balance</th>

			
		</tr>
		</thead>
		<tbody> 
			<?php foreach ($batchinfo as $batchrow) {

				/*$query="SELECT userid, count(userid)payment_times,sum(paidamount)paid_amount from {user_payment} where userid IN ('".$students."')";
				$payment = $DB->get_records_sql($query, array());

				echo '<br>';
				print_r($payment);
*/


				
		
		?>
		<tr>
			<td><?=$batchrow->userid?></td>
			<td><?=$batchrow->firstname?></td>
			<td><?=$batchrow->lastname?></td>
			<td><?=$batchrow->email?></td>
			<td><?=$batchrow->phone?></td>
			<td><?=$batchrow->phone1?></td>
			<td><?=$batchrow->phone1?></td>
			<td><?=$total_amount?></td>
			<td><?=$batchrow->phone1?></td>
			
			
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