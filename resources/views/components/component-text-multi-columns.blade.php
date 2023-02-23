<div class="container-fluid component-text-multi-columns section-20" style="background: url( @asset('images/opp/op-6.png') ) center no-repeat; background-size: cover;">
    <div class="container">
        <div class="row mb-3 mb-lg-5">
            <div class="col px-4 text-white text-center">
                @include( 'components.component-text-block', [
                    'class' => 'text-white before-cyan',
                    'heading' => $heading,
                    'content' => $description
                ])
            </div>
        </div>

        <div class="row row-cols-1 row-cols-lg-3 px-4 text-white mb-5">
            @foreach ($columns as $column)
                <div class="col">
                    @isset( $column['heading'] )
                        <h3>{!! $column['heading'] !!}</h3>
                    @endisset

                    @isset( $column['content'])
                        <div class="text-multi--content">
                            {!! $column['content'] !!}
                        </div>
                    @endisset

                    @if ( isset( $link ) && is_array( $link ) )
                        <a class="btn" href="{{ $column['link']['url'] }}">{{ $column['link']['title'] }}</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
