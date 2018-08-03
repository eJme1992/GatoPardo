<div id="page_wrap" class="no_limit atelier">
	<div id="image_big">
		<?php
		$output = '<article>';
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'mobile_grl' );
			$output .= '<div id="wrap_img" style="background-image:url('.$image[0].')"></div>';
				$output .= '<div id="wrap_in">';
					$output .= '<div id="date" class="rn">'.get_the_date("F j, Y").'</div>';
					$output .= '<div id="title" class="tn">'.get_the_title().'</div>';
					$output .= '<div id="meta" class="rn">';
						$output .= '<span>'.get_the_author().'</span>';
						$foto = get_field('credito_fotografia');
						if($foto != '')
						$output .= '<span>'.$foto.'</span>';
					$output .= '</div>';
			$output .= '</div>';
		$output .= '</article>';
		$marca = get_field('marca');
		echo $output;
		?>
	</div>
<div class="zona-ad-nueva">
<!-- /43823490/Gatopardo_M/BoxBanner2-H' -->
<div id='div-gpt-ad-1520016038342-0'>
	<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1520016038342-0');
							   googletag.pubads().refresh([boxbanner2]);
							   setInterval(function(){googletag.pubads().refresh([boxbanner2]);}, 20000); });
</script>
</div></div>
	<div id="content_at">
		<h1 id="line_middle"><span><?php echo $marca ?></span></h1>
		<div id="cont_in">
			<div id="cont_at">
				<?php the_content() ?>
			</div>
		</div>
		<div id="meta_in">
			<div id="meta_wrap">
				<?php dynamic_sidebar('mobile_post_atelier'); ?>
			</div>
		</div>
		<div id="tags_t">
			<?php echo get_tags_t(get_the_ID()); ?>
		</div>
		<?php if(get_field('link_pagina_marca') != ''): ?>
		<div id="link_m">
			<?php echo get_field('link_pagina_marca')?>
		</div>
		<?php endif; ?>
	</div>
</div>