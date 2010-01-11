<?php
	$easingArray = array(swing,easeInQuad,easeOutQuad,easeInOutQuad,easeInCubic,easeOutCubic,easeInOutCubic,easeInQuart,easeOutQuart,easeInOutQuart,easeInQuint,easeOutQuint,easeInOutQuint,easeInSine,easeOutSine,easeInOutSine,easeInExpo,easeOutExpo,easeInOutExpo,easeInCirc,easeOutCirc,easeInOutCirc,easeInElastic,easeOutElastic,easeInOutElastic,easeInBack,easeOutBack,easeInOutBack,easeInBounce,easeOutBounce,easeInOutBounce);
	$overlayOpacity = array(0,0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9,1);
	$msArray = array(1,100,200,300,400,500,600,700,800,900,1000);
	$options = new WPlize('wp_slimbox');
	//add donate link
	//add class selection for auto-select div
?>
<div class="wrap">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>?page=slimbox2options" id="options"><?php	echo wp_nonce_field('update-options','wp_slimbox_wpnonce'); ?><h2><?php _e('WP Slimbox2 Plugin', 'wp-slimbox2'); ?></h2>
<?php
	if(isset($_POST['action']) && wp_verify_nonce($_POST['wp_slimbox_wpnonce'], 'update-options')) {
		$options->update_option(
			array(
				'autoload'   => $_POST['wp_slimbox_autoload'],
				'loop' => $_POST['wp_slimbox_loop'],
				'overlayOpacity'   => $_POST['wp_slimbox_overlayOpacity'],
				'overlayColor' => $_POST['wp_slimbox_overlayColor'],
				'overlayFadeDuration'   => $_POST['wp_slimbox_overlayFadeDuration'],
				'resizeDuration' => $_POST['wp_slimbox_resizeDuration'],
				'resizeEasing'   => $_POST['wp_slimbox_resizeEasing'],
				'initialWidth' => $_POST['wp_slimbox_initialWidth'],
				'initialHeight'   => $_POST['wp_slimbox_initialHeight'],
				'imageFadeDuration' => $_POST['wp_slimbox_imageFadeDuration'],
				'captionAnimationDuration'   => $_POST['wp_slimbox_captionAnimationDuration'],
				'counterText' => $_POST['wp_slimbox_counterText'],
				'closeKeys'   => $_POST['wp_slimbox_closeKeys'],
				'previousKeys' => $_POST['wp_slimbox_previousKeys'],
				'nextKeys'   =>  $_POST['wp_slimbox_nextKeys'],
				'picasaweb' => $_POST['wp_slimbox_picasaweb'],
				'flickr'   => $_POST['wp_slimbox_flickr'],
				'maintenance' => $_POST['wp_slimbox_maintenance'],
				'cache'   => $_POST['wp_slimbox_cache']
			)
		);
		
		echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
	}
	
	function selectionGen(&$option,&$array) {
		foreach($array as $key=> $ms) {
			$selected = ($option != $ms)? '' : ' selected';
			echo "<option value='$ms'$selected>".(($ms=='1'&&$array[0]!='0')?'Disabled':$ms)."</option>\n";
		}
	}
