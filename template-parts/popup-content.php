<div class="image curtain-action brick is-shrink">
	<div class="curtain-content"><?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'speakers_thumb' );
		}
	?></div>
	<span></span>
	<span></span>
</div>
<div class="text">
	<div class="name-ja" lang="ja"><span><?php the_title(); ?></span></div>
	<div class="job"><?php the_field( 'mu_ja_title', $post->ID ); ?></div>
</div>
<div class="popup-content">
	<div class="speakers-detail">
		<div class="speakers-header">
			<div class="image"><?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'speakers_detail' );
				}
			?></div>
			<div class="name-ja" lang="ja"><?php the_title(); ?></div>
			<div class="job"><?php the_field( 'mu_ja_title', $post->ID ); ?></div>
		</div>
		<?php
			$mu_ja = get_field( 'mu_ja_profile', $post->ID );
			$mu_en = get_field( 'mu_en_profile', $post->ID );
			if ( $mu_ja || $mu_en ) :
		?>
		<div class="speakers-profile<?php if ( empty( $mu_en ) ) { echo ' no-en'; } ?>">
			<div class="item" lang="ja"><?php echo $mu_ja; ?></div>
			<?php if ( $mu_en ) : ?><div class="item" lang="en"><?php echo $mu_en; ?></div><?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ( has_term( array( 'keynote-speakers', 'speakers', 'game-changer' ), 'speaker_type' ) ) : ?>
			<?php
				$mu_recommend = get_field( 'mu_ja_editor_comment', $post->ID );
				if ( $mu_recommend ) :
			?>
			<div class="speakers-recommend">
				<div class="speakers-recommend-title">BI編集部からの推薦コメント</div>
				<div class="speakers-recommend-text"><?php echo $mu_recommend; ?></div>
			</div>
			<?php endif; ?>
		<?php endif; // BI編集部からの推薦コメント ?>

		<?php if ( has_term( array( 'advisory-board-members', 'game-changer' ), 'speaker_type' ) ) : ?>
			<?php
				$mu_editor_link = get_field( 'mu_ja_editor_link', $post->ID );
				if ( $mu_editor_link ) :
			?>
			<div class="speakers-editor-link no-en">
				<div class="speakers-editor-link-text" lang="ja"><?php echo $mu_editor_link; ?></div>
			</div>
			<?php endif; ?>
		<?php endif; // 編集記事リンクのみ掲出 ?>

		<?php if ( has_term( array( 'keynote-speakers', 'speakers' ), 'speaker_type' ) ) : ?>
			<?php
				$mu_session = get_field( 'mu_relation_session', $post->ID );
				$week = array( '[SUN]', '[MON]', '[TUE]', '[WED]', '[THU]', '[FRI]', '[SAT]' );
				if ( $mu_session ) :
			?>
			<div class="speakers-session">
				<div class="speakers-session-title"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 556.244 105.889"><path d="M12.787 70.549q.479 8.545 4.033 13.877 6.768 9.98 23.857 9.98a42.229 42.229 0 0013.945-2.187Q66.79 87.981 66.79 77.043q0-8.2-5.127-11.689-5.2-3.418-16.27-5.947l-13.6-3.076q-13.33-3.008-18.867-6.631-9.57-6.289-9.57-18.8 0-13.535 9.365-22.217T39.244.001q15.791 0 26.831 7.622t11.04 24.37H64.33q-1.025-8.066-4.375-12.373-6.219-7.862-21.119-7.862-12.031 0-17.295 5.059a15.832 15.832 0 00-5.264 11.758q0 7.383 6.152 10.8 4.033 2.187 18.252 5.469l14.082 3.213q10.186 2.324 15.723 6.357 9.57 7.041 9.57 20.439 0 16.68-12.134 23.857t-28.2 7.178q-18.73 0-29.326-9.57Q-.202 86.816.004 70.549zm113.34-42.451a33.4 33.4 0 0115.109 3.651 27.859 27.859 0 0111.143 9.468 32.664 32.664 0 014.922 12.92q1.094 5.059 1.094 16.133H104.73q.342 11.143 5.264 17.876t15.242 6.737q9.639 0 15.381-6.357a21.431 21.431 0 004.648-8.545h12.1a25.483 25.483 0 01-3.179 8.989 31.972 31.972 0 01-6.05 8.1 28.674 28.674 0 01-13.875 7.379 42.156 42.156 0 01-10.048 1.1 30.832 30.832 0 01-23.177-9.949q-9.5-9.946-9.5-27.856 0-17.637 9.57-28.643t25.021-11.006zm19.619 32.4q-.752-8-3.486-12.783-5.059-8.887-16.885-8.887a18.716 18.716 0 00-14.219 6.121q-5.742 6.118-6.084 15.552zm35.068 19.482q.547 6.152 3.076 9.434 4.648 5.947 16.133 5.947a23.792 23.792 0 0012.031-2.974 9.875 9.875 0 005.2-9.194 7.862 7.862 0 00-4.17-7.178q-2.666-1.5-10.527-3.486l-9.775-2.461q-9.365-2.324-13.809-5.2-7.93-4.99-7.93-13.809a21.1 21.1 0 017.481-16.81q7.485-6.426 20.132-6.426 16.543 0 23.857 9.707a21.066 21.066 0 014.443 13.262h-11.62a14.236 14.236 0 00-2.939-7.588q-4.238-4.854-14.7-4.854-6.973 0-10.562 2.666a8.355 8.355 0 00-3.589 7.041q0 4.785 4.717 7.656a28.344 28.344 0 008.066 3.008l8.135 1.982q13.264 3.213 17.772 6.221 7.178 4.717 7.178 14.834a22.606 22.606 0 01-7.417 16.885q-7.413 7.106-22.589 7.106-16.338 0-23.14-7.417a28.05 28.05 0 01-7.28-18.354zm70 0q.547 6.152 3.076 9.434 4.648 5.947 16.133 5.947a23.792 23.792 0 0012.031-2.974 9.875 9.875 0 005.2-9.194 7.863 7.863 0 00-4.17-7.178q-2.666-1.5-10.527-3.486l-9.775-2.461q-9.365-2.324-13.809-5.2-7.93-4.99-7.93-13.809a21.1 21.1 0 017.481-16.81q7.485-6.426 20.132-6.426 16.543 0 23.857 9.707a21.066 21.066 0 014.443 13.262h-11.62a14.236 14.236 0 00-2.939-7.588q-4.238-4.854-14.7-4.854-6.973 0-10.562 2.666a8.355 8.355 0 00-3.589 7.041q0 4.785 4.717 7.656a28.344 28.344 0 008.066 3.008l8.135 1.982q13.264 3.213 17.772 6.221 7.178 4.717 7.178 14.834a22.606 22.606 0 01-7.417 16.885q-7.413 7.106-22.589 7.106-16.338 0-23.14-7.417a28.05 28.05 0 01-7.28-18.354zm62.686-49.9h12.51v72.869H313.5zm0-27.549h12.51v13.945H313.5zm60.156 92.488q12.236 0 16.782-9.263a46.146 46.146 0 004.546-20.61q0-10.254-3.281-16.68-5.2-10.117-17.91-10.117-11.279 0-16.406 8.613t-5.127 20.781q0 11.689 5.127 19.482t16.269 7.794zm.479-67.4a33.152 33.152 0 0123.925 9.43q9.775 9.434 9.775 27.754 0 17.705-8.613 29.258t-26.728 11.554q-15.107 0-23.994-10.22t-8.887-27.446q0-18.457 9.365-29.395t25.158-10.937zm48.33 2.119h11.689v10.391A32.787 32.787 0 01445.16 30.9a29.349 29.349 0 0112.92-2.8q15.586 0 21.055 10.869 3.008 5.947 3.008 17.021v46.959h-12.507V56.806a24.986 24.986 0 00-1.982-10.8q-3.281-6.836-11.895-6.836a24.22 24.22 0 00-7.178.889 18.485 18.485 0 00-8.887 6.016 18.111 18.111 0 00-4 7.485 50.385 50.385 0 00-.923 11.04v38.349h-12.3zm85.171 50.242q.547 6.152 3.076 9.434 4.648 5.947 16.133 5.947a23.792 23.792 0 0012.031-2.974 9.875 9.875 0 005.2-9.194 7.862 7.862 0 00-4.17-7.178q-2.666-1.5-10.527-3.486l-9.775-2.461q-9.365-2.324-13.809-5.2-7.93-4.99-7.93-13.809a21.1 21.1 0 017.485-16.81q7.485-6.426 20.132-6.426 16.543 0 23.857 9.707a21.066 21.066 0 014.443 13.262h-11.62a14.236 14.236 0 00-2.939-7.588q-4.238-4.854-14.7-4.854-6.973 0-10.562 2.666a8.355 8.355 0 00-3.589 7.041q0 4.785 4.717 7.656a28.344 28.344 0 008.066 3.008l8.135 1.982q13.262 3.213 17.773 6.221 7.178 4.717 7.178 14.834a22.606 22.606 0 01-7.417 16.885q-7.414 7.106-22.588 7.106-16.338 0-23.14-7.417a28.05 28.05 0 01-7.28-18.354z" fill="#24242d"/></svg></div>
				<ul>
					<?php foreach ( $mu_session as $r ) : ?>
						<?php if ( 'publish' == $r->post_status ) : ?>
					<li>
						<a href="<?php echo get_permalink( $r->ID ); ?>">
							<div class="session-title"><?php echo get_the_title( $r->ID ); ?></div>
							<div class="session-info">
								<div class="session-date"><?php echo get_the_title( get_field( 'mu_session_date', $r->ID ) ); ?></div>
								<div class="session-time"><?php the_field( 'mu_session_start_time', $r->ID ); ?>-<?php the_field( 'mu_session_end_time', $r->ID ); ?></div>
							</div>
						</a>
					</li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		<?php endif; //登壇セッション ?>

		<?php
			$post_name  = $post->post_name;
			$title = get_the_title();
			$shares_path = '/';
			if ( has_term( array( 'game-changer', 'advisory-board-members', 'readers' ), 'speaker_type' ) ) {
				// ゲームチェンジャーまたはアドバイザリーボード
				$shares_path = '/award/';
			} else {
				$shares_path = '/speaker/';
			}
		?>
		<div class="footer-shares">
			<div class="shares-title">Share</div>
			<ul class="a2a_kit" data-a2a-url="<?php echo home_url( $shares_path ); ?>#<?php echo $post_name; ?>" data-a2a-title="<?php echo $title; ?> - <?php bloginfo( 'name' ); ?>">
				<li class="facebook">
					<a href="/#facebook" class="a2a_button_facebook">
						<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 18 18"><path d="M17.007 0H.993A.993.993 0 0 0 0 .993v16.014A.993.993 0 0 0 .993 18h8.628v-6.961H7.278V8.314h2.343v-2a3.274 3.274 0 0 1 3.494-3.591 19.925 19.925 0 0 1 2.092.106v2.43h-1.428c-1.13 0-1.35.534-1.35 1.322v1.73h2.7l-.351 2.725h-2.364V18h4.593a.993.993 0 0 0 .993-.993V.993A.993.993 0 0 0 17.007 0z"/></svg>
					</a>
				</li>
				<li class="twitter">
					<a href="/#twitter" class="a2a_button_twitter">
						<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 19 15.411"><path d="M6.017 15.411A10.985 10.985 0 0 0 17.1 4.328V3.8A8.58 8.58 0 0 0 19 1.794a8.762 8.762 0 0 1-2.217.633A4.107 4.107 0 0 0 18.472.316a9.682 9.682 0 0 1-2.428.95A3.77 3.77 0 0 0 13.194 0a3.966 3.966 0 0 0-3.906 3.906 2.058 2.058 0 0 0 .106.844A10.913 10.913 0 0 1 1.372.633a4.042 4.042 0 0 0-.528 2.006 4.194 4.194 0 0 0 1.689 3.272 3.558 3.558 0 0 1-1.794-.528 3.858 3.858 0 0 0 3.167 3.8 3.254 3.254 0 0 1-1.056.106 1.8 1.8 0 0 1-.739-.106 4 4 0 0 0 3.694 2.744 7.97 7.97 0 0 1-4.856 1.689 2.922 2.922 0 0 1-.95-.106 9.963 9.963 0 0 0 6.017 1.9" fill-rule="evenodd"/></svg>
					</a>
				</li>
			</ul>
		</div>

	</div>
</div>
