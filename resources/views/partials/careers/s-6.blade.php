<div class="container-fluid section-6 py-7" style="background: url( @asset('images/p1/s-6.png') ) center no-repeat; background-size: cover;">
  {{-- Row --}}
  <div class="row justify-content-end">
    <div class="col col-lg-8 p-4 p-lg-6">
      <div class="mb-7">
        @include('components.component-text-block', [
          'heading' => 'Pro Bono Work',
          'content'     => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
        ])
      </div>
      <div>
        @include('components.component-text-block', [
          'heading' => 'Diversity Statement',
          'content'     => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
        ])
      </div>
    </div>
  </div>

</div>
