if ( document.body.classList.contains('page-template-template-capabilities') ) {

    jQuery('.service-block').click(function(e){
        e.preventDefault();
        
        jQuery('.service-block').removeClass('service-block-active');
        jQuery(this).addClass('service-block-active');

        jQuery('.service-icon i.fa-minus').addClass('fa-plus').removeClass('fa-minus');
        jQuery(this).find('.service-icon i.fa-plus').addClass('fa-minus').removeClass('fa-plus');
        
        jQuery('.service-info').addClass('hide');
        var $iid = jQuery(this).attr('id');
        jQuery('#' + $iid + '-info').toggleClass('hide');

        if ( jQuery('body').hasClass('desktop') ) {
            jQuery('html, body').animate({
                scrollTop: jQuery('#' + $iid + '-info').offset().top - 113
            }, 1200);
        } else {
            jQuery('html, body').animate({
                scrollTop: jQuery('#' + $iid + '-info').offset().top - 82
            }, 1200);
        }
        
    });

    jQuery('.services .capabilities-expand-all').click(function(e){
        e.preventDefault();
        jQuery('.service-info').removeClass('hide');
        jQuery('.services-row').hide();
        jQuery(this).hide();
        jQuery('.services .capabilities-collapse').show();
    });

    jQuery('.services .capabilities-collapse').click(function(e){
        e.preventDefault();
        jQuery('.service-info').addClass('hide');
        jQuery('.services-row').show();
        jQuery(this).hide();
        jQuery('.services .capabilities-expand-all').show();
    });


    // Filter by Type buttons
    jQuery('.capabilities-filter a').on('click', function(e){
        e.preventDefault();
    });

    jQuery('.view-services').on('click', function(){
        jQuery('.view-industries').removeClass('capability-active');
        jQuery(this).addClass('capability-active');
        jQuery('.service-blocks').show();
        jQuery('.industry-blocks').hide();
    });

    jQuery('.view-industries').on('click', function(){
        jQuery('.view-services').removeClass('capability-active');
        jQuery(this).addClass('capability-active');
        jQuery('.service-blocks').hide();
        jQuery('.industry-blocks').show();
    });

}
