<?php 
require_once("../../config.php");

include('form_general_exam.php');
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;

$id = optional_param('id', '0', PARAM_INT);
$cid = optional_param('cid', '0', PARAM_INT);
$table= base64_decode(optional_param('base', '0', PARAM_RAW));
if(!empty($table)){
$data=$DB->get_record($table,array('id'=>$id));
}else{
  $data="";
}




if (empty($USER->id)) {
	redirect($CFG->wwwroot);
}
if (is_siteadmin()) {


} else {
	redirect($CFG->wwwroot);}
//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title(' Section');
$PAGE->set_heading(' Section');
$loginsite = 'Header Section';
//$PAGE->navbar->add($loginsite);


echo $OUTPUT->header();

?>




<style type="">
  .paginate_button {
  border-radius: 0 !important;
}

.edit1 {
    display: inline-block;
}
.edit1 {
    font-size: 24px;
    font-weight: 600;
}
.edit{
margin-top: 7px;
}
.edit a {
     color: #5f5f5f;
    margin-right: 6px;
    margin-left: 8px;
    margin-top: 15px;
    font-size: 16px;
}
.edit a :hover{
  text-decoration: none;
}
.he_ader {
      margin-bottom: 46px;
    margin-top: 27px;
}
.block ul.block_tree a, .block_book_toc li a, .block_site_main_menu li a, .breadcrumb a, .instancename, .navbottom .bookexit, .navbottom .booknext, .navbottom .bookprev {
    color: #555;
    font-size: 14px;
}

.dataTables_wrapper .dataTables_filter input {
    margin-left: 0.5em;
    height: 40px;
 /*   border-bottom: 2px solid #503b3b;*/
    border: 1px solid #503b3b;;
    /*border-top: none;
    border-left: none;
    border-right: none;*/
}
.eyes i {
    color: #b1afaf;margin-right: 10px;
}

.del i {
    color: red;margin-right: 10px;
}


table.dataTable tbody th, table.dataTable tbody td {
    padding: 17px 14px;
}
.he_ader {
    box-shadow: 0px 0px 8px 0px #b1b1b1 ;
       padding: 13px 23px;
    border-radius: 16px;
}
.dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate{
  padding-top: 16px;
}


/*@media only screen and(max-width: 568px){*/
@media screen and (max-width: 568px) {
  .edit1 {
    font-size: 12px;
    font-weight: 600;
}
.edit a{
      color: #5f5f5f;
    margin-right: 5px;
    margin-left: 5px;
    margin-top: 15px;
    font-size: 14px!important;

}
.he_ader {
   padding: 13px 16px;
  }





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
    padding-right: 11px;
    padding-left: 5px;
    line-height: 29px;
    border-radius: 4px;
}

tr.myststus{
  color: #b1acac;
}

.ic_o_n.text-center a {
    padding-right: 15px;
}

</style>

<link rel="stylesheet" media="mediatype and|not|only (expressions)" href="print.css">
<div class="container">
<?php if(!empty($_GET['id'])){ 
  ?>

    <div class="row">
        <div class="col-md-10">
            <div class="he_ader ">
               <div class="edit1 ">
             <?php echo $data->title; ?> General Instruction Section
               </div>

       </div>
    </div>
</div>
<?php } ?>

<div class="row">
  <div class="col-md-10">
    <?php $mform = new subcategories_form(); 



$topbardataa = $DB->get_record('searchda_general_exam',array('id'=>$cid));
//echo $topbardata->slider_content['text'];
// $mform->set_data($topbardata);
$setdata = new stdClass();
$setdata->id = $topbardataa->id;
$setdata->postid = $data->postid;
$setdata->tablebase = $table;
$setdata->tableid = $id;
$setdata->section_number=$topbardataa->section_number;
$setdata->no_of_question=$topbardataa->no_of_question;
$setdata->maximam_marks=$topbardataa->maximam_marks;
$setdata->nagative_marks=$topbardataa->nagative_marks;
$setdata->positive_marks=$topbardataa->positive_marks;

$mform->set_data($setdata);



if ($mform->is_cancelled()) {
  redirect($CFG->wwwroot);
} else if ($fromform = $mform->get_data()) {
  // print_r($fromform);
  // die();



  if(empty($fromform->id)){

  $topbar_slider=new stdClass();
$topbar_slider->postid = $fromform->postid;
$topbar_slider->tablebase = $fromform->tablebase;
$topbar_slider->tableid = $fromform->tableid;
$topbar_slider->section_number=$fromform->section_number;
$topbar_slider->no_of_question=$fromform->no_of_question;
$topbar_slider->maximam_marks=$fromform->maximam_marks;
$topbar_slider->nagative_marks=$fromform->nagative_marks;
$topbar_slider->positive_marks=$fromform->positive_marks;
$topbar_slider->createdtime=time();


$DB->insert_record('searchda_general_exam', $topbar_slider,true);
redirect($CFG->wwwroot."/blocks/searchdashboard/gernal_instruction.php?sucessfully=inserted&id=".$fromform->tableid.'&base='.base64_encode($fromform->tablebase));

  }else{
 
  $topbar_slider=new stdClass();
  $topbar_slider->id=$fromform->id;
$topbar_slider->postid = $fromform->postid;
$topbar_slider->tablebase = $fromform->tablebase;
$topbar_slider->tableid = $fromform->tableid;
$topbar_slider->section_number=$fromform->section_number;
$topbar_slider->no_of_question=$fromform->no_of_question;
$topbar_slider->maximam_marks=$fromform->maximam_marks;
$topbar_slider->nagative_marks=$fromform->nagative_marks;
$topbar_slider->positive_marks=$fromform->positive_marks;
  $topbar_slider->modifiedtime=time();
  $DB->update_record('searchda_general_exam', $topbar_slider,true);
  
redirect($CFG->wwwroot."/blocks/searchdashboard/gernal_instruction.php?id=".$fromform->tableid."&sucessfully=updated&base=".base64_encode($fromform->tablebase));
}



}



$mform->display();


?>


  </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"> </script>


<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
  
 
  
  var table = $('#example').DataTable({ 
        select: false,
        "columnDefs": [{
            className: "Name", 
            "targets":[0],
            "visible": false,
            "searchable":false
        }]
    });//End of create main table

  
//   $('#example tbody').on( 'click', 'tr', function () {
   
//     alert(table.row( this ).data()[0]);

// } );
});

</script>


<script>
 

  setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
  }, 6000); // <-- time in milliseconds


</script>


<?php
echo $OUTPUT->footer();

?>
