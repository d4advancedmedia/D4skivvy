<div class="post-meta"><?php


	// POST AUTHOR
		/*
		echo (
			'<span itemprop="author" itemscope="" itemtype="http://schema.org/Person">'.
				'<span itemprop="name">'.
					'Written by: ' .
					'<a itemprop="url" rel="author" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" title="View all posts by '. esc_attr__(get_the_author()).'">'.
						get_the_author().
					'</a>'.
				'</span>'.
			'</span> '
		); //*/

	// POST DATE
		//*
		echo (
			'<time itemprop="datePublished" datetime="'.get_the_time( 'Y-m-d\TH:i:sP' ).'">'.
				get_the_time( get_option('date_format') ) .
			'<time> '
		); //*

	// POST CATEGORIES
		$cats_list = get_the_category_list( ', ' );
			if ( $cats_list )
				echo ( '| Category: ' . $cats_list. ' ');

	
	// POST TAGS
		$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list )
				echo ( '| Tags: ' . $tags_list . ' ');

	// Attachment
	if ( is_attachment() ) {

		if ( wp_attachment_is_image() ) {

			$metadata = wp_get_attachment_metadata();

			printf( __( '| Full size is %s pixels ', 'skivvy'),
				sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
					wp_get_attachment_url(),
					esc_attr( __('Link to full-size image', 'skivvy') ),
					$metadata['width'],
					$metadata['height']
				)
			);
		}
	}
	
	// TAXONOMY DESCRIPTION on Tax Archives
		if ( is_category() || is_tag() || is_tax() ) {
		#	echo term_description();
		}

	// SEARCH INFO
		/*
		if ( is_search() ) {
			// Or if search, show Result Search Count
				$allsearch = &new WP_Query("s=$s&showposts=-1");
				$key = wp_specialchars($s, 1);
				$count = $allsearch->post_count;
				printf( __( '<h2>Showing %1$s  results for: %2$s</h2>', 'skivvy' ), $count , $key );
				wp_reset_query(); 
		} //*/


?></div>