
var app = angular.module('inventoryApp', ['datatables', 'ngSanitize', 'ui.bootstrap']);

app.controller('inventoryController', function ($scope, $http, $uibModal, $log) {
	$http.get('inventory/inventory/getInvetoryList').then(function (response, status, headers, config) {

		$scope.inventory_list = response.data;
	});



	var pc = this;
	pc.data = " Name Test";
	$scope.getPopup = function (param) {

		$scope.$modalInstance = $uibModal.open({
			animation: true,
			ariaLabelledBy: 'modal-title',
			ariaDescribedBy: 'modal-body',
			templateUrl: 'inventory/inventory/getPopup',
			controller: function ($scope) {
				$scope.param = param;
			},
			size: 'lg',
		});
	};


	pc.cancel = function () {
		//console.log($scope);
		$scope.$close();
	}
});
