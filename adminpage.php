<?php
	$options=array('opacity'=>get_option('wp_slimbox_overlayOpacity'),'overlayFadeDuration'=>get_option('wp_slimbox_overlayFadeDuration'),'resizeDuration'=>get_option('wp_slimbox_resizeDuration'),'resizeEasing'=>get_option('wp_slimbox_resizeEasing'),'initialWidth'=>get_option('wp_slimbox_initialWidth'),'initialHeight'=>get_option('wp_slimbox_initialHeight'),'imageFadeDuration'=>get_option('wp_slimbox_imageFadeDuration'),'captionAnimationDuration'=>get_option('wp_slimbox_captionAnimationDuration'),'counterText'=>get_option('wp_slimbox_counterText'),'closeKeys'=>get_option('wp_slimbox_closeKeys'),'previousKeys'=>get_option('wp_slimbox_previousKeys'),'nextKeys'=>get_option('wp_slimbox_nextKeys'));
	$easingArray = array(swing,easeInQuad,easeOutQuad,easeInOutQuad,easeInCubic,easeOutCubic,easeInOutCubic,easeInQuart,easeOutQuart,easeInOutQuart,easeInQuint,easeOutQuint,easeInOutQuint,easeInSine,easeOutSine,easeInOutSine,easeInExpo,easeOutExpo,easeInOutExpo,easeInCirc,easeOutCirc,easeInOutCirc,easeInElastic,easeOutElastic,easeInOutElastic,easeInBack,easeOutBack,easeInOutBack,easeInBounce,easeOutBounce,easeInOutBounce);
	$overlayOpacity = array(0,0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9,1);
	$msArray = array(1,100,200,300,400,500,600,700,800,900,1000);
