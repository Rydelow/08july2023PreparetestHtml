<?php require_once("../../config.php");
   global $DB, $OUTPUT, $PAGE, $USER,$CFG;
   $id = optional_param('id', '0', PARAM_INT);
   	
$alldata = $DB->get_record_sql("select st.id,st.title,ss.id as ssid,sc.id as fid, ss.title as sstitle,sc.title as ctitle from {searchda_third} as st INNER JOIN {searchda_secondc} as ss on st.subid=ss.id inner join {searchda_categories} as sc on ss.categoriesid=sc.id WHERE st.id=$id ");

$dataquery = $DB->get_record('other_seo_url',array('url'=>$_SERVER['REQUEST_URI']));
   ?>
<!DOCTYPE html>
<html  dir="ltr" lang="en" xml:lang="en"><head><title><?php echo $dataquery->title; ?></title>
<meta charset="UTF-8">
<meta name="description" content="<?php echo $dataquery->description; ?>">
<meta name="keywords" content="<?php echo $dataquery->keywords; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="//preparetest.com/pluginfile.php/1/theme_lambda/favicon/1670156443/favicon.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot; ?>/theme/lambda/layout/style/customhome.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<style type="text/css">


</style>
<!-- script-exam -->
<header class="bg-dark-blue">
   <div class="container ">
      <div class="row">
         <div class="col-md-12">
            <div class="top-social-icon">
               <ul class="nav navbar-right social-list">
                  <li><a class="nav-link" href=""><i class="fab fa-facebook-f"></i></a></li>
                  <li><a class="nav-link" href=""><i class="fab fa-twitter"></i></a></li>
                  <li><a class="nav-link" href=""><i class="fab fa-instagram"></i></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</header>
<?php   $topbardataone = $DB->get_record('customhmp_top_bar',array('id'=>'1')); 
   $topbardatatwo = $DB->get_record('customhmp_top_bar',array('id'=>'2')); 
   
   ?>
<div class="container">
   <nav class="navbar navbar-light justify-content-between">
      <a class="navbar-brand" href="http://preparetest.com/"><img src="http://preparetest.com/blocks/customhomepage/assets/logo.svg"> </a>
      <ul class="nav navbar-right loc">
         <li class="nav-item item-flex"><a class="nav-link"><img src="http://preparetest.com/theme/lambda/layout/image/Icon feather-phone-call.svg"> <?= $topbardataone->content_one; ?><br><?= $topbardataone->content_two; ?></a>
         </li>
         <li class="item-flex"><a class="nav-link" ><img src="http://preparetest.com/theme/lambda/layout/image/Icon%20feather-map-pin.svg"><?= $topbardatatwo->content_one; ?></a></li>
         <li class=" user"><a class="nav-link pr-0" href="<?php echo $CFG->wwwroot."/login/index.php"; ?>"><i class="fas fa-user-tie mr-2"></i> <span class="login">Login / Register </span><img src="http://preparetest.com/theme/lambda/layout/image/Search.svg" class="float-right"></a> </li>
      </ul>
</div>
</nav>
<section class="bg-img">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light menu-list">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li><a class="nav-link" href="">Home</a></li>
               <li><a class="nav-link" href="">About Us</a></li>
               <li><a class="nav-link" href="">Features</a></li>
               <li><a class="nav-link" href="https://preparetest.com/allcourses/">All Courses</a></li>
               <li><a class="nav-link" href="">Forms</a></li>
               <li><a class="nav-link" href="">Pricing</a></li>
               <li><a class="nav-link" href="">Contact us</a></li>
            </ul>
         </div>
      </nav>
   </div>
