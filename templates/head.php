<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_page() OR is_singular('ir_horizontal_slide') ): ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/css/reveal.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/reveal.js/css/theme/white.css">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
