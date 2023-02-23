<div class="accordion" id="accordionExample">
    @if ( isset( $related_services ) && ! empty( $related_services ) )
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Related Services
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul class="list-group list-group-flush p-3">
                      @foreach ( $related_services as $service )
                          <li class="list-group-item px-0 pt-1 pb-2">
                              <div class="list-title">
                                  <a href="{{ get_the_permalink($service->ID) }}">{{ $service->post_title }}</a>
                              </div>
                          </li>
                      @endforeach
                  </ul>
                </div>
            </div>
        </div>
    @endif

    @if ( isset( $related_industries ) && ! empty( $related_industries ) )
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Related Industries
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="list-group list-group-flush p-3">
                    @foreach ( $related_industries as $industry )
                        <li class="list-group-item px-0 pt-1 pb-2">
                            <div class="list-title">
                                <a href="{{ get_the_permalink($industry->ID) }}">{{ $industry->post_title }}</a>
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
                                @include('partials.services.service-sidebar-contact', [ 'contact' => $contact ])
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

</div>
