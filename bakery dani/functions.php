<?php

function theme_scripts(){
    
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ), null, false );
    wp_enqueue_script( 'modernizr' );
    
    //wp_register_script( 'jquery-3.3.1.min', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array( 'jquery' ), null, true );
    //wp_enqueue_script( 'jquery-3.3.1.min' );
    wp_register_script( 'jquery-1.11.1.min', get_template_directory_uri() . '/js/jquery-1.11.1.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'jquery-1.11.1.min' );
    
    wp_register_script( 'map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCM08AN0CJf-u94vdS79t5tkXPSho_rIL0', array( 'jquery' ), null, true );
    wp_enqueue_script( 'map' );
    
    wp_register_script( 'bootstrap.min', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'bootstrap.min' );
    
    wp_register_script( 'owl.carousel.min', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'owl.carousel.min' );
    
    wp_register_script( 'masterslider.min', get_template_directory_uri() . '/masterslider/masterslider.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'masterslider.min' );
    
    wp_register_script( 'masterslider.js', get_template_directory_uri() . '/masterslider/masterslider.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'masterslider.js' );
    
    wp_register_script( 'jquery.scrollTo.min', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'jquery.scrollTo.min' );
    
    wp_register_script( 'jquery.stellar.min', get_template_directory_uri() . '/js/jquery.stellar.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'jquery.stellar.min' );
    
    wp_register_script( 'placeholder-fallback', get_template_directory_uri() . '/js/placeholder-fallback.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'placeholder-fallback' );
    
    wp_register_script( 'jquery.inview.min', get_template_directory_uri() . '/js/jquery.inview.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'jquery.inview.min' );
    
    wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'custom' );
    
    wp_register_script( 'custom2', get_template_directory_uri() . '/js/custom2.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'custom2' );
    
    wp_register_script( 'jquery.easing.1.3', get_template_directory_uri() . '/js/easypiechart/jquery.easing.1.3.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'jquery.easing.1.3' );
    
    wp_register_script( 'jquery.easypiechart.min', get_template_directory_uri() . '/js/easypiechart/jquery.easypiechart.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'jquery.easypiechart.min' );
    
    wp_register_script( 'jquery.easypiechart.custom', get_template_directory_uri() . '/js/easypiechart/jquery.easypiechart.custom.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'jquery.easypiechart.custom' );

    
}

add_action('wp_enqueue_scripts', 'theme_scripts');
add_theme_support('post-thumbnails');

function load_exterrnal_jQuery(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js");
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_exterrnal_jQuery');



// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '/';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}



// CUSTOM POST
add_action( 'init', 'my_custom_init' );

function my_custom_init() {
	$labels = array(
	'name' => _x( 'Productos', 'post type general name' ),
        'singular_name' => _x( 'Producto', 'post type singular name' ),
        'add_new' => _x( 'Añadir nuevo', 'product' ),
        'add_new_item' => __( 'Añadir nuevo Producto' ),
        'edit_item' => __( 'Editar Producto' ),
        'new_item' => __( 'Nuevo Producto' ),
        'view_item' => __( 'Ver Producto' ),
        'search_items' => __( 'Buscar Productos' ),
        'not_found' =>  __( 'No se han encontrado Productos' ),
        'not_found_in_trash' => __( 'No se han encontrado Productos en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
 
    register_post_type( 'producto', $args ); /* Registramos y a funcionar */
}

// Lo enganchamos en la acción init y llamamos a la función create_product_taxonomies() cuando arranque
add_action( 'init', 'create_product_taxonomies', 0 );
 
// Creamos la taxonomía familia para el custom post type "producto"
function create_product_taxonomies() {
	// Añadimos nueva taxonomía y la hacemos jerárquica (como las categorías por defecto)
	$labels = array(
	'name' => _x( 'Familias', 'taxonomy general name' ),
	'singular_name' => _x( 'Familia', 'taxonomy singular name' ),
	'search_items' =>  __( 'Buscar por Familia' ),
	'all_items' => __( 'Todos las Familias' ),
	'parent_item' => __( 'Familia padre' ),
	'parent_item_colon' => __( 'Familia padre:' ),
	'edit_item' => __( 'Editar Familia' ),
	'update_item' => __( 'Actualizar Familia' ),
	'add_new_item' => __( 'Añadir nueva Familia' ),
	'new_item_name' => __( 'Nombre de la nueva Familia' ),
);
register_taxonomy( 'familia', array( 'producto' ), array(
	'hierarchical' => true,
	'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'familia' ),
));
} // Fin de la función create_product_taxonomies().



add_action( 'add_meta_boxes', 'dariobf_metabox' );
function dariobf_metabox()
{
	add_meta_box( 'my-meta-box-id', 'Datos adicionales del producto', 'dariobf_meta_box_cb', 'producto', 'normal', 'high' );
}

function dariobf_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'][0] ) : '';
	$input = isset( $values['my_meta_box_input'] ) ? esc_attr( $values['my_meta_box_input'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	$selected2 = isset( $values['my_meta_box_select2'] ) ? esc_attr( $values['my_meta_box_select2'][0] ) : '';
	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
	<p>
		<label for="my_meta_box_text">Código</label>
		<input type="text" name="my_meta_box_text" id="my_meta_box_text" value="<?php echo $text; ?>" />
    </p>
    <p>
		<label for="my_meta_box_select">Familia del producto</label>
		<select name="my_meta_box_select" id="my_meta_box_select">
			<option value="gourmet" <?php selected( $selected, 'gourmet' ); ?>>Gourmet</option>
			<option value="bolleria" <?php selected( $selected, 'bolleria' ); ?>>Bollería</option>
			<option value="panaderia" <?php selected( $selected, 'panaderia' ); ?>>Panadería</option>
			<option value="pasteleria" <?php selected( $selected, 'pasteleria' ); ?>>Pastelería</option>
		</select>
	</p>
	<p>
	    <label for="my_meta_box_input">Precio del producto</label>
	    <input name="my_meta_box_input" id="my_meta_box_input" type="number" min="0.00" max="10000.00" step="0.01" value="<?php echo $input; ?>" /> €
	</p>
	<p>
		<label for="my_meta_box_select2">Label especial del producto</label>
		<select name="my_meta_box_select2" id="my_meta_box_select2">
			<option value="ninguno" <?php selected( $selected2, 'ninguno' ); ?>>Ninguno</option>
			<option value="más vendido" <?php selected( $selected2, 'más vendido' ); ?>>Más Vendido</option>
			<option value="en oferta" <?php selected( $selected2, 'en oferta' ); ?>>En Oferta</option>
			<option value="sin stock" <?php selected( $selected2, 'sin stock' ); ?>>Sin Stock</option>
		</select>
	</p>
	<p>
		<input type="checkbox" id="my_meta_box_check" name="my_meta_box_check" <?php checked( $check, 'on'); ?> />
		<label for="my_meta_box_check">Producto disponible en Stock</label>
    </p>
    <?php
}


add_action( 'save_post', 'dariobf_meta_box_save' );
function dariobf_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
 
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
 
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;
 
    // now we can actually save the data  
    $allowed = array(
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )
    );
 
    // Make sure your data is set before trying to save it  
    if( isset( $_POST['my_meta_box_text'] ) )
        update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
 
    if( isset( $_POST['my_meta_box_select'] ) )
        update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );
    
    if( isset( $_POST['my_meta_box_input'] ) )
        update_post_meta( $post_id, 'my_meta_box_input', wp_kses( $_POST['my_meta_box_input'], $allowed ) );
        
    if( isset( $_POST['my_meta_box_select2'] ) )
        update_post_meta( $post_id, 'my_meta_box_select2', esc_attr( $_POST['my_meta_box_select2'] ) );
 
    // This is purely my personal preference for saving check-boxes  
    $check = isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_check'] ? 'on' : 'off';
    update_post_meta( $post_id, 'my_meta_box_check', $check );
    
}








//Personalizar titulo pagina


function my_title(){
    if (function_exists('is_tag') && is_tag()) {
        single_tag_title(' · Tag Archive for &quot;'); echo '&quot; · ';
        // A partir de aqui no pone exists porque son plantilla que tiene WP si o si.
    } elseif (is_archive()) {
        wp_title(''); echo ' · Archive · ';
    } elseif (is_search()) {
        echo ' · Search for &quot;'.wp_specialchars($s).'&quot; · ';
        //Wp no distingue entre post y Page
    } elseif (!(is_404()) && (is_single()) || (is_page())) {
             bloginfo('name'); wp_title();
    } elseif (is_404()) {
        echo ' · Not Found · ';
    }
    if (is_front_page()) {
        echo ' | Panadería';//bloginfo('name'); echo ' · '; bloginfo('description'); 
    } elseif (is_home()) {
       bloginfo('name'); wp_title();
    }
    if ($paged > 1) {
        echo ' · page '. $paged;
    }  
}




//Excerpt lenght (palabras)

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

//EXCERPT LIMITE CARACTERES

/*
function get_excerpt($count){  
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content(); 
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    //$excerpt = $excerpt.'... <a href="'.$permalink.'">leer mas</a>';
    return $excerpt;
}
<?php echo get_excerpt(75); ?>
*/

/**funciones para los comentarios **/

function my_comments_form($fields){
        $commenter=wp_get_current_commenter();
        $user=wp_get_current_user();
        $name=$user->Exists()?$user->display-name:'';
        $req=get_option('require_name_email');
        $fields['author']='<div class="col-md-5 input_author"><input type="text" class="" id="author" placeholder="Tu nombre"
        name="author" value="'.esc_attr($commenter['comment_author']).'" size="20" required/>';
        $fields['email']='<input type="email" class=" " id="email" placeholder="Tu correo"
        name="email" value="'.esc_attr($commenter['comment_author_email']).'" size="20" required/></div>';
        $fields['url']='';
        $fields['comment_field']='<div class="col-md-7">
        <textarea id="comment" name="comment" placeholder="Tu mensaje..." required></textarea></div>';
        return $fields;
    }
    
    add_filter('comment_form_default_fields','my_comments_form');
    
    function my_form_defaults($defaults){
        if(!is_user_logged_in()){
            if(isset($defaults['comment_field'])){
                $defaults['comment_field']="";
            }  
        }else{
            $defaults['comment_field']='<div class="col-md-12">
            <textarea id="comment" name="comment" placeholder="Tu mensaje..." required></textarea></div>';
        }
        return $defaults;
    }
    add_filter('comment_form_defaults','my_form_defaults');

    
    function custom_comments($comment,$arg,$depth){
        $GLOBAL['comment']=$comment;
        $id_comment=get_comment_ID();
        switch ($comment->comment-type) :
            case 'comment':
             ?>
             <div class="<?php
             /*if($depth>1){
                echo comment_secundario;
             }else{
                echo comment_principal;
             }*/
             ?> blog-post-comment onscroll-animate">
                <div class="blog-post-comment-avatar">
                    <?php echo get_avatar($comment,62,$default,'Commenter avatar');?>
                </div>
                <div class="blog-post-comment-content">
                    <h4 class="blog-post-comment-heading"><?php comment_author(); echo ' a ';?><?php comment_date(); echo ' a las '; comment_time();?>
                    
                    <?php
                        comment_reply_link(
                            array_merge(
                                $arg,array(
                                    'add_below'=>$add_below,
                                    'depth'=>$depth,
                                    'max_depth'=>$arg['max_depth'],
                                    'before'=>'<span class="delimiter-inline">|</span>',
                                    'after'=>'</a>',
                                )
                            )
                        );
                     ?>
                    </h4>
					<?php comment_text()?>

                <!--</div>-->
<?php   
        endswitch;
    }
    
    // END_CALLBACK
    
    function custom_comments_end($comment,$arg,$depth){
        $GLOBAL['comment']=$comment;
        $id_comment=get_comment_ID();
        $childcomments = get_comments(array(
            'status'    => 'approve',
            'parent'    => $id_comment,
            'count'     => true,
        ));
        
        if($childcomments==0){
            echo '</div></div>';
        } else {
            echo '</div>';
        }
             

    }
    
/**fin de las funciones para los comentarios**/



//MULTI POST THUMBNAIL

if (class_exists('MultiPostThumbnails')) {
 
new MultiPostThumbnails(array(
'label' => 'Secondary Image',
'id' => 'secondary-image',
'post_type' => 'producto'
 ) );
 
 new MultiPostThumbnails(array(
'label' => 'Secondary Image',
'id' => 'secondary-image',
'post_type' => 'post'
 ) );
 
 }
 
 /* Formulario Busqueda Custom */
 
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="form-search onscroll-animate fadeIn" action="' . home_url( '/' ) . '" >
    
    <input type="text" placeholder="Búsqueda" value="' . get_search_query() . '" name="s" id="s" />
    
    
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

// Modifica el excerpt_more para mostrar lo que queramos
function mi_excerpt_leermas() {
    global $post;
    return ' ...';
}

add_filter('excerpt_more', 'mi_excerpt_leermas');






//FUNCION PARA PAGINACION SI NO FUNCIONA LA OTRA

function get_paginate_page_links( $type = 'plain', $endsize = 1, $midsize = 1 ) {
    global $wp_query, $wp_rewrite;
    
    /* Obtenemos el número actual de página -> en una plantilla tipo index  
      OJO! si queremos obtener el número de página de una página estática -> tipo front page - 
      tenemos que cambiar 'paged' por 'page'.
    */
    $current = get_query_var( 'paged' ) > 1 ? get_query_var('paged') : 1;

    // Saneamos los valores de los argumentos de entrada
    if ( ! in_array( $type, array( 'plain', 'list', 'array' ) ) ) $type = 'plain';
    // absint es una función WP que convierte un número a su entero no negativo, hace lo mismo que abs(intval($num))
    $endsize = absint( $endsize );
    $midsize = absint( $midsize );

    // Establecemos los valores de los argumentos de la función paginate_links()
    $pagination = array(
        'base'      => @add_query_arg( 'paged', '%#%' ),
        'format'    => '',
        'total'     => $wp_query->max_num_pages,
        'current'   => $current,
        'show_all'  => false,
        'end_size'  => $endsize,
        'mid_size'  => $midsize,
        'type'      => $type,
        'prev_text' => '&lt;&lt; Previous',
        'next_text' => 'Next &gt;&gt;'
    );
    // El método using_permalinks() del objeto wp_rewrite de WP devuelve TRUE si nuestro sitio usa alguna clase de permalinks
    if ( $wp_rewrite->using_permalinks() ) {
        /* Si usamos permalinks hay que rehacer la URL donde pasaremos el número de página, quitando el argumento s de la url por defecto
         que puede estar a partir de la última barra de directorio en la propia url
         
        user_trailingslashit -> Si los permalinks están configuarados para acabar en /, le añade la barra a la url que genere para los page links
        si no está configurado para ello, se la quita en caso de que exista
        trailingslashit( '/home/julien/bin/dotfiles' );  ---> '/home/julien/bin/dotfiles/'
         
        */
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ).'page/%#%/', 'paged' );
    } 
        /* Si estamos en el template search o archive tenemos que tener en cuenta 
        la variable s que es la que tiene el valor de búsqueda */ 
    if ( ! empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    }
    return paginate_links( $pagination );
}





//* Display a custom Gravatar

add_filter( 'avatar_defaults', 'sp_gravatar' );
function sp_gravatar ($avatar) {
 $custom_avatar = get_stylesheet_directory_uri() . '/images/custom-gravatar.png';
 $avatar[$custom_avatar] = "Custom Gravatar";
 return $avatar;
}


// CUSTOM METABOX USER PROFILE

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="quote"><?php _e("Quote"); ?></label></th>
        <td>
            <input type="text" name="quote" id="quote" value="<?php echo esc_attr( get_the_author_meta( 'quote', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your quote."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="reposteria"><?php _e("Repostería"); ?></label></th>
        <td>
            <input type="text" name="reposteria" id="reposteria" value="<?php echo esc_attr( get_the_author_meta( 'reposteria', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Habilidad respostería(%)"); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="panaderia"><?php _e("Panadería"); ?></label></th>
        <td>
            <input type="text" name="panaderia" id="panaderia" value="<?php echo esc_attr( get_the_author_meta( 'panaderia', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Habilidad panadería(%)"); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="creatividad"><?php _e("Creatividad"); ?></label></th>
        <td>
            <input type="text" name="creatividad" id="creatividad" value="<?php echo esc_attr( get_the_author_meta( 'creatividad', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Habilidad creatividad(%)"); ?></span>
        </td>
    </tr>
    <tr>
            <th scope="row">Header Image</th>
            <td><input type="file" name="header_image" value="" />
            <?php
                $doc = get_user_meta( $user->ID, 'header_image', true );
                if (!isset($doc['error'])) {
                    $doc = $doc['url'];
                    echo '<br><img src="'.$doc.'" height="300" />';
                } else {
                    $doc = $doc['error'];
                    echo $doc;
                }
            ?>
            </td>
    </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'quote', $_POST['quote'] );
    update_user_meta( $user_id, 'reposteria', $_POST['reposteria'] );
    update_user_meta( $user_id, 'panaderia', $_POST['panaderia'] );
    update_user_meta( $user_id, 'creatividad', $_POST['creatividad'] );
    if( $_FILES['header_image']['error'] === UPLOAD_ERR_OK ) {
        $_POST['action'] = 'wp_handle_upload';
        $upload_overrides = array( 'test_form' => false );
        $upload = wp_handle_upload( $_FILES['header_image'], $upload_overrides );
        update_user_meta( $user_id, 'header_image', $upload );
    }
}


//Habilitar area de widget idiomas
    
function crea_area_widgets(){
    register_sidebar(array(
        'name' => 'Idioma Widget', //Nombre
        'id' => 'idioma', //Identificador
        'description' => 'Idioma widgets area', //Descripcion
        'before_widget' => '<div class="widget %2$s"', //Etiqueta hrml antes del widget. %2$s -> para obtener la clase que has creado
        'after_widget' => '</div>' //Etiqueta hrml despues del widget
        )
    );    
}

add_action('widgets_init', 'crea_area_widgets');