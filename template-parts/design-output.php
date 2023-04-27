<?php 
// ACF Design Settings output

//========== CSU Logo ==========
$logo = ( get_field('logo_size', 'option') );
if ($logo == 'small') { ?>
	<style>
		.csu-desktop {
			width: 350px;
		}
		.csu-tablet {
			width: 172px;
		}
		.csu-mobile {
			width: 113px;
		}
	</style>
<?php } elseif ($logo == 'medium') { ?>
	<style>
		.csu-desktop {
			width: 400px;
		}
		.csu-tablet {
			width: 197px;
		}
		.csu-mobile {
			width: 129px;
		}
	</style>
<?php } elseif ($logo == 'large') { ?>
	<style>
		.csu-desktop {
			width: 450px;
		}
		.csu-tablet {
			width: 221px;
		}
		.csu-mobile {
			width: 146px;
		}
	</style>
<?php }

//========== Unit Identifier ==========
$ui_desktop = ( get_field('ui_desktop', 'option') );
$ui_tablet = ( get_field('ui_tablet', 'option') );
$ui_mobile = ( get_field('ui_mobile', 'option') );
?>
<style>
	/* Desktop */
	@media all and (min-width: 1201px) {
		.site-title {
			font-size: <?php echo $ui_desktop ?>px;
		}
	}

	/* Tablet */
	@media all and (max-width: 1200px) {
		.site-title {
			font-size: <?php echo $ui_tablet ?>px;
		}
	}

	/* Mobile */
	@media all and (max-width: 800px) {
		.site-title {
			font-size: <?php echo $ui_mobile ?>px;
		}
	}
</style>

<?php 
//========== Header styles ==========
$header = ( get_field('header_style', 'option') );
if ( $header == 'fixed' ) { ?>
	<style>
		#masthead {
		    position: fixed;
		    top: 0;
		    left: 0;
		    right: 0;
		}
	</style>
	<script>
		// Set the height of the masthead and add a margin on page load and window resize
		var mastheadHeight;
		function setHeaderHeight() {
		  mastheadHeight = $("#masthead").innerHeight();
		  $(".site").css('margin-top', mastheadHeight);
		}
		$(document).ready(setHeaderHeight);
		$(window).resize(setHeaderHeight);
	</script>
<?php } elseif ( $header == 'scroll' ) { ?>
	<style>
		#masthead {
		    position: fixed;
		    top: 0;
		    left: 0;
		    right: 0;
		}
	</style>
	<script>
		// Set the height of the masthead and add a margin on page load and window resize
		var mastheadHeight;
		function setMastheadHeight() {
			mastheadHeight = $("#masthead").innerHeight();
		}
		$(window).load(setHeaderHeight);
		$(window).resize(setHeaderHeight);

		function setHeaderHeight() {
		  $(".site").css('margin-top', mastheadHeight);
		}
		$(window).load(setHeaderHeight);
		$(window).resize(setHeaderHeight);

		// Initialize headroom
		$("#masthead").headroom({
			"offset": 100,
			"tolerance": 5
		});
	</script>
<?php }

//========== Footer styles ==========
$footer = ( get_field('footer_style', 'option') );
if ( $footer == 'reveal' ) { ?>
	<style>
		#masthead {
			z-index: 3;
		}
		.site-footer {
			position: fixed;
			bottom: 0;
			right: 0;
			left: 0;
			z-index: 1;
		}
		#content {
			z-index: 2;
			position: relative;
			background: white;
		}
	</style>

	<script>
		// Set the height of the footer and add a margin on page load and window resize
		var footerHeight;
		function setFooterHeight() {
		  footerHeight = $(".site-footer").innerHeight();
		  $("#content").css('margin-bottom', footerHeight);
		}
		$(window).load(setFooterHeight);
		$(window).resize(setFooterHeight);
	</script>
<?php }
