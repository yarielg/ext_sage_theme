@include('sections.page-header')


{{-- SectionS --}}
@include('sections.s-2')

{{-- Section 3 --}}
@include('sections.s-3', [
  'bannerTitle' => 'Our People.<br>Our Experience.',
  'button'    => 'Find Your Professional'
])

{{-- Section 4 --}}
@include('sections.s-4')

{{-- Section 5 --}}
@include('sections.s-5', [
  'image'       => 'p1/s-5.png',
  'bannerTitle' => 'Come Work With Us',
  'bannerText'  => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata',
  'button'    => 'Join Our Team'
])

@include('sections.s-6')
@include('sections.s-7')
@include('sections.s-8')
@include('sections.s-9')
@include('sections.s-10')
@include('sections.s-11')
@include('sections.s-12')
@include('sections.s-13')
@include('sections.s-14')
@include('sections.s-15')
@include('sections.s-16')
@include('sections.s-17')
@include('sections.s-18')
@include('sections.s-19')
@include('sections.s-20')
@include('sections.s-21')
@include('sections.s-22')
@include('sections.s-23')
@include('sections.s-24')






{{-- Oneoff/Named Sections --}}

{{-- Wide Banner --}}
@include('components.component-cta-banner', [
  'class'     => "bg-light text-dark",
  'button'    => "EMAIL US WITH QUESTIONS ᐳ"
])

@include('sections.grid-capabilities')

@include('sections.profile-header')

@include('sections.s-contact')

@include('sections.s-locations')

@include('sections.s-search')

@include('sections.s-media-contacts')

@include('sections.s-search-professionals')

@include('sections.s-contact')
