<?php while ( have_posts() ) : the_post(); ?>
	<div class="container bs-docs-container">
		<div class="row">
			<!--content-->
			<div class="col-xs-9 col-md-9">
				<article <?php post_class(); ?> data-spy="scroll" data-target=".navbar">
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php //get_template_part('templates/entry-meta'); ?>
					</header>
					<div class="">
						<div class="entry-content" data-spy="scroll" data-target=".navbar" data-offset="12">


							<?php the_content(); ?>
						</div>
					</div>

					<?php //comments_template('/templates/comments.php'); ?>
				</article>

			</div>

			<nav class="col-xs-3 col-md-3" id="myScrollspy">
				<?php echo do_shortcode( "[section_navigation]" ); ?>
			</nav>
		</div>

	<?php endwhile; ?>
