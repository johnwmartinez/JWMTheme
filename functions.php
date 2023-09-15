<?php
/**
 *  El functions de mi Theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage jwm 
 * @since 1.0.0
 * @version 1.0.0
 */


if (!function_exists('scripts_iniciales')) :
    function scripts_iniciales()
    {
        $version = '1.0.1';
        // Archivos y librerías JS
        wp_register_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js', '', $version, true);

        // Scripts de JWM
        wp_register_script('fslightbox', get_template_directory_uri() . '/assets/js/fslightbox.js', '', $version, true);
        wp_register_script('masonry-js', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', '', $version, true);

        wp_enqueue_script('splide');
        wp_enqueue_script('fslightbox');
        wp_enqueue_script('masonry-js');

        wp_enqueue_script( 'jwm', get_theme_file_uri( 'assets/js/scripts.min.js'), array('jquery') );
        wp_localize_script( 'jwm', 'ajax_var', array(
            'url'    => admin_url( 'admin-ajax.php' ),
            'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
            'action' => 'acciones-ajax',
        ) );

        // Creamos los estilos y los insertamos al documento
        wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', '', $version );
        wp_register_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', '', $version );
        wp_register_style( 'style-min', get_template_directory_uri() . '/assets/css/style.min.css', '', $version );
        wp_register_style( 'customizacion', get_template_directory_uri() . '/assets/css/customizacion.css', '', $version);
        	
        wp_enqueue_style( 'slick' );
        wp_enqueue_style( 'slick-theme' );
        wp_enqueue_style( 'style-min' );
        wp_enqueue_style( 'customizacion' );

    }
endif;
add_action('wp_enqueue_scripts', 'scripts_iniciales');

function defer_parsing_of_js($url)
{
    if (strpos($url, 'jquery.js')) return $url;
    if (strpos($url, 'jquery.min.js')) return $url;
    return $url;
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);

function dequeue_gutenberg_theme_css() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_gutenberg_theme_css', 100 );

function poner_am_pm_conpuntos($x){
    $x = str_replace("am", "a.m.", $x);
    $x = str_replace("pm", "p.m.", $x);
    return $x;
}

function jwm_setup()
{
    load_theme_textdomain('jwm', get_template_directory() . '/languages');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
    ));

    //https://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats',  array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
    ));

    //Permite que los themes y plugins administren el título, si se activa, no debe usarse wp_title()
    add_theme_support('title-tag');
    //Activar Feeds RSS
    add_theme_support('automatic-feed-links');
    //Ocultar Tags innecesarios del head
    //Versión de WordPress
    remove_action('wp_head', 'wp_generator');
    //Imprime sugerencias de recursos para los navegadores para precargar, pre-renderizar y pre-conectarse a sitios web
    remove_action('wp_head', 'wp_resource_hints', 2);
    //Muestre el enlace al punto final del servicio Really Simple Discovery
    remove_action('wp_head', 'rsd_link');
    //Muestre el enlace al archivo de manifiesto de Windows Live Writer
    remove_action('wp_head', 'wlwmanifest_link');
    //Inyecta rel = shortlink en el encabezado si se define un shortlink para la página actual.
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('after_setup_theme', 'jwm_setup');

// Agregar opciones de menu
function jwm_menus()
{   
    register_nav_menus(array(
        'main_menu' => __('Menú Principal', 'jwm'),
        'menu_footer1' => __('Menú del footer 1', 'jwm'),
        'menu_footer2' => __('Menú del footer 2', 'jwm'),
        'top_menu' => __('Top Menú', 'jwm')
    ));

}
add_action('init', 'jwm_menus');

function redesSocialesDisponibles($funcion = 1)
{
    if($funcion == 1)
    {
        $redes_socials = array(
            'my_facebook_url' => 'Facebook URL',
            'my_twitter_url' => 'Twitter URL',
            'my_instagram' => 'Instagram URL',
            'my_youtube' => 'Youtube URL',
            'my_linkedin' => 'Linkedin URL',
            'my_tripadvisor' => 'Tripadvisor URL',
            'my_google_business' => 'Google Business URL',
            'my_pinterest' => 'Pinterest URL',
            'my_yelp' => 'Yelp URL',
            'my_whatsapp' => 'Whatsapp URL',
        );
    }

    if($funcion == 2)
    {
        $redes_socials = array(
            'my_facebook_url' => 'fab fa-facebook-f',
            'my_twitter_url' => 'fab fa-twitter',
            'my_instagram' => 'fab fa-instagram',
            'my_youtube' => 'fab fa-youtube',
            'my_linkedin' => 'fab fa-linkedin',
            'my_tripadvisor' => 'fab fa-tripadvisor',
            'my_google_business' => 'fab fa-google',
            'my_pinterest' => 'fab fa-pinterest',
            'my_yelp' => 'fab fa-yelp',
            'my_whatsapp' => 'fab fa-whatsapp',
        );
    }

    return $redes_socials;
}

