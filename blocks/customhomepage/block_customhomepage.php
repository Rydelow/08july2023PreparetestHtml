<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

class block_customhomepage extends block_list {
    function init() {
        $this->title = get_string('pluginname', 'block_customhomepage');
        // $this->title = "Learning Plan reminder";
    }

    function get_content () {
        global $USER, $CFG, $DB, $SESSION, $OUTPUT,$COURSE;
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content         = new stdClass;
        $this->content->items  = array();
        $this->content->icons  = array();
        $this->content->footer = '';
        $spacer = array('height'=>1, 'width'=> 4); 
		$topic = array('height'=>2);
        $subtopic = array('height'=>1, 'width'=> 15);
        $pointearned_content='Home Page ';
         $content="";
         $content.="
         	        

         ";
         $this->content->items[]=$content;
if(is_siteadmin()){
 $topbar_content = $CFG->wwwroot . '/blocks/customhomepage/topbar_content.php';
 $this->content->items[] = html_writer::tag('a', get_string('topbarcontent', 'block_customhomepage'), array('href' => $topbar_content));
 }
 if(is_siteadmin()){
 $topbar_slider = $CFG->wwwroot . '/blocks/customhomepage/slider_content.php';
 $this->content->items[] = html_writer::tag('a', get_string('slidercontent', 'block_customhomepage'), array('href' =>$topbar_slider));

$news_content = $CFG->wwwroot . '/blocks/customhomepage/news.php';
$this->content->items[] = html_writer::tag('a', get_string('news', 'block_customhomepage'), array('href' =>$news_content));

$all_content = $CFG->wwwroot . '/blocks/customhomepage/all_notification.php';
$this->content->items[] = html_writer::tag('a', get_string('latest_notification', 'block_customhomepage'), array('href' =>$all_content));

$latest_co = $CFG->wwwroot . '/blocks/customhomepage/upcoming_notification.php';
$this->content->items[] = html_writer::tag('a', get_string('upcoming_notification', 'block_customhomepage'), array('href' =>$latest_co));


$wel_come_to = $CFG->wwwroot . '/blocks/customhomepage/wel_come_to.php';
$this->content->items[] = html_writer::tag('a', get_string('wel_come_to', 'block_customhomepage'), array('href' =>$wel_come_to));

$awesome_features = $CFG->wwwroot . '/blocks/customhomepage/awesome_features.php';
$this->content->items[] = html_writer::tag('a', get_string('awesome_features', 'block_customhomepage'), array('href' =>$awesome_features));

$choose_our_examp = $CFG->wwwroot . '/blocks/customhomepage/choose_our_examp.php';
$this->content->items[] = html_writer::tag('a', get_string('choose_our_examp', 'block_customhomepage'), array('href' =>$choose_our_examp));

$all_testimonial = $CFG->wwwroot . '/blocks/customhomepage/all_testimonial.php';
$this->content->items[] = html_writer::tag('a', get_string('all_testimonial', 'block_customhomepage'), array('href' =>$all_testimonial));

$footer_inhome = $CFG->wwwroot . '/blocks/customhomepage/footerinhomepage.php';
$this->content->items[] = html_writer::tag('a', get_string('footer_inhome', 'block_customhomepage'), array('href' =>$footer_inhome));

$this->content->items[]="<br><h5 id='instance-92-header' style='width:100%;padding-right: 36px !important;' class='card-title d-inline'>Notification</h5><br>";

$userdata = $CFG->wwwroot . '/blocks/customhomepage/notification_user.php';
$this->content->items[] = html_writer::tag('a','<i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Notification User', array('href' =>$userdata));

$this->content->items[]="<br><h5 id='instance-92-header' style='width:100%;padding-right: 36px !important;' class='card-title d-inline'>Popular Exams</h5><br>";

$userdata = $CFG->wwwroot . '/blocks/customhomepage/popular_exam.php';
$this->content->items[] = html_writer::tag('a','<i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Sorting Exams', array('href' =>$userdata));

// $support = $CFG->wwwroot . '/blocks/customhomepage/edit_support.php';
// $this->content->items[] = html_writer::tag('a', get_string('support', 'block_customhomepage'), array('href' =>$support));

// $about_uscontent = $CFG->wwwroot . '/blocks/customhomepage/edit_about_uscontent.php';
// $this->content->items[] = html_writer::tag('a', get_string('about_uscontent', 'block_customhomepage'), array('href' =>$about_uscontent));


 }


		       
        
       	return $this->content;
    }

 }


