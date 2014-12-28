<?php

/*Remove the p tags for page and post content*/

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/*Hide Admin Bar*/
add_filter('show_admin_bar', '__return_false');


/*Post pagination for large devices*/

function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<ul class="pagination">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li><a href="'. get_previous_posts_page_link() .'"><i class="fa fa-chevron-left"></i></a>');

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li><a>...</a></li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><a>...</a></li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li><a href="'. get_next_posts_page_link() .'"><i class="fa fa-chevron-right"></i></a></li>');

	echo '</ul>' . "\n";

}

/*Post pagination for mobile*/

function wpbeginner_numeric_posts_nav_mobile() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;



	echo '<ul class="pagination">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li><a href="'. get_previous_posts_page_link() .'"><i class="fa fa-chevron-left"></i></a>');


	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s'. ' / ' . $max  .'</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li><a href="'. get_next_posts_page_link() .'"><i class="fa fa-chevron-right"></i></a></li>');

	echo '</ul>' . "\n";

}

//Enable support for thumbnails

add_theme_support( 'post-thumbnails' ); 

