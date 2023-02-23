<div class="container-fluid section-11 py-7" style="background: url( @asset('images/elements/alumnihub-1.png') ) center no-repeat; background-size: cover;">
  {{-- Row --}}
  <div class="row justify-content-end">
    <div class="col-lg-8 p-4 p-lg-6">
      <div class="mb-7">
        @include('components.component-text-block', [
          'heading' => 'KEEP UP WITH YOUR FORMER COLLEAGUES',
          'content'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
          'link'  => array('title' => 'Alumni News', 'url' => '#')
        ])
      </div>
      <div>
        @include('components.component-text-block', [
          'heading' => 'FEATURED VOLUNTEER OPPORTUNITIES',
          'content'     => 'Discover new information and volunteer opportunities within our pro bono program.',
          'link'  => array('title' => 'Pro Bono For Alumni', 'url' => '#')
        ])
      </div>
    </div>
  </div>

</div>
