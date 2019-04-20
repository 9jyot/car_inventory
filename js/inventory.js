
var app = angular.module('inventoryApp', ['datatables']);

app.controller('inventoryController', function($scope, $http){
	$http.get('inventory/inventory/getInvetoryList').then(function(response, status, headers, config){
		console.log(response.data);
		$scope.inventory_list = response.data;
	});
});

