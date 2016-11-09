<?php
define("ET_UPDATE_PATH", "http://www.enginethemes.com/forums/?do=product-update");
define("ET_VERSION", '1.1.2');

if (!defined('ET_URL')) define('ET_URL', 'http://www.enginethemes.com/');

if (!defined('ET_CONTENT_DIR')) define('ET_CONTENT_DIR', WP_CONTENT_DIR . '/et-content/');

define('TEMPLATEURL', get_bloginfo('template_url'));

$theme_name = 'directoryengine';

define('THEME_NAME', $theme_name);
define('ET_DOMAIN', 'enginetheme');
define('MOBILE_PATH', TEMPLATEPATH . '/mobile/' );

if (!defined('THEME_CONTENT_DIR ')) define('THEME_CONTENT_DIR', WP_CONTENT_DIR . '/et-content' . '/' . $theme_name);
if (!defined('THEME_CONTENT_URL')) define('THEME_CONTENT_URL', content_url() . '/et-content' . '/' . $theme_name);

// theme language path
if (!defined('THEME_LANGUAGE_PATH')) define('THEME_LANGUAGE_PATH', THEME_CONTENT_DIR . '/lang/');

if (!defined('ET_LANGUAGE_PATH')) define('ET_LANGUAGE_PATH', THEME_CONTENT_DIR . '/lang');

if (!defined('ET_CSS_PATH')) define('ET_CSS_PATH', THEME_CONTENT_DIR . '/css');


require_once TEMPLATEPATH . '/includes/index.php';
require_once TEMPLATEPATH . '/customizer/customizer.php';

if(!class_exists('AE_Base')) return;

require_once TEMPLATEPATH . '/mobile/functions.php';


class ET_DirectoryEngine extends AE_Base
{
    static $instance;
    
    /**
     * return class $instance
     */
    public static function get_instance() {
        if (self::$instance == null) {
            
            self::$instance = new ET_DirectoryEngine();
        }
        return self::$instance;
    }
    
    function __construct() {

        /**
         * add image size
        */
        add_image_size( 'big_post_thumbnail', 270, 280, true );
        add_image_size( 'medium_post_thumbnail', 200, 175, true );
        add_image_size( 'small_post_thumbnail', 70, 65, true );
        add_image_size( 'review_post_thumbnail', 255, 160, true );
        add_image_size( 'place_cover_preview' , 540 , 200 , false );
        
        $this->version = ET_VERSION;
        
        // init theme setting
        $this->add_action('init', 'de_init');
        
        /**
         * add class to body
         */
        $this->add_filter('body_class', 'body_class');
        
        /**
         * filter post thumnail image, if not set use no image
         */
        // $this->add_filter('post_thumbnail_html', 'post_thumbnail_html', 10, 5);
        
        /**
         * enqueue front end scripts
         */
        $this->add_action('wp_enqueue_scripts', 'on_add_scripts');
        
        /**
         * enqueue front end styles
         */
        $this->add_action('wp_print_styles', 'on_add_styles', 10);
        
        /**
         * init js view
         */
        $this->add_action('wp_footer', 'footer_script', 100);
        
        /**
         * init js view
         */
        $this->add_action('wp_head', 'wp_head');
        
        /**
         * add query vars
         */
        $this->add_filter('query_vars', 'add_query_vars');
        
        /**
         * add action admin menu prevent seller enter admin area
         */
        $this->add_action('admin_menu', 'redirect_seller');
        $this->add_action('login_init', 'redirect_login');
        
        
        $this->add_filter('excerpt_length', 'custom_excerpt_length');


        // Filter to Replace default css class for vc_row shortcode and vc_column
        $this->add_filter('vc_shortcodes_css_class', 'vc_row_and_vc_column', 10, 2);

        /**
         * add comment type filter dropdow
        */
        $this->add_filter('admin_comment_types_dropdown', 'admin_comment_types_dropdown');

        // custom template feed
        // remove_all_actions( 'do_feed_rss2' );       
        // $this->add_action('do_feed_rss2','custom_template_feed');
        $this->add_action('template_redirect', 'template_redirect');
        /**
         * 
        */
        // $this->add_filter('rewrite_rules_array', 'add_rewrite_rules');

        /**
         * init place action object
        */
        new DE_PlaceAction();
        new DE_EventAction();
        /**
         * init place meta post
        */
        new AE_PostMeta();
        /**
         * init payment process 
        */
        new DE_Payment();
        /**
         * user front end control  : edit profile, update avatar
        */
        new AE_User_Front_Actions (new AE_Users()); 
        /**
         * hook to control comment post in place
        */
        new AE_ReviewAction();
        // add schedule cron time
        new DE_Schedule('place');
        new DE_Schedule('event');

        update_option('revslider-valid-notice', 'false');
    }
    
