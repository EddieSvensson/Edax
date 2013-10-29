<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
// Do it and store it all in variables in the Anax container.
$Edax['title'] = "404";
$Edax['header'] = "";
$Edax['main'] = "This is a Edax 404. Document is not here.";
$Edax['footer'] = "";
 
// Send the 404 header 
header("HTTP/1.0 404 Not Found");
 
 
// Finally, leave it all to the rendering phase of Anax.
include(ANAX_THEME_PATH);