<?php
/*
Template Name: Guias
*/
?>
<?php get_header() ?>
<div id="page_wrap" class="limit">
	<div id="zone_guias">
		<h1 class="tb">Destinos</h1>
		<?php
			$destinos = array();
			$i = 0;
			$args = array(
				'child_of'=>'104',
                'taxonomy' => 'category',
                'hide_empty' => 0,
               );
            $c = get_categories($args);
            foreach($c as $cat): $i++;
				$term_id = $cat->term_id;
				$term = get_term( $term_id,'category');
				$in_home_des = get_field('in_home_destinos', $term);
				if($in_home_des):
					$image =  get_field('image', $term);
					$image = $image['sizes']['trends'];
					$destinos[$i]['image'] =$image;
					$destinos[$i]['nombre'] = $cat->cat_name;
					$destinos[$i]['url'] = get_category_link($term_id);
				endif;
            endforeach;
		?>
		<div id="ad_search">
			<div id="select_reg" class="sel_des">
				<div class="imd-select">
					<a class="imd-selector">Región</a>
					<ul class="imd-select-list">
						<?php
						$args = array('parent'=>'104','orderby'=>'name','order'=>'ASC','hide_empty'=>0,'hierarchical'=>1,'taxonomy'=>'category',); 
						$region = get_categories($args);
						foreach($region as $r):
							echo '<li data-val="'.$r->term_id.'"><a href="'.get_category_link($r->term_id).'">'.$r->name.'</a></li>';
						endforeach;
						?>
					</ul>
				</div>
			</div>
			<div id="select_pe" class="sel_des">
				<div class="imd-select" id="filtro">
					<a class="disable imd-selector">País / Estado</a>
					
				</div>
			</div>
			<div id="select_ciudad" class="sel_des">
				<div class="imd-select" id="filtro">
					<a class="disable imd-selector">Ciudad</a>
				</div>
			</div>
			<div id="select_tema" class="sel_des">
				<div class="imd-select" id="filtro">
					<a class="disable imd-selector">Tema</a>
				</div>
			</div>
			<!--<ul id="search_id">
				<input type="text" placeholder="Búsqueda" />
			</ul>-->
		</div>
		<?php
		/*$output = ''; $i = 0;
		$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
		$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
		$args = array(
			'posts_per_page' => 12,
			'post_type' => array('post'),
			'paged' => $paged1
		);
		$query = new WP_Query( $args ); $i=0;
		if($query->have_posts()):
			while($query->have_posts()): $query->the_post(); $i++;*/
		$output = ''; $i = 0;
		foreach($destinos as $destino): $i++;
			$class = 'editor_dos';
			$output .= '<article class="post_'.$i.' infipost '.$class.'">';
				$output .= '<a href="'.$destino['url'].'">';
					$output .= '<div id="wrap_img" style="background-image:url('.$destino['image'].')"></div>';
					$output .= '<div id="text_s" class="vcenter">';
						$output .= '<div id="title" class="tn">'.$destino['nombre'].'</div>';
					$output .= '</div>';
				$output .= '</a>';
			$output .= '</article>';
		endforeach;
			
		?>   	
		<div id="posts_inf" class="infinito">
			<?php echo $output ?>
		</div>
		<?php
		/*if($query->found_posts > 5):
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
		endif;*/
		?>
	</div>
</div>
<?php get_footer() ?>