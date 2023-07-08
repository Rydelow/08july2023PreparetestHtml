<?php require_once("../../config.php");
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
$PAGE->set_title('Home Page Choose Our Examp');
$PAGE->set_heading('Home Page Choose Our Examp');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Home Page Choose Our Examp'), new moodle_url('/blocks/customhomepage/choose_our_examp.php'));
$PAGE->set_url('/blocks/customhomepage/choose_our_examp.php');
echo $OUTPUT->header();

?>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
if(!empty($_POST['value_data']))
{
	$arra=array();
	$dataff=$DB->get_records_sql('SELECT * FROM {customhmp_cooseexamp}');
	foreach ($dataff as $values) {
	$arra[]=$values->course_id;
	}
	$newarray=array();
	 foreach ($_POST['course_id'] as $key) 
	  {

	    $newarray[]=$key;
		$data=new stdClass();
		$data->course_id= $key;
		$dataff=$DB->get_record_sql('SELECT * FROM {customhmp_cooseexamp} where course_id='.$key);
		if(empty($dataff->id)){
		$DB->insert_record('customhmp_cooseexamp',$data,true);
		}

	}
		$results=array_diff($arra,$newarray);
		if(!empty($results)){
			foreach ($results as $valuedelete) {
			$sql=$DB->delete_records('customhmp_cooseexamp',array('course_id'=>$valuedelete));
			}
		}

	redirect($CFG->wwwroot."/blocks/customhomepage/choose_our_examp.php?sucessfully=update");	
}

?>


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
div#lessiontable_filter {
    display: none;
}
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



<form method="post">

<table id="lessiontable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th >S.l</th>
                <th>Course Name</th>
            
            
                <th> Select All <input type="checkbox"  class="checkboxx" id="select-all"> </th>
               
                
            </tr>
        </thead>
        <tbody>



<?php 
$coursedata = $DB->get_records("course", array("visible"=>1));
$i=1;
foreach ($coursedata as $datavalue) {
  $dataf=$DB->get_record_sql('SELECT * FROM {customhmp_cooseexamp} where course_id='.$datavalue->id);
 ?>


          <tr>
            <td><?php echo  $i++; ?></td>
            <td><?php echo $datavalue->fullname; ?></td>
           <td> 
                    <ul class="ul_drop">
               
<li> <input type="checkbox" <?php if($dataf->course_id==$datavalue->id){ echo "checked='true'"; }    ?>  value="<?php echo $datavalue->id; ?>" name="course_id[]" class="checkboxx">  </li>


  
                    </ul> 
                    

                    </td>
          </tr>

<?php } ?>


    
      </tbody>
       
    </table>
<input type="submit" value="submit" name="value_data">
</form>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>



<script>
    


$('#select-all').click(function(event) {
  if (this.checked) {
    $(':checkbox').prop('checked', true);
  } else {
    $(':checkbox').prop('checked', false);
  }
});


  $('#lessiontable').DataTable({
        "aLengthMenu": [ [500, 1000, 1500,1500, -1], [500, 1000, 1500, "All"] ],
        "sPaginationType": "full_numbers",
        "pageLength": 500
      });



setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
}, 6000); // <-- time in milliseconds


</script>


<?php
echo $OUTPUT->footer();

?>
