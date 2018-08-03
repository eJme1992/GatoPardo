<?php get_header() ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Mobile Category") ) : ?>
<?php dynamic_sidebar('mobile_category'); ?>
<?php endif;?>
<?php
	$cat = get_query_var('cat');
	if(cat_is_ancestor_of(104,$cat)):
		include (TEMPLATEPATH . "/cat/region.php");
	elseif(is_category('noticias')):
		include (TEMPLATEPATH . "/cat/atelier.php");
	elseif(is_category('video')):
		include (TEMPLATEPATH . "/cat/video.php");
	elseif(is_category('foto')):
		include (TEMPLATEPATH . "/cat/foto.php");
	else:
		include (TEMPLATEPATH . "/cat/normal.php");
	endif;
?>
<?php set_primary_pl($cat); ?>
<?php get_footer() ?>