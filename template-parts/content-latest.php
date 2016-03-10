<?php

// Define our WP Query Parameters
$capital_posts = new WP_Query( 'posts_per_page=1' ); 

// Start our WP Query
while ($capital_posts -> have_posts()) : $capital_posts -> the_post();

	echo '<li><a href="' . the_permalink() . '">' . the_title() . '</a></li>';

	echo the_excerpt( __('Leia mais…') ); 

endwhile;
wp_reset_postdata();
