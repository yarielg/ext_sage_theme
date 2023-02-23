@isset($staffimage)
  <img src="@asset('images/'.$staffimage)" class="quote-staff-image">
@endisset

<div class="quote-card position-relative d-flex flex-wrap @isset($class){{$class}}@endisset">
  <div class="quote-icon">
    <img src="@asset('images/icons/quote.png')" class="img-fluid">
  </div>
  @isset($title)<h4 class="card-title">{{$title}}</h4>@endisset
  @isset($subtitle)<h3 class="card-subtitle">{{$subtitle}}</h3>@endisset
  <div class="card-body px-0">
    @isset($paragraph)<p>{{$paragraph}}</p>@endisset
    @isset($button)<a href="#" class="btn btn-link p-0 fw-bold">{{$button}}</a>@endisset
  </div>

</div>