    /**
     * hook to init and initialize theme settings
     */
    function de_init() {
        
        // disable admin bar if user can not manage options
        if (!current_user_can('manage_options') || et_load_mobile() ) :
            show_admin_bar(false);
        endif;

        // register menu
        register_nav_menu('et_header', __("Header menu", ET_DOMAIN));
        register_nav_menu('et_mobile_header', __("Mobile Header menu", ET_DOMAIN));

        // register_nav_menu('et_header_top', __("Header top menu", ET_DOMAIN));
        register_nav_menu('et_footer', __("Footer menu", ET_DOMAIN));

        /**
         * override author link
        */
        global $wp_rewrite;
        $wp_rewrite->author_base      = ae_get_option('author_base', 'author' );
        $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';

        
        /**
         * add review to end point
        */
        //$review_url =   ae_get_option('author_review_url', 'reviews');
        // add_rewrite_rule( $wp_rewrite->author_base.'/([^/]+)/$review_url/', 'index.php?author_name=$matches[1]&$review_url=1', 'top' );
        // add_rewrite_rule( $wp_rewrite->author_base.'/([^/]+)/$review_url/page/?([0-9]{1,})/?$', 'index.php?author_name=$matches[1]&$review_url=1&paged=$matches[2]', 'top' );
        //add_rewrite_endpoint( $review_url, EP_AUTHORS | EP_PAGES );

        add_rewrite_rule($wp_rewrite->author_base.'/([^/]+)/page/?([0-9]{1,})/?$', 'index.php?author_name=$matches[1]&paged=$matches[2]', 'top');
        add_rewrite_rule($wp_rewrite->author_base.'/([^/]*)/([^/]*)/page/([0-9]+)','index.php?author_name=$matches[1]&author_tab=$matches[2]&paged=$matches[3]','top');
        add_rewrite_rule($wp_rewrite->author_base.'/([^/]*)/([^/]*)','index.php?author_name=$matches[1]&author_tab=$matches[2]','top');

        $rules = get_option( 'rewrite_rules' );

        if ( !isset($rules[$wp_rewrite->author_base.'/([^/]*)/([^/]*)/page/([0-9]+)']) ){
            $wp_rewrite->flush_rules();
        }
    }
    
    /**
     * filter body class
     */
    function body_class($body_class) {
        return $body_class;
    }


    // function post_thumbnail_html(){
    //     retur
    // }
    
