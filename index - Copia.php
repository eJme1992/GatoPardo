<?php get_header() ?>
<div id="page_wrap" class="no_limit">
	<div id="zona_1">
	<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 1,
			'type'=> 'list',
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$pid = get_the_ID();
			$cats = get_cat($pid);
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cat_uno' );
			$output .= '<article>';
				$output .= '<a href="'.get_permalink().'">';
					$output .= '<div id="wrap_img" style="background-image:url('.$image[0].')">';
						$output .= '<div id="text_s" class="vcenter">';
							$output .= '<div id="wrap_in">';
								$output .= '<div id="cat">'.get_cat_name($cats).'</div>';
								$output .= '<div id="title">'.get_the_title().'</div>';
								$output .= '<div id="excerpt">'.get_the_excerpt().'</div>';
								$output .= '<div id="btn_lm">Leer más</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</a>';
			$output .= '</article>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
        echo $output
		?>
    </div>
    <div id="zona_2">
		<div id="wrapper_bu" class="conclave">
			<?php
			$output = '';
			$args1 = array(
				'posts_per_page' => 4,
				'type'=> 'list',
				'category_name' => 'slider',
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
								$output .= '<div id="title">'.get_the_title().'</div>';
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
	<div id="zona_3" class="ad_google">
		<?php dynamic_sidebar('mobile_index_uno'); ?>
	</div>
</div>
<div id="page_wrap" class="limit_mo">
	<div id="zona_4">
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 1,
			'type'=> 'list',
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$output .= '<article>';
				$output .= '<h3>Experiencias</h3>';
				$output .= '<a href="'.get_permalink().'">';
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
					$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')"></div>';
				$output .= '</a>';
				$output .= '<a href="'.get_permalink().'">';
						$output .= '<div id="excerpt">'.get_the_excerpt().'</div>';
				$output .= '</a>';
				$output .= '<a href="'.BASE_URL.'/category/experiencias/">';
					$output .= '<div id="btn_catin">Más experiencias</div>';
				$output .= '</a>';
			$output .= '</article>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
	</div>
	<div id="zona_5">
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 1,
			'type'=> 'list',
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args1 ); $i=0;
		$output .= '<h3><span>Editors Pick</span></h3>';
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$class = 'editor_dos';
			$output .= '<article class="'.$class.'">';
				$output .= '<a href="'.get_permalink().'">';
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
					$output .= '<div id="wrap_img" style="background-image:url('.$image[0].')">';
						$output .= '<div id="wrap_in">';
							$output .= '<div id="text_s" class="vcenter">';
								$output .= '<div id="title">'.get_the_title().'</div>';
								$output .= '<div id="btn_vm">ver más</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</a>';
			$output .= '</article>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
	</div>
</div>
<div id="page_wrap" class="no_limit">
	<div id="zona_6" class="google_ads">
		<?php dynamic_sidebar('mobile_index_native'); ?>
	</div>
	<div id="zona_7">
		<div id="titu_tre">Trends</div>
		<div class="trends_s">
			<div id="wrapper_bu" class="conclave">
				<?php
				$output = '';
				$args1 = array(
					'posts_per_page' => 4,
					'type'=> 'list',
					'category_name' => 'slider',
				);
				$query = new WP_Query( $args1 ); $i=-1;
				while ( $query->have_posts() ) : $query->the_post(); $i++;
					$pid = get_the_ID();
					$output .= '<div class="tresds" id="bu'.($i+1).'">';
						$output .= '<article>';
							$output .= '<a href="'.get_permalink().'">';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
								$output .= '<div id="wrap_img" style="background-image:url('.$image[0].')"></div>';
								//$output .= get_the_post_thumbnail($pid, 'mobile_grl' , array( 'title' => get_the_title() ));
								$output .= '<div id="text_s">';
									$output .= '<div id="title">'.get_the_title().'</div>';
								$output .= '</div>';
								$output .= '<div id="btn_vm">ver más</div>';
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
	</div>
	<div id="zona_8">
		<h4><span>Videos</span></h4>
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 1,
			'type'=> 'list',
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$pid = get_the_ID();
			$output .= '<div id="page_wrap" class="limit">';
				$output .= '<article class="video_otro">';
					$output .= '<a href="'.get_permalink().'">';
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
						$output .= '<div id="wrap_im" style="background-image:url('.$image[0].')">';
							//$output .= get_the_post_thumbnail($pid, 'mobile_grl' , array( 'title' => get_the_title() ));
							$output .= '<div id="wrap_in">';
								$output .= '<div id="text_s" class="vcenter">';
									$output .= '<img src="'.THEME_URL.'/img/play.png" />';
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
						$output .= '<div id="title">'.get_the_title().'</div>';
						$output .= '<div id="excerpt">'.get_the_excerpt().'</div>';
						$output .= '<div id="btn_vm">+ver más</div>';
					$output .= '</a>';
				$output .= '</article>';
			$output .= '</div>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
	</div>
