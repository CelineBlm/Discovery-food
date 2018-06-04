<?php
 
/*
 *
 * Template Name: Template A Propos
 *
 * (You can also use other lines before or after the line above,
 *  WordPress only cares about the line that starts with "Template Name".)
 *
 */
 
?>


<?php get_header(); ?>


<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
		<h1 class="a-propos-de-nous"><?php the_title();?></h1>
        <p class="a-propos-de-nous"><?php the_content();?></p>				
                        
<?php endwhile; ?>
                    <?php endif; ?>


<?php get_footer(); ?>