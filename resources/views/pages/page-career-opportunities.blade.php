@include('sections.page-header')

{{-- Links --}}
<div class="container opp-links mb-3 mb-lg-5">
    <div class="row">
        <div class="col px-0 py-3">
            <ul class="opportunities-list">
                <li><a href="#">Overview</a></li>
                <li><a href="#">Diversity &amp; Inclusion</a></li>
                <li><a href="#">Opportunities</a></li>
                <li><a href="#">Details &amp; FAQ</a></li>
            </ul>
        </div>
    </div>
</div>

{{-- Section --}}
<div class="container-fluid py-4 py-lg-6 pb-8" style="background: url( @asset('images/p1/s-2.png') ) left no-repeat; background-size: 90% auto;">
    <div class="container">
        <div class="row px-2 px-lg-5 py-2">
            {{ the_content() }}
        </div>
    </div>
</div>


@include('components.component-quote-banner', [
    'class' => 'text-black text-center',
    'image' => 'opp/op-2.png',
    'quote' => 'Our experienced attorneys meaningfully contribute to every practice area, team and industry group within the firm, with many of our key leadership positions being held by former lateral attorneys.'
])


@include('components.component-cta-banner', [
    'class'     => "bg-warning text-white",
    'button'    => "SEE LATERAL ATTORNEY OPPORTUNITIES >"
])


@include('partials.careers.s-18')


@include('partials.careers.s-5', [
    'class'       => 'section-5--opp',
    'image'       => 'opp/op-4.png',
    'bannerTitle' => 'JUDICIAL CLERKS',
    'bannerText'  => 'Bass, Berry & Sims recognizes the value of judicial clerkships in preparing attorneys for the practice of law. Many of our lawyers served as judicial clerks for trial and appellate judges in both state and federal courts.<br><br>The firm will provide a $20,000 bonus for a federal clerkship (U.S. District Court, the U.S. Court of Appeals or the U.S. Supreme Court) lasting at least 12 months and give credit for both compensation and seniority purposes.<br><br>For two separate federal clerkships, where at least one is with a federal appeals court, the firm will provide a $30,000 bonus and give credit for both compensation and seniority purposes.<br><br>The bonus will be paid to all qualified judicial clerks accepting employment with the firm regardless of the practice group to which they are assigned.',
    'button'    => 'VIEW OPPORTUNITIES'
])


@include('partials.careers.s-19')


@include('partials.careers.s-20')


@include('partials.careers.s-21')
