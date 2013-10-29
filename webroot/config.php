<?php
/**
 * Config-file for Anax. Change settings here to affect installation.
 *
 */
 
/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
 
 

/**
 * Define Edax paths.
 *
 */
define('EDAX_INSTALL_PATH', __DIR__ . '/..');
define('EDAX_THEME_PATH', EDAX_INSTALL_PATH . '/theme/render.php');
 
 
/**
 * Include bootstrapping functions.
 *
 */
include(EDAX_INSTALL_PATH . '/src/bootstrap.php');
 


/**
 * Start the session.
 *
 */

session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();
 
  
/**
 * Create the Edax variable.
 *
 */
$Edax = array();
 
 
 
 
/**
 * Connect to database width pdo
 *
 */

$Edax['database']['dsn']            = 'mysql:host=Yourhost;dbname=databasename;';
$Edax['database']['username']       = 'user';
$Edax['database']['password']       = 'password';
$Edax['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
 
/**
 * Theme related settings.
 *
 */

//$anax['stylesheet'] = 'css/style.css';
$Edax['stylesheets'] = array('css/style.css');
$Edax['favicon']    = 'favicon.ico';
/**
 * Site wide settings.
 *
 */
$Edax['lang']         = 'sv';
$Edax['title_append'] = ' | Edax en webbtemplate';


$Edax['header'] = <<<EOD
<img class='sitelogo' src='img/logo.png' width='150' height='150' style='border-radius:80px;' alt='Edax Logo'/>
<span class='sitetitle'>Edax webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$Edax['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Eddie Svensson (me@eddiesvensson.se) | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a>
<a href="http://www.quirksmode.org/dom/events/index.html">All Dom events</a>
</span>
</footer>
EOD;



/**
 * The navbar
 *
 */

$Edax['menu'] = array(
  'callback' => 'modifyNavbar',
  'items' => array(
    'home'  => array('text'=>'Home',  'url'=>'index.php', 'class'=>null),
    
	
  ),
);


/**



 * Settings for JavaScript.
 *
 */
$Edax['modernizr'] = 'js/modernizr.js';
$Edax['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$anax['jquery'] = null; // To disable jQuery
$Edax['javascript_include'] = array();
//$anax['javascript_include'] = array('js/main.js'); // To add extra javascript files
//Add directly in sidecontroller 
/*

$Edax['javascript_include'][] = 'js/main.js';
$Edax['javascript_include'][] = 'js/other.js';
*/

/**
 * Google analytics.
 *
 */
$Edax['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics