<div class="container-fluid section-10 pb-5 pt-8" style="background: url( @asset('images/about/about-6.png') ) center no-repeat; background-size: cover;">

    @include( 'components.section-heading', [ 'heading' => 'Our Core Attributes', 'classes' => 'text-white text-center' ] )

    <div class="container">
        <div class="row pb-8 gx-4">
            <div class="col mb-3 mb-lg-0">
                @include('components.feature-card', [
                'color'     => 'black',
                'heading'   => 'Collaborative',
                'title'     => 'We are open, accessible and help each other to thrive by working together. We collaborate, work hard and empower our people to shape a career that works for them. We are compassionate and do the right thing for our team, our clients and our communities.'
                ])
            </div>
            <div class="col mb-3 mb-lg-0">
                @include('components.feature-card', [
                'color'     => 'blue',
                'heading'   => 'Agile',
                'title'     => 'We solve complex challenges in an agile and innovative way. Our clients have ever-changing needs, so we have to be entrepreneurial, adaptive and decisive while solving their legal issues.'
                ])
            </div>
            <div class="col mb-3 mb-lg-0">
                @include('components.feature-card', [
                'color'     => 'light-gray',
                'heading'   => 'Tenacious',
                'title'     => 'We are curious and driven to acquire knowledge and develop as professionals. Our tenacity enables us to solve problems, ask questions and challenge each other. We are open and direct.'
                ])
            </div>
        </div>

    </div>

</div>
