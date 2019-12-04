<div class="session-content">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
	<h1 class="page-title"><?php the_title(); ?></h1>
	<div class="session-content-inner">
		<section class="session-lead">
			<?php
				$lead_ja = get_field( 'mu_session_lead_ja', $post->ID );
			?>
			<?php if ( $lead_ja ) : ?><div class="item"><?php echo $lead_ja; ?></div><?php endif; ?>
		</section>

		<?php
			$week = array( 'SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT' );
			$rooms = get_terms( 'session_room',array(
					'orderby' => 'menu_order'
				));

			$days = get_posts(array(
					'post_type' => 'schedule',
					'posts_per_page' => -1,
					'post_status' => array( 'publish', 'future' ),
					'order' => 'ASC'
				));

			if ( $days ) :
		?>
		<div class="timetable-scroller">
			<?php foreach ( $days as $day ) : ?>
			<?php
				$date = get_the_time( 'Y.m.d', $day->ID ) ;
				$date_link = get_the_time( 'Y-m-d', $day->ID ) ;
				$datetime = new DateTime( $date_link );
				$w = (int)$datetime->format( 'w' );
				$date_set = $date . '［' . $week[ $w ] . '］';
			?>
			<div class="button-link"><a class="inpage" href="#<?php echo $date_link; ?>"><?php echo $date_set; ?></a></div>
			<?php endforeach; ?>
		</div>
		<?php endif; // $days ?>

		<?php if ( $days && $rooms ) : ?>
		<section class="session-lists">
		<?php foreach ( $days as $day ) : ?>
			<?php
				$date = get_the_time( 'Y.m.d', $day->ID ) ;
				$date_link = get_the_time( 'Y-m-d', $day->ID ) ;
				$date_set = $date . '［' . $week[ $w ] . '］';
			?>
			<h2 class="session-date-title" id="<?php echo $date_link; ?>"><?php echo $date_set; ?></h2>
			<?php foreach ( $rooms as $room ) : ?>
			<?php
				$sessions = get_posts(array(
						'post_type' => 'session',
						'posts_per_page' => -1,
						'orderby' => 'meta_value',
						'meta_key' => 'mu_session_start_time',
						'order' => 'ASC',
						'meta_query' => array(
							array(
								'key' => 'mu_session_date',
								'value' => $day->ID
							),
						),
					  'tax_query' => array(
					    array(
					      'taxonomy' => 'session_room',
					      'field' => 'slug',
					      'terms' => $room->slug
					    )
					  )
					));
			?>
			<?php if ( $sessions ) : ?>
			<h3 class="session-room-title"><?php
				echo '<span>' . preg_replace( '/( |　)/', '</span>', $room->name, 1 );
			?></h3>

			<div class="session-list <?php echo $room->slug; ?>">
				<?php foreach ( $sessions as $post ) : setup_postdata( $post ); ?>
				<div class="item">
					<div class="time"><?php
						the_field( 'mu_session_start_time' );
						echo ' - ';
						the_field( 'mu_session_end_time' );
					?></div>
					<div class="info">
						<div class="type"><?php
							$types = get_the_terms( $post->ID, 'session_type' );
							if ( $types ) {
								foreach ( $types as $type ) {
									echo $type->name;
								}
							}
						?></div>
						<div class="title">
							<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
						</div>
						<div class="lead"><?php
							$lead_ja = get_field( 'mu_session_summary_ja' );
							echo mb_strimwidth( wp_strip_all_tags( $lead_ja ), 0, 214, '…', 'UTF-8' );
						?></div>
					</div>
					<?php
						$sponsors = get_field( 'mu_session_sponsor' );
						if ( $sponsors ) :
					?>
					<div class="sponsor">
						<div class="sponsor-inner">
							<div class="sponsor-pfrefix">Sponsored by</div>
							<?php foreach ( $sponsors as $sponsor ) : ?>
								<?php
									$link = get_field( 'mu_sponsor_link_url', $sponsor->ID );
									$image = get_the_post_thumbnail( $sponsor->ID, 'full' );
									if ( empty($image) ) {
										$image = get_the_title( $sponsor->ID );
									}
								?>
								<a href="<?php echo $link; ?>" target="_blank" rel="noopener"><?php echo $image; ?></a>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>

			<?php endif; wp_reset_postdata(); // $sessions ?>
			<?php endforeach; // $rooms ?>

		<?php endforeach; // $days ?>
		</section>
		<?php endif; // $days && $rooms  ?>

	</div>
<?php endwhile; endif; ?>
</div>
