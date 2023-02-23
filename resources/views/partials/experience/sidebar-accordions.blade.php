<div class="accordion sidebar-experiences" id="professionalsAccordion">
  @if ( isset( $related_professionals ) && ! empty( $related_professionals ) )
    <div id="related-professionals" class="mb-4 accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Related Professionals
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#professionalsAccordion">
        <div class="accordion-body">
      @foreach( $related_professionals as $professional )
        <div>
          <a href="{{ get_permalink( $professional->ID ) }}">{{ $professional->name }}</a>
        </div>
      @endforeach
        </div>
      </div>
    </div>
  @endif

  @if( isset( $related_services ) && ! empty( $related_services ) )
    <div id="related-services" class="mb-4 accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Related Services
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#professionalsAccordion">
        <div class="accordion-body">
      @foreach( $related_services as $service )
        <div>
          <a href="{{ get_permalink($service->ID) }}">{{ $service->service_name }}</a>
        </div>
      @endforeach
        </div>
      </div>
    </div>
  @endif
</div>
