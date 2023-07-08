<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;

$id = optional_param('id',0, PARAM_INT);
if(!empty($id)) {
    $topbardata = $DB->get_record('customhmp_top_bar',array('id'=>$id));

}
if(empty($USER->id)){
	redirect($CFG->wwwroot);
}
if(is_siteadmin())
{
    
    
}
else
{redirect($CFG->wwwroot);}

if(!empty($_POST['update_topbar'])){

$topbar_content=new stdClass();

$topbar_content->content_one=$_POST['content_one'];

$topbar_content->content_two=$_POST['content_two'];
$topbar_content->id=$id;
$topbar_content->timemodified=time();

$DB->update_record('customhmp_top_bar', $topbar_content,true);
redirect($CFG->wwwroot."/blocks/customhomepage/topbar_content.php?sucessfully=update");

}


//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Home Page Top Bar Content');
$PAGE->set_heading('Home Page Top Bar Content');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Home Page Top Bar Content'), new moodle_url('/blocks/customhomepage/topbar_content.php'));
$PAGE->set_url('/blocks/customhomepage/topbar_content.php');
echo $OUTPUT->header();

?>
<!-- Latest compiled and minified CSS -->



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php if(!empty($_GET['sucessfully'])){ ?>
<div class="isa_success" id="sucessfully">Updated Sucessfully</div>
<?php } ?>
<?php if(!empty($_GET['id'])){ ?>
<div class="container-fluid search-table">
	<form action="" method="post">
            <div class="search-box">
                <div class="row">
                	<h4>Edit Home Page Topbar Content</h4>
                </div>
                
                    <div class="rowd no_padding_class">
             <div class="col-md-3d">
					<label> <?php if($_GET['id']=="1"){ echo "Phone Number"; }else{ echo "Address"; } ?> </label>
				</div>
                     <div class="col-md-7d">

                      <input type="text"  id="search" class="form-control devi" name="content_one" value="<?php echo $topbardata->content_one; ?>">
                        
                    </div> 
                     </div>

<?php if($_GET['id']=="1"){ ?>
                     <div class="rowd no_padding_class">
             <div class="col-md-3d">
					<label>Email-Id </label>
				</div>
                     <div class="col-md-7d">

                      <input type="text"  id="search" class="form-control devi" name="content_two" value="<?php echo $topbardata->content_two; ?>">
                        
                    </div> 
                     </div>
<?php } ?>

                   
        <div class="rowd no_padding_class">
                       <div class="col-md-3 ">
                   <input  type="submit" class="btn btn-" value="Update" name="update_topbar">
                    </div> 
                    </div> 
               
            </div>

</form>


     </div>
 <?php } ?>
<br/>

<table id="lessiontable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
             
                <th>Top Bar Content</th>
                  <th></th>    
                <th>Actions</th>
               
                
            </tr>
        </thead>
        <tbody>
           <?php  
           $instancesql = $DB->get_records('customhmp_top_bar',array());
          
           foreach ($instancesql as $instancedata){ 
                   $i++;
                  
          ?>
          
       
            <tr id="lesson_hidden<?= $instancedata->id ?>" >
            
                <td> <span class="cont"><?php if($i=="1"){ echo "Phone : "; }else{ echo"Address : "; } ?>  </span><?php echo $instancedata->content_one; ?></td>
                 <td><span class="cont"> <?php if($i=="1"){ echo "Email-Id :"; }else{ echo""; } ?> </span><?php echo $instancedata->content_two; ?></td>
             
                <td>
                    <ul class="ul_drop">
               
<li><a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/topbar_content.php?id=<?= $instancedata->id ?>"  class="btn-info infon">  <i class="fa fa-pencil" aria-hidden="true"></i> </a></li>

                    </ul> 
                    

                    </td>
                
            </tr>
           <?php } ?>
           
        </tbody>
       
    </table>

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
                
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</style>
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
  


<script>
    

setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
}, 6000); // <-- time in milliseconds


</script>


<?php
echo $OUTPUT->footer();

?>
