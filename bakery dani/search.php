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
                <div class="full-header-container" id="header-menus">
                    <div class="full-header">
                        <div class="container">
                            <h1>Búsqueda</h1>
                            <h3>Resultados de búsqueda</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
 
    <!--contenido principal-->
    <div id="main-content">
     <div class="container">
     <div id="content-area" class="clearfix">
     <div class="content-box">
                              <!--título general-->
                              <h1 style = "margin-top: 15px;" >Resultados de su Búsqueda:</h1>
                       <span class="et_pb_fullwidth_header_subhead"> Categorías:
                       
                       <!--las categorías del blog-->
                              <?php $categories = get_categories();
                                    foreach ( $categories as $category ) { 
                                      if (!each($categories)){?>
                  <a href="<?php echo esc_url( get_category_link(get_cat_ID($category->name)))?>"> <?php echo esc_html( $category->name )?> </a>
                      <?php } 
                                     else {?>
                                         <a href="<?php echo esc_url( get_category_link(get_cat_ID($category->name)))?>"> <?php echo esc_html( $category->name )?> /</a>
                      <?php } 
                                 } ?>
                     </span>
                     <div class="margin-30"></div>
                            <!--buscador-->
                            <div class="buscador center"><?php echo get_search_form(); ?></div>
                           
                            <!--si hay post, entra en el bucle-->
                            <?php if ( have_posts() ) : ?>
                            <!--el loop-->
                                 <?php while ( have_posts() ) : the_post(); ?>
                                   <!-- recopilando info de cada post -->
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                            <!-- título del post -->
                                <article class="onscroll-animate">
                                	<div class="blog-post">
                                    	<div class="blog-post-header">
                                             <h1><a href="<?php the_permalink(); ?>"><?php the_title(); echo '<br><br>'?></a></h1>
                                              <div class="blog-post-info">
                                	            <a href="#"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></a> <span class="delimiter-inline">|</span> <a href="<?php the_permalink(); ?>#respond"><i class="fa fa-comments"></i> <?php comments_number( 'Sin comentarios', '1 comentario', '% comentarios' ); ?></a>
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
     <!-- contenido del post -->
                                           <p><?php echo excerpt(60); ?></p>
                                           <a class="read-more-link" href="<?php the_permalink(); ?>">Leer más</a>
      <!-- fin contenido post -->
     </article> <!-- fin info de cada post -->
                         <?php endwhile; ?><!-- fin del loop -->
                            <!-- si no hay post de búsqueda -->
                            <?php else: ?>
                            <div class="margin-50"></div>
                            <p>No se han encontrado resultados para su búsqueda. Puede ir al Blog y ver todas las entradas directamente aquí:</p>
                             
                              <h1> <a href="https://bakerywp-ruben1507.c9users.io/blog/">Ir al Blog</a></h1>
                             
                            <?php endif;?>
     </div>
     </div> 
    </article>
     </div>
     </div>
     <!--Paginacion-->
     <div class="text-center">
                        <nav class="navigation pagination" role="navigation">
		                <h2 class="screen-reader-text">Navegación de entradas</h2>
		                <div class="nav-links">
                    <?php
                    
                        //FUNCIONA PARA POST NORMAL
                        the_posts_pagination(array(
                             'prev_text' => '<div class="pagination-item pagination-nav">Anterior</div>',
                             'next_text' => '<div class="pagination-item pagination-nav">Siguiente</div>',
                             'title_li' => null,
                             'before_page_number' => '<div class="pagination-item">',
                             'after_page_number' => '</div>'
                        ));
                        
                        //FUNCIONA PARA CUSTOM POST TYPE
                        // $big = 999999999; // need an unlikely integer
                        // echo paginate_links( array(
                        //     'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                        //     'prev_text' => '<div class="pagination-item pagination-nav">Anterior</div>',
                        //     'next_text' => '<div class="pagination-item pagination-nav">Siguiente</div>',
                        //     'before_page_number' => '<div class="pagination-item">',
                        //      'after_page_number' => '</div>',
                        //     'format' => '?paged=%#%',
                        //     'current' => max( 1, $paged),
                        //     'total' => $custom_query->max_num_pages,
                        //     'type' => 'plain',
                        // ) );
	
                        wp_reset_query();
                    ?>
                        </nav>
                        </h2>
                        </div>
                    </div>
     </div>
     </div>
    </div>
    </div>
     
    <?php get_footer(); ?>