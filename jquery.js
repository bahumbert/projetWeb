//$('document').ready(function(){

	//$(".dropdown-menu li").click(function(){
		
		//var language = $("a",this).text();
		//window.location.href += "?lang=" + language;
	//});
	
//});

$('document').ready(function(){
	
	//alert('COUOCU');

	var tid = setInterval(whoIsOnline, 15000);
	
	function whoIsOnline() {
		$.ajax({
			url: './who_is_online.php',
			type: 'POST',
			data: {},
			success : function(code_html, statut){
				//alert('success');
			},
			error : function(resultat, statut, erreur){
				
				abortTimer();
				alert('Erreur, veuillez contacter votre administrateur système : '+erreur);
				window.location.href = "index.php";
				
			},
			
			complete : function(resultat, statut){
				//alert('complete');
			}
		});
	}
	
	function abortTimer() { // stop the timer
		clearInterval(tid);
	}
	
});
