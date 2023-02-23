<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ServicesSingle extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'single-services'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
          'checkForRedirect'    => $this->checkForRedirect(),
          // Header
          'header_title'        => $this->getHeaderTitle(),
          'header_description'  => $this->getHeaderDescription(),
          'header_image'        => $this->getHeaderImage(),
          // Tab Content
          'overview'            => $this->overview(),
          'experiences'         => $this->getRelatedExperience(),
          'professionals'       => $this->getRelatedProfessionals(),
          'publications'        => $this->getRelatedPublications(),
          'news'                => $this->getRelatedNews(),
          'upcoming_events'     => $this->getUpcomingEvents(),
          'past_events'         => $this->getPastEvents(),
          // Sidebar
          'related_services'    => $this->getRelatedServices(),
          'related_industries'  => $this->getRelatedIndustries(),
          'contacts'            => $this->getContactProfessionals()
        ];
    }


    public function getHeaderTitle() 
    {
        return get_field('service_name');
    }


    public function getHeaderDescription() 
    {
        return get_field('service_summary');
    }


    public function checkForRedirect() 
    {
        $redirect = get_field('redirect_to');

        if ($redirect) :
            $url = get_permalink($redirect->ID);
            wp_redirect( $url );
            exit;
        endif;

    }


    public function getHeaderImage()
    {
        $header_image = get_field('service_hero'); // Returns image array

        if ($header_image) :
            return $header_image['url'];
        endif;

        return false;
    }


    // Overview Tab
    public function overview() 
    {
        return get_the_content();
    }


    // Experiences Tab
    public function getRelatedExperience() 
    {
        $args = array(
            'posts_per_page' => 10,
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            'post_type' => 'experience',
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'post_status' => 'publish',
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key'     => 'experience_services',
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
    

    // Professionals Tab
    public function getRelatedProfessionals() 
    {        
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'professionals',
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'professional_services',
                    'value'   => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                )
            )
        );

        $professionals = get_posts( $args );

        $data = array();

        if ( ! empty( $professionals ) ) :
            foreach ( $professionals as $post ) :
                $image = get_field('professional_low_res_photo', $post->ID); // field returns image array

                $professional = new \stdClass;
                $professional->id = $post->ID;
                $professional->photo = ( $image ) ? $image['url'] : '';
                $professional->name = Professionals::getFullname($post->ID);
                $professional->email = get_field('email', $post->ID);
                $professional->phone = Professionals::getPhoneNumber($post->ID);
                $professional->job_title = get_field('job_title', $post->ID);
                $professional->link = get_permalink($post->ID);
                
                $data[] = $professional;
            endforeach;
        endif;

        return $data;
    }


    // News & Insights Tab: Publications
    public function getRelatedPublications() 
    {
        $args = array(
            'posts_per_page' => 3,
            'post_type' => 'news',
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'news_services',
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

        $service_publications = get_posts( $args );

        return $service_publications;
    }


    // News & Insights Tab: Media Mentions & Firm News
    public function getRelatedNews() 
    {
        $args = array(
            'posts_per_page' => 3,
            'post_type' => 'news',
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'news_services',
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
                    'terms' => array('media-mentions', 'firm-news')
                )
            )
        );

        $service_news = get_posts( $args );

        return $service_news;
    }


    // News & Insights Tab: Upcoming Events
    public function getUpcomingEvents() 
    {
        $now = new \DateTime();
        $now = date_format($now, 'Ymd');

        $args = array(
            'posts_per_page' => 3,
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
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
                    'key'     => 'event_services',
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
            )
        );

        $upcoming_events = get_posts( $args );

        return $upcoming_events;
    }   


    // News & Insights Tab: Past Events
    public function getPastEvents() 
    {
        $now = new \DateTime();
        $now = date_format($now, 'Ymd');
        
        $args = array(
            'posts_per_page' => 3,
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
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
                    'key'     => 'event_services',
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
            )
        );

        $past_events = get_posts( $args );

        return $past_events;
    }


    // Sidebar: Services
    public function getRelatedServices()
    {
        return get_field('services_relationship');
    }


    // Sidebar: Industries (TBD)
    public function getRelatedIndustries()
    {
        return false;
    }


    // Sidebar: Contact
    public function getContactProfessionals()
    {
        $data = array();

        $contacts = get_field('service_professionals');

        if ( ! empty( $contacts ) ) :
            foreach ( $contacts as $post ) :
                $contact = new \stdClass;
                $contact->id = $post->ID;
                $contact->name = Professionals::getFullname($post->ID);
                $contact->email = get_field('email', $post->ID);
                $contact->phone = Professionals::getPhoneNumber($post->ID);
                $contact->job_title = get_field('job_title', $post->ID);
                
                $data[] = $contact;
            endforeach;
        endif;

        return $data;
    }

}
