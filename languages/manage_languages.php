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
	$lang = $_GET['lang']; //strtolower(substr(x,0,2));
 
// register the session and set the cookie
 
	setcookie('lang', $lang, time() + (3600 * 24 * 30));
	
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
  $TXT_LANGUAGE3 = "Русский";
  $TXT_LANGUAGE1_LIEN = "fr";
  $TXT_LANGUAGE2_LIEN = "de";
  $TXT_LANGUAGE3_LIEN = "ru";
  break;
  
   
  case 'de':
  $lang_file = "./languages/".$file.'_de.php';
   $TXT_CURRENT_LANGUAGE = "Deutsch";
  $TXT_LANGUAGE1 = "Français";
  $TXT_LANGUAGE2 = "English";
  $TXT_LANGUAGE3 = "Русский";
  $TXT_LANGUAGE1_LIEN = "fr";
  $TXT_LANGUAGE2_LIEN = "en";
  $TXT_LANGUAGE3_LIEN = "ru";
  break;
	
  case 'ru':
  $lang_file = "./languages/".$file.'_ru.php';
  $TXT_CURRENT_LANGUAGE = "Русский";
  $TXT_LANGUAGE1 = "Français";
  $TXT_LANGUAGE2 = "English";
  $TXT_LANGUAGE3 = "Deutsch";
  $TXT_LANGUAGE1_LIEN = "fr";
  $TXT_LANGUAGE2_LIEN = "en";
  $TXT_LANGUAGE3_LIEN = "de";
  break;
 
  case 'fr':
  default:
  $lang_file = "./languages/".$file.'_fr.php';
  $TXT_CURRENT_LANGUAGE = "Français";
  $TXT_LANGUAGE1 = "English";
  $TXT_LANGUAGE2 = "Deutsch";
  $TXT_LANGUAGE3 = "Русский";
  $TXT_LANGUAGE1_LIEN = "en";
  $TXT_LANGUAGE2_LIEN = "de";
  $TXT_LANGUAGE3_LIEN = "ru";
  break;
 
}
?>
