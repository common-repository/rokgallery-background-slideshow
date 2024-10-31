<?php

// Block direct requests
defined( 'ABSPATH' ) or die( '-1' );
?>
<script>
jQuery( function($) {
	$.vegas('slideshow', {
		delay: <?php echo $instance['autoplay_delay']; ?>,
		backgrounds:[
		<?php foreach( $slices as $image ) { ?>
			{ src: '<?php echo $image->imageurl; ?>', fade:1000 },
		<?php } ?>
		]
	})('overlay');
});
</script>