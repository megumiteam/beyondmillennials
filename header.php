<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php
	$favicon  = get_field( 'mashing-up_favicon', 'option' );
	$appTouch = get_field( 'mashing-up_apple_touch', 'option' );
?>
<?php if ( $favicon ) : ?><link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>"><?php echo "\n"; endif; ?>
<?php if ( $appTouch ) : ?><link rel="apple-touch-icon" href="<?php echo $appTouch; ?>?v=<?php echo date( 'Ymdhis' ) ?>"><?php echo "\n"; endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Heebo:400,700|Montserrat:600&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	$logo_data = '';
	$logo_url = get_field( 'mashing-up_header--logo', 'option' );
	if ( $logo_url ) {
		$logo_filename = $logo_url;
		$uploads = wp_upload_dir();
		if ( preg_match( '#^https?://#', $logo_filename ) ) {
			$logo_filename = str_replace( $uploads[ 'baseurl' ], $uploads[ 'basedir' ], $logo_filename );
		} else if ( preg_match( '#^/wp-content/uploads/#', $logo_filename ) ) {
			$logo_filename = untrailingslashit( ABSPATH ) . $logo_filename ;
		}

		$logo_size = @getimagesize($logo_filename);
		if ( $logo_size && isset($logo_size[2]) && $logo_size[2] ) {
			$logo_data = '<img src="' . $logo_url . '" alt="">';
		} else {
			$logo_data = file_get_contents( $logo_filename, false, $context );
		}
	}
?>

<div class="drawer">
	<div class="drawer-logo"><a href="<?php echo home_url(); ?>"><?php echo $logo_data; ?></a></div>
	<div class="drawer-close">メニューを閉じる</div>
	<div class="drawer-content">
		<div class="drawer-nav">
			<?php
				wp_nav_menu(array(
					'container' => false,
					'menu_class' => 'menu',
					'menu_id' => 'global_menu',
					'items_wrap' => '<ul>%3$s</ul>',
					'menu' => 'メインメニュー'
				));
			?>
		</div>
	</div>
</div>

<div class="container">
	<header class="header is-top">
		<div class="header-inner">
			<div class="header-logo<?php if ( is_home() ) { echo ' is-wait'; } ?>"><a href="<?php echo home_url( '/' ); ?>"><?php echo $logo_data; ?></a></div>
			<nav class="header-nav<?php if ( is_home() ) { echo ' is-wait'; } ?>">
				<?php
					wp_nav_menu(array(
						'container' => false,
						'menu_class' => 'menu',
						'menu_id' => 'global_menu',
						'items_wrap' => '<ul>%3$s</ul>',
						'menu' => 'メインメニュー'
					));
				?>
				<div class="nav-stalker"></div>
			</nav>
			<div class="header-misc<?php if ( is_home() ) { echo ' is-wait'; } ?>">
				<div class="header-nav-toggle">メニューを開く</div>
			</div>
		</div>
	</header>
