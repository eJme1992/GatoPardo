<?php $idcat = get_query_var('cat');?>
<div id="page_wrap" class="no_limit foto">
	<div id="zona_1_fo">
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 1,
			'type'=> 'list',
			'cat' => $idcat
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$output .= '<article>';
				$output .= '<a href="'.get_permalink().'">';
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
					$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
					$output .= '<div id="text_s">';
						$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
						$output .= '<div class="btn_lm">ver más</div>';
					$output .= '</div>';
				$output .= '</a>';
			$output .= '</article>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
	</div>
	<div id="zona_2_fo">
		<div id="wrapper_bu" class="conclave">
			<?php
			$output = '';
			$args1 = array(
				'posts_per_page' => 4,
				'type'=> 'list',
				'cat' => $idcat,
				'post__not_in' => $exc
			);
			$query = new WP_Query( $args1 ); $i=-1;
			while ( $query->have_posts() ) : $query->the_post(); $i++;
				$pid = get_the_ID();
				$output .= '<div class="tresds" id="bu'.($i+1).'">';
					$output .= '<article>';
						$output .= '<a href="'.get_permalink().'">';
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
							$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
							$output .= '<div id="wrap_in">';
								$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
								$output .= '<div id="btn_lm">ver más</div>';
							$output .= '</div>';
						$output .= '</a>';
					$output .= '</article>';
				$output .= '</div>';
				$exc[] = get_the_ID();
			endwhile;
			wp_reset_query();
			echo $output;
			?>
		</div>
		<div id="nav_3">
			<div class="next_3d"></div>
			<div class="prev_3d"></div>
		</div>
	</div>
	<div id="zone_ad_fo" class="google_ads">
		<?php dynamic_sidebar('mobile_foto'); ?>
	</div>
	<div id="zone_3_fo">
		<?php
		$output = ''; $i = 0;
		$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
		$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
		$args = array(
				'posts_per_page' => 2,
				'type'=> 'list',
				'paged' => $paged1,
				'cat' => $idcat,
				'post__not_in' => $exc
		);
		$query = new WP_Query( $args ); $i=0;
		if($query->have_posts()):
			while($query->have_posts()): $query->the_post(); $i++;
				if($i == 1):
					$class = 'foto_uno_m';
					$txt = 'ver más';
				else:
					$class = 'foto_dos_m';
					$txt = 'ver más';
				endif;
				$output .= '<article class="infipost '.$class.'">';
					$output .= '<a href="'.get_permalink().'">';
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
						$output .= '<div id="text_s">';
							$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
							$output .= '<div class="btn_lm">'.$txt.'</div>';
						$output .= '</div>';
					$output .= '</a>';
				$output .= '</article>';
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
		if($query->found_posts > 5):
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