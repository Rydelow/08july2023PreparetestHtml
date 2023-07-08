<?php 
require_once($CFG->dirroot . '/user/editlib.php');
require_once($CFG->libdir . '/authlib.php');
class Signup_form
{

public function emailMatch($email){
     global $DB, $OUTPUT, $PAGE, $USER,$CFG; 
$userrecord=$DB->get_record_sql("SELECT * FROM {user} where `username`='".$email."' or `email`='".$email."'");
            if(!empty($userrecord)){
            $avl="notavl";
            }else{
            $avl= "avl";
            }
    return $avl;
}

protected function usernamevalidate($username){
     global $DB, $OUTPUT, $PAGE, $USER,$CFG; 
$userrecord=$DB->get_record_sql("SELECT * FROM {user} where `username`='".$username."' or `email`='".$username."'");
            if(!empty($userrecord)){
            $avl="notavl";
            }else{
            $avl= "avl";
            }
    return $avl;
}
protected function usernamecheck($username){
    if($this->usernamevalidate($username)=="notavl"){
      return "User name already registered";  
    }
}
protected function passwordmatch($password,$cpassword){
    if($password==$cpassword){
      return "pass";  
    }
}

protected function formdatas(){
    $data=new stdclass();
    if(!empty($_POST['signup'])){
        if(!empty($_POST['username'])){
          $data->username=$this->usernamecheck($_POST['username']);
              if($data->username=="User name already registered"){
                        $data->fname=$_POST['fname'];
                        $data->username=$_POST['username'];
                        $data->lname=$_POST['lname'];
                        $data->email=$_POST['email'];
                        $data->password=$_POST['password'];
                        $data->cpassword=$_POST['cpassword'];
                        $data->city=$_POST['city'];
                        $data->countryname=$_POST['countryname'];

                    if($this->passwordmatch($_POST['password'],$_POST['cpassword'])=="pass"){

                    }else{
                        $data->passworderror="Password Not Match";
                    }

              }elseif($this->passwordmatch($_POST['password'],$_POST['cpassword'])!="pass"){
                        $data->fname=$_POST['fname'];
                        $data->username=$_POST['username'];
                        $data->lname=$_POST['lname'];
                        $data->email=$_POST['email'];
                        $data->password=$_POST['password'];
                        $data->cpassword=$_POST['cpassword'];
                        $data->city=$_POST['city'];
                        $data->countryname=$_POST['countryname'];
                    if($this->passwordmatch($_POST['password'],$_POST['cpassword'])=="pass"){

                    }else{
                        $data->passworderror="Password Not Match";
                    }

              }elseif($this->emailMatch($_POST['email'])=="notavl"){
                        $data->fname=$_POST['fname'];
                        $data->username=$_POST['username'];
                        $data->lname=$_POST['lname'];
                        $data->email=$_POST['email'];
                        $data->password=$_POST['password'];
                        $data->cpassword=$_POST['cpassword'];
                        $data->city=$_POST['city'];
                        $data->countryname=$_POST['countryname'];
                         $data->emailerror="Email address already registered";
                    if($this->passwordmatch($_POST['password'],$_POST['cpassword'])=="pass"){

                    }else{
                        $data->passworderror="Password Not Match";
                    }

              }

              if(empty($data->passworderror) && empty($data->emailerror) && empty($data->username)){
                  $data->firstname=$_POST['fname'];
                        $data->username=$_POST['username'];
                        $data->lastname=$_POST['lname'];
                        $data->email=$_POST['email'];
                        $data->password=md5($_POST['password']);
                        $data->cpassword=$_POST['cpassword'];
                        $data->city=$_POST['city'];
                        $data->countryname=$_POST['countryname'];
                        $data->register="preparetest";
                        $data->emailerror="";
               $r=$this->signuppost($data);
    if($r){
      global $CFG,$DB,$SESSION;
       $userdata = $DB->get_record("user", array("id"=>$r));
                       complete_user_login($userdata);
          \core\session\manager::apply_concurrent_login_limit($userdata->id, session_id());


 $redirecturl=$SESSION->wantsurl;
                     if(empty($redirecturl)){
                        $redirecturl=$CFG->wwwroot.'/user-login/';
                      
                     }
                      redirect($redirecturl);
                      exit();
     }
              }else{
                 return $data;
              }
                      




            

               
        }




    }


}

protected function signuppost($getdata){
global $DB, $OUTPUT, $PAGE, $USER,$CFG;
  if($getdata->register=="preparetest"){
    
    $getdata->mnethostid= 1;
    //$newuserdata= signup_setup_new_user($getdata);
    //$getdata->confirmed=$newuserdata->secret; 
     $getdata->auth="manual";
     $getdata->confirmed= 1;
    $postrecord=$DB->insert_record('user',$getdata);
     return $data=$this->mailconfirm($postrecord);
     
   
   }
}
protected function mailconfirm($id){
global $DB, $OUTPUT, $PAGE, $USER,$CFG;
    $data=$this->userdata($id);
    $to = $data->email;
$messagehtml = "
<html>
<head>
<title></title>
</head>
<body>
<p>Dear ".$data->firstname.",</p>
<p>Greetings from Prepare Test</p>
<p>Hope you are doing well!</p>

<p>Thank You for Registering with <a href='".$CFG->wwwroot."'><b>Prepare Test</b>.</a></p>

<p>In <a href='".$CFG->wwwroot."'><b>Prepare Test</b></a>,  We have various categories of Examinations such as Previous Year Papers, Practice Papers, Mock Tests and lot more. Each and every Test Paper is prepared by well Qualified Subject Matter Experts.</p>

<p>Please also refer to your friends, family and the known people in your circles so that it will strengthen us.<p>
<p><a href='".$CFG->wwwroot."'><b>".$CFG->wwwroot."</b>.</a></p>
<p>
What are you waiting for? Login into your account and start practicing for the Examination.
All the very best for your coming days.
<p>
<br>

Preparetest
</body>
</html>";

$fromUser = "notification@preparetest.com";
      $subject = "Greetings from Prepare Test";
          $emailuser = new stdClass();
          $emailuser->email = $data->email;
         $emailuser->maildisplay = true;
       $emailuser->mailformat = 1; 
       $emailuser->id = 1;
       $emailuser->firstnamephonetic = false;
       $emailuser->lastnamephonetic = false;
       $emailuser->middlename = false;
       $emailuser->username = false;
       $emailuser->alternatename = false;
  $dataemail=email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);
return $id;

}

