<?php
function my_manage_posts_columns_session_display($columns) {
	$columns[ 'session_date' ] = '開催日';
	return $columns;
}
function my_add_column_session_display($column_name, $post_id) {
	if( $column_name == 'session_date' ) {
		$cf_data = get_post_meta( $post_id , 'mu_session_date' , true );
		$stitle = get_the_time( 'Y年n月j日', $cf_data );
	}

	if ( isset($stitle) && $stitle ) {
		echo esc_attr($stitle);
	}
}
function my_manage_edit_session_display_sortable_columns($columns){
	$columns['session_date'] = 'session_date';
	return $columns;
}
function my_manage_edit_session_display_sortable_columns_order( $query ) {
	if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
		switch( $orderby ) {
			case 'session_date':
				$query->set( 'meta_key', 'mu_session_date' );
				$query->set( 'orderby', 'meta_value' );
				break;
		}
	}
}
add_filter( 'manage_edit-session_columns', 'my_manage_posts_columns_session_display' );
add_action( 'manage_session_posts_custom_column', 'my_add_column_session_display', 10, 2 );
add_filter( 'manage_edit-session_sortable_columns', 'my_manage_edit_session_display_sortable_columns');
add_action( 'pre_get_posts', 'my_manage_edit_session_display_sortable_columns_order', 1 );


function my_manage_posts_columns_sponsor_type($columns) {
	$columns['sponsor_type'] = "スポンサー種別";
	return $columns;
}
function my_add_column_sponsor_type($column_name, $post_id) {
	if( $column_name == 'sponsor_type' ) {
		$tax = wp_get_object_terms( $post_id, 'sponsor_type' );
		$stitle = $tax[0]->name;
	}

	if ( isset($stitle) && $stitle ) {
		echo esc_attr($stitle);
	}
}
function my_add_post_taxonomy_restrict_filter() {
	global $post_type;
	if ( 'sponsor' == $post_type ) :
?>
	<select name="sponsor_type">
		<option value="">カテゴリー指定なし</option>
		<?php
			$terms = get_terms('sponsor_type');
			foreach ($terms as $term) :
		?>
		<option value="<?php echo $term->slug; ?>" <?php if ( $_GET['sponsor_type'] == $term->slug ) { print 'selected'; } ?>><?php echo $term->name; ?></option>
		<?php endforeach; ?>
	</select>
<?php
	endif;
}
add_filter( 'manage_edit-sponsor_columns', 'my_manage_posts_columns_sponsor_type' );
add_action( 'manage_sponsor_posts_custom_column', 'my_add_column_sponsor_type', 10, 2 );
add_action( 'restrict_manage_posts', 'my_add_post_taxonomy_restrict_filter' );


function tax_filter() {
	global $post_type;
	if ( $post_type === 'speaker' ) : ?>
		<select name="speaker_type">
			<option value="">タクソノミー指定なし</option>
			<?php
				$terms = get_terms( 'speaker_type' );
				foreach ( $terms as $term ) :
			?>
			<option value="<?php echo $term->slug; ?>" <?php if ( $_GET[ 'speaker_type' ] == $term->slug ) { print 'selected'; } ?>><?php echo $term->name; ?></option>
			<?php endforeach; ?>
		</select>
<?php endif;
}
add_action( 'restrict_manage_posts', 'tax_filter' );
