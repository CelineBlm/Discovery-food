<?php get_header(); ?>
    
	<section class="section blog-area">
		<div class="container">
			<div class="row">

				<div class="content ">
					<div class="blog-posts">
                           <?php $the_query = new WP_Query( array( 'post_type' => 'recette' ) ); ?>
                                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="single-post">
							<div class="image-wrapper"><?php the_post_thumbnail('thumbnail');?></div>

							<div class="icons">
								<div class="left-area"> 
									   <?php the_terms( $post->ID, 'categorie', '<p class="btn category-btn" href="#">', ' ', '</p>'); ?> 
								</div>
							</div>
							<p class="date"><em><?php the_date('d M Y'); ?></em></p>
                            <h3 class="title"><a href="<?php echo get_permalink(); ?>"><b class="light-color"><?php the_title() ?></b></a></h3>
                                    <p><?php the_excerpt() ?></p>

                            <a class="btn read-more-btn" href="<?php echo get_permalink(); ?>">Lire la recette</a>
                                  
                                    
						</div><!-- single-post -->
                        
<?php endwhile; ?>
                    <?php endif; ?>

                    </div>
                </div>
               
                   <aside id="sidebar">
                   <ul>
                       <li>
                         <?php dynamic_sidebar( 'right-sidebar' ); ?>  
                       </li>
                   </ul>
                    
                        </aside>
            </div>
              
            </div>
            </section>
            

 


<?php get_footer(); ?>
