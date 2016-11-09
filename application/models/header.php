<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @since DirectoryEngine 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
    <html class="ie ie7" <?php
language_attributes();
?>>
<![endif]-->
<!--[if IE 8]>
    <html class="ie ie8" <?php
language_attributes();
?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php
language_attributes();
?>>
<!--<![endif]-->
<head>
    <meta charset="<?php
bloginfo('charset');
?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 ,user-scalable=no">
    <title><?php
wp_title('|', true, 'right');
?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel='stylesheet' id='tie-style-css' href='http://dev2.b-change.org/wp-content/themes/jarida/style.css?ver=4.0.1' type='text/css' media='all' />
    
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="pingback" href="<?php
bloginfo('pingback_url');
?>">
    <!--[if lt IE 9]>
    <script src="<?php
echo get_template_directory_uri();
?>/js/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css"> 
        #menu-main-menu {
            margin-top: -9px;
        }
	#main-nav {margin-top: -10px !important;}
    	.logo {margin-top: -22px;}
	
	#main-nav.fixed-nav {
    		top: 23px;
	}
	
	#theme-header
       {
	height:100%;
       }
    
    .top-nav {

    background: none repeat scroll 0 0 #2c2c2c;
    height: 35px;
    font-family: Tahoma,Arial,Verdana,sans-serif;
    position: relative;
    border-bottom: 4px solid #0099cc;
    z-index: 10;
    }
		
	.logo > h1 {
        margin-bottom: -3px;
    }


   .header-height
    {
      height:264px;
      margin-top:20px;
    }
    
   
	
	

    </style>
    <script src="<?php
echo get_template_directory_uri();
?>/js/modernizr.min.js"></script>
    <?php
ae_favicon();
wp_head();
/**
 * render less custom css
 */
if (function_exists('et_render_less_style')) {
    et_render_less_style();
}
?>
</head>


<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function()
{ (i[r].q=i[r].q||[]).push(arguments)}

,i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-37291321-9', 'auto');
ga('send', 'pageview');

</script>

  
 
<body <?php
body_class();
?>  >

    <?php
if (ae_get_option('use_pre_loading', 0)) {
    ae_pre_loading();
}
?>


    <!-- Header -->
<div class="wrapper full-site animated">
<nav class="top-nav fade-in animated1 head_menu" >
    <div class="container">    
        <div class="search-block">
                    <form method="get" id="searchform" action="<?php
echo home_url();
?>/">
                        <button class="search-button" type="submit" value="<?php
if (!$is_IE)
    _e('Search', 'tie');
?>"></button>    
                        <input type="text" id="s" name="s" value="<?php
