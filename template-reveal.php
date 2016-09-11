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
						$horizontal_slide_id      = get_the_ID();
						$vertical_slides          = get_field( 'vertical_slides', $horizontal_slide_id );
						if ( $vertical_slides ):
							foreach ( $vertical_slides as $slide_id ): // variable must NOT be called $post (IMPORTANT)
								$background_image_id = get_field( 'slide_background_image', $slide_id );
								$background_image = wp_get_attachment_url( $background_image_id );
//								var_dump($background_image);exit;
								?>
								<section data-background="<?php echo $background_image; ?>"
								         data-background-image="<?php echo $background_image; ?>">
									<h2><?php echo get_the_title( $slide_id ); ?></h2>
									<?php echo get_post_field( 'post_content', $slide_id ); ?>
									<aside class="notes">
										Oh hey, these are some notes. They'll be hidden in your presentation, but you can see them if you open the speaker notes window (hit 's' on your keyboard).
									</aside>
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
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/lib/js/head.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/js/reveal.js"></script>
		<script>
			Reveal.initialize({
				// Exposes the reveal.js API through window.postMessage
//				postMessage: true,

				// Dispatches all reveal.js events to the parent window through postMessage
//				postMessageEvents: false,

				multiplex: {
					// Example values. To generate your own, see the socket.io server instructions.
					secret: '14734451489802402044', // Obtained from the socket.io server. Gives this (the master) control of the presentation
					id: 'a08ae295c8d98c67', // Obtained from socket.io server
					url: 'https://reveal-js-multiplex-ccjbegmaii.now.sh' // Location of socket.io server
				},

				dependencies: [
					{ src: 'http://cdn.socket.io/socket.io-1.3.5.js', async: true },
					<?php
					echo implode( ",\n", apply_filters( 'reveal_default_dependencies', array(
//						'classList' => "{ src: '" . get_template_directory_uri() . "/lib/js/classList.js', condition: function() { return !document.body.classList; } }",
//						'highlight' => "{ src: '" . get_template_directory_uri() . "/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } }",
//						'zoom'      => "{ src: '" . get_template_directory_uri() . "/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } }",
//						'notes'     => "{ src: '" . get_template_directory_uri() . "/vendor/reveal.js/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }",
						'master'     => "{ src: '" . get_template_directory_uri() . "/vendor/reveal.js/plugin/multiplex/master.js', async: true, condition: function() { return !!document.body.classList; } }",
					) ) );
					?>
				]
			});
		</script>
	<?php endif; ?>

<?php endwhile; ?>

