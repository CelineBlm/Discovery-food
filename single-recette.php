   

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

        
            
            <div class="col-md-6 col-lg-4 col-md-12">
       
            <p><?php the_content(); ?> </p>
                
            </div>
                </div></div>
        
      </div>  
                </div>
                
<h2>Valeurs nutritionnelles</h2>
<p><?php the_field('field_calories');?> cal</p>
<p><?php the_field('field_glucides');?> g</p>
<p><?php the_field('field_proteines');?> g</p>
<p><?php the_field('field_lipides');?> g</p>

<h2>Temps total pour cuisiner <?php the_title(); ?></h2>
<p><?php the_field('field_temps_prepa');?> minutes</p>
<p><?php the_field('field_temps_cuisson');?> minutes</p>

 <aside id="sidebar" class="col-md-6 col-lg-4 col-md-12">
                   <ul>
                       <li>
                         <?php dynamic_sidebar( 'right-sidebar' ); ?>  
                       </li>
                   </ul>
                    
            

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
        
</div>
            </div>
            </div>
       </div>
       
    
<?php get_footer(); ?>