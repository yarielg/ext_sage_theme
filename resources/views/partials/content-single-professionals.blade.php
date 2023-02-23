<article @php(post_class())>
  <div class="container">
  	<!-- header -->
  	<div class="row">
  		<div class="col"></div>
  		<div class="col">
  			<span class="prof_name">{{ $info['first_name'] }} {{ $info['last_name'] }}</span>
  			<span class="prof_title">{{ $info['job_title'] }}</span>
		    @if($info['professional_location_1'])
		    	<span class="prof_location">{{ $info['professional_location_1']->post_title }}</span>
		    @endif
		    @if($info['professional_location_2'])
		    	<span class="prof_location">{{ $info['professional_location_2']->post_title }}</span>
		    @endif
  		</div>
  	</div>

  	<!-- NAV -->
  	<div class="row">
  		NAV
  	</div>
  </div>
</article>
