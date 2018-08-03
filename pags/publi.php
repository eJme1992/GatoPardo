<?php
/*
Template Name: Publi
*/
?>
<?php get_header() ?>
<?php
while (have_posts()) : the_post();
	$video_strart = get_field('video_start');
	$titular_p = get_field('titular_principio');
	$resum_p = get_field('extracto');
	$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'mobile_grl');
	$num_cat = get_field('categoria');
endwhile; wp_reset_query();
?>
<div id="page_wrap" class="no_limit">
	<div id="zona_1_micro">
		<?php if(false): ?>
		<div class="slider_p owl-carousel">
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 4,
			'type'=> 'list',
			'cat' => $num_cat,
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$pid = get_the_ID();
			$cats = get_cat($pid);
			$output .= '<a href="'.get_permalink().'">';
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
				$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')">';
					$output .= '<div id="wrap_in"></div>';
				$output .= '</div>';
			$output .= '</a>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output
		?>
		</div>
		<?php else: ?>
		<div id="zone_vid_b" style="background-image :url('<?php echo $image[0] ?>')">
			<div id="video_cont" class="play_video" data-src="<?php echo $video_strart; ?>">
				<div class="vcenter">
					<div id="titular"><?php echo $titular_p ?></div>
					<div id="extracto"><?php echo $resum_p ?></div>
					<img src="<?php echo THEME_URL ?>/img/play.png" alt="play_v" />
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div id="zona_2_micro">
		<?php
		$output = '';
		$args = array(
			'posts_per_page' => 1,
			'post_type' => array('post'),
			'cat' => $num_cat,
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args ); $i=0;
		while($query->have_posts()): $query->the_post(); $i++;
			$output .= '<article>';
				$output .= '<a href="'.get_permalink().'">';
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
					$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
					$output .= '<div id="text_s">';
						$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
						$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
						$output .= '<div class="btn_lm">ver más</div>';
					$output .= '</div>';
				$output .= '</a>';
			$output .= '</article>';
			$exc[] .= get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
	</div>
	<div id="zona_ad_micro" class="google_ads">
		<?php dynamic_sidebar('mobile_micrositio'); ?>
	</div>
	<div id="zona_micro_infi">
		<?php
		$output = ''; $i = 0;
		$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
		$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
		$args = array(
				'paged'          => $paged1,
				'posts_per_page' => 3,
				'type'=> 'list',
				'cat' => $num_cat,
				'post_type' => array('post'),
				'post__not_in' => $exc
		);
		$query = new WP_Query( $args ); $i=0;
		if($query->have_posts()):
			while($query->have_posts()): $query->the_post(); $i++;
				$output .= '<article class="infipost">';
					$output .= '<a href="'.get_permalink().'">';
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
						$output .= '<div id="text_s">';
							$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
							$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
							$output .= '<div class="btn_lm">ver más</div>';
						$output .= '</div>';
					$output .= '</a>';
				$output .= '</article>';
			endwhile;
			wp_reset_query();
			$output .= '<div id="zone_ad_micro2" class="google_ads">';
				$output .= get_dynamic_sidebar('mobile_micrositio2');
			$output .= '</div>';
		else:
			$output .= '<div id="nps">No hay Posts</div>';
		endif;
		?>   	
		<div id="content_i" class="infinito">
			<?php echo $output ?>
		</div>
		<?php
		if($query->found_posts >3):
			$pag_args = array(
				'format'  => '?paged1=%#%',
				'current' => $paged1,
				'total'   => $query->max_num_pages,
				'add_args' => array( 'paged2' => $paged2),
				'prev_next'    => true,
				'prev_text'    => __('&lt;'),
				'next_text'    => __('&gt;'),
			);
			echo '<div id="navinfi">';
				echo '<div class="click_load">Ver m&aacute;s</div><div class="navinf">'.paginate_links( $pag_args ).'</div>';
			echo '</div>';
		endif;
		?>
	</div>
</div>
<?php get_footer() ?>