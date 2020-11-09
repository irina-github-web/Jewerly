<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jaydi_jewerly
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<img src="/jaydi/wp-content/uploads/2020/11/post-arr-left.jpg" /><div class="post-about"><span class="nav-subtitle">' . esc_html__( 'Previous Post', 'jaydi_jewerly' ) . '</span> <span class="nav-title">%title</span></div',
					'next_text' => '<div class="post-about"><span class="nav-subtitle">' . esc_html__( 'Next Post', 'jaydi_jewerly' ) . '</span> <span class="nav-title">%title</span></div><img src="/jaydi/wp-content/uploads/2020/11/post-arr-right.jpg" />',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template('');
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
