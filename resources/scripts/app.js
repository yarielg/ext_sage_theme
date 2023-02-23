import { domReady } from "@roots/sage/client";

// Import Bootstrap
import "bootstrap";

import "jquery";
import { WOW } from "wowjs";
import "./professionals-search-filters.js";
import './news-results.js';
import './alumni-news-results.js';
import './experience-results.js';
import './capabilities.js';
import './secondary-menu.js';

// import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';


// import the Facebook and Twitter icons
import { faFacebookF, faTwitter, faLinkedinIn,  } from "@fortawesome/free-brands-svg-icons";
import {faPrint, faPlus, faMagnifyingGlass, faListUl} from "@fortawesome/free-solid-svg-icons"
// add the imported icons to the library
library.add(faFacebookF, faTwitter, faLinkedinIn, faPrint, faPlus, faMagnifyingGlass, faListUl);

// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

/**
* app.main
*/
const main = async (err) => {
    if (err) {
        // handle hmr errors
        console.error(err);
    }

    // application code

    // Scroll header
    const stickyHeaderElem = document.querySelector(".header-container");
    const stickyHeaderIn = document.querySelector(".header-inner");
    const stickyThreshold = 100;

    const maybeToggleStickyHeader = () => {
        if ( window.scrollY > stickyThreshold || document.body.classList.contains("single-professionals") ) {
            stickyHeaderElem.classList.add("sticky-header-container");
            stickyHeaderIn.classList.add("sticky-header-wrapper");
        } else {
            stickyHeaderElem.classList.remove("sticky-header-container");
            stickyHeaderIn.classList.remove("sticky-header-wrapper");
        }
    };


    window.addEventListener("scroll", () => {
        maybeToggleStickyHeader();
    });

    // Initial toggle
    maybeToggleStickyHeader();
};

/**
* Initialize
*
* @see https://webpack.js.org/api/hot-module-replacement
*/
domReady(main);
import.meta.webpackHot?.accept(main);


/**
* Instantiate WOWjs
*
* Transitions and animations with Animate.css
*
* https://github.com/matthieua/WOW
* https://daneden.github.io/animate.css/
*/
var wow = new WOW(
    {
        boxClass:       'wow',                 // animated element css class (default is wow)
        animateClass:   'animate__animated',   // animation css class (default is animated)
        offset:         0,                     // distance to the element when triggering the animation (default is 0)
        mobile:         false,                 // trigger animations on mobile devices (default is true)
        live:           false
    }
);
wow.init();
