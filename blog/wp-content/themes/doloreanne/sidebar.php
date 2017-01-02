	<div id="secondary" class="widget-area col-md-4 right-column" role="complementary">
		<div class="wrapper">
			<aside id="recent" class="widget">
				<h3>Récemment ajouté</h3>
				<ul>
				<?php
					$recent_posts = wp_get_recent_posts();
					foreach( $recent_posts as $recent ){
						$author_name = get_the_author_meta("display_name", $recent["post_author"]);
						$author_class = dolo_author_to_class($author_name);
						echo '<li class="'.$author_class.'"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					}
				?>
				</ul>
			</aside>

			<aside id="same-author" class="widget">
				<h3>Autres articles de <?php the_author_posts_link(); ?></h3>
			</aside>

			<?php dynamic_sidebar('sidebar-primary');?>

		</div>
	</div><!-- #secondary -->
