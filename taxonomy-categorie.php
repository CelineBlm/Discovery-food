<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div id="single-recipe">
        <div class="container">
			<div class="row">
       <div class="col-md-6 col-lg-8 col-md-12">
        <h1><?php the_title(); ?> </h1>
            <div class="recipe">
                
                <?php the_post_thumbnail('medium', array('class' => 'img.responsive')) ?>
                
                
            </div>

        
            
            <div class="recette-post">
      
            <p><?php the_excerpt(); ?> </p>
                
            </div>
               
               <a href="<?php echo get_permalink();?>">Voir la recette en entier</a>
                </div></div>
        
      </div>  
                </div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>