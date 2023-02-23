<div class="card card-staff" style="height:100%;">

    <img src="{!! $member->photo['url'] !!}" class="card-img-top" alt="{!! $member->post_title !!}" />

    <div class="staff-top p-4 pb-0" style="height:100%;">
        <a href="{{ get_the_permalink( $member->ID ) }}" class="staff-name">
            {!! $member->post_title !!}
        </a>

        <p class="job-title">{{ $member->job_title }}</p>
    </div>

    <div class="staff-bottom p-4 pt-0">
        <div class="phone">{{ $member->phone }}</div>
        <div>            
            @include( 'partials.professionals.email-disclaimer', [ 'id' => $member->ID, 'email' => $member->email ] )
            @include( 'partials.professionals.vcard', [ 'professional' => $member ] )
        </div>
    </div>

</div>