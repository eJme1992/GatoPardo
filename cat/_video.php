<?php $idcat = get_query_var('cat');?>
<div id="page_wrap" class="slider video">
<?php
$posts = array(); $i = 0;
$args = array(
		'posts_per_page' => 10,
		'type'=> 'list',
		//'cat' => $idcat,
		'post_type' => array('post'),
);
$query = new WP_Query( $args ); $i=0;
if($query->have_posts()):
	while($query->have_posts()): $query->the_post(); $i++;
		if($i == 1):
			$class = 'slider_cat';
		elseif($i == 2 || $i == 3):
			$class = 'cat_intro_uno';
		elseif($i == 5 || $i == 7 || $i == 9):
			$class = 'editor_dos';
		else:
			$class = 'editor_uno';
		endif;
		$posts[$i]  = '<article class="post_in post_'.get_the_ID().' '.$class.'">';
			$posts[$i] .= '<a href="'.get_permalink().'">';
				if($i == 1):
					$posts[$i] .= get_the_post_thumbnail(get_the_ID(), 'slider' , array( 'title' => get_the_title() ));
					$posts[$i] .= '<div id="wrap_center">';
						$posts[$i] .= '<div class="vcenter">';
							$posts[$i] .= '<div id="video_text">';
								$posts[$i] .= '<div id="title">'.get_the_title().'</div>';
								$posts[$i] .= '<div id="excerpt">'.get_the_excerpt().'</div>';
								$posts[$i] .= '<img src="'.THEME_URL.'/img/play.png" alt="play_v" />';
							$posts[$i] .= '</div>';
						$posts[$i] .= '</div>';
					$posts[$i] .= '</div>';
				elseif($i == 2 || $i == 3):
					$posts[$i] .= '<div id="wrap_img_c">';
						$posts[$i] .= get_the_post_thumbnail(get_the_ID(), $class , array( 'title' => get_the_title() ));
						$posts[$i] .= '<div id="wrap_center">';
							$posts[$i] .= '<div class="vcenter">';
								$posts[$i] .= '<img src="'.THEME_URL.'/img/play.png" alt="play_v" />';
							$posts[$i] .= '</div>';
						$posts[$i] .= '</div>';	
					$posts[$i] .= '</div>';	
					$posts[$i] .= '<div id="video_text">';
							$posts[$i] .= '<div id="title">'.get_the_title().'</div>';
							$posts[$i] .= '<div id="excerpt">'.get_the_excerpt().'</div>';
							$posts[$i] .= '<div id="btn_vm">+Ver más</div>';
					$posts[$i] .= '</div>';
				elseif($i == 4 || $i == 5 || $i == 6 || $i == 7 || $i == 8 || $i == 9 || $i == 10):
					$posts[$i] .= '<div id="wrap_img_c">';
						$posts[$i] .= get_the_post_thumbnail(get_the_ID(), $class , array( 'title' => get_the_title() ));
						$posts[$i] .= '<div id="wrap_center">';
							$posts[$i] .= '<div class="vcenter">';
								$posts[$i] .= '<img src="'.THEME_URL.'/img/play.png" alt="play_v" />';
							$posts[$i] .= '</div>';
						$posts[$i] .= '</div>';	
					$posts[$i] .= '</div>';	
					$posts[$i] .= '<div id="video_text">';
							$posts[$i] .= '<div id="title">'.get_the_title().'</div>';
							$posts[$i] .= '<div id="btn_vm">+Ver más</div>';
					$posts[$i] .= '</div>';
				endif;
			$posts[$i] .= '</a>';
		$posts[$i] .= '</article>';
		$exc[] = get_the_ID();
	endwhile;
	wp_reset_query();
else:
	$output .= '<div id="nps">No hay Posts</div>';
endif;
?>
	<div id="zone_video_big">
		<?php echo $posts[1] ?>
	</div>
</div>
<div id="page_wrap" class="limit">
	<div id="par_sim">
		<?php echo $posts[2].$posts[3] ?>
	</div>
	<div id="tres_c">
		<?php echo $posts[4].$posts[5].$posts[6] ?>
	</div>
	<div id="cuatro_c">
		<?php echo $posts[7].$posts[8].$posts[9].$posts[10] ?>
	</div>
	<div id="right_c">
		<?php the_widget('BannerV_Widget') ?>
	</div>
</div>