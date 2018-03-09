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
                            <h1>¡Ooops!</h1>
                            <h3>Vaya... no hemos encontrado la página que estás buscando</h3>
                        </div>
                    </div>
                </div>
            </div>
     	</section>
        
        <section class="contact-section">            
            <div class="container">
                <div class="content-box">
                    <h1 style = "margin-top: 15px;" >Estamos amasando su resultado, mientras tanto puede probar con otra cosa:</h1>
                    <?php get_search_form('wpdocs_my_search_form'); ?>
                    <br><br>
              
                    <img class="img-responsive center-block img-404 " src="<?php echo get_template_directory_uri(); ?>/images/amasando.gif">
                </div>
            </div>
        </section>
           
        <?php  
            get_footer();
        ?>