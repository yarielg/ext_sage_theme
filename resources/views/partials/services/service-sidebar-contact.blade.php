<div class="sidebar-contact">
	<div class="sidebar-contact-name">
		<a href="{{ get_the_permalink($contact->id) }}">
			{{ $contact->name }}
		</a>
	</div>

	<div class="sidebar-contact-job-title">
		{{ $contact->job_title }}
	</div>

	@isset ( $contact->email )
		<div class="sidebar-contact-email">
			<div class="professional-email">
				@include( 'partials.professionals.email-disclaimer', [ 'id' => $contact->id, 'email' => $contact->email ] )
			</div>
		</div>
	@endisset

	<div class="sidebar-contact-phone">
		<a href="tel:{{ $contact->phone }}">
			{{ $contact->phone }}
		</a>
	</div>
</div>
