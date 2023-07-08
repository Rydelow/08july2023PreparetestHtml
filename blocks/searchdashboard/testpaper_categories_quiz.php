<?php 
require_once("../../config.php");

include('form_testpaper_quiz.php');
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;




$cid = optional_param('cid', '0', PARAM_INT);
$id = optional_param('id', '0', PARAM_INT);
$quizcategories = optional_param('quizcategories', '0', PARAM_INT);
$testpaperid = optional_param('testpaper', '0', PARAM_INT);

$topbardata = $DB->get_record('searchda_third',array('id'=>$id));
$currentpagedata = $DB->get_record('searchda_quiz_section_ca',array('id'=>$quizcategories));

if (empty($USER->id)) {
	redirect($CFG->wwwroot);
}
if (is_siteadmin()) {


} else {
	redirect($CFG->wwwroot);}
//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Quiz Section');
$PAGE->set_heading('Quiz Section');
$loginsite = 'Quiz Section';
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
.loder{
    text-align: center;
        display: block;
}
   .loder img {
    width: 6%;
}
#sucessfully{
	display: none;
}
</style>

<link rel="stylesheet" media="mediatype and|not|only (expressions)" href="print.css">

<div class="isa_success" id="sucessfully">Sucessfully</div>

<div class="container">
<?php if(!empty($_GET['id'])){ 
  ?>

    <div class="row">
        <div class="col-md-10">
            <div class="he_ader ">
               <div class="edit1 ">
              <?php echo $currentpagedata->title; ?> Add Quiz Section
               </div>

               <div class="edit pull-right"> 
       <a href="<?php echo $CFG->wwwroot."/blocks/searchdashboard/exam_explore.php?id=".$id; ?>"><b>Back</b></a> 
       
      </div>

       </div>
    </div>
</div>
<?php } ?>

<div class="row">
  <div class="col-md-10">

<div id="loader" style="display: none"> 
<span class="loder"><img src="https://preparetest.com/theme/lambda/layout/image/loading.gif" alt="gif"></span>
</div>

    <?php $mform = new subcategories_form(); 



$topbardataa = $DB->get_record('searchda_testpaper_quiz',array('id'=>$cid));
//echo $topbardata->slider_content['text'];
// $mform->set_data($topbardata);
$setdata = new stdClass();
$setdata->thid = $id;
$setdata->postid = $topbardataa->postid;
$setdata->id = $cid;
$setdata->testpaperid = $testpaperid;
$setdata->quizcategories = $quizcategories;
$setdata->quiz_type = $topbardataa->quiz_type;
$setdata->title=$topbardataa->title;
$setdata->duedate=$topbardataa->duedate;
$setdata->question=$topbardataa->question;
$setdata->qmark=$topbardataa->qmark;
$setdata->mark=$topbardataa->mark;
$setdata->qumark=$topbardataa->qumark;
$setdata->minute=$topbardataa->minute;
$setdata->qminute=$topbardataa->qminute;
$setdata->price=$topbardataa->price;
$setdata->moodleurl=$topbardataa->moodleurl;
$setdata->createdtime=time();
$mform->set_data($setdata);



if ($mform->is_cancelled()) {
  redirect($CFG->wwwroot);
} else if ($fromform = $mform->get_data()) {
 

}



$mform->display();


?>


  </div>
</div>
</div>
<input type="hidden" id="currenturl" name="currenturl" value="<?php echo $CFG->wwwroot."/blocks/searchdashboard/exam_explore.php?id=".$id;?>">

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




