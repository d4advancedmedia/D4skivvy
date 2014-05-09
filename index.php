<?php get_header(); ?>
<section class="content">
	<section class="page-content"><?php

		if ( is_front_page() ) get_template_part( 'inc/chunk' , 'slider' ); // Slider

		get_template_part( 'inc/chunk' , 'title' ); // The Title

		get_template_part( 'inc/chunk' , 'content' ); // The Content

		get_template_part( 'inc/chunk' , 'pagination' ); // Pagination

		echo "&nbsp;"; // Anti-collapse Space.

	?></section>
	<?php // get_sidebar();?>
</section>
<?php get_footer(); ?>