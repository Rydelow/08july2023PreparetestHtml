<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;
if (!isloggedin()) {
	redirect($CFG->wwwroot.'/login/index.php');
}
$id = optional_param('id', '0', PARAM_INT);
$table= base64_decode(optional_param('base', '0', PARAM_RAW));
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('base');
$PAGE->set_title('Quiz Instruction');
$PAGE->set_url('/blocks/searchdashboard/instruction.php?id='.$id.'&base='.$table);

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



echo $OUTPUT->header();


$data=$DB->get_record($table,array('id'=>$id));

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" />	


<style type="text/css">
#wrapper {
    width: 100%;
}
#page-header {
	display: none;
	}
	.navbar{
	display: none;
	}
	/*.container-fluid{padding: 0!important;}*/
#page{
	padding: 0!important;
}
#page-header-nav {
    min-height: 25px;
    display: none;
}
header.to_p {
    padding: 12px 16px;
}
.goog-logo-link {
   display:none !important;
}

.goog-te-gadget {
   color: transparent !important;
}
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
    .sele_ct_box select {
     padding: 0px 0px !important;
  
    }
    body {
    top: 0px !important; 
    }
    .user_icon img {
    width: 49% !important; 
    overflow: hidden;
    border-radius: 100px;
}
.user_icon {
  
    height: 160px;
   
}

/*span.yellow input {
  filter: hue-rotate(210deg);
  height: 30px;
  width: 30px;
}*/

span.brown{
	display: inline-block;
    height: 30px;
    width: 30px;
    background: #5A550C;
    float: left;
    margin-top: 5px;
    margin-right: 10px;
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
			<div class="instruction ma_n">
				<div class="ins_header">
					<h2>Instructions</h2>
				</div>

				<div class="gernal">
					<div class="row">
					<div class="col-md-6">
						<div class="grneal">
							<p class="g_n">General Instructions</p>

<?php if (is_siteadmin()) { ?>
							
							<a class="g_rnal_ed" href="<?php echo $CFG->wwwroot ?>/blocks/searchdashboard/add_instruction.php?id=<?php echo $id; ?>&base=<?php echo base64_encode($table); ?>"><i class="fa fa-pencil " aria-hidden="true"></i></a>

						<?php } ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="sele_ct_box pull-right flex"> 
							<div class="t_e_xt"><span class='d_v'> View In : </span></div>
							<div id="google_translate_element">  </div>

							 </div>
					</div>
					<div class="col-md-12">
						<div class="text_nu">
							
						<?php 	$topbardata = $DB->get_record('searchda_instruction',array('postid'=>$data->postid,'tableid'=>$id));

if(!empty($topbardata)){
$sug=array(unserialize($topbardata->title));
						foreach ($sug as $val){ $descpt= $val['text'];}


echo $descpt;
}else{
	?>

							
						<p>1.&nbsp;The duration of the examination is 120&nbsp; min<br></p>

							<p><span>2.</span>&nbsp;your clock will be set at the server the count down timer at the top right top corner of the screen will display the remaining time available for you to complete the examination when the timer reaches zero, the examination will end by it self. you need not terminate the examination or submit your paper.</p>
							<p><span>
							3. The question palette displayed on the right side of screen will show the status of each question using one of the following symbols :&nbsp;</span></p><p><span>4. However, this exam will be conducted with sectional timing, you need a complete a given section in the mentioned time you will be able to proceed to the next section unless you finish the current section in its allotted time frame</span></p>
							

						
	<?php
}

						 ?>

							<div class="an_swer">
								<div class="answer"> <span class="green"></span> <span> You have answered the question.</span></div>
						<div class="answer"> <span class="red"></span> <span> You have visited but not answered the question yet.</span></div>
						<div class="answer"> <span class="yellow"></span> <span> You have not answered the question but have marked for review.</span></div>
						<div class="answer"> <span class="brown text-center"><i class="fas fa-check text-white"></i>
</span> <span>You have answered the question but have marked for review.Next</span></div>
							</div>	
<!-- <input type="checkbox" checked name=""> -->
						</div>
					</div>

					

				</div>


				</div>

			</div>

<div class="next_btn   text-right">
	<a class="ins_tracution" href="<?php echo $CFG->wwwroot.'/blocks/searchdashboard'; ?>/gernal_instruction.php?id=<?php echo $id; ?>&base=<?php echo base64_encode($table); ?>">Next</a>
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
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>