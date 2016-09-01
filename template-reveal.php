<?php
/**
 * Template Name: Slideshow Template
 */
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php

	$posts = get_field( 'notes_slides', 1 );

	if ( $posts ): ?>
		<div class="reveal">
			<div class="slides">
				<?php foreach ( $posts as $post ): // variable must be called $post (IMPORTANT) ?>
					<?php setup_postdata( $post ); ?>
					<section>
<!--						<h2>--><?php //the_title(); ?><!--</h2>-->
						<?php
						$horizontal_slide_id = get_the_ID();
						$vertical_slides     = get_field( 'vertical_slides', $horizontal_slide_id );
						if ( $vertical_slides ):
							foreach ( $vertical_slides as $slide_id ): // variable must NOT be called $post (IMPORTANT)
								$background_image_id = get_field('slide_background_image', $slide_id);
								$background_image = wp_get_attachment_url($background_image_id);
//								var_dump($background_image);exit;
								?>
								<section data-background="<?php echo $background_image; ?>"
								         data-background-image="<?php echo $background_image; ?>">
									<h2><?php echo get_the_title( $slide_id ); ?></h2>
									<?php echo get_post_field('post_content', $slide_id); ?>
								</section>
							<?php endforeach;
						endif;


						?>
					</section>
				<?php endforeach; ?>
				<section>
					<section>Vertical Slide 1</section>
					<section>Vertical Slide 2</section>
				</section>
			</div>
		</div>
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/js/reveal.js"></script>
		<script>
			Reveal.initialize();
		</script>
	<?php endif; ?>

<?php endwhile; ?>

