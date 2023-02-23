
    <div class="col service-professional">
      <div class="row">
        <div class="col">
          <div class="service-professional-headshot show-for-medium">
            <img src="{{ $member->photo['url'] }}" alt="{{ $member->post_title }}">
          </div>
        </div>
        <div class="col">
          <div class="service-professional-name">
            <a href="{{ the_permalink($member->ID) }}">
              {{ $member->post_title }}
            </a>
            <div class="service-professional-job-title show-for-medium">
              {{ $member->job_title }}
            </div>
          </div>
        </div>
        <div class="col">
          <div class="service-professional-phone">
            <a href="tel:{{ $member->phone }}">
              {{ $member->phone }}
            </a>
          </div>
        </div>
        <div class="col">
          <div class="service-professional-email show-for-medium">
            @if ($member->email)
                  <div class="professional-email">
                    <a href="mailto:{{$member->email}}">Email</a>
                  </div>
              @endif
          </div>
        </div>
      </div>
  </div>
