<div class="container-fluid section-5 @isset($class){{$class}}@endisset" @isset($image)style="background: url( @asset('images/' . $image)) center no-repeat; background-size: cover;"@endisset>

  {{-- Inner --}}
  <div class="container">

    {{-- Row --}}
    <div class="row">
      <div class="col col-lg-7">
        @include('components.component-text-block', [
          'heading' => $bannerTitle,
          'content'     => $bannerText
        ])
      </div>

      <div class="col col-lg-4">
        @include('components.banner-piece-image', [
          'image' => $image
        ])
      </div>
    </div>
  </div>


</div>
