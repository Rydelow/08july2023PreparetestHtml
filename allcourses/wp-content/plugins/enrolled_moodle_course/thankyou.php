<?php
get_header();
global $wpdb;
$mdllist="SELECT moodleurl FROM " .$wpdb->prefix. "moodledetail WHERE id=1";
$mdllists = $wpdb->get_row($mdllist);
$mdlurl =$mdllists->moodleurl;
$orderid = $_GET['order'];
$order = new WC_Order($orderid);
// Get an instance of the WC_Order object
$order = wc_get_order( $orderid );
$order_data =$order->get_meta_data();  


$redirect_url=get_post_meta( $orderid, 'redirect_url', true );
$userid=get_post_meta( $orderid, 'userid', true );
$base=get_post_meta( $orderid, 'base', true );
$baseid=get_post_meta( $orderid, 'baseid', true );
$u_fname=get_post_meta( $orderid, 'billing_first_name', true );
$u_lname=get_post_meta( $orderid, 'billing_last_name', true );
$u_email=get_post_meta( $orderid, 'billing_email', true );
$coursename = "lds test quiz test test";
$senddata = array('action'=>$base,           
					"redirect_url"=>$redirect_url,
					"userid"=>$userid,
					"actionid"=>$baseid
);  
 $querproname = "SELECT * FROM " .$wpdb->prefix. "woocommerce_order_items WHERE order_id='".$orderid."'";
 $productdatarec = $wpdb->get_row($querproname);
 $coursename = $productdatarec->order_item_name;

$lastdata=strtr(base64_encode(addslashes(gzcompress(serialize($senddata),9))), '+/=', '-_,');

?>


<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			global $current_user, $wpdb;
			get_currentuserinfo();
			if ($current_user->ID != 0) {
				$userid = $current_user->ID;
				$orderid = $_REQUEST['order'];
				//get user details
				$admin_email = get_option( 'admin_email' );
				$user_info = get_userdata($userid);
				$user_meta = get_user_meta($userid);			
				$username = $user_info->user_login;
				$useremail = $user_info->user_email;
				$userfullname = $user_info->display_name;
				$fname = get_user_meta($userid, 'billing_first_name', true ); 
				$lname = get_user_meta($userid, 'billing_last_name', true ); 
				$complanyname = get_user_meta($userid, 'billing_company', true ); 
			   } else {
				$orderid = $_REQUEST['order'];
				$order = new WC_Order($orderid);
				$useremail = $order->billing_email;
				$userfullname = $order->billing_first_name . ' ' . $order->billing_last_name;
				$username = $order->billing_first_name;
				$fname = $order->billing_first_name;
				$lname = $order->billing_last_name;
				$complanyname = $order->billing_company;
			}



			$results = $wpdb->get_results("SELECT * FROM  " . $wpdb->prefix . "woocommerce_order_items WHERE order_id = '" . $orderid . "'");
			 $count = count($results);
			if ($count > 1) {
				$result = $wpdb->get_results("
				SELECT order_item_id FROM  " . $wpdb->prefix . "woocommerce_order_items WHERE order_id = '" . $orderid . "' ORDER BY order_item_id ASC");
			} else {
				$result = $wpdb->get_results("SELECT order_item_id FROM  " . $wpdb->prefix . "woocommerce_order_items WHERE order_id = '" . $orderid . "'");
			}
			$coursearray = array();
			foreach ($result as $data) {
				array_push($coursearray, $data->order_item_id);
			}
			$implode = implode(",", $coursearray);
			$productids = $wpdb->get_results("
				SELECT meta_value 
				FROM  " . $wpdb->prefix . "woocommerce_order_itemmeta
					WHERE order_item_id IN($implode) AND meta_key='_product_id'
			 ");
			$productarr = array();

			foreach ($productids as $productid) {
				array_push($productarr, $productid->meta_value);
			}
			 $implodepr = implode(",", $productarr);
			$mcourseid = getcourse($implodepr);




			function getcourse($implodepr) {
				global $wpdb;
				$courseids = $wpdb->get_results("
						SELECT courseid 
						FROM  " . $wpdb->prefix . "wootomoodle
							WHERE productid IN($implodepr)
					 ");

				$coursearr = array();
				foreach ($courseids as $courseid) {
					array_push($coursearr, $courseid->courseid);
				}
				$implodecr = implode(",", $coursearr);
				return $implodecr;
			}

		  //  echo '$username='.$username.',$useremail='.$useremail.',$implodecr='.$mcourseid.',$userfullname='.$userfullname.',$fname='.$fname.',$lname='.$lname.',$complanyname='.$complanyname;
			//die; 




	   $to      = "suneet@lds-international.in";
	   $subject = "Payment Confirmation Details"; 
// To send HTML mail, the Content-type header must be set
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// Additional headers
		$headers .= 'From: no-reply@preparetest.com' . "\r\n";	 
		//$headers .= 'Cc: '.$u_email.'' . "\r\n";
				
// Compose a simple HTML email message 
		 $message = '<html><body>';
		$message .= "<p style='font-size:14px;'>Hi ".$u_fname. ' ' .$u_lname." ,<p>";
		$message .= "<p style='font-size:14px;'>Thanks for purchase <a href='".$redirect_url."' a>".$redirect_url."</p>";
		$message .= "<p style='font-size:16px;'><b>Purchase Details</b></p>";
		$message .= "<p style='font-size:14px;'><b>User email : </b><span>".$u_email."</span></p>";
		$message .= "<p style='font-size:14px;'><b>Course Name : </b><span>".$coursename."</span></p>";
		$message .= "<p style='font-size:14px;'><b>Amount : </b><span>". $order->total ."</span></p>";
		$message .= "<p style='font-size:14px;'><b>Payment method : </b><span>". $order->payment_method ."</span></p>";

		$message .= "<p style='font-size:18px;'>Thanks</p>";

		$message .= '</body></html>';

// Sending email

 $sent = wp_mail( $to, $subject, $message, $headers );
 $message;
  if($sent) {
    $status='send';
	  }
//message sent!
	  else  {
   $status=0;	
	  } 

			?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

			<?php if(empty($redirect_url)){ ?>
			<script>
				 $(document).ready(function () {
				   var user                = "<?php echo base64_encode($username); ?>";
					var email               = "<?php echo base64_encode($useremail); ?>";
				   var course             = "<?php echo base64_encode($mcourseid); ?>";
					var displayname     = "<?php echo base64_encode($userfullname); ?>";
					var firstname          = "<?php echo base64_encode($fname); ?>";
				   var lastname           = "<?php echo base64_encode($lname); ?>";
					var admin_email           = "<?php echo base64_encode($admin_email); ?>"; 
					 var mdlurl                = "<?php echo $mdlurl; ?>";
					 window.location.href = mdlurl+"/local/mdl_course_enroll/enrollcourse.php?user=" + user + "&email=" + email + "&course=" + course + "&name=" + displayname + "&firstname=" + firstname + "&lastname=" + lastname + "&admin_email=" + admin_email;
				 }); 




			</script>

			  <div>
		   <center>     <b>Please Check your Register Email id We have send lms login credential and  Please wait You are about to redirect in our learning system...</p></center>
			</div>

		<?php }else{ 



			?>

<center>Payment Sucessfully</center>
 <script>
				 $(document).ready(function () {
		 
					 window.location.href ="https://preparetest.com/blocks/searchdashboard/internal.php?base=<?php echo $lastdata; ?>";
				 }); 




			</script>


		<?php } ?> 

		  


		</main>
	</div>
</div>

<?php
get_footer();
