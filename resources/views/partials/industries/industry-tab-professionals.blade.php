<div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
    @foreach( $professionals as $professional ) 
        <div class="service-professional">
            @isset ( $professional->photo )
                <div class="service-professional-headshot">
                    <img src="{{ $professional->photo }}" alt="{{ $professional->name }}">
                </div>
            @endisset

            @isset ( $professional->name )
                <div class="service-professional-name">
                    <a href="{{ $professional->link }}">
                        {{ $professional->name }}
                    </a>
                </div>
            @endisset

            @isset ( $professional->job_title )
                <div class="service-professional-job-title">
                    {{ $professional->job_title }}
                </div>
            @endisset

            @isset ( $professional->email )
                <div class="service-professional-phone">
                    <a href="tel:{{ $professional->phone }}">
                        {{ $professional->phone }}
                    </a>
                </div>
            @endisset

            @isset ( $professional->email )
                <div class="service-professional-email">
                    <div class="professional-email">
                        @include( 'partials.professionals.email-disclaimer', [ 'id' => $professional->id, 'email' => $professional->email ] )
                    </div>
                </div>
            @endisset

        </div>
    @endforeach
</div>
