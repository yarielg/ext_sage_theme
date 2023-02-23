// Secondary nav: ensures that the secondary menu and search bar items are never open at the same time

// Opens search, closes menu if open
jQuery(".search-form .form-label").on("click", function(){

  if (jQuery(".search-icon").hasClass("d-inline")) {
      jQuery(".search-form .form-label .search-icon").removeClass("d-inline").addClass("d-none");
      jQuery(".search-form .form-label .close-search-icon").removeClass("d-none").addClass("d-inline");
      jQuery("#secondaryNavToggle").attr("aria-expanded","false");
      jQuery("#navbarSecondary").removeClass("show");
  } else {
        jQuery(".search-form .form-label .close-search-icon").removeClass("d-inline").addClass("d-none");
        jQuery(".search-form .form-label .search-icon").removeClass("d-none").addClass("d-inline");
  }

});

// Opens menu, closes search
jQuery("#secondaryNavToggle").on("click", function(){

  if (jQuery("input#search").hasClass("show")) {
      jQuery("input#search, button#search").removeClass("show");
      jQuery(".search-form .form-label .close-search-icon").removeClass("d-inline").addClass("d-none");
      jQuery(".search-form .form-label .search-icon").removeClass("d-none").addClass("d-inline");
  } else { }

});
