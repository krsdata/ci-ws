<!DOCTYPE html>
	<!--<div id="indb_map"  style="width:100%; height:100%"></div>-->
<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">			
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,900' rel='stylesheet' type='text/css'>
		<title>Free As Air</title>		
		<?php echo $this->load->view('viewcss');?>		
	<style type="text/css">
		html { height: 100% }
		body { height: 100%; margin: 0; padding: 0 }
		#map_canvas { height: 100% }
	</style>
		</head>		
		<body>
			<!-- Google Tag Manager -->
			<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MGVT9X"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-MGVT9X');</script>
		<!-- End Google Tag Manager -->

		<section class="mainBanner-top" data-type="parallax_section" data-speed="10">
        <section id="section11" class="myNavi bottm-nav">
		<div class="container">
            <div class="row">
			<nav class="navbar navbar-default ">
                <div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						<a class="navbar-brand" href="<?php echo base_url();?>"><img data-at2x="images/logo1@2x.png"  src="images/logo1.png" alt="" /></a> </div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
						<li><a href="#section1" class="scroll" >Hotspots </a></li>
						<li><a href="#section2" class="scroll">How to connect</a></li>
						<li><a href="#section3" class="scroll">Contact</a></li>
						<li><span class="contact-no"><i class="fa fa-phone"></i> 91111-57474</span></li>
					 </ul>
                    </div>
				</div>
            </nav>
		</div>
    </div>
	</section>
    <div class="top-bnr-btm container">
		<div class="col-sm-5 imgleft wow  fadeInLeft animated">
            <div class="map-top"> 
        <!--<div class="find-lc"> <a href="#" class="find-lc-btn">FIND LOCATION</a> </div>--> 
			<img src="images/phone-iocn.png" alt="icon"> </div>
            </div>
			<div class="col-sm-7 imgtxt wow  fadeInRight animated">
              <h2> Free Internet Access</h2>
              <p class="believe-txt">We believe access to the Internet is a birthright.  
        Download our app and gain access to free 
        Internet across Indore.</p>
              <div class="app-btn-box"> <a href="https://play.google.com/store/apps/details?id=com.freeasair.wifi&hl=en" target="_blank" class="app-btn"><img src="images/google-play-logo.png"  alt="app logo"></a> </div>
              <div class="get-txt">
        <p>Get the App Link through SMS: </p>
		<div id="send_msg"></div>
        <div class="fields-inp" id="fields-inp">
                  <form name="form1" method="post" action="">
            <div class="drop-icon"> <img src="images/flag-1.png" alt="flag"> +91
                      
                    </div>
            <div class="enter-ph">
					
                    <input type="text" id="mobile" placeholder="Enter Your Mobile Number"  maxlength="10">
                    </div>
            <div class="submit-arrow">
						<button type="button" id="send" data-loading-text="<img src='<?php echo base_url();?>images/loader.gif'>" class="arrowbtn"> <i class="fa fa-long-arrow-right"></i> </button>
                    </div>
          </form>
                </div>
      </div>
            </div>
  </div>
        </section>
<!--top banner end--> 

<!--hotspot end-->
<section id="section1" class="genralSec Hotspots wow fadeInUp animated">
          <div class="container">
    <div class="headingSec">
              <h1>Hotspots</h1>
              <div class="text-boxin">
        <p>Stay connected and save money from expensive data plans.  FreeAsAir offers lightning fast Internet speeds across Hotspots in Indore.  We are actively adding more locations so please stay updated. </p>
        <p class="aictsl-logo-txt"> <span class="aictsl-logo"><img src="images/aictsl-logo.png"  alt="AICTSL logo"></span>
		FreeAsAir is proud to associated with <span>AICTSL</span> to bring free Internet access to users riding on BRTS in Indore.</p>
      </div>
            </div>
  </div>
		   
          <div class="map-box"> 
    <!--<h4>Current HotSpots:</h4>-->
	
    <div class="map-in container" style="display: inline;">
		<div id="indb_map"  style="width:100%; height:100%"></div>
              <!--<iframe src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d58880.05952469598!2d75.8532572!3d22.7281031!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3962fcad1b410ddb%3A0x96ec4da356240f4!2sIndore%2C+Madhya+Pradesh!3m2!1d22.7195687!2d75.8577258!5e0!3m2!1sen!2sin!4v1437737909255" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>-->
			 
            </div>
  </div>
        </section>

