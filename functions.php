<?php
/*------------------------------------*\
    $DEFINE
\*------------------------------------*/
define( 'BLOG_NAME', get_bloginfo('name') );
define( 'BASE_URL', home_url() );
define( 'THEME_URL', get_bloginfo('template_url') );
define( 'THEME_PATH', get_template_directory() );
/*------------------------------------*\
    $TIDYUP
\*------------------------------------*/

function disable_embeds_init() {
	global $wpseo_og, $wpseo_twitter;
	remove_action( 'wpseo_head', array( $wpseo_og, 'opengraph' ), 30 );
	remove_action( 'wpseo_head', array( $wpseo_twitter, 'twitter' ), 40 );
	remove_action( 'wp_head', 'wp_generator');
	remove_action( 'wp_head', 'rsd_link');
	remove_action( 'wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'wp_resource_hints', 2 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
    remove_action( 'wp_head', 'wp_oembed_add_host_js');
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'rest_api_init', 'wp_oembed_register_route');
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10);
}
add_action('init', 'disable_embeds_init', 9999);
function genesis() {}
/*------------------------------------*\
    $SETUP
\*------------------------------------*/
function lcd_theme_setup() {
	//require( get_template_directory() . '/inc/post_types.php' );
	//require( get_template_directory() . '/inc/blocks.php' );
	require( get_template_directory() . '/inc/widgets.php' );
	//require( get_template_directory() . '/inc/extra_fields.php' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'slider', 1290, 540, true );
	add_image_size( 'second', 530, 450, true );
	add_image_size( 'experiencia', 900, 430, true );
	add_image_size( 'top_uno', 400, 195, true );
	add_image_size( 'editor_uno', 320, 280, true );
	add_image_size( 'editor_dos', 450, 280, true );
	add_image_size( 'trends', 305, 320, true );
	add_image_size( 'video', 420, 300, true );
	add_image_size( 'foto_uno', 320, 220, true );
	add_image_size( 'foto_dos', 520, 220, true );
	add_image_size( 'atel_uno', 450, 560, true );
	add_image_size( 'atel_dos', 300, 150, true );
	add_image_size( 'galleria', 670, 400, true );
	add_image_size( 'cat_uno', 755, 400, true );
	add_image_size( 'cat_dos', 300, 400, true );
	add_image_size( 'cat_intro_uno', 430, 300, true );
	add_image_size( 'foto_tres', 320, 400, true );
	add_image_size( 'foto_cuatro', 450, 400, true );
	/*Mobile*/
	add_image_size( 'mobile_grl', 750, 300, true );
	/*add_image_size( 'box_big', 688, 600, true );
	add_image_size( 'page_large', 300, 600, true );
	add_image_size( 'receta_list', 254, 193, true );
	add_image_size( 'big_cat', 988, 560, true );
	add_image_size( 'small_cat', 300, 280, true );
	add_image_size( 'middle_cat', 430, 205, true );
	add_image_size( 'box_cat', 429, 205, true );
	add_image_size( 'estados_in', 988, 350, true );
	add_image_size( 'fg_thumb', 184, 83, true );
	add_image_size( 'mex_in_big', 654, 600, true );
	add_image_size( 'mex_in', 309, 293, true );*/
	
}
add_action( 'after_setup_theme', 'lcd_theme_setup' );

