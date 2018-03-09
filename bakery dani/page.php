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
                <div class="full-header-container" id="header-404">
                    <div class="full-header">
                        <div class="container">
                            <h1><?php the_title();?></h1>
                            <h3>Plantilla para páginas</h3>
                        </div>
                    </div>
                </div>
            </div>
     	</section>
        
        <section class="contact-section">            
            <div class="container">
                <div class="content-box">
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>
                            <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </section>
           
        <?php  
            get_footer();
        ?>