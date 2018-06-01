<form method="post" enctype="text/plain" class="vw-og-form">
	<?php // wp_nonce_field('vw_og_nonce'); ?>
	<div class="">
		<label for="">og:locale</label>
		<select name="vw_og_locale">
			<option value="en_AU">en_AU</option>
			<option value="en_CA">en_CA</option>
			<option value="en_GB">en_GB</option>
			<option value="en_US">en_US</option>
			<option value="es_AR">es_AR</option>
			<option value="es_ES">es_ES</option>
			<option value="es_MX">es_MX</option>
			<option value="fr_BE">fr_BE</option>
			<option value="fr_CA">fr_CA</option>
			<option value="fr_FR">fr_FR</option>
			<option value="pt_BR" selected="selected">pt_BR</option>
			<option value="pt_PT">pt_PT</option>
		</select>
	</div>
	<div class="">
		<label for="">og:url</label>
		<input type="text" name="vw_og_url" value="<?php echo get_option('vw_og_url', get_home_url('/')); ?>" />
	</div>
	<div class="">
		<label for="">og:title</label>
		<input type="text" name="vw_og_title" value="<?php echo get_option('vw_og_title', get_bloginfo('name')); ?>" />
	</div>
	<div class="">
		<label for="">og:description</label>
		<input type="text" name="vw_og_description" value="<?php echo get_option('vw_og_description', get_bloginfo('description')); ?>" />
	</div>
	<div class="">
		<label for="">og:type</label>
		<input type="text" name="vw_og_type" value="<?php echo get_option('vw_og_type', 'website'); ?>" />
	</div>
	<div class="">
		<label for="">og:image</label>
		<input type="text" name="vw_og_image" value="<?php echo get_option('vw_og_image'); ?>" />
	</div>
	<div class="">
		<label for="">og:site_name</label>
		<input type="text" name="vw_og_site_name" value="<?php echo get_option('vw_og_title', get_bloginfo('name')); ?>" />
	</div>
	<div class="">
		<label for="">fb:admins</label>
		<input type="text" name="vw_og_fb_admins" value="<?php echo get_option('vw_og_fb_admins'); ?>" />
	</div>
	<div class="">
		<label for="">fb:app_id</label>
		<input type="text" name="vw_og_fb_app_id" value="<?php echo get_option('vw_og_fb_app_id'); ?>" />
	</div>
	<div class="">
		<label for="">twitter:account_id</label>
		<input type="text" name="vw_og_twitter_account_id" value="<?php echo get_option('vw_og_twitter_account_id'); ?>" />
	</div>
	<div class="">
		<label for="">twitter:url</label>
		<input type="text" name="vw_og_twitter_url" value="<?php echo get_option('vw_og_twitter_url', get_home_url('/')); ?>" />
	</div>
	<div class="">
		<label for="">twitter:card</label>
		<input type="text" name="vw_og_twitter_card" value="<?php echo get_option('vw_og_twitter_card', 'summary'); ?>" />
	</div>
	<div class="">
		<label for="">twitter:creator</label>
		<input type="text" name="vw_og_twitter_creator" value="<?php echo get_option('vw_og_twitter_creator', '@https://twitter.com/henriqueamattos'); ?>" />
	</div>
	<div class="">
		<label for="">twitter:site</label>
		<input type="text" name="vw_og_twitter_site" value="<?php echo get_option('vw_og_twitter_site', '@henriqueamattos'); ?>" />
	</div>
	<div class="">
		<?php submit_button(); ?>
	</div>
</form>