<?php
	extract($instance);
	$term_meta = get_term($product_category_id, 'product_cat');
	$thumbnail_id = get_woocommerce_term_meta( $term_meta->term_id, 'thumbnail_id', true );
	$image_url = wp_get_attachment_url( $thumbnail_id );
	
  if ( $bootstrap_container == 1 ) {
  	$container = ( $bootstrap_full_width == 1 )? 'container-fluid' : 'container' ;
  }
  switch ($no_column) {
  	case 2:
  		$no_column = 6;
  		$mod_counter = 2;
  		break;
  	
  	case 3:
  		$no_column = 4;
  		$mod_counter = 3;
  		break;

  	case 4:
  		$no_column = 3;
  		$mod_counter = 4;
  		break;

  	default:
  		$no_column = '';
  		break;
  }
  $index = 0;

?>

	<div class="<?php echo $container; ?>">
		<div class="row" style="background-image: url(<?php echo $image_url; ?>); height: 100vh; background-repeat: no-repeat; background-position: center;position: relative;">
			<div class="col-lg-12" style="position: absolute; bottom: 0;">
				<div class="row">
					<?php
						$child_terms = Loads::load_sub_categories($product_category_id);

						foreach ($child_terms as $child_term) {
							$child_term_meta = get_term($child_term->cat_ID, 'product_cat');
							$child_thumbnail_id = get_woocommerce_term_meta( $child_term_meta->term_id, 'thumbnail_id', true );
							$child_image_url = wp_get_attachment_url( $child_thumbnail_id );
					?>
						<div class="col-md-<?php echo $no_column; ?> col-xs-12">
							<div class="row">
								<div class="col-md-6">
									<img src="<?php echo $child_image_url; ?>" alt="Category Image">
								</div>
								<div class="col-md-6">
									Content
								</div>
							</div>
						</div>
					<?php
							$index++;
							if ( $index % $mod_counter == 0 ) {
								echo '</div><div class="row">';
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>







	