<div class="container-fluid section-21 component-accordions">
	<div class="container">
		
		<div class="row mb-7">
			<div class="col mb-3">
				
				<div class="px-0 px-lg-5 mb-5">
					@include('components.component-text-block', [
						'heading' => $heading,
						'content' => $description
					])
				</div>

				<div class="accordion" id="accordion-{{ $field_index }}">
					@foreach ( $accordions as $accordion )
						<div class="accordion-item">
							<h2 class="accordion-header" id="heading-{{ $field_index }}-{{ $loop->index }}">
								<button class="accordion-button @if ( $loop->index != 0 ) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $field_index }}-{{ $loop->index }}" aria-expanded="@php if ( $loop->index == 0 ) echo 'true' @endphp" aria-controls="collapse-{{ $field_index }}-{{ $loop->index }}">
									{!! $accordion['heading'] !!}
								</button>
							</h2>

							<div id="collapse-{{ $field_index }}-{{ $loop->index }}" class="accordion-collapse collapse @if ( $loop->index == 0 ) show @endif" aria-labelledby="heading-{{ $field_index }}-{{ $loop->index }}" {{-- data-bs-parent="#accordion-{{ $field_index }}" --}}>
								<div class="accordion-body">
									{!! $accordion['content'] !!}
								</div>
							</div>
						</div>
					@endforeach
				</div>

			</div>
		</div>

	</div>
</div>
