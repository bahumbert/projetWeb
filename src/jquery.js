/****************************************************************************/
/*																			*/
/* This file contains the ajax call to prevent simultaneous connection  	*/
/* 																			*/
/****************************************************************************/

$('document').ready(function(){

	var tid = setInterval(whoIsOnline, 15000);					// Calls the above function every 15 seconds
	
	function whoIsOnline() {
		$.ajax({
			url: './who_is_online.php',
			type: 'POST',
			data: {},
			success : function(code_html, statut){
			},
			error : function(resultat, statut, erreur){			// Error for a unknown reason
				
				abortTimer();
				alert('Erreur, veuillez contacter votre administrateur système : '+erreur);
				window.location.href = "index.php";
				
			},
			
			complete : function(resultat, statut){
			}
		});
	}
	
	function abortTimer() { 	// stop the timer
		clearInterval(tid);
	}
	
});
