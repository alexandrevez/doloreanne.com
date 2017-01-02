<?php global $option_setting;
if ( isset($option_setting['parallax-enable-on-home']) ): 
	if ( ($option_setting['parallax-enable-on-home']) && (is_home() || is_front_page()) ) :?>
<div id="parallax" data-stellar-background-ratio="0.5">
		<div class="parallax-zone">
			<div class="parallax-item item1" data-stellar-background-ratio="0.5">
				<?php if ($option_setting['parallax-title']) : ?>
					<h1><span><?php echo esc_html($option_setting['parallax-title']) ?></span></h1>
				<?php endif;
				if ($option_setting['parallax-content']) : ?>	
					<div class="parallax-content"><?php echo esc_html( $option_setting['parallax-content'] ) ?></div><?php 
				endif;
				if ($option_setting['parallax-button']) : ?>
				<div class="parallax-button"><a href="<?php echo esc_url( $option_setting['parallax-url']); ?>"><?php echo esc_html( $option_setting['parallax-button'] ) ?></a></div>
				<?php endif; ?>
			</div>	
		</div>	
</div>	
<?php endif;
else : ?>
<div id="parallax" data-stellar-background-ratio="0.5">
		<div class="parallax-zone">
			<div class="parallax-item item1" data-stellar-background-ratio="0.5">
					<h1><span><?php _e('Parallax Header','paraxe'); ?></span></h1>
					<div class="parallax-content"><?php _e('This is a Parallax Header. Scroll the Site to see the Effect. It Can be easily Configured from Theme Options.','paraxe'); ?></div>
				<div class="parallax-button"><a href="#"><?php _e('Find Out More','paraxe'); ?></a></div>
			</div>	
		</div>	
</div>
<?php endif; ?>