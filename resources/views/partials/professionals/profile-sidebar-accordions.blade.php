<div class="accordion accordion-experince" id="professionalsAccordion">

    {{-- Related Services --}}
    @if ($services)
        <div class="accordion-item profile-tabs">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Related Services
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#professionalsAccordion">
                <div class="accordion-body">
                    <ul class="list-group list-group-flush p-3">
                    @foreach($services as $service)
                        <li class="list-group-item px-0 pt-1 pb-2">
                            <div class="list-title">
                                <a href="{{ get_the_permalink($service->ID) }}">
                                    {{ get_field('service_name', $service->ID) }}
                                </a>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    {{-- Education --}}
    @if ($education)
        <div class="accordion-item  profile-tabs">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Education
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#professionalsAccordion">
                <div class="accordion-body">
                    <ul class="list-group list-group-flush p-3">
                    @foreach($education as $edu)
                        <li class="list-group-item px-0 pt-1 pb-2">
                            <div class="list-title">
                                {!! $edu['school'] !!} - {{ $edu['degree'] }}@if ( $edu['year']), {{ $edu['year'] }}@endif<br>
                                {!! $edu['distinction'] !!}
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    {{-- Admissions --}}
    @if ($jurisdictions || $admissions)
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    Admissions
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#professionalsAccordion">
                <div class="accordion-body">
                    @if ($jurisdictions)
                        <ul class="list-group list-group-flush p-3 pb-0 mb-0">
                        @foreach($jurisdictions as $jurisdiction)
                            <li class="list-group-item px-0 pt-1 pb-2">
                                <div class="list-title">
                                    {{ $jurisdiction['name'] }}@if ( $jurisdiction['year']), {{ $jurisdiction['year'] }}@endif
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    @endif

                    @if ($admissions)
                        <ul class="list-group list-group-flush p-3 pt-0 mt-3">
                        @foreach($admissions as $admission)
                            <li class="list-group-item px-0 pt-1 pb-2">
                                <div class="list-title">
                                    {{ $admission['name'] }}@if ( $admission['year']), {{ $admission['year'] }}@endif
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @endif

</div>
