<?php 

$fichier = $_SERVER['PHP_SELF'];
echo "Fichier = ".$fichier;

if(isset($_GET['lang'])){
	$lang = $_GET['lang'];
 
// register the session and set the cookie
	$_SESSION['lang'] = $lang;
 
	setcookie('lang', $lang, time() + (3600 * 24 * 30));
	
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
  $lang_file = $fichier.'_en.php';
  break;
 
  case 'fr':
  $lang_file = 'lang.de.php';
  break;
 
  /*case 'de':
  $lang_file = 'lang.es.php';
  break;*/
 
  default:
  $lang_file = 'lang.fr.php';
 
}
?>
