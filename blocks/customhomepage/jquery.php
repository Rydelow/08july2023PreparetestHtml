<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;
if($_POST['action']=="usernamevalid"){
$username=$_POST['username'];
$userrecord=$DB->get_record_sql("SELECT * FROM {user} where `username`='".$username."' or `email`='".$username."'");
if(!empty($userrecord)){
echo "notavl";
}else{
echo "avl";
}
}

if($_POST['action']=="insert_moodle_data"){
require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;
	
	$product = $_POST['md_productID'];
    $course1 = $_POST['mdl_courseID'];
    $record=$DB->get_record('wordpress_data',array('product_id'=>$product,'course_id'=>$course1));
    	if(empty($record)){
    		$data=new stdClass();
    		$data->product_id=$product;
    		$data->course_id=$course1;
    		$data->createdtime=time();
    		$DB->insert_record('wordpress_data', $data,true);
    	}
}

if($_POST['action']=="delete_course"){

	
	$product = $_POST['md_productID'];
    $course1 = $_POST['mdl_courseID'];
    $record=$DB->get_record('wordpress_data',array('product_id'=>$product,'course_id'=>$course1));
    	if(!empty($record)){
    		$eeeid=$record->id;
$DB->delete_records('wordpress_data',array('id'=>$eeeid));
    	}
}


?>