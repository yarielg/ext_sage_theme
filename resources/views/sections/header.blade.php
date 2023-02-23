<header class="header-container @isset( $class ){{ $class }}@endisset @if( $is_alumni_page ) alumni @endif @isset( $page_color_scheme ){{ $page_color_scheme }}@endisset">
    <div class="top-menu-bar">
        <div class="header-inner container">
            <div class="secondary-menu-container">
                @if ( $is_alumni_page )
                    @include('partials.menus.nav-secondary-alumni')
                @else
                    @include('partials.menus.nav-secondary-standard')
                @endif
            </div>
        </div>
    </div>

    <div class="header-inner container">

        <div class="logo">
            <a class="brand" href="{{ home_url('/') }}">
                <img class="logo-light" src="@asset('images/logo-light.png')" alt="Bass, Berry and Sims" />
                <img class="logo-dark" src="@asset('images/logo-dark.png')" alt="Bass, Berry and Sims" />
                <img class="logo-profile" src="@asset('images/logo-profile-page.jpg')" alt="Bass, Berry and Sims. Centered to Deliver." />
            </a>
        </div>

        <div class="nav-containers">
            
            @if ( $is_alumni_page )
                <nav class="header-links-inner">
                    @include('partials.menus.alumni-nav')
                </nav>

            @else

                <nav class="header-links-inner">
                    @include('partials.menus.main-nav')
                </nav>
            @endif

            <div class="menu-icon-container">
                <a class="menu-icon" data-bs-toggle="offcanvas" href="#offcanvasWithBackdrop" role="button" aria-controls="offcanvasWithBackdrop">
                    <span class="icon-bar"></span>
                </a>
            </div>
        </div>
    </div>

    @include('partials.menus.nav-offcanvas')
</header>
