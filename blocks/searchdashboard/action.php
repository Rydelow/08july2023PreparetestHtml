<?php 
require_once("../../config.php");
include("jquerydata.php");

global $DB, $OUTPUT, $PAGE, $USER,$COURSE;
if($_REQUEST['action']=="usernamevalid")
{
$jquerydata=new	jquerydata();
$jquerydata->usernamevalidate($_REQUEST);
}