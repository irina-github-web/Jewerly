<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jaydi_jewerly
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-logo">
			<?php the_custom_logo(); ?>
			</div>

		<?php
		if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('footer-socials');
		?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>