</section>
<!--middel-sec-->
<!-- top-nav -->
<div class="TSeries_Breadcrumb">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="TS_breadcrumb_div">
               <li><a target="_self" href="<?php echo $CFG->wwwroot ?>">Home > </a></li>
               <li><a target="_self" href="#"><b>Terms Conditions</b> </a></li>
              <!--  <li><a target="_self" href="#"><?= $alldata->sstitle; ?> > </a></li>
               <li><?= $alldata->title; ?></li> -->
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- top-nav -->
<!-- tems-and -conaction -->
<section class="trem_condaction">
<div class="container">
<div class="row">
   <div class="col-md-12">
      <div class="tre_ms">
         <p class="t_rm_s"><b >Terms and Conditions & Privacy Policy</b></p>
         <p class="t_para">We value your trust. In order to honour that trust, Prepare Test adheres to ethical standards in gathering, using, and safeguarding any information you provide. Arohak Technologies Private Limited, is a leading ed tech company, incorporated in India, for imparting learning. This privacy policy governs your use of the website, www.preparetest.com and the other associated applications, products, websites and services managed by the Company. Please read this privacy policy ('Policy') carefully before using the Application, Website, our services and products, along with the Terms of Use ('TOU') provided on the Website. Your use of the Website, or services in connection with the Website or products ('Services'), or registrations with us through any modes or usage of any products including through SD cards, tablets or other storage/transmitting device shall signify your acceptance of this Policy and your agreement to be legally bound by the same. If you do not agree with the terms of this Policy, do not use the Website, Application our products or avail any of our Services.</p>
      </div>

<div class="tren_co_n">
   <p class="t_head_ing"> <b><span>1.</span> User Provided Information</b></p>
   <p class="t_para">The Application/Website/Services/products obtains the information you provide when you download and register for the Application or Services or products. When you register with us, you generally provide (a) your name, age, email address, location, phone number, password and your ward's educational interests; (b) transaction-related information, such as when you make purchases, respond to any offers, or download or use applications from us; (c) information you provide us when you contact us for help; (d) information you enter into our system when using the Application/Services/products, such as while asking doubts, participating in discussions and taking tests.<br> The said information collected from the users could be categorized as “Personal Information”, “Sensitive Personal Information” and “Associated Information”. Personal Information, Sensitive Personal Information and Associated Information (each as individually defined under this Information Technology (Reasonable security practices and procedures and sensitive personal data or information) Rules,<br> 2011 (the “Data Protection Rules”)) shall collectively be referred to as 'Information' in this Policy. We may use the Information to contact you from time to time, to provide you with the Services, important information, required notices and marketing promotions. We will ask you when we need more information that personally identifies you (personal information) or allows us to contact you. We will not differentiate between who is using the device to access the Application, Website or Services or products, so long as the log in/access credentials match with yours.<br> In order to make the best use of the Application/Website/Services/products and enable your Information to be captured accurately on the Application/Website/Services/products, it is essential that you have logged in using your own credentials.<br> We will, at all times, provide the option to you to not provide the Personal Information or Sensitive Personal Information, which we seek from you. Further, you shall, at any time while using the Application/Services/products, also have an option to withdraw your consent given earlier to us to use such Personal Information or Sensitive Personal Information. Such withdrawal of the consent is required to be sent in writing to us at the contact details provided in this Policy below. <br>In such event, however, the Company fully reserves the right not to allow further usage of the Application or provide any Services/products thereunder to you.</p>
</div>

<div class="tren_co_n">
   <p class="t_head_ing"> <b><span>2.</span> Automatically Collected Information</b></p>
   <p class="t_para">
In addition, the Application/products/Services may collect certain information automatically, including, but not limited to, the type of mobile device you use, your mobile devices unique device ID, the IP address of your mobile device, your mobile operating system, the type of mobile Internet browsers you use,<br>
 and  information about the way you use the Application/Services/products. As is true of most Mobile applications, we also collect other relevant information as per the permissions that you provide. We use an outside credit card processing company to bill you for goods and services. These companies do not retain, share, store or use personally identifiable information for any other purpose.</p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>3.</span> Use of your Personal Information</b></p>
   <p class="t_para">We use the collected Information to analyse trends, to conduct research, to administer the Services and products, to learn about each user's learning patterns and movements around the Services and products and to gather demographic information and usage behaviour about our user base as a whole.<br> Aggregated and individual, anonymized and non-anonymized data may periodically be transmitted to external service providers to help us improve the  products and our Services. We will share your information with third parties only in the ways that are described below in this Policy. <br>We may use the individual data and behavior patterns combined with personal information to provide you with personalized content, and better your learning objectives. Third parties provide certain services which we may use to analyze the data and information to personalize, drive insights and help us better your experience or reach out to you with more value added products, information and services. However, <br>these third party companies do not have any independent right to share this information. We do not sell, trade or share your Information to any third party (except subsidiaries/affiliates of the Company for related offerings) unless, we have been expressly authorized by you either in writing or electronically to do so. <br>We may at times provide aggregate statistics about our customers, traffic patterns, and related site information to reputable third parties, however this information when disclosed will be in an aggregate form and does not contain any of your Personally Identifiable Information. <br>Prepare Test  will occasionally send email notices, messages or contact you to communicate about our Services, products and benefits, as they are considered an essential part of the Services/products you have chosen. We may disclose Information:</p>
    <p class="t_para">
