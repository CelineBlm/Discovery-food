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

        <div id="informations">
        <dl class="general">
            <dt> Préparation : </dt>
            <dd><?php echo rwmb_meta('preparation'); ?></dd>
            
            <dt> Cuisson : </dt>
            <dd><?php echo rwmb_meta('cooking'); ?></dd>
            
            <dt> Difficulté : </dt>
            <dd><?php the_terms( $post->ID, 'difficulte'); ?></dd>
            
            <dt> Personnes : </dt>
            <dd><?php echo rwmb_meta('personnes'); ?></dd>
            
        </dl>
    
       <div class="container">
			<div class="row">
       <div class="col-md-6 col-lg-4 col-md-12">
        <dl class="nutrition">
            
            <dt> Calories </dt>
            <dd><?php echo rwmb_meta('calories'); ?></dd>
            
            <dt> Protéines</dt>
            <dd><?php echo rwmb_meta('proteins'); ?></dd>
            
            <dt> Glucides </dt>
            <dd><?php echo rwmb_meta('carbs'); ?></dd>
            
            <dt> Graisses </dt>
            <dd><?php echo rwmb_meta('fat'); ?></dd>
            
            <dt> dont saturés </dt>
            <dd><?php echo rwmb_meta('saturates'); ?></dd>
            
            <dt> Fibres </dt>
            <dd><?php echo rwmb_meta('fibre'); ?></dd>
            
            <dt> Sucre </dt>
            <dd><?php echo rwmb_meta('sugar'); ?></dd>
            
            <dt> Sel </dt>
            <dd><?php echo rwmb_meta('salt'); ?></dd>
                
        </dl>
        
        <dl class="ingredients">
                <dt> Ingrédients </dt>
            <dd><?php the_terms( $post->ID, 'ingredient'); ?></dd>
        </dl>
            </div>
            
            <div class="col-md-6 col-lg-4 col-md-12">
        <dl class="recette-post">
            <p><?php the_content(); ?> </p>
                </dl>
            </div>
                </div></div>
        
      </div>  
                </div>

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