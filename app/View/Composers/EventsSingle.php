<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class EventsSingle extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials/content-single-events',
        'single-events'
    ];


    public function __construct()
    {
        App::alumniOnlyCheck();
    }


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'event_date' => $this->getEventDate(),
            'event_venue' => $this->getEventVenue(),
            'conference_name' => $this->getEventConferenceName(),
            'event_location' => $this->getEventLocation(),
            'event_speakers' => $this->getSpeakers(),
            'related_events' => $this->getRelatedEvents(),
            'related_services' => $this->getRelatedServices(),
            'title' => $this->title()
        ];
    }


    public function getEventDate()
    {
        return get_field( 'event_date' );
    }


    public function title()
    {
        return get_the_title();
    }



    public function getEventVenue()
    {
        return get_field( 'event_venue' );
    }


    public function getEventConferenceName()
    {
        return get_field( 'conference_name' );
    }


    public function getEventLocation()
    {
        return get_field( 'event_location' );
    }


    public function getSpeakers()
    {
        $speakers = get_field( 'event_speakers', get_the_ID() );

        if ( $speakers ) :
            foreach ( $speakers as $speaker ) :
                $speaker->fullname = Professionals::getFullname( $speaker );
            endforeach;
        endif;

        return $speakers;
    }


    public function getRelatedEvents()
    {
        // Get "In Case You Missed It" Events...
        // Idea: Show events of the same service.
        $override = get_field('related_override');

        // if post does NOT have any related posts override...
        if ( $override != 1 ) :

            // 1. Get events with the same related service...
            $event_services = get_field('event_services');

            $meta_query = ['relation' => 'AND'];

            // 3. Get the id of all the related services for the meta_query...
            if ( $event_services ) :

                $meta_query[] = array('relation' => 'OR');

                foreach ( $event_services as $service ) :
                    $meta_query[0][] = array(
                        'key'     => 'event_services',
                        'value'   => $service->ID,
                        'compare' => 'LIKE'
                    );
                endforeach;
            endif;

            // DON'T SHOW ALUMNI-ONLY EVENTS
            $meta_query[] = array(
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
            );

            // 4. Query for events...
            $args = array(
                'posts_per_page' => 3,
                'post_type' => 'events',
                'post__not_in' => array(get_the_ID()),
                'meta_key' => 'sort_date',
                'orderby' => 'meta_value',
                'order' => 'DESC',
                'meta_query' => array( $meta_query )
            );

            $related_events = get_posts( $args );

        else :
            // Use override, manually selected related posts...
            $related_events = get_field('related_posts');

        endif;

        // 5. Got some?
        if ( $related_events ) :

            // Only need 3...
            if ( count( $related_events ) > 3 ) :
                $related_events = array_slice( $related_events, 0, 3 );
            endif;
        endif;

        return $related_events;
    }


    public function getRelatedServices()
    {
        return get_field( 'event_services' );
    }

}
