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
                <div class="full-header-container" id="header-gallery">
                    <div class="full-header">
                        <div class="container">
                            <h1>Nuestros productos</h1>
                            <h3><?php custom_breadcrumbs(); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php the_post(); ?>
        <section id="gallery-section">
            <div class="center-logo onscroll-animate" data-delay="800">
            	<img alt="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo_center.png">
            </div>
        	<div class="container">
                <div class="col-md-5">
                    <article class="gallery-info">
                        <div class="article-header-5">
                            <div class="price-label onscroll-animate" data-delay="500">
                                <span class="price-label-content"><?php echo get_post_meta($post->ID, 'my_meta_box_input', true); ?> €</span>
                            </div>
                            <h1><?php the_title(); ?></h1>
                            <h3><?php the_terms( $post->ID, 'familia', '', ', ', ' ' ); ?></h3>
                        </div>
                        <p><?php the_content(); ?></p>
                        <?php if(get_post_meta($post->ID, 'my_meta_box_check', true) == 'off'){echo '<span>(Agotado)</span>';} ?>
                    </article>
                    <div class="margin-20"></div>
                    
                    <div class="onscroll-animate">
                        <div class="article-header">
                            <h2>Compartir</h2>
                        </div>
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
                </div>
                <div class="col-md-6 col-md-offset-1 onscroll-animate">
                    <div id="gallery-slider" class="gallery-slider">
                        <?php  the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="products-section">
            <div class="section-content">
                <div class="container">
                    <header class="section-header">
                        <h1>Nuestros últimos productos</h1>
                        <p>Echa un vistazo a algunos de nuestros mejores productos</p>
                    </header>
                	<div id="products-slider-1" class="products-slider">
                        <div><!-- slide 1 -->
                            <div class="row">
                 	<?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2 
                        );
                        $custom_query = new WP_Query($args);
                    ?>
                        <div class="col-md-6 onscroll-animate">
                            <div class="row">
                                <?php 
                                    if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                                ?>
                                <div class="col-sm-6">
                                    
                                    <div class="product">
                                        <?php 
                                            $metalabel = get_post_meta($post->ID, 'my_meta_box_select2', true);
                                            if($metalabel == "sin stock"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label sinstock">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom sinstock"></div>
                                        </div>';
                                            }elseif($metalabel == "en oferta"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label enoferta">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom enoferta"></div>
                                        </div>';
                                            }elseif($metalabel == "más vendido"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label masvendido">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom masvendido"></div>
                                        </div>';
                                            }elseif($metalabel == "ninguno" || $metalabel == ""){
                                                
                                            }
                                        ?>
                                        <div class="product-preview">
                                            <a href="<?php the_permalink(); ?>"><?php 
                                            if (class_exists('MultiPostThumbnails')) : 
                                                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                                            endif; ?></a>
                                        <a href="<?php the_permalink(); ?>">
                                        </div>
                                        <div class="product-detail-container">
                                            <div class="product-icons">
                                                <div class="product-icon-container">
                                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-exchange"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h2>
                                                <p><?php the_terms( $post->ID, 'familia', '', ', ', ' ' ); ?></p>
                                                <p class="product-price"><?php echo get_post_meta($post->ID, 'my_meta_box_input', true); ?> €</p>
                                            </div>
                                        </div><!-- .product-detail-container -->
                                    </div><!-- .product -->
                                    
                                </div>
                                <?php
                                    endwhile;endif;
                                    wp_reset_query();
                                ?>
                                <!--http://www.wpbeginner.com/plugins/how-to-add-multiple-post-thumbnails-featured-images-in-wordpress/-->
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->
                    <?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 2
                        );
                        $custom_query = new WP_Query($args);
                    ?>
                        <div class="col-md-6 onscroll-animate">
                            <div class="row">
                                <?php 
                                    if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                                ?>
                                <div class="col-sm-6">
                                    
                                    <div class="product">
                                        <?php 
                                            $metalabel = get_post_meta($post->ID, 'my_meta_box_select2', true);
                                            if($metalabel == "sin stock"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label sinstock">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom sinstock"></div>
                                        </div>';
                                            }elseif($metalabel == "en oferta"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label enoferta">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom enoferta"></div>
                                        </div>';
                                            }elseif($metalabel == "más vendido"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label masvendido">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom masvendido"></div>
                                        </div>';
                                            }elseif($metalabel == "ninguno" || $metalabel == ""){
                                                
                                            }
                                        ?>
                                        <div class="product-preview">
                                            <a href="<?php the_permalink(); ?>"><?php 
                                            if (class_exists('MultiPostThumbnails')) : 
                                                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                                            endif; ?></a>
                                        <a href="<?php the_permalink(); ?>">
                                        </div>
                                        <div class="product-detail-container">
                                            <div class="product-icons">
                                                <div class="product-icon-container">
                                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-exchange"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h2>
                                                <p><?php the_terms( $post->ID, 'familia', '', ', ', ' ' ); ?></p>
                                                <p class="product-price"><?php echo get_post_meta($post->ID, 'my_meta_box_input', true); ?> €</p>
                                            </div>
                                        </div><!-- .product-detail-container -->
                                    </div><!-- .product -->
                                    
                                </div>
                                <?php
                                    endwhile;endif;
                                    wp_reset_query();
                                ?>
                                <!--http://www.wpbeginner.com/plugins/how-to-add-multiple-post-thumbnails-featured-images-in-wordpress/-->
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
                        </div>
                        <div><!-- slide 2 -->
                            <div class="row">
                 	<?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 4
                        );
                        $custom_query = new WP_Query($args);
                    ?>
                        <div class="col-md-6 onscroll-animate">
                            <div class="row">
                                <?php 
                                    if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                                ?>
                                <div class="col-sm-6">
                                    
                                    <div class="product">
                                        <?php 
                                            $metalabel = get_post_meta($post->ID, 'my_meta_box_select2', true);
                                            if($metalabel == "sin stock"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label sinstock">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom sinstock"></div>
                                        </div>';
                                            }elseif($metalabel == "en oferta"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label enoferta">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom enoferta"></div>
                                        </div>';
                                            }elseif($metalabel == "más vendido"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label masvendido">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom masvendido"></div>
                                        </div>';
                                            }elseif($metalabel == "ninguno" || $metalabel == ""){
                                                
                                            }
                                        ?>
                                        <div class="product-preview">
                                            <a href="<?php the_permalink(); ?>"><?php 
                                            if (class_exists('MultiPostThumbnails')) : 
                                                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                                            endif; ?></a>
                                        <a href="<?php the_permalink(); ?>">
                                        </div>
                                        <div class="product-detail-container">
                                            <div class="product-icons">
                                                <div class="product-icon-container">
                                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-exchange"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h2>
                                                <p><?php the_terms( $post->ID, 'familia', '', ', ', ' ' ); ?></p>
                                                <p class="product-price"><?php echo get_post_meta($post->ID, 'my_meta_box_input', true); ?> €</p>
                                            </div>
                                        </div><!-- .product-detail-container -->
                                    </div><!-- .product -->
                                    
                                </div>
                                <?php
                                    endwhile;endif;
                                    wp_reset_query();
                                ?>
                                <!--http://www.wpbeginner.com/plugins/how-to-add-multiple-post-thumbnails-featured-images-in-wordpress/-->
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->
                    <?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 6
                        );
                        $custom_query = new WP_Query($args);
                    ?>
                        <div class="col-md-6 onscroll-animate">
                            <div class="row">
                                <?php 
                                    if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                                ?>
                                <div class="col-sm-6">
                                    
                                    <div class="product">
                                        <?php 
                                            $metalabel = get_post_meta($post->ID, 'my_meta_box_select2', true);
                                            if($metalabel == "sin stock"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label sinstock">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom sinstock"></div>
                                        </div>';
                                            }elseif($metalabel == "en oferta"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label enoferta">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom enoferta"></div>
                                        </div>';
                                            }elseif($metalabel == "más vendido"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label masvendido">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom masvendido"></div>
                                        </div>';
                                            }elseif($metalabel == "ninguno" || $metalabel == ""){
                                                
                                            }
                                        ?>
                                        <div class="product-preview">
                                            <a href="<?php the_permalink(); ?>"><?php 
                                            if (class_exists('MultiPostThumbnails')) : 
                                                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                                            endif; ?></a>
                                        <a href="<?php the_permalink(); ?>">
                                        </div>
                                        <div class="product-detail-container">
                                            <div class="product-icons">
                                                <div class="product-icon-container">
                                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-exchange"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h2>
                                                <p><?php the_terms( $post->ID, 'familia', '', ', ', ' ' ); ?></p>
                                                <p class="product-price"><?php echo get_post_meta($post->ID, 'my_meta_box_input', true); ?> €</p>
                                            </div>
                                        </div><!-- .product-detail-container -->
                                    </div><!-- .product -->
                                    
                                </div>
                                <?php
                                    endwhile;endif;
                                    wp_reset_query();
                                ?>
                                <!--http://www.wpbeginner.com/plugins/how-to-add-multiple-post-thumbnails-featured-images-in-wordpress/-->
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
                        </div>
                        <div><!-- slide 3 -->
                            <div class="row">
                 	<?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 8 
                        );
                        $custom_query = new WP_Query($args);
                    ?>
                        <div class="col-md-6 onscroll-animate">
                            <div class="row">
                                <?php 
                                    if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                                ?>
                                <div class="col-sm-6">
                                    
                                    <div class="product">
                                        <?php 
                                            $metalabel = get_post_meta($post->ID, 'my_meta_box_select2', true);
                                            if($metalabel == "sin stock"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label sinstock">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom sinstock"></div>
                                        </div>';
                                            }elseif($metalabel == "en oferta"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label enoferta">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom enoferta"></div>
                                        </div>';
                                            }elseif($metalabel == "más vendido"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label masvendido">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom masvendido"></div>
                                        </div>';
                                            }elseif($metalabel == "ninguno" || $metalabel == ""){
                                                
                                            }
                                        ?>
                                        <div class="product-preview">
                                            <a href="<?php the_permalink(); ?>"><?php 
                                            if (class_exists('MultiPostThumbnails')) : 
                                                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                                            endif; ?></a>
                                        <a href="<?php the_permalink(); ?>">
                                        </div>
                                        <div class="product-detail-container">
                                            <div class="product-icons">
                                                <div class="product-icon-container">
                                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-exchange"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h2>
                                                <p><?php the_terms( $post->ID, 'familia', '', ', ', ' ' ); ?></p>
                                                <p class="product-price"><?php echo get_post_meta($post->ID, 'my_meta_box_input', true); ?> €</p>
                                            </div>
                                        </div><!-- .product-detail-container -->
                                    </div><!-- .product -->
                                    
                                </div>
                                <?php
                                    endwhile;endif;
                                    wp_reset_query();
                                ?>
                                <!--http://www.wpbeginner.com/plugins/how-to-add-multiple-post-thumbnails-featured-images-in-wordpress/-->
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->
                    <?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 10
                        );
                        $custom_query = new WP_Query($args);
                    ?>
                        <div class="col-md-6 onscroll-animate">
                            <div class="row">
                                <?php 
                                    if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                                ?>
                                <div class="col-sm-6">
                                    
                                    <div class="product">
                                        <?php 
                                            $metalabel = get_post_meta($post->ID, 'my_meta_box_select2', true);
                                            if($metalabel == "sin stock"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label sinstock">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom sinstock"></div>
                                        </div>';
                                            }elseif($metalabel == "en oferta"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label enoferta">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom enoferta"></div>
                                        </div>';
                                            }elseif($metalabel == "más vendido"){
                                                echo '<div class="product-label-container">
                                            <div class="product-label masvendido">
                                                '. $metalabel. '
                                            </div>
                                            <div class="product-label-bottom masvendido"></div>
                                        </div>';
                                            }elseif($metalabel == "ninguno" || $metalabel == ""){
                                                
                                            }
                                        ?>
                                        <div class="product-preview">
                                            <a href="<?php the_permalink(); ?>"><?php 
                                            if (class_exists('MultiPostThumbnails')) : 
                                                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                                            endif; ?></a>
                                        <a href="<?php the_permalink(); ?>">
                                        </div>
                                        <div class="product-detail-container">
                                            <div class="product-icons">
                                                <div class="product-icon-container">
                                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-exchange"></i></a>
                                                </div>
                                                <div class="product-icon-container">
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h2>
                                                <p><?php the_terms( $post->ID, 'familia', '', ', ', ' ' ); ?></p>
                                                <p class="product-price"><?php echo get_post_meta($post->ID, 'my_meta_box_input', true); ?> €</p>
                                            </div>
                                        </div><!-- .product-detail-container -->
                                    </div><!-- .product -->
                                    
                                </div>
                                <?php
                                    endwhile;endif;
                                    wp_reset_query();
                                ?>
                                <!--http://www.wpbeginner.com/plugins/how-to-add-multiple-post-thumbnails-featured-images-in-wordpress/-->
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
                        </div>
                    </div><!-- .products-slider -->
                   	<p class="text-center onscroll-animate">
                        <a href="<?php echo get_page_link(get_page_by_title('productos')->ID);?>" class="button-void">Ver todos los productos</a>
                    </p>
                </div><!-- .container -->
            </div><!-- .section-content -->
		</section>
           
        <?php  
            get_footer();
        ?>