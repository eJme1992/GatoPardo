<?php get_header() ?>
<?php while (have_posts()) : the_post(); ?>
<div id="page_wrap" class="limit_short">
	<div id="zone_contact">
		<h1>Newsletter</h1>
		<?php //the_content() ?>
<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
</style>
<div id="mc_embed_signup">

<form action="//travesiasmedia.us8.list-manage.com/subscribe/post?u=c8a3c958c3f17863128dcdd43&amp;id=73098289bf" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Suscríbete</h2>
<div class="indicates-required"><span class="asterisk">*</span> requerido</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">E-Mail  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group">
	<label for="mce-FNAME">Nombre </label>
	<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
</div>
<div class="mc-field-group">
	<label for="mce-LNAME">Apellidos </label>
	<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
</div>
<div class="mc-field-group input-group">
    <strong>Genero </strong>
    <ul><li><input type="radio" value="Hombre" name="MMERGE4" id="mce-MMERGE4-0"><label for="mce-MMERGE4-0">Hombre</label></li>
<li><input type="radio" value="Mujer" name="MMERGE4" id="mce-MMERGE4-1"><label for="mce-MMERGE4-1">Mujer</label></li>
</ul>
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_10564196e6b99987472e75f39_fab08fe1d3" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Enviar" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->
	</div>
</div>
<?php endwhile; wp_reset_query(); ?>
<?php get_footer() ?>