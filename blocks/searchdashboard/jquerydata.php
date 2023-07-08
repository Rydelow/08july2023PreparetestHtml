<?php class jquerydata
{
	public function usernamevalidate($data){
		 return $this->useravl($data);
	}
	protected function useravl($data){
	 global $DB, $OUTPUT, $PAGE, $USER,$CFG; 
		if($data['action']=='usernamevalid'){
			$userrecord=$DB->get_record_sql("SELECT * FROM {user} where `username`='".$data['username']."' or `email`='".$data['username']."'");
			if(!empty($userrecord)){
			echo "notavl";
			}else{
			echo "avl";
			}
		}
			
	}
	// public function retriveuseravl(){
	// 	 $r=$this->useravl();
	// 	 print_r($r);
	// }

}