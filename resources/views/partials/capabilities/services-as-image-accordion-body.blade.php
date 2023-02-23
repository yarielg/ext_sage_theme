<div id="collapse{{ $id }}" class="accordion-collapse collapse col-12 overlay" data-bs-parent="#accordionGrid">
    <div class="accordion-body">
        <div class="row">

            <div class="col col-12 col-lg-6">
                {!! $description !!}
                <a href="{{ get_permalink( $id ) }}" class="btn btn-lg banner-btn">View More</a>
            </div>

            @isset( $service->subServices )
                <div class="col col-12 col-lg-5 offset-lg-1">
                    <h4>Related services</h4>
                    @foreach($service->subServices as $rel_post)
                        <a class="btn btn-link p-0 text-secondary" href="{{ get_permalink( $rel_post->ID ) }}">{{ $rel_post->service_name }}</a><br>
                    @endforeach
                </div>
            @endisset

        </div>
    </div>
</div>
