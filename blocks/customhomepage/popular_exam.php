<?php 
require_once("../../config.php");


global $DB, $OUTPUT, $PAGE, $USER,$COURSE;




if (empty($USER->id)) {
	redirect($CFG->wwwroot);
}
if (is_siteadmin()) {


} else {
	redirect($CFG->wwwroot);}
//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Popular Exam Sorting');
$PAGE->set_heading('Popular Exam Sorting');
$loginsite = 'Popular Exam Sorting';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Popular Exam Sorting'), new moodle_url('/blocks/customhomepage/popular_exam.php'));
$PAGE->set_url('/blocks/customhomepage/popular_exam.php');
echo $OUTPUT->header();

?>


<?php if(!empty($_GET['sucessfully'])){ ?>
<div class="isa_success" id="sucessfully">Sucessfully <?php echo $_GET['sucessfully']; ?></div>
<?php } ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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

.Nhm-popularDiv {
    text-align: center;
    width: 202px;
    display: inline-flex;
    padding: 25px 11px;
    background: white;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    margin: 2px 8px 5px 8px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 14%), 0 6px 20px 0 rgb(0 0 0 / 8%);
}.Nw_ExmPopular {
    display: block;
    width: 100%;
    text-decoration: none;
    outline: none;
    text-decoration: none;
}.Nw_ExmPopular p {
    color: #262626;
    font-size: 16px;
    margin: 0 10px 1px 10px;
    height: 62px;
    line-height: 20px;
}.Nw_ExmPoprIcon img {
    margin: 0px auto 7px;
    height: 88px;
    width: 100px;
}
#loader{
  display: none;
}
</style>






<center>

<div id="loader"> 
<span class="loder"><img src="<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/image/loaded.gif" alt="gif"></span>
</div>

</center>

<section class="popular" id='menu1'>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2 class="Nhm_heading-1 mt-0 Nhm_heading-2 ng-binding">Popular Exams </h2>
            </div>
            <div class="col-md-10">
               <div class="cours_e">
                 <?php $dataquery = $DB->get_records('searchda_third',array('status'=>0,'popular_exams'=>1),'sorting asc');
        $i=1;
        foreach ($dataquery as $value) { ?>

                   <div class="Nhm-popularDiv ng-scope dk" ng-repeat="popularExam in popularExamsData">
                    <a target="_top" href="<?php echo $CFG->wwwroot; ?>/blocks/searchdashboard/exam_explore.php?id=<?php echo $value->id; ?>" class="Nw_ExmPopular">
                    <span class="Nw_ExmPoprIcon">

                   

<?php if($value->iconfiletype=='svg'){
$fileinfo = $DB->get_record_sql("SELECT * FROM {files} WHERE itemid=$value->icon_file and filename!='.'");
                      if(!empty($fileinfo->filename)){
                      $backgrounddata=$CFG->wwwroot.'/local/file.php/'.$fileinfo->pathnamehash.'/0/'.$fileinfo->filename;
 ?>
        <img class="img-responsive lozad"  src="<?= $backgrounddata ?>"  > 
<?php } } ?>
<?php if($value->iconfiletype=='fontawesome'){ ?>

          <i class="fa <?=$value->classname; ?>" aria-hidden="true"></i> 
<?php } ?>




                    </span>
                    <p ng-bind="popularExam.name" class="ng-binding"><?php echo$value->title; ?></p>
                    </a>
                    <div class="overout">
                      <input type="text" width="150" value="<?php echo$value->sorting; ?>" class="abc" data-id="<?php echo $value->id; ?>">
                  
                       </div>
                    </div>
                 
                    
        <?php } ?>
    

               </div>
            </div>
        </div>
    </div>

</section>


<div id="sucessfullydata" class="isa_success"></div>





<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"> </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>



<?php
echo $OUTPUT->footer();

?>
<style type="text/css">
    .Nhm-popularDiv {
    text-align: center;
    width: 202px;
    display: inline-block!important;
    padding: 25px 11px;
    background: white;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    margin: 2px 8px 5px 8px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 14%), 0 6px 20px 0 rgb(0 0 0 / 8%);
}
.overout input {
    width: 130px;
}

</style>
<script>
$(function(){
  $('#sucessfullydata').css('display','none');
    $('.abc').change(function(){
       var sorting=$(this).val();
       var id=$(this).attr("data-id");
       $.ajax({
    type: "POST",
    url: "<?php echo $CFG->wwwroot; ?>/blocks/searchdashboard/ajaxdata.php",
    data: { 'action':'sortingdata','sorting': sorting,'id':id },
    cache: false,
    beforeSend: function() {
     $('#loader').css('display','block');
      $('#menu1').css('display','none');
  },
  complete: function(){
     $('#loader').css('display','none');
      $('#menu1').css('display','block');
  },
    success: function(data)
        {
          
          $('#loader').css('display','none');
          $('#menu1').css('display','block');
$('#sucessfullydata').css('display','block');
            $('#sucessfullydata').html(data);

          $("#sucessfullydata").fadeOut(3500);
        }
    }); 




    });
});

 

</script>