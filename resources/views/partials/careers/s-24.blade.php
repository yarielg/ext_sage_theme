<div class="container-fluid section-24 pb-5 pt-8" style="background: url( @asset('images/p1/s-2.png') ) center no-repeat; background-size: cover;">

  {{-- Inner --}}
  <div class="container">

    <div class="row mb-4">
      <div class="col text-center">
        @include('components.component-text-block', [
          'heading' => 'WHAT OUR CLIENTS ARE SAYING'
        ])
      </div>
    </div>

    {{-- Bottom Row --}}
    <div class="row pb-6 pb-lg-8 gx-4">
      <div class="col mb-3 ml-lg-3 px-0 bg-warning">
        @include('components.quote-staff-card', [
          'class'       => 'col p-4 p-lg-5 bg-warning text-white',
          'staffimage'  => 'careers/careers-2.png',
          'title'       => 'BETTY SMITH',
          'subtitle'    => 'ATTORNEY',
          'paragraph'   => '“Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.”',
          'button'      => 'Read More'
        ])
      </div>
      <div class="col mb-3 mx-lg-3 px-0 bg-primary">
        @include('components.quote-staff-card', [
          'class'     => 'col p-4 p-lg-5 bg-primary text-white',
          'staffimage'  => 'careers/careers-3.png',
          'title'     => 'JOHN DOE',
          'subtitle'  => 'ATTORNEY',
          'paragraph' => '“Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.”',
          'button'    => 'Read More'
        ])
      </div>
      <div class="col mb-3 px-0 bg-gray500">
        @include('components.quote-staff-card', [
          'class'     => 'col p-4 p-lg-5 bg-gray500 text-white',
          'staffimage'  => 'careers/careers-4.png',
          'title'     => 'MAXINE MUSTER',
          'subtitle'  => 'SUMMER INTERN',
          'paragraph' => '“Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.”',
          'button'    => 'Read More'
        ])
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-12 text-center">
        @include('components.component-text-block', [
          'heading' => 'CONNECT ON LINKEDIN'
        ])
      </div>

      <div class="col-12">
        @include('components.slider')
      </div>

    </div>

  </div>
</div>
