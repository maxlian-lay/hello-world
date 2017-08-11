<?php

/*
*	Plugin Name: Product Banner
*	Description: Plugin to create a Banner for your Product Categories My new update
*	Version: 1.4.0
*	Author: Maxlian Lay
*	Author URI: Contact at maxlian.lay@gmail.com
*	Tested up to: 4.8
*/

if ( !defined('ABSPATH') ) die('-1');

class Product_Banner extends WP_Widget {

  function __construct() {
    parent::__construct( 'product_banner_', __('Product Banner', 'Maxlian Lay'),
      array(
        'description' => __( 'Simple plugin to create a Banner for your Product Categories v1.4' )
      ));
    $this->includes();
  }

  private function includes(){
  	require_once __DIR__ . '/class-loads.php';
  	require_once  __DIR__ . '/BFIGitHubPluginUploader.php';
		if ( is_admin() ) {
		    new BFIGitHubPluginUpdater( __FILE__, 'maxlian-lay', "hello-world" );
		}
  }

  /*
		 ____________________
		|
		| --- Create interface for Backend
		|____________________
  */

	public function form( $instance ){
    if($instance){
      extract($instance);
    }
    ?>
			<p>
	      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo (isset($title))? $title : '' ; ?>" />
			</p>
	    <p>
	      <label for="<?php echo $this->get_field_id( 'description' ); ?>">Description</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" value="<?php echo (isset($description))? $description : '' ; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'product_category_id' ); ?>">Product Category:</label>
				<select name="<?php echo $this->get_field_name('product_category_id'); ?>" id="<?php echo $this->get_field_id('product_category_id'); ?>" class="widefat">
					<option value="0">- Select Product Category -</option>
					<?php
						foreach (Loads::load_categories() as $cat) {
							if($cat->category_parent == 0) {
								$category_id = $cat->term_id;       
					?>
								<option <?php selected($category_id, $product_category_id) ?> value="<?php echo $category_id; ?>"><?php echo $cat->name; ?></option>
					<?php
							}
						}
					?>
				</select>
			</p>
				<?php
					include plugin_dir_path(__FILE__).'templates/bootstrap-options/bootstrap-options.php';
				?>
		<?php
	}

	public function widget( $args, $instance ){
		extract($args, EXTR_SKIP);
		extract($instance);

		echo $before_widget;
		include plugin_dir_path(__FILE__).'templates/main-view.php';
		echo $after_widget;
	}

} //Closing bracket for the class

add_action( 'widgets_init', function(){
	register_widget( 'product_banner' );
});
