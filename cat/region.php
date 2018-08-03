<?php get_header(); $cat = get_query_var('cat'); $name = get_cat_name($cat)?>
<div id="page_wrap" class="limit">
	<div id="zone_guias">
		<?php
			$term_id = $cat;
			$term = get_term( $term_id,'category');
			$in_home_des = get_field('in_home_destinos', $term);
		?>
		<?php if(!$in_home_des): ?>
		<h1 class="tb">Destinos: <?php echo $name; echo isset($_GET['tm']) ? ' - '.get_cat_name($_GET['tm']) : '' ?></h1>
		<?php
			$lavel = count(get_ancestors($cat, 'category')) ;
			$anc = get_ancestors($cat, 'category') ;;
			$pri = array_pop($anc);
			$seg = array_pop($anc);
			$ter = array_pop($anc);

			if($lavel == 3):
				$uno = get_cat_name($seg);
				$uno_id = $seg;
				$dos = get_cat_name($ter);
				$dos_id = $ter;
				$tres = get_cat_name($cat);
				$tres_id = $cat;
			elseif($lavel == 2):
				$uno = get_cat_name($seg);
				$uno_id = $seg;
				$dos = get_cat_name($cat);
				$dos_id = $cat;
			elseif($lavel == 1):
				$uno = get_cat_name($cat);
				$uno_id = $cat;
			endif;
		?>
		<div id="ad_search">
			<div id="select_reg" class="sel_des">
				<div class="imd-select">
					<a class="imd-selector"><?php if(isset($uno)): echo $uno; else: echo 'Región'; endif;?></a>
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
					<?php if(isset($dos)): echo '<a class="imd-selector">'.$dos.'</a>'; else: echo '<a class="imd-selector">País / Estado</a>'; endif;?></a>
					<ul class="imd-select-list">
						<?php
							$args = array('parent'=>$uno_id,'orderby'=>'name','order'=>'ASC','hide_empty'=>0,'hierarchical'=>1,'taxonomy'=>'category',); 
							$region = get_categories($args);
							foreach($region as $r):
								echo '<li data-val="'.$r->term_id.'"><a href="'.get_category_link($r->term_id).'">'.$r->name.'</a></li>';
							endforeach;
						?>
					</ul>
				</div>
			</div>
			<div id="select_ciudad" class="sel_des">
				<div class="imd-select" id="filtro">
					<?php
						if(isset($tres)): 
							echo '<a class="imd-selector">'.$tres.'</a>'; 
						elseif(isset($dos)): 
							echo '<a class="imd-selector">Ciudad</a>';
						else:
							echo '<a class="disable imd-selector">Ciudad</a>';
						endif;?></a>
					<ul class="imd-select-list">
						<?php
						if(isset($dos)):
							$args = array('parent'=>$dos_id,'orderby'=>'name','order'=>'ASC','hide_empty'=>0,'hierarchical'=>1,'taxonomy'=>'category',); 
							$region = get_categories($args);
							foreach($region as $r):
								echo '<li data-val="'.$r->term_id.'"><a href="'.get_category_link($r->term_id).'">'.$r->name.'</a></li>';
							endforeach;
						endif;
						?>
					</ul>
				</div>
			</div>
			<div id="select_tema" class="sel_des">
				<div class="imd-select" id="filtro">
					<?php
					if(isset($tres) && isset($_GET['tm'])):
						echo '<a class="imd-selector">'.get_cat_name($_GET['tm']).'</a>';
					elseif(isset($tres)):
					   echo '<a class="imd-selector">Tema</a>';
					else:
						echo '<a class="disable imd-selector">Tema</a>';
					endif;
					?>
					<ul class="imd-select-list">
						<?php
						if(isset($tres)):
							$args = array('parent'=>'105','orderby'=>'name','order'=>'ASC','hide_empty'=>0,'hierarchical'=>1,'taxonomy'=>'category',); 
							$region = get_categories($args);
							foreach($region as $r):
								echo '<li data-val="'.$r->term_id.'"><a href="'.get_category_link($cat).'/?tm='.$r->term_id.'">'.$r->name.'</a></li>';
							endforeach;
						endif;
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php
		$output = ''; $i = 0;
		$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
		$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
		$args = array(
			'posts_per_page' => 12,
			'post_type' => array('post'),
			'paged' => $paged1
		);
		if(isset($_GET['tm'])):
			$args['category__and'] = array($cat,$_GET['tm']);
		else:
			$args['cat'] = $cat;
		endif;
		$query = new WP_Query( $args ); $i=0;
		if($query->have_posts()):
			while($query->have_posts()): $query->the_post(); $i++;
				$class = 'editor_dos';
				$output .= '<article class="post_'.$i.' infipost '.$class.'">';
					$output .= '<a href="'.get_permalink().'">';
						$output .= '<div id="wrap_img">';
							$output .= get_the_post_thumbnail(get_the_ID(), $class , array( 'title' => get_the_title() ));
						$output .= '</div>';
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
		<?php
		if($in_home_des):
			$image =  get_field('image', $term);
			$image = $image['sizes']['slider'];
		?>
		<div id="reg_esp">
			<div id="big_reg">
				<a href="<?php echo get_category_link($cat) ?>">
					<div id="wrap_im_reg" style="background-image: url(<?php echo $image ?>)"></div>
					<div id="titu_reg" class="vcenter"><?php echo get_cat_name($cat) ?></div>
				</a>
			</div>
			<div id="bar_tm">
				<?php
				$args = array('parent'=>'105','orderby'=>'name','order'=>'ASC','hide_empty'=>0,'hierarchical'=>1,'taxonomy'=>'category',); 
				$region = get_categories($args);
				foreach($region as $r):
					if(isset($_GET['tm']) && $_GET['tm'] == $r->term_id):
						echo '<span class="sel_tm" data-val="'.$r->term_id.'"><a href="'.get_category_link($cat).'/?tm='.$r->term_id.'">'.$r->name.'</a></span>';
					 else:
					 	echo '<span data-val="'.$r->term_id.'"><a href="'.get_category_link($cat).'/?tm='.$r->term_id.'">'.$r->name.'</a></span>';
					 endif;
				endforeach;
				?>
			</div>
		</div>
		<?php endif; ?>
		<div id="posts_inf" class="infinito">
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
				echo '<div class="click_load">Ver m&aacute;s</div><div class="navinf">'.paginate_links( $pag_args ).'</div>';
			echo '</div>';
		endif;
		?>
	</div>
</div>
<?php get_footer() ?>