protected function redirectpage($id){
    global $DB, $OUTPUT, $PAGE, $USER,$CFG;
    $data=$this->userdata($id);
return '<style>div#notice p {
  
    margin-bottom: 3px;
}
</style><div id="notice" class="box py-3 generalbox"><p>An email should have been sent to your address at <b>'.$data->email.'</b></p>
   <p>It contains easy instructions to complete your registration.</p>
   <p>If you continue to have difficulty, contact the site administrator.</p></div>
   <div class="create_btn">
                <div class="text-f">
               <a href="'.$CFG->wwwroot.'"> <button class="btn btn-primary btn-custom"  value="signup" type="submit">Continue</button></a>
                </div>
            </div>';
}

protected function confirmmationdata($data){
return $this->redirectpage($data);
}
protected function confirmemaildata($id){
    $data.=html_writer::start_tag('section');
$data.=html_writer::start_tag('div', array('class' => 'container'));
$data.=$this->confirmmationdata($id);
$data.= html_writer::end_tag('div');
$data.=html_writer::end_tag('section');
return $data;
}
public function dataconfirmation($id){
    global $DB, $OUTPUT, $PAGE, $USER,$CFG;
        if(!empty($id)){
        $record=$this->userdata($id);
        if(!empty($record)){
            return $this->confirmemaildata($id);
        }else{
         return redirect(new moodle_url($CFG->wwwroot));
        }

    }else{
        return redirect(new moodle_url($CFG->wwwroot));
    }
}

