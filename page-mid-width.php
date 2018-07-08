<?php
 
/*
 *
 * Template Name: Template Mid Width
 *
 * (You can also use other lines before or after the line above,
 *  WordPress only cares about the line that starts with "Template Name".)
 *
 */
 
?>


<?php get_header(); ?>

<div class="mid-width">
<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
		<h1 class="mid-width"><?php the_title();?></h1>
        <p class="mid-width"><?php the_content();?></p>				
                        
<?php endwhile; ?>
                    <?php endif; ?>
</div>

<?php get_footer(); ?>