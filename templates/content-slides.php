<div class="reveal">
	<div class="slides">

		<?php foreach ( $posts as $post_id ): // variable must be called $post (IMPORTANT) ?>

			<?php
			$post = get_post( $post_id );
			setup_postdata( $post );
			?>
			<section>
				<?php
				$vertical_slides = get_post_meta( get_the_ID(), 'ir_horizontal_slides', true );
				if ( ! empty( $vertical_slides ) ):
					foreach ( $vertical_slides as $slide ): // variable must NOT be called $post (IMPORTANT)
						$background_image_id = $slide['bg_image_id'];
						$background_image = wp_get_attachment_image_src( $background_image_id, 'full-image' );
						$text_color = $slide['text_color'];
						?>
						<section data-background="<?php echo isset( $background_image[0] ) ? $background_image[0] : ''; ?>"
						         data-background-image="<?php echo isset( $background_image[0] ) ? $background_image[0] : ''; ?>">
							<div class="<?php echo ($text_color === 'white') ? 'white-text' : ''; ?>">
								<?php echo $slide['slide_content']; ?>	
							</div>
							
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

		<?php
			wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
		endforeach;

		?>

	</div>
</div>