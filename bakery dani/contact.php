<?php
    /*
        Template Name: Contacto
    */
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
                <div class="full-header-container" id="header-contact">
                    <div class="full-header">
                        <div class="container">
                            <h1>Contacto</h1>
                            <h3>Manda tu mensaje</h3>
                        </div>
                    </div>
                </div>
            </div>
     	</section>
        
        <section class="contact-section">            
            <div class="container">
                <div class="content-box">
                    <!-- Google map -->
                    <div class="google-map-big-container onscroll-animate">
                        <div class="google-map">
                            <div id="map-canvas"></div>
                        </div>
                    </div>
                    <!-- /Google map -->
                    
                    <div class="row">
                        <div class="col-md-8 onscroll-animate">
                        	<article>
                                <div class="article-header">
                                    <h1>Déjanos tu mensaje</h1>
                                </div>
                                <form class="form-contact-alt" id="contact-form-alt" action="" method="post" data-all-fields-required-msg="All fields are required" data-ajax-fail-msg="Ajax could not set the request" data-success-msg="Email successfully sent.">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <input type="text" name="name">
                                        </div>
                                        <div class="col-sm-5 input-description">
                                            <i class="fa fa-user"></i> Nombre
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="email">
                                        </div>
                                        <div class="col-sm-5 input-description">
                                            <i class="fa fa-envelope"></i> Email
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="subject">
                                        </div>
                                        <div class="col-sm-5 input-description">
                                            <i class="fa fa-file"></i> Asunto
                                        </div>
                                    </div>
                                    <textarea name="message"></textarea>
                                    <div class="clearfix">
                                        <div class="submit-container">
                                            <input type="submit" value="Enviar mensaje">
                                        </div>
                                    </div>
                                    <p class="return-msg"></p>
                                </form>
                            </article>
                        </div>
                        <div class="col-md-4 onscroll-animate" data-delay="500">
                        	<article>
                            	<div class="article-header">
                                	<h1>Contacto</h1>
                                </div>
                                <p>He turned, stared, bawled something about "crawling out in a thing like a dish cover," and ran on to the gate of the house at the crest. A sudden whirl of black smoke driving across the road hid him for a moment.</p>
                                <div class="margin-20"></div>
                                <p>T: 0 800 500 55 123 465</p>
                                <p>D: Johny Bravo, Street Number, City</p>
                                <p>E: info@yourdomain.com</p>
                         	</article>
                            <div class="margin-10"></div>
                            <article>
                            	<div class="article-header">
                                	<h1>Redes Sociales</h1>
                                </div>
                                <div class="social-icon-container-alt">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="social-icon-container-alt">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                                <div class="social-icon-container-alt">
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                </div>
                                <div class="social-icon-container-alt">
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                                <div class="social-icon-container-alt">
                                    <a href="#"><i class="fa fa-tumblr"></i></a>
                                </div>
                                <div class="social-icon-container-alt">
                                    <a href="#"><i class="fa fa-skype"></i></a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
           
        <?php  
            get_footer();
        ?>