/*------------------------------------*\
    $MENÚ
\*------------------------------------*/
function register_my_menus() {
	register_nav_menus(
		array('Header' => __('Header'), 'Footer' => __('Footer'), 'Mobile' => __('Mobile'))
	);
}
add_action( 'init', 'register_my_menus' );
/*------------------------------------*\
    $Defer
\*------------------------------------*/
function add_defer_attribute($tag, $handle) {
	if(is_home()):
		if('index_js' !== $handle && 'slider' !== $handle && '3d' !== $handle):
			return $tag;
		endif;
	elseif(is_single()):
		if('single_js' !== $handle && 'slider' !== $handle && '3d' !== $handle && 'sb' !== $handle):
	        return $tag;
		endif;
	elseif(is_page()):
		if('page_js' !== $handle && 'slider' !== $handle && '3d' !== $handle):
	        return $tag;
		endif;
	elseif(is_search()):
		if('search_js' !== $handle):
	        return $tag;
		endif;
	elseif(is_category()):
		if('category_js' !== $handle && 'slider' !== $handle && '3d' !== $handle):
	        return $tag;
		endif;
	elseif(is_tag()):
		if('category_js' !== $handle && 'slider' !== $handle && '3d' !== $handle):
	        return $tag;
		endif;
	else:
		if('otros_js' !== $handle):
	        return $tag;
		endif;
	endif;
    return str_replace( ' src', ' defer="defer" src', $tag );
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
/*------------------------------------*\
    $LOAD SCRIPTS
\*------------------------------------*/
function _remove_query_strings_1( $src ){	
	$rqs = explode( '?ver', $src );
        return $rqs[0];
}
if (!is_admin() ) :
	add_filter( 'script_loader_src', '_remove_query_strings_1', 15, 1 );
	add_filter( 'style_loader_src', '_remove_query_strings_1', 15, 1 );
endif;

function lcd_load_scripts(){
	wp_deregister_script( 'jquery' );
	if(is_home()):
		wp_enqueue_script( 'index_js', THEME_URL . '/js/index.js', null, null, true );
		wp_enqueue_script( 'slider', THEME_URL . '/owl/owl.carousel.min.js', null, false, true );
		wp_enqueue_script( '3d', THEME_URL . '/js/3d.js', null, null, true );
	elseif(is_single()):
		wp_enqueue_script( 'single_js', THEME_URL . '/js/single.js', null, null, true );
		wp_enqueue_script( 'slider', THEME_URL . '/owl/owl.carousel.min.js', null, false, true );
		wp_enqueue_script( '3d', THEME_URL . '/js/3d.js', null, null, true );
		wp_enqueue_script( 'sb', THEME_URL . '/js/sb.js', null, null, true );
	elseif(is_page()):
		wp_enqueue_script( 'page_js', THEME_URL . '/js/page.js', null, null, true );
		wp_enqueue_script( 'slider', THEME_URL . '/owl/owl.carousel.min.js', null, false, true );
		wp_enqueue_script( '3d', THEME_URL . '/js/3d.js', null, null, true );
	elseif(is_category()):
		wp_enqueue_script( 'category_js', THEME_URL . '/js/category.js', null, null, true );
		wp_enqueue_script( 'slider', THEME_URL . '/owl/owl.carousel.min.js', null, false, true );
		wp_enqueue_script( '3d', THEME_URL . '/js/3d.js', null, null, true );
	elseif(is_tag()):
		wp_enqueue_script( 'category_js', THEME_URL . '/js/category.js', null, null, true );
		wp_enqueue_script( 'slider', THEME_URL . '/owl/owl.carousel.min.js', null, false, true );
		wp_enqueue_script( '3d', THEME_URL . '/js/3d.js', null, null, true );
	elseif(is_search()):
		wp_enqueue_script( 'search_js', THEME_URL . '/js/search.js', null, null, true );
	else:
		wp_enqueue_script( 'otros_js', THEME_URL . '/js/otros.js', null, null, true );
	endif;
}
add_action( 'template_redirect', 'lcd_load_scripts' );

/*------------------------------------*\
    $SIDEBARS
\*------------------------------------*/
function lcd_widgets_init() {
	//Widgets
	register_widget('Topten_Widget');
	register_widget('Club_Widget');
	register_widget('Images_Post_Widget');
	register_widget('Ad_Leaderboard');
	register_widget('Ad_Boxbanner');
	register_widget('Ad_Half_Page');
		
	register_sidebar(array(
		'id' => 'zone_header',
		'name' => 'Zone Header',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'desktop_index_uno',
		'name' => 'Desktop Index Uno',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'zone_ad_inter',
		'name' => 'Zone Ad Inter',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'desktop_index_dos',
		'name' => 'Desktop Index Dos',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'desktop_index_tres',
		'name' => 'Desktop Index Tres',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'desktop_index_cuatro',
		'name' => 'Desktop Index Cuatro',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'desktop_index_cinco',
		'name' => 'Desktop Index Cinco',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'desktop_index_seis',
		'name' => 'Desktop Index Seis',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));	
	register_sidebar(array(
		'id' => 'desktop_category',
		'name' => 'Desktop Category',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'zone_post_atelier',
		'name' => 'Zone Post Atelier',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'zone_post_normal',
		'name' => 'Zone Post Normal',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'zone_post_normal_down',
		'name' => 'Zone Post Normal Down',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'zone_publi',
		'name' => 'Zone Publi',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'zone_foto',
		'name' => 'Zone Foto',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	/*Zones Mobile*/
	register_sidebar(array(
		'id' => 'mobile_header',
		'name' => 'Mobile Header',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_index_uno',
		'name' => 'Mobile Index Uno',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_index_native',
		'name' => 'Mobile Index Native',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_index_dos',
		'name' => 'Mobile Index Dos',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_post_atelier',
		'name' => 'Mobile Post Atelier',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_post_normal',
		'name' => 'Mobile Post Normal',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_post_video',
		'name' => 'Mobile Post Video',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_post_foto',
		'name' => 'Mobile Post Foto',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_micrositio',
		'name' => 'Mobile Micrositio',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_micrositio2',
		'name' => 'Mobile Micrositio 2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_atelier',
		'name' => 'Mobile Atelier',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_atelier2',
		'name' => 'Mobile Atelier 2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_normal',
		'name' => 'Mobile Normal',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_normal2',
		'name' => 'Mobile Normal 2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_video',
		'name' => 'Mobile Video',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_video2',
		'name' => 'Mobile Video 2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_foto',
		'name' => 'Mobile Foto',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
	register_sidebar(array(
		'id' => 'mobile_category',
		'name' => 'Mobile Category',
		'before_widget' => '<section id="%1$s" class="widget %2$s">'."\n",
		'after_widget' => '</section>'."\n"
	));
}
add_action( 'widgets_init', 'lcd_widgets_init' );

/*------------------------------------*\
    $HELPERS
\*------------------------------------*/
function get_metas_html(){
	$output = '';
	$output .= '<meta charset="UTF-8">';
	$output .= '<meta http-equiv="Content-Language" content="es"/>';
	$output .= '<meta name="viewport" content="initial-scale=1, maximum-scale=1">';
	//$output .= '<meta name="p:domain_verify" content="2a1550c7422f22c6997351526b117e03"/>';
	$output .= '<meta name="robots" content="noodp"/> ';
    if(is_home())
		$title = '<title>'.BLOG_NAME.'</title>';
    else
		$title = '<title>'.wp_title('&laquo; ', false, 'right').'</title>';
	$output .= $title;
	$postid = ''; $meta_seo = '<!-- Meta Seo -->'; $fb_cont = '<!-- Facebook -->'; $links = '<!-- Links -->';
	if(is_home()):
		$postid = 0;
		$meta_seo .= '<meta name="description" content="Somos la revista líder de viajes de lujo en América Latina. Inspiración, en papel y en formato digital, para los viajeros más exigentes.">';
		$meta_seo .= '<meta name="keywords" content="">';
		$fb_cont .= '<meta property="og:locale" content="es_MX">';
		$fb_cont .= '<meta property="og:site_name" content="'.BLOG_NAME.'">';
		$links .= '<link rel="alternate" href="'.BASE_URL.'" hreflang="es-mx" />';
	elseif(is_single()) :
		$tag = '';
		global $post;
		$postid = $post->ID;
		$tags = wp_get_post_tags($postid);
		foreach($tags as $t):
			$tag .= $t->name.', ';
		endforeach;
		$res = $post->post_excerpt;
		$url = get_permalink($postid);
		$meta_seo .= '<meta name="description" content="'.str_replace('"','', $res).'">';
		$meta_seo .= '<meta name="keywords" content="'.$tag.'">';
		$meta_seo .= '<meta name="viewport" content="width=device-width, user-scalable=no">';
		$author = get_the_author_meta('display_name',$post->post_author);	
		$meta_seo .= '<meta name="author" content="'.$author.'">';
		
		//$twitter = get_user_meta($post->post_author,'twitter',true);
		//$meta_seo .= '<meta property="article:author" content="'.$author.'" />';
		//$fb_cont .= '<meta property="fb:app_id" content="1069029519808486" />';
		//$fb_cont .= '<meta property="og:locale" content="es_MX">';
		//$fb_cont .= '<meta property="og:site_name" content="'.BLOG_NAME.'">';
		//$fb_cont .= '<meta property="og:type" content="article">';
		//$fb_cont .= '<meta property="og:url" content="'.$url.'">';
		//$fb_cont .= get_rewrite_fb_og($postid);	
		//$fb_cont .= '<meta property="article:published_time" content="'.get_the_date( 'c', $postid ).'" />';
		$links .= '<link rel="alternate" href="'.$url.'" hreflang="es-mx" />';
	else:
		$postid = 0;
		$meta_seo .= '<meta name="description" content="">';
		$meta_seo .= '<meta name="keywords" content="">';
		$fb_cont .= '<meta property="og:locale" content="es_MX">';
		$fb_cont .= '<meta property="og:site_name" content="'.BLOG_NAME.'">';
		$links .= '<link rel="alternate" href="'.BASE_URL.'" hreflang="es-mx" />';
	endif;
	$links .= '<link rel="shortcut icon" type="image/x-icon" href="'.THEME_URL.'/img/favicon.ico"/>';
	//$links .= '<link href="https://plus.google.com/108593386504133662585 "rel="publisher" />';
	$style = wp_remote_get( THEME_URL.'/style.css', array( 'timeout' => 120, 'httpversion' => '1.1' ) );
	
	if(is_home()):
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.carousel.min.css">';
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.theme.default.min.css">';
		if ( is_wp_error( $style ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/css/style.css">';
		else:
			$links .= '<style type="text/css">'.$style['body'].'</style>';
		endif;
		$response = wp_remote_get( THEME_URL.'/css/index.css', array( 'timeout' => 120, 'httpversion' => '1.1' ) );
		if ( is_wp_error( $response ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/css/index.css">';
		else:
			$links .= '<style type="text/css">'.$response['body'].'</style>';
		endif;
	elseif(is_single()):
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/css/sb.css">';
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.carousel.min.css">';
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.theme.default.min.css">';
		if ( is_wp_error( $style ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/style.css">';
		else:
			$links .= '<style type="text/css">'.$style['body'].'</style>';
		endif;
		$response = wp_remote_get( THEME_URL.'/css/single.css', array( 'timeout' => 120, 'httpversion' => '1.1' ) );
		if ( is_wp_error( $response ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/css/single.css">';
		else:
			$links .= '<style type="text/css">'.$response['body'].'</style>';
		endif;
	elseif(is_page()):
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.carousel.min.css">';
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.theme.default.min.css">';
		if ( is_wp_error( $style ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/style.css">';
		else:
			$links .= '<style type="text/css">'.$style['body'].'</style>';
		endif;
		$response = wp_remote_get( THEME_URL.'/css/page.css', array( 'timeout' => 120, 'httpversion' => '1.1' ) );
		if ( is_wp_error( $response ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/css/page.css">';
		else:
			$links .= '<style type="text/css">'.$response['body'].'</style>';
		endif;
	elseif(is_category()):
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.carousel.min.css">';
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.theme.default.min.css">';
		if ( is_wp_error( $style ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/style.css">';
		else:
			$links .= '<style type="text/css">'.$style['body'].'</style>';
		endif;
		$response = wp_remote_get( THEME_URL.'/css/category.css', array( 'timeout' => 120, 'httpversion' => '1.1' ) );
		if ( is_wp_error( $response ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/css/category.css">';
		else:
			$links .= '<style type="text/css">'.$response['body'].'</style>';
		endif;
	elseif(is_tag()):
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.carousel.min.css">';
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/owl/assets/owl.theme.default.min.css">';
		if ( is_wp_error( $style ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/style.css">';
		else:
			$links .= '<style type="text/css">'.$style['body'].'</style>';
		endif;
		$response = wp_remote_get( THEME_URL.'/css/category.css', array( 'timeout' => 120, 'httpversion' => '1.1' ) );
		if ( is_wp_error( $response ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/css/category.css">';
		else:
			$links .= '<style type="text/css">'.$response['body'].'</style>';
		endif;
	elseif(is_search()):
		if ( is_wp_error( $style ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/style.css">';
		else:
			$links .= '<style type="text/css">'.$style['body'].'</style>';
		endif;
		$response = wp_remote_get( THEME_URL.'/css/search.css', array( 'timeout' => 120, 'httpversion' => '1.1' ) );
		if ( is_wp_error( $response ) ) :
			$links .= '<link rel="stylesheet" href="'.THEME_URL.'/css/search.css">';
		else:
			$links .= '<style type="text/css">'.$response['body'].'</style>';
		endif;
	else:
		$links .= '<link rel="stylesheet" href="'.THEME_URL.'/style.css">';
	endif;
	$output .= $meta_seo;
	$output .= $fb_cont;
	$output .= $links;
	echo $output;
return $postid;
}
function get_scripts($type = NULL){
	$output = '';
	if($type == 'ga'):
		$output .= '<!-- Script Analytics -->';
		$output .= '<script>';
			$output .= '(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)}) (window,document,"script","https://www.google-analytics.com/analytics.js","ga");';
			$output .= 'ga("create", "UA-105746815-1", "auto");';
			$output .= 'ga("send", "pageview");';
		$output .= '</script>';
	elseif($type == 'fb'):
		$output .= '<!-- Script Facebook -->';
		$output .= '<div id="fb-root"></div>';
		$output .= '<script>';
			//$output .= '(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=1069029519808486";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));';
		$output .= '</script>';
	endif;
return $output;
}
function get_related_queue($pid){
	$output = '';
	$rel_ids = get_related_ids($pid);
	//set_shared($pid);
	$output .= '<script type="text/javascript">';
		$output .= 'var related = [];';
		foreach($rel_ids as $r):
			$output .= 'related.push("'.$r.'");';
		endforeach;
	$output .= '</script>';
return $output;
}
	//Limit Characters
function limit_words($words, $length_max, $pts = false) {
	$pt = $title_final = '';
	if($pts == true)
		$pt = '…';
	if(strlen($words) > ($length_max-3) ){
		$cutword = true;
		if( substr($words, $length_max, 1) != ' ' ){
			$i=$length_max;
			while($cutword){
				if(substr($words, $i, 1)  == ' ' ){
					$cutword = false;
					//$title_final = substr($words, 0, $i).'…';
					$title_final = substr($words, 0, $i).$pt;
				}
				$i--;
			}
		}else{
			//$title_final = substr($words, 0, $length_max).'…';
			$title_final = substr($words, 0, $length_max).$pt;
		}
	}else{
		$title_final = $words;
	}
	return $title_final;
}
	// Comments
function in_comment_post_like($string, $array) {
	foreach($array as $ref) { if(strstr($string, $ref)) { return true; } }
	return false;
}
function drop_bad_comments() {
	if (!empty($_POST['comment'])) {
		$post_comment_content = $_POST['comment'];
		$lower_case_comment = strtolower($_POST['comment']);
		$bad_comment_content = array(
			//'www.',
			//'http://',
			'viagra',
			'hydrocodone',
			'hair loss',
			'[url=http',
			'[link=http',
			'xanax',
			'tramadol',
			'russian girls',
			'russian brides',
			'lorazepam',
			'adderall',
			'dexadrine',
			'no prescription',
			'oxycontin',
			'without a prescription',
			'sex pics',
			'family incest',
			'online casinos',
			'online dating',
			'cialis',
			'best forex',
			'amoxicillin',
			'valium'.
			'drugs'
		);
		//$lower_case_comment = preg_replace('/<link(.*)><\/link>/i','',$lower_case_comment);
		$good = array('<l>','</l>');
		$otros = array('www.','http://');
		if(in_comment_post_like($lower_case_comment,$good)){}else{$bad_comment_content = array_merge($bad_comment_content,$otros);}
		if (in_comment_post_like($lower_case_comment, $bad_comment_content)) {
			$comment_box_text = wordwrap(trim($post_comment_content), 80, "n  ", true);
			$txtdrop = fopen('log.txt', 'a');
			fwrite($txtdrop, "  --------------n  [COMMENT] = " . $post_comment_content . "n  --------------n");
			fwrite($txtdrop, "  [SOURCE_IP] = " . $_SERVER['REMOTE_ADDR'] . " @ " . date("F j, Y, g:i a") . "n");
			fwrite($txtdrop, "  [USERAGENT] = " . $_SERVER['HTTP_USER_AGENT'] . "n");
			fwrite($txtdrop, "  [REFERER  ] = " . $_SERVER['HTTP_REFERER'] . "n");
			fwrite($txtdrop, "  [FILE_NAME] = " . $_SERVER['SCRIPT_NAME'] . " - [REQ_URI] = " . $_SERVER['REQUEST_URI'] . "n");
			fwrite($txtdrop, '--------------**********------------------'."n");
			header("HTTP/1.1 406 Not Acceptable");
			header("Status: 406 Not Acceptable");
			header("Connection: Close");
			wp_die( __('Para prevenir la llegada de spam, no podemos aceptar comentarios que contengan links.') );
		}
	}
}
add_action('init', 'drop_bad_comments');
function modify_contact_methods($profile_fields) {
	$profile_fields['twitter'] = 'Twitter Username';
	$profile_fields['instagram'] = 'Instagram Username';
	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');


function get_menu($menu_name = NULL, $type = NULL){
	$output = '';
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu = wp_get_nav_menu_items($menu->term_id);
		$i = 0; $j = 0;
		$total = count($menu);
		if($type == 'footer'):
			foreach ( (array) $menu as $key => $menu_item ): $i++; $j++;
				if($i == 1):
					$output .= '<ul class="inc'.$j.'">';
				endif;
					$title = $menu_item->title;
					$url = $menu_item->url;
					$output .= '<li id="mli'.$i.'" class="hoverm"><a href="' . $url . '">'.$title.'</a></li>';
				if($i == 6 || $j == $total):
					$i = 0;
					$output .= '</ul>';
				endif;
			endforeach;
		elseif($type == 'estado'):
			foreach ( (array) $menu as $key => $menu_item ): $i++; $j++;
				if($i == 1):
					$output .= '<ul class="inc'.$j.' '.$menu_name.'">';
				endif;
					$title = $menu_item->title;
					$url = $menu_item->url;
					$output .= '<li id="mli'.$i.'" class="hoverm"><a href="' . $url . '">'.$title.'</a></li>';
				if($i == 9 || $j == $total):
					$i = 0;
					$output .= '</ul>';
				endif;
			endforeach;
		elseif($type == 'header'):
			foreach ( (array) $menu as $key => $menu_item ): $i++; $j++;
				$cat = (int)$menu_item->object_id;
				$subca = get_categories(array('parent' => $cat, 'hide_empty' => 0));
				$totalsm = count($subca);
				$submenu = '';
				/*if($totalsm > 0):
					$submenu .= '<ul class="super-edo">';
					$k=0;
					foreach($subca as $cat): $k++;
						$url = get_category_link($cat->term_id);
						$title = $cat->name;
						$submenu .= '<li id="mli'.$k.'" class="hoverm"><a href="' . $url . '">'.$title.'</a></li>';
					endforeach;
					$submenu .= '</ul>';
				endif;*/
				if($i == 1):
					$output .= '<ul class="inc'.$j.' '.$menu_name.'">';
				endif;
					$title = $menu_item->title;
					$url = $menu_item->url;
					if($submenu!='')
						$output .= '<li id="mli'.$i.'" class="hoverm has_subm"><a href="' . $url . '">'.$title.'</a>'.$submenu.'</li>';
					else
						$output .= '<li id="mli'.$i.'" class="hoverm"><a href="' . $url . '">'.$title.'</a></li>';
				if($i == 3 || $j == $total):
					$i = 0;
					$output .= '</ul>';
				endif;
			endforeach;
		else:
			foreach ( (array) $menu as $key => $menu_item ): $i++; $j++;
				if($i == 1):
					$output .= '<ul class="inc'.$j.' '.$menu_name.'">';
				endif;
					$title = $menu_item->title;
					$url = $menu_item->url;
					$output .= '<li id="mli'.$i.'" class="hoverm"><a href="' . $url . '">'.$title.'</a></li>';
				if($i == 3 || $j == $total):
					$i = 0;
					$output .= '</ul>';
				endif;
			endforeach;
		endif;
	endif;
	return $output;
}
function get_related_posts($pid){
	$output = '';
	$tags = wp_get_post_tags($pid);
	if ($tags) :
		$a = array();
		foreach($tags as $t)
		$a [] = $t->term_id;
		$args = array(
			'posts_per_page'=>3,
			'tag__in' => $a,
			'post__not_in' => array($pid),
			'orderby'=>'date'
		);
		query_posts($args);
		if(have_posts() ) : $i=0;
			$output .= '<div id="wrap_gal">';
				$output .= '<div class="fotogal conclave" id="wrapper_bu">';
					while (have_posts()) : the_post(); $i++;
						$output .= '<div class="tresds" id="bu'.($i).'">';
							$output .= '<article>';
								$output .= '<a href="'.get_permalink().'">';
									$output .= '<div id="wrap_img">';
										$output .= get_the_post_thumbnail(get_the_ID(), 'mobile_grl' , array( 'title' => get_the_title() ));
										$output .= '<div id="wrap_center"><div class="vcenter" style=""><img src="http://travesiasdigital.com/wp-content/themes/travesias_2017_m/img/play.png" alt="play_v"></div></div>';
									$output .= '</div>';
									$output .= '<div id="text_s">';
										$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
										$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
										$output .= '<div class="btn_lm">ver más</div>';
									$output .= '</div>';
								$output .= '</a>';
							$output .= '</article>';
						$output .= '</div>';
					endwhile;
				$output .= '</div>';
				$output .= '<div id="nav_3">
				<div class="next_3d"></div>
				<div class="prev_3d"></div>
				</div>';
			$output .= '</div>';
		endif;
	endif;
	wp_reset_query();
	return $output;
}
if(!function_exists('get_dynamic_sidebar')):
	function get_dynamic_sidebar($index = 1){
		$sidebar_contents = "";
		ob_start();
		dynamic_sidebar($index);
		$sidebar_contents = ob_get_clean();
		return $sidebar_contents;
	}
endif;
// Fotogalería
// Galeria Override
remove_shortcode('gallery', 'gallery_shortcode'); 
add_shortcode('gallery', 'custom_gallery_shortcode');
function custom_gallery_shortcode($attr) {
	$post = get_post();
	static $instance = 0;
	$instance++;
	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}
	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'full',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));
	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
	if ( empty($attachments) )
		return '';
	$output = '';
		$output .= '<div id="wrap_gal">';
			$output .= '<div class="fotogal conclave" id="wrapper_bu">';
	$i=0;
	foreach ( $attachments as $id => $attachment ): $i++;
		$image_full = wp_get_attachment_image_src( $attachment->ID, 'galleria' );
		$image_thumb = wp_get_attachment_image_src( $attachment->ID, 'galleria' );
		$image_slider= wp_get_attachment_image_src( $attachment->ID, 'mobile_grl' );
		$image_thumb_ico = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' );
		$image_meta  = wp_get_attachment_metadata( $id );
		$title = wptexturize($attachment->post_title);
		$caption = wptexturize($attachment->post_excerpt);
		$output .= '<div class="tresds" id="bu'.($i).'">';
			$output .= '<article>';
				$output .= '<a href="'.$image_full[0].'" class="swipebox" data-titulo="'.$post->title.'" data-url="'.get_permalink($post->ID).'" rel="gal-'.$post->ID.'" title="'.$attachment->post_content.'">';
					$output .= '<img src="'.$image_slider[0].'" alt="'.$caption.'" data-desc="'.$attachment->post_content.'" data-large-src="'.$image_thumb[0].'" />';
				$output .= '</a>';	
			$output .= '</article>';
		$output .= '</div>';
	endforeach;
		$output .= '</div>';
		$output .= '<div id="nav_3">
					<div class="next_3d"></div>
					<div class="prev_3d"></div>
				</div>';
	$output .= '</div>';
	return $output;
}
// Set Views
function set_views($pid){
	$post_views = get_field('views',$pid);
	if(!update_post_meta($pid, 'views', ($post_views+1)))
		add_post_meta($pid, 'views', 1, true);
}
// Views on Column
function get_PostViews($post_ID){
    $count_key = 'views';
    $count = get_post_meta($post_ID, $count_key, true);
    return $count;
}
function post_column_views($newcolumn){
    $newcolumn['post_views'] = __('Views');
    return $newcolumn;
}
function post_custom_column_views($column_name, $id){    
    if($column_name === 'post_views'){
        echo get_PostViews(get_the_ID());
    }
}
add_filter('manage_posts_columns', 'post_column_views');
add_action('manage_posts_custom_column', 'post_custom_column_views',10,2);

function get_cat($pid){
	$cats = get_the_category($pid);
	foreach($cats as $cat):
		if($cat->name != 'slider'):
			$cat = $cat->term_id;
			break;
		endif;
	endforeach;
	return $cat;
}
function get_related_ids($pid){
	$output = array(); $i=0;
	$tags = wp_get_post_tags($pid);
	$exc = array($pid);
	if ($tags) :
		$a = array();
		foreach($tags as $t)
		$a [] = $t->term_id;
		$args = array(
			'posts_per_page'=>5,
			'tag__in' => $a,
			'post__not_in' => $exc,
			'category__not_in' => array(19,81,86)
		);
		$query = new WP_Query( $args ); 
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$output[] = get_the_ID();
			$exc[] = get_the_ID();
		endwhile;
	endif;
	wp_reset_query();
	if($i < 5):
		$number = (5-$i);
		$post_categories = wp_get_post_categories($pid);
		foreach($post_categories as $c):
			$cat = get_category( $c );
			if($cat->category_count > 0):
				$cat = $c;
			endif;
		endforeach;
		$args = array(
			'posts_per_page' => $number,
			'type'=> 'list',
			'post__not_in' => $exc,
			'cat' => $cat,
			'category__not_in' => array(19,81,86)
		);
		$query = new WP_Query( $args ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$output[] = get_the_ID();
		endwhile;
		wp_reset_query();
	endif;
	return array_reverse($output);
}
function get_related_urls($pid){
	$output = array();
	$tags = wp_get_post_tags($pid);
	$i=0;
	$exc = array($pid);
	if ($tags) :
		$a = array();
		foreach($tags as $t)
		$a [] = $t->term_id;
		$args = array(
			'posts_per_page'=>3,
			'tag__in' => $a,
			'post__not_in' => $exc,
		);
		$query = new WP_Query( $args ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$output[] = get_permalink();
			$exc[] = get_the_ID();
		endwhile;
	endif;
	wp_reset_query();
	if($i < 3):
		$number = (3-$i);
		$post_categories = wp_get_post_categories($pid);
		foreach($post_categories as $c):
			$cat = get_category( $c );
			if($cat->category_count > 0):
				$cat = $c;
			endif;
		endforeach;
		$args = array(
			'posts_per_page' => $number,
			'type'=> 'list',
			'post__not_in' => $exc,
			'cat' => $cat
		);
		$query = new WP_Query( $args ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$output[] = get_permalink();
		endwhile;
		wp_reset_query();
	endif;
	return array_reverse($output);
}
function make_bitly_url($pid, $url,$format = 'xml',$version = '2.0.1'){
	$url_s = get_field('url_corta');
	if($url_s == ''):
		$bitly_login = 'omarod152';
		$bitly_api = 'R_3722e29af79946789f166e94b06aa29a';
		$bit_url = 'https://api-ssl.bitly.com/v3/shorten?access_token=597f4393d200a8e75c25cab456baa8a95ea11d3d&longUrl='.$url.'&format=json';
		$url_s = wp_remote_retrieve_body(wp_remote_get($bit_url));
		$url_s = json_decode($url_s);
		if($url_s->status_code == 200):
			$url_s = $url_s->data->url;
			update_post_meta($pid,'url_corta',$url_s);
		endif;
	endif;
	return $url_s;
}
function getDatesFromRange($start, $end) {
    $interval = new DateInterval('P1D');
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
    $period = new DatePeriod(
         new DateTime($start),
         $interval,
         $realEnd
    );
    foreach($period as $date)
        $array[] = $date->format('Ymd'); 
    return $array;
}
function get_rewrite_fb_og($pid){
	$output = '';
	$image = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'large');
	$post = get_post( $pid );
	$c_ti = str_replace('"','\'', get_field('facebook_field_title',$pid));
	$c_des = str_replace('"','\'', get_field('facebook_field_description', $pid));
	$c_img = get_field('facebook_field_image',$pid);
	
	if($c_ti == '')
		$output .= '<meta property="og:title" content="'.str_replace('"','\'',$post->post_title).' - '.BLOG_NAME.'">';
	else
		$output .= '<meta property="og:title" content="'.$c_ti.' - '.BLOG_NAME.'">';
	if($c_des == '')
		$output .= '<meta property="og:description" content="'.str_replace('"','\'', $post->post_excerpt).'">';
	else
		$output .= '<meta property="og:description" content="'.$c_des.'">';
	if($c_img == ''):
		$output .= '<meta property="og:image" content="'.$image[0].'">';
	else:
		$c_img = wp_get_attachment_image_src ( $c_img, 'large');
		$output .= '<meta property="og:image" content="'.$c_img[0].'">';
	endif;
	return $output;
}
function set_shared($pid){
	$shared_views = get_field('shared',$pid);
	if(!update_post_meta($pid, 'shared', get_shared($pid)))
		add_post_meta($pid, 'shared', 0, true);
}
function get_shared($id){
	$url = get_permalink($id);
	if ( false === ( $shared = get_transient( 'shared_'.$id ) ) ) :
		//linkedin
		$response = wp_remote_get( 'http://www.linkedin.com/countserv/count/share?url='.$url.'&format=json' );
		if( is_array($response) ) :
			$header = $response['headers']; // array of http header lines
			$body = $response['body']; // use the content
			$json = json_decode($body, true);
			$li = intval( $json['count'] );	
		else:
			$li = 0;
		endif;
		//twitter
		$response = wp_remote_get( 'http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
		if( is_array($response) ) :
			$header = $response['headers']; // array of http header lines
			$body = $response['body']; // use the content
			$json = json_decode($body, true);
			$tw = intval( $json['count'] );	
		else:
			$tw = 0;
		endif;
		//Facebook
		$response = wp_remote_get( 'https://graph.facebook.com/'.$url.'?access_token=1069029519808486|06667793698ccfb718067b68fcb44d62');
		if( is_array($response) ) :
			$header = $response['headers']; // array of http header lines
			$body = $response['body']; // use the content
			$json = json_decode($body, true);
			$com = intval($json['share']['comment_count']);
			$shares = intval($json['share']['share_count']);
			$fb = intval( $com+$shares );	
		else:
			$fb = 0;
		endif;
		//Google
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		$curl_results = curl_exec ($curl);
		curl_close ($curl);
		$json = json_decode($curl_results, true);
		$gp = intval( $json[0]['result']['metadata']['globalCounts']['count'] );
		
		$shared = $li+$tw+$fb+$gp;
		set_transient( 'shared_'.$id , $shared, 60 * MINUTE_IN_SECONDS );
		return $shared;
	endif;
}
function strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}
add_filter( 'wp_image_editors', 'change_graphic_lib');
function change_graphic_lib($array) {
	return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick');
}
// Add Shortcode
function related_inline_shortcode() {
	global $post;
	$pid = $post->ID;
	$hr = get_field('reacionadas_inline', $pid);
	if($hr != ''):
		$cont_sh = '<div id="rel_hi_'.$pid.'" class="related_inline">';
			$cont_sh .= '<span>Historias Relacionadas</span>';
			$cont_sh .= '<div id="cont_hr">';
				foreach($hr as $post):
					$postid = $post;
					$cont_sh .= '<div id="hr">';
						$cont_sh .= '<a href="'.get_permalink($postid).'" target="_blank">'.get_the_title($postid).'</a>';
					$cont_sh .= '</div>';
				endforeach;
			$cont_sh .= '</div>';
		$cont_sh .= '</div>';
	endif;
	wp_reset_query();
	return $cont_sh;
}
add_shortcode( 'related-inline', 'related_inline_shortcode' );

// Add Shortcode
function capital_letra($atts = [], $content = null)
{
    // do something to $content
 	$content = '<p class="gl">'.$content.'</p>';
    // always return
    return $content;
}
add_shortcode( 'gl', 'capital_letra' );

function get_intagram_pieces(){
	$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=24609880.522621d.aa95150eb325445fb2bc008bd6333202&count=8';
	$instagram = file_get_contents($url);
	//$instagram = wp_remote_get( $url, array( 'timeout' => 120, 'httpversion' => '1.1' ) );
	//$instagram = file_get_contents_curl($url);
	var_dump($instagram);
	if ( is_wp_error( $instagram ) ) :
   		$error_message = $instagram->get_error_message();
   		echo "Something went wrong: $error_message";
	else:
		$result = wp_remote_retrieve_body( $instagram );
		$data = json_decode($result);
		if( ! empty( $data ) ):
			$output = '';
			$i = 0;
			foreach( $data->data as $post_inst ) : $i++;
				$output .= '<div class="tresds" id="bu'.($i).'">';
					$output .= '<article>';
						$link = $post_inst->link;
						$image = $post_inst->images->low_resolution->url;
						$output .= '<a href="'.$link.'" target="_blank">';
							$output .= '<img src="'.$image.'" />';
						$output .= '</a>';
					$output .= '</article>';
				$output .= '</div>';
			endforeach;
		endif;
	endif;
	//return $output;
}
function get_intagram_pieces_2(){
	$output = '';
	$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=24609880.522621d.aa95150eb325445fb2bc008bd6333202&count=8';
	$cachefile = THEME_PATH."/instagram_cache/travesias_cache";
	if (file_exists($cachefile) && time()-filemtime($cachefile)<3600) {
		$contents = file_get_contents($cachefile);
		if($contents == ''){
			$contents = file_get_contents($url);
			file_put_contents($cachefile, $contents);
		}
	} else {
		$contents = file_get_contents($url);
		file_put_contents($cachefile, $contents);
	}
	$instagram = $contents;
	if ( is_wp_error( $instagram ) ) :
   		$error_message = $instagram->get_error_message();
   		echo "Something went wrong: $error_message";
	else:
		$data = json_decode($instagram);
		if( ! empty( $data ) ):
			$output = '';
			$i = 0;
			foreach( $data->data as $post_inst ) : $i++;
				$output .= '<div class="tresds" id="bu'.($i).'">';
					$output .= '<article>';
						$link = $post_inst->link;
						$image = $post_inst->images->low_resolution->url;
						$output .= '<a href="'.$link.'" target="_blank">';
							$output .= '<img src="'.$image.'" />';
						$output .= '</a>';
					$output .= '</article>';
				$output .= '</div>';
			endforeach;
		endif;
	endif;
	return $output;
}
function get_dynamic_widget($name = null){
	$sidebar_contents = "";
	ob_start();
		the_widget($name);
	$sidebar_contents = ob_get_clean();
	wp_reset_query();
	return $sidebar_contents;
}
function ad_script($script = NULL) {
    //echo $script;
	unset($script);
}
add_action('admin_head', 'ad_script');
add_action('wp_head', 'ad_script');

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $data = curl_exec($ch);
    $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($retcode == 200) {
        return $data;
    } else {
        return null;
    }
}
function excerpt_count_js(){
    if ('page' != get_post_type()) {
		echo '<script>';
        echo 'jQuery(document).ready(function(){
			jQuery("#postexcerpt .inside").after("<span id=\"excerpt_counter\">Excerpt Lenght: / 136character(s).</span>");
     		jQuery("span#excerpt_counter").text("Excerpt Lenght "+jQuery("#excerpt").val().length+"/136");
     		jQuery("#excerpt").keyup( function() {
         		if(jQuery(this).val().length > 136){
            		jQuery(this).val(jQuery(this).val().substr(0, 136));
        		}
     			jQuery("span#excerpt_counter").text("Excerpt Lenght "+jQuery("#excerpt").val().length+"/136");
   				});
			});';
		echo '</script>';
    }
}
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');
function get_tags_t($pid){
	$output = '';
	$output .= '<ul id="tags">';
	$cats = wp_get_post_categories($pid);
	if($cats):
		foreach($cats as $cat):
			if($cat != 104 && $cat != 102 && $cat != 80 && $cat != 1107):
				$output .= '<li><a href="'.get_category_link($cat).'">'.get_cat_name($cat).'</li></a>';
			endif;
		endforeach;
	endif;
	$tags = wp_get_post_tags($pid);
	if ($tags) :
		foreach($tags as $t):
			$output .= '<li><a href="'.get_tag_link($t->term_id).'">'.$t->name.'</li></a>';
		endforeach;
	endif;
	$output .= '</ul>';
	return $output;
}
function set_primary_pl($id){
	if(is_single()):
		$cat = get_primary_pl($id);
		$slug = get_post_field( 'post_name', $id );
		$final = $cat.'/'.$slug;
		$current_pl = get_field('custom_permalink', $id);
		if($current_pl !== $final):
			if (!add_post_meta($id,'custom_permalink', $final, true))
			   update_post_meta($id, 'custom_permalink', $final );
		endif;
	elseif(is_category() && !is_category(104)):
		$category = get_query_var('cat');
		$current_cat = get_category($cat);
		$slug = $current_cat->slug;
		$final = get_cats_hq($id);
		$current_pl = '';
		$table = get_option('custom_permalink_table');
		  if ( $table )
		  foreach ( $table as $link => $info ) {
			if ( $info['id'] == $id ) {
			  $current_pl = $link;
			}
		  }
		if($current_pl !== $final):
		  $table = get_option('custom_permalink_table');
		  if ( $table )
		  foreach ( $table as $link => $info ) {
			if ( $info['id'] == $id ) {
			  unset($table[$link]);
			  break;
			}
		  }
		  update_option('custom_permalink_table', $table);
		  $table = get_option('custom_permalink_table');
		  if ( $final )
			$table[$final] = array(
			  'id' => $id, 
			  'kind' => 'category',
			  'slug' => $slug);

		  update_option('custom_permalink_table', $table);
		endif;
	endif;
}
function get_primary_pl($id){
	$category = get_the_category();
	$useCatLink = true;
	// If post has a category assigned.
	if ($category){
		$category_display = '';
		$category_link = '';
		if ( class_exists('WPSEO_Primary_Term') )
		{
			// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
			$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term = get_term( $wpseo_primary_term );
			if (is_wp_error($term)) { 
				// Default to first category (not Yoast) if an error is returned
				$category_display = $category[0]->slug;
				$category_link = get_category_link( $category[0]->term_id );
			} else { 
				// Yoast Primary category
				$category_display = $term->slug;
				$category_link = get_category_link( $term->term_id );
			}
		} 
		else {
			// Default, display the first category in WP's list of assigned categories
			$category_display = $category[0]->slug;
			$category_link = get_category_link( $category[0]->term_id );
		}

		// Display category
		if ( !empty($category_display) ){
			return htmlspecialchars($category_display);
		}

	}
}
function get_cats_hq($id){
	$categories = get_category_parents( $id, false, '/', tru );
	if($categories != ''){
		return $categories;
	}
}

/**
 * Redirect WordPress front end https URLs to http without a plugin
 *
 * Necessary when running forced SSL in admin and you don't want links to the front end to remain https.
 *
 * @link http://blackhillswebworks.com/?p=5088
 */
 
	add_action( 'template_redirect', 'bhww_ssl_template_redirect', 1 );

	function bhww_ssl_template_redirect() {

		if ( is_ssl() && ! is_admin() ) {
		
			if ( 0 === strpos( $_SERVER['REQUEST_URI'], 'http' ) ) {
			
				wp_redirect( preg_replace( '|^https://|', 'http://', $_SERVER['REQUEST_URI'] ), 301 );
				exit();
				
			} else {
			
				wp_redirect( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
				exit();
				
			}
			
		}
		
	}


wp_enqueue_style( 'custom', get_stylesheet_uri() );
?>

