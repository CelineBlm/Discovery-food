<?php get_header(); ?>
    <div class="main-slider">
		<div id="slider">

			<?php wd_slider(1); ?>
		</div><!-- slider -->
	</div><!-- main-slider -->


	<section class="section blog-area">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-lg-8 col-md-12">
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
                            <h3 class="title"><a href="#"><b class="light-color"><?php the_title() ?></b></a></h3>
                                    <p><?php the_excerpt() ?></p>

                            <a class="btn read-more-btn" href="<?php echo get_permalink(); ?>">Lire la recette</a>
                                  
                                    
						</div><!-- single-post -->
                        
<?php endwhile; ?>
                    <?php endif; ?>

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
                        </aside>
            </div>
              
            </div>
            </section>
            

 


<?php get_footer(); ?>
