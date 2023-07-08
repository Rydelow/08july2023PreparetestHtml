<?php require(__DIR__ . '/../../../config.php'); 
   global $DB, $OUTPUT, $PAGE, $USER,$CFG;
   require_once('/var/www/html/blocks/searchdashboard/header.php'); 
   ?>
<?php 
require_once('/var/www/html/theme/lambda/layout/classes/Home.php');
$homedata=new Home();
echo $homedata->homeview(); 
require_once('/var/www/html/blocks/searchdashboard/footer.php'); 
?>
<script src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/js/customhome.js"></script>

