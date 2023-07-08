<?php 
class Login_form
{
protected function index(){
	global $DB, $OUTPUT, $PAGE, $USER,$CFG;	
$html.=html_writer::start_tag('div',array('class' => 'container-fluid'));
$html.=html_writer::start_tag('div',array('class' => 'container'));
$html.=html_writer::start_tag('div',array('class' => 'login_bg'));
$html.=html_writer::start_tag('div',array('class' => 'login_header'));
$html.=html_writer::start_tag('form',array('method' => 'post','action'=>$CFG->wwwroot.'/login/index.php'));
$html.=html_writer::start_tag('div');
$html.=html_writer::tag('h2',get_string('login','block_searchdashboard'),array('class'=>'font-weight-bold'));
$html.= html_writer::end_tag('div');
$html.=html_writer::start_tag('div');
$html.=html_writer::tag('input','',array('type'=>'text','placeholder'=>get_string('enter_your_username','block_searchdashboard'),'name'=>'username','required'=>'true'));
$html.= html_writer::end_tag('div');
$html.=html_writer::start_tag('div');
$html.=html_writer::tag('input','',array('type'=>'password','placeholder'=>get_string('enter_your_password','block_searchdashboard'),'name'=>'password','required'=>'true'));
$html.= html_writer::end_tag('div');
$html.=html_writer::start_tag('div');
$html.=html_writer::tag('button',get_string('login','block_searchdashboard'),array('type'=>'submit','class'=>'login_btn'));
$html.= html_writer::end_tag('div');
$html.=html_writer::end_tag('form');
$html.=html_writer::start_tag('div',array('class'=>'f_password'));
$html.=html_writer::start_tag('a',array('href'=>$CFG->wwwroot.'/login/forgot_password.php'));
$html.=html_writer::tag('span',get_string('forget','block_searchdashboard'),array('class'=>'spanps'));
$html.=html_writer::tag('span','Password ?',array('class'=>'spas'));
$html.=html_writer::end_tag('a');
$html.= html_writer::end_tag('div');
$html.=html_writer::start_tag('div',array('class'=>'text-center'));
$html.=html_writer::tag('span',get_string('or_login_with','block_searchdashboard'),array('class'=>'loginww'));
$html.= html_writer::end_tag('div');
$html.=html_writer::start_tag('a',array('href'=>$CFG->wwwroot.'/auth/oauth2/login.php?id=10&wantsurl=%2F&sesskey='.sesskey()));
$html.=html_writer::start_tag('div');
$html.=html_writer::tag('button',get_string('google','block_searchdashboard'),array('type'=>'button','class'=>'g_btn'));
$html.= html_writer::end_tag('div');
$html.= html_writer::end_tag('a');
$html.=html_writer::start_tag('a',array('href'=>$CFG->wwwroot.'/auth/oauth2/login.php?id=11&wantsurl=%2F&sesskey='.sesskey()));
$html.=html_writer::start_tag('div');
$html.=html_writer::tag('button',get_string('facebook','block_searchdashboard'),array('type'=>'button','class'=>'f_btn'));
$html.= html_writer::end_tag('div');
$html.= html_writer::end_tag('a');
$html.=html_writer::start_tag('div',array('class'=>'text-center mt-3 font-weight-bold under_line'));
$html.=html_writer::tag('span',get_string('donot_h_account','block_searchdashboard'));
$html.=html_writer::tag('a',get_string('get_start','block_searchdashboard'),array('href'=>$CFG->wwwroot.'/user-signup/'));
$html.= html_writer::end_tag('div');
$html.= html_writer::end_tag('div');
$html.= html_writer::end_tag('div');
$html.= html_writer::end_tag('div');
$html.= html_writer::end_tag('div');

	return $html;
}
public function login(){
	return $this->index();
}
public function headerlib($data){
 global $DB, $OUTPUT, $PAGE, $USER,$CFG;
if(isloggedin()){ redirect(new moodle_url($CFG->wwwroot)); }
$html.=get_string('doctype_html','block_searchdashboard');
$html.=html_writer::tag('html','',array('dir'=>'ltr','lang'=>'en','xml:lang'=>'en'));
$html.=html_writer::start_tag('head');
$html.=html_writer::tag('title',$data->title);
$html.=html_writer::start_tag('meta',array('name'=>'description','content'=>$data->description));
$html.=html_writer::start_tag('meta',array('name'=>'keywords','content'=>$data->keywords));
$html.=html_writer::start_tag('meta',array('name'=>'viewport','content'=>'width=device-width, initial-scale=1.0'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','href'=>'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'));
$html.=html_writer::start_tag('link',array('rel'=>'shortcut icon','href'=>$CFG->wwwroot.'/pluginfile.php/1/theme_lambda/favicon/1670156443/favicon.png'));
$html.=html_writer::tag('script','',array('src'=>'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'));
$html.=html_writer::tag('script','',array('src'=>'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','href'=>'https://pro.fontawesome.com/releases/v5.10.0/css/all.css'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','type'=>'text/css','href'=>$CFG->wwwroot.'/theme/lambda/layout/style/customhome.css'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','type'=>'text/css','href'=>$CFG->wwwroot.'/blocks/searchdashboard/css/style.css'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','type'=>'text/css','href'=>'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','type'=>'text/css','href'=>'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'));
$html.=html_writer::start_tag('body');

 $html.=$this->autherror();	
 return $html;
}

protected function autherror(){
	if(!empty($_GET["errorcode"])){
			if($_GET["errorcode"]=='3'){
				  
	$data.=html_writer::start_tag('div',array('class' => 'nerror_msg','style'=>'position: fixed;top: 117px;width: 100%;text-align: center;z-index: 99;','id'=>'selector'));
	$data.=html_writer:: tag('h4',get_string('invalid_username','block_searchdashboard'),array('class' => 'nerror','style'=>'font-size: 14px;background: #ff8686;width: 514px;text-align: center; margin: 0 auto;line-height: 27px;font-weight: 600;'));
	$data.= html_writer::end_tag('div');

	return $data;
				  
			}elseif($_GET["errorcode"]=='4'){
	$data.=html_writer::start_tag('div',array('class' => 'nerror_msg','style'=>'position: fixed;top: 117px;width: 100%;text-align: center;z-index: 99;','id'=>'selector'));
	$data.=html_writer:: tag('h4',get_string('session_expired','block_searchdashboard'),array('class' => 'nerror','style'=>'font-size: 14px;background: #ff8686;width: 372px;text-align: left;margin: 0 auto;line-height: 27px;font-weight: 600;text-indent: 15px;'));
	$data.= html_writer::end_tag('div');

	return $data;
			}
	}
}

public function footerscript(){
	 return $this->footerjs();    
}

protected function footerjs(){
	$footerdata.=html_writer::script('','http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
$fscript='
  jQuery(document).ready(function( $ ) {
  	$("#selector").delay(5000).fadeOut("slow");
  	});
  	';

  	 return $footerdata.=html_writer::script($fscript);  
}

}
