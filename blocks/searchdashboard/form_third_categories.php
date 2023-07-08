<?php

defined('MOODLE_INTERNAL') || die;
require_once($CFG->libdir.'/formslib.php');


class subcategories_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $CFG, $PAGE;
        $this->_form=new MoodleQuickForm($this->_formname, $method='post',"", "", array('id'=>'formvalidationform'),"");
        $mform    = $this->_form;

        $heading= (!empty('edit')) ? 'blockeditsettings' : 'blockaddsettings';

        $mform->addElement('header', 'addusergeneral1', 'Sub Categories');
        $mform->setExpanded('addusergeneral1');
   
        $mform->addElement('hidden', 'id','');
        $mform->addElement('hidden', 'subid','');
        $mform->addElement('text', 'title','Title');
        $mform->setDefault('title', 'Title');

        $mform->addElement('editor', 'contents','Content');



  $radioarray=array();
        $radioarray[] = $mform->createElement('radio', 'iconfiletype', '', 'Svg','svg', $attributes);
        $radioarray[] = $mform->createElement('radio', 'iconfiletype', '','Font Awesome','fontawesome', $attributes);
$mform->addGroup($radioarray, 'radioar', 'File Type', array(' '), false);
 $mform->setDefault('iconfiletype','fontawesome');
$mform->addElement('html', '<div class="or_diao" id="svgdata">');

        
       
        $mform->addElement('filepicker', 'icon_file', get_string('file'), null,
                   array('maxbytes' => $maxbytes, 'accepted_types' => '*'));

$mform->addElement('html', '</div>');

$mform->addElement('html', '<div class="or_diao" id="fontawesomedata">');

 $mform->addElement('text', 'classname','Class Name');
$mform->addElement('html', '</div>');

$mform->addElement('checkbox', 'popular_exams', 'Popular Exams');


      
        if(empty($_GET['id'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                 $mform->addElement('html', '<input type="hidden" name="seo" id="seo"> ');
                $mform->addElement('html', '<div id="fitem_formvalidationbtn" class="form-group row  fitem femptylabel  form-submit">
                <div class="col-md-3 col-form-label d-flex pb-0 pr-md-0">

                <div class="ml-1 ml-md-auto d-flex align-items-center align-self-start">

                </div>
                </div>
                <div class="col-md-9 form-inline align-items-start felement" data-fieldtype="submit" id="yui_3_17_2_1_1668667418917_428">
                <div class="btn btn-primary form-submit" name="submit" id="formvalidationbtn" >Update</div>
                <div class="form-control-feedback invalid-feedback" id="formvalidationbtn">

                </div>
                </div>
                </div>');
                // $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }
    }

  


}



