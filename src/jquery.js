/****************************************************************************/
/*																			*/
/* This file contains the ajax call to prevent simultaneous connection  	*/
/* 																			*/
/****************************************************************************/

$('document').ready(function(){

	var tid = setInterval(whoIsOnline, 15000);					// Calls the function below every 15 seconds
	
	function whoIsOnline() {									// Which is an ajax call 
		$.ajax({
			url: './includes/who_is_online.php',
			type: 'POST',
			data: {},
			success : function(code, status){
				//alert('success');
			},
			error : function(result, status, error){			// Error for a unknown reason
				
				abortTimer();
				alert('Unknown error, please contact your system administrator : '+ error);
				window.location.href = "index.php";
				
			},
			
			complete : function(result, status){
				//alert('complete');
			}
		});
	}
	
	function abortTimer() { 	// stop the timer
		clearInterval(tid);
	}
	
});
