<?php
require_once("../../config.php");
	global $DB,$OUTPUT,$CFG,$PAGE;
	echo $OUTPUT->header();
	$PAGE->requires->jquery();
	require_login();

	?>

	<div>Thanks for registration</div>
	<!--<a href="<?php echo $CFG->wwwroot; ?>">Goto dashboard</a>-->
	<script type="text/javascript">
		$(function(){
			setTimeout(function(){
				window.location.href="<?php echo $CFG->wwwroot; ?>";
			},2000);
		});
	</script>
	<?php
	echo $OUTPUT->footer();
?>