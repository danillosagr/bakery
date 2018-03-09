<div class="menu-button-container">
                    <i id="menu-button" class="menu-button fa fa-reorder"></i>
                </div>
                <nav id="nav-top" class="nav-top">
                    <ul>
                        <li><a href="<?php echo get_option('home'); ?>">Home</a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('productos')->ID);?>"><?php _e('Productos')?></a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('about')->ID);?>"><?php _e('Nosotros')?></a></li>
                    </ul>
                    <h1 class="logo-primary"><img id="logo-1" alt="Bakery" src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></h1>
                    <div class="logo-secondary"><img id="logo-2" alt="Bakery" src="<?php echo get_template_directory_uri(); ?>/images/logo_secondary.png"></div>
                    <ul>
                        <li><a href="<?php echo get_page_link(get_page_by_title('blog')->ID);?>">Blog</a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('services')->ID);?>"><?php _e('Servicios')?></a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('contacto')->ID);?>"><?php _e('Contacto')?></a></li>
                        <!--Carga widget idioma-->
                      <div class="idioma">
                                                
                        <?php  
                    
                            if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Idioma Widget
                            ')) :
                        
                        ?>
                        
                        <div class="warning">No sale el widget compare</div>
                        
                        <?php
                            endif;
                        ?>
                        
                    </div>
                    </ul>
                    
                </nav>