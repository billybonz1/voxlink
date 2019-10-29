<?php
add_action( 'template_redirect', 'hooks_setup' , 20 );
function hooks_setup() {
    if (! is_search() ) //<= you can also use any conditional tag here
        return;
    add_action( '__before_loop'     , 'set_my_query' );
    add_action( '__after_loop'      , 'set_my_query', 100 );
}

function set_my_query() {
    global $wp_query, $wp_the_query;
    switch ( current_filter() ) {
    	case '__before_loop':
    		//replace the current query by a custom query
		    //Note : the initial query is stored in another global named $wp_the_query
		    if(isset($_REQUEST['s'])){
		        $args = array(
    				'post_type'        => 'any',
    				'post_status'      => 'publish',
    				'order'            => 'DESC',
    				'orderby'          => 'date',
    				's'                => $_REQUEST['s']
    			);
    			$args['posts_per_page'] = 12;
    		    $wp_query = new WP_Query( $args );
		    }else{

		    }

    	break;

    	default:
    		//back to the initial WP query stored in $wp_the_query
    		$wp_query = $wp_the_query;
    	break;
    }
}

