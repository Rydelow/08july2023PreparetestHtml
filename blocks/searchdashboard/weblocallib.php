<?php 
class weblocallib
{
protected function headerindex(){
	global $DB, $OUTPUT, $PAGE, $USER,$CFG;	
	return $h=include('header.php');
}

public function header(){
	return $this->headerindex();
}

protected function footerindex(){
	global $DB, $OUTPUT, $PAGE, $USER,$CFG;	
		return include('footer.php');
}
public function footer(){
	return $this->footerindex();
}

}