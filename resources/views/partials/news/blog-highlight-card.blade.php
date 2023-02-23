<a class="image-link highlight-blog @isset($class){{$class}}@endisset" style="background: url( '@asset("images/" . $image)' ) center no-repeat; background-size: cover;">
  @isset($text)
    <span class="image-text">{!! $text !!}</span>
  @endisset

</a>

<ul class="list-group list-group-flush">
  <li class="list-group-item px-0 pb-3 pt-4">Blog Title 1<span class="text-secondary"> <i class="fa-solid fa-chevron-right"></i></span></li>
  <li class="list-group-item px-0 pb-3 pt-4">Blog Title 2<span class="text-secondary"> <i class="fa-solid fa-chevron-right"></i></span></li>
  <li class="list-group-item px-0 pb-3 pt-4 mb-4">Blog Title 3<span class="text-secondary"> <i class="fa-solid fa-chevron-right"></i></span></li>
</ul>

@isset($button)
  <a class="btn btn-link p-0 text-secondary mb-4 mb-lg-3" href="#">{{$button}}</a>
@endisset
