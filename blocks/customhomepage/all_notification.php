<?php require_once("../../config.php");
include('form_latest_notification.php');
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




//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Home Page All Latest Notification Content');
$PAGE->set_heading('Home Page All Latest Notification Content');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Home Page All Latest Notification Content'), new moodle_url('/blocks/customhomepage/latest_notification.php'));
$PAGE->set_url('/blocks/customhomepage/latest_notification.php');
echo $OUTPUT->header();

?>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php if(!empty($_GET['sucessfully'])){ 

if($_GET['sucessfully']=="delete"){
  ?>

<div class="isa_success" id="sucessfully">Deleted Sucessfully</div>
<?php }else{ ?>
 <div class="isa_success" id="sucessfully">Updated Sucessfully</div> 
<?php
} 
}?>

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


<div class="rowd" style="justify-content: flex-end; margin-bottom: 9px;">
  


<div class="colg"> <a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/latest_notification.php"><button type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add Latest Notification </button></a></div>


</div>


<table id="lessiontable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th >S.l</th>
                <th>Latest Notification Name</th>
            
            
                <th>Edit/Delete</th>
               
                
            </tr>
        </thead>
        <tbody>



<?php $notification = $DB->get_records('customhmp_lnotification'); 
$i=1;
foreach ($notification as $value) {

?>

          <tr>
            <td><?php echo  $i++; ?></td>
            <td><?php echo $value->lnotification_name; ?></td>
           <td> 
                    <ul class="ul_drop">
               
<li><a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/latest_notification.php?id=<?php echo $value->id; ?>" class="btn-info infon">  <i class="fa fa-pencil" aria-hidden="true"></i> </a></li>
<li><a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/delete_notification.php?id=<?php echo $value->id; ?>" class="btn-danger infon">  <i class="fa fa-trash" aria-hidden="true"></i> </a></li>

  
                    </ul> 
                    

                    </td>
          </tr>

<?php } ?>


    
      </tbody>
       
    </table>





<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>



<script>
    
  $('#lessiontable').DataTable();



setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
}, 6000); // <-- time in milliseconds


</script>


<?php
echo $OUTPUT->footer();

?>
