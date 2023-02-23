<time class="updated" datetime="{{ get_post_time('c', true) }}">
    @if(isset($post_date)) 
        @if(isset($date_convert) && $date_convert == TRUE)
            {{ date("F d, Y", strtotime($post_date)) }}
        @else 
            {{ $post_date }}
        @endif
    @else
        {{ get_the_date() }}
    @endif
</time>
