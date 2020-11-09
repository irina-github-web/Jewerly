<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaydi_jewerly
 */

?>

<div class="post-top-img"></div>

<article id="post-<?php the_ID(); ?>" <?php post_class("post-in-list"); ?>>

    <?php jaydi_jewerly_post_thumbnail(); ?>

    <header class="entry-header">
        <?php

        if ('post' === get_post_type()) :
        ?>
            <div class="entry-meta">
                <?php
                jaydi_jewerly_posted_on();
                jaydi_jewerly_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_excerpt();
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <!-- <?php jaydi_jewerly_entry_footer(); ?> -->
    </footer><!-- .entry-footer -->

    <?php $my_var = get_comments_number(); ?>
    <div class="comments-sum">
    <?php echo $my_var ?><img src="<?php bloginfo('template_url'); ?>/img/message.png" />
    </div>
</article><!-- #post-<?php the_ID(); ?> -->