as required by law, such as to comply with a subpoena, or similar legal process;
<br>
to enforce applicable TU, including investigation of potential violations thereof;
<br>
when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, address security or technical issues or respond to a government request;
<br>
with our trusted services providers who work on our behalf, do not have an independent use of the information we disclose to them, and have agreed to adhere to the rules set forth in this Policy;
<br>
to protect against imminent harm to the rights, property or safety of the Website or its users or the public as required or permitted by law;
<br>
with third party service providers in order to personalize the Website/Services/products for a better user experience and to perform behavioural analysis;
<br>
Any portion of the Information containing personal data relating to minors provided by you shall be deemed to be given with the consent of the minor's legal guardian. Such consent is deemed to be provided by your registration with us.

   </p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>4.</span> Access to your Personal Information</b></p>
   <p class="t_para">We will provide you with the means to ensure that your Personal Information is correct and current. If you have filled out a user profile, we will provide an obvious way for you to access and change your profile from our Services/Website/products. We adopt reasonable security measures to protect your password from being exposed or disclosed to anyone.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>5.</span> Cookies</b></p>
   <p class="t_para">We send cookies (small files containing a string of characters) to your computer, thereby uniquely identifying your browser. Cookies are used to track your preferences, help you login faster, and aggregated to determine user trends. This data is used to improve our offerings, such as providing more content in areas of greater interest to a majority of users.<br> Most browsers are initially set up to accept cookies, but you can reset your browser to refuse all cookies or to indicate when a cookie is being sent. Some of our features and services may not function properly if your cookies are disabled.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> Links</b></p>
   <p class="t_para">We may present links in a format that enables us to keep track of whether these links have been followed. We use this information to improve our customized content. Clicking on links may take you to sites outside our domain. We are not responsible for the privacy practices of other web sites.<br> We encourage our users to be aware when they leave our site to read the privacy statements of each and every web site that collects personally identifiable information. This Privacy Policy applies solely to information collected by our Website.</p>
   </div>

<div class="tren_co_n">
   <p class="t_head_ing"> <b><span>7.</span> Alerts</b></p>
   <p class="t_para">We may alert you by email or phone (through sms/call) to inform you about new service offerings of the Company and its subsidiaries/affiliatesor other information which we feel might be useful for you, through the Company or its subsidiaries/affiliates.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>8.</span> Public Forums</b></p>
   <p class="t_para">
