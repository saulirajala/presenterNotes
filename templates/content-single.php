<?php while ( have_posts() ) : the_post(); ?>
	<div class="container bs-docs-container">
		<div class="row">
			<!--content-->
			<div class="col-xs-9 col-md-9">
				<article <?php post_class(); ?>>
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php //get_template_part('templates/entry-meta'); ?>
					</header>
					<div class="">
						<div class="entry-content">


							<?php the_content(); ?>
						</div>
					</div>

					<?php //comments_template('/templates/comments.php'); ?>
				</article>

			</div>

			<nav class="col-xs-3 col-md-3" id="myScrollspy">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="#title1">Jumalakuvat</a></li>
					<li class="submenu"><a href="#title1_1">Vihainen ja ankara</a></li>
					<li class="submenu"><a href="#title1_2">Armoton valloittaja</a></li>
					<li ><a href="#title2">Fil. 2:5-11</a></li>
					<li class="submenu"><a href="#title2_1">“Tyhjensi itsensä”</a></li>
					<li class="submenu"><a href="#title2_2">Jutun hienous</a></li>
					<li><a href="#title3">So what?</a></li>
					<li class="submenu"><a href="#title3_1">Ajattele positiivisemmin itsestäsi</a></li>
					<li class="submenu"><a href="#title3_2">Ajattele positiivisemmin nykyisestä maailmanmenosta</a></li>
					<li class="submenu"><a href="#title3_3">Ajattele positiivisemmin tulevaisuudesta</a></li>
				</ul>
				<?php
				/*
				 * Ongelma on nyt se, että menu tulee automaattisesti, mutta ilmeisesti koska id:t ovat niin erikoisia, niin scrollspy ei toimi
				 * => pitäisi siis saada id:t selkeämmäksi tyyliin title1_1, tms. Erikoismerkit (+,&,",yms) ja skandinaavit tuovat vaikeutta
				 */
				//echo do_shortcode( "[section_navigation]" ); 
				?>
			</nav>
		</div>

	<?php endwhile; ?>
