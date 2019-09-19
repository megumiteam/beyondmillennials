<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WWDJ
 * @since 0.71
 * @version 0.71
 */
?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_post_thumbnail( 'thumbnail' ); ?>
						<?php the_post_thumbnail( 'speakers_type_2_pc' ); ?>
						<?php the_post_thumbnail( 'speakers_type_1_sp' ); ?>
						<?php the_post_thumbnail( 'speakers_type_2_sp' ); ?>
					</article><!-- #post-## -->
