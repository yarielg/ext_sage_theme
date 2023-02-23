jQuery(document).ready(function(){

	jQuery("#experiences-paginator").on('change', function() {

		var query = getUrlVars();

		var newParams = [];

		if(query['client-type']) {
			newParams['client-type'] = query['client-type'];
		}

		if(query['kw']) {
			newParams['kw'] = query['kw'];
		}

		if(query['pro']) {
			newParams['pro'] = query['pro'];
		}

		if(query['practice']) {
			newParams['practice'] = query['practice'];
		}

		newParams['paged'] = jQuery("#experiences-paginator").val();
		
		var newUrl = "/experience-results/?paged="+newParams['paged'];

		Object.keys(newParams).forEach(key => {
			newUrl += "&"+key+"="+newParams[key];
		});

		window.location.href = newUrl;

	});

	// Close Click
	jQuery("#exp-toggle-search-close").on('click', function(e) {
		e.preventDefault();
		// collapse the box
		jQuery("#experience-results-search").addClass('collapse');
		// hide the close button
		jQuery("#exp-toggle-search-close").addClass('collapse');
		// show the open button
		jQuery("#exp-toggle-search-open").removeClass('collapse');
	});

	// Open Click
	jQuery("#exp-toggle-search-open").on('click', function(e) {
		e.preventDefault();
		// collapse the box
		jQuery("#experience-results-search").removeClass('collapse');
		// hide the close button
		jQuery("#exp-toggle-search-open").addClass('collapse');
		// show the open button
		jQuery("#exp-toggle-search-close").removeClass('collapse');
	});

	

});


function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