_e('Search...', 'tie');
?>" onfocus="if (this.value == '<?php
_e('Search...', 'tie');
?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php
_e('Search...', 'tie');
?>';}"  />
                    </form>
        </div><!-- .search-block /-->

        <div class="social-icons icon_flat">
            <a target="_blank" href="http://dev2.b-change.org/?feed=rss" class="tooldown" original-title="Rss">
                <i class="tieicon-rss"></i>
            </a>
            <a target="_blank" href="https://www.facebook.com/may17idahot" class="tooldown" original-title="Facebook">
                <i class="tieicon-facebook"></i>
            </a>
            <a target="_blank" href="https://www.twitter.com/bchangenow" class="tooldown" original-title="Twitter">
                <i class="tieicon-twitter"></i>
            </a>
            <a target="_blank" href="https://www.youtube.com/bchangenow" class="tooldown" original-title="Youtube">
                <i class="tieicon-youtube"></i>
            </a>
        </div>
        <div class="top-menu">
            <?php
global $blog_id;

if ($blog_id == 8) {
    $current_blog_id = $blog_id;
    switch_to_blog(1);
    wp_nav_menu(array(
        'container_class' => 'top-menu',
        'theme_location' => 'top-menu',
        'fallback_cb' => 'tie_nav_fallback'
    ));
    switch_to_blog($current_blog_id);
    
}

?>
   </div>
  </div> 
</nav> 
<div class="container header-height">    
        <header id="theme-header">
        <div class="header-content fade-in animated1">
	<div class="logo">
		<h1>
			<a href="http://dev2.b-change.org/services-map/" title="Plus">
				<img alt="Plus" src="http://dev2.b-change.org/wp-content/themes/directoryengine/img/1ew4cfr7.jpg">
				
			</a>
		</h1>
	</div>
	<div class="clear"></div>
	
	
    <!--div class="directory-header11" id="set-header11">
                  <a href="http://www.plus-us.net/services-map/"><img src="http://www.plus-us.net/wp-content/themes/directoryengine/img/1ew4cfr7.jpg"></a>
    </div-->
    <header id="header-wrapper" class="fix-top-nav">
        <section id="" >
            

            <nav class="fade-in animated2 fixed-enabled" id="main-nav">
                <div class="container">                
                <div class="main-menu">
                <!-- <ul class="menu" id="menu-main-menu"> -->
            <!--     <li> -->

                    <?php
if ($blog_id == 8) {
    $current_blog_id = $blog_id;
    //switch to the main blog which will have an id of 1
    switch_to_blog(1);
    wp_nav_menu(array(
        'container_class' => 'main-menu',
        'theme_location' => 'primary',
        'fallback_cb' => 'tie_nav_fallback'
    ));
    switch_to_blog($current_blog_id);
}


if ($blog_id != 8 && has_nav_menu('et_header')) {
    
    wp_nav_menu(array(
        'theme_location' => 'et_footer'
    ));
    /*wp_nav_menu( array(    'theme_location' => 'et_mobile' , 
    'menu_class' => 'main-menu' , 
    'walker' => new DE_Menu_Walker() , 
    //'before' => '<span class="sub-icon">',
    //'after' => '</span>'
    ));*/
    
}
?>
               <select id="main-menu-mob"><option value="#">Go to...</option><option value="http://www.plus-us.net/">&nbsp;Home</option><option value="http://www.plus-us.net/about/">&nbsp;About</option><option value="http://www.plus-us.net/services-map/">&nbsp;Find</option><option value="http://www.plus-us.net/knowledge/">&nbsp;Learn </option><option value="http://www.plus-us.net/knowledge/first-diagnosis/">&nbsp; &nbsp; &ndash;&nbsp;First Diagnosis </option><option value="http://www.plus-us.net/knowledge/checking-our-health/checking-our-health-chinese/">&nbsp; &nbsp; &ndash;&nbsp; &nbsp; &ndash;&nbsp;Chinese</option><option value="http://www.plus-us.net/knowledge/checking-our-health/checking-our-health-indonesian/">&nbsp; &nbsp; &ndash;&nbsp; &nbsp; &ndash;&nbsp;Indonesian</option><option value="http://www.plus-us.net/knowledge/checking-our-health/checking-our-health-malay/%E2%80%8E">&nbsp; &nbsp; &ndash;&nbsp; &nbsp; &ndash;&nbsp;Malay</option><option value="http://www.plus-us.net/knowledge/checking-our-health/checking-our-health-english/%E2%80%8EEdit">&nbsp; &nbsp; &ndash;&nbsp; &nbsp; &ndash;&nbsp;English</option><option value="http://www.plus-us.net/knowledge/checking-our-health/">&nbsp; &nbsp; &ndash;&nbsp;Checking Our Health </option><option value="http://www.plus-us.net/knowledge/checking-our-health/checking-our-health-chinese/">&nbsp; &nbsp; &ndash;&nbsp; &nbsp; &ndash;&nbsp;Chines</option><option value="http://www.plus-us.net/knowledge/checking-our-health/checking-our-health-indonesian/">&nbsp; &nbsp; &ndash;&nbsp; &nbsp; &ndash;&nbsp;Indonesian</option><option value="http://www.plus-us.net/knowledge/checking-our-health/checking-our-health-malay/%E2%80%8E">&nbsp; &nbsp; &ndash;&nbsp; &nbsp; &ndash;&nbsp;Malay</option><option value="http://www.plus-us.net/knowledge/checking-our-health/checking-our-health-english/%E2%80%8EEdit">&nbsp; &nbsp; &ndash;&nbsp; &nbsp; &ndash;&nbsp;English</option><option value="http://www.plus-us.net/qna/">&nbsp;Ask</option><option value="http://www.plus-us.net/privacy/">&nbsp;Privacy </option><option value="http://www.plus-us.net/privacy/concerned-about-privacy/">&nbsp; &nbsp; &ndash;&nbsp;Concerned About Privacy</option><option value="http://www.plus-us.net/privacy/policy/">&nbsp; &nbsp; &ndash;&nbsp;Privacy Policy</option><option value="http://www.plus-us.net/privacy/terms-of-use/">&nbsp; &nbsp; &ndash;&nbsp;Terms of Use</option><option value="http://www.plus-us.net/qna/">&nbsp;Question</option><option value="http://www.b-change.org/helpdesk/">&nbsp;Referral Desk</option><option value="http://www.plus-us.net/login/">&nbsp;Login</option></select></div>                </div>
            </nav>
        </section>
        <!-- Opition Search Form / End -->
    </header>

    <!-- Header / End -->
    
    <!-- Marsk -->
    <div class="marsk-black"></div>
    <!-- Marsk / End -->
    </div></div>
    <!-- Wrapper div -->
    <?php 
	
	if (!(is_singular() && !is_page_template('page-front.php')) && !is_category() && (is_search() || !is_date()) && !is_author()) {
    		get_sidebar('fullwidth-top');
	}

	?>
    </div>
    <div id="page">

<?php



