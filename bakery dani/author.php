<?php
    get_header(); 
?>
<?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
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
                            <img src="<?php $arrayheader= $curauth->header_image; if($arrayheader!=null){echo $arrayheader['url'];}else{echo 'https://bakerywp-ruben1507.c9users.io/wp-content/themes/bakery%20dani/images/author-header-default.jpg';} ?>" alt="header img">     
                            <div class="ms-layer">
                            	<h2 class="ms-layer" data-type="text" data-effect="rotate3dbottom(30,0,0,70)"><?php echo $curauth->first_name.' '.$curauth->last_name; ?></h2>
                                <h3 class="ms-layer" data-type="text" data-effect="rotate3dbottom(30,0,0,70)" data-delay="200"><?php echo $curauth->quote; ?></h3>
                            </div>
                        </div><!-- .ms-slide -->
                        <div class="ms-slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/author-header.jpg" alt="header img">     
                            <div class="ms-layer">
                                <h3 class="ms-layer ms-right" data-type="text" data-effect="rotate3dright(30,0,0,70)">Trabajamos todo el tiempo en conjunto a nuestros clientes para crear y ofrecer cosas maravillosas y alucinantes que seguro os traen satisfacción completa.</h3>
                            </div>
                        </div><!-- .ms-slide -->
                    </div><!-- .master-slider -->
                </div><!-- .ms-fullscreen-template -->
        	</div>
        </section>
        <section id="services-section">
            <div class="container">
            	<div class="margin-80"></div>
            	<article>
                    <div class="row">
                        <div class="col-md-4 onscroll-animate fadeIn">
                            <?php 
                    	    $args = array('class'=>'img-responsive');
                    	    echo get_avatar( $curauth->ID, 350, null, null, $args); ?>
                        	<div class="margin-20"></div>
                        </div>
                        <div class="col-md-8 onscroll-animate fadeIn" data-delay="500">
                        	<div class="article-header-3">
                                <h1>Sobre mí</h1>
                           	</div>
                            <p><?php echo $curauth->description; ?></p>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <section id="services-list-section">
            <div class="section-content">
                <div class="container">
                    <header class="section-header">
                        <h1>Mis habilidades</h1>
                        <p>A continuación puedes ver las principales habilidades por las que destaco en este trabajo.</p>
                    </header>
                    
                    <div class="row">
                    	<div class="col-md-4 onscroll-animate fadeIn">
                        	<article class="article-short">
                                <div class="article-short-icon-container" style="border: none;">
                                    <div class="chart easypiechart" data-percent="<?php echo $curauth->reposteria; ?>" data-scale-color="#ffb400"><span><?php echo $curauth->reposteria; ?></span>%</div>
                                </div>
                                <div class="article-short-content">
                                	<h1>Repostería</h1>
                                	<p>La repostería, confitería o pastelería es el arte de preparar o decorar pasteles u otros postres.</p>
                                	
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 onscroll-animate fadeIn" data-delay="400">
                        	<article class="article-short">
                                <div class="article-short-icon-container" style="border: none;">
                                    <div class="chart easypiechart" data-percent="<?php echo $curauth->panaderia; ?>" data-scale-color="#ffb400"><span><?php echo $curauth->panaderia; ?></span>%</div>
                                </div>
                                <div class="article-short-content">
                                	<h1>Panadería</h1>
                                	<p>La panadería como habilidad es la capacidad de crear pan u otros productos relacionados con este.</p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 onscroll-animate fadeIn" data-delay="600">
                        	<article class="article-short">
                            	<div class="article-short-icon-container" style="border: none;">
                                    <div class="chart easypiechart" data-percent="<?php echo $curauth->creatividad; ?>" data-scale-color="#ffb400"><span><?php echo $curauth->creatividad; ?></span>%</div>
                                </div>
                                <div class="article-short-content">
                                	<h1>Creatividad</h1>
                                	<p>La creatividad es la capacidad de generar nuevas ideas o conceptos.</p>
                                	
                                </div>
                            </article>
                        </div>
                    </div>
              		<div class="margin-70"></div>
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
                                        <img alt="avatar 1" src="<?php echo get_template_directory_uri(); ?>/images/avatar3.jpg">
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
        <?php  
            get_footer();
        ?>