<?php
use Roots\Sage\Extras;

while ( have_posts() ) : the_post(); ?>

	<div class="reveal">
		<div class="slides">

			<section>
				<?php
				$vertical_slides          = get_post_meta( get_the_ID(), 'ir_horizontal_slides', true );
				if ( ! empty( $vertical_slides ) ):
					foreach ( $vertical_slides as $slide ):
						$background_image_id = $slide['bg_image_id'];
						$background_image = wp_get_attachment_image_src( $background_image_id, 'full-image' );
						$text_color       = $slide['text_color'];
						?>
						<section data-background="<?php echo isset( $background_image[0] ) ? $background_image[0] : ''; ?>"
						         data-background-image="<?php echo isset( $background_image[0] ) ? $background_image[0] : ''; ?>">
							<div class="<?php echo ( $text_color === 'white' ) ? 'white-text' : ''; ?>">
								<?php echo $slide['slide_content']; ?>
							</div>

							<aside class="notes">
							</aside>
						</section>
					<?php endforeach;
				endif;
				?>
			</section>
		</div>
	</div>

	<script src="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/lib/js/head.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/js/reveal.js"></script>
	<script>
		// More info https://github.com/hakimel/reveal.js#configuration
		Reveal.initialize({
			controls: true,
			progress: true,
			history: true,
			center: true,
			transition: 'slide', // none/fade/slide/convex/concave/zoom
		});
	</script>

<?php endwhile; ?>
