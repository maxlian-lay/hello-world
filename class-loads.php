<?php
	/*
		 ____________________
		|
		| --- This class is used to load necessary data. (Eg: Categories, Sub-categories, etc..)
		|____________________
  */
	class Loads{

	  function __construct(){
	  	add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_scripts' ) );
	  }

	  public function load_admin_scripts(){
	  	if ( is_active_widget( false, false, 'product_banner_', true ) ) {
		  	wp_register_script('product_banner_scripts', plugin_dir_url(__FILE__).'js/product-banner.js', $deps = array(), $ver = false, $in_footer = true);
		    wp_enqueue_script('product_banner_scripts');
	  	}
	  }

	  public function load_categories(){
	  	//	This part is used to get the Categories.

			$args = array(
				'taxonomy'     => 'product_cat',
				'orderby'      => 'name',
				'show_count'   => 0,
				'pad_counts'   => 0,
				'hierarchical' => 1,
				'title_li'     => '',
				'hide_empty'   => 0
			);
			$parent_cats = get_categories( $args );
			return $parent_cats;
	  }

	  public function load_sub_categories($parent_cat_id){
	  	//	This part is used to get the Sub-categories.

			$args2 = array(
				'taxonomy'     => 'product_cat',
				'child_of'     => 0,
				'parent'       => $parent_cat_id,
				'orderby'      => 'name',
				'show_count'   => 0,
				'pad_counts'   => 0,
				'hierarchical' => 1,
				'title_li'     => '',
				'hide_empty'   => 0
			);
			$sub_cats = get_categories( $args2 );
			return $sub_cats;
	  }
	  
	}
	new Loads;