?>
<div class="wrap">
	<form method="post" action="options.php" id="options"><?php	echo wp_nonce_field('update-options'); ?><h2>WP Slimbox2 Plugin</h2>
		<div style="clear:both;padding-top:5px;"></div>
		<h2>Settings</h2>
		<table class="widefat" cellspacing="0" id="inactive-plugins-table">
			<thead>
			<tr>
				<th scope="col" colspan="2">Setting</th>
				<th scope="col">Description</th>
			</tr>
			</thead>

			<tfoot>
			<tr>
				<th scope="col" colspan="3">Use the various options above to control some of the advanced settings of the plugin</th>
			</tr>
			</tfoot>

			<tbody class="plugins">

			<tr class='inactive'>
				<td class='name'>Autoload?</td>
				<th scope='row' class='check-column'>
					<input type="checkbox" name="wp_slimbox_autoload"<?php if (get_option('wp_slimbox_autoload') == 'on') echo ' checked="yes"';?> />
				</th>
				<td class='desc'><p>This option allows the user to automatically activate Slimbox on all links pointing to ".jpg" or ".png" or
				".gif". All image links contained in the same block or paragraph (having the same parent element) will automatically be grouped
				together in a gallery. If this isn't activated you will need to manually add 'rel="lightbox"' for individual images or
				'rel="lightbox-imagesetname"' for groups on all links you wish to use Slimbox.</p></td>
			</tr>
			<tr class='inactive'>
				<td class='name'>Loop?</td>
				<th scope='row' class='check-column'>
					<input type="checkbox" name="wp_slimbox_loop"<?php if (get_option('wp_slimbox_loop') == 'on') echo ' checked="yes"';?> />
				</th>
				<td class='desc'><p>This option allows the user to navigate between the first and last images of a Slimbox gallery, when there is more than one image to display.</p></td>
			</tr>
			<tr class='inactive'>
				<td class='name'>Overlay Opacity</td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_overlayOpacity">
					<?php
					foreach($overlayOpacity as $key=> $opacity) {
						if($options['opacity'] != $opacity) $selected = '';
						else $selected = ' selected';
						echo "<option value='$opacity'$selected>$opacity</option>\n";
					}
					?>
					</select>
				</th>
				<td class='desc'>
					<p>
						This option allows the user to adjust the opacity of the background overlay. 1 is opaque, 0 is completely transparent.
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'>Overlay Fade Duration</td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_overlayFadeDuration">
					<?php
					foreach($msArray as $key=> $ms) {
						if($options['overlayFadeDuration'] != $ms) $selected = '';
						else $selected = ' selected';
						echo "<option value='$ms'$selected>$ms</option>\n";
					}
					?>
					</select>
				</th>
				<td class='desc'>
					<p>
						This option allows the user to adjust the duration of the overlay fade-in and fade-out animations, in milliseconds. Set it to 1 to disable the overlay fade effects.
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'>Resize Duration</td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_resizeDuration">
					<?php
					foreach($msArray as $key=> $ms) {
						if($options['resizeDuration'] != $ms) $selected = '';
						else $selected = ' selected';
						echo "<option value='$ms'$selected>$ms</option>\n";
					}
					?>
					</select>
				</th>
				<td class='desc'>
					<p>
						This option allows the user to adjust the duration of the resize animation for width and height, in milliseconds. Set it to 1 to disable resize animations.
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'>Resize Easing</td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_resizeEasing">
					<?php
					foreach($easingArray as $key=> $easing) {
						if($options['resizeEasing'] != $easing) $selected = '';
						else $selected = ' selected';
						echo "<option value='$easing'$selected>$easing</option>\n";
					}
					?>
					</select>
				</th>
				<td class='desc'>
					<p>
						This option allows the user to adjust the name of the easing effect that you want to use for the resize animation (jQuery Easing Plugin required). Many easings 
						require a longer execution time to look good, so you should adjust the resizeDuration option above as well.
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'>Initial Width</td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_initialWidth" value="<?php echo get_option('wp_slimbox_initialWidth'); ?>" />
				</th>
				<td class='desc'>
					<p>
						This option allows the user to adjust the initial width of the box, in pixels.
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'>Initial Height</td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_initialHeight" value="<?php echo get_option('wp_slimbox_initialHeight'); ?>" />
				</th>
				<td class='desc'>
					<p>
						This option allows the user to adjust the initial height of the box, in pixels.
					</p>
			</tr>
			<tr class='inactive'>
				<td class='name'>Image Fade Duration</td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_imageFadeDuration">
					<?php
					foreach($msArray as $key=> $ms) {
						if($options['imageFadeDuration'] != $ms) $selected = '';
						else $selected = ' selected';
						echo "<option value='$ms'$selected>$ms</option>\n";
					}
					?>
					</select>
				</th>
				<td class='desc'>
					<p>
						This option allows the user to adjust the duration of the image fade-in animation, in milliseconds. Set it to 1 to disable this effect and make the image appear
						instantly.
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'>Caption Animation Duration</td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_captionAnimationDuration">
					<?php
					foreach($msArray as $key=> $ms) {
						if($options['captionAnimationDuration'] != $ms) $selected = '';
						else $selected = ' selected';
						echo "<option value='$ms'$selected>$ms</option>\n";
					}
					?>
					</select>
				</th>
				<td class='desc'>
					<p>
						This option allows the user to adjust the duration of the caption animation, in milliseconds. Set it to 1 to disable it and make the caption appear instantly.
					</p>
			</tr>
			<tr class='inactive'>
				<td class='name'>Counter Text</td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_counterText" value="<?php echo get_option('wp_slimbox_counterText'); ?>" />
				</th>
				<td class='desc'>
					<p>
						This option allows the user to customize, translate or disable the counter text which appears in the captions when multiple images are shown. Inside the text, {x}
						will be replaced by the current image index, and {y} will be replaced by the total number of images. Set it to false (boolean value, without quotes) or "" to disable
						the counter display. Default is "Image {x} of {y}".
					</p>
			</tr>
			<tr class='inactive'>
				<td class='name'>Close Keys</td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_closeKeys" value="<?php echo get_option('wp_slimbox_closeKeys'); ?>" />
				</th>
				<td class='desc'>
					<p>
						This option allows the user to specify an array of <a href="http://www.webonweboff.com/tips/js/event_key_codes.aspx" TARGET="_blank">key codes</a> of the keys to
						press to close Slimbox. Default is [27, 88, 67] which means Esc (27), "x" (88) and "c" (67).
					</p>
			</tr>
			<tr class='inactive'>
				<td class='name'>Previous Keys</td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_previousKeys" value="<?php echo get_option('wp_slimbox_previousKeys'); ?>" />
				</th>
				<td class='desc'>
					<p>
						This option allows the user to specify an array of <a href="http://www.webonweboff.com/tips/js/event_key_codes.aspx" TARGET="_blank">key codes</a> of the keys to
						press to navigate to the previous image. Default is [37, 80] which means Left arrow (37) and "p" (80).
					</p>
			</tr>
			<tr class='inactive'>
				<td class='name'>Next Keys</td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_nextKeys" value="<?php echo get_option('wp_slimbox_nextKeys'); ?>" />
				</th>
				<td class='desc'>
					<p>
						This option allows the user to specify an array of <a href="http://www.webonweboff.com/tips/js/event_key_codes.aspx" TARGET="_blank">key codes</a> of the keys to
						press to navigate to the next image. Default is [39, 78] which means Right arrow (39) and "n" (78).
					</p>
			</tr>
		</tbody>
		</table>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="wp_slimbox_autoload,wp_slimbox_loop,wp_slimbox_overlayOpacity,wp_slimbox_overlayFadeDuration,wp_slimbox_resizeDuration,wp_slimbox_resizeEasing,wp_slimbox_initialWidth,wp_slimbox_initialHeight,wp_slimbox_imageFadeDuration,wp_slimbox_captionAnimationDuration,wp_slimbox_counterText,wp_slimbox_closeKeys,wp_slimbox_previousKeys,wp_slimbox_nextKeys" />
		<div style="clear:both;padding-top:20px;"></div>
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
		<div style="clear:both;padding-top:20px;"></div>
	</form>
</div>
