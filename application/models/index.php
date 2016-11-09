<?php

get_header();
// load map template
// get_template_part('template/section' , 'map');

?>
<section id="bar-post-place-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-9">
                <h2 class="top-title-post-place"><?php _e( 'Blog' , ET_DOMAIN ); ?></h2>
            </div>
            <div class="col-md-3 col-xs-3">
                <a href="<?php echo et_get_page_link('post-place'); ?>" class="btn btn-post-place"><i class="fa fa-map-marker"></i><?php
                    _e("Submit a place", ET_DOMAIN); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Page Blog -->
<section id="blog-page">
    
    <div class="container">  
        <?php get_sidebar('top'); ?>     
        <div class="row">
            
            <!-- Column left -->
            <div class="col-md-9 col-xs-12">
                <div class="blog-wrapper">
                    <?php get_template_part( 'template/publish', 'blog' ); ?>
                </div>
            </div>
            <!-- Column left / End --> 
            
            <!-- Column right -->
            <?php get_sidebar(); ?>
                <!-- Column right / End -->
        </div>
        <?php get_sidebar('bottom'); ?>
    </div>
</section>
<!-- Page Blog / End -->        

<?php
get_footer();
