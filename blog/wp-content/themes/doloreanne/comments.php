<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Paraxe
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

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">Commentaires</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'paraxe' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'paraxe' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'paraxe' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback' => 'paraxe_comment',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'paraxe' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'paraxe' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'paraxe' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'paraxe' ); ?></p>
	<?php endif; ?>

	<?php 
	
	$commenter = wp_get_current_commenter();
	
	$fields =  array(
		'author' =>
			'<p class="comment-form-author"><label for="author">Votre nom&nbsp;:</label>'.
				'<input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).
					'" size="30" aria-required="true" />'.
			'</p>',

		'email' =>
			'<p class="comment-form-email"><label for="email">Votre courriel&nbsp;:</label>'.
				'<input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).
					'" size="30" aria-required="true" />'.
			'</p>'
    );

	comment_form(array(
		'title_reply' => 'Commenter',
		'comment_field' => 
			'<p class="comment-form-comment">'.
				'<label for="comment">Commentaire&nbsp;:</label>'.
				'<textarea id="comment" name="comment" rows="8" cols="45" aria-required="true"></textarea>'.
			'</p>',
		
		'fields' => 
			apply_filters('comment_form_default_fields', $fields))); 

	?>

</div><!-- #comments -->
