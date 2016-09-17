<div class="reveal">
	<div class="slides">
		<?php foreach ( $posts as $post ): // variable must be called $post (IMPORTANT) ?>
			<?php setup_postdata( $post ); ?>
			<section>
				<?php
				$horizontal_slide_id      = get_the_ID();
				$vertical_slides          = get_field( 'vertical_slides', $horizontal_slide_id );
				if ( $vertical_slides ):
					foreach ( $vertical_slides as $slide_id ): // variable must NOT be called $post (IMPORTANT)
						$background_image_id = get_field( 'slide_background_image', $slide_id );
						$background_image = wp_get_attachment_url( $background_image_id );
						?>
						<section data-background="<?php echo $background_image; ?>"
						         data-background-image="<?php echo $background_image; ?>">
							<h2><?php echo get_the_title( $slide_id ); ?></h2>
							<?php echo get_post_field( 'post_content', $slide_id ); ?>
							<aside class="notes">
								Oh hey, these are some notes. They'll be hidden in your
								presentation, but you can see them if you open the speaker notes
								window (hit 's' on your keyboard).
							</aside>
						</section>
					<?php endforeach;
				endif;


				?>
			</section>
		<?php endforeach;
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
		?>

	</div>
</div>