?>
	<div style="clear:both;padding-top:5px;"></div>
		<h2><?php _e('Settings', 'wp-slimbox2'); ?></h2>
		<table class="widefat" cellspacing="0" id="inactive-plugins-table">
			<thead>
			<tr>
				<th scope="col" colspan="2"><?php _e('Setting', 'wp-slimbox2'); ?></th>
				<th scope="col"><?php _e('Description', 'wp-slimbox2'); ?></th>
			</tr>
			</thead>

			<tfoot>
			<tr>
				<th scope="col" colspan="3"><?php _e('Use the various options above to control some of the advanced settings of the plugin', 'wp-slimbox2'); ?></th>
			</tr>
			</tfoot>

			<tbody class="plugins">

			<tr class='inactive'>
				<td class='name'><?php _e('Autoload?', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="checkbox" name="wp_slimbox_autoload"<?php if ($options->get_option('autoload') == 'on') echo ' checked="yes"';?> />
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to automatically activate Slimbox on all links pointing to ".jpg" or ".png" or ".gif". All image links contained in the same block or paragraph (having the same parent element) will automatically be grouped together in a gallery. If this isn\'t activated you will need to manually add \'rel="lightbox"\' for individual images or \'rel="lightbox-imagesetname"\' for groups on all links you wish to use Slimbox.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Enable Picasaweb Integration?', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="checkbox" name="wp_slimbox_picasaweb"<?php if ($options->get_option('picasaweb') == 'on') echo ' checked="yes"';?> />
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to automatically add the Slimbox effect to Picasaweb links when provided an appropriate thumbnail (this is separate from the autoload script which only functions on image links).', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Enable Flickr Integration?', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="checkbox" name="wp_slimbox_flickr"<?php if ($options->get_option('flickr') == 'on') echo ' checked="yes"';?> />
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to automatically add the Slimbox effect to Flickr links when provided an appropriate thumbnail (this is separate from the autoload script which only functions on image links).', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Loop?', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="checkbox" name="wp_slimbox_loop"<?php if ($options->get_option('loop') == 'on') echo ' checked="yes"';?> />
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to navigate between the first and last images of a Slimbox gallery when there is more than one image to display.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Overlay Opacity', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_overlayOpacity">
					<?php selectionGen($options->get_option('overlayOpacity'),&$overlayOpacity); ?>
					</select>
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to adjust the opacity of the background overlay. 1 is completely opaque, 0 is completely transparent.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Overlay Color', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="text" id="wp_slimbox_overlayColor" name="wp_slimbox_overlayColor" value="<?php echo $options->get_option('overlayColor'); ?>" size="7" maxlength="7"/><div id="picker"></div>

				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to set the color of the overlay by selecting your hue from the circle and color gradient from the square. Alternatively you may manually enter a valid HTML color code. The color of the entry field will change to reflect your selected color. Default is #000000.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Overlay Fade Duration', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_overlayFadeDuration">
					<?php selectionGen($options->get_option('overlayFadeDuration'),$msArray); ?>
					</select>
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to adjust the duration of the overlay fade-in and fade-out animations, in milliseconds.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Resize Duration', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_resizeDuration">
					<?php selectionGen($options->get_option('resizeDuration'),$msArray); ?>
					</select>
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to adjust the duration of the resize animation for width and height, in milliseconds.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Resize Easing', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_resizeEasing">
					<?php selectionGen($options->get_option('resizeEasing'),$easingArray); ?>
					</select>
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to adjust the name of the easing effect that you want to use for the resize animation (jQuery Easing Plugin required). Many easings require a longer execution time to look good, so you should adjust the resizeDuration option above as well.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Initial Width', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_initialWidth" value="<?php echo $options->get_option('initialWidth'); ?>" />
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to adjust the initial width of the box, in pixels.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Initial Height', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_initialHeight" value="<?php echo $options->get_option('initialHeight'); ?>" />
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to adjust the initial height of the box, in pixels.', 'wp-slimbox2'); ?>
					</p>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Image Fade Duration', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_imageFadeDuration">
					<?php selectionGen($options->get_option('imageFadeDuration'),$msArray); ?>
					</select>
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to adjust the duration of the image fade-in animation, in milliseconds. Disabling this effect will make the image appear instantly.', 'wp-slimbox2'); ?>
					</p>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Caption Animation Duration', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<select name="wp_slimbox_captionAnimationDuration">
					<?php selectionGen($options->get_option('captionAnimationDuration'),$msArray); ?>
					</select>
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to adjust the duration of the caption animation, in milliseconds. Disabling this effect will make the caption appear instantly.', 'wp-slimbox2'); ?>
					</p>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Counter Text', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_counterText" value="<?php echo $options->get_option('counterText'); ?>" />
				</th>
				<td class='desc'>
					<p> <?php _e('This option allows the user to customize, translate or disable the counter text which appears in the captions when multiple images are shown. Inside the text, {x} will be replaced by the current image index, and {y} will be replaced by the total number of images. Set it to false (boolean value, without quotes) or "" to disable the counter display. Default is "Image {x} of {y}".', 'wp-slimbox2'); ?>
					</p>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Close Keys', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_closeKeys" class="keys" value="<?php echo $options->get_option('closeKeys'); ?>"/>
				</th>
				<td class='desc' rowspan=3>
					<p> <?php _e('These options allow the user to specify an array of <a href="http://www.webonweboff.com/tips/js/event_key_codes.aspx" TARGET="_blank">key codes</a> representing the keys to press to close or navigate to the next or previous images.</p><p>Just select the corresponding text box and press the keys you would like to use. Alternately check the box below to manually enter or clear key codes.</p><p>Default close values are [27, 88, 67] which means Esc (27), "x" (88) and "c" (67).</p><p>Default previous values are [37, 80] which means Left arrow (37) and "p" (80).</p><p>Default next values are [39, 78] which means Right arrow (39) and "n" (78).', 'wp-slimbox2'); ?>
					</p><br /><b><?php _e('Enable Manual Key Code Entry?', 'wp-slimbox2'); ?></b><input type="checkbox" id="wp_slimbox_manual_key" value="manual_key"/><input type="hidden" id="wp_slimbox_key_defined" value="<?php _e('That key has already been defined.', 'wp-slimbox2'); ?>"/>
				</td>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Previous Keys', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_previousKeys" class="keys" value="<?php echo $options->get_option('previousKeys'); ?>"/>
				</th>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Next Keys', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="text" name="wp_slimbox_nextKeys" class="keys" value="<?php echo $options->get_option('nextKeys'); ?>"/>
				</th>
			</tr>
			<tr class='inactive'>
				<td class='name'><?php _e('Maintenance mode', 'wp-slimbox2'); ?></td>
				<th scope='row' class='check-column'>
					<input type="checkbox" name="wp_slimbox_maintenance"<?php if ($options->get_option('maintenance') == 'on') echo ' checked="yes"';?> />
				</th>
				<td class='desc'>
					<p> <?php _e('This option enables a maintenance mode for testing purposes. When enabled slimbox will be disabled until you enable it by appending ?slimbox=on to a url. It will then remain on until you disable it by appending ?slimbox=off to a url, you clear your cookies, or in certain cases you clear your browser cache. This setting only impacts things at a vistor level, not a site wide level.', 'wp-slimbox2'); ?>
					</p>
			</tr>
			<input type="hidden" name="wp_slimbox_cache" value="<?php echo time(); ?>" />
		</tbody>
		</table>
		<input type="hidden" name="action" value="update" />
		<div style="clear:both;padding-top:20px;"></div>
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options','wp-slimbox2'); ?>" /></p>
		<div style="clear:both;padding-top:20px;"></div>
	</form>
</div>