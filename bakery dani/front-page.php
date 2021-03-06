<?php
    /*
        Template Name: index
    */
    get_header();
?>
	<div id="all">
    	
        <header class="page-header">
            <div class="page-header-content container">
                 <?php get_template_part('nav'); ?>
            </div>
        </header>
       
        <section id="slider-container" class="top-section">
            <div class="offset-borders">
                <div class="ms-fullscreen-template">
                    <div class="master-slider ms-skin-round" id="masterslider">
                        <div class="ms-slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/slider/1.jpg" alt="header img">     
                            <div class="ms-layer">
                            	<h2 class="ms-layer" data-type="text" data-effect="rotate3dbottom(30,0,0,70)"><?php _e('La mejor bollería artesanal')?></h2>
                                <h3 class="ms-layer" data-type="text" data-effect="rotate3dbottom(30,0,0,70)" data-delay="200"><?php _e('Sabor y placer en el mismo momento')?></h3>
                            </div>
                        </div><!-- .ms-slide -->
                        <div class="ms-slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/slider/2.jpg" alt="header img">     
                            <div class="ms-layer">
                            	<h2 class="ms-layer ms-right" data-type="text" data-effect="rotate3dright(30,0,0,70)"><?php _e('Pan recién hecho a cualquier hora')?></h2>
                                <h3 class="ms-layer ms-right" data-type="text" data-effect="rotate3dright(30,0,0,70)"><?php _e('Horneamos 3 veces al día')?></h3>
                            </div>
                        </div><!-- .ms-slide -->
                        <div class="ms-slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/slider/3.jpg" alt="header img">     
                            <div class="ms-layer">
                            	<h2 class="ms-layer" data-type="text" data-effect="rotate3dtop(30,0,0,70)"><?php _e('Panadería Nº1 en España')?></h2>
                                <h3 class="ms-layer" data-type="text" data-effect="rotate3dtop(30,0,0,70)"><?php _e('Premio a la mejor panadería de España 2017')?></h3>
                            </div>
                        </div><!-- .ms-slide -->
                    </div><!-- .master-slider -->
                </div><!-- .ms-fullscreen-template -->
        	</div>
        </section>
        
        <section id="products-section">
            <div class="section-content">
                <div class="container">
                    <header class="section-header">
                        <h1><?php _e('Nuestros mejores productos')?></h1>
                        <p><?php _e('¡Comprueba algunos de nuestros mejores productos de nuestra panadería!')?></p>
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
                                
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
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
                                
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
                        </div><!-- .slide-1 -->
                        <div><!-- slide 2 -->
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
                               
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
                    <div class="row">
                 	<?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 12
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
                                
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->
                    <?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 14
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
                                
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
                        </div><!-- .slide-2 -->
                        <div><!-- slide 3 -->
                            <div class="row">
                 	<?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 16 
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
                                
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->
                    <?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 18
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
                                
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
                    <div class="row">
                 	<?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 20
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
                                
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->
                    <?php 
                        $args=array( 
                            'post_type' => 'producto',
                            'showposts' => 2,
                            'offset' => 22
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
                                
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->    
                    </div><!-- .row -->
                        </div><!-- .slide-3 -->
                    </div><!-- .products-slider -->
                    
                    <p class="text-center onscroll-animate">
                        <a href="https://bakerywp-ruben1507.c9users.io/productos/" class="button-void"><?php _e('MIRE NUESTROS PRODUCTOS')?></a>
                    </p>
                    <div class="margin-60"></div>
                </div><!-- .container -->
            </div><!-- .section-content -->
        </section>
        
        <section id="testimonials-section" class="section-dark section-color-cover parallax-background">
            <div class="section-content onscroll-animate">
                <div id="testimonials-slider" class="testimonials-slider">
                    <div class="container">
                        <div class="testimonial centered-columns">
                            <div class="centered-column testimonial-avatar-wrapper">
                                <div class="testimonial-avatar-container">
                                    <div class="testimonial-avatar">
                                        <img alt="avatar 1" src="<?php echo get_template_directory_uri(); ?>/images/avatar1.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-name">Karlos Arguiñano</div>
                            <div class="centered-column">
                                <div class="testimonial-content">
                                    “Muchos tipos de pan y a cada cual mejor. ¡Esta panadería es la mejor!"
                                </div>
                            </div>
                        </div><!-- .testimonial -->
                    </div><!-- .container -->
                    <div class="container">
                        <div class="testimonial centered-columns">
                            <div class="centered-column testimonial-avatar-wrapper">
                                <div class="testimonial-avatar-container">
                                    <div class="testimonial-avatar">
                                        <img alt="avatar 2" src="<?php echo get_template_directory_uri(); ?>/images/avatar2.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-name">Ronaldo Nazario</div>
                            <div class="centered-column">
                                <div class="testimonial-content">
                                    “El sabor y la textura de los cruasanes son increibles, los mejores que he probado en mi vida sin ninguna duda."
                                </div>
                            </div>
                        </div><!-- .testimonial -->
                    </div><!-- .container -->
                    <div class="container">
                        <div class="testimonial centered-columns">
                            <div class="centered-column testimonial-avatar-wrapper">
                                <div class="testimonial-avatar-container">
                                    <div class="testimonial-avatar">
                                        <img alt="avatar 3" src="<?php echo get_template_directory_uri(); ?>/images/avatar3.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-name">Martín Berasategui</div>
                            <div class="centered-column">
                                <div class="testimonial-content">
                                    “Cuando me recomendaron venir a esta panadería no me lo creía, ¡menos mal que les hice caso y vine!”
                                </div>
                            </div>
                        </div><!-- .testimonial -->
                    </div><!-- .container -->
                </div><!-- .testimonials-slider -->
            </div><!-- .section-content -->
        </section>
        
        <section id="services-section">
            <div class="section-content tool-section">
                <div class="container tool-container">
                    <div class="tool-top"></div>
                    <div class="tool-bottom"></div>
                    <header class="section-header onscroll-animate">
                        <h1><?php _e('SERVICIOS DE LOS QUE DISPONEMOS')?></h1>
                        <p><?php _e('Nuestros servicios son número uno en todo el país, ofrecemos productos de una gran calidad al alcance de todos')?></p>
                    </header>
                    <div class="row">
                        <div class="col-md-6 onscroll-animate">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="service-box">
                                        <div class="icon-big-container">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="1000px" height="1000px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M212,221.98C85.964,187.169-7.941,251.248,1.822,368.833
                                                    C12.704,499.854,173.083,554.99,247.029,614.643c11.223,93.028,30.146,178.345,41.392,271.35
                                                    c113.273-60.703,353.142-66.429,496.766-28.743c13.14-86.846,30.934-169.037,44.575-255.358
                                                    c60.497-35.176,153.685-105.619,168.764-201.133c18.843-119.102-66.68-197.21-194.222-162.81
                                                    c20.53-149.407-258.347-155.806-283.417-41.506C484.741,71.227,230.387,105.114,212,221.98z"/>
                                            </svg>
                                        </div>
                                        <h2><?php _e('EXPERTOS CHEFS')?></h2>
                                        <div class="horizontal-delimiter"></div>
                                        <p><?php _e('Tenemos a los mejores chefs reposteros y panaderos de España haciendo trabajando para nosotros.')?></p>
                                        <a class="read-more-link" href="<?php echo get_page_link(get_page_by_title('services')->ID);?>"><?php _e('LEER MÁS')?></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="service-box">
                                        <div class="icon-big-container">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="1000px" height="1000px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M686.344,504.227c6.836-54.001,35.174-164.385-6.219-193.098
                                                    c-28.045-19.479-110.537-9.337-151.996-9.337c-49.582,0-116.158-7.521-164.437,0c-91.452,14.237-52.904,137.486-40.33,211.772
                                                    c6.596,38.924,12.473,137.007,40.33,155.732c47.868,32.174,198.272-12.232,266.817,9.354
                                                    C677.659,650.21,676.836,579.403,686.344,504.227z M220.981,357.849C148.923,389.184,23.24,489.647,3.813,572.739
                                                    C-13.902,648.6,32.098,699.38,99.993,700.443c62.858,0.977,172.299,7.589,204.765-28.028
                                                    c-15.881-104.49-18.708-222.086-46.531-314.566C243.356,352.623,228.999,354.371,220.981,357.849z M925.221,697.325
                                                    c111.838-48.896,80.195-161.489,21.723-224.228c-52.287-56.125-136.578-116.105-201.646-105.912
                                                    c-19.857,41.289-21.553,98.682-27.926,152.614c-6.477,54.67-12.85,112.491-12.404,161.952
                                                    C753.006,712.418,853.024,690.9,925.221,697.325z"/>
                                            </svg>
                                        </div>
                                        <h2><?php _e('Bollería y dulces')?></h2>
                                        <div class="horizontal-delimiter"></div>
                                        <p><?php _e('Contamos con la mayor variedad y con las mejores calidades del sector. Nuestros cruasanes son los nº 1.')?></p>
                                        <a class="read-more-link" href="<?php echo get_page_link(get_page_by_title('services')->ID);?>"><?php _e('LEER MÁS')?></a>
                                    </div>
                                </div>
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->
                        <div class="col-md-6 onscroll-animate" data-delay="400">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="service-box">
                                        <div class="icon-big-container">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="1000px" height="1000px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M387.273,318.427c-24.886,8.352-57.601,49.199-79.439,77.621
                                                    c-23.69,30.829-47.38,82.2-79.438,80.297c-26.283-1.549-46.623-33.304-43.575-61.557c3.047-28.169,30.257-37.093,33.321-56.203
                                                    C154.328,372.627,90.8,412.464,49.01,462.959c-28.186,34.063-73.023,118.956-33.321,173.963
                                                    c44.804,62.098,228.197,48.189,351.076,48.189c144.212,0,300.21,0.809,407.448,2.678c38.911,0.672,94.845,3.688,130.691,0
                                                    c65.633-6.787,115.05-75.617,87.134-147.21c-12.241-31.352-42.936-47.785-69.185-74.926c-39.215,3.064-76.206,69.672-112.76,69.572
                                                    c-29.785-0.067-52.382-25.997-48.694-58.88c4.748-42.261,56.17-48.424,76.88-80.297c-49.906-36.116-103.836,7.627-143.505,48.188
                                                    c-28.203,28.825-116.784,126.819-130.692,40.141c-13.537-84.389,77.436-113.383,107.625-155.224
                                                    c-12.156-3.368-26.637-4.293-38.423-8.032c-40.09,24.212-75.836,33.069-112.76,66.912
                                                    c-25.391,23.235-68.191,108.651-107.625,109.729c-26.384,0.708-51.405-25.07-51.253-53.525
                                                    c0.202-42.43,96.023-108.635,97.371-133.824C437.785,317.99,408.656,311.271,387.273,318.427z"/>
                                            </svg>
                                        </div>
                                        <h2>Pan</h2>
                                        <div class="horizontal-delimiter"></div>
                                        <p><?php _e('Llévese su pan recién horneado a casa, horneamos 3 veces al día para obtener la mejor calidad.')?></p>
                                        <a class="read-more-link" href="<?php echo get_page_link(get_page_by_title('services')->ID);?>"><?php _e('LEER MÁS')?></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="service-box">
                                        <div class="icon-big-container">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="1000px" height="1000px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M876.669,598.186c-203.68,79.196-554.465,82.353-763.607,6.949
                                                    c-0.125,21.826-6.734,37.066-6.859,58.893C60.189,685.944,2.331,705.249,0.059,757.577
                                                    c-3.157,72.814,120.998,115.854,198.604,135.136c177.391,44.106,428.312,42.063,602.647,0
                                                    c77.039-18.579,201.591-59.392,198.638-135.136c-2.339-59.505-69.815-70.656-109.607-100.478
                                                    C886.571,636.682,883.573,615.469,876.669,598.186z"/>
                                                <g>
                                                    <g>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M595.858,300.917C561.973,263.511,571.034,346,595.858,300.917L595.858,300.917z
                                                             M318.513,307.844c-19.907,42.812,47.332,34.681,34.238,3.475c129.537-6.223,276.471-27.209,349.263-90.098
                                                            c20.44-17.647,41.608-45.583,37.679-76.221c-13.877-17.147-34.84-25.028-58.21-27.731
                                                            c-144.039-16.67-360.517,42.971-407.485,107.427c-9.789,13.423-16.432,34.84-13.695,55.417
                                                            C274.929,294.195,291.906,305.891,318.513,307.844z M462.324,349.43C527.224,391.583,481.152,269.802,462.324,349.43
                                                            L462.324,349.43z M804.762,103.415c0.728-3.884,3.793-5.405,6.837-6.927c3.384-21.349-13.695-23.847-23.961-13.877
                                                            C786.956,95.988,793.065,102.529,804.762,103.415z M746.529,228.148c9.356,2.521,6.904-6.881,13.718-6.927
                                                            C763.427,180.613,716.776,213.908,746.529,228.148z M910.917,68.779c3.226,10.584,16.648,10.856,17.103,24.234
                                                            C871.354,155.38,805.943,239.141,715.731,293.99c-84.374,51.283-195.367,102.953-304.77,110.879
                                                            c-122.485,8.88-231.888-34.727-291.064-93.55c-16.761-16.67-20.384-41.994-41.086-51.987
                                                            c6.95,48.126,51.215,86.487,92.449,114.354c69.953,47.264,164.434,69.521,270.521,58.915
                                                            C667.81,410.002,852.593,280.658,951.98,141.525c5.678,0.068,1.931,9.607,6.858,10.402
                                                            C959.975,111.25,922.228,73.799,910.917,68.779z M818.435,318.247c-31.524,34.522-4.179,119.328-51.352,124.733
                                                            c-43.198,4.974-43.13-53.623-85.601-58.892c-17.852,49.171-17.171,137.475-85.624,107.405
                                                            c-26.913-11.833-19.169-56.394-54.781-65.842c-31.059,22.894-22.894,75.517-58.21,86.646
                                                            c-47.423,14.922-64.241-48.104-102.726-69.317c-15.444,30.797-17.102,71.452-51.363,72.769
                                                            c-47.138,1.816-40.756-63.139-75.324-86.623c-23.427,16.057-14.695,51.76-44.515,55.439
                                                            c-44.039,5.428-50.682-50.375-51.375-103.952c-18.839,10.97-16.602,43.266-41.085,48.513v83.171
                                                            c213.775,70.065,553.283,47.263,749.899-20.804c-3.61-52.283-2.906-106.792,13.695-159.392
                                                            C861.769,326.854,843.781,305.096,818.435,318.247z M229.482,314.794c14.922-22.099-25.698-36.339-20.542-3.475
                                                            C212.982,315.294,221.033,315.249,229.482,314.794z M250.025,193.513c-12.81-14.922-41.994-5.996-34.238,20.781
                                                            C227.949,228.535,259.132,221.653,250.025,193.513z"/>
                                                    </g>
                                                </g>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M119.897,713.251c-4.531,18.328-30.218,9.925-41.086,13.877
                                                    C70,796.785,151.558,828.877,215.787,848.387c154.179,46.877,389.746,48.558,558.132,3.475
                                                    c71.884-19.236,166.297-46.809,157.53-128.208c-12.787-14.014-51.466-5.02-34.25-45.038c42.153,13.945,72.042,40.291,68.499,100.478
                                                    c-118.42,162.89-681.094,170.316-876.609,55.462c-24.313-14.285-57.029-46.286-58.21-72.791
                                                    C28.925,718.202,106.043,641.391,119.897,713.251z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M893.793,730.58c-14.49,20.123-48.331,3.543-34.25-24.233
                                                    C877.871,696.513,898.153,700.487,893.793,730.58z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M123.327,758.312c-21.656-17.942-5.576-46.083,13.695-45.061
                                                    C162.369,714.613,169.478,765.942,123.327,758.312z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M856.113,737.508c-0.158,16.034-9.721,22.507-27.391,20.804
                                                    C800.992,740.414,844.099,704.62,856.113,737.508z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M154.147,751.385c4.622-3.407,6.848-9.267,10.277-13.877
                                                    c6.836,0,13.695,0,20.543,0C212.017,768.44,156.679,791.448,154.147,751.385z"/>
                                                
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M811.599,744.435c16.193,29.548-32.092,37.974-30.82,6.95
                                                    C785.934,741.459,799.834,738.348,811.599,744.435z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M229.482,744.435c17.863,15.194,9.187,42.039-6.848,45.061
                                                    C192.132,795.241,178.392,736.917,229.482,744.435z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M780.778,765.238c0.159,10.562-7.223,13.469-10.266,20.781
                                                    c-16.33,2.681-22.575-4.883-27.391-13.854C741.669,747.887,775.305,745.524,780.778,765.238z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M277.416,789.495c-14.899,4.86-21.667,8.357-34.238,0
                                                    C231.197,743.73,295.392,755.2,277.416,789.495z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M729.404,761.764c3.906,7.608,8.857,14.172,6.858,27.731
                                                    c-5.519,7.108-17.17,8.017-30.797,6.927C694.519,781.205,700.719,755.745,729.404,761.764z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M321.931,792.947c-6.019,9.425-28.219,9.425-34.238,0
                                                    C279.834,757.471,329.789,757.471,321.931,792.947z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M695.178,796.422c-5.542,5.95-14.332,8.607-27.414,6.927
                                                    C642.35,776.526,701.9,748.613,695.178,796.422z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M363.028,779.093c0,8.085,0,16.171,0,24.256
                                                    c-9.63,4.815-19.691,9.153-30.82,3.476C316.4,781.932,345.12,761.128,363.028,779.093z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M650.662,775.618c3.884,7.631,8.835,14.172,6.836,27.73
                                                    C631.539,838.075,595.041,766.987,650.662,775.618z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M404.114,782.567c11.867,22.395-13.945,39.405-30.82,24.257
                                                    C365.674,781.772,387.364,771.848,404.114,782.567z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M606.146,779.093c7.019,5.587,7.927,17.374,6.837,31.184
                                                    C584.071,840.506,558.611,770.371,606.146,779.093z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M448.629,789.495c4.122,25.937-11.913,34.567-30.82,27.708
                                                    C400.65,793.628,432.015,768.781,448.629,789.495z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M489.726,806.824c-4.486,11.333-26.8,14.422-34.25,3.452
                                                    C446.312,775.595,495.313,774.459,489.726,806.824z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M534.241,789.495c3.066,20.44-5.155,29.435-20.555,31.183
                                                    C482.946,811.162,510.2,762.104,534.241,789.495z"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M571.92,789.495c3.589,22.121-5.541,31.364-27.413,27.708
                                                    C526.814,797.875,552.093,769.939,571.92,789.495z"/>
                                            </svg>
                                        </div>
                                        <h2><?php _e('Tarta de boda')?></h2>
                                        <div class="horizontal-delimiter"></div>
                                        <p><?php _e('Deje que seamos nosotros quien se encargue de la tarta para ese día tan especial.')?></p>
                                        <a class="read-more-link" href="<?php echo get_page_link(get_page_by_title('services')->ID);?>"><?php _e('LEER MÁS')?></a>
                                    </div>
                                </div>
                            </div><!-- .row -->
                        </div><!-- .col-md-6 -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .section-content -->
        </section>
        
        <section id="heading-section" class="section-white-cover parallax-background">
            <div class="section-content">
                <div class="container">
                    <div class="margin-90"></div>
                    <h2 class="heading-huge"><?php _e('Variedad en los tipos de panes')?></h2>
                    <h3 class="heading-small"><?php _e('Encontrarás la mayor variedad y la mayor calidad de pan en nuestras panaderías')?></h3>
                    <img id="bread-image" alt="bread" class="img-responsive center-block onscroll-animate" src="<?php echo get_template_directory_uri(); ?>/images/bread.png">
                </div><!-- .container -->
            </div><!-- .section-content -->
        </section>
        
        <div class="margin-100"></div>
        
        <section id="offer-section">
            <div class="section-content">
                <div class="container">
                    <header class="section-header onscroll-animate">
                        <h1><?php _e('Oferta de la semana')?></h1>
                        <p>
                            <?php _e('Esta es nuestra oferta de la semana, llévese el exclusivo producto por un precio de risa con la mejor calidad del mercado.
                            Ofrecemos servicio personalizado y le recomendamos siempre la mejor opción.')?>
                        </p>
                    </header>
                    
                    <div class="tabs-big-container centered-columns">
                        <div class="centered-column centered-column-top">
                            <!-- Nav tabs -->
                            <ul class="nav" role="tablist">
                              <li class="active onscroll-animate"><a href="#popular" role="tab" data-toggle="tab"><img alt="product 1" src="<?php echo get_template_directory_uri(); ?>/images/offer_nav_1.png"></a></li>
                              <li class="onscroll-animate" data-delay="400"><a href="#recent" role="tab" data-toggle="tab"><img alt="product 2 thumb" src="<?php echo get_template_directory_uri(); ?>/images/offer_nav_2.png"></a></li>
                              <li class="onscroll-animate" data-delay="600"><a href="#comments" role="tab" data-toggle="tab"><img alt="product 3 thumb" src="<?php echo get_template_directory_uri(); ?>/images/offer_nav_3.png"></a></li>
                            </ul>
                        </div>
                        
                        <div class="centered-column tab-content centered-column-top">
                        <!-- Tab panes -->
                            <div role="tabpanel" class="tab-pane fade in active" id="popular">
                                <article>
                                    <div class="centered-columns offer-box">
                                        <div class="offer-box-left centered-column">
                                            <div class="offer-info">
                                                <h1>Bizcocho de nueces</h1>
                                                <p>Delicioso bizcocho de nueces de macadamia, con vainilla y azúcar glás. Perfecto para desayunar, merendar o cenar acompañado de un buen chocolate caliente, en nuestra panadería podrás pedir por encargo con el tamaño deseado este delicisioso bizcocho y disfrutar de el intenso sabor y jugosidad.</p>
                                                <h2>Ingredientes:</h2>
                                                <ul class="list-numbers">
                                                    <li>Mantequilla</li>
                                                    <li>Huevo</li>
                                                    <li>Harina</li>
                                                    <li>Nueces</li>
                                                    <li>Azúcar Glas</li>
                                                    <li>Leche</li>
                                                    <li>Yogurt</li>
                                                </ul>
                                                
                                                <div class="margin-100"></div>
                                                <h2 class="text-huge">3,99€ <a href="#" class="button">¡Encárgalo! <i class="fa fa-long-arrow-right"></i></a></h2>
                                                <div class="margin-20"></div>
                                            </div>
                                        </div>
                                        <div class="offer-box-right centered-column" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/offer1.png');">
                                            <div class="product-label-container big-label">
                                                <div class="product-label">
                                                    ELECCIÓN DE LA SEMANA
                                                </div>
                                                <div class="product-label-bottom"></div>
                                            </div>
                                        </div>
                                    </div><!-- .row -->
                                </article>
                            </div><!-- .tab-pane -->
                            <div role="tabpanel" class="tab-pane fade" id="recent">
                                <article>
                                    <div class="centered-columns offer-box">
                                        <div class="offer-box-left centered-column">
                                            <div class="offer-info">
                                                <h1>EL CRUASÁN</h1>
                                                <p>El cruasán, también escrito abundantemente en su grafía sin adaptar croissant, conocido como cachitos en Perú, Ecuador y Venezuela, pan cacho en Colombia,medialunas (un tipo de facturas) en Paraguay, Argentina, Uruguay y Chile y, en algunos países de América Latina, como cangrejitos o cuernitos, es una pieza de bollería hojaldrada de origen austriaco, hecha con masa de hojaldre, levadura, mantequilla o grasa vacuna (en ocasiones se sustituye por margarina). Los hay dulces o saladas.</p>
                                                <h2>Ingredientes:</h2>
                                                <ul class="list-numbers">
                                                    <li>250 gr de harina</li>
                                                    <li>75 gr de levadura</li>
                                                    <li>50 gr de azúcar</li>
                                                    <li>450 gr de mantequilla</li>
                                                    <li>30 gr de sal</li>
                                                    <li>Agua (la que admita)</li>
                                                </ul>
                                                
                                                <div class="margin-100"></div>
                                                <h2 class="text-huge">1.00€ <a href="#" class="button">¡ENCÁRGALO! <i class="fa fa-long-arrow-right"></i></a></h2>
                                                <div class="margin-20"></div>
                                            </div>
                                        </div>
                                        <div class="offer-box-right centered-column" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/offer2.png);">
                                            <div class="product-label-container big-label">
                                                <div class="product-label">
                                                    ELECCIÓN DE LA SEMANA
                                                </div>
                                                <div class="product-label-bottom"></div>
                                            </div>
                                        </div>
                                    </div><!-- .row -->
                                </article>
                            </div><!-- .tab-pane -->
                            <div role="tabpanel" class="tab-pane fade" id="comments">
                                <article>
                                    <div class="centered-columns offer-box">
                                        <div class="offer-box-left centered-column">
                                            <div class="offer-info">
                                                <h1>Hojaldres</h1>
                                                <p>El hojaldre es una masa crujiente llevada a Europa por los árabes, aunque su origen es anterior, pudiendo encontrarse referencias a pastas y masas hojaldradas en la Grecia y Roma clásicas.Se elabora con harina, grasa (mantequilla, manteca de cerdo o margarina), agua y sal. Es crujiente y su textura es uno de sus grandes atractivos. El hojaldre es distinto de la masa brisa.</p>
                                                <h2>Ingredientes:</h2>
                                                <ul class="list-numbers">
                                                    <li>500 g de harina</li>
                                                    <li>250 g de agua a temperatura ambiente</li>
                                                    <li>60 g de mantequilla fundida</li>
                                                    <li>350 g de mantequilla en bloque</li>
                                                    <li>5 g de sal</li>
                                                    <li>1 cdta. de azúcar (si el hojaldre es para dulce)</li>
                                                </ul>
                                                
                                                <div class="margin-100"></div>
                                                <h2 class="text-huge">2.50€ <a href="#" class="button">¡ENCÁRGALO! <i class="fa fa-long-arrow-right"></i></a></h2>
                                                <div class="margin-20"></div>
                                            </div>
                                        </div>
                                        <div class="offer-box-right centered-column" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/offer3.png');">
                                            <div class="product-label-container big-label">
                                                <div class="product-label">
                                                    ELECCIÓN DE LA SEMANA
                                                </div>
                                                <div class="product-label-bottom"></div>
                                            </div>
                                        </div>
                                    </div><!-- .row -->
                                </article>
                            </div><!-- .tab-pane -->
                        </div><!-- .centered-column -->
                    </div><!-- .tabs-big-container -->
                    
                    <div class="margin-80"></div>
                </div><!-- .container -->
            </div><!-- .section-content -->
        </section>
        
        <section id="devices-section" class="section-dark section-color-cover">
            <div class="section-content">
                <div class="container">
                    <div class="row centered-columns big-columns">
                        <div class="col-md-6 onscroll-animate centered-column centered-column-bottom">
                            <div class="margin-80"></div>
                            <img id="devices-img" class="img-width-control" alt="devices" src="<?php echo get_template_directory_uri(); ?>/images/devices.png">
                        </div>
                        <div class="col-md-6 centered-column centered-column-middle">
                            <div class="icon-opening-wrapper big-version onscroll-animate" data-delay="300">
                                <div class="icon-opening"><i class="fa fa-star"></i></div>
                                <div class="icon-opening-content">
                                    <h2><?php _e('Productos Estrella') ?></h2>
                                    <p><?php _e('¡Disfruta de nuestros productos estrella recién hechos y a un precio reducido!')?></p>
                                </div>
                            </div>
                            <div class="icon-opening-wrapper big-version onscroll-animate" data-delay="350">
                                <div class="icon-opening"><i class="fa fa-trophy"></i></div>
                                <div class="icon-opening-content">
                                    <h2><?php _e('Premios')?></h2>
                                    <!--<p>I freely assert, that the cosmopolite philosopher cannot, for his life, point out one single peaceful influence, which within the last sixty years.</p>-->
                                    <ul>
                                        <li><?php _e('Premio a la mejor Panadería 2017')?></li>
                                        <li><?php _e('Premio al mejor Cruasán  2017')?></li>
                                        <li><?php _e('Premio al mejor Cruasán  2016')?></li>
                                        <li><?php _e('Premio al mejor Pionono  2016')?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="icon-opening-wrapper big-version onscroll-animate" data-delay="400">
                                <div class="icon-opening"><i class="fa fa-calendar"></i></div>
                                <div class="icon-opening-content">
                                    <h2><?php _e('Abierto todo el año')?></h2>
                                    <p><?php _e('Abrimos todos los días del año, incluidos festivos. Dispuestos a ofrecer el mejor servicio y la mayor calidad a nuestros clientes siempre.')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .container -->
            </div><!-- .section-content -->
        </section>
        
        <section id="team-section">
            <div class="section-content">
                <div class="container">
                    <header class="section-header onscroll-animate">
                        <h1><?php _e('Miembros del grupo')?></h1>
                        <p><?php _e('Equipo del proyecto')?></p>
                    </header>
                    <div class="row"> 
                        <div class="col-md-3 onscroll-animate">
                            <div class="profile">
                                <div class="profile-box">
                                    <div class="profile-photo">
                                        <img alt="profile photo 1" src="<?php echo get_template_directory_uri(); ?>/images/profile1.png">
                                        <div class="profile-photo-info">
                                            <div class="profile-photo-info-container">
                                                <div class="profile-photo-info-content">
                                                    <div class="profile-icon"><a href="#"><i class="fa fa-facebook"></i></a></div>
                                                    <div class="profile-icon"><a href="#"><i class="fa fa-twitter"></i></a></div>
                                                    <div class="profile-icon"><a href="https://bakerywp-ruben1507.c9users.io/author/dani/"><i class="fa fa-user"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><span class="text-uppercase">Daniel Llosá</span></h3>
                                </div><!-- .profile-box -->
                                <div class="profile-info">
                                    <p>Whether the flitting attendance of the one still and solitary jet had gradually worked upon Ahab.</p>
                                </div>
                            </div><!-- .profile -->
                            <div class="margin-40"></div>
                        </div><!-- .col-md-3 -->
                        <div class="col-md-3 onscroll-animate" data-delay="300">
                            <div class="profile">
                                <div class="profile-box">
                                    <div class="profile-photo">
                                        <img alt="profile photo 2" src="<?php echo get_template_directory_uri(); ?>/images/profile2.png">
                                        <div class="profile-photo-info">
                                            <div class="profile-photo-info-container">
                                                <div class="profile-photo-info-content">
                                                    <div class="profile-icon"><a href="#"><i class="fa fa-facebook"></i></a></div>
                                                    <div class="profile-icon"><a href="#"><i class="fa fa-twitter"></i></a></div>
                                                    <div class="profile-icon"><a href="https://bakerywp-ruben1507.c9users.io/author/ruben/"><i class="fa fa-user"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><span class="text-uppercase">Rubén García</span></h3>
                                </div><!-- .profile-box -->
                                <div class="profile-info">
                                    <p>Whether the flitting attendance of the one still and solitary jet had gradually worked upon Ahab.</p>
                                </div>
                            </div><!-- .profile -->
                            <div class="margin-40"></div>
                        </div><!-- .col-md-3 -->
                        <div class="col-md-3 onscroll-animate" data-delay="400">
                            <div class="profile">
                                <div class="profile-box">
                                    <div class="profile-photo">
                                        <img alt="profile photo 3" src="<?php echo get_template_directory_uri(); ?>/images/profile3.png">
                                        <div class="profile-photo-info">
                                            <div class="profile-photo-info-container">
                                                <div class="profile-photo-info-content">
                                                    <div class="profile-icon"><a href="#"><i class="fa fa-facebook"></i></a></div>
                                                    <div class="profile-icon"><a href="#"><i class="fa fa-twitter"></i></a></div>
                                                    <div class="profile-icon"><a href="https://bakerywp-ruben1507.c9users.io/author/juancarlos/"><i class="fa fa-user"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><span class="text-uppercase">Juan Carlos Ávila</span></h3>
                                </div><!-- .profile-box -->
                                <div class="profile-info">
                                    <p>Whether the flitting attendance of the one still and solitary jet had gradually worked upon Ahab.</p>
                                </div>
                            </div><!-- .profile -->
                            <div class="margin-40"></div>
                        </div><!-- .col-md-3 -->
                        <div class="col-md-3 onscroll-animate" data-delay="500">
                            <div class="profile">
                                <div class="profile-box">
                                    <div class="profile-photo">
                                        <img alt="profile photo 4" src="<?php echo get_template_directory_uri(); ?>/images/profile4.png">
                                        <div class="profile-photo-info">
                                            <div class="profile-photo-info-container">
                                                <div class="profile-photo-info-content">
                                                    <div class="profile-icon"><a href="#"><i class="fa fa-facebook"></i></a></div>
                                                    <div class="profile-icon"><a href="#"><i class="fa fa-twitter"></i></a></div>
                                                    <div class="profile-icon"><a href="https://bakerywp-ruben1507.c9users.io/author/lales/"><i class="fa fa-user"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><span class="text-uppercase">Alexander Portero</span></h3>
                                </div><!-- .profile-box -->
                                <div class="profile-info">
                                    <p>Whether the flitting attendance of the one still and solitary jet had gradually worked upon Ahab.</p>
                                </div>
                            </div><!-- .profile -->
                            <div class="margin-40"></div>
                        </div><!-- .col-md-3 -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .section-content -->
        </section>
                       
        <section id="posts-section">
            <div class="section-content">
                <div class="container">
                    <header class="section-header onscroll-animate">
                        <h1><?php _e('ÚLTIMOS POST')?></h1>
                        <p><?php _e('¡Echa un vistazo a los últimos posts de nuestro')?> <a href="https://bakerywp-ruben1507.c9users.io/blog/">blog!</a></p>
                    </header>
                </div>
                <div id="post-slider-1" class="post-slider slider-arrows">
                    <div class="container">
                        <div class="row">
                            
                              <?php
                                $args=array(
                                'posts_per_page'=>3,    
                               );
                            
                                $custom_query = new WP_Query($args);
                            
                                if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                                ?>
                                
                            <div class="col-md-4 onscroll-animate">
                                <div class="post">
                                    <div class="post-image">
                                        <div id="post-images-slider-1" class="post-images-slider">
                                            <a href="<?php the_permalink(); ?>"><img alt="post image 1" src="<?php 
                        if(has_post_thumbnail()){
                            $postImg = get_the_post_thumbnail_url();
                        }else{
                            $postImg = get_template_directory_uri()."/img/default-image.png";
                        }
                        echo $postImg ?>"></a>
                                        </div>
                                    </div>
                                    <div class="post-data">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h2>
                                        <p><?php echo excerpt(23); ?></p>
                                    </div>
                                    <div class="post-info">
                                        <a href="#"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></a> <span class="delimiter-inline">|</span> <a href="<?php the_permalink(); ?>#respond"><i class="fa fa-comments"></i> <?php comments_number( 'Sin comentarios', '1 comentario', '% comentarios' ); ?></a>
                                    </div>
                                </div><!-- .post -->
                            </div>
                                 <?php
                            endwhile;endif;
                            wp_reset_query();
                        ?>
                                
                        </div><!-- .row -->
                    </div><!-- .container -->
                    <div class="container">
                        <div class="row">
                            
                              <?php
                                $args=array(
                                'posts_per_page'=>3,
                                'offset' => 3,
                               );
                            
                                $custom_query = new WP_Query($args);
                            
                                if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                                ?>
                                
                            <div class="col-md-4 onscroll-animate">
                                <div class="post">
                                    <div class="post-image">
                                        <div id="post-images-slider-1" class="post-images-slider">
                                            <a href="<?php the_permalink(); ?>"><img alt="post image 1" src="<?php 
                        if(has_post_thumbnail()){
                            $postImg = get_the_post_thumbnail_url();
                        }else{
                            $postImg = get_template_directory_uri()."/img/default-image.png";
                        }
                        echo $postImg ?>"></a>
                                        </div>
                                    </div>
                                    <div class="post-data">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h2>
                                        <p><?php echo excerpt(23); ?></p>
                                    </div>
                                    <div class="post-info">
                                        <a href="#"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></a> <span class="delimiter-inline">|</span> <a href="<?php the_permalink(); ?>#respond"><i class="fa fa-comments"></i> <?php comments_number( 'Sin comentarios', '1 comentario', '% comentarios' ); ?></a>
                                    </div>
                                </div><!-- .post -->
                            </div>
                                 <?php
                            endwhile;endif;
                            wp_reset_query();
                        ?>
                                
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .post-slider -->
            </div>
            </div><!-- .section-content -->
        </section> 
        
        <section id="contact-section">
            <div class="section-content">
            
                <!-- Google map -->
                <div class="google-map">
                    <div id="map-canvas"></div>
                </div>
                <!-- /Google map -->
                
                <div class="container">
                    <form class="form-contact onscroll-animate" id="contact-form" action="" method="post" data-all-fields-required-msg="All fields are required" data-ajax-fail-msg="Ajax could not set the request" data-success-msg="Email successfully sent.">
                        <h2><?php _e('Contacta con nosotros')?></h2>
                        <p><?php _e('Nuestra compañia es la mejor, pregunta cualquier duda o haz un encargo para recogerlo en el momento que mejor le venga.')?></p>
                        <input type="text" name="name" placeholder="Nombre completo">
                        <input type="text" name="email" placeholder="E-mail">
                        <textarea name="message" placeholder="Mensaje"></textarea>
                        <div class="text-center">
                            <input type="submit" value="Enviar">
                        </div>
                        <p class="return-msg"></p>
                    </form>
                </div>
               </div><!-- .section-content -->
        </section>
          
        <section id="clients-section">
            <div class="section-content">
                <div class="container">
                    <header class="section-header onscroll-animate">
                        <h1><?php _e('Nuestros patrocinadores')?></h1>
                        <p><?php _e('Estas son las compañías que creyeron y apoyaron en los inicios en nuestro gran proyecto para vosotros.')?></p>
                    </header>
                    <div class="row">
                        <div class="col-sm-2 client-logo onscroll-animate" data-delay="200"><img alt="client 1" src="<?php echo get_template_directory_uri(); ?>/images/clients/client1.png"></div>
                        <div class="col-sm-2 client-logo onscroll-animate" data-delay="250"><img alt="client 2" src="<?php echo get_template_directory_uri(); ?>/images/clients/client2.png"></div>
                        <div class="col-sm-2 client-logo onscroll-animate" data-delay="300"><img alt="client 3" src="<?php echo get_template_directory_uri(); ?>/images/clients/client3.png"></div>
                        <div class="col-sm-2 client-logo onscroll-animate" data-delay="350"><img alt="client 4" src="<?php echo get_template_directory_uri(); ?>/images/clients/client4.png"></div>
                        <div class="col-sm-2 client-logo onscroll-animate" data-delay="400"><img alt="client 5" src="<?php echo get_template_directory_uri(); ?>/images/clients/client5.png"></div>
                        <div class="col-sm-2 client-logo onscroll-animate" data-delay="450"><img alt="client 6" src="<?php echo get_template_directory_uri(); ?>/images/clients/client2.png"></div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php  
            get_footer();
        ?>