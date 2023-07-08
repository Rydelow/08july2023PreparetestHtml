<?php require_once("../../config.php");
include('form_awesome_feature.php');
global $DB, $OUTPUT, $PAGE, $USER;

$id = optional_param('id',0, PARAM_INT);


if(empty($USER->id)){
	redirect($CFG->wwwroot);
}
if(is_siteadmin())
{
    
    
}
else
{redirect($CFG->wwwroot);}


if(empty($id)){
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Home Page Awesome Features Content');
$PAGE->set_heading('Home Page Awesome Features Content');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Home Page Awesome Features Content'), new moodle_url('/blocks/customhomepage/insert_awesome_features.php'));
$PAGE->set_url('/blocks/customhomepage/latest_notification.php');
echo $OUTPUT->header();

}else{

  $PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Update Home Page Awesome Features Content');
$PAGE->set_heading('Update Home Page Awesome Features Content');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Update Home Page Latest Notification Content'), new moodle_url('/blocks/customhomepage/insert_awesome_features.php'));
$PAGE->set_url('/blocks/customhomepage/latest_notification.php');
echo $OUTPUT->header();
}

//echo $USER->id;









?>
<!-- Latest compiled and minified CSS -->



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php $mform = new latest_notification(); 

$setdata = $DB->get_record('customhmp_awesome_features',array('id'=>$id));
//echo $topbardata->slider_content['text'];
// $mform->set_data($topbardata);


$setdata->awesome_features_desc=unserialize($setdata->awesome_features_desc);
$mform->set_data($setdata);



if ($mform->is_cancelled()) {
     redirect($CFG->wwwroot);
    
    
    
} else if ($fromform = $mform->get_data()) {

        if(empty($id)){
       
        // $data->lnotification_name=$fromform->lnotification_name;
        $fromform->awesome_features_desc=serialize($fromform->awesome_features_desc);
        $fromform->timecreated=time();
  
        $DB->insert_record('customhmp_awesome_features',$fromform,true);
redirect($CFG->wwwroot."/blocks/customhomepage/awesome_features.php?sucessfully=update");

        }else{

        $fromform->awesome_features_desc=serialize($fromform->awesome_features_desc);

        $fromform->timecreated=time();
        $DB->update_record('customhmp_awesome_features',$fromform,true);
redirect($CFG->wwwroot."/blocks/customhomepage/awesome_features.php?sucessfully=update");

        }





}
    

$mform->display();
?>






<?php if(!empty($_GET['sucessfully'])){ ?>
<div class="isa_success" id="sucessfully">Updated Sucessfully</div>
<?php } ?>

<br/>



<div id="Mysucee1" style="display: none;" class="alert alert-success fade in alert-dismissible hohop" >
                                	</div>



<style>

.isa_success:before {
   font-family: "Font Awesome 5 Free";
   content: "\f00c";
   display: inline-block;
   padding-right: 3px;
   vertical-align: middle;
   font-weight: 900;
   padding-right: 9px;
}

.isa_success {
   position: fixed;
    right: 17px;
    z-index: 99999;
     color: white;
    background-color: #6faf04;
    bottom: 37px;
    width: 200px;
    padding-left: 5px;
    line-height: 29px;
    border-radius: 4px;
}



	.col-md-7d {
    width: 87%;
}
	.rowd{
		display: flex;
    align-items: center;
	}
.col-md-3d {
    width: 13%;
}

	a.btn-info.infon i {
    color: #fff;
}
	.form-control.devi {
    height: 40px;
    width: 340px;
}
.hide_moodle
{
	    padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    background-color: #d9534f !important;

}
.showmoodle
{
  padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    background-color: #4cae4c !important;
}
.infon{
 padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    background-color:#5bc0de !important;
}
.showmoodle i {
    color: #fff;
}
  .hohop
		{
		z-index: 999999;

position: fixed;

width: 17%;

background: #29b52ccc !important;

bottom: 1px;

color: white;

right: 14px;

padding: 10px;
border-radius: 6px;
margin-left: 12%;

font-weight: 600;	
		}
                .delete_modle
                {
                padding: 6px 10px;
    background-color: #f5902b;
    border-radius: 4px;
    cursor: pointer;   
    color:white;
                }
                .ul_drop
                {
                    list-style-type: none;
                }
                .ul_drop li 
                {
                   display: inline-block; 
                }
                .no_padding_class{
                  padding:0 !important;
                }
                

</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
  


<script>
    




setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
}, 6000); // <-- time in milliseconds


</script>


<?php
echo $OUTPUT->footer();

?>
