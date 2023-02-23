<div class="container-fluid section-contact py-7" style="background: url( @asset('images/contact/contact-form.png') ) center no-repeat; background-size: cover;">
  {{-- Row --}}
  <div class="row justify-content-start">
    <div class="col contact-box p-4 p-lg-6 border border-15 border-dark bg-white">
      <div class="mb-5">
        @include( 'components.component-text-block', [ 'heading' => 'Contact Us' ] )
      </div>
      <div>
        @include('forms.contact')
      </div>
    </div>
  </div>

</div>