    /**
     * Enqueue scripts for the front end.
     *
     * @since Directory Engine 1.0
     *
     * @return void
     */
    function on_add_scripts() {
        
        
        global $user_ID;
        
        $this->add_existed_script('jquery');
        
        $this->add_existed_script('backbone');
        $this->add_existed_script('underscore');
        $this->add_existed_script('plupload');

        // jquery auto complete for search users
        $this->add_existed_script('jquery-ui-autocomplete');
        // add script validator
        $this->add_existed_script('jquery-validator');

        /**
         * map api
        */
        $this->add_existed_script('et-googlemap-api');
        $this->add_existed_script('gmap');
		
		$this->add_existed_script('bootstrap');

        /**
         * bootstrap slider for search form
        */
        $this->add_existed_script('slider-bt');

        /**
         * slider and rating
        */
        $this->add_script('magnific-raty', get_template_directory_uri() . '/js/jquery.magnific-raty.js', array() , true);
        
             
        /**
         * directory script function BlockPost and Block Review Control
        */
        $this->add_script('functions', get_template_directory_uri() . '/js/functions.js', array(
            'jquery',
            'backbone',
            'underscore',
            'appengine'
        ) , ET_VERSION );

        /*
         * Adds JavaScript to pages with the comment form to support
         * sites with threaded comments (when in use).
        */
        if (is_singular() && comments_open() && get_option('thread_comments')) $this->add_existed_script('comment-reply');

        wp_localize_script('magnific-raty', 'raty', array(
            'hint' => array(
                __('bad', ET_DOMAIN) ,
                __('poor', ET_DOMAIN) ,
                __('nice', ET_DOMAIN) ,
                __('good', ET_DOMAIN) ,
                __('gorgeous', ET_DOMAIN)
            )
        ));

        if(is_page_template( 'page-reset-pass.php' )) {
            $this->add_script('reset-pass', get_template_directory_uri() . '/js/reset-pass.js', array('appengine'), ET_VERSION);
        }
		
		// Javascript for Mobile Version
		if (et_load_mobile()) {
            wp_enqueue_script('dl-menu', get_template_directory_uri() . '/mobile/js/dl-menu.js', array() , true);
            wp_enqueue_script('main', get_template_directory_uri() . '/mobile/js/main.js', array('appengine') ,ET_VERSION,  true);           
			return;
        }		
        
		
        // Rate
        $this->add_existed_script('marker');  

        /**
         * control menu
        */
        $this->add_script('gnmenu', get_template_directory_uri() . '/js/gnmenu.js', array() , true);	
        /**
         * front end control
        */
        $this->add_script('front', get_template_directory_uri() . '/js/front.js', array(
            'jquery',
            'backbone',
            'underscore',
            'functions',
            'magnific-raty',
            'gnmenu'
        ), ET_VERSION);

        

        if(is_singular('place')) {
            $this->add_script('single-place', get_template_directory_uri() . '/js/single-place.js', array(
                'appengine',
                'functions',
                'front'
            ) , true);
        }
        
        // Adds Masonry to handle vertical alignment of footer widgets.
        if (is_active_sidebar('de-footer-1')) $this->add_existed_script('jquery-masonry');
        
        // wp_enqueue_script('classie', get_template_directory_uri() . '/js/classie.js', array() , true);        
        
        $this->add_script('index', get_template_directory_uri() . '/js/index.js', array(
            'appengine',
            'marionette'
        ) , true);
        

        if (is_author()) {
            $this->add_script('author', get_template_directory_uri() . '/js/author.js', array(
                'jquery',
                'backbone',
                'underscore',
                'functions',
                'front'
            ));
        }

        wp_localize_script('front', 'de_front', de_static_texts());
        
        
        if (is_page_template('page-post-place.php')) {
            $this->add_script('submit-post', get_template_directory_uri() . '/js/post-place.js', array(
                'appengine',
                'marionette'
            ) , true);
        }
        
        // $this->localize_script();
    }
    
    
    /**
     * Enqueue styles for the front end.
     *
     * @since Directory Engine 1.0
     *
     * @return void
     */
    function on_add_styles() {
        // Loads the Internet Explorer specific stylesheet.
        $this->add_existed_style('bootstrap');
		// Loads our main stylesheet.
        $this->add_style('font-icon', get_template_directory_uri() . '/css/font-awesome.min.css', array() , ET_VERSION);
		// Add style css for mobile version.
        if (et_load_mobile()) {
            $this->add_style('custom', get_template_directory_uri() . '/mobile/css/main.css', array(
				'bootstrap'
			) , ET_VERSION);
			return;
        }
        
		// $this->add_style('owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css', array() , ET_VERSION);
        //$this->add_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array() , ET_VERSION);
		
        //$this->add_style( 'de-customizer', TEMPLATEURL . '/css/customizer.css');
        
        /**
         * theme css
        */
        $this->add_style('custom', get_template_directory_uri() . '/css/custom.css', array(
            'bootstrap'
        ) , ET_VERSION);
        
        // style.css
        $this->add_style('directoryengine-style', get_stylesheet_uri() , array(
            'bootstrap'
        ) , ET_VERSION);
        /**
         * theme custom css
        */
        $this->add_style('custom-css', get_template_directory_uri() . '/css/custom-css.php', array(
            'bootstrap'
        ) , ET_VERSION);

    }
    
