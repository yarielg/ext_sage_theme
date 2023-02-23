<!-- Note during build if there is an error at the bottom of the page this will not show properly on mobile. To view properly delete note with inspector. Offcanvas becomes active below large. Uses bootstrap -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel" style="visibility: hidden;" aria-hidden="true">
    <div class="offcanvas-close-container">
        <button type="button" class="offcanvas-close btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-x"></i></button>
    </div>

    <div class="offcanvas-body">
        <div class="offcanvas-main-nav">
            <!-- Pulls in standard main nav items. For Alumni use alumni-nav -->
            @include('partials.menus.main-nav')
            @include('partials.menus.alumni-nav')
        </div>

        <div class="offcanvas-second-nav">
            <!-- Pulls in standard secondary menu. For alumni use nav-secondary-alumni -->
            @include('partials.menus.second-nav')
            @include('partials.menus.nav-secondary-alumni')
        </div>

        <!-- Need to remove for Alumni -->
        @include('forms.search-menu')
    </div>
</div>
