<?php
	get_header();
?>

	<div id="all">
        <header class="page-header">
            <div class="page-header-content container">
                <?php get_template_part('nav'); ?>
            </div>
        </header>
        
        <section class="top-section">
        	<div class="offset-borders">
                <div class="full-header-container" id="header-blog">
                    <div class="full-header">
                        <div class="container">
                            <h1>Blog del panaero</h1>
                            <h3><?php custom_breadcrumbs(); ?></h3> <!-- Categorías: <?php the_category( ' ' ); ?> -->
                        </div>
                    </div>
                </div>
            </div>
    	</section>
            
       	<section id="blog-section">
            <div class="container">
                
            	
                <div class="col-md-9" style="float:  right;">
                	<article>
                	    <?php the_post(); ?>
                    	<div class="blog-post">
                        	<div class="blog-post-header">
                    			<h1><?php the_title(); ?></h1>
                                <div class="blog-post-info">
                                	<a href="#"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></a> <span class="delimiter-inline">|</span> <a href="<?php the_permalink(); ?>#respond"><i class="fa fa-comments"></i> <?php comments_number( 'Sin comentarios', '1 comentario', '% comentarios' ); ?></a>
                                </div>
                            </div>
                            <div class="blog-post-preview">
                                <div id="blog-post-image" class="blog-post-image">
                                    <?php  the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'post image']); ?>
                                </div>
                            </div>
                        
                        	<p><?php the_content(); ?></p>
                            
                            <div class="blog-post-footer onscroll-animate">
                            	<div class="socials">
                                	Compartir: 
                                    <div class="social-icon-container-alt-small">
                                    	<a href="#"><i class="fa fa-facebook"></i></a>
                                    </div>
                                    <div class="social-icon-container-alt-small">
                                    	<a href="#"><i class="fa fa-twitter"></i></a>
                                    </div>
                                    <div class="social-icon-container-alt-small">
                                    	<a href="#"><i class="fa fa-rss"></i></a>
                                    </div>
                                    <div class="social-icon-container-alt-small">
                                    	<a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            	<div class="blog-post-tags">
                                	<?php the_tags( 'Etiquetas: <span class="blog-post-tag">', ', ', '</span>' ); ?>
                                </div>
                            </div>
                            <div class="blog-post-comments">
                                <?php comments_template();?>
                            </div>
          <!--                  <div class="blog-post-comments">-->
          <!--                  	<h2>23 Comments Found</h2>-->
          <!--                      <div class="blog-post-comment onscroll-animate">-->
          <!--                      	<div class="blog-post-comment-avatar">-->
                                    <!--	<img alt="avatar 1" src="<?php /*echo get_template_directory_uri(); */?>/images/comment_avatar_1.jpg"-->
          <!--                          </div>-->
          <!--                          <div class="blog-post-comment-content">-->
          <!--                          	<h4 class="blog-post-comment-heading">by Hansom Rob, post on 24.04.2014 <span class="delimiter-inline">|</span> <a href="#">REPLY</a></h4>-->
										<!--<p>Nevertheless, in the proper place we shall see that no knowing fisherman will ever turn up his nose at such a whale as this, however much he may shun blasted whales in general.</p>-->
          <!--                          </div>-->
          <!--                      </div>-->
          <!--                      <div class="blog-post-comment onscroll-animate">-->
          <!--                      	<div class="blog-post-comment-avatar">-->
                                    <!--img alt="avatar 2" src="<?php /*echo get_template_directory_uri(); */?>/images/comment_avatar_2.jpg"-->
          <!--                          </div>-->
          <!--                          <div class="blog-post-comment-content">-->
          <!--                          	<h4 class="blog-post-comment-heading">by Hansom Rob, post on 24.04.2014 <span class="delimiter-inline">|</span> <a href="#">REPLY</a></h4>-->
										<!--<p>Nevertheless, in the proper place we shall see that no knowing fisherman will ever turn up his nose at such a whale as this, however much he may shun blasted whales in general.</p>-->
          <!--                          	<div class="blog-post-comment onscroll-animate">-->
          <!--                                  <div class="blog-post-comment-avatar">-->
                                    			<!--<img alt="avatar 3" src="<?php/* echo get_template_directory_uri(); */?>/images/comment_avatar_3.jpg"-->
          <!--                                  </div>-->
          <!--                                  <div class="blog-post-comment-content">-->
          <!--                                      <h4 class="blog-post-comment-heading">by Hansom Rob, post on 24.04.2014 <span class="delimiter-inline">|</span> <a href="#">REPLY</a></h4>-->
          <!--                                      <p>Nevertheless, in the proper place we shall see that no knowing fisherman will ever turn up his nose at such a whale as this, however much he may shun blasted whales in general.</p>-->
          <!--                                  </div>-->
          <!--                              </div>-->
          <!--                          </div>-->
          <!--                      </div>-->
          <!--                      <div class="row onscroll-animate">-->
          <!--                      	<div class="col-md-5">-->
          <!--                          	<input type="text" placeholder="Your name here">-->
          <!--                              <input type="text" placeholder="Your email here">-->
          <!--                          </div>-->
          <!--                          <div class="col-md-7">-->
          <!--                          	<textarea placeholder="Your message here"></textarea>-->
          <!--                          </div>-->
          <!--                      </div>-->
          <!--                      <div class="clearfix">-->
          <!--                      	<input class="submit-comment" type="submit" value="Submit Comment">-->
          <!--                  	</div>-->
          <!--                  </div>-->
                        </div>
                	</article>
                    
                    <div class="clearfix">
                        <?php previous_post_link( '%link', '<div class="pagination-nav-single"><i class="fa fa-arrow-right"></i></div>'); ?>
                        <?php next_post_link( '%link', '<div class="pagination-nav-single"><i class="fa fa-arrow-left"></i></div>'); ?>
                	</div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </section>
        
        <?php  
            get_footer();
        ?>
