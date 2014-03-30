<?php

#COMPILED-BOOTSTRAP
    function bootstrap() 
        {
            wp_enqueue_style( 'styles-css', get_stylesheet_uri() );
            wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/dist/css/bootstrap.css' );
            wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.js', array('jquery') );
        }
        add_action( 'wp_enqueue_scripts', 'bootstrap' );

#POST-TYPE
    #EMAIL-POST-TYPE
    function email_custom_init() {
        $args = array( 
            'label' => 'Email Campaign',
            'public' => true,
            'supports' => array( 'title', 'editor' )
        );
        register_post_type( 'mailings', $args );
    }
    add_action( 'init', 'email_custom_init' );
    
    
    #PRESS-POST-TYPE
    function press_custom_init() {
        $args = array( 
            'label'  => 'Press',
            'public' => true,
            'supports' => array( 'title', 'editor' )
            
        );
        register_post_type( 'press', $args );
    }
    add_action( 'init', 'press_custom_init' );
    
    
    #SUCCESSSTORY-POST-TYPE
    function successstory_custom_init() {
        $args = array( 
            'label'  => 'Success Story',
            'public' => true,
            'supports' => array( 'title', 'editor' )
            
        );
        register_post_type( 'successstory', $args );
    }
    add_action( 'init', 'successstory_custom_init' );
    
    
    #CALLTOACTION-POST-TYPE
    function calltoaction_custom_init() {
        $args = array( 
            'label'  => 'Call To Action',
            'public' => true,
            'publicly_queryable' => false,
            'has_archive' => false,
            'supports' => array( 'title', 'editor', 'post-format' ) 
        );
        register_post_type( 'calltoaction', $args );
    }
    add_action( 'init', 'calltoaction_custom_init' );
    

    #@TODO: CALLTOACTION-POST-FORMAT
        # function imagemeta-post-format
        #
        #
        #
        #


#THEME-SUPPORTS
    #THUMBNAILS
    add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
    
    #CUSTOM-HEADER
    $headerargs = array(
        'flex-width'    => true,
        'width'         => 200,
        'flex-height'    => true,
        'height'        => 55,
        'default-image' => get_template_directory_uri() . '/images/header.jpg',
        'uploads'       => true,
    );
    add_theme_support( 'custom-header', $headerargs );
    
    #CUSTOM-BACKGROUND
    $backgroundargs = array(
        'default-color' => 'f2f2f2',
        'default-image' => get_template_directory_uri() . '/images/background.jpg',
    );
    add_theme_support( 'custom-background', $backgroundargs );

#SHORTCODES
    #@TODO: Locate and enable shortcodes


#HEADER
    #ADD-CLASS-TO-MENU-ITEM
    function special_nav_class($classes, $item){
         if( in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
         }
         return $classes;
    }
    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    #ADD-CLASS-TO-MENU-ITEM
    function menu_list_unstyled($ulclass) {
    return preg_replace('class="menu"', 'class="menu list-unstyled"', $ulclass);
      }
    add_filter('wp_nav_menu','menu_list_unstyled');


    #PRIMARY-NAV-MENU
    register_nav_menu( 'resources', 'Resources Menu' );
    register_nav_menu( 'services', 'Products Menu' );
    register_nav_menu( 'products', 'Products Menu' );

    #REGISTER-RESOURCES-WIDGET
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name'=> 'Resources',
		'id' => 'resources',
        'before_widget' => '',
		'after_widget' => '',
    ));

    #REGISTER-PRODUCTS&SERVICES-WIDGET
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name'=> 'Solutions',
		'id' => 'solutions',
        'before_widget' => '',
		'after_widget' => '',
    ));

    register_sidebar( array(
        'name' => __( 'Footer 1', 'wpb' ),
        'id' => 'footer1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer 2', 'wpb' ),
        'id' => 'footer2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer 3', 'wpb' ),
        'id' => 'footer3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer 4', 'wpb' ),
        'id' => 'footer4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );



#BREADCRUMBS
    function the_breadcrumb() {
        if (!is_home()) {
            echo '<a href="';
            echo get_option('home');
            echo '">';
            echo "Home</a> » ";
            if (is_category() || is_single()) {
                the_category('title_li=');
                if (is_single()) {
                    echo " » ";
                    the_title();
                }
            } elseif (is_page()) {
                echo the_title();
            }
        }
    }

