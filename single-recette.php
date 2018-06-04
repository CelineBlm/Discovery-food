   

   <?php get_header(); ?>
    


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div id="single-recipe">
        <div class="container">
			<div class="row">
       <div class="content">
        <h1><?php the_title(); ?> </h1>
            <div class="recipe main">
                
                <?php the_post_thumbnail('medium', array('class' => 'img.responsive')) ?>
                
                
            

        
            
            

<div class="aside_recipe">   
    <div id="info_nutri">          
<h2>Valeurs nutritionnelles</h2>
<p><?php the_field('field_calories');?> cal</p>
<p><?php the_field('field_glucides');?> g</p>
<p><?php the_field('field_proteines');?> g</p>
<p><?php the_field('field_lipides');?> g</p>
</div>

<div id="time">

<h2>Temps total pour cuisiner <?php the_title(); ?></h2>
<p><?php the_field('field_temps_prepa');?> minutes</p>
<p><?php the_field('field_temps_cuisson');?> minutes</p>
 </div>
           </div>
           
           <div class="recipe_details">
       
            <p><?php the_content(); ?> </p>
                
            </div> 
           
           </div>
        
  </div>    

 <aside id="sidebar">
                   <ul>
                       <li>
                         <?php dynamic_sidebar( 'right-sidebar' ); ?>  
                       </li>
                   </ul>
                    
  </aside>
              

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
 
      </div>
       </div>  
                </div>
       
    
<?php get_footer(); ?>