<?php $idcat = get_query_var('cat');?>
<div id="page_wrap" class="limit_mo normal"> 
	<h1><?php echo get_cat_name($idcat) ?></h1>
	<div id="zona_1_no">
		<?php
		$output = '';
		$args = array(
			'posts_per_page' => 2,
			'post_type' => array('post'),
			'cat' => $idcat
		);
		$query = new WP_Query( $args ); $i=0;
		while($query->have_posts()): $query->the_post(); $i++;
			$output .= '<article class="no_uno">';
				$output .= '<a href="'.get_permalink().'">';
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
					$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
					$output .= '<div id="text_s">';
						$output .= '<div id="wrap_in">';
							$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
							$output .= '<div id="excerpt" class="rn">'.get_the_excerpt().'</div>';
							$output .= '<div class="btn_lm">ver más</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</a>';
			$output .= '</article>';
			$exc[] .= get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
	</div>
	<div id="zona_ad_no">
		<?php dynamic_sidebar('mobile_normal'); ?>
	</div>
	<div id="zona_2_no">
		<?php
		$output = '';
		$args = array(
			'posts_per_page' => 2,
			'post_type' => array('post'),
			'cat' => $idcat,
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args ); $i=0;
		while($query->have_posts()): $query->the_post(); $i++;
			$output .= '<article class="no_dos">';
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
	<div id="zona_ad_no2">
		<?php dynamic_sidebar('mobile_normal2'); ?>
	</div>
	<div id="zona_3_no">
		<?php
		$output = ''; $i = 0;
		$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
		$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
		$args = array(
				'posts_per_page' => 3,
				'type'=> 'list',
				'paged' => $paged1,
				'post_type' => array('post'),
				'cat' => $idcat,
				'post__not_in' => $exc
		);
		$query = new WP_Query( $args ); $i=0;
		if($query->have_posts()):
			while($query->have_posts()): $query->the_post(); $i++;
				$output .= '<article class="infipost no_dos">';
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
				$exc[] = get_the_ID();
			endwhile;
			wp_reset_query();
		else:
			$output .= '<div id="nps">No hay Posts</div>';
		endif;
		?>   	
		<div id="content_in" class="infinito">
			<?php echo $output ?>
		</div>
		<?php
		if($query->found_posts > 3):
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
				echo '<div class="click_load">ver más</div><div class="navinf">'.paginate_links( $pag_args ).'</div>';
			echo '</div>';
		endif;
		?>
	</div>
</div>