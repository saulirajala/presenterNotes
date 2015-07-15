<?php while ( have_posts() ) : the_post(); ?>
	<div class="container">
		<div class="row">
			<!-- navi-->
			<nav class="col-sm-3" id="myScrollspy">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="#rakkaus">Rakkauden kaksoiskäsky</a></li>
					<li><a href="#veritie">Veritie</a></li>
					<li><a href="#opetus">Opetus</a></li>
					<!--
					<li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="#section41">Section 4-1</a></li>
						<li><a href="#section42">Section 4-2</a></li>                     
					  </ul>
					</li> -->
				</ul>
			</nav>



			<!--content-->
			<div class="col-sm-9">
				<article <?php post_class(); ?> data-spy="scroll" data-target=".navbar">
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php //get_template_part('templates/entry-meta'); ?>
					</header>
					<div class="col-md-8">
						<div class="entry-content" data-spy="scroll" data-target=".navbar" data-offset="12">


							<?php the_content(); ?>
						</div>
					</div>

					<?php //comments_template('/templates/comments.php'); ?>
				</article>

			</div>
		</div>
	<?php endwhile; ?>
