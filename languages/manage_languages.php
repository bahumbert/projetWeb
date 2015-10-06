<?php 

/*
 * Chooses which language file should be imported
 * 
 * 
 * 
 * 
 * 
*/

if(isset($_GET['lang'])){
	$lang = $_GET['lang'];
 
// register the session and set the cookie
	$_SESSION['lang'] = strtolower(substr($lang,0,2));
 
	setcookie('lang', $_SESSION['lang'], time() + (3600 * 24 * 30));
	
} 
else if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
	
} 
else if(isset($_COOKIE['lang'])){
	$lang = $_COOKIE['lang'];
}
else {
	$lang = 'fr';
}
 
switch ($lang) {
  case 'en':
  $lang_file = "./languages/".$file.'_en.php';
  $TXT_CURRENT_LANGUAGE = "English";
  $TXT_LANGUAGE1 = "Français";
  $TXT_LANGUAGE2 = "Deutsch";
  break;
  
   
  /* case 'de':
  $lang_file = "./languages/".$file.'_de.php';
  break;*/

 
  case 'fr':
  default:
  $lang_file = "./languages/".$file.'_fr.php';
  $TXT_CURRENT_LANGUAGE = "Français";
  $TXT_LANGUAGE1 = "English";
  $TXT_LANGUAGE2 = "Deutsch";
  break;
 
}
?>
