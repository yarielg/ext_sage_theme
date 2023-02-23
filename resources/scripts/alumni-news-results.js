jQuery(document).ready(function(){

	jQuery("#alumni-news-paginator").on('change', function() {

		// console.log(getUrlVars());

		var query = getUrlVars();

		var newParams = [];

		if(query['inputCategory']) {
			newParams['inputCategory'] = query['inputCategory'];
		}

		if(query['inputKeyword']) {
			newParams['inputKeyword'] = query['inputKeyword'];
		}

		if(query['inputProfessional']) {
			newParams['inputProfessional'] = query['inputProfessional'];
		}

		if(query['inputService']) {
			newParams['inputService'] = query['inputService'];
		}

		newParams['paged'] = jQuery("#alumni-news-paginator").val();
		
		var newUrl = "/alumni/firm-news/?paged="+newParams['paged'];

		Object.keys(newParams).forEach(key => {
			newUrl += "&"+key+"="+newParams[key];
		});

		window.location.href = newUrl;

	});

	/**	TOGGLE SEARCH **/
	jQuery("#toggleAlumniResultsSearch").on('click', function(e) {
		e.preventDefault;
		jQuery("#alumni-results-search").toggle();
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