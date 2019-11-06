<div class="session-content">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
	<h1 class="page-title"><?php the_title(); ?></h1>
	<div class="session-content-inner">
		<section class="session-lead">
			<?php
				$lead_ja = get_field( 'mu_timetable_lead_ja', $post->ID );
				$lead_en = get_field( 'mu_timetable_lead_en', $post->ID );
			?>
			<?php if ( $lead_ja ) : ?><div class="item" lang="ja"><?php echo $lead_ja; ?></div><?php endif; ?>
			<?php if ( $lead_en ) : ?><div class="item" lang="en"><?php echo $lead_en; ?></div><?php endif; ?>
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
			<div class="session-table">
				<?php
					$date = get_the_time( 'Y.m.d', $day->ID ) ;
					$date_link = get_the_time( 'Y-m-d', $day->ID ) ;
					$datetime = new DateTime( $date_link );
					$w = (int)$datetime->format( 'w' );
					$date_set = $date . '［' . $week[ $w ] . '］';
				?>
				<h2 class="session-date-title" id="<?php echo $date_link; ?>"><?php echo $date_set; ?></h2>

				<div class="timeline-wrapper">
					<div class="timeline-times">
					<?php
						$sessionDay = get_the_time( 'Y-m-d', $day->ID );
						$start = get_field( 'mu_day_start', $day->ID );
						$end   = get_field( 'mu_day_end', $day->ID );

						$minute_end = mb_substr( $start, -1 );

						$even = false;
						if ( $minute_end == 5 ) {
							$even = true;
						}

						$time_start = strtotime ( $sessionDay . ' ' . $start . ':00' );
						$time_end   = strtotime ( $sessionDay . ' ' . $end . ':00' );

						$diff = $time_end - $time_start;

						$rows = $diff/300 + 1;

						$temp = $time_start;

						$j = 0;
						if ( $even === true ) {
							$j = 1;
						}

						for ( $i = 0; $i < $rows; $i++ ) {
							if ( $j%2 === 0 ) {
								$timeline_class = 'show';
							} else {
								$timeline_class = 'hide';
							}

							echo '<div class="timeline timeline-' . $timeline_class . ' time-' . date( 'H-i', $temp ) . '"><span>' . date( 'H:i', $temp ) . '</span></div>';
							$temp += 300;
							$j++;
						}
					?>
					</div>

					<div class="session-items-wrapper">
						<div class="timeline-header">
							<?php foreach ( $rooms as $room ) : ?>
							<div class="room">
								<div class="room-inner"><?php
									echo '<span>' . preg_replace( '/( |　)/', '</span>', $room->name, 1 );
								?></div>
							</div>
							<?php endforeach; ?>
						</div>

						<div class="timeline-body">
							<?php foreach ( $rooms as $room ) : ?>
							<?php
								$sessions = get_posts(array(
										'post_type' => 'session',
										'posts_per_page' => -1,
						        'orderby' => array(
						        	'mu_session_start_time' => 'ASC'
						        ),
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
							<div class="session-items <?php echo $room->slug; ?>">
								<?php foreach ( $sessions as $post ) : setup_postdata( $post ); ?>
								<?php
									$card_start = get_field( 'mu_session_start_time' );
									$card_end   = get_field( 'mu_session_end_time' );

									$ex_end  = get_field( 'mu_session_exclude_end' );
									$ex_time = get_field( 'mu_session_exclude_time' );

									$card_time = $card_start . ' -' . $card_end;

									if ( $ex_end ) {
										$card_time = $card_start . ' -';
									}

									if ( $ex_time ) {
										$card_time = '';
									}

									$session_time = str_replace( ':', '-', $card_start );


									$card_start = strtotime ( $sessionDay . ' ' . $card_start . ':00' );
									$card_end   = strtotime ( $sessionDay . ' ' . $card_end . ':00' );

									$card_diff = $card_end - $card_start;
									$card_row  = $card_diff/300;
								?>
								<div class="card card-row-<?php echo $card_row; ?>" data-time="<?php echo $session_time; ?>">
									<div class="card-inner">
										<div class="time"><?php echo $card_time; ?></div>
										<div class="info">
											<div class="title" lang="ja">
												<a href="<?php the_permalink(); ?>">
													<span lang="ja"><?php the_title(); ?></span>
													<span lang="en"><?php the_field( 'mu_session_title_en' ); ?></span>
												</a>
											</div>
										</div>
										<?php
											$speakers = get_field( 'mu_session_speaker' );
											if ( $speakers ) :
										?>
										<div class="speakers">
											<?php foreach ( $speakers as $speaker ) : ?>
											<div class="speaker">
												<div class="image"><?php
													if ( has_post_thumbnail( $speaker->ID ) ) {
														echo get_the_post_thumbnail( $speaker->ID, 'post-thumbnail' );
													}
												?></div>
												<div class="text">
													<div class="name"><?php echo get_the_title( $speaker->ID ); ?></div>
													<?php
														$job = get_field( 'mu_title_abbr', $speaker->ID );
														if ( empty ( $job ) ) {
															$job = get_field( 'mu_ja_title', $speaker->ID );
														}
														if ( $job ) :
													?>
													<div class="job"><?php echo $job; ?></div>
													<?php endif; ?>
												</div>
											</div>
											<?php endforeach; ?>
										</div>
										<?php endif; ?>

										<?php
											$session_sponsors = get_field( 'mu_session_sponsor' );
											if ( $session_sponsors ) :
										?>
										<div class="sponsor">
											<div class="sponsors">
												<div class="sponsor-pfrefix">Sponsored by</div>
												<?php foreach ( $session_sponsors as $session_sponsor ) : ?>
												<?php
													$link = get_field( 'mu_sponsor_link_url', $session_sponsor->ID );
													$img  = get_the_post_thumbnail( $session_sponsor->ID, 'post-thumbnail' );
												?>
												<a href="<?php echo $link; ?>" target="_blank"><?php
													if ( $img ) {
														echo $img;
													} else {
														echo get_the_title( $session_sponsor->ID );
													}
												?></a>
												<?php endforeach; ?>
											</div>
										</div>
										<?php endif; ?>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
							<?php endforeach; ?>
						</div>

					</div>

					<div class="session-table-note">
						<?php
							$note_ja = get_field( 'mu_timetable_note_ja', $post->ID );
							$note_en = get_field( 'mu_timetable_note_en', $post->ID );
						?>
						<?php if ( $note_ja ) : ?><span lang="ja"><?php echo $note_ja; ?></span><?php endif; ?>
						<?php if ( $note_en ) : ?><span lang="en"><?php echo $note_en; ?></span><?php endif; ?>
					</div>

				</div>

			</div>
			<?php endforeach; // $days ?>
		</section>
		<?php endif; // $days && $rooms  ?>

		<?php
			$sponsor_list = get_field( 'mu_timetable_sponsor_types' );
			if ( ! empty( $sponsor_list ) ) :

			$sponsor_types = get_terms( 'sponsor_type', array(
					'include' => $sponsor_list,
					'orderby' => 'menu_order'
				));

			$sponsor_merged = array();

			if ( $sponsor_types ) {

				foreach ( $sponsor_types as $sponsor_type ) {
					$slug = $sponsor_type->slug;

					$sponsors = get_posts(array(
							'post_type' => 'sponsor',
							'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'tax_query' => array(
								array(
									'taxonomy' => 'sponsor_type',
									'field'    => 'slug',
									'terms'    => $slug
								)
							)

						));
					if ( $sponsors ) {
						$sponsor_merged = array_merge( $sponsor_merged, $sponsors );
					}
				}

			}
		?>
		<?php if ( $sponsor_merged ) : ?>
		<section class="timetable-sponsor-list">
			<ul>
				<?php foreach ( $sponsor_merged as $post ) : setup_postdata( $post ); ?>
				<li>
					<div class="data">
						<div class="logo"><a href="<?php the_field( 'mu_sponsor_link_url' ); ?>" target="_blank"><?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'full' );
							} else {
								the_title();
							}
						?></a></div>
						<div class="info" lang="ja"><?php the_content(); ?></div>
						<div class="info" lang="en"><?php the_field( 'mu_en_sponsor_content' ); ?></div>
					</div>
				</li>
				<?php endforeach; wp_reset_postdata(); ?>
			</ul>
		</section>
		<?php endif; ?>
		<?php endif; //  ! empty( $sponsor_list ) ?>

	</div>
<?php endwhile; endif; ?>
</div>
