<?php
/*-------------------------------------------------------------------------*/
/*                        ENQUEUE STYLES                                   */
/*-------------------------------------------------------------------------*/

function custom_enqueue_styles(){
    wp_register_style('customstyle', get_template_directory_uri(). '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('customstyle');
    wp_register_style('four', get_template_directory_uri(). '/css/four.css', array(), '1.0.0', 'all');
    wp_enqueue_style('four');
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles');
/*-------------------------------------------------------------------------*/
/*                        REGISTER MENUS                                   */
/*-------------------------------------------------------------------------*/

function register_custom_menus(){
    add_theme_support('menus');

    register_nav_menus(array(
        'primary' => 'Main Menu',
        'secondary' => 'Footer Menu'
    ));
}
add_action('init', 'register_custom_menus');


/*-------------------------------------------------------------------------*/
/*                        REGISTER WIDGETS                                 */
/*-------------------------------------------------------------------------*/

function register_custom_sidebar(){
    add_theme_support('widgets');

    register_sidebar(array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ));
    register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li></ul>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action('widgets_init', 'register_custom_sidebar');

/*-------------------------------------------------------------------------*/
/*                        THEME SUPPORT                                    */
/*-------------------------------------------------------------------------*/
add_theme_support('post-thumbnails');

add_theme_support('post-formats',array('aside','image','video'));

add_theme_support('custom-header');

/*-------------------------------------------------------------------------*/
/*                        LIMIT LOGIN ATTEMPTS                             */
/*-------------------------------------------------------------------------*/
function check_attempted_login( $user, $username, $password ) {
    if ( get_transient( 'attempted_login' ) ) {
        $datas = get_transient( 'attempted_login' );

        if ( $datas['tried'] >= 5 ) {
            $until = get_option( '_transient_timeout_' . 'attempted_login' );
            $time = time_to_go( $until );

            return new WP_Error( 'too_many_tried',  sprintf( __( '<strong>ERROR</strong>: You have reached authentication limit, you will be able to try again in %1$s.' ) , $time ) );
        }
    }

    return $user;
}

add_filter( 'authenticate', 'check_attempted_login', 30, 3 ); 

function login_failed( $username ) {
    if ( get_transient( 'attempted_login' ) ) {
        $datas = get_transient( 'attempted_login' );
        $datas['tried']++;

        if ( $datas['tried'] <= 3 )
            set_transient( 'attempted_login', $datas , 300 );
    } else {
        $datas = array(
            'tried'     => 1
        );
        set_transient( 'attempted_login', $datas , 300 );
    }
}

add_action( 'wp_login_failed', 'login_failed', 10, 1 ); 

function time_to_go($timestamp){

    // converting the mysql timestamp to php time
    $periods = array(
        "second",
        "minute",
        "hour",
        "day",
        "week",
        "month",
        "year"
    );
    $lengths = array(
        "60",
        "60",
        "24",
        "7",
        "4.35",
        "12"
    );
    $current_timestamp = time();
    $difference = abs($current_timestamp - $timestamp);
    for ($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i ++) {
        $difference /= $lengths[$i];
    }
    $difference = round($difference);
    if (isset($difference)) {
        if ($difference != 1)
            $periods[$i] .= "s";
            $output = "$difference $periods[$i]";
            return $output;
    }
}