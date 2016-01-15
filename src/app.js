var drag = angular.module('DragAndDrop', ['ngDragDrop']);

drag.controller('MainCtrl', function($scope,$http) {
	
	$scope.todos = [];
	$scope.inprogs = [];
	$scope.dones = [];
	$scope.save  = function() {
		
		$scope.todo =[];
		$scope.inprog =[];
		$scope.done =[];
		for (i = 0; i < $scope.todos.length; i++) {
			$scope.todo[i] = {"name":$scope.todos[i][0].name} ;
		}
		for (i = 0; i < $scope.inprogs.length; i++) {
			$scope.inprog[i] = {"name":$scope.inprogs[i][0].name} ;
		}
		for (i = 0; i < $scope.dones.length; i++) {
			$scope.done[i] = {"name":$scope.dones[i][0].name} ;
		}
		$http.post('savetodo.php', $scope.todo).error(function(status){console.log(status)});
		$http.post('saveinprog.php', $scope.inprog).error(function(status){console.log(status)});
		$http.post('savedone.php', $scope.done).error(function(status){console.log(status)});
		alert("Sauvegardé avec succès")
	};
	
	$http({
	  method: 'GET',
	  url: './files/todo.json'
	}).success(function (data) {
		$scope.todo = data;
		console.debug("Here is todo: %o", $scope.todo);
		for (i = 0; i < $scope.todo.length; i++) {
			$http({
			  method: 'GET',
			  url: './files/projects_file/'+$scope.todo[i].name+'.json'
			}).success(function (data) {
				$scope.todos.push(data);
			});
		}
	});
	
	$http({
	  method: 'GET',
	  url: './files/inprog.json'
	}).success(function (data) {
		$scope.inprog = data;
		for (i = 0; i < $scope.inprog.length; i++) {
			$http({
			  method: 'GET',
			  url: './files/projects_file/'+$scope.inprog[i].name+'.json'
			}).success(function (data) {
				$scope.inprogs.push(data);
			});
		}
	});
	
	
	$http({
	  method: 'GET',
	  url: './files/done.json'
	}).success(function (data) {
		$scope.done = data;
		for (i = 0; i < $scope.done.length; i++) {
			$http({
			  method: 'GET',
			  url: './files/projects_file/'+$scope.done[i].name+'.json'
			}).success(function (data) {
				$scope.dones.push(data);
			});
		}
	});
	

    $scope.addText = "";
    
    $scope.dropSuccessHandler = function($event,index,array){
          array.splice(index,1);
    };
         
    $scope.onDrop = function($event,$data,array){
          array.push($data);
    };
});