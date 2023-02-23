<button class="accordion-button image-accordion @isset($class){{$class}}@endisset" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$id}}" aria-expanded="false" aria-controls="collapse{{$id}}" style="background: url( '@asset("images/" . $image)' ) center no-repeat; background-size: cover;">
  @isset($text)
    <h5 class="image-text fw-bold pe-3">{!! $text !!}</h5>
    <span class="image-icon"></span>
  @endisset
</button>

<div id="collapse{{$id}}" class="accordion-collapse collapse" data-bs-parent="#accordionGrid">
  <div class="accordion-body">
   <div class="row">
  
    <div class="col col-lg-5 pe-lg-4">
      {!! $description !!}
    </div>

    <div class="col col-lg-6 offset-lg-1">
      <h4>Related services</h4>

      @foreach(\App\View\Composers\Services::getChildPosts($id) as $rel_post)
          <a class="btn btn-link p-0 text-secondary" href="{{ get_permalink($rel_post->ID) }}">{{ $rel_post->post_title }}</a>
      @endforeach
      
    </div>

  </div>
  </div>
</div>