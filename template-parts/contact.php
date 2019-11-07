<section class="block contact-block" id="contact">
	<div class="contact-block-inner">
		<h2 class="section-title">Contact</h2>

		<div class="contact-text">
			<div class="item" lang="ja">
				<p><?php the_field( 'mashing-up_contact--content_ja', 'option' ); ?></p>
			</div>
			<div class="item" lang="en">
				<p><?php the_field( 'mashing-up_contact--content_en', 'option' ); ?></p>
			</div>
		</div>

		<?php
			$contact_mail = get_field( 'mashing-up_contact--email', 'option' );
			$contact_text = get_field( 'mashing-up_contact--text', 'option' );
			if ( $contact_mail && $contact_text ) :
		?>
		<div class="button-link js-bubble"><a href="mailto:<?php echo $contact_mail; ?>"><?php echo $contact_text; ?></a></div>
		<?php endif; ?>
	</div>
</section>
