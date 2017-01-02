<?php
$author_class = dolo_author_to_class(get_the_author());
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php (has_post_thumbnail()) ? the_post_thumbnail() : "" ?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php paraxe_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'paraxe' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

	<script type="text/javascript">
	function addAuthorClass()
	{
		jQuery("#content").addClass("<?php echo $author_class;?>");
		jQuery("header").addClass("<?php echo $author_class;?>");
		jQuery("#recent > h3").addClass("<?php echo $author_class;?>");
		jQuery("#same-author > h3").addClass("<?php echo $author_class;?>");
		jQuery("#submit").addClass("<?php echo $author_class;?>");
	}

	jQuery(function() {
		addAuthorClass();
	});

	</script>
