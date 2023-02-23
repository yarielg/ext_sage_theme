<div class="alumni-logout-container">
    @if ( is_user_logged_in() )
        <a href="{!! wp_logout_url( '/alumni' ) !!}" class="alumni-logout">Logout</a>
    @else
        <a href="/alumni/login" class="alumni-login">Sign In</a>
    @endif
</div>