When you use certain features on our website like the discussion forums and you post or share your personal information such as comments, messages, files, photos, will be available to all users, and will be in the public domain. All such sharing of information is done at your own risk. Please keep in mind that if you disclose personal information in your profile or when posting on our forums this information may become publicly available.
   </p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>9.</span> Security</b></p>
   <p class="t_para">We are concerned about safeguarding the confidentiality of your Information. We provide physical, electronic, and procedural safeguards to protect Information we process and maintain. For example, we limit access to this Information to authorized employees only who need to know that information in order to operate, develop or improve our Services/products/Website. <br>Please be aware that, although we endeavor to provide reasonable security for information we process and maintain, no security system can prevent all potential security breaches.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>10.</span> How Long Do We Retain User Data?</b></p>
   <p class="t_para">Currently, we plan to retain user data while an account is active and for at least three years afterward. We may alter this practice according to legal and business requirements. For example, we may lengthen the retention period for some data if needed to comply with law or voluntary codes of conduct.<br> Unless otherwise prohibited, we may shorten the retention period for some types of data if needed to free up storage space.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>11.</span> Log information</b></p>
   <p class="t_para">When you access our Website, our servers automatically record information that your browser sends whenever you visit a website. These server logs may include information such as your web request, internet protocol address, browser type, browser language, the date and time of your request and one or more cookies that may uniquely identify your browser.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>12.</span> User communications</b></p>
   <p class="t_para">When you send an email or other communication to us, we may retain those communications in order to process your inquiries, respond to your requests and improve our Services.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>13.</span> Changes to this Statement</b></p>
   <p class="t_para">As the Company evolves, our privacy policy will need to evolve as well to cover new situations. You are advised to review this Policy regularly for any changes, as continued use is deemed approval of all changes.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>14.</span> Your Consent</b></p>
   <p class="t_para">We believe that, every user of our Services/products/Website must be in a position to provide an informed consent prior to providing any Information required for the use of the Services/products/Website. By registering with us, you are expressly consenting to our collection, processing, <br>storing, disclosing and handling of your information as set forth in this Policy now and as amended by us. Processing, your information in any way, including, but not limited to, collecting, storing, deleting, using, combining, sharing,<br> transferring and disclosing information, all of which activities will take place in India. If you reside outside India your information will be transferred, processed and stored in accordance with the applicable data protection laws of India.</p>
   </div>
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>15.</span> Contact Information</b></p>
   <p class="t_para">Our Grievance Officer shall undertake all reasonable efforts to address your grievances at the earliest possible opportunity. You may contact us at Address:5 th floor, IT HUB, Khammam – 507002, Telangana, India. Reach out to us on support@preparetest.com, in case of any queries.</p>
   </div>


   <div class="tre_ms">
         <p class="t_rm_s"><b > Privacy Policy</b></p>
         <p class="t_para">These Terms & Conditions (“Terms”) of (a) use of our website www.preparetest.com (“Website”) or any products or services in connection with the Website/products (“Services”)  or (b) any modes of registrations or usage of products, including through SD cards, tablets or other storage/transmitting device  are between Arohak Technologies Private Limited(“Company/We/Us/Ours) and its users (“User/You/Your”).
            <br>
         These Terms constitute an electronic record in accordance with the provisions of the Information Technology Act, 2000 and the Information Technology (Intermediaries guidelines) Rules, 2011 thereunder, as amended from time to time.
          <br>
         Please read the Terms and the privacy policy of the Company (“Privacy Policy”) with respect to registration with us, the use of the Application, Website, Services and products carefully before using the Website, Services or products. In theevent of any discrepancy between the Terms and any other policies with respect to the Website or Services or products, the provisions of the Terms shall prevail.</p>
      </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>1.</span> User</b></p>
   <p class="t_para"></p>
   </div>
<!-- 
   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div>

   <div class="tren_co_n">
   <p class="t_head_ing"> <b><span>6.</span> User</b></p>
   <p class="t_para"></p>
   </div> -->


   </div>
</div>
</div>

</section>
<!-- tems-and -conaction -->
<footer class="bg-prepare mt-5 pt-5 pb-4">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="footer-content">
               <div class="footer-logo text-white">
                  <img src="http://preparetest.com/blocks/customhomepage/assets/bottom_logo.svg" class="img-fluid">
                  <div class="footer-caption pt-3">
                     <?php $sug=array(unserialize($footer_data->footer_content));
                        foreach ($sug as $vall){ $footerdesc= $vall['text'];}
                        echo $footerdesc;  ?> 
                  </div>
               </div>
               <div class="footer-social">
                  <ul>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/fb_footer.svg"></a></li>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/twitter_footer.svg"></a></li>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/insta_footer.svg"></a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="address text-white">
               <span>Address</span>
               <div class="address-list pt-3">
                  <ul>
                     <li> <a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/map.svg"><?= $footer_data->location; ?></a></li>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/phone.svg"> <?= $footer_data->phone; ?></a></li>
                     <li><a href=""><img src="http://preparetest.com/blocks/customhomepage/assets/Icon%20ionic-ios-mail.svg"> <?= $footer_data->email; ?></a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="footer-links text-white">
               <span>Quick links</span>
               <div class="quick_list pt-3">
                  <ul>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Home </a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">About Us</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Features</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Blogs</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Forums</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Pricing</a></li>
                     <li><i class="fal fa-chevron-right"></i> <a href="">Contact Us</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <hr class="border-top pt-2 pb-2">
      <div class="copyright-text text-white text-center w-100">
         <span>Copyright 2021 PrepareTest. All Rights Reserved.</span>
      </div>
   </div>
</footer>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
   jQuery(document).ready(function( $ ) {
   	$('.counter').counterUp({
   		delay: 10,
   		time: 1000
   	});
   
   });
   
   
</script>

<!-- eaxm-point -->