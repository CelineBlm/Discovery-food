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
        <dl class="recette-post">
            <p><?php the_content(); ?> </p>
                </dl>
            </div>
                </div></div>
        
      </div>  
                </div>
                
<p><?php the_field('field_calories');?> cal</p>
<p><?php the_field('field_temps_prepa');?> minutes</p>

 <aside id="sidebar" class="col-md-6 col-lg-4 col-md-12">
                   <ul>
                       <li>
                         <?php dynamic_sidebar( 'right-sidebar' ); ?>  
                       </li>
                   </ul>
                    
                      <h3>CATEGORIES</h3>
                       <?php $terms = get_terms('categorie');
                        foreach ( $terms as $term ) {?>
                       <p class="btn btn-category">
                         
                           <a href="#"><?php echo $term->name;} ?> </a>

                           </p>


<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
        
</div>
            </div>
            </div>
       </div>
       
    
<?php get_footer(); ?>