$('#updateData').click(function () {
   var postid=$('input[name=postid]').val();
   var id=$('input[name=id]').val();
   var title=$('input[name=title]').val();
   var thid=$('input[name=thid]').val();
   var duedate=$('#id_duedate_day').val();
   var duemonth=$('#id_duedate_month').val();
   var dueyear=$('#id_duedate_year').val();
   var duehour=$('#id_duedate_hour').val();
   var duemin=$('#id_duedate_minute').val();
   
   var date=duedate+"-"+duemonth+"-"+dueyear+" "+duehour+":"+duemin;

   var question=$('input[name=question]').val();
   var qmark=$('input[name=qmark]').val();
   var mark=$('input[name=mark]').val();
   var qumark=$('input[name=qumark]').val();
   var minute=$('input[name=minute]').val();
   var qminute=$('input[name=qminute]').val();
   var price=$('input[name=price]').val();
   var moodleurl=$('input[name=moodleurl]').val();
   var quizcategories=$('input[name=quizcategories]').val();
   var quiz_type=$('#id_quiz_type').val();
   var testpaperid=$('input[name=testpaperid]').val();
  if($('#id_duedate_enabled').is(":checked")){

}else{
var date="";
}

   $.ajax({
    type: "POST",
    url: "<?php echo $CFG->wwwroot; ?>/allcourses/wp-content/plugins/customlds/ajax.php",
    data: { 'action':'updateproduct','title':title,'price':price,'postid':postid },
    cache: false,
    beforeSend: function() {
     $('#loader').css('display','block');
     $('#alldataFtech').css('display','none');
     
  },
  complete: function(){
     $('#loader').css('display','none');
       $('#alldataFtech').css('display','block');
  },
    success: function(data)
        {
         
         var postid=data;
			if (postid) {



								$.ajax({
						    type: "POST",
						    url: "<?php echo $CFG->wwwroot; ?>/blocks/searchdashboard/ajaxdata.php",
						    data: { 'action':'testpaper_categoriesupdateproduct','title':title,'duedate': date,'question':question,'qmark':qmark,'mark':mark,'qumark':qumark,'minute':minute,'qminute':qminute,'price':price,'postid':postid,'moodleurl':moodleurl,'thid':thid,'id':id,'quiz_type':quiz_type,'quizcategories':quizcategories,'testpaperid':testpaperid },
						    cache: false,
						    success: function(ndata)
						        {
						 window.location.href=$('#currenturl').val();

						
						 	$('#sucessfully').css('display','block');
    


						
						        	 }
   								 });


			}

        }
    });

  

} );




  
  $('#inserData').click(function () {
   var title=$('input[name=title]').val();
   var thid=$('input[name=thid]').val();
   var duedate=$('#id_duedate_day').val();
   var duemonth=$('#id_duedate_month').val();
   var dueyear=$('#id_duedate_year').val();
   var duehour=$('#id_duedate_hour').val();
   var duemin=$('#id_duedate_minute').val();
   
   var date=duedate+"-"+duemonth+"-"+dueyear+" "+duehour+":"+duemin;

   var question=$('input[name=question]').val();
   var qmark=$('input[name=qmark]').val();
   var mark=$('input[name=mark]').val();
   var qumark=$('input[name=qumark]').val();
   var minute=$('input[name=minute]').val();
   var qminute=$('input[name=qminute]').val();
   var price=$('input[name=price]').val();
   var moodleurl=$('input[name=moodleurl]').val();
   var quizcategories=$('input[name=quizcategories]').val();
   var quiz_type=$('#id_quiz_type').val();
var testpaperid=$('input[name=testpaperid]').val();
  if($('#id_duedate_enabled').is(":checked")){

}else{
var date="";
}

   $.ajax({
    type: "POST",
    url: "<?php echo $CFG->wwwroot; ?>/allcourses/wp-content/plugins/customlds/ajax.php",
    data: { 'action':'createproduct','title':title,'price':price },
    cache: false,
    beforeSend: function() {
     $('#loader').css('display','block');
     $('#alldataFtech').css('display','none');
     
  },
  complete: function(){
     $('#loader').css('display','none');
       $('#alldataFtech').css('display','block');
  },
    success: function(data)
        {
         
         var postid=data;
			if (postid) {



								$.ajax({
						    type: "POST",
						    url: "<?php echo $CFG->wwwroot; ?>/blocks/searchdashboard/ajaxdata.php",
						    data: { 'action':'testpaper_categoriescreateproduct','title':title,'duedate': date,'question':question,'qmark':qmark,'mark':mark,'qumark':qumark,'minute':minute,'qminute':qminute,'price':price,'postid':postid,'moodleurl':moodleurl,'thid':thid,'quiz_type':quiz_type,'quizcategories':quizcategories,'testpaperid':testpaperid },
						    cache: false,
						    success: function(ndata)
						        {
						  $("form").trigger('reset');      	
						$('form')[0].reset();

						
						 	$('#sucessfully').css('display','block');
    
window.location.href=$('#currenturl').val();

						
						        	 }
   								 });


			}

        }
    });

  

} );
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
