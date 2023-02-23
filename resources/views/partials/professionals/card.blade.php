<div class="card card-staff" style="height:100%;">

    <img src="{!! $professional->headshot_url !!}" class="card-img-top" alt="{!! $professional->fullname !!}" />

    <div class="staff-top p-4 pb-0" style="height:100%;">
        <a href="{{ get_the_permalink( $professional->ID ) }}" class="staff-name">
            {!! $professional->fullname !!}
        </a>

        <p class="job-title">{{ $professional->job_title }}</p>
    </div>

    <div class="staff-bottom p-4 pt-0">
        <div class="phone">{{ $professional->phone }}</div>
        <div>            
            @include( 'partials.professionals.email-disclaimer', [ 'id' => $professional->ID, 'email' => $professional->email ] )
            @include( 'partials.professionals.vcard', [ 'professional' => $professional ] )
        </div>
    </div>

</div>
