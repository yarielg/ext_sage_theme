<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class About extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-about',
        'pages/page-about',
        'template-leadership',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'leadership' => $this->leadership()
        ];
    }

    public function pageContent() {

    }

    public function leadership() {
        $leadership = [
            'executive' => $this->executiveGroup(),
            'partners' => $this->partnerGroup(),
            'administration' => $this->adminGroup()
        ];

        return $leadership;

    }

    public function executiveGroup() {
        $leaders = get_field('leadership_executive_committee');

        if($leaders) {
            foreach($leaders as $pro) {
                $pro->photo = get_field('professional_headshot', $pro->ID);
                $pro->email = get_field('email', $pro->ID);
                // Professional's phone # at the location 
                // This is used if provided, else defaults to the location's #...
                $pro->phone = get_field('professional_location_1_phone', $pro->ID);
                // Location's default phone number
                $pro->loc = get_field('professional_location_1', $pro->ID);
                $pro->loc_id = $pro->loc->ID;
                $pro->loc_phone = get_field('location_phone', $pro->loc_id);
                $pro->job_title = get_field('job_title', $pro->ID);
            }
        }
        return $leaders;
    }

    public function partnerGroup() {
        $leaders = get_field('leadership_office_managing_partners');
        if($leaders) {
            foreach($leaders as $pro) {
                $pro->photo = get_field('professional_headshot', $pro->ID);
                $pro->email = get_field('email', $pro->ID);
                // Professional's phone # at the location 
                // This is used if provided, else defaults to the location's #...
                $pro->phone = get_field('professional_location_1_phone', $pro->ID);
                // Location's default phone number
                $pro->loc = get_field('professional_location_1', $pro->ID);
                $pro->loc_id = $pro->loc->ID;
                $pro->loc_phone = get_field('location_phone', $pro->loc_id);
                $pro->job_title = get_field('job_title', $pro->ID);
            }
        }
        
        return $leaders;
    }

    public function adminGroup() {
        $leaders = get_field('leadership_administration');

        if($leaders) {
            foreach($leaders as $pro) {
                $pro->photo = get_field('professional_headshot', $pro->ID);
                $pro->email = get_field('email', $pro->ID);
                // Professional's phone # at the location 
                // This is used if provided, else defaults to the location's #...
                $pro->phone = get_field('professional_location_1_phone', $pro->ID);
                // Location's default phone number
                $pro->loc = get_field('professional_location_1', $pro->ID);
                $pro->loc_id = $pro->loc->ID;
                $pro->loc_phone = get_field('location_phone', $pro->loc_id);
                $pro->job_title = get_field('job_title', $pro->ID);
            }
        }
        return $leaders;
    }
   
}
