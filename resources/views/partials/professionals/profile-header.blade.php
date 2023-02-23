<div class="container-fluid profile-header" @isset($info['fields']['professional_hero'])style="background-image: url( {!! $info['fields']['professional_hero']['url'] !!} );"@endisset>
    <div class="container">
        <div class="row">
            <div class="col-auto ms-auto profile-header-card">
                
                <h2 class="banner-title">{!! $info['fullname'] !!}</h2>
                <p class="profile-title">{{ $info['fields']['job_title'] }}</p>
                <p class="profile-location">{{ $info['primary_location'] }}</p>
                <p class="profile-phone mb-5">{{ $info['primary_phone'] }}</p>
                
                <div class="d-flex align-items-center">
                    {{-- <a href="#" class="profile-icon me-2">
                        <img src="@asset('images/icons/email-icon.png')" class="img-fluid">
                    </a> --}}
                    @include( 'partials.professionals.email-disclaimer', [ 'id' => $info['id'], 'email' => $info['fields']['email'], 'type' => 'icon' ] )
                    
                    @if( isset( $info['fields']['linkedin'] ) && ! empty( $info['fields']['linkedin'] ) )
                        <a href="{{ $info['fields']['linkedin'] }}" class="profile-icon me-3">
                            <img src="@asset('images/icons/linkedin-icon.png')" class="img-fluid">
                        </a>
                    @endif

                    <a href="{{ $info['vcard'] }}" class="btn btn-link btn-vcard text-secondary fw-bold px-0" title="Download vCard for: {!! $info['fullname'] !!}">
                        VCARD
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
