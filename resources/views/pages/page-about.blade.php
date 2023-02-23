
@include('sections.page-header', [
  'class'   => 'banner--about'
])

@include('partials.about.s-13')

<div class="container-fluid section-13 pb-5 pt-6" style="background: url( @asset('images/p1/s-2.png') ) center repeat; background-size: 80% auto;">
  @include( 'sections.single-column', [ 'heading' => 'WHAT OUR CLIENTS ARE SAYING' ] )
</div>

@include('components.component-quote-cards')


@include('components.component-quote-banner', [
  'class'     => 'text-white text-center',
  'image'     => 'about/about-1.png',
  'quote'     => '“In this age of consolidation in the legal market and the quest to become larger, we remain committed to being as large as our clients need us to be, committed to being an extraordinary law firm that delivers value and results to our clients.”',
  'author'    => 'TODD ROLAPP',
  'title'     => 'MANAGING PARTNER'
])


@include('partials.about.featured-blocks')


@include('partials.about.s-16')


@include('sections.image-text-columns', [
  'class'       => 'about--history',
  'image'       => 'about/about-5.png',
  'heading'     => 'History & Accolades',
  'content'     => 'In the early days, our founders developed a reputation for excellence; F.M. Bass, Frank Berry and Cecil Sims were fastidious, intellectually curious and highly sought after. They pioneered our now robust mergers and acquisitions practice by participating in notable transactions. A few years later, Cecil Sims initiated one of the firm’s first alternative fee arrangements, which lasted from 1934 until the late 1960’s. <br><br>Ninety years after its inception, Bass, Berry & Sims continues to lead clients through increasingly complex legal challenges. Our highly skilled attorney teams aim to provide a profound understanding of our clients’ businesses and perspective, sound judgment, efficiency and responsiveness to every matter. We advance opportunities and deliver results.',
  'link'        => null
])


@include('components.component-callout-blocks')
