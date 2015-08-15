<?php while ( have_posts() ) : the_post(); ?>
	<div class="container bs-docs-container">
		<div class="row">
			<!--content-->
			<div class="col-xs-9 col-md-9">
				<article <?php post_class(); ?>>
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="">
						<div class="entry-content">


							<?php the_content(); ?>
						</div>
					</div>
				</article>

			</div>

			<nav class="col-xs-3 col-md-3" id="myScrollspy">
				<?php echo do_shortcode( "[section_navigation]" ); ?>
			</nav>
		</div>

	<?php endwhile; ?>
