<div class="container-fluid section-media-contacts py-6" style="background: url( @asset('images/contact/media-bg.png') ) center no-repeat; background-size: cover;">

  {{-- Inner --}}
  <div class="container">

    {{-- Banner Row --}}
    <div class="row mb-4 mb-lg-6">
      <div class="col text-center">
        @include('components.component-text-block', [
          'heading' => 'Media Contacts'
        ])
      </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-auto mb-7">
      <div class="col me-lg-3 bg-gray500 text-white mb-3 mb-lg-0">
        <h4>TRACY ROBERTS</h4>
        <p>Director of Marketing & Communications<br>(615) 259-6330<br>troberts@bassberry.com</p>
      </div>
      <div class="col ms-lg-3 bg-primary text-white">
        <h4>ERIN IHDE</h4>
        <p>Marketing Manager, Communications<br>(615) 259-6736<br>eihde@bassberry.com</p>
      </div>
    </div>
  </div>


</div>
