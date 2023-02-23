@isset ( $featured_blocks )
    <div class="container-fluid banner section-2 py-8" style="background: url( @asset('images/p1/s-2.png') ) center no-repeat; background-size: 100% auto;">

        <div class="container">

            @isset ( $featured_blocks[1] )
                <div class="row pb-2x gx-4">
                    <div class="col-12 col-lg mb-3 mb-lg-0">
                        @include('components.feature-card', [
                            'color'         => $featured_blocks[1]['color'],
                            'heading'       => $featured_blocks[1]['heading'],
                            'title'         => $featured_blocks[1]['title'],
                            'link_text'     => $featured_blocks[1]['link_text'],
                            'link_url'      => $featured_blocks[1]['link_url']
                        ])
                    </div>
                    <div class="col-12 col-lg banner-piece ps-2x">
                        @include( 'components.component-text-block', [
                            'heading_class' => 'pt-0',
                            'heading'       => 'Read the Latest', 
                            'content'       => 'To help mitigate risk, to inspire confidence, to inform day-to-day business operations: Our attorneys provide valuable insights on important matters from the latest legal rulings to trends and best practices.',
                            'link'          => [ 'title' => 'Search All News &amp; Insights', 'url' => '/news' ],
                        ])
                    </div>
                </div>
            @endisset

            {{-- Bottom Row --}}
            <div class="row">
                @isset ( $featured_blocks[3] )
                    <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                        @include('components.feature-card', [
                            'color'         => $featured_blocks[3]['color'],
                            'heading'       => $featured_blocks[3]['heading'],
                            'title'         => $featured_blocks[3]['title'],
                            'link_text'     => $featured_blocks[3]['link_text'],
                            'link_url'      => $featured_blocks[3]['link_url']
                        ])
                    </div>
                @endisset

                @isset ( $featured_blocks[4] )
                    <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                        @include('components.feature-card', [
                            'color'         => $featured_blocks[4]['color'],
                            'heading'       => $featured_blocks[4]['heading'],
                            'title'         => $featured_blocks[4]['title'],
                            'link_text'     => $featured_blocks[4]['link_text'],
                            'link_url'      => $featured_blocks[4]['link_url']
                        ])
                    </div>
                @endisset

                @isset ( $featured_blocks[5] )
                    <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                        @include('components.feature-card', [
                            'color'         => $featured_blocks[5]['color'],
                            'heading'       => $featured_blocks[5]['heading'],
                            'icon'          => 'icons/question.png',
                            'title'         => $featured_blocks[5]['title'],
                            'link_text'     => $featured_blocks[5]['link_text'],
                            'link_url'      => $featured_blocks[5]['link_url']
                        ])
                    </div>
                @endisset
            </div>

        </div>

    </div>
@endisset
