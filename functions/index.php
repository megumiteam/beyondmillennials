<?php
/**
 * MASHING UP functions and definitions
 *
 * @package MASHING UP
 * @since 0.7.1
 * @version 0.7.1
 */

/**
 * MASHING UP reading basic function file
 */

// Reading setup theme
get_template_part( 'functions/base/setup-theme' );
get_template_part( 'functions/base/image-size' );
get_template_part( 'functions/base/nav-menus' );
get_template_part( 'functions/base/fonts' );
get_template_part( 'functions/base/scripts-styles' );

get_template_part( 'functions/admins/customizer' );

get_template_part( 'functions/admins/mod-admin-panel' );
