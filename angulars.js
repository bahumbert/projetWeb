// A mettre dans HTML
//

//alert('GO');

var app = angular.module('zztask', []);
	

app.controller('who_is_online', function($scope, $http) {
	
	//alert('GO2');
	$http({
		method: 'POST',
		url: './who_is_online.php',
		data: {}
	}).then(function successCallback(response) {
		//alert("sucess"+response.data);
		//$timeout(ajaxPeriodicall(), 1000);
	}, function errorCallback(response) {
		//alert("error"+response.data+response.status);
	});
	
});