protected function userdata($id){
global $DB, $OUTPUT, $PAGE, $USER,$CFG;
return $userdata = $DB->get_record("user", array("id"=>$id));
}
protected function index(){
    $data=$this->formdatas();

if(!isloggedin()){
    if(empty($data->username)){
        
        $username='<div class="error" id="usernameerror"></div>';
       
    }else{
      if($this->usernamecheck($_POST['username'])=='User name already registered'){
        $username='<div class="error" id="usernameerror">'.$this->usernamecheck($_POST['username']).'</div>';
      }
    }




    if(!empty($data->emailerror)){
  $em='<div class="error" id="emailmessage">'.$data->emailerror.'</div>';
}else{
  $em='<div class="error" id="emailmessage"></div>';

}
}
    if(!empty($data->username)){
        $uname=$data->username;
    }
    if(!empty($data->fname)){
        $fname=$data->fname;
    }
    if(!empty($data->lname)){
        $lname=$data->lname;
    }
    if(!empty($data->email)){
        $email=$data->email;
    }
    if(!empty($data->password)){
        $password=$data->password;
    }
    if(!empty($data->cpassword)){
        $cpassword=$data->cpassword;
    }
    if(!empty($data->city)){
        $city=$data->city;
    }
    if(!empty($data->countryname)){
        $countryname=$data->countryname;
    }
$html.='<style>.errorform{ color:red; }.error{color:red;}</style>';
$html.=html_writer::start_tag('section');
$html.=html_writer::start_tag('div',array('class'=>'container'));
$html.=html_writer::start_tag('div',array('class'=>'container_head signuphe'));
$html.=html_writer::start_tag('div',array('class'=>'bg'));
$html.=html_writer::start_tag('div',array('class'=>'form-header'));
$html.=html_writer::start_span() .''.get_string('create_account','block_searchdashboard').''. html_writer::end_span();
$html.=html_writer::end_tag('div');
$html.=html_writer::start_tag('div',array('class'=>'form-container-head'));
$html.=html_writer::start_tag('div',array('class'=>'form-container'));
$html.=html_writer::start_tag('form',array('class'=>'action','method'=>'post','autocomplete'=>'false'));
$html.=html_writer::start_tag('div');
$html.=html_writer::label('user name','','',array('class'=>'label'));   
$html.=html_writer::start_tag('input',array('type'=>'text','name'=>'username','value'=>$uname,'placeholder'=>get_string('enter_your_username','block_searchdashboard'),'required'=>'true','autocomplete'=>'false'));
$html.=$username;
$html.=html_writer::end_tag('div');

$html.=html_writer::start_tag('div',array('class'=>'inputs'));
$html.=html_writer::start_tag('div',array('class'=>'input-length'));
$html.=html_writer::label(get_string('first_name','block_searchdashboard'),'','',array('class'=>'label')); 
$html.=html_writer::start_tag('input',array('type'=>'text','name'=>'fname','value'=>$fname,'placeholder'=>get_string('enter_your_first_name','block_searchdashboard'),'required'=>'true'));
$html.=html_writer::end_tag('div');
$html.=html_writer::start_tag('div',array('class'=>'input-length'));
$html.=html_writer::label(get_string('last_name','block_searchdashboard'),'','',array('class'=>'label')); 
$html.=html_writer::start_tag('input',array('type'=>'text','name'=>'lname','value'=>$lname,'placeholder'=>get_string('enter_your_last_name','block_searchdashboard'),'required'=>'true'));
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('div');

$html.=html_writer::start_tag('div',array('class'=>'inputs'));
$html.=html_writer::start_tag('div',array('class'=>'input-length w-100'));
$html.=html_writer::label(get_string('email','block_searchdashboard'),'','',array('class'=>'label')); 
$html.=html_writer::start_tag('input',array('type'=>'email','name'=>'email','value'=>$email,'placeholder'=>get_string('enter_your_email','block_searchdashboard'),'required'=>'true'));
$html.=$em;
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('div');
$html.=html_writer::start_tag('div',array('class'=>'inputs'));
$html.=html_writer::start_tag('div',array('class'=>'input-length'));
$html.=html_writer::label(get_string('password','block_searchdashboard'),'','',array('class'=>'label')); 
$html.=html_writer::start_tag('input',array('type'=>'password','name'=>'password','value'=>$password,'placeholder'=>get_string('enter_confirm_password','block_searchdashboard'),'required'=>'true','autocomplete'=>'new-password'));
$html.=html_writer::div('', 'errorform', array('id' => 'passworderror'));
$html.=html_writer::end_tag('div');
$html.=html_writer::start_tag('div',array('class'=>'input-length'));
$html.=html_writer::label(get_string('confirm_password','block_searchdashboard'),'','',array('class'=>'label'));
$html.=html_writer::start_tag('input',array('type'=>'password','name'=>'cpassword','value'=>$cpassword,'placeholder'=>get_string('enter_your_cpassword','block_searchdashboard'),'required'=>'true')); 
$html.=html_writer::div('', 'errorform', array('id' => 'cpassworderror'));
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('div');

$html.=html_writer::start_tag('div',array('class'=>'inputs'));
$html.=html_writer::start_tag('div',array('class'=>'input-length'));
$html.=html_writer::label(get_string('city_town','block_searchdashboard'),'','',array('class'=>'label'));
$html.=html_writer::start_tag('input',array('type'=>'text','name'=>'city','value'=>$city,'placeholder'=>get_string('enter_city_town','block_searchdashboard'),'required'=>'true')); 
$html.=html_writer::end_tag('div');
$html.=html_writer::start_tag('div',array('class'=>'input-length'));
$html.=html_writer::label(get_string('country','block_searchdashboard'),'','',array('class'=>'label'));
$html.=html_writer::start_tag('input',array('type'=>'text','name'=>'countryname','value'=>$countryname,'placeholder'=>get_string('enter_country_name','block_searchdashboard'),'required'=>'true')); 
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('div');

$html.=html_writer::start_tag('div',array('class'=>'create_btn'));
$html.=html_writer::start_tag('div',array('class'=>'text-right'));
$html.=html_writer::tag('button',get_string('create','block_searchdashboard'),array('class'=>'btn btn-primary btn-custom','id'=>'button','value'=>'signup','name'=>'signup','type'=>'submit'));
$html.=html_writer::end_tag('div');
$html.=html_writer::start_tag('div',array('class'=>'text-right'));
$html.=html_writer::start_span() .''.get_string('already_a_member','block_searchdashboard').''. html_writer::end_span();
$html.=html_writer::tag('a',strtolower(get_string('login','block_searchdashboard')),array('href'=>$CFG->wwwroot.'/user-login/'));
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('form');
                       
                
     
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('div');      


$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('div');
$html.=html_writer::end_tag('section');

return $html;
}
public function signup(){
    return $this->index();
}

