var app = angular.module('plunker', ['ngDragDrop']);

app.controller('MainCtrl', function($scope) {
	$scope.todo2 = [
		'Projet 1',
		'Projet 2',
		'Projet 3',
		'Projet 4'
    ];
	$scope.inprog2 = [
		'Projet 5',
		'Projet 6',
		'Projet 7',
		'Projet 8'
    ];
	$scope.done2 = [
		'Projet 9',
		'Projet 10',
		'Projet 11',
		'Projet 12'
    ];
    $scope.addText = "";
    
    $scope.dropSuccessHandler = function($event,index,array){
          array.splice(index,1);
    };
         
    $scope.onDrop = function($event,$data,array){
          array.push($data);
    };
});

