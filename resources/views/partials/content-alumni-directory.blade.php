{{-- <pre>{{ var_dump($post) }}</pre> --}}

<div class="post post--alumni-directory card p-4">
  <a class="post-title fw-bold mb-2" href="{{ get_permalink($id) }}">
    {{ $first }} {{ $last }}
  </a><br>
  {{ $title }}<br>
  {{ $organization }}

  <p class="mb-4">{{ $address }}<br>{{$city}}, {{$state}} {{$zip}}<br>@if($phone){{ \App\View\Composers\Alumni::formatPhone($phone) }}@endif</p>

  <a class="read-more btn-lg btn-link text-secondary p-0" href="mailto:{{$email}}">
    Email
  </a>
</div>