public function headerlib($data){
 global $DB, $OUTPUT, $PAGE, $USER,$CFG;    
if(isloggedin()){ redirect(new moodle_url($CFG->wwwroot)); }
$html.=get_string('doctype_html','block_searchdashboard');
$html.=html_writer::tag('html','',array('dir'=>'ltr','lang'=>'en','xml:lang'=>'en'));
$html.=html_writer::start_tag('head');
$html.=html_writer::tag('title',$data->title);
$html.=html_writer::start_tag('meta',array('name'=>'viewport','content'=>'width=device-width, initial-scale=1.0'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','href'=>'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'));
$html.=html_writer::tag('script','',array('src'=>'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'));
$html.=html_writer::tag('script','',array('src'=>'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','href'=>'https://pro.fontawesome.com/releases/v5.10.0/css/all.css'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','type'=>'text/css','href'=>$CFG->wwwroot.'/theme/lambda/layout/style/customhome.css'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','type'=>'text/css','href'=>$CFG->wwwroot.'/blocks/searchdashboard/css/style.css'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','type'=>'text/css','href'=>'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'));
$html.=html_writer::start_tag('link',array('rel'=>'stylesheet','type'=>'text/css','href'=>'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'));
$html.=html_writer::start_tag('body');
return $html;
}

protected function footerjs(){
     global $DB, $OUTPUT, $PAGE, $USER,$CFG;    
  $footerdata.=html_writer::script('','http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
  $regexdata="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
$fscript='
  jQuery(document).ready(function( $ ) {
     $("#button").on("click", function () {
        var username=$(\'[name="username"]\').val();
        var password=$(\'[name="password"]\').val();
        var cpassword=$(\'[name="cpassword"]\').val();
        var email=$(\'[name="email"]\').val();
        
        mpassword(password,cpassword);
        passwordmatch(password,cpassword);
      
    });

 
  
   $(\'[name="cpassword"]\').on("keyup", function () {
    var password=$(\'[name="password"]\').val();
    var cpassword=$(this).val();
        passwordmatch(password,cpassword);
   });

   $(\'[name="password"]\').on("keyup", function () {
       var password=$(this).val();
    var cpassword=$(\'[name="cpassword"]\').val();
        mpassword(password,cpassword);
   });

});

function mpassword(password,cpassword){
    if(password.length>0){
       $("#passworderror").html("");
            if(cpassword.length>0){
                     if (password == cpassword) {
                         $("#passworderror").html(""); 
                          $("#cpassworderror").html("");  
                            $("#button").removeAttr("disabled");
                     }else{
                        $("#button").attr("disabled", true);
                       $("#passworderror").html("Password Not Match");  
                     }
                }else{
                    $("#cpassworderror").html("");  
                }  
    }else{
        $("#passworderror").html("Enter Your Password"); 
    }
}
function passwordmatch(password,cpassword){
    if(password.length>0){
            if(cpassword.length>0){
                 if (password == cpassword) {
                     $("#cpassworderror").html("");  
                      $("#passworderror").html(""); 
                        $("#button").removeAttr("disabled");
                 }else{
                    $("#button").attr("disabled", true);
                   $("#cpassworderror").html("Password Not Match");  
                 }
            }else{
                $("#cpassworderror").html("");  
            }
        }else{
            $("#passworderror").html("Enter Your Password");
        }
}


';



 return $footerdata.=html_writer::script($fscript);  

}
public function footerscript(){
 return $this->footerjs();    
}



}