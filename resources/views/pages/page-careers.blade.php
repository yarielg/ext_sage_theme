@include( 'sections.page-header' )

@include( 'components.component-cta-banner', [
  'class'     => "bg-warning text-white",
  'button'    => "SEE LATERAL ATTORNEY OPPORTUNITIES"
])

@include( 'partials.careers.s-22', [ 'content' => get_the_content() ] )

@include( 'partials.careers.s-6' )

@include( 'partials.careers.s-23' )

@include( 'partials.careers.s-24' )
