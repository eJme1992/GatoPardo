<?php get_header() ?>
<?php $s = get_search_query(); ?>
<div id="page_wrap" class="no-limit">
	<div id="zone_titu_s">
		Resultados para: <span><?php echo $s ?></span>
	</div>
</div>
<div id="page_wrap" class="limit">
	<div id="zone_search" class="intro">
        <?php
		$output = '';
		$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
		$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
		$args = array(
			'paged' => $paged1,
			's'=> $s,
			'type'=> 'list',
			'post_type' => array('post'),
			//'category_name' => 'slider'
		);
		$query = new WP_Query( $args ); $i=0;
		if($query->have_posts()):
			while($query->have_posts()): $query->the_post();
				$output .= '<article class="infipost user_list">';
					$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'mobile_grl');
					$output .= '<a href="'.get_permalink().'">';
						$output .= '<div id="left">';
							$output .= '<div id="wrap_im">';
								$output .= '<img src="'.$image[0].'" />';
							$output .= '</div>';
						$output .= '</div>';
						$output .= '<div id="right">';
							$output .= '<div id="date">'.get_the_date('j M Y').'</div>';
							$output .= '<div id="titu">'.get_the_title().'</div>';
							$output .= '<div id="resu">'.get_the_excerpt().'</div>';
						$output .= '</div>';
					$output .= '</a>';
				$output .= '</article>';
			endwhile;
			wp_reset_query();
		else:
			$output .= '<div id="nps">No hay Resultados</div>';
		endif;
		?>
        	 <div id="cont_in" class="list_posts infinito">
             	<?php echo $output ?>
            </div>
            <?php if($query->found_posts > 10):
				$pag_args = array(
					'format'  => '?paged1=%#%',
					'current' => $paged1,
					'total'   => $query->max_num_pages,
					'add_args' => array( 'paged2' => $paged2, 's' => $s ),
					'prev_next'    => true,
					'prev_text'    => __('&lt;'),
					'next_text'    => __('&gt;'),
				);		
			?>
				<div id="navinfi">
					<div class="click_load">Ver m&aacute;s</div><div class="navinf"><?php echo paginate_links( $pag_args ) ?></div>
				</div>
            <?php endif; ?>
    </div>
</div>
<div id="page_wrap" class="no_limit">
	<div id="zone_divider"></div>
</div>
<?php get_footer() ?>