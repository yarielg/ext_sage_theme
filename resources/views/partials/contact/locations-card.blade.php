<div class="locations-card">
  @php
      $fullAddress = get_field('location_address_1', $location->ID) . ',+' . get_field('location_city', $location->ID) . ',+' . get_field('location_state', $location->ID) . '+'  . get_field('location_zip', $location->ID); 
      $fullAddress = str_replace(' ', '+', $fullAddress);
  @endphp

  @if($location->location_photo) 
    <a class="image-link @isset($class){{$class}}@endisset" style="background: url('{!! wp_get_attachment_image_url($location->location_photo) !!}' ) center no-repeat; background-size: cover;"></a>
  @endif

   <h5>{{ $location->post_title }}</h5>

  <p class="address">{{ $location->location_address_1 }} @if($location->location_address_2)<br> {{ $location->location_address_2 }} @endif <br> {{ $location->location_city }} {{ $location->location_state }} {{ $location->zip }}</p>
  <p class="phone">Tel: {{ $location->location_phone }} @if($location->location_fax) <br>Fax: {{ $location->location_fax }} @endif </p>
  <a href="professionals-results/?practice=&job-title=&loc={{ $location->ID }}&edu=&alpha=" class="btn btn-link text-secondary p-0">Find Professionals</a>
  <a href="https://www.google.com/maps/place/<?php echo $fullAddress; ?>" target="_blank" class="btn btn-link text-secondary p-0">Map</a>
</div>
