<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaydi_jewerly
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
		<?php $my_var = get_comments_number(); ?>
		<?php echo $my_var; esc_html_e( '&nbsp;Comments', 'jaydi_jewerly' ); ?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback' => 'jaydi_jewerly_comment'
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'jaydi_jewerly' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().


	add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
	function kama_reorder_comment_fields( $fields ){
		// die(print_r( $fields )); // посмотрим какие поля есть
	
		$new_fields = array(); // сюда соберем поля в новом порядке
	
		$myorder = array('author','email','comment'); // нужный порядок
	
		foreach( $myorder as $key ){
			$new_fields[ $key ] = $fields[ $key ];
			unset( $fields[ $key ] );
		}
	
		// если остались еще какие-то поля добавим их в конец
		if( $fields )
			foreach( $fields as $key => $val )
				$new_fields[ $key ] = $val;
	
		return $new_fields;
	}

	add_filter('comment_form_default_fields', 'unset_url_field');
	function unset_url_field($fields){
		if(isset($fields['url']))
		unset($fields['url']);
		return $fields;
	}

$comments_args = array(
	'fields'               => [
		'author' => '<div class="author-data"><p class="comment-form-author"><input id="author" name="author"  type="text" placeholder="Name" /></p>',
		'email'  => '<p class="comment-form-email">
			<input id="email" name="email" placeholder="Email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
		</p></div>',
		'cookies' => ''
	],
	'label_submit' => 'Send Comment',
	'title_reply'=>'Send Comment',
	'comment_notes_after' => '',
	'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Comment" aria-required="true"></textarea></p>',
	
);

comment_form( $comments_args );

?>

</div><!-- #comments -->
