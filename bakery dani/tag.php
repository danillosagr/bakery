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
                            <h1>Blog El Panaero</h1>
                            <h3><?php single_tag_title('Lista de posts sobre: '); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
    	</section>
            
       	<section id="blog-section">
            <div class="container">
            	
                <div class="col-md-9"  style="float:  right;">
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') :1;
                        $args=array(
                            'posts_per_page'=>4,
                            'paged' => $paged,
                            'nopaging' => false,
                            'tag' => single_tag_title("", false)
                            );
                            
                        $custom_query = new WP_Query($args);
                            
                        if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
                    ?>
                    <article class="onscroll-animate">
                    	<div class="blog-post">
                        	<div class="blog-post-header">
                    			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h1>
                                <div class="blog-post-info">
                                	<a href="#"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></a> <span class="delimiter-inline">|</span> <a href="<?php the_permalink(); ?>#respond"><i class="fa fa-comments"></i> <?php comments_number( 'Sin comentarios', '1 comentario', '% comentarios' ); ?></a>
                                </div>
                            </div>
                            <a href="#">
                                <div class="blog-post-preview">
                                	<div class="blog-post-image">
                                        <a href="<?php the_permalink(); ?>"><img alt="post image 1" src="<?php 
                                            if(has_post_thumbnail()){
                                                $postImg = get_the_post_thumbnail_url();
                                            }else{
                                                $postImg = get_template_directory_uri()."/img/default-image.png";
                                            }
                                            echo $postImg ?>"></a>
                                        <a href="<?php the_permalink(); ?>"><div class="blog-post-image-cover"></div></a>
                                    </div>
                                </div>
                            </a>
                        
                        	<p><?php echo excerpt(60); ?></p>
                        	
                            <div class="blog-post-footer">
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
                            	<a class="read-more-link" href="<?php the_permalink(); ?>">Leer más</a>
                            </div>
                        </div>
                	</article>
                    <?php
                        endwhile;endif; ?>
                    <div class="text-center">
                        <?php
                        
                        
                        
                        	the_posts_pagination(array(
                             'prev_text' => '<div class="pagination-item pagination-nav">Anterior</div>',
                             'next_text' => '<div class="pagination-item pagination-nav">Siguiente</div>',
                             'title_li' => null,
                             'before_page_number' => '<div class="pagination-item">',
                             'after_page_number' => '</div>'
                            ));
	
                        wp_reset_query();
                    ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </section>
           
        <?php  
            get_footer();
        ?>