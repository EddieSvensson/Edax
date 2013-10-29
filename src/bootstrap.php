<?php
/**
 * Bootstrapping functions, essential and needed for Anax to work together with some common helpers. 
 *
 */
 
/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
  echo "Edax: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');
 
 
/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class) {
  if($class == 'Markdown' || $class == 'MarkdownExtra'){ return false;}
  $path = EDAX_INSTALL_PATH . "/src/{$class}/{$class}.php";
  if(is_file($path)) {
    include($path);
  }
  else {
    throw new Exception("Classfile '{$class}' does not exists.");
  }
}
//run function myAutoloader
spl_autoload_register('myAutoloader');


//dump function
function dump($array) {
  echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}

function modifyNavbar($items) {
	$ref = isset($_GET['p']) && isset($items[$_GET['p']]) ? $_GET['p'] : null;
	if($ref) {
	  $items[$ref]['class'] .= 'selected'; 
	}
	return $items;
  }
// preg replace data both numeric and character allowed
function preg($data){
	if(!empty($data)){
		preg_replace('#[^a-zA-Z0-9]#i','', $data);
		return $data;
		} else { 
		    $data = null;
			return $data;
		}
}
// if string is not numeric it will return variable value of null
function num($data,$lenght){
	if(is_numeric($data) && strlen($data) < $lenght){
		return $data;
	} else {
		$data = null;
		return $data;
	}
}

/**
 * Use the current querystring as base, modify it according to $options and return the modified query string.
 *
 * @param array $options to set/change.
 * @param string $prepend this to the resulting query string
 * @return string with an updated query string.
 */
function getQueryString($options=array(), $prepend='?') {
  // parse query string into array
  $query = array();
  parse_str($_SERVER['QUERY_STRING'], $query);

  // Modify the existing query string with new options
  $query = array_merge($query, $options);
  
  // Return the modified querystring
  return str_replace('&','&amp;',$prepend . http_build_query($query));
  
}



/**
 * Create links for hits per page.
 *
 * @param array $hits a list of hits-options to display.
 * @param array $current value.
 * @return string as a link to this page.
 */
function getHitsPerPage($hits, $current=null) {
  $nav = "Träffar per sida: ";
  foreach($hits AS $val) {
    if($current == $val) {
      $nav .= "$val ";
    }
    else {
      $nav .= "<a href='" . getQueryString(array('hits' => $val)) . "'>$val</a> ";
    }
  }  
  return $nav;
}



/**
 * Create navigation among pages.
 *
 * @param integer $hits per page.
 * @param integer $page current page.
 * @param integer $max number of pages. 
 * @param integer $min is the first page number, usually 0 or 1. 
 * @return string as a link to this page.
 */
function getPageNavigation($hits, $page, $max, $min=1) {
  $nav  = ($page != $min) ? "<a href='" . getQueryString(array('page' => $min)) . "'>&lt;&lt;</a> " : '&lt;&lt; ';
  $nav .= ($page > $min) ? "<a href='" . getQueryString(array('page' => ($page > $min ? $page - 1 : $min) )) . "'>&lt;</a> " : '&lt; ';

  for($i=$min; $i<=$max; $i++) {
    if($page == $i) {
      $nav .= "$i ";
    }
    else {
      $nav .= "<a href='" . getQueryString(array('page' => $i)) . "'>$i</a> ";
    }
  }

  $nav .= ($page < $max) ? "<a href='" . getQueryString(array('page' => ($page < $max ? $page + 1 : $max) )) . "'>&gt;</a> " : '&gt; ';
  $nav .= ($page != $max) ? "<a href='" . getQueryString(array('page' => $max)) . "'>&gt;&gt;</a> " : '&gt;&gt; ';
  return $nav;
}



/**
 * Function to create links for sorting
 *
 * @param string $column the name of the database column to sort by
 * @return string with links to order by column.
 */
function orderby($column) {
  $nav  = "<a href='" . getQueryString(array('orderby'=>$column, 'order'=>'asc')) . "'>&darr;</a>";
  $nav .= "<a href='" . getQueryString(array('orderby'=>$column, 'order'=>'desc')) . "'>&uarr;</a>";
  return "<span class='orderby'>" . $nav . "</span>";
}

/**
*
* destroy sessions that is not needed
*/
function clean_up_session($ses){
	foreach($ses as $se){
		if(isset($_SESSION[$se])){
			unset($_SESSION[$se]);
			
		}
	}
}
//replace string function
function replace($what,$with,$string){
	return str_replace($what,$with,$string);
}
//current url used for image temporarily
function curPageURL($toImage) {
		     $current_file = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
			 $pageURL = 'http'; 
			 if(isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) == "on") {$pageURL .= "s";}
			 $pageURL .= "://";
			 if ($_SERVER["SERVER_PORT"] != "80") {
			  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			 } else {
			  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			 }
			 $replace = strstr($pageURL, '?');
			 $replace = str_replace($replace,'',$pageURL);
			 
			  return str_replace($current_file,'',$replace.$toImage);
			 }