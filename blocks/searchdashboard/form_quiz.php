<?php

defined('MOODLE_INTERNAL') || die;
require_once($CFG->libdir.'/formslib.php');


class subcategories_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $CFG, $PAGE,$DB;
$topbardata = $DB->get_record('searchda_third',array('id'=>$_GET['id']));

        $mform    = $this->_form;

        $heading= (!empty('edit')) ? 'blockeditsettings' : 'blockaddsettings';
        $mform->addElement('html', '<div id="alldataFtech">');
        $mform->addElement('header', 'addusergeneral1', 'Quizzes Title Section');
        $exam_categorydata=$DB->get_records_sql("SELECT * FROM `mo_exam_categories` where status='Active' and deleted='1'");
        foreach ($exam_categorydata as $value) {
            $examCate[$value->id]=$value->name;
        }
        $select = $mform->addElement('select', 'exam_category','Exam Category', $examCate);
        $statedata['India']='India';
        $exam_statedata=$DB->get_records_sql("SELECT * FROM `mo_exam_state` where status='Active' and deleted='1'");
        foreach ($exam_statedata as $statevalue) {
            $statedata["state-".$statevalue->id]=$statevalue->state_title;
        }
        $exam_city=$DB->get_records_sql("SELECT * FROM `mo_exam_city` where status='Active' and deleted='1'");
        foreach ($exam_city as $cityvalue) {
            $citydata["city-".$cityvalue->id]=$cityvalue->name;
        }
        $exam_district=$DB->get_records_sql("SELECT * FROM `mo_exam_district` where district_status='Active' and deleted='1'");
        foreach ($exam_district as $districtvalue) {
            $districtdata["district-".$districtvalue->id]=$districtvalue->district_title;
        }

        $areanames=array_merge($statedata,$citydata,$districtdata);
                                                                                                                                 
        $options = array(                                                                                                           
        'multiple' => true,                                                  
        'noselectionstring' => 'Select State,City and District',                                                                
        );         
        $mform->addElement('autocomplete', 'areaids','Select State,City and District', $areanames, $options);

        
        $mform->setExpanded('addusergeneral1');
        $mform->addElement('hidden', 'thid','');
        $mform->addElement('hidden', 'postid','');
        $mform->addElement('hidden', 'id','');
        $mform->addElement('hidden', 'oldexamcity','');

         $mform->addElement('text', 'offer','Offer Title');
        
$options = array(
    '0' => 'Lock',
    '1' => 'Free Test'  
);
$select = $mform->addElement('select', 'quiz_type','Test Type', $options);

        $mform->addElement('text', 'title','Title');
        $mform->setDefault('title', $topbardata->title.' Exam - Quiz');

        $mform->addElement('date_time_selector', 'duedate','Date', array('optional' => true));
       
        $mform->addElement('header', 'addusergeneral', 'Question Section');
        $mform->setExpanded('addusergeneral');


        $mform->addElement('text', 'question','Title');
        $mform->setDefault('question', 'Question');

         $mform->addElement('text', 'qmark','Mark');
        $mform->setDefault('qmark', '20');


 $mform->addElement('header', 'addusergener', 'Mark Section');
        $mform->setExpanded('addusergener');


        $mform->addElement('text', 'mark','Title');
        $mform->setDefault('mark', 'Marks');

         $mform->addElement('text', 'qumark','Title');
        $mform->setDefault('qumark', '20');


$mform->addElement('header', 'addusergener', 'Minute Section');
        $mform->setExpanded('addusergener');

         $mform->addElement('text', 'minute','Title');
        $mform->setDefault('minute', 'Minute');

        $mform->addElement('text', 'qminute','Mark');
        $mform->setDefault('qminute', '20');

        $mform->addElement('text', 'price','Price');
        
          $mform->addElement('text', 'moodleurl','Moodle Quiz Url');

      
        if(empty($_GET['cid'])){
       $mform->addElement('html', '
<div id="fitem_id_submit" class="form-group row  fitem femptylabel  form-submit">
    <div class="col-md-3 col-form-label d-flex pb-0 pr-md-0">
        
        <div class="ml-1 ml-md-auto d-flex align-items-center align-self-start">
            
        </div>
    </div>
    <div class="col-md-9 form-inline align-items-start felement" data-fieldtype="submit" id="yui_3_17_2_1_1627277495500_267">
            <div class="btn btn-primary form-submit" id="inserData">Submit</div>
        <div class="form-control-feedback invalid-feedback" id="id_error_submit">
            
        </div>
    </div>
</div>');
            }else{
              $mform->addElement('html', '


<div id="fitem_id_submit" class="form-group row  fitem femptylabel  form-submit">
    <div class="col-md-3 col-form-label d-flex pb-0 pr-md-0">
        
        <div class="ml-1 ml-md-auto d-flex align-items-center align-self-start">
            
        </div>
    </div>
    <div class="col-md-9 form-inline align-items-start felement" data-fieldtype="submit" id="yui_3_17_2_1_1627277495500_267">
            <div class="btn btn-primary form-submit" id="updateData">Submit</div>
        <div class="form-control-feedback invalid-feedback" id="id_error_submit">
            
        </div>
    </div>
</div> ');
            }


            $mform->addElement('html', '</div>');
    }

  


}



