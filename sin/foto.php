<?php
$credito = get_field('credito_fotografia');
?>
<div id="page_wrap" class="no_limit foto">
	<div id="zone_foto_in">
		<div id="wrap_tit_im">
			<h1><?php the_title() ?></h1>
			<div id="meta_im">
				<div id="fecha" class="rn"><?php echo get_the_date('F d, y') ?></div>
				<span class="rn"><?php the_author() ?></span>
				<?php
				if($credito != '')
					echo '<div id="cort" class="rn"><span id="cred_fot">'.$credito.'</span></div>';
				?>
			</div>
		</div>
		<div id="fotog_big">
			<?php echo get_field('fotogaleria') ?>
		</div>
	</div>
	<div id="zone_cont_img">
		<?php echo get_field('contenido_fotogaleria') ?>
	</div>
	<div id="tags_t">
		<?php echo get_tags_t(get_the_ID()); ?>
	</div>
	<div id="zone_ad_foto">
		<?php dynamic_sidebar('mobile_post_foto'); ?>
	</div>
	<div id="zone_related" class="foto">
		<h3 class="tn">Contenido Relacionado</h3>
		<?php echo get_related_posts(get_the_ID()) ?>
	</div>
</div>