    /**
     * footer script to init all view
     */
    function footer_script() {
        global $user_ID,$current_user;
        // render map template
        $this->map_template();
        
        $disable_plan    = ae_get_option('disable_plan');
        $limit_free_plan = ae_get_option('limit_free_plan');
        $user            = AE_Users::get_instance();
        $currentUser     = $user->convert($current_user);

        do_action('de_before_render_script');

        if($user_ID) {
            echo '<script type="data/json"  id="user_id">'. json_encode(array('id' => $user_ID, 'ID'=> $user_ID) ) .'</script>';  
        }        
    ?>
            <script type="text/javascript" id="frontend_scripts">
                (function ($ , Views, Models, AE) {
                    $(document).ready(function(){
                        var post;
                        var currentUser;
                        // init post
                        if($('#place_id').length > 0 ) {
                            post = new Models.Post( JSON.parse($('#place_id').html()) );
                            post.fetch();
                        }  
                        // init post
                        if($('#user_id').length > 0 ) {
                            currentUser = new Models.User( JSON.parse($('#user_id').html()) );
                            currentUser.fetch();
                        }else {
                            currentUser = new Models.User();
                        }         
                        //create new front view
                        if(typeof Views.Front !== 'undefined') {
                            AE.App = new Views.Front({ user : currentUser });
                        }
                        // create new author view
                        <?php if(is_author()){ ?>
                        if(typeof Views.Author !== 'undefined'){
                            AE.AuthorView = new Views.Author({ model : currentUser });
                        }
                        <?php } ?>
                        // create post form view
                        if(typeof Views.PostForm !== 'undefined') {
                        <?php
                            $options = array(
                                'use_plan'        => $disable_plan,
                                'user_login'      => $user_ID,
                                'free_plan_used'  => AE_Package::get_used_free_plan($user_ID),
                                'limit_free_plan' => $limit_free_plan, 
                                'el'              => '#post-place',
                                'step' => (ae_get_option('disable_plan', false) ? 2 : 4)
                            );
                            
                            echo "
                            var options = ". json_encode($options) ."
                            AE.PostFormView = new Views.PostForm(options);
                            "
                        ?>
                        }

                        <?php if(is_singular('place')){ ?>
                            if(typeof Views.SinglePost !== 'undefined') {
                                AE.Single = new Views.SinglePost({model : post});
                            }
                        <?php } ?>

                        if(typeof Views.Map !== 'undefined') {
                            AE.MapView = new Views.Map({
                                el: $('body'),
                                latitude: ae_globals.map_center.latitude,
                                longitude: ae_globals.map_center.longitude, 
                                model : post
                            });
                        }

                        /*======= Open Confirmation Message Modal ======= */
                        <?php 
                            global $de_confirm;
                            if( $de_confirm ){ 
                        ?>
                            AE.pubsub.trigger('ae:notification', {
                                msg: "<?php _e("Your account has been confirmed successfully!",ET_DOMAIN)  ?>",
                                notice_type: 'success',
                            });                                             
                        <?php } ?>                        
                    });

                })(jQuery, AE.Views, AE.Models, window.AE);
                
            </script>

        <?php

        do_action('de_after_render_script');
        
        // render category json data
        $cat =  new AE_Category( array( 'taxonomy' => 'place_category') );
        $category = $cat->getAll();
        echo '<script type="data/json" id="de-categories-data">'. json_encode($category) .'</script>';
    }
    
