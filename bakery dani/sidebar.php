<div class="sidebar col-md-3" style="float:  right;">
                	<article class="onscroll-animate">
                    	<div class="article-header-small">
                    	    <div class="margin-40"></div>
                    	    <div class="buscador center"><?php echo get_search_form(); ?></div>
                        	<h1>Sobre nosotros</h1>
                        </div>
                        <div class="sidebar-img">
                          	<img alt="sidebar img" src="<?php echo get_template_directory_uri(); ?>/images/sidebar_img1.png">
                        </div>
                        <p class="text-center">Proyecto grupal para el final de curso del ciclo superior de DAW en el IES Zaidín Vergeles a cargo de:<br>
                        	Daniel, Rubén, Juan Carlos y Alexander
                        </p>
                    </article>
                    <hr>
                    
                    <article class="onscroll-animate">
                    	<div class="article-header-small">
                        	<h1>La mejor repostería</h1>
                        </div>
                        <img alt="banner" class="img-responsive banner" src="<?php echo get_template_directory_uri(); ?>/images/banner.jpg">
                    </article>
                    <hr>
                    
                    <article class="onscroll-animate">
                    	<div class="article-header-small">
                        	<h1>Categorías</h1>
                        </div>
                        
                        <ul class="list-values">
                            <?php
                            $categories = get_categories( array(
                                'orderby' => 'name',
                                'order'   => 'ASC'
                            ) );
                            foreach( $categories as $category ) {
                            ?>
                            <li>
                        		<a href="<?php echo get_category_link( $category->term_id ); ?>">
                                    <article>
                                        <div class="list-values-content"><?php echo $category->name; ?></div>
                                        <div class="list-values-value">(<?php echo $category->count; ?>)</div>
                                    </article>
                            	</a>
                            </li>
                            <?php }; ?>
                        </ul>
                  	</article>
                    <hr>
                    
                    <article class="onscroll-animate">
                    	<div class="article-header-small">
                        	<h1>Opiniones en Twitter</h1>
                        </div>
                        <div id="feed-post-slider" class="feed-post-slider">
                            <div class="feed-post">
                                <div class="feed-post-img">
                                    <img alt="feed post avatar" src="<?php echo get_template_directory_uri(); ?>/images/feed_post_avatar.jpg">
                                </div>
                                RT <a href="#">@PeterPan12:</a> Me encantaron sus croissants. Deliciosos! <a href="https://bakerywp-ruben1507.c9users.io/producto/croissant/">https://bakerywp-ruben1507.c9users.io/producto/croissant</a>
                            </div>
                            <div class="feed-post">
                                <div class="feed-post-img">
                                    <img alt="feed post avatar" src="<?php echo get_template_directory_uri(); ?>/images/feed_post_avatar2.jpg">
                                </div>
                                RT <a href="#">@MariaPAstelitos:</a> Sus piononos son increíbles. Se los recomiendo a todo el mundo! <a href="https://bakerywp-ruben1507.c9users.io/producto/piononos/">https://bakerywp-ruben1507.c9users.io/producto/piononos</a>
                            </div>
                            <div class="feed-post">
                                <div class="feed-post-img">
                                    <img alt="feed post avatar" src="<?php echo get_template_directory_uri(); ?>/images/feed_post_avatar3.jpg">
                                </div>
                                RT <a href="#">@Corazoncito:</a> Gracias por las ideas para este 14F! <a href="https://bakerywp-ruben1507.c9users.io/consejos/postres-para-sorprender-a-tu-pareja-en-san-valentin/">Postres para sorprender a tu pareja en San Valentín</a>
                            </div>
                        </div>
                    </article>
                    <hr>
                    
                    <article>
                    	<div class="article-header-small">
                        	<h1>POSTS RECIENTES</h1>
                        </div>
                        <?php
                        $args=array(
                            'posts_per_page'=>2,    
                            );
                            
                        $custom_query = new WP_Query($args);
                            
                        if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                        ?>
                        <div class="blog-post-small onscroll-animate">
                        	<div class="blog-post-small-img">
                            	<a href="<?php the_permalink(); ?>"><img alt="post image 1" src="<?php 
                                            if(has_post_thumbnail()){
                                                $postImg = get_the_post_thumbnail_url();
                                            }else{
                                                $postImg = get_template_directory_uri()."/img/default-image.png";
                                            }
                                            echo $postImg ?>"></a>
                                <div class="blog-post-small-img-cover"></div>
                            	<div class="blog-post-small-info">
                                	<div class="blog-post-small-info-content">
                                		<?php echo get_the_date(); ?>
                                    </div>
                                </div>
                            </div>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h4>
                            <p><?php echo excerpt(20); ?></p>
                        </div>
                        <?php
                        endwhile;endif;
                        wp_reset_query();
                        ?>
                        
                    </article>
                    <hr>
                    
                    <article class="onscroll-animate">
                    	<div class="article-header-small">
                        	<h1>POSTS POPULARES</h1>
                        </div>
                        <?php
                        $args=array(
                            'posts_per_page'=>3,
                            'orderby' => 'comment_count',
                            );
                            
                        $custom_query = new WP_Query($args);
                            
                        if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                        ?>
                        <div class="post-preview">
                          	<div class="post-preview-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php 
                                            if (class_exists('MultiPostThumbnails')) : 
                                                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                                            endif; ?>
                                </a>
                          	</div>
                            
                            <div class="post-preview-info">
                            	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            	<div class="post-preview-detail">
                                	<?php echo get_the_date(); ?><br><a href="<?php the_permalink(); ?>#respond"><i class="fa fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php
                        endwhile;endif;
                        wp_reset_query();
                        ?>
                    </article>
                    <hr>
                    
                    <article class="onscroll-animate">
                    	<div class="article-header-small">
                        	<h1>REDES SOCIALES</h1>
                        </div>
                        <div class="text-center">
                            <div class="social-icon-container-alt-big">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="social-icon-container-alt-big">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="social-icon-container-alt-big">
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <div class="social-icon-container-alt-big">
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
                    </article>
                </div><!-- .sidebar -->