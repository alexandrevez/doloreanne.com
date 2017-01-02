<?php
$image_url = get_template_directory_uri()."/assets/images/placeholder2.jpg";
if (has_post_thumbnail())
{
	$image_url = wp_get_attachment_url(get_post_thumbnail_id());	
}
$author_class = dolo_author_to_class(get_the_author());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-3 col-sm-6 grid3 '.$author_class); ?>>
	<div class="artgrid">
		<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
			<div class="dolo-grid-bg-container" style="background-image: url('<?php echo $image_url;?>')">
				
				<div class="entry-foot">
					<h2><?php the_title() ?></h2>
					<span><?php echo get_the_excerpt(); ?></span>
				</div>
				
			</div>
		</a>
	</div>		
</article>