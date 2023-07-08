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

        $mform->addElement('header', 'addusergeneral1', 'Third Categories');
        $mform->setExpanded('addusergeneral1');
   
        $mform->addElement('hidden', 'id','');
        $mform->addElement('hidden', 'categoriesid','');
        $mform->addElement('text', 'title','Title');
        $mform->setDefault('title', 'Title');

        $mform->addElement('editor', 'contents','Content');

      
        if(empty($_GET['cid'])){
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
                
               //$mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }
    }

  


}



