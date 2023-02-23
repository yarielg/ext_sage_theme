<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use JeroenDesloovere\VCard\VCard;

class Professionals extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [];
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


    /**
     * Get a Professional's Fullname
     * 
     * @param  int $professional_post_id     The `Professional` post object id
     * 
     * @return string                        The concatenated first, middle, and last name of the professional.
     */
    public static function getFullname( $professional_post_id ) 
    {
        $fullname = get_field( 'first_name', $professional_post_id ) . 
                    // (( get_field( 'nick_name', $professional_post_id ) ) ? " \"" . get_field( 'nick_name', $professional_post_id ) . "\" " : "" ) . 
                    (( get_field( 'middle_initial', $professional_post_id ) ) ?  " " . get_field( 'middle_initial', $professional_post_id ) . " " : " " ) . 
                    get_field( 'last_name', $professional_post_id ) .
                    (( get_field( 'suffix', $professional_post_id ) ) ? " " . get_field( 'suffix', $professional_post_id ) : "" );

        return $fullname;
    }


    /**
     * Get a Professional's (`professional_location_X`) Phone Number
     * 
     * @param   int $professional_post_id       The `Professional` post object id
     * @param   int $location_id                The ACF field number postfix (e.g. location_1, location_2)
     * 
     * @return string                           The professional's direct phone number and extension or their location's number.
     */
    public static function getPhoneNumber( $professional_post_id, $location_id = 1 ) 
    {
        // Prefer a professional's direct phone number and extension, if provided...
        $phone_at_location = get_field( 'professional_location_' . $location_id . '_phone', $professional_post_id );
        $extension_at_location = get_field( 'professional_location_'  . $location_id . '_extension', $professional_post_id );

        if ( $phone_at_location ) :
            return $phone_at_location . ( ( $extension_at_location ) ? 'x' . $extension_at_location : '' );
        endif;

        // Else, return the professional's main office/location phone number...
        $default_location_id = get_field( 'professional_location_' .  $location_id, $professional_post_id );
        $default_location_phone = get_field( 'location_phone', $default_location_id );

        return $default_location_phone;
    }


    /**
     * Get a Professional's vCard
     * 
     * @param  int $professional_post_id     The `Professional` post object id
     * 
     * @return string                        The file path to the vcard for download.
     *
     * Source Documentation: https://github.com/jeroendesloovere/vcard
     * vCard Elements: https://www.iana.org/assignments/vcard-elements/vcard-elements.xhtml
     * 
     */
    public static function getVcard( $professional_post_id ) 
    {
        $data = array();

        // Location's default phone number
        $loc = get_field( 'professional_location_1', $professional_post_id );
        $loc_id = $loc->ID;

        $data['first_name'] = get_field( 'first_name', $professional_post_id );
        $data['middle'] = get_field( 'middle_initial', $professional_post_id );
        $data['last_name'] = get_field( 'last_name', $professional_post_id );
        $data['suffix'] = get_field( 'suffix', $professional_post_id );
        $data['company'] = 'Bass, Berry & Sims PLC';
        $data['jobtitle'] = get_field( 'job_title', $professional_post_id );
        $data['email'] = get_field( 'email', $professional_post_id );
        $data['phone1'] = Professionals::getPhoneNumber( $professional_post_id );
        $data['phone2'] = Professionals::getPhoneNumber( $professional_post_id, 2 );
        $data['mobile'] = get_field( 'mobile_phone' );
        $data['fax'] = get_field( 'professional_location_1_fax', $professional_post_id );
        $data['address1'] = get_field( 'location_address_1', $loc_id );
        $data['address2'] = get_field( 'location_address_2', $loc_id );
        $data['city'] = get_field( 'location_city', $loc_id );
        $data['state'] = get_field( 'location_state', $loc_id );
        $data['zip'] = get_field( 'location_zip', $loc_id );
        $data['country'] = 'United States of America';
        $data['url'] = get_permalink($professional_post_id);
        $data['headshot'] = get_field( 'professional_low_res_photo', $professional_post_id)['url'];

        // Define vCard...
        $vcard = new VCard();

        // Define name variables...
        $firstname = $data['first_name'];
        $lastname = $data['last_name'];
        $additional = $data['middle'];
        $prefix = '';
        $suffix = $data['suffix'];

        // Add name data...
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // Get filename after it's set by addName()...
        $filename = $vcard->getFilename() . '.vcf';

        // Add company data...
        $vcard->addCompany($data['company']);
        $vcard->addJobtitle($data['jobtitle']);

        // Add email...
        $vcard->addEmail($data['email']);

        // Add phone numbers...
        $vcard->addPhoneNumber($data['phone1'], 'WORK;type=WORK');
        $vcard->addPhoneNumber($data['phone2'], 'WORK;type=WORK');
        $vcard->addPhoneNumber($data['mobile'], 'TEL;type=CELL');
        $vcard->addPhoneNumber($data['fax'], 'WORK;type=FAX');

        // Add address info...
        $vcard->addAddress(null, null, $data['address1'] . ' ' . $data['address2'], $data['city'], $data['state'], $data['zip'], $data['country']);

        // Add URL...
        $vcard->addURL($data['url'], 'URL;type=WORK');


        // Add photo, if not in local dev...
        // if ( strpos($_SERVER['SERVER_NAME'], 'local') === false) :
        //  if ( $data['headshot'] ) {
        //      try {
        //          $vcard->addPhoto($data['headshot']);
        //      } catch(Exception $e) {
        //          echo $e;
        //      }
        //  }
        // endif;

        // - - - Output Options - - -

        // Return vCard as a string...
        // return $vcard->getOutput();

        // Return vCard as a download...
        // return $vcard->download();

        // Save vCard on disk...
        $vcard->setSavePath('vcards');

        $vcard->save();

        return "/vcards/" . $filename;
    }

}
