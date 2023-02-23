<div class="col-12 col-lg-4 profile-sidebar">
    {{-- <div class="row mb-2x">
        <div class="col-auto">
            <a href="#" class="btn-link text-secondary p-0">Share</a>
        </div>
        <div class="col-auto">
            <a href="#" class="btn-link text-secondary p-0">Print</a>
        </div>
    </div> --}}
    <div class="row">
      <div class="col-12">
        <a class="utility-print" href="#" title="Print">
          <i class="fa fa-print"></i>
        </a>
      </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            @include('partials.professionals.profile-sidebar-accordions')
        </div>

        {{-- Highlight --}}
        @if ($highlights)
            <div class="col-12 mb-4">
                <h5>{!! $highlights['title'] !!}</h5>
                <div class="mb-3">
                    {!! $highlights['content'] !!}
                </div>
            </div>
        @endif

    </div>
</div>
