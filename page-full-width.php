<?php
 
/*
 *
 * Template Name: Template Full Width
 *
 * (You can also use other lines before or after the line above,
 *  WordPress only cares about the line that starts with "Template Name".)
 *
 */
 
?>


<?php get_header(); ?>

<div class="full-width">
<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
		<h1 class="full-width"><?php the_title();?></h1>
        <p class="full-width"><?php the_content();?></p>				
                        
<?php endwhile; ?>
                    <?php endif; ?>
</div>

<?php get_footer(); ?>