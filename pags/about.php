<?php
/*
Template Name: About
*/
?>
<?php get_header() ?>
<?php while (have_posts()) : the_post(); ?>
<?php
$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
$conocenos = get_field('texto_conocenos');
$numeros = get_field('numeros');
?>
<div id="page_wrap" class="limit_mo">
	<div id="zone_about">
		<div id="left">
			<?php the_title() ?>
		</div>
		<div id="right">
			<div id="mis">Misión</div>
			<?php the_content() ?>
		</div>
	</div>
	<div id="zone_conoce">
		<div id="up">
			Conócenos
		</div>
		<div id="down">
			<div id="left">
				<img src="<?php echo $image[0] ?>" />
			</div>
			<div id="right">
				<?php echo apply_filters('the_content', $conocenos); ?>
			</div>
		</div>
	</div>
</div>
<div id="page_wrap" class="no_limit">
	<div id="zone_numeros">
		<div id="wrap_n">
			<div id="titulo_n">
				Travesías en <span>números</span>
			</div>
			<div id="cont_n">
				<?php echo apply_filters('the_content', $numeros); ?>
			</div>
		</div>
	</div>
</div>
<?php endwhile; wp_reset_query(); ?>
<?php get_footer() ?>