<!--how to connect end-->
<section id="section2" class="genralSec how-connect wow fadeInUp animated">
          <div class="container">
    <div class="headingSec">
              <h1>How to connect?</h1>
              <div class="text-boxin">
        <p>FreeAsAir is only available to users with Android devices and requires Android 3.0 and above.</p>
      </div>
            </div>
    <div class="apps-box">
        <div class="col-sm-6 mdl-slider wow  fadeInLeft animated">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php
						foreach($img as $image)
						{
							?>
							<div class="item"><img src="<?php echo base_url();?>images/slider/<?php echo $image;?>" alt="img"> </div>
							<?php
						}
					?>								  				 				  
                </div>
		</div>
              <div class="col-sm-6  right-list wow  fadeInRight animated">
              <h3>Connecting is easy:</h3>
        <ul class="list-h-ct">
                  <li class="wow  fadeInLeft animated">
            <a style="cursor: pointer;" class="clickme" data="0"><i class="fa fa-angle-double-right"></i>Download our App</a>
          </li>
                  <li class="wow  fadeInLeft animated">
            <a style="cursor: pointer;" class="clickme" data="1"><i class="fa fa-angle-double-right"></i>Register with your Mobile number</a>
          </li>
                  <li class="wow  fadeInLeft animated">
            <a style="cursor: pointer;" class="clickme" data="2"><i class="fa fa-angle-double-right"></i>Enter your Profile information</a>
          </li>
                  <li class="wow  fadeInRight animated">
            <a style="cursor: pointer;" class="clickme" data="3"><i class="fa fa-angle-double-right"></i>Click on WiFi available</a>
          </li>
                  <li class="wow  fadeInRight animated">
            <a style="cursor: pointer;" class="clickme" data="4"><i class="fa fa-angle-double-right"></i>Connect and enjoy</a>
          </li>
                  <li class="wow  fadeInRight animated">
            <a style="cursor: pointer;" class="clickme" data="5"><i class="fa fa-angle-double-right"></i>Stay updated with our HotSpots</a>
          </li>
                </ul>
      </div>
            </div>
  </div>
        </section>

<!--gate in tuch end-->
<section id="section3" class="genralSec gate-intuch wow fadeInUp animated">
          <div class="container">
    <div class="headingSec">
              <h1> Get in Touch </h1>
              <div class="text-boxin">
        <p> We welcome any feedback and users who are experiencing any issues with our HotSpots or App can call <span>91111-57474.</span> </p>
		<div id="contact_msg"></div>
      </div>
            </div>
    <div class="row wow fadeInUp">
              <div class="col-md-12">
        <div class="form_feild name" id="fname_border"> <span class="icons-frm fa fa-user"></span>
                  <input type="text" id="fname" placeholder="Full Name:*"/>
                </div>
        <div class="form_feild name" id="phone_border"> <span class="icons-frm fa fa-phone"></span>
                  <input type="tel" id="phone" placeholder="Phone Number:*" maxlength="10"/>
                </div>
        <div class="form_feild name" id="email_border"> <span class="icons-frm fa fa-envelope"></span>
                  <input type="text" id="email" placeholder="E-mail:*" />
                </div>
        <div class="form_select">
                <textarea id="message" placeholder="Message:" ></textarea>
        </div>
                <div id="contact_msg"></div>
            <div class="form-group" id="border_captcha">
				<div id="captcha_msg" style="color: red;"></div>	
				<input type="text" class="captch-inp" name="" id="captcha" style="float: left;" placeholder="Enter the captcha code">
					<a class="captcha-box" style="border: 1px solid #d1d8d9;float: left;font-size: 25px;height: 50px;padding: 11px 11px 0 11px" ><div id="captch"></div><!--<img alt="img" src="images/captcha-img.jpg"> --></a>
						<a class="reload-captcha" id="relode"><i class="fa fa-refresh" style="cursor: pointer;"></i>
					</a>
            </div>
                
        <div class="cont-btn-box">
			<input type="button" id="contact" value="Contact Us" class="download_app wow fadeInUp"></td>
			<!--<a class="download_app wow fadeInUp" href="#">Contact Us</a>-->
		</div></div>
            </div>
  </div>
        </section>

<!--footer end-->
<section class="footer wow fadeInUp animated">
          <div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1 >Tell your friends about us!</h1>
        <div class="f_social_icon">
		<a href="https://twitter.com/freeasairwifi" class="tw "><i class="fa fa-twitter"></i></a>
		<a href="https://www.facebook.com/freeasairwifi" class="fb "><i class="fa fa-facebook"></i></a>
		<a href="https://plus.google.com/b/102215073302984532230/102215073302984532230" class="gp "><i class="fa fa-google-plus"></i></a>
		<a href="https://www.linkedin.com/company/free-as-air" class="lk "><i class="fa fa-linkedin"></i></a>
	</div>
        <ul class="footer_menu">
                  <li><a href="#section1" class="wow fadeInUp scroll">Hotspot </a></li>
                  <li><a href="#section2" class="wow fadeInUp delay scroll">How  to connect </a></li>
                  <li><a href="#section3" class="wow fadeInUp delay2 scroll">Contact </a></li>
                </ul>
		</div>
    </div>
  </div>
          <div class="footer_bot"><span>Copyrights &copy; 2015 FreeAsAir</span></div>
        </section>
<a href="#top" class="back_top "><i class="fa fa-angle-up"></i></a> 
<script type="text/javascript">
		var url_msg='<?php echo base_url();?>welcome/send_msg';
		var url_contact='<?php echo base_url();?>welcome/send_contact';
		var url_captcha="<?php echo base_url()?>welcome/Captcha";
		var url_icon="<?php echo base_url()?>images/";
</script>
<?php echo $this->load->view('viewjs');?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1tbIAqN0XqcgTR1-FxYoVTVq6Is6lD98&sensor=false"></script>
<script src="<?php echo base_url();?>js/all_custom.min.js"></script>
</body>
</html>
