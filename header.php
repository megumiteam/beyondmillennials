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

<div class="container">