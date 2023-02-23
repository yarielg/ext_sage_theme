@if ( isset( $type ) && $type == 'icon' )
	<a href="#" class="profile-icon me-2" data-bs-toggle="modal" data-bs-target="#emailDisclaimer{{ $id }}">
	    <img src="@asset('images/icons/email-icon.png')" class="img-fluid">
	</a>
@else
	<button type="button" class="email-disclaimer btn btn-link px-0 py-0" data-bs-toggle="modal" data-bs-target="#emailDisclaimer{{ $id }}">Email</button>
@endif

<div class="modal fade" id="emailDisclaimer{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="emailDisclaimer{{ $id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="emailDisclaimer{{ $id }}Label">Notice</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>
					Visiting, or interacting with, this website does not constitute an attorney-client relationship. Although we are always interested in hearing from visitors to our website, we cannot accept representation on a new matter from either existing clients or new clients until we know that we do not have a conflict of interest that would prevent us from doing so. Therefore, please do not send us any information about any new matter that may involve a potential legal representation until we have confirmed that a conflict of interest does not exist and we have expressly agreed in writing to the representation. Until there is such an agreement, we will not be deemed to have given you any advice, any information you send may not be deemed privileged and confidential, and we may be able to represent adverse parties.
				</p>
			</div>
			<div class="email-disclaimer-buttons modal-footer">
				<a href="mailto:{{ $email }}" class="btn btn-primary email-accept" data-bs-dismiss="modal">Accept</a>
				<button class="btn btn-secondary email-decline" data-bs-dismiss="modal">Decline</button>
			</div>
		</div>
	</div>
</div>