/* Customización del template */
function jw_customizar_template($wp_customize)
{
    $wp_customize->add_panel('jw_opciones_custom', array(
        'title' => __('JWM Theme', 'textdomain'),
        'priority' => 160,
        'capability' => 'edit_theme_options',
    ));

    // 1. 
    // Campos de la cabezera (dirección, teléfono, etc)
    $wp_customize->add_section('jw_subheader_section', array(
        'title' => __('Opciones de cabecera', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 10,
        'capability' => 'edit_theme_options',
    ));

    // 2.
    // Section para Google Analytics
    $wp_customize->add_section('google_analytics_section', array(
        'title' => __('Google Analytics', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 30,
        'capability' => 'edit_theme_options',
    ));

    // 3. 
    // Section para Redes Sociales
    $wp_customize->add_section('social_section', array(
        'title' => __('Redes Sociales', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 100,
        'capability' => 'edit_theme_options',
    ));

    // 4. 
    // Section estilos en general
    $wp_customize->add_section('estilos_seccion', array(
        'title' => __('Estilos', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 200,
        'capability' => 'edit_theme_options',
    ));

    // 5. 
    // Section Contenidos del home central
    $wp_customize->add_section('contenidos_body_central', array(
        'title' => __('Contenidos del body central', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 300,
        'capability' => 'edit_theme_options',
    ));

    // 6. 
    // Section Contenidos del home central
    $wp_customize->add_section('contenidos_google_maps', array(
        'title' => __('Google Maps Config', 'textdomain'),
        'panel' => 'jw_opciones_custom',
        'priority' => 1000,
        'capability' => 'edit_theme_options',
    ));

    // Número de whatsapp
    $wp_customize->add_setting('jw_whatsapp_numero', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control('jw_whatsapp_numero', array(
        'label' => __('Número de Whatsapp', 'textdomain'),
        'section' => 'jw_subheader_section',
        'priority' => 10,
        'type' => 'text',
    ));
    // Dirección
    $wp_customize->add_setting('jw_direccion_subheader', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control('jw_direccion_subheader', array(
        'label' => __('Dirección', 'textdomain'),
        'section' => 'jw_subheader_section',
        'priority' => 10,
        'type' => 'text',
    ));

    // Correo electrónico
    $wp_customize->add_setting('jw_correoe_subheader', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control('jw_correoe_subheader', array(
        'label' => __('Correo electrónico', 'textdomain'),
        'section' => 'jw_subheader_section',
        'priority' => 10,
        'type' => 'text',
    ));

    /* GOOGLE ANALYTICS */
    //Google Analytics
    $wp_customize->add_setting('my_google_analytics', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('my_google_analytics', array(
        'label' => __('Código de Google Analytics', 'textdomain'),
        'section' => 'google_analytics_section',
        'priority' => 30,
        'type' => 'textarea',
    ));
    $redes_socials = redesSocialesDisponibles(1);
    $prioridad = 10;

    foreach($redes_socials as $llave => $cadaRed)
    {

        //Redes Sociales: Facebook
        $wp_customize->add_setting($llave, array(
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
    
        $wp_customize->add_control($llave, array(
            'label' => __($cadaRed, 'textdomain'),
            'section' => 'social_section',
            'priority' => $prioridad,
            'type' => 'text',
        ));

        $prioridad++;

    }

    // 4. - Estilos
    // 4.1. Color central - 
    $wp_customize->add_setting('estilos_seccion_colorcentral1', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'estilos_seccion_colorcentral1',
        array(
            'label' => 'Color central Body',
            'section' => 'estilos_seccion',
            'priority' => 50,
            // 'settings' => $color['slug']
        )
    ));
    // 4.2. Color fondo del formulario
    $wp_customize->add_setting('estilos_seccion_form_central', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'estilos_seccion_form_central',
        array(
            'label' => 'Color fondo formulario',
            'section' => 'estilos_seccion',
            'priority' => 70,
            // 'settings' => $color['slug']
        )
    ));

    // 5. - Contenidos body central
    // 5.1. - Formulario
    $wp_customize->add_setting('body_central_form_code', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('body_central_form_code', array(
        'label' => __('Código del formulario', 'textdomain'),
        'section' => 'contenidos_body_central',
        'priority' => 90,
        'type' => 'textarea',
    ));
    // 5.2. - Título del formulario
    $wp_customize->add_setting('body_central_form_titulo', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('body_central_form_titulo', array(
        'label' => __('Título del formulario', 'textdomain'),
        'section' => 'contenidos_body_central',
        'priority' => 10,
        'type' => 'text',
    ));
    // 5.3. - Descripción del formulario
    $wp_customize->add_setting('body_central_form_descripcion', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('body_central_form_descripcion', array(
        'label' => __('Título del formulario', 'textdomain'),
        'section' => 'contenidos_body_central',
        'priority' => 20,
        'type' => 'textarea',
    ));
    // 6.1. - Código de Google API
    $wp_customize->add_setting('contenidos_google_maps_apimaps', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_apimaps', array(
        'label' => __('Código Google API', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 20,
        'type' => 'text',
    ));
    // 6.2. - Longitud
    $wp_customize->add_setting('contenidos_google_maps_longitud', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_longitud', array(
        'label' => __('Longitud', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 30,
        'type' => 'text',
    ));
    // 6.3. - Latitud
    $wp_customize->add_setting('contenidos_google_maps_latitud', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_latitud', array(
        'label' => __('Latitud', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 40,
        'type' => 'text',
    ));
    // 6.4. - Zoom
    $wp_customize->add_setting('contenidos_google_maps_zoom', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_zoom', array(
        'label' => __('Zoom', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 50,
        'type' => 'text',
    ));
    // 6.5. - Ubicación en mapa Google
    $wp_customize->add_setting('contenidos_google_maps_ubicacion', array(
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('contenidos_google_maps_ubicacion', array(
        'label' => __('Ubicación en Google Maps', 'textdomain'),
        'section' => 'contenidos_google_maps',
        'priority' => 60,
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'jw_customizar_template');



/* Consultas a la base de datos */


/* Funcionales */
function get_the_user_ip() {
    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return apply_filters( 'wpb_get_ip', $ip );
}

/* Funciones de la plantilla */
add_theme_support('custom-logo');

function jwmtheme_custom_logo_setup()
{
    $defaults = array(
        'height'               => 'auto',
        'width'                => 760,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'jwmtheme_custom_logo_setup');

function remove_utf8_bom($text){ /* Quita el UTF-8 BOM de la cadena JSON */
    $bom = pack('H*','EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
}

/* Organizar TERMS (categorías, tags, taxonomias, etc) en formato lectura */
function get_terms_formateadas($terms){
    $cargosprnt = '';
    if(is_array($terms)){
        foreach($terms as $cadaCargo){
            if($cargosprnt == ''){
                $cargosprnt = $cadaCargo->name;
            }else{
                $cargosprnt .= ', ' . $cadaCargo->name;
            }
        }
    }
    return $cargosprnt;
}

/* Remove the link in author name on comments */
function remove_website_field($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_website_field');
function kinsta_remove_comment_author_link( $return, $author, $comment_ID ) {
    return $author;
}
add_filter( 'get_comment_author_link', 'kinsta_remove_comment_author_link', 10, 3 );
function kinsta_remove_comment_author_url() {
    return false;
}
add_filter( 'get_comment_author_url', 'kinsta_remove_comment_author_url');

/* add excerpt fields to the page type  */	
add_post_type_support( 'page', 'excerpt' );

/* this solve a problem with pagination in events page */
function my_pagination_rewrite() {
    add_rewrite_rule('eventos/page/?([0-9]{1,})/?$', 'index.php?category_name=eventos&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');


// Función para devolver fecha con formato "Hace _ días"
function tiempoTranscurrido($fecha) {
    // Obtiene el tiempo transcurrido en segundos
    $tiempoTranscurrido = time() - strtotime($fecha);
    // Calcula la cantidad de días, semanas, meses y años
    $dias = floor($tiempoTranscurrido / 86400);
    $semanas = floor($tiempoTranscurrido / 604800);
    $meses = floor($tiempoTranscurrido / 2600640);
    $anos = floor($tiempoTranscurrido / 31207680);
  
    // Devuelve la frase adecuada
    if($dias == 0){
        return "Publicado hoy";
    } elseif ($dias <= 1) {
      return "Publicado hace ".$dias." día";
    } elseif ($dias <= 6) {
        return "Publicado hace ".$dias." días";
      }else if ($semanas <= 3) {
      return "Publicado hace ".$semanas." semana";
    } else if ($meses <= 11) {
      return "Publicado hace ".$meses." mes";
    } else if ($anos <= 1) {
      return "Publicado hace 1 año";
    } else {
      // Devuelve la fecha completa si ha pasado más de un año
      return "Publicado el " . date("d/m/Y", strtotime($fecha));
    }
  }


/* Empiezan los procesos que vienen desde AJAX */
function procesos_ajax_internos() {
    /*
        In this part, I built a block of code that is responsible for receiving parameters from a form on the page via AJAX and return strings in JSON. Obviously we do it with the security of the case (as it is using the nonce variable and we do not expose sensitive data).
    */
    global $wpdb;

    // First of all, I verify that I am receiving information by POST.
    if(!isset($_POST["accion"])){
        return;
    }

    // I verify that the nonce variable matches what the user has previously loaded in his session.
    $id_usuario = get_current_user_id();
    $nonce = sanitize_text_field( $_POST['nonce'] );
    if ( ! wp_verify_nonce( $nonce, 'my-ajax-nonce' ) ) {
        die ( 'Solicitud de acceso denegada. La solicitud POST que usted está haciendo es insegura.');
    }

    // Verificación correcta. Continuamos con el proceso AJAX.
    // I sectioned this code block for several use cases. For example, for the filter of a directory, the filter of the job offers section, or, failing that, for the natural language search engine that these blocks have.

    $filtros = array();
    $filtro_valores = (isset($_POST["filtro_valores"])) ? $_POST["filtro_valores"] : '';
    $filtro_tipo = (isset($_POST["filtro_tipo"])) ? $_POST["filtro_tipo"] : '';
    $filtro_accion = (isset($_POST["accion"])) ? $_POST["accion"] : '';
    $filtro_buscar = (isset($_POST["buscar"])) ? $_POST["buscar"] : '';

    // Armamos los filtros para buscar por taxonomias
    foreach($filtro_valores as $llave => $cValor){
        $filtros[] = array(
            'taxonomy' => $llave,
            'field'    => 'term_id',
            'terms'    => $cValor,
        );
    }

    // Verificamos qué es lo que vamos a buscar - directorio, ofertas, empleos, etc
    if($filtro_tipo == 'directorio'){
        $post_type = 'lideres';
    }
    if($filtro_tipo == 'empleo'){
        $post_type = 'bolsa_de_empleo';
    }
    if($filtro_tipo == 'ofertas'){
        $post_type = 'ofertas';
    }

    // Verificamos si es una búsqueda o si es un filtro de variables:
    if($filtro_accion == 'buscador'){
        $argumentos = array(  
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'order' => 'ASC',
            'orderby' => 'title',
            // 's' => $filtro_buscar,
        );
    }
    if($filtro_accion == 'filtro'){
        $argumentos = array(  
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'order' => 'ASC',
            'orderby' => 'title',
            'tax_query' => $filtros,
        );
        
    }

    $datos = array();
    $query = new WP_Query($argumentos);
    $entrada_index = 0;
    if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post();
        if($filtro_tipo == 'directorio'){ /* Datos si es directorio */
            $id = get_the_ID();
            $imagen = get_the_post_thumbnail($id, 'full');
            $cargosprnt = get_terms_formateadas(get_the_terms($id, 'cargo'));

            $cargos = get_terms_formateadas(get_the_terms($id, 'cargo'));
            $sectores = get_terms_formateadas(get_the_terms($id, 'sectores'));
            $empresas = get_terms_formateadas(get_the_terms($id, 'empresa'));
            $paises = get_terms_formateadas(get_the_terms($id, 'pais'));
            $departamentos = get_terms_formateadas(get_the_terms($id, 'departamentos'));
            $intereses = get_terms_formateadas(get_the_terms($id, 'intereses'));
            $profesion = get_terms_formateadas(get_the_terms($id, 'profesion'));
            $perfiles = get_terms_formateadas(get_terms( 'perfil', array( 'parent' => 0 ) ));

            $card_perfil = get_field('card_perfil', $id);
            $card_cargo = get_field('card_cargo', $id);
            $card_sector = get_field('card_sector', $id);
            $card_intereses = get_field('card_intereses', $id);
            $correo = get_field('correo');
            $linkedin = get_field('linkedin');

            if(!(is_user_logged_in())){
                $linkedin = '';
                $correo = '';
            }

            $all = $cargos . $sectores . $empresas . $paises . $departamentos . $intereses . $profesion . $perfiles;
            $all .= get_the_title() . " " . get_the_permalink() . " " . get_field('apellido') . " ";
            $all .= get_field('nombre') . $correo . $linkedin . $cargosprnt;
            $all .= $card_perfil . $card_cargo . $card_sector . $card_intereses;

            $datos[$id]["all"] = $all;
            $datos[$id]["nombre"] = get_the_title();
            $datos[$id]["indice"] = $entrada_index;
            $datos[$id]["post_id"] = $id;
            $datos[$id]["titulo"] = get_the_title();
            $datos[$id]["fecha"] = get_the_date();
            $datos[$id]["enlace"] = get_the_permalink();
            $datos[$id]["imagen"] = ($imagen == '') ? '<span></span>' : $imagen;
            $datos[$id]["nombre"] = get_field('nombre');
            $datos[$id]["apellido"] = get_field('apellido');
            $datos[$id]["correo"] = get_field('correo');
            $datos[$id]["linkedin"] = get_field('linkedin');
            $datos[$id]["cargo"] = $cargosprnt;
            $datos[$id]["clase"] = ($imagen == '') ? 'sin-imagen' : '';
            $entrada_index++;
        }/* directorio */
        if($filtro_tipo == 'empleo'){ /* Datos si es empleo */
            $id = get_the_ID();
            $imagen = get_the_post_thumbnail($id, 'full');
            $cargosprnt = get_terms_formateadas(get_the_terms($id, 'cargo'));
            $areas = get_terms_formateadas(get_the_terms($id, 'areas'));

            $rango_de_salario = get_terms_formateadas(get_the_terms($id, 'rango_de_salario'));

            $all = $rango_de_salario . $areas . $cargosprnt;
            $all .= get_the_title() . " " . get_the_permalink() . " " . get_field('descripcion') . " ";
            $all .= get_field('salario') . get_field('mas_detalles') . get_field('contacto');

            $datos[$id]["all"] = $all;
            $datos[$id]["indice"] = $entrada_index;
            $datos[$id]["post_id"] = $id;
            $datos[$id]["titulo"] = get_the_title();
            $datos[$id]["fecha"] = get_the_date();
            $datos[$id]["hace"] = tiempoTranscurrido(get_the_date("Y-m-d"));
            $datos[$id]["descripcion"] = get_field('descripcion');
            $datos[$id]["salario"] = (get_field('salario') == "") ? '' : formato_moneda(get_field('salario'));
            $datos[$id]["mas_detalles"] = get_field('mas_detalles');
            $datos[$id]["contacto"] = get_field('contacto');
            $datos[$id]["fecha_finalizacion"] = get_field('fecha_finalizacion');
            $datos[$id]["autor"] = get_the_author();
            $datos[$id]["areas"] = $areas;
            $entrada_index++;
        }/* empleo */
        if($filtro_tipo == 'ofertas'){
            $id = get_the_ID();
            $imagen = get_the_post_thumbnail($id, 'full');
            $tipos_de_anuncio = get_terms_formateadas(get_the_terms($id, 'tipos_de_anuncio'));
            $tipos_de_anuncio = ($tipos_de_anuncio == '') ? 'Oferta' : $tipos_de_anuncio;

            $all = $tipos_de_anuncio;
            $all .= get_the_title() . get_field('descripcion') . get_field('contacto') . get_field('anunciante') . $tipos_de_anuncio . get_the_author();

            $datos[$id]["all"] = $all;
            $datos[$id]["indice"] = $entrada_index;
            $datos[$id]["post_id"] = $id;
            $datos[$id]["titulo"] = get_the_title();
            $datos[$id]["fecha"] = get_the_date();
            $datos[$id]["hace"] = tiempoTranscurrido(get_the_date('Y-m-d H:i:s'));
            $datos[$id]["tipo"] = $tipos_de_anuncio;
            $datos[$id]["autor"] = get_the_author();
            $datos[$id]["descripcion"] = get_field('descripcion', $id);
            $datos[$id]["anunciante"] = get_field("anunciante", $id);


        }

        }/*while*/
        wp_reset_postdata();
    }/*if*/


        // si es buscador, vamos a peluquear la búsqueda
        
        if($filtro_accion == 'buscador'){
            foreach($datos as $idcadaP => $cadaP){
                if (!(strpos(strtoupper($cadaP["all"]), strtoupper($filtro_buscar)) !== false)){
                    unset($datos[$idcadaP]);
                }
            }
        }
        
    
    ob_start();
    foreach($datos as $cadaP){
        if($filtro_tipo == 'directorio'){
        ?>
            <a href="<?= $cadaP["enlace"] ?>" class="directoriolist__card">
                <div class="directoriolist__card__int <?= $cadaP["clase"] ?>">
                    <div class="directoriolist__card--foto">
                        <?= $cadaP["imagen"] ?>
                    </div>
                    <div class="directoriolist__card--content">
                        <div class="directoriolist__card--content__cont">
                            <h2><?= $cadaP["nombre"] ?> <?= $cadaP["apellido"] ?></h2>
                            <h3><?= $cadaP["cargo"]; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        } // Termina el directorio
        if($filtro_tipo == 'empleo'){
            ?>
            <div class="ofertalist__card">
                <div class="ofertalist__card__int">
                    <div class="ofertalist__card__int--fecha">
                        <p><?= $cadaP["hace"]; ?></p>
                    </div>
                    <div class="ofertalist__card__int--titulo">
                        <h3 class="titulo"><?= $cadaP["titulo"]; ?></h3>
                    </div>
                    <div class="ofertalist__card__int--descripcion">
                        <p class="descripcion"><?= $cadaP["descripcion"]; ?> </p>
                    </div>
                    <div class="ofertalist__card__int--botones">
                        <div>
                            
                            <a href="#" class="ver_mas modalOfertaAct" data-salario="<?= $cadaP["salario"]; ?>" data-detalles="<?= $cadaP["mas_detalles"]; ?>" data-autor="<?= $cadaP["autor"]; ?>" data-finalizacion="<?= $cadaP["fecha_finalizacion"]; ?>" data-areas="<?= $cadaP["areas"]; ?>" data-contacto="<?= $cadaP["contacto"]; ?>" data-bs-toggle="modal" data-bs-target="#ofertaModal">Ver más <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div>
                            <a href="#" class="aplicar">Quiero aplicar <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        }
        if($filtro_tipo == 'ofertas'){
            ?>
            <div class="ofertalist__card <?= $cadaP["tipo"] ?>">
                <div class="ofertalist__card__int">
                    <div class="oferta__tipo">
                        <p><?= $cadaP["tipo"] ?></p>
                    </div>
                    <div class="ofertalist__card__int--fecha">
                        <p><?= (isset($cadaP["hace"])) ? $cadaP["hace"] : ''; ?></p>
                    </div>
                    <div class="ofertalist__card__int--titulo">
                        <h3 class="titulo"><?= $cadaP["titulo"]; ?></h3>
                    </div>
                    <div class="ofertalist__card__int--descripcion">
                        <p class="descripcion"><?= $cadaP["descripcion"]; ?> </p>
                    </div>
                    <div class="ofertalist__card__int--botones">
                        <div>
                            <a href="#" class="ver_mas modalOfertaAct" data-autor="<?= $cadaP["autor"] ?>" data-detalles="" data-finalizacion="<?= $cadaP["fecha_finalizacion"] ?>" data-contacto="<?= $cadaP["contacto"]; ?>" data-bs-toggle="modal" data-bs-target="#ofertaModal">Me interesa <i class="fas fa-arrow-right"></i></a>
                        </div>

                    </div>

                </div>
            </div>
            <?php
        }
    }
    $html = ob_get_contents(); 
    ob_end_clean();

    if(count($datos) == 0){
        $html = '
        <div class="sinresultados">
            <p>No se encontraron resultados con los filtros aplicados.</p>
        </div>
        ';
    }


    $salida = array(
        'html' => $html,
    );
    echo json_encode($salida);
        
    // Termina proceso AJAX. Damos wp_die para que no cargue la página completa
    wp_die();
}
add_action( 'wp_ajax_nopriv_acciones-ajax', 'procesos_ajax_internos' );
add_action( 'wp_ajax_acciones-ajax', 'procesos_ajax_internos' );

/* The Contact Form 7 plugin has a drawback in the select fields and is that the first field is a few lines, it does not allow custom text. That's why I wrote this code, so that instead of putting those lines, I could put a message like "Select an option".  */
function ajustes_form_campos_postulacion($scanned_tag, $replace)
{
    global $post;

    if ($scanned_tag['name'] != 'areas') { /* Solamente analizamos las "áreas" */
        return $scanned_tag;
    }

    $areas = get_terms( 
        array(
            'taxonomy' => 'areas',
            'hide_empty' => false,
        ) 
    ); /* Buscar las áreas dentro de la taxonomía */

    $areas_salida = array();
    $areas_salida["areas"][] = array(
        "id" => "",
        "name" => "Selecciona una opción",
    ); /* Empezamos a armar la salida */

    foreach($areas as $area){
        $areas_salida["areas"][] = array(
            "id" => $area->slug,
            "name" => $area->name,
        );
    } /* Armamos cada una de las taxonomías de la DB */

    if (!$areas_salida) { /* Si no hay áreas en la DB */
        return $scanned_tag;
    }

    foreach ($areas_salida["areas"] as $cadaPais) {
        $scanned_tag['raw_values'][] = $cadaPais["name"] . '|' . $cadaPais["id"];
    } /* Armamos las áreas dentro del formulario */

    $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
    $scanned_tag['labels'] = $pipes->collect_befores(); // Esta es la parte visual del select
    $scanned_tag['pipes'] = $pipes; // Separador
    $scanned_tag['values'] = $pipes->collect_afters(); // Este es el valor del select

    return $scanned_tag;
}

add_filter('wpcf7_form_tag', 'ajustes_form_campos_postulacion', 10, 2);


/* This function was created for one purpose: to take the form filled out by the user and create a publication in a custom post type called "offers". Obviously, these offers could not appear automatically, but had to be reviewed by a webmaster to certify that the information met the acceptance criteria for subsequent publication, which is why they were saved as "pending". */

function guardar_form_anuncios( $wpcf7 ) {

    global $id_formulario_ofertas; 

	$submission = WPCF7_Submission::get_instance();

	// En caso de que no haya valores salgo de la función
	if( empty( $submission ) ) return;

    if($wpcf7->id != $id_formulario_ofertas) return; /* Solo el formulario de postular */

	$form = $submission->get_posted_data();
    // $uploaded_files = $submission->uploaded_files();

	$record_id = wp_insert_post( array(
		'post_title'    => $form['titulo'],
		'post_status'   => 'pending',
		'post_type'     => 'ofertas'
	) );

    $user_ip = get_the_user_ip();

	if( ! is_wp_error( $record_id ) ) {

        // $recibir_paquete = (strlen($form["recibir_paquete_datos"][0]) > 0) ? 'Si' : 'No';
		
        add_post_meta( $record_id, 'descripcion', $form['descripcion'] );
        add_post_meta( $record_id, 'fecha_finalizacion', $form['fecha_finalizacion'] );
        add_post_meta( $record_id, 'contacto', $form['contacto'] );
        add_post_meta( $record_id, 'anunciante', $form['anunciante'] );

        // add_post_meta( $record_id, 'areas', $form['areas'][0] );
        foreach($form['tipo_anuncio'] as $cadaTerm){
            $taxonomia = 'tipos_de_anuncio';
            $termino = get_term_by('slug', $cadaTerm, $taxonomia); 
            wp_set_object_terms($record_id, $termino->term_id, $taxonomia);
        }
        // taxonomias de anuncios
        foreach($form['categoria'] as $cadaTerm){
            $taxonomia = 'categoria_de_anuncio';
            $termino = get_term_by('slug', $cadaTerm, $taxonomia); 
            wp_set_object_terms($record_id, $termino->term_id, $taxonomia);
        }
               
	}

}
add_action('wpcf7_before_send_mail', 'guardar_form_anuncios' ,1);


/* Variables for apply format to some custom fields saved in custom post types */
function formato_numero($x){
	return number_format($x, 0, '.', ',');
}
function formato_moneda($x){
	return '$' . formato_numero($x);
}

function function_color_verde($atts, $content = null) {
    return '<span class="color-verde">' . $content . '</span>';
}
add_shortcode('color-verde', 'function_color_verde');
function function_color_rojo($atts, $content = null) {
    return '<span class="color-rojo">' . $content . '</span>';
}
add_shortcode('color-rojo', 'function_color_rojo');


/* I made this code to create custom timelines using a custom post type called timelines, and that in turn these could enter into the content of a site as a shortcode (that way I could use it both in the Gutenberg editor, and directly from the PHP code of a template). */
function shortcode_jwm_timeline($atts) {

    $p = shortcode_atts( array (
          'id' => '0'
    ), $atts );
    $id_timeline = $p['id'];

    $args = array(
        'post_type' => 'lineas_de_tiempo',
        'p'         => $id_timeline,
    );

    $lineas = array();
    
    $query = new WP_Query($args);
    if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post();
            $id_linea = get_the_ID();
            $timeline = get_field('linea_de_tiempo');

            $entrada_index = 0;
            foreach($timeline as $cLinea){
                $lineas[$entrada_index]["ano"] = $cLinea["ano"];
                $lineas[$entrada_index]["imagen"] = $cLinea["imagen"];
                $lineas[$entrada_index]["titulo"] = $cLinea["titulo"];
                $lineas[$entrada_index]["descripcion"] = $cLinea["descripcion"];
                $entrada_index++;
            }

        }/*while*/
        wp_reset_postdata();
    }/*if*/

    if(count($lineas) == 0){
        return;
    }
    
    $html = '
    <div class="jwm_timeline">
        <div class="jwm_timeline__cont">
    ';
    foreach($lineas as $indice => $linea){
        $clase = ($indice == 0) ? ' activo' : '';
        $imagen = '<div class="imagenvacia"></div>';
        if(is_array($linea["imagen"])){
            $imagen = '<img src="'.$linea["imagen"]["url"].'" alt="'.$linea["imagen"]["alt"].'" />';
        }
        $html .= '
            <div class="jwm_timeline__indv'.$clase.'">
                <div class="jwm_timeline__indv--cont">
                    <div class="jwm_timeline__indv--img">
                        '.$imagen.'
                    </div>
                    <div class="jwm_timeline__indv--content">
                        <div class="jwm_timeline__indv--content__cont">
                            <h3>'.$linea["titulo"].'</h3>
                            <p>'.$linea["descripcion"].'</p>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
    $html .= '
        </div>
            <div class="jwm_timeline__nav">
                <div class="jwm_timeline__nav--btn">
                    <a href="#" class="prev inactivo"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="jwm_timeline__nav--anios">
                    <ul>
    ';
    foreach($lineas as $indice => $linea){
        $clase = ($indice == 0) ? 'seleccionado' : '';
        $html .= '
        <li class="'.$clase.'">
            <a href="#">
                <span class="circulo"></span>
                <span class="anio">'.$linea["ano"].'</span>
            </a>
        </li>
        ';
    }

    $html .= '
                </ul>
                </div>
                <div class="jwm_timeline__nav--btn">
                    <a href="#" class="next"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    ';
    
    return $html;
}
add_shortcode('jwm_timeline', 'shortcode_jwm_timeline');

function get_filtro_lista_terms($taxonomia = NULL, $tipo = 1){
    /*
    $tipo = 1 -> Filtro tipo buscador
    $tipo = 2 -> Filtro tipo cascada
    */
    $salida = array();
    $terms = get_terms( array(
        'taxonomy'      => $taxonomia,
        'hide_empty'    => false,
        'orderby'       => 'name', 
        'order'         => 'ASC',
    ) );
    if($tipo == 2){
        if(!(isset($terms->errors["invalid_taxonomy"]))){
            foreach($terms as $cTerm){
                if($cTerm->parent == 0){
                    $salida[$cTerm->term_id] = array(
                        "id" => $cTerm->term_id,
                        "name" => $cTerm->name,
                        "count" => $cTerm->count,
                        "hijos" => array(),
                    );
                }
            }
            foreach($terms as $cTerm){
                if($cTerm->parent != 0){
                    $salida[$cTerm->parent]["hijos"][] = array(
                        "id" => $cTerm->term_id,
                        "name" => $cTerm->name,
                        "count" => $cTerm->count,
                    );
                }
            }
        }
    }else{
        foreach($terms as $cTerm){
            $salida[$cTerm->term_id] = array(
                "id" => $cTerm->term_id,
                "name" => $cTerm->name,
                "count" => $cTerm->count,
            );
        }
    }

    return $salida;
}

require_once "demo.php";