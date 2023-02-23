<div class="container-fluid section-12 pb-5 pt-8" style="background: url( @asset('images/p1/s-2.png') ) center repeat; background-size: 80% auto;">

  {{-- Inner --}}
  <div class="container">

    <div class="row mb-4">
      <div class="col text-center">
        @include('components.component-text-block', [
          'heading' => 'Expand Your Reach',
          'content'  => 'Available only to alumni of Bass, Berry & Sims, these two features will help connect you with other lawyers and job opportunities within our network.'
        ])
      </div>
    </div>

    <div class="row mb-3">
      <div class="col">
        @include('components.image-link', [
          'class' => 'bg-warning',
          'text' => 'Discover<br><span>Opportunities</span>',
          'link' => '#'
        ])
      </div>
      <div class="col">
        @include('components.image-link', [
          'class' => 'bg-primary',
          'text' => 'Firm Alumni<br><span>Directory</span>',
          'link' => '/alumni'
        ])
      </div>
    </div>

    <div class="row alumni-row mb-3 mb-lg-7">
      <div class="alumni-pic p-0">
        <img src="@asset('images/elements/alumnihub-2.png')">
      </div>
      <div class="alumni-text col bg-gray500 text-white position-relative p-4 pt-lg-7 pb-lg-8 ps-lg-5 pe-lg-8">
        <div class="quote-icon">
          <img src="@asset('images/icons/quote.png')" class="img-fluid">
        </div>
        <p class="name">
          CAROLINE STEPHENS MILNER
        </p>
        <p class="title">
          ASSOCIATE
        </p>
        <p class="paragraph">The Alumni Spotlight features Caroline Stephens Milner, who serves as an Associate with Kirkland & Ellis.</p>
        <a href="#" class="btn btn-link text-white p-0">Read More</a>
      </div>
    </div>

  </div>


</div>
