<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaydi_jewerly
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">

		<?php
		if (have_posts()) :

			if (is_home() && !is_front_page()) :
		?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
		<?php
			endif;

			/* Start the Loop */
			while (have_posts()) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/posts-loop', get_post_type());

			endwhile;

			// the_posts_navigation();

		else :

			get_template_part('template-parts/posts-loop', 'none');

		endif;
		?>
		<?php
		$args = array(
			'show_all'           => false, // показаны все страницы участвующие в пагинации
			'end_size'           => 1,     // количество страниц на концах
			'mid_size'           => 1,     // количество страниц вокруг текущей
			'prev_next'          => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
			'prev_text'          => __("<img src='/jaydi/wp-content/uploads/2020/11/arr-l.png' />"),
			'next_text'          => __("<img src='/jaydi/wp-content/uploads/2020/11/arr-r.png' />"),
			'add_args'           => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
			'add_fragment'       => '',     // Текст который добавиться ко всем ссылкам.
			'screen_reader_text' => __('Posts navigation'),
			'aria_label'         => __('Posts'), // aria-label="" для nav элемента. С WP 5.3
			'class'              => 'pagination',  // class="" для nav элемента. С WP 5.5
		);
		?>
		<?php echo get_the_posts_pagination($args); ?>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
