<?php

/** Add Custom Post Types */
foreach ( glob ( dirname(__FILE__) . "/post-types/*.php" ) as $file ) :
    require_once $file;
endforeach;

/** Add Custom Taxonomies */
foreach (glob ( dirname(__FILE__) . "/taxonomies/*.php" ) as $file) :
    require_once $file;
endforeach;

?>