</div>
<div id="page_wrap" class="limit limit_mo">
	<h3 id="fotot_home">Fotogalerías</h3>
	<div id="zone_6">
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 1,
			'type'=> 'list',
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$output .= '<article>';
				$output .= '<a href="'.get_permalink().'">';
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
					$output .= '<div id="wrap_img" style="background-image:url('.$image[0].')"></div>';
					//$output .= get_the_post_thumbnail($pid, 'mobile_grl' , array( 'title' => get_the_title() ));
					$output .= '<div id="text_s">';
						$output .= '<div id="title">'.get_the_title().'</div>';
						$output .= '<div id="btn_vm">+Ver más</div>';
					$output .= '</div>';
				$output .= '</a>';
			$output .= '</article>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
	</div>
</div>
<div id="page_wrap" class="inst limit_mo">
	<h3>Instagram</h3>
</div>
<div id="page_wrap" class="limit">
	<div id="zone_6_5">
		<div id="wrap_inst">
			<div id="wrapper_bu" class="conclave">
				<?php echo get_intagram_pieces(); ?>
			</div>
			<div id="nav_3">
				<div class="next_3d"></div>
				<div class="prev_3d"></div>
			</div>
		</div>
	</div>
</div>
<div id="page_wrap" class="limit limit_mo">
	<div id="zone_7">
		<div id="atel">
			<img src="<?php echo THEME_URL ?>/img/atelier.png" />
		</div>
		<?php
		$output = '';
		$args1 = array(
			'posts_per_page' => 1,
			'type'=> 'list',
			'post__not_in' => $exc
		);
		$query = new WP_Query( $args1 ); $i=0;
		while ( $query->have_posts() ) : $query->the_post(); $i++;
			$pid = get_the_ID();
			$output .= '<div id="atel_s">';
				$output .= '<article class="atel_dos">';
					$output .= '<a href="'.get_permalink().'">';
				 		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
				 		$output .= '<div id="wrap_img" style="background-image:url('.$image[0].')"></div>';
						$output .= '<div id="text_s">';
							$output .= '<div id="title">'.get_the_title().'</div>';
							$output .= '<div id="excerpt">'.get_the_excerpt().'</div>';
						$output .= '</div>';
						$output .= '<div id="btn_vm">Leer más</div>';
					$output .= '</a>';
				$output .= '</article>';
			$output .= '</div>';
			$exc[] = get_the_ID();
		endwhile;
		wp_reset_query();
		echo $output;
		?>
	</div>
</div>
<div id="page_wrap" class="no_limit">
	<div style="float:left; width:100%;margin-bottom:30px">
		<?php dynamic_sidebar('mobile_index_dos'); ?>
	</div>
</div>
<div id="page_wrap" class="limit limit_mo">
	<div id="zone_8">
		<div id="posts_inf" class="infinito">
			<?php
			$output = ''; $i = 0;
			$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
			$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
			$args = array(
					'paged' => $paged1,
					'posts_per_page' => 2,
					'type'=> 'list',
					'post__not_in' => $exc
			);
			$query = new WP_Query( $args ); $i=0;
			if($query->have_posts()):
				while($query->have_posts()): $query->the_post(); $i++;
					$output .= '<article class="infipost '.$class.'">';
						$output .= '<a href="'.get_permalink().'">';
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
							$output .= '<div id="wrap_img" style="background-image:url('.$image[0].')"></div>';
							$output .= '<div id="text_s">';
								$output .= '<div id="title">'.get_the_title().'</div>';
								$output .= '<div id="excerpt">'.get_the_excerpt().'</div>';
								$output .= '<div id="btn_vm">+Ver más</div>';
							$output .= '</div>';
						$output .= '</a>';
					$output .= '</article>';
				endwhile;
				wp_reset_query();
			else:
				$output .= '<div id="nps">No hay Posts</div>';
			endif;
			echo $output;
			?>
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
				echo '<div class="click_load">Cargar m&aacute;s</div><div class="navinf">'.paginate_links( $pag_args ).'</div>';
			echo '</div>';
		endif;
		?>
	</div>
</div>
<?php get_footer() ?>