{{-- Section 1 --}}
{{-- @include('sections.s-1', [
  'class'       => 's-1 banner banner--alumni-hub banner--light',
  'bgImage'     => 'elements/alumnihub-bg.png',
  'bannerTitle' => 'Alumni Hub',
  'bannerText'  => 'Welcome to the Bass, Berry & Sims Alumni Network.',
  'button'      => null
]) --}}
@include('sections.page-header')

{{-- Section --}}
<div class="container-fluid py-5 py-lg-8" style="background: url( @asset('images/p1/s-2.png') ) left repeat; background-size: 90% auto;">
  <div class="container">
    <div class="row px-lg-5 py-lg-4">
      {!! the_content() !!}
    </div>
  </div>
</div>

{{-- Section --}}
@include('partials.alumni.s-3', [
  'bannerTitle' => 'UPCOMING<br>ALUMNI EVENTS',
  'button'    => 'See List'
])

{{-- Section --}}
@include('partials.alumni.s-11')

{{-- Wide Banner --}}
@include('components.component-cta-banner', [
  'class'     => "bg-light text-dark",
  'button'    => "EMAIL US WITH QUESTIONS >"
])

{{-- Section --}}
@include('partials.alumni.s-12')
