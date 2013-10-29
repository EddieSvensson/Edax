<?php 
/**
 * This is a Edax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php'); 

// Define what to include to make the plugin to work
$Edax['stylesheets'][]        = '';
$Edax['jquery']               = true;
$Edax['javascript_include'][] = '';


// Do it and store it all in variables in the Edax container.
$Edax['title'] = "Your title";
$Edax['main'] = '

<article class="readable">
  HELLO WORLD
</article>

';

// Finally, leave it all to the rendering phase of Anax.
include(EDAX_THEME_PATH);