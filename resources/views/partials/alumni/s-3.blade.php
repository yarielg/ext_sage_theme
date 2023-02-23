<div class="container-fluid banner section-3 py-6 py-md-8 bg-secondary text-white" style="background: url( @asset('images/p1/s-3.png') ) center repeat; background-size: cover;">

  {{-- Inner --}}
  <div class="container">

    {{-- Row --}}
      <div class="row">
        <div class="col">
          @include('components.component-text-block', [
            'heading'   => $bannerTitle
          ])
        </div>
      </div>
  </div>


</div>
