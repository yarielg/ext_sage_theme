<!-- Standard secondary menu that expands and search. For Alumni use nav-seondary-alumni -->
<nav class="navbar no-transition collapse navbar-collapse second-nav" id="navbarSecondary">
    @include('partials.menus.second-nav')
</nav>

<button class="navbar-toggler no-transition" id="secondaryNavToggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSecondary" aria-controls="navbarSecondary" aria-expanded="false" aria-label="Toggle navigation">
    <span class="span-first">MENU</span><span><i class="fa-solid fa-x"></i></span>
</button>

@include('forms.search-menu')
