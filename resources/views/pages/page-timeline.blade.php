
    <div class="timeline-container">

        {{-- Today --}}
        @include('partials.timeline.timeline-entry', [
          'year'    => 'TODAY',
          'class'   => 'timeline-pt',
          'title'   => '100 YEARS OF LEGALITY',
          'subtitle' => 'SERVING CLIENTS SINCE 1922',
          'paragraph' => 'Since its inception in 1922, the firm had been involved with many of the major business transactions and significant litigation matters in the Southeastern region.',
          'bgImage' => 'timeline/timeline-1.png',
          'arrow'   => 'timeline/timeline-arrow-blue.png'
        ])

        <ul id="list-timeline" class="list-group">
          <li>@include('partials.timeline.timeline-link', [
            'year' => 'TODAY',
            'class' => 'current-year'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '2011'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1996'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1966'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1953'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1922'
          ])</li>
        </ul>
      </div><!-- closing div for partials.timeline.timeline-entry -->

        {{-- 2 --}}
        @include('partials.timeline.timeline-entry', [
          'year'    => '2011',
          'title'   => 'NATIONAL TOP 30',
          'subtitle' => 'BBS Earns Coveted Client Service Ranking',
          'paragraph' => 'In 2011, we were pleased to announce our premier ranking among Fortune 1000 in-house counsel. 2012 BTI Client Service A-Team is a respected listing of 30 elite national and international law firms recognized for providing exceptional client service.<br><br>According to the survey of 240 in-house corporate counsel which ranks more than 650 law firms across the country, The survey is fully independent and no law firm can buy, self-recommend, self-nominate or influence the outcome.<br><br>In-house counsel cited Bass, Berry & Sims for its responsiveness, commitment, value and anticipation of client needs. Survey respondents praised the firm’s understanding of their specific companies and long-term business objectives.',
          'button'  => 'Read From The Archives',
          'bgImage' => 'timeline/timeline-2.png',
          'arrow'   => 'timeline/timeline-arrow.png'
        ])
        <ul id="list-timeline" class="list-group list-color-blue">
          <li>@include('partials.timeline.timeline-link', [
            'year' => 'TODAY'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '2011',
            'class' => 'current-year'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1996'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1966'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1953'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1922'
          ])</li>
        </ul>
      </div><!-- closing div for partials.timeline.timeline-entry -->

        {{-- 3 --}}
        @include('partials.timeline.timeline-entry', [
          'year'    => '1996',
          'class'   => 'timeline-pt',
          'title'   => 'PRO-BONO LEADERS',
          'subtitle' => 'WRITING GIVING BACK INTO OUR COMPANY CULTURE',
          'paragraph' => 'We assign our first lawyers purely to pro-bono work, and establish an ongoing program to involve summer interns.',
          'bgImage' => 'timeline/timeline-3.png',
          'arrow'   => 'timeline/timeline-arrow.png'
        ])
        <ul id="list-timeline" class="list-group">
          <li>@include('partials.timeline.timeline-link', [
            'year' => 'TODAY'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '2011'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1996',
            'class' => 'current-year'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1966'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1953'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1922'
          ])</li>
        </ul>
      </div><!-- closing div for partials.timeline.timeline-entry -->

        {{-- 4 --}}
        @include('partials.timeline.timeline-entry', [
          'year'    => '1966',
          'class'   => 'timeline-pt',
          'title'   => "What's In A Name?",
          'subtitle' => 'Berry added as a partner',
          'paragraph' => 'In 1966, we were pleased to add Warner Berry as one of our named partners and take the opportunity to update the company letterhead.',
          'bgImage' => 'timeline/timeline-4.png',
          'arrow'   => 'timeline/timeline-arrow.png'
        ])
        <ul id="list-timeline" class="list-group">
          <li>@include('partials.timeline.timeline-link', [
            'year' => 'TODAY'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '2011'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1996'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1966',
            'class' => 'current-year'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1953'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1922'
          ])</li>
        </ul>
      </div><!-- closing div for partials.timeline.timeline-entry -->

        {{-- 5 --}}
        @include('partials.timeline.timeline-entry', [
          'year'    => '1953',
          'title'   => 'TAKING ON THE BIG CASES',
          'subtitle' => 'Bass & Sims goes to the supreme court',
          'paragraph' => '1953 saw us represent our clients in the famous case of John Doe vs. Government, where we did an excellent job and landed ourselves in the history books.',
          'bgImage' => 'timeline/timeline-5.png',
          'arrow'   => 'timeline/timeline-arrow.png'
        ])
        <ul id="list-timeline" class="list-group">
          <li>@include('partials.timeline.timeline-link', [
            'year' => 'TODAY'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '2011'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1996'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1966'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1953',
            'class' => 'current-year'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1922'
          ])</li>
        </ul>
      </div><!-- closing div for partials.timeline.timeline-entry -->

        {{-- 6 --}}
        @include('partials.timeline.timeline-entry', [
          'year'    => '1922',
          'class'   => 'timeline-pt',
          'title'   => 'A PARTNERSHIP IS FORMED',
          'subtitle' => 'Berry & Sims join up to do law',
          'paragraph' => 'One bar. Two men. A century-spanning mission to fight crime: we are their legacy.',
          'bgImage' => 'timeline/timeline-6.png'
        ])
        <ul id="list-timeline" class="list-group">
          <li>@include('partials.timeline.timeline-link', [
            'year' => 'TODAY'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '2011'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1996'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1966'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1953'
          ])</li>
          <li>@include('partials.timeline.timeline-link', [
            'year' => '1922',
            'class' => 'current-year'
          ])</li>
        </ul>
      </div><!-- closing div for partials.timeline.timeline-entry -->

    </div><!-- end timeline-container -->
