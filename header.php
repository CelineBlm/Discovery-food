<html>
    <head>
       <meta charset="utf-8">
        <?php wp_head(); ?>

    </head>
    <body <?php body_class() ?>>
    <header>

		<div class="middle-menu center-text"><a href="index.php" class="logo">
            
            <?php the_custom_logo('thumbnail'); ?>
            
            </a></div>

		<ul class="main-menu"><li>
                    <?php wp_nav_menu(array('theme_location' => 'menu-top')); ?>
                    </li>
                    </ul>
		<!-- conatiner -->
		
		
<div id="slider" class="slider js_slider">
    <div class="frame js_frame">
        <ul class="slides js_slides">
           
           <?php $the_query = new WP_Query( array( 'post_type' => 'recette' ) ); ?>
              <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
            <li class="js_slide"><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('miniature-article');?></a></li>
            
            <?php endwhile; ?>
           <?php endif; ?>
        </ul>
    </div>
    <span class="js_prev prev">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#2E435A" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
    </span>
    <span class="js_next next">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#2E435A" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>
    </span>
</div>
		



		
</header>