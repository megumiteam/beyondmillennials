<div class="image"><?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'post-thumbnail' );
	}
?></div>
<div class="text">
	<div class="name-en" lang="en"><?php the_field( 'mu_en_name', $post->ID ); ?></div>
	<div class="name-ja" lang="ja"><?php the_title(); ?></div>
	<div class="job"><?php the_field( 'mu_ja_title', $post->ID ); ?></div>
</div>
<div class="popup-content">
	<div class="speakers-detail">
		<div class="speakers-header">
			<div class="image"><?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'post-thumbnail' );
				}
			?></div>
			<div class="name-en" lang="en"><?php the_field( 'mu_en_name', $post->ID ); ?></div>
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
		<?php
			$related = get_field( 'mu_relation_session', $post->ID );
			if ( $related ) :
		?>
		<div class="speakers-related">
			<div class="speakers-related-title">登壇セッション</div>
			<div class="related-session">
			<?php foreach ( $related as $r ) : ?>
				<?php if ( 'publish' == $r->post_status ) : ?>
				<div class="related-item">
					<a href="<?php echo get_permalink( $r->ID ); ?>">
						<div class="related-title" lang="ja"><?php echo get_the_title( $r->ID ); ?></div>
						<div class="related-title" lang="en"><?php
							$related_en = get_field( 'mu_session_title_en', $r->ID );
							echo $related_en;
						?></div>
					</a>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>

		<div class="footer-shares">
			<div class="shares-title"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 167.415 55.467" title="Share"><path d="M66.855 2.573q.189.568.379.332c.126-.157.379-.2.759-.142q-.285-.759-.427-.57a1.539 1.539 0 0 1-.711.38 27.123 27.123 0 0 0-6.879.569 27.506 27.506 0 0 0-6.594 2.087c-.379 0-.538-.126-.474-.379q-3.984 1.614-7.4 2.941t-6.593 2.8a42.914 42.914 0 0 0-6.167 3.511 42.475 42.475 0 0 0-6.024 5.075 27.375 27.375 0 0 0 6.831 1.044q3.508.1 7.068-.048t7.115-.047a28.893 28.893 0 0 1 6.973 1.043 24.405 24.405 0 0 1 3.226 1.519 14.707 14.707 0 0 1 3.083 2.276A10.361 10.361 0 0 1 63.202 28a6.983 6.983 0 0 1 .616 3.7 5.606 5.606 0 0 1-1.66 3.7 39.731 39.731 0 0 0-2.893 3.131.907.907 0 0 1-.664-.285 14.216 14.216 0 0 1-2.514 2.135q-1.473 1-3.131 1.9t-3.368 1.755q-1.708.855-3.226 1.8a.437.437 0 0 1-.284-.474 28.061 28.061 0 0 1-4.981 2.7q-2.61 1.092-5.361 1.993t-5.549 1.755a53.131 53.131 0 0 0-5.455 1.992 19.975 19.975 0 0 0-4.649.522q-2.184.522-4.079 1c-.126 0-.19-.126-.19-.38a21.365 21.365 0 0 1-5.076.522 15.557 15.557 0 0 1-4.649-.758 10.039 10.039 0 0 1-3.747-2.23 8.279 8.279 0 0 1-2.277-3.985 7.461 7.461 0 0 1 .664-4.127 19.506 19.506 0 0 1 2.372-3.984 21.258 21.258 0 0 1 3.036-3.226 12.553 12.553 0 0 1 2.656-1.85 1.028 1.028 0 0 1 .095-.522.469.469 0 0 1 .237-.189.622.622 0 0 0 .285-.238 1.705 1.705 0 0 0 .237-.664.525.525 0 0 0 .664-.094l.569-.57a3.845 3.845 0 0 1 .57-.474.8.8 0 0 1 .759 0 3.876 3.876 0 0 1 1.375-1.281q.9-.52 1.85-1.043t1.755-1.044a2.747 2.747 0 0 0 1.091-1.186 3.66 3.66 0 0 0 2.562-.664 27.2 27.2 0 0 0 2.277-1.613 6.426 6.426 0 0 0 1.992-.379q1.138-.378 2.372-.806l2.466-.854a15.5 15.5 0 0 1 2.277-.617q-.949-.189-2.277-.475a10.3 10.3 0 0 1-2.466-.853 5.024 5.024 0 0 1-1.9-1.66 4.05 4.05 0 0 1-.475-2.989 5.184 5.184 0 0 1 2.229-2.419 9.3 9.3 0 0 0 2.609-2.135 21.537 21.537 0 0 0 5.123-2.561 18.362 18.362 0 0 1 5.313-2.467q3.036-1.424 6.5-2.8a73.533 73.533 0 0 1 7.163-2.42A74.447 74.447 0 0 1 61.587.582a39.766 39.766 0 0 1 7.732-.57 3.275 3.275 0 0 1 1.565 1.376 5.921 5.921 0 0 1 .807 2.229 8.728 8.728 0 0 1 0 2.562 6.041 6.041 0 0 1-.76 2.277 1.56 1.56 0 0 1-1.043-.759 2.044 2.044 0 0 1-.094-1.091 7.857 7.857 0 0 1 .332-1.329 8.037 8.037 0 0 0 .332-1.375 6.4 6.4 0 0 0-1.708-.664 15.618 15.618 0 0 0-2.182-.285.324.324 0 0 0 .1-.237c-.003-.096.059-.143.187-.143zm-33.3 45.538q3.7-1.707 7.494-3.32t7.4-3.463q3.6-1.851 6.879-3.937a35.467 35.467 0 0 0 6.024-4.839 4.935 4.935 0 0 0 .664-3.747 5.272 5.272 0 0 0-1.992-2.8 1.263 1.263 0 0 0-.759-.237 1.823 1.823 0 0 1-.854-.237 1.524 1.524 0 0 1-.759-.664 1.526 1.526 0 0 0-.854-.665 14.329 14.329 0 0 0-4.032-1.185 35.83 35.83 0 0 0-4.554-.38q-2.325-.047-4.506 0t-3.8-.048c-.064.254-.048.4.048.428a.31.31 0 0 0 .284-.048 1.278 1.278 0 0 1 .284-.142c.1-.032.143.047.143.237a3.531 3.531 0 0 1-2.419 1.043 16.8 16.8 0 0 0-2.894.285c0-.442-.063-.664-.189-.664v.854a67.292 67.292 0 0 0-10.958 3.558 40.524 40.524 0 0 0-9.725 5.834q-.473-.285-.664-.142a1.187 1.187 0 0 0-.332.427 1.163 1.163 0 0 1-.332.427c-.126.094-.316.016-.569-.238a1.594 1.594 0 0 1-.379.807 5.047 5.047 0 0 1-.9.949 4.761 4.761 0 0 1-1.043.664.825.825 0 0 1-.807.047 1.52 1.52 0 0 1-.806 1.375 1.53 1.53 0 0 0-.807 1.376c-.379-.062-.631-.031-.758.095a2.137 2.137 0 0 1-.57.38 20.162 20.162 0 0 1-1.423 2.04 22.2 22.2 0 0 0-1.612 2.371 13.973 13.973 0 0 0-1.234 2.7 7.3 7.3 0 0 0-.285 3.131 14.449 14.449 0 0 0 7.4 2.372 35.319 35.319 0 0 0 8.3-.617 84.2 84.2 0 0 0 8.348-2.04q4.133-1.226 7.548-1.987zM6.516 38.244c.064.128.064.143 0 .047s-.062-.109 0-.047zm1.139.759c-.126.19-.174.27-.143.237s.1-.094.19-.189.159-.157.19-.19-.048.016-.237.142zm0-2.087a1.352 1.352 0 0 0 .853-.427c.318-.284.318-.522 0-.711a.467.467 0 0 1-.474.521q-.474.049-.379.617zm3.13-2.467c.128.064.143.064.048 0s-.11-.062-.048 0zm.949-.759c.064.128.064.143 0 .048s-.062-.11 0-.048zm1.329-.854c-.126.19-.174.27-.143.238l.19-.19c.095-.1.159-.157.189-.19s-.047.016-.236.142zm2.087-1.612a.653.653 0 0 0-.854.284c-.19.318-.126.538.189.664a.439.439 0 0 1 .285-.474.6.6 0 0 0 .38-.474.787.787 0 0 0 .9-.237q.427-.428-.047-.712c0 .317-.11.507-.333.569a.911.911 0 0 0-.52.38zm3.415-2.087h-.285q0 .38-.426.379c-.285 0-.428.128-.428.38-.317-.126-.474-.063-.474.189h-.474c-.062.318.095.475.474.475-.19.19-.268.3-.237.332a.276.276 0 0 0 .19.047.32.32 0 0 0 .237-.1c.062-.062 0-.157-.19-.284v-.475c.252 0 .411-.062.474-.189.316-.063.584-.126.807-.19s.332-.252.332-.569c.126-.063.142-.11.047-.143s-.112.022-.047.148zm.854-.38c-.19 0-.27.048-.237.142a1.6 1.6 0 0 0 .094.238.094.094 0 0 0 .143.047q.093-.047 0-.427c.189-.126.237-.19.142-.19s-.142.064-.142.191zm1.9-.759c0 .38.11.46.332.237s.11-.3-.332-.237c0-.126.031-.189.095-.189s.1-.063.1-.19a.846.846 0 0 0-.711.19c-.285.189-.27.348.047.474 0-.126.047-.19.142-.19a.756.756 0 0 0 .324-.095zm.38-.379c.126.064.142.064.047 0s-.114-.061-.046 0zm1.423-.759q1.043.19 1.138-.38a1.169 1.169 0 0 0-1.141.378zm.664.949c.062.127.062.142 0 .047s-.067-.11-.003-.047zm1.328-1.8c-.128.19-.159.27-.095.237a.549.549 0 0 0 .19-.19 1.281 1.281 0 0 1 .142-.189c.028-.034-.051.013-.24.139zm1.613-.474a3.486 3.486 0 0 1 1.613 0c.125-.38.347-.537.664-.475s.536-.157.664-.664a12.979 12.979 0 0 0-1.518.285 3.075 3.075 0 0 0-1.426.851zm1.423-7.495c.062-.252.095-.347.095-.285v.475c-.003.06-.036-.003-.098-.193zm2.656 6.356c.126.19.19.237.19.143s-.064-.143-.19-.143v-.474a.671.671 0 0 0-.664.474zm-.379-2.277c.062.254.1.348.1.285v-.475c-.008-.065-.041-.003-.103.187zm.664-8.918c.062.128.062.143 0 .048s-.067-.113-.003-.051zm.474 10.768c-.063-.1-.063-.11 0-.047.06.124.06.136-.003.044zm.38-11.432c.062.19.142.254.237.19a.276.276 0 0 0 .142-.237.193.193 0 0 0-.1-.19c-.061-.034-.156.044-.282.234zm.474 10.246c.126.254.221.348.285.285a.328.328 0 0 0 .095-.237.281.281 0 0 0-.143-.238c-.098-.065-.178-.003-.24.187zm.664 1.613c.063.317.19.379.38.19s.062-.252-.38-.19q.189-.568.57-.427a5.262 5.262 0 0 0 .854.237v-1.138a4.824 4.824 0 0 1-.854.379c-.064 0-.095-.22-.095-.664a.649.649 0 0 0-.57.475.65.65 0 0 1-.569.474c.19-.063.316-.063.38 0a.327.327 0 0 1 .094.237v.285c-.003.092.06.139.187.139zm-.379-9.582c0 .127-.048.19-.143.19s-.05-.066.139-.193zm0 0c0-.252.031-.394.095-.427a.156.156 0 0 1 .189.048.218.218 0 0 1 .048.237c-.036.092-.146.139-.336.139zm1 4.554a.538.538 0 0 1 .047.237.532.532 0 0 1-.047.237c-.033.064-.08 0-.142-.19.055-.255.102-.349.138-.287zm.237-5.408v.475c0 .063-.033-.032-.095-.285.054-.192.088-.255.088-.192zm2.8 9.3a.279.279 0 0 0 .142-.237.185.185 0 0 0-.142-.19q-.143-.048-.427.237.277.28.419.188zm1.186-.475c-.128.19-.175.27-.143.238l.19-.19.19-.19q.036-.052-.245.137zm.474.285h.664q0-.663-.664-.475zm.38-14.61v.19c-.254.317-.349.474-.285.474a.724.724 0 0 0 .332-.19.761.761 0 0 0 .285-.379c.023-.131-.088-.162-.34-.097zm.758 2.941c-.063-.063-.063-.048 0 .047s.055.075-.008-.052zm.19-1.8c.062.254.11.348.142.285a.612.612 0 0 0 0-.475c-.04-.07-.088-.008-.15.182zm.19 1.613q-.1-.093.048 0t-.056-.008zm.142-2.751a.521.521 0 0 0 .048-.237.528.528 0 0 0-.048-.238c-.032-.062-.08.033-.142.285.054.185.102.246.134.185zm.806 14.989c-.063-.062-.063-.047 0 .048s.055.072-.008-.056zm.665-13.377c.062-.252.109-.346.142-.284a.538.538 0 0 1 .047.237.532.532 0 0 1-.047.237c-.041.056-.088-.007-.15-.198zm.948-3.225q0 .664.19.664c-.127-.316-.033-.458.285-.427s.442-.11.379-.427a.347.347 0 0 0-.426.1.346.346 0 0 1-.436.082zm.854 1.138a.723.723 0 0 1-.284.1c-.064 0-.1.064-.1.19a.324.324 0 0 1 .237-.1c.092-.008.139-.07.139-.198zm.949-1.612q.189.475.569.142c.252-.221.221-.394-.095-.522a.167.167 0 0 1-.189.19.3.3 0 0 0-.293.182zm.664 2.277q.189-.285.285-.238a.194.194 0 0 1 .094.19.276.276 0 0 1-.142.237c-.102.056-.184-.008-.245-.197zm1.139-.665a.428.428 0 0 1 .379.143.316.316 0 0 0 .285.142c.062.19-.08.27-.427.237s-.435-.213-.245-.53zm1.138-.189c0 .127-.033.174-.095.142s-.041-.083.087-.15zm.142-1.8a.531.531 0 0 0 .048-.237.537.537 0 0 0-.048-.237c-.032-.062-.08 0-.142.19.054.243.102.337.134.273zm.285 1.565a.187.187 0 0 1 .142.19.276.276 0 0 1-.142.237c-.095.064-.237 0-.427-.189q.276-.296.419-.244zM47.5 42.608c.062.128.062.142 0 .048s-.063-.11 0-.048zm1.186-37.806l.189-.19.19-.189c.031-.031-.047.016-.237.142-.128.193-.174.27-.141.237zm.806 2.324c0-.126.047-.189.142-.189a.756.756 0 0 0 .332-.1c0 .127-.047.19-.142.19a.777.777 0 0 0-.331.099zm1.138-.474c0 .128-.032.175-.094.142s-.036-.078.095-.142zm0 0c.062-.316.19-.363.38-.142s.063.27-.379.142zm1.139-.664a.631.631 0 0 1 .142.237c.031.1.015.159-.047.19s-.159-.047-.285-.237c.063-.19.127-.252.191-.19zm.474-2.277c-.127.19-.175.27-.142.237l.19-.189.19-.19c.031-.031-.047.016-.237.142zm1.8-.948c0 .443.031.664.1.664s.109-.079.142-.238a1.219 1.219 0 0 0 0-.474c-.034-.157-.112-.142-.238.043zm1.613 0a.432.432 0 0 1-.332.047c-.095-.031-.143.016-.143.142.319 0 .479-.062.479-.194zm.664 2.087a.539.539 0 0 1-.664.379c.066-.252.288-.379.668-.379zm2.087-3.036a.953.953 0 0 1-.427.1c-.159 0-.237.063-.237.189a.854.854 0 0 1 .379-.1.3.3 0 0 0 .289-.189zm-.285 22.389c-.253 0-.379.064-.379.19.257 0 .383-.062.383-.19zm.759-22.342c-.064-.1-.064-.11 0-.047.066.127.066.144.004.044zm.664 2.23c-.127.189-.253.269-.379.237a.3.3 0 0 1-.237-.19c-.033-.1-.017-.157.047-.19s.256.017.573.143zm1.993-.38c-.064-.062-.048-.062.047 0s.083.064-.043 0zm2.087-.474c0 .127-.159.19-.475.19.004-.126.162-.19.479-.19zm.664-1.613a.423.423 0 0 1-.332.047c-.095-.031-.143.017-.143.143.32 0 .479-.063.479-.19zm4.079.664c.063.253.11.348.143.285a.624.624 0 0 0 0-.475c-.029-.062-.076 0-.139.19z"/><path d="M90.287 7.791a3.162 3.162 0 0 0 .568 1.233 1.888 1.888 0 0 1 .191 1.518q-.477.475-.712.047t-.9-.237a31.254 31.254 0 0 0-5.219 4.6 51.994 51.994 0 0 0-4.363 5.5q-1.993 2.9-3.843 5.977t-3.653 6.214a9.35 9.35 0 0 0 2.324-1.8q1.09-1.138 2.325-2.277a15.285 15.285 0 0 1 2.705-1.992 8.556 8.556 0 0 1 3.556-1.043 11.711 11.711 0 0 1 1.328 2.419 11.348 11.348 0 0 1 .76 2.609 1.253 1.253 0 0 0 .522.664 2.969 2.969 0 0 1 .617.474 19.363 19.363 0 0 0 4.933-.9 37.329 37.329 0 0 0 3.985-1.613q1.895-.9 3.747-1.85a19.324 19.324 0 0 1 4.127-1.518 12.6 12.6 0 0 1-2.894 2.894 24.359 24.359 0 0 1-3.51 2.087q-1.851.9-3.748 1.8a23.643 23.643 0 0 0-3.509 2.039 6.733 6.733 0 0 1-4.934-1.186 5.831 5.831 0 0 1-2.088-4.506 10.325 10.325 0 0 0-3.842 1.992 36.746 36.746 0 0 0-2.988 2.846q-1.423 1.52-2.893 2.942A11.365 11.365 0 0 1 69.416 39a1.661 1.661 0 0 1-1.234-.616 8.333 8.333 0 0 0-.853-1 30.24 30.24 0 0 1 2.371-6.726 53.727 53.727 0 0 1 3.32-5.74q1.8-2.7 3.748-5.313a52.468 52.468 0 0 0 3.558-5.455 28.69 28.69 0 0 0 3.7-3.368 17.167 17.167 0 0 1 3.984-3.178 2.036 2.036 0 0 1 1.234 0 2.752 2.752 0 0 0 1.043.187z"/><path d="M108.69 29.137c.126.063.19 0 .19-.19a.3.3 0 0 0 .19-.285.833.833 0 0 1 .1-.379c-.128 0-.191.08-.191.237a.954.954 0 0 1-.094.427c-.127-.062-.19 0-.19.19a2.285 2.285 0 0 0-.474.711 2.373 2.373 0 0 1-.474.712c-.128-.062-.19-.316-.19-.759a17.133 17.133 0 0 0-2.466 1.707l-2.278 1.9q-1.14.949-2.324 1.8a11.466 11.466 0 0 1-2.7 1.423 2.7 2.7 0 0 1-2.515-.9 10.048 10.048 0 0 1-1.185-2.23 20.773 20.773 0 0 1 4.174-6.071 17.558 17.558 0 0 1 6.357-3.985 9.063 9.063 0 0 1 1.85.712q.806.426 1.755.9.947-.568 1.85-1.138t1.755-1.139a2.143 2.143 0 0 1 .948.38 1.329 1.329 0 0 0 1.139.1 3.188 3.188 0 0 1-.047 2.229 22.226 22.226 0 0 1-1 2.182 20.314 20.314 0 0 0-1.044 2.372 5.178 5.178 0 0 0-.191 2.8.918.918 0 0 0 .571.38 1.226 1.226 0 0 1 .568.284q2.562-1.137 4.839-2.418t4.743-2.609c0 .253-.047.412-.142.474s-.142.222-.142.474a3.753 3.753 0 0 1 .948-.616q.663-.333.19-.807a1.415 1.415 0 0 0 1.234-.474 2.16 2.16 0 0 0 .664-1.139 1.224 1.224 0 0 0 1.328.143 5.067 5.067 0 0 1 1.328-.522 11.871 11.871 0 0 1-3.084 3.225q-1.944 1.423-3.652 2.467a13.5 13.5 0 0 0-1.755 1.186q-.9.711-1.85 1.328a14.943 14.943 0 0 1-1.993 1.091 5.182 5.182 0 0 1-2.181.475 8.048 8.048 0 0 1-1.471-.522q-.712-.332-1.471-.617a6.005 6.005 0 0 1-1.185-2.846q-.242-1.619-.432-2.663zM97.306 33.69a2.179 2.179 0 0 0 1.754-.854 10.242 10.242 0 0 1 1.187-1.422q1.706-1.139 3.368-2.325a17.431 17.431 0 0 0 2.988-2.7 6.331 6.331 0 0 0-3.036.712 10.264 10.264 0 0 0-2.419 1.8 17.977 17.977 0 0 0-1.992 2.372q-.901 1.279-1.85 2.417z"/><path d="M136.675 26.196a.927.927 0 0 1-.046-1.092 1.891 1.891 0 0 0 .332-1.185 27.041 27.041 0 0 0-8.54 6.072 70.034 70.034 0 0 0-6.735 8.253 11.156 11.156 0 0 1-1.518-.806 2.848 2.848 0 0 1-1.043-1.281 13.516 13.516 0 0 1 1.328-3.51 29.3 29.3 0 0 1 1.9-2.941q1.044-1.423 2.135-2.751a19.507 19.507 0 0 0 1.944-2.847 2.759 2.759 0 0 1 1.614 2.467 14.947 14.947 0 0 0 1.945-1.471q.9-.8 1.849-1.565a15.451 15.451 0 0 1 2.04-1.375 7.054 7.054 0 0 1 2.609-.807 1.7 1.7 0 0 1 1.233.807 3.5 3.5 0 0 1 .57 1.565 2.862 2.862 0 0 1-.285 1.613 1.545 1.545 0 0 1-1.332.854z"/><path d="M141.609 32.078a3.728 3.728 0 0 1-.854-.474 3.348 3.348 0 0 1-.664-.665 2.459 2.459 0 0 0-.854.949l-.569 1.138a17.75 17.75 0 0 0 7.636-.142 62.365 62.365 0 0 0 7.543-2.277q3.7-1.374 7.115-2.656a20.238 20.238 0 0 1 6.452-1.376 2.427 2.427 0 0 1-1.8 1.66 9.368 9.368 0 0 0-2.751 1.091.676.676 0 0 0-.475-.664.346.346 0 0 0 .1.427c.127.1.158.27.1.522a28.127 28.127 0 0 1-3.274 1.186 34.264 34.264 0 0 0-3.557 1.281 1.517 1.517 0 0 0-.616.569 1.449 1.449 0 0 1-.712.569 4.991 4.991 0 0 1-1.8.474 8.352 8.352 0 0 0-2.087.475c-.508.189-1.139.427-1.9.711s-1.55.555-2.372.807-1.645.474-2.466.664a9.841 9.841 0 0 1-2.182.284 4.866 4.866 0 0 1-3.178-1.185 9.977 9.977 0 0 1-2.041-2.7 3.632 3.632 0 0 1 .428-2.182 5.444 5.444 0 0 0 .711-1.9 3.719 3.719 0 0 0 1.186-.806q.523-.521 1.044-1.091a10.189 10.189 0 0 1 1.043-1 1.624 1.624 0 0 1 1.282-.332q1.707-1.517 3.652-2.941a6.362 6.362 0 0 1 4.6-1.139 10.744 10.744 0 0 0 .9 1.329 1.865 1.865 0 0 1 .428 1.422c-.065.507-.254.807-.571.9a2.331 2.331 0 0 0-1.043.9.6.6 0 0 0 0 .474.614.614 0 0 1 0 .475 8.248 8.248 0 0 1-1.09 1.091q-.9.807-1.994 1.707t-2.086 1.613a5.366 5.366 0 0 1-1.376.807 1.736 1.736 0 0 1-1.138 0 .8.8 0 0 0-.77.005zm-.189-2.941h.473v-.479h-.473zm.664-.285a24.936 24.936 0 0 0 3.272-1.755 10.22 10.22 0 0 0 2.7-2.514 30.482 30.482 0 0 0-3.273 1.9 13.12 13.12 0 0 0-2.699 2.369zm20.966-.19c.062.19.11.27.142.237a.374.374 0 0 0 .048-.237.382.382 0 0 0-.048-.237c-.032-.031-.08.048-.142.233zm1.329-.664c-.128.19-.16.27-.1.237a.53.53 0 0 0 .189-.19 1.476 1.476 0 0 1 .143-.189c.035-.031-.043.016-.232.142z"/></svg></div>
			<ul class="a2a_kit" data-a2a-url="<?php echo home_url( '/speakers/'); ?>#<?php echo $post->post_name; ?>" data-a2a-title="<?php the_title(); ?> - <?php bloginfo( 'name' ); ?>">
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