    /**
     * map item template
     */
    function map_template() {
        
        $temaplte = '<div class="infowindow" ><div class="post-item"><div class="place-wrapper">
            <a href="{{= permalink }}" class="img-place">
                <img src="{{= the_post_thumnail }}">
            </a>
            <div class="place-detail-wrapper">
                <h2 class="title-place"><a href="{{= permalink }}">{{= post_title }}</a></h2>
                <span class="address-place"><i class="fa fa-map-marker"></i> {{= et_full_location }}</span>
                <div class="rate-it" data-score="{{= rating_score }}"></div>
            </div>
        </div></div></div>';
        
        // $temaplte   =   '<div class="admap-content"> <img src="{{= the_post_thumnail }}" /> <p> <a href="{{= permalink }}" > {{= post_title }} </a> </p> <p> '.__("Location", ET_DOMAIN).': {{= et_full_location }} </p></div>';
        echo '<script type="text/template" id="ae_info_content_template">' . apply_filters('ce_admap_template', $temaplte) . '</script>';
        echo '<div class="map-element" style="display:none"></div>';
    }
    
    /**
     * wp head render block ie 8.0 script && print style for category color
     */
    function wp_head() {
        
        // do not add style and script if is mobile
        if (et_load_mobile()) return;
        
        ae_block_ie('8.0', 'page-unsupported.php');
        
        
    }
    
    /**
     * add query var
     */
    function add_query_vars($vars) {
        array_push($vars, 'paymentType');
        array_push($vars, 'author_tab');
        return $vars;
    }
    /**
     * redirect wp 
    */
    function redirect_seller() {
        if( !( current_user_can( 'manage_options' ) || current_user_can( 'editor' ) ) ) {
            wp_redirect( home_url() );
            exit;
        }
    }

    function redirect_login(){
        if(!is_user_logged_in()){
            wp_redirect( home_url() );
        }
    }
    /**
     * filter excerpt length
    */
    function custom_excerpt_length($length) {
        return 20;
    }

    /*================  Replace default class of Visual Composer ================ */
    function vc_row_and_vc_column($class_string, $tag) {
        // if($tag=='vc_row' || $tag=='vc_row_inner') {
        //     $class_string = str_replace('vc_row-fluid', 'row', $class_string);
        // }
        // if($tag=='vc_column' || $tag=='vc_column_inner' || $tag=="vc-element") {
        //     $class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
        // }
        return $class_string;
    }
    /**
     * hook to filter comment type dropdown and add review favorite to filter comment
     * @param Array $comment_types
    */
    function admin_comment_types_dropdown($comment_types) {
        $comment_types['review'] = __("Review", ET_DOMAIN);
        $comment_types['favorite'] = __("Favorite", ET_DOMAIN);
        return $comment_types;
    }


    function template_redirect() {
        if( is_page_template( 'page-reset-pass.php' ) && is_user_logged_in() ) {
            wp_redirect( home_url());
            exit;
        }

        if(isset($_REQUEST['s'])) {
            if(et_load_mobile()) {
                require dirname(__FILE__).'/mobile/search.php';
            }else{
                require dirname(__FILE__).'/search.php';    
            }            
            exit;
        }

    }

    // /**
    //  * custom feed 2
    // */
    // function custom_template_feed( $for_comment ){
    //     $rss_template = get_template_directory() . '/feeds-rss2.php';
    //     if( get_query_var( 'post_type' ) == 'place' and file_exists( $rss_template ) )
    //         load_template( $rss_template );
    //     else
    //         do_feed_rss2( $for_comment ); // Call default function
    // }

    /**
     * add rewrite rule for author page 
    */
    function add_rewrite_rules($rules) {
        global $wp_rewrite;  
        $types =   apply_filters( 'de_author_slugs', array('reviews','togos') );

        foreach ($types as $key => $value) {
            $newrules[$wp_rewrite->author_base.'/([^/]+)/'.$value.'/?$'] = 'index.php?author_name=$matches[1]&a_view='.$value;
            $newrules[$wp_rewrite->author_base.'/([^/]+)/'.$value.'/page/?([0-9]{1,})/?$'] = 'index.php?author_name=$matches[1]&a_view='.$value.'&paged=$matches[2]';
        }

        $rules = $newrules + $rules;
        return $rules;
    } 

}


global $et_directory;
add_action( 'after_setup_theme' , 'de_setup_theme' );
function de_setup_theme () {
    global $et_directory;
    $et_directory =   new ET_DirectoryEngine(); 
        
}
// init admin setup
$admin = new ET_Admin(); 


// echo wp_create_nonce('ad_carousels_et_uploader');