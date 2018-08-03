<?php
/*
Template Name: Get Posts
*/
?>
<?php
	if(isset($_POST['cat']) && $_POST['cat'] != ''):
		$cat_id = $_POST['cat'];
		$term = get_term( $cat_id,'category');
		$coords = get_field('coordenadas', $term);
		$color = get_field('color', $term);
		$output = '';
		$args1 = array(
			'posts_per_page' => 3,
			'type'=> 'list',
			'cat' => $cat_id
		);
		$query = new WP_Query( $args1 ); $i=0;
		if($query->have_posts()):
			$output .= '<a href="'.get_category_link($cat_id).'"><h3 style="color:'.$color.'">'.get_cat_name($cat_id).'</h3></a>';
			while ( $query->have_posts() ) : $query->the_post(); $i++;
				$output .= '<article>';
					$output .= '<a href="'.get_permalink().'">';
						$output .= '<div id="tit">'.get_the_title().'</div>';
						$output .= '<div id="res">'.get_the_excerpt().' <span>+</span></div>';
					$output .= '</a>';
				$output .= '</article>';
			endwhile;
			wp_reset_query();
			$output .= '<a id="link_cat" href="'.get_category_link($cat_id).'">ver m&aacute;s &gt;</div>';
		else:
			$output .= '<a id="link_cat">No hay posts</div>';
		endif;
		echo $output;
	elseif(isset($_POST['view_post']) && $_POST['view_post'] != ''):
		set_views($_POST['view_post']);
		//set_shared($_POST['view_post']);
	else:
		header('Location : '.BASE_URL.'');
	endif;
?>