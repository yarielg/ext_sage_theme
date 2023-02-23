<div class="col-12 col-lg-4 industry-sidebar">
    {{-- <div class="row mb-2x">
        <div class="col-auto">
            <a href="#" class="btn-link text-secondary p-0">Share</a>
        </div>
        <div class="col-auto">
            <a href="#" class="btn-link text-secondary p-0">Print</a>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-12 mb-4">
            {{-- Related Services --}}
		    @if ( $related_services )
		        <div class="accordion-item">
		            <h2 class="accordion-header" id="headingOne">
		                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		                    Related Services
		                </button>
		            </h2>
		            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#professionalsAccordion">
		                <div class="accordion-body">
		                    <ul class="list-group list-group-flush p-3">
		                    @foreach( $related_services as $service )
		                        <li class="list-group-item px-0 pt-1 pb-2">
		                            <div class="list-title">
		                                <a href="{{ get_the_permalink( $service->ID ) }}">
		                                    {{ get_field( 'service_name', $service->ID ) }}
		                                </a>
		                            </div>
		                        </li>
		                    @endforeach
		                    </ul>
		                </div>
		            </div>
		        </div>
		    @endif

		    @if ( isset( $contacts ) && ! empty( $contacts ) )
		        <div class="accordion-item">
		            <h2 class="accordion-header" id="headingThree">
		                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		                    Contact
		                </button>
		            </h2>
		            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
		                <div class="accordion-body">
		                    <ul class="list-group list-group-flush p-3">
		                        @foreach($contacts as $contact)
		                            <li class="list-group-item px-0 pt-1 pb-2">
		                                @include('partials.industries.industry-sidebar-contact', [ 'contact' => $contact ])
		                            </li>
		                        @endforeach
		                    </ul>
		                </div>
		            </div>
		        </div>
		    @endif

        </div>        
    </div>
</div>
