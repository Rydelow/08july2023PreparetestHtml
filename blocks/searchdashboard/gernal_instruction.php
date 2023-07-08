<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;
if (!isloggedin()) {
	redirect($CFG->wwwroot.'/login/index.php');
}
$id = optional_param('id', '0', PARAM_INT);
$table= base64_decode(optional_param('base', '0', PARAM_RAW));

$data=$DB->get_record($table,array('id'=>$id));

$checkatmornot=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>$table,'baseid'=>$data->id,'postid'=>$data->postid));
  if(!empty($checkatmornot)){



$quizurl=parse_url($data->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$quizallatemdata=$DB->get_record_sql("SELECT qa.id,qa.state from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$USER->id."' and cm.id='".$course_module."' and qa.state='inprogress'");

if(!empty($quizallatemdata)){

	 if($quizallatemdata->state=='inprogress'){

	redirect($data->moodleurl);
	}
}else{
	redirect($data->moodleurl);	
}




}



$checktopbar = $DB->get_record('searchda_general',array('postid'=>$data->postid,'tableid'=>$data->id));

?>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" />	


<style type="text/css">
	.goog-logo-link {
   display:none !important;
}
.man-dat_a {
    overflow: auto;
}
.goog-te-gadget {
   color: transparent !important;
}
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
    .sele_ct_box select {
     padding: 5px 0px !important;
  
    }
    body {
    top: 0px !important; 
    }
    .user_icon img {
   /* width: 49% !important; */
    overflow: hidden;
}
.user_icon {
  
    height: 160px;
    width: 160px;
}
.pull-right, .pull-xs-right {
    float: right;
}
.dangerr p{
	color: red;
}
#termc{
	float: right;
	margin-right: 20px;
	border: 1px solid #b5b5b5;
	padding: 5px 26px;
	color: #504d4d;
	border-radius: 3px;
	font-weight: 900;
	margin-top: -4px;
}
</style>


<header class="to_p">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="to_p_header">
					<img src="https://preparetest.com/blocks/customhomepage/assets/logo.svg" alt="logo">  
					<span><?php echo $data->title; ?></span>
				</div>
			</div>
		</div>
	</div>
</header>

<section class="midd_el">
	<div class="container-fluid pl-0

	">
		<div class="row">
			<div class="col-md-9 ">
			<div class="instruction pb-0">
				<div class="ins_header">
					<h2>Instructions</h2>
				</div>

				<div class="gernal pb-0">
					<div class="row">
					<div class="col-md-6">
						<p class="g_n"> <a href="#">General Instructions</a> </p>
					</div>
					<div class="col-md-6">
						<div class="sele_ct_box pull-right flex"> 
							<div class="t_e_xt"><span class='d_v'> View In : </span></div>
							<div id="google_translate_element"></div>
							 </div>
					</div>
					<div class="col-md-12">
						<div class="text_nu">
							<div class="data_show">
								<p>Read the following instructions carefully</p>
								<div class="man-dat_a">
									<table class="table table-hover">
									  <thead>

									    <tr>
									    	<?php if(empty($checktopbar)){ ?>
									      <th scope="col"> SI.No </th>

									      <th scope="col">Section Number</th>
									      <th scope="col">No Of  Question</th>
									      <th scope="col">Maximum Marks</th>
									       <th scope="col">Nagative Marks</th>
									       <th scope="col">Positive Marks</th>
									       	<?php }else{ ?>

									       			<th scope="col"> SI.NO </th>

									      <th scope="col"><?php echo $checktopbar->section_number; ?></th>
									      <th scope="col"><?php echo $checktopbar->no_of_question; ?></th>
									      <th scope="col"><?php echo $checktopbar->maximam_marks; ?></th>
									       <th scope="col"><?php echo $checktopbar->nagative_marks; ?></th>
									       <th scope="col"><?php echo $checktopbar->positive_marks; ?></th>


										<?php
									       	} ?>



<?php if (is_siteadmin()) { ?>
									       <th> 
									       	<a href="<?php echo $CFG->wwwroot.'/blocks/searchdashboard'; ?>/general_content.php?id=<?php echo $id; ?>&base=<?php echo base64_encode($table); ?>"> <?php if(empty($checktopbar)){ echo"Please Insert Content"; }?>  <i class="fa fa-pencil " aria-hidden="true"></i></a>
<?php if(!empty($checktopbar)){ ?>
<a class="add" href="<?php echo $CFG->wwwroot.'/blocks/searchdashboard'; ?>/general_exam.php?id=<?php echo $id; ?>&base=<?php echo base64_encode($table); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
<?php } ?>
									       </th>
<?php } ?>
									    </tr>
									  </thead>
									  <tbody>
<?php if (is_siteadmin()) {
$exampdataval = $DB->get_records('searchda_general_exam',array('postid'=>$data->postid,'tableid'=>$data->id));
}else{
$exampdataval = $DB->get_records('searchda_general_exam',array('postid'=>$data->postid,'tableid'=>$data->id,'status'=>0));	
}

$i=1;
foreach ($exampdataval as $exampdata) { 
	?>

									    <tr>
									      <th><?php echo $i++; ?></th>
									      <td><?php echo $exampdata->section_number; ?></td>
									      <td><?php echo $exampdata->no_of_question; ?></td>
									       <td><?php echo $exampdata->maximam_marks; ?></td>
									        <td><?php echo $exampdata->nagative_marks; ?></td>
									         <td><?php echo $exampdata->positive_marks; ?></td>

<?php if (is_siteadmin()) { ?>	
									         <td>
									         	<div class=" h_icon ">

                                       <a class="edd" href="<?php echo $CFG->wwwroot.'/blocks/searchdashboard'; ?>/general_exam.php?id=<?php echo $id; ?>&base=<?php echo base64_encode($table); ?>&cid=<?php echo $exampdata->id; ?>" ><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                       <a class="add" onclick="return confirm('Are you sure you want to status update')" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/status_update.php?id=<?php echo $exampdata->id; ?>&table=searchda_general_exam&secure=1&url=<?php echo urlencode($CFG->wwwroot.'/blocks/searchdashboard/gernal_instruction.php?id='. $id.'&base='.base64_encode($table)); ?>


                                       	"><i class="fa <?php if($exampdata->status==1){ echo 'fa-eye-slash'; }else{ echo'fa-eye'; } ?>" aria-hidden="true"></i></a>
                                        <a class="del" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/delete.php?id=<?php echo $exampdata->id; ?>&table=searchda_general_exam&secure=1&url=<?php echo urlencode($CFG->wwwroot.'/blocks/searchdashboard/gernal_instruction.php?id='. $id.'&base='.base64_encode($table)); ?>" onclick="return confirm('Are you sure you want to delete this ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               </div></td>

<?php } ?>
									    </tr>
									    <?php } ?>
									     
									    
									     
									     
									    
									  </tbody>
									</table>
								</div>
							</div>
						
						</div>
					</div>
					<div class="col-md-12">
						<div class="text_nu s_lanugag">
							<!-- <p>Choose Your deafult Launage 
							 <select>
								<option value="English"> English </option>
								<option > English </option>
								<option > English </option>
								<option > English </option>
								<option > English </option>
								
							</select></p> -->
							<div class="Edit_p">
								<div class="dangerr"> 
									<?php 	$topbardata = $DB->get_record('searchda_general_instruction',array('id'=>'1'));


$sug=array(unserialize($topbardata->title));
						foreach ($sug as $val){ $descpt= $val['text'];}


echo $descpt;

						 ?>
								</div>
<?php if (is_siteadmin()) { ?>	
							<a class="ed_p" href="<?php echo $CFG->wwwroot.'/blocks/searchdashboard'; ?>/add_general_instruction.php"><i class="fa fa-pencil " aria-hidden="true"></i></a>
							<?php } ?>
							</div>
							<div class="answer"> 
							<!-- 	<span class="green"></span> -->
							<?php if (is_siteadmin()) { ?>	
							<a class="ed_p" href="<?php echo $CFG->wwwroot.'/blocks/searchdashboard'; ?>/add_general_in_term.php"><i class="fa fa-pencil " aria-hidden="true"></i></a>
							<?php } ?>
								<input class="green" type="checkbox" id="myCheck" onclick="myFunction()">
						<span class="trems">
					<?php 	$topbar = $DB->get_record('searchda_in_term',array('id'=>'1'));


$sug=array(unserialize($topbar->title));
						foreach ($sug as $val){ $descpt= $val['text'];}


echo $descpt;

						 ?>
						</span></div>
						</div>
						
					</div>
					

				</div>


				</div>

			</div>

<div class="next_btn  in_st  ">
	<a class="ins_tracution ml-3" href="<?php echo $CFG->wwwroot.'/blocks/searchdashboard'; ?>/instruction.php?id=<?php echo $id; ?>&base=<?php echo base64_encode($table); ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go Back</a>

<?php if(empty($data->price)){ ?>
	 <a  class="bigenar" id="dafree" href="javascript:void(0);">Start Test</a>
<?php }else{

if(empty($data->moodleurl)){
	$url="";
}else{
	$url=$data->moodleurl;
}

	  $senddata = array('action'=>$table,           
    "firstname" => $USER->firstname,
    "lastname"=>$USER->lastname,
    "email"=>$USER->email,
    "redirect_url"=>$url,
    "userid"=>$USER->id,
"actionid"=>$id

);  
// echo "ddd";
// print_r($senddata);

 $lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

$dataqcheck=$DB->get_record('searchda_complte_payment',array('userid'=>$USER->id,'base'=>$table,'baseid'=>$id,'postid'=>$data->postid,'payment_type'=>"free"));

if($data->quiz_type!=1){
	 ?>


	 <button  class="bigenar" id="termc" dt-href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $data->postid; ?>&base=<?php echo $lastdata; ?>">Start Test</button>
<?php }else{ 
if(empty($dataqcheck)){

	?>
 <a  class="bigenar" id="dafree" href="javascript:void(0);">Start Test</a>
	
<?php }else{ ?>

 <button class="bigenar" id="termc" dt-href="<?php echo $CFG->wwwroot; ?>/allcourses/index.php/checkout/?add-to-cart=<?php echo $data->postid; ?>&base=<?php echo $lastdata; ?>">Start Test</button>
<?php	
}

 } } ?>

</div>

			</div>
			<div class="col-md-3 ">
				<div class="user_pro text-center
				">
					<div class="user_icon">
						<?php	if(!empty($USER->picture) && $USER->picture!=0){

						?>
						<img src="<?php echo new moodle_url('/user/pix.php/'.$USER->id.'/f1.jpg')?>" alt="pro">
<?php }else{ ?><img src="<?php echo $CFG->wwwroot.'/blocks/searchdashboard/image/f1.png'; ?>" alt="pro"><?php } ?>
						<strong><?php echo $USER->firstname." ".$USER->lastname; ?></strong>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}


$(document).ready(function(){



$('#termc').on('click', function () {
var checkBox = document.getElementById("myCheck");
  if (checkBox.checked == true){

var dat=$(this).attr('dt-href');
window.location.href=dat;

  }else{

  	alert('You must agree with the terms and conditions');
$('#myCheck').focus();
  }

});



  $('#dafree').on('click', function () {

  var checkBox = document.getElementById("myCheck");
  if (checkBox.checked == true){
   

var userid="<?php echo $USER->id; ?>";
var base="<?php echo $table; ?>";
var baseid="<?php echo $id; ?>";
var postid="<?php echo $data->postid; ?>";
 console.log("base"+base+"-baseid"+baseid+"postid"+postid);

  				 jQuery.ajax({
            type: "POST",
            url: '<?php echo $CFG->wwwroot.'/blocks/searchdashboard/ajaxdata.php'; ?>',
            data: {
            action: 'datainternal',
            userid: userid,
            base: base,
            baseid: baseid,
            postid: postid
            
            },
            success: function (data) {  
               window.location.href ="<?php echo $data->moodleurl;?>";
            }
            });

} else {
    
alert('You must agree with the terms and conditions');
$('#myCheck').focus();

  }

		});
  	  });
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

