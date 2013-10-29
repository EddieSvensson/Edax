<?php
class CMenu {
	
     
	
  public static function GenerateMenu($menu, $class , $active) {
    if(isset($menu['callback'])) {
      
	  $items = $menu['items'];
	  //$items = call_user_func($menu['callback'], $menu['items']);
    }
	$current = basename($_SERVER['PHP_SELF']);
    $html = "<nav class='$class'>\n";
    foreach($items as $item) {
	 
	  $selected = (isset($current)) && $current == $item['url'] || $active == $item['text'] ? 'selected' : null;
	  
	  $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
	  
    }
    $html .= "</nav>\n";
    return $html;
  
  }
	//menu function callback
	public function modifyNavbar($items) {
		
	$ref = isset($_GET['p']) && isset($items[$_GET['p']]) ? $_GET['p'] : null;
	if($ref) {
	  $items[$ref]['class'] .= 'selected'; 
	}
	return $items;
  }
}