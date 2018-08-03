<?php
$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'mobile_grl');
$video = get_field('embed_video');
$credito = get_field('credito_fotografia');
?>
<div id="page_wrap" class="no_limit video">
	<div id="video_int_left">
		<div id="up_vid" style="background: rgba(0,0,0,0.4) url('<?php echo $image[0] ?>') center no-repeat">
			<div id="vid_play" class="play_video" data-src="<?php echo $video ?>" style="background: url('<?php echo THEME_URL ?>/img/play.png') center no-repeat"></div>
		</div>
		<div id="down_vid">
			<h1 class="tn"><?php the_title() ?></h1>
			<div id="left_v">
				<div id="date_v" class="rn"><?php echo get_the_date('F j, y') ?></div>
				<div id="info_v" class="rn">
					<span><?php the_author() ?></span>
					<?php if($credito != ''): ?>
						<span><?php echo get_field('credito_fotografia') ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div id="video_int_right">
		<div id="cont_vi" class="rn"><?php the_content() ?></div>
	</div>
	<div id="tags_t">
		<?php echo get_tags_t(get_the_ID()); ?>
	</div>
	<div id="zone_ad_video">
		<?php dynamic_sidebar('mobile_post_video'); ?>
	</div>
	<div id="zone_related">
		<h3 class="tn">Contenido Relacionado</h3>
		<?php echo get_related_posts(get_the_ID()) ?>
	</div>
</div>