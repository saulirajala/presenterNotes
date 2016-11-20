<?php
/**
 *
 * Template Name: Show Template
 */
use Roots\Sage\Extras;
?>
<?php while ( have_posts() ) : the_post(); ?>



	<?php
	$posts = get_post_meta( Extras\get_current_on_air_notes(), 'attached_cmb2_attached_posts', true );

	if ( $posts ):
		get_template_part( 'templates/content-slides' );
		require_once 'tokens.php';
		?>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/lib/js/head.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/js/reveal.js"></script>
		<script type="text/javascript">
			Reveal.initialize({

				controls: false,
				keyboard: false,

				// other options...

				multiplex: {
					// Example values. To generate your own, see the socket.io server instructions.
					secret: null, // null so the clients do not have control of the master presentation
					id: "<?php echo $socket_id; ?>", // id, obtained from socket.io server
					url: 'https://reveal-js-multiplex-ccjbegmaii.now.sh/' // Location of socket.io server
				},

				// Don't forget to add the dependencies
				dependencies: [
					{src: 'http://cdn.socket.io/socket.io-1.3.5.js', async: true},
					<?php
					echo implode( ",\n", apply_filters( 'reveal_default_dependencies', array(
//						'classList' => "{ src: '" . get_template_directory_uri() . "/vendor/reveal.js/lib/js/classList.js', condition: function() { return !document.body.classList; } }",
//						'highlight' => "{ src: '" . get_template_directory_uri() . "/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } }",
//						'zoom'      => "{ src: '" . get_template_directory_uri() . "/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } }",
//						'notes'     => "{ src: '" . get_template_directory_uri() . "/vendor/reveal.js/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }",
						'client' => "{ src: '" . get_template_directory_uri() . "/vendor/reveal.js/plugin/multiplex/client.js', async: true, condition: function() { return !!document.body.classList; } }",
					) ) );
					?>

					// other dependencies...
				]
			});
		</script>

	<?php endif; ?>

<?php endwhile; ?>

