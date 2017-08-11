<p>
  <label for="<?php echo $this->get_field_id( 'bootstrap_structure' ); ?>"><b>Bootstrap structure</b></label>
	<!-- <input type="checkbox" id="<?php echo $this->get_field_id( 'bootstrap_structure' ); ?>" name="<?php echo $this->get_field_name( 'bootstrap_structure' ); ?>" value="1" <?php checked( $bootstrap_structure, 1 ); ?> /> -->
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'bootstrap_container' ); ?>">Bootstrap Container</label>
	<input type="checkbox" id="<?php echo $this->get_field_id( 'bootstrap_container' ); ?>" name="<?php echo $this->get_field_name( 'bootstrap_container' ); ?>" value="1" <?php checked( $bootstrap_container, 1 ); ?> />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'bootstrap_full_width' ); ?>">Bootstrap Full Width</label>
	<input type="checkbox" id="<?php echo $this->get_field_id( 'bootstrap_full_width' ); ?>" name="<?php echo $this->get_field_name( 'bootstrap_full_width' ); ?>" value="1" <?php checked( $bootstrap_full_width, 1 ); ?> />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'no_column' ); ?>">No. of Column:</label>
	<select name="<?php echo $this->get_field_name('no_column'); ?>" id="<?php echo $this->get_field_id('no_column'); ?>">
		<option value="0">- No Column -</option>
		<option <?php selected(2, $no_column); ?> value="2">2</option>
		<option <?php selected(3, $no_column); ?> value="3">3</option>
		<option <?php selected(4, $no_column); ?> value="4">4</option>
	</select>
</p>