#GET-ANCESTOR-OF-CURRENT-PAGE
if(!function_exists('get_post_top_ancestor_id')){
	/**
	 * Gets the id of the topmost ancestor of the current page. Returns the current
	 * page's id if there is no parent.
	 * @uses object $post
	 * @return int 
	 **/
	function get_post_top_ancestor_id(){
		global $post;	
		if($post->post_parent){
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			return $ancestors[0];
		}	
		return $post->ID;
	}
}

#ADD-META-BOXES
function cd_add_naw_meta(){
    add_meta_box( 'naw-meta', __( 'Custom Footer Options' ), 'cd_naw_meta_cb', 'page', 'advanced', 'high' );
	add_meta_box( 'naw-meta', __( 'Webinar Details' ), 'cd_naw_meta_wb', 'product', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'cd_add_naw_meta' );

function cd_naw_meta_cb( $post ){
	$values = get_post_custom( $post->ID );
	$selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'][0] ) : '';
	
	$menuselected = isset( $values['naw_menu_select'] ) ? esc_attr( $values['naw_menu_select'][0] ) : '';
    // Get values for filling in the inputs if we have them.
    $naw = get_post_meta( $post->ID, '_cd_naw_content', true );
    $naw_link= get_post_meta( $post->ID, '_cd_naw_content_link', true );
	
	$tst = get_post_meta( $post->ID, '_cd_tst_content', true );
	$tst_title = get_post_meta( $post->ID, '_cd_tst_title_content', true );
    $tst_link= get_post_meta( $post->ID, '_cd_tst_content_link', true );
	
	$rsr_title = get_post_meta( $post->ID, '_cd_rsr_title_content', true );
	$rsr = get_post_meta( $post->ID, '_cd_rsr_content', true );
    // Nonce to verify intention later
    wp_nonce_field( 'save_naw_meta', 'naw_nonce' );
    
	
	//Get all the menus
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
	?>
		<p>
        <label for="naw_menu_select"><h4>Select Sidebar Menu:</h4></label>
		<select name="naw_menu_select" id="naw_menu_select">
		<?php	
			foreach($menus as $menu){
			?>
				<option value="<?php echo $menu->name;?>" <?php selected( $menuselected, $menu->name);?> > <?php echo $menu->name; ?></option>
			<?php
				}
		?>
		</select>
		</p>
	<p>
        <label for="my_meta_box_select"><h4>Show Custom Footer:</h4></label>
        <select name="my_meta_box_select" id="my_meta_box_select">
            <option value="yes" <?php selected( $selected, 'yes' ); ?>>Yes</option>
            <option value="no" <?php selected( $selected, 'no' ); ?>>No</option>
        </select>
    </p>
	
    <p>
        <label for="naw-content">About NetatWork Content:</label>
        <textarea class="widefat" id="naw-content" name="_cd_naw_content" rows="10"><?php echo $naw; ?></textarea>
    </p>
	<p>
        <label for="naw-content_link">About NetatWork URL:</label>
		<input class="widefat" type="text" id="naw-content_link" name="_cd_naw_content_link" value="<?php echo $naw_link; ?>">
    </p>
	<hr>
	<p>
        <label for="tst-title-content">Testimonial Title:</label>
        <input type="text" class="widefat" id="tst-title-content" name="_cd_tst_title_content" value="<?php echo $tst_title; ?>">
    </p>
	<p>
        <label for="tst-content">Testimonial Content:</label>
        <textarea class="widefat" id="tst-content" name="_cd_tst_content" rows="10"><?php echo $tst; ?></textarea>
    </p>
	<p>
        <label for="tst-content_link">Testimonial URL:</label>
		<input class="widefat" type="text" id="tst-content_link" name="_cd_tst_content_link" value="<?php echo $tst_link; ?>">
    </p>
	<hr>
	<p>
        <label for="rsr-title-content">Resources Title:</label>
        <input type="text" class="widefat" id="rsr-title-content" name="_cd_rsr_title_content" value="<?php echo $rsr_title; ?>">
    </p>
	<p>
        <label for="rsr-content">Resources Content:</label>
        <textarea class="widefat" id="rsr-content" name="_cd_rsr_content" rows="10"><?php echo $rsr; ?></textarea>
    </p>
    <?php
}

#SAVE-META-BOX-VALUES
    function cd_naw_meta_save( $id ){
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if( !isset( $_POST['naw_nonce'] ) || !wp_verify_nonce( $_POST['naw_nonce'], 'save_naw_meta' ) ) return;     
        if( !current_user_can( 'edit_post' ) ) return;
        // now we can actually save the data
        $allowed = array( 
            'a' => array( // on allow a tags
                    'href' => array() // and those anchors can only have href attribute
                    ),
            'ul' => array(),
            'li' => array(),
            'img' => array(),
            'b' => array(),
        );     
        if( isset( $_POST['my_meta_box_select'] ) )
            update_post_meta( $id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );
        if( isset( $_POST['naw_menu_select'] ) )
            update_post_meta( $id, 'naw_menu_select', esc_attr( $_POST['naw_menu_select'] ) );	
        if( isset( $_POST['_cd_naw_content'] ) )
            update_post_meta( $id, '_cd_naw_content', wp_kses( $_POST['_cd_naw_content'], $allowed ) );
        if( isset( $_POST['_cd_naw_content_link'] ) )
            update_post_meta( $id, '_cd_naw_content_link', wp_kses( $_POST['_cd_naw_content_link'], $allowed ) );
        if( isset( $_POST['_cd_tst_content'] ) )
            update_post_meta( $id, '_cd_tst_content', wp_kses( $_POST['_cd_tst_content'], $allowed) );
        if( isset( $_POST['_cd_tst_title_content'] ) )
            update_post_meta( $id, '_cd_tst_title_content', wp_kses( $_POST['_cd_tst_title_content'], $allowed) );
        if( isset( $_POST['_cd_tst_content_link'] ) )
            update_post_meta( $id, '_cd_tst_content_link', wp_kses( $_POST['_cd_tst_content_link'], $allowed ) );
        if( isset( $_POST['_cd_rsr_title_content'] ) )
            update_post_meta( $id, '_cd_rsr_title_content', wp_kses( $_POST['_cd_rsr_title_content'], $allowed) );
        if( isset( $_POST['_cd_rsr_content'] ) )
            update_post_meta( $id, '_cd_rsr_content', wp_kses( $_POST['_cd_rsr_content'], $allowed) );
    }	
    add_action( 'save_post', 'cd_naw_meta_save' );

#RENDER-META-BOX
    function cd_naw_meta_wb( $post ){
        // Get values for filling in the inputs if we have them.
        $nawdate = get_post_meta( $post->ID, '_cd_naw_date', true );
        $nawtime_s = get_post_meta( $post->ID, '_cd_naw_start_time', true );
        $nawtime_e = get_post_meta( $post->ID, '_cd_naw_end_time', true );  
        // Nonce to verify intention later
        wp_nonce_field( 'save_naw_meta', 'naw_nonce' );
        ?>
        <p>
            <label for="naw-date">Select Date:</label>
            <input id="naw-date" type="date" name="_cd_naw_date" value="<?php echo $nawdate?>">
        </p>
        <p>
            <label for="naw-time">Start Time:</label>
            <input id="naw-time" name="_cd_naw_start_time" type="time" name="usr_time" value="<?php echo $nawtime_s?>">
        </p>
        <p>
            <label for="naw-time">End Time:</label>
            <input id="naw-time" name="_cd_naw_end_time" type="time" value="<?php echo $nawtime_e?>">
        </p>
    <?php }

#SAVE META BOX VALUES
    function cd_naw_meta_wbsave( $id ){
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if( !isset( $_POST['naw_nonce'] ) || !wp_verify_nonce( $_POST['naw_nonce'], 'save_naw_meta' ) ) return; 
        if( !current_user_can( 'edit_post' ) ) return;
        $allowed = array( 'p' => array() );        
        if( isset( $_POST['_cd_naw_date'] ) )
            update_post_meta( $id, '_cd_naw_date', wp_kses( $_POST['_cd_naw_date'], $allowed ) );
        if( isset( $_POST['_cd_naw_start_time'] ) )
            update_post_meta( $id, '_cd_naw_start_time', wp_kses( $_POST['_cd_naw_start_time'], $allowed ) );
        if( isset( $_POST['_cd_naw_end_time'] ) )
            update_post_meta( $id, '_cd_naw_end_time', wp_kses( $_POST['_cd_naw_end_time'], $allowed ) );
    }
    add_action( 'save_post', 'cd_naw_meta_wbsave' );

?>