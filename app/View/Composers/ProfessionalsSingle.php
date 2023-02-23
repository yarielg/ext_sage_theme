<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\View\Composers\Professionals;

class ProfessionalsSingle extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'single-professionals',
        'partials/professionals/profile-header',
        'partials/professionals/profile-tab-accolades',
        'partials/professionals/profile-tab-events',
        'partials/professionals/profile-tab-experience',
        'partials/professionals/profile-tab-news',
        'partials/professionals/profile-tab-overview',
        'partials/professionals/profile-sidebar-accordions'
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            // Overview Tab
            'email' => get_field('email'),
            'profile_url' => $this->profile_url(),
            'professional_headshot' => $this->professional_headshot(),
            'info' => $this->info(),
            'featured_experiences' => $this->featuredExperiences(),
            'memberships' => $this->memberships(),
            // Sidebar
            'services' => $this->services(),
            'education' => $this->education(),
            'jurisdictions' => $this->jurisdictions(),
            'admissions' => $this->admissions(),
            'highlights' => $this->highlights(),
            // Experiences Tab
            'experiences' => $this->experiences(),
            'additional_experience' => $this->additionalExperience(),
            // News & Insights Tab
            'featured_publications' => $this->featuredPublications(),
            'publications' => $this->publications(),
            'media_news' => $this->mediaMentionsAndFirmNews(),
            'additional_news' => $this->additionalNews(),
            // Accolades Tab
            'accolades' => $this->accolades(),
            // Events Tab
            'past_events' => $this->pastEvents(),
            'upcoming_events' => $this->upcomingEvents(),
            // Custom Tab
            'custom_tab' => $this->customTab()
        ];
    }


    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [];
    }

    public function profile_url(){
        return get_permalink();
    }

    public function professional_headshot(){
        return get_field('professional_headshot');
    }

    public function info()
    {
        $id = get_the_ID();

        $data = array();

        $data['id'] = $id;
        $data['fullname'] = Professionals::getFullname( $id );
        $data['primary_location'] = get_the_title( get_field( 'professional_location_1' ) );
        $data['primary_phone'] = Professionals::getPhoneNumber( $id );
        $data['vcard'] = Professionals::getVcard( $id );

        $data['fields'] = get_fields();

        return $data;
    }


    public function featuredExperiences()
    {
        $data = array();

        $experiences = get_field( 'professional_featured_experience' );

        if ( isset( $experiences ) && ! empty( $experiences ) ) :

            $use_breeze_formatting = get_field( 'breeze_use_abstract' );

            foreach ( $experiences as $index => $experience ) :
                $data[$index]['title'] = get_the_title( $experience->ID );

                $data[$index]['summary'] = ( $use_breeze_formatting ) ?
                    get_field( 'experience_abstract', $experience->ID ) :
                    wp_trim_words( get_post_field( 'post_content', $experience->ID ), $num_words = 20, $more = '...' );

                $data[$index]['categories'] = wp_get_post_terms( $experience->ID, 'client-types' );

                $data[$index]['link'] = get_the_permalink( $experience->ID );
            endforeach;

        endif;

        return $data;
    }


    public function memberships()
    {
        return get_field('professional_memberships');
    }


    public function services()
    {
        $data = array();

        $services = get_field('professional_services');

        if ( isset( $services ) && ! empty( $services ) ) :

            foreach ( $services as $service ) :
                if ( $service->post_status == 'publish' ) :
                    $data[] = $service;
                endif;
            endforeach;

        endif;

        return $data;
    }


    public function experiences()
    {
        // Grab all selected "Featured Experience" IDs to exclude from the list...
        // These are shown separately at the top with a pin icon.
        $featured_experience_ids = array();
        $featured_experiences = get_field('professional_featured_experience');

        if ( $featured_experiences ) :
            foreach ( $featured_experiences as $fexp ) :
                $featured_experience_ids[] = $fexp->ID;
            endforeach;
        endif;

        // EXPERIENCE BY PROFESSIONAL
        $args = array(
            'posts_per_page' => 10,
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            'post_type' => 'experience',
            'post__not_in' => $featured_experience_ids,
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'experience_professionals',
                    'value'   => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'alumni_restricted_post',
                        'value'   => 0,
                        'compare' => '='
                    ),
                    array(
                        'key'     => 'alumni_restricted_post',
                        'compare' => 'NOT EXISTS'
                    )
                )
            )
        );

        $experiences = get_posts( $args );

        // Pass back a formatted data array with just what we need...
        $data = array();

        if ( isset( $experiences ) && ! empty( $experiences ) ) :
            foreach ( $experiences as $index => $experience ) :
                $data[$index]['title'] = get_the_title( $experience->ID );

                $data[$index]['summary'] = wp_trim_words( get_post_field( 'post_content', $experience->ID ), $num_words = 20, $more = '...' );

                $data[$index]['categories'] = wp_get_post_terms( $experience->ID, 'client-types' );

                $data[$index]['link'] = get_the_permalink( $experience->ID );
            endforeach;
        endif;

        return $data;
    }


    public function additionalExperience()
    {
        return get_field('additional_experience');
    }


    public function education()
    {
        $education = array();

        for ($i = 1; $i <= 4; $i++) :
            $edu_post = get_field( 'professional_education_school_' . $i );

            if ( $edu_post ) :
                $education[$i]['school'] = get_the_title( $edu_post->ID );
                $education[$i]['degree'] = get_field( 'professional_education_degree_' . $i );
                $education[$i]['year'] = get_field( 'professional_education_year_' . $i );
                $education[$i]['distinction'] = get_field( 'professional_education_distinction_' . $i );
            endif;
        endfor;

        return $education;
    }


    public function jurisdictions()
    {
        $data = array();

        $jurisdictions = get_field('professional_jurisdictions');

        if ( $jurisdictions ) :
            foreach ($jurisdictions as $j) :
                $data[] = array(
                    'name' => get_field('jurisdiction_display_name', $j['state']->ID),
                    'year' => $j['year']
                );
            endforeach;
        endif;

        return $data;
    }


    public function admissions()
    {
        $data = array();

        $admissions = get_field('professional_courts');

        if ( $admissions ) :
            foreach ($admissions as $a) :
                $data[] = array(
                    'name' => get_field('court_display_name', $a['court']->ID),
                    'year' => $a['year']
                );
            endforeach;
        endif;

        return $data;
    }


    public function highlights()
    {
        $data = array();

        $highlight = get_field('professional_highlight');

        if ($highlight && $highlight->post_status == 'publish') :

            $data['title'] = get_field('highlight_title', $highlight->ID);

            // Add missing p tags with wpautop().. then, remove any '<p>&nbsp;  </p>' found from the content.
            $highlight_content = wpautop(get_post_field('post_content', $highlight->ID));
            $highlight_content = preg_replace("/<p>&nbsp;\s*<\/p>/", "", $highlight_content);

            $data['content'] = $highlight_content;
        endif;

        return $data;
    }


    public function featuredPublications()
    {
        return get_field('professional_featured_publication');
    }


    public function publications()
    {
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'news',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'news_professional',
                    'value'   => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'alumni_restricted_post',
                        'value'   => '1',
                        'compare' => '!='
                    ),
                    array(
                        'key'     => 'alumni_restricted_post',
                        'value'   => '1',
                        'compare' => 'NOT EXISTS'
                    )
                )
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'news-categories',
                    'field' => 'slug',
                    'terms' => 'publications'
                )
            )
        );

        return get_posts( $args );
    }


    public function mediaMentionsAndFirmNews()
    {
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'news',
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'news_professional',
                    'value'   => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'alumni_restricted_post',
                        'value'   => 0,
                        'compare' => '='
                    ),
                    array(
                        'key'     => 'alumni_restricted_post',
                        'compare' => 'NOT EXISTS'
                    )
                )
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'news-categories',
                    'field' => 'slug',
                    'terms' => array('media-mentions', 'firm-news')
                )
            )
        );

        return get_posts( $args );
    }


    public function additionalNews()
    {
        return get_field('additional_thought_leadership');
    }


    public function accolades()
    {
        return get_field('professional_accolades');
    }


    public function pastEvents()
    {
        $now = new \DateTime();
        $now = date_format($now, 'Ymd');

        $args = array(
            'posts_per_page' => -1,
            //'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            'post_type' => 'events',
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'     => 'sort_date',
                    'value'   => $now,
                    'compare' => '<'
                ),
                array(
                    'key'     => 'event_speakers',
                    'value'   => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'alumni_restricted_post',
                        'value'   => 0,
                        'compare' => '='
                    ),
                    array(
                        'key'     => 'alumni_restricted_post',
                        'compare' => 'NOT EXISTS'
                    )
                )
            )
        );

        return get_posts( $args );
    }


    public function upcomingEvents()
    {
        $now = new \DateTime();
        $now = date_format($now, 'Ymd');

        $args = array(
            'posts_per_page' => -1,
            //'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            'post_type' => 'events',
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'     => 'sort_date',
                    'value'   => $now,
                    'compare' => '>='
                ),
                array(
                    'key'     => 'event_speakers',
                    'value'   => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'alumni_restricted_post',
                        'value'   => 0,
                        'compare' => '='
                    ),
                    array(
                        'key'     => 'alumni_restricted_post',
                        'compare' => 'NOT EXISTS'
                    )
                )
            )
        );

        return get_posts( $args );
    }


    public function customTab()
    {
        $data = array();

        $data['name'] = get_field('tab_name');
        $data['content'] = get_field('tab_content');

        return $data;
    }

}
