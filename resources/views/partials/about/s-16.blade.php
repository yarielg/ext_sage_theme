<div class="container-fluid section-16 pt-7 bg-dark text-white" style="background: url( @asset('images/about/about-2.png') ) center no-repeat; background-size: cover;">

  {{-- Inner --}}
  <div class="container">

    {{-- Banner Row --}}
    <div class="row gx-3">
      <div class="col text-center text-white">
        @include('components.component-text-block', [
          'heading' => 'FAIRNESS. EQUAL OPPORTUNITY. RESPONSIBILITY.',
          'content'     => 'Guided by strong commitments to these three principles, Bass, Berry & Sims is building and sustaining a firm and culture that is inclusive and diverse. We are committed to pursuing systemic change to eradicate the root causes of legal, social, and economic inequalities.'
        ])
      </div>
    </div>

    <div class="row pt-5">
      <div class="col">
        @include('components.image-link', [
          'text' => 'Diversity &<br><span>Inclusion</span>',
          'image' => 'about/about-3.png'
        ])
      </div>
      <div class="col">
        @include('components.image-link', [
          'text' => 'Explore By<br><span>Industry</span>',
          'image' => 'about/about-4.png'
        ])
      </div>
    </div>
  </div>


</div>
