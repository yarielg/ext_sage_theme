jQuery(document).ready(function(){

    //Print page
    jQuery('a.utility-print').on('click', function(e){
      e.preventDefault();
      window.print();
    });

    jQuery('.twitter-accounts-trigger').on('mouseenter', function(){
      jQuery('.twitter-accounts').css('display','block')
    })

    jQuery('.twitter-action').on('click', function(e){
      e.preventDefault();
    })

    jQuery('.twitter-accounts-trigger').on('mouseleave', function(){
      jQuery('.twitter-accounts').css('display','none')
    })

    jQuery('.twitter-accounts-trigger').on('click', function(e){
      //e.preventDefault();
    })

    // Check form fields on page load to add highlighting if already populated from $_GET
    check_input_values();

    // Check form fields again on change
    jQuery("select, input, textarea").change(function() {
        check_input_values();
    });

    // Check if URL has the '?alpha=x' parameter, if so, add highlighting for that element
    var $lp = get_last_url_param();

    jQuery('.professionals-results .alpha-search a').each(function(){
        if (jQuery(this).text() == $lp[1]) {
            jQuery(this).addClass('alpha-active');
        }
    });

}); // doc.ready



jQuery('.professionals-search .alpha-search a').click(function(e) {
    e.preventDefault();
    var $url = '/professionals-results/?';
    $url = $url + "alpha=" + jQuery(this).text();
    // Load new URL w/ updated alpha parameter value
    window.location.href = $url;
});


function check_input_values() {
    jQuery('select').each(function() {
        if ( jQuery(this).val() !== '' ) {
            jQuery(this).addClass('selected');
            // jQuery('.btn-view-all').addClass('apply-filters');
        }
        else {
            jQuery(this).removeClass('selected');
        }
    });

    jQuery("input, textarea").each(function() {
        if ( jQuery(this).val() !== '' ) {
            jQuery(this).addClass('filled');
            // jQuery('.btn-view-all').addClass('apply-filters');
        }
        else {
            jQuery(this).removeClass('filled');
        }
    });

    jQuery('.apply-filters').text("Apply");
}


/**
 * Chunk the URL and get the last parameter
 * @return string $param
 */
function get_last_url_param() {
    var $url = window.location.href;
    var $url_chunks = $url.split('&');

    // Get last item in array
    var $last_chunk = $url_chunks.pop();

    // Split last item parameter
    var $param = $last_chunk.split('=');

    return $param;
}


jQuery('.professionals-results .alpha-search a').click(function(e) {
    e.preventDefault();

    var $url = window.location.href;
    var $param = get_last_url_param();

    // If last parameter in the URL was 'alpha=x', replace the letter
    if ($param[0] == "alpha") {
        // console.log( 'yes, param already in url, updating ' + $param[1] + ' to ' + $(this).text() );
        $url = $url.replace("&alpha=" + $param[1], "&alpha=" + jQuery(this).text());
    }

    // Else, add the parameter to the URL
    else {
        if ($url.indexOf('?') == -1) {
            $url = $url + "?";
        }
        // console.log( 'no, param not in url, adding ' + $(this).text() );
        $url = $url + "&alpha=" + jQuery(this).text();
    }

    // Load new URL w/ updated alpha parameter value
    window.location.href = $url;

});
