(function() {
  //console.log(angular);
  var img = angular.element("#upload-2-queue");
  angular.module('addModel', ['validation', 'validation.rule', 'ui.bootstrap', 'ui.bootstrap.tpls', 'ui.select', 'ngSanitize']) 

  // -------------------
  // controller phase
  // -------------------
  .controller('mdlController', ['$scope', '$injector','$http', function($scope, $injector,$http) {
    // Injector

    var $validationProvider = $injector.get('$validation');
    

    $scope.modelForm = {
      checkValid: $validationProvider.checkValid,
      submit: function(form) {                
        var status = $validationProvider.validate(form);
          console.log(img[0].children.length);
        if(status.$$state.value != "error")
        {     
          //console.log($scope);
          var model_val = $scope.ModelForm.model.$modelValue.trim();
          
          if(model_val.length > 2){
            var params = {'name':model_val };
            $http({
                method: 'POST',
                url: 'http://localhost/mini_car_inventory/model/model/addModel',
                data: params,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(response) {
                //console.log(data);

                $scope.errorMessage = response.data.msg;
                $scope.manufacturerForm.required='';
                //console.log($scope);
               // console.log(data);
            }).catch(function(err) {
              // handle errors
              //console.log(err);
            });            

            }else{

              $scope.errorMessage.modlnm = "Model name cannot be less then 3 characters";
            }

        }
        
      },
      reset: function(form) {
        $validationProvider.reset(form);
      }
    };
  

    // Callback method
    $scope.success = function(message) {
      alert('Success ' + message);
    };

    $scope.error = function(message) {
      alert('Error ' + message);
    };
  }]);
}).call(this);
