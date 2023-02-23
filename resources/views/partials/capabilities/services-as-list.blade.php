<div class="row mb-2 pb-4 border-bottom border-light">
	<div class="col-6">
		<h3>{{ $text }}</h3>
		{!! $description !!}
		<a href="{{ get_permalink( $id ) }}">View more</a>
	</div>
	<div class="col-3">
		@php $count = ceil(count($service->subServices)/2); $i=1; @endphp
		@foreach ( $service->subServices as $sub )
			<a href="{{ get_permalink( $sub->ID ) }}">
				<div class="sub-service p-1 bg-primary mb-1 text-white text-center">
					{{ $sub->service_name }}
				</div>
			</a>
			
			@if ( $i == $count )
				</div><div class="col-3">
			@endif

			@php $i++; @endphp
		@endforeach

	</div>
</div>
