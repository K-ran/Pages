var registrationApp = angular.module("registrationApp",[]);

registrationApp.controller('registrationController',function($scope){
});

//check for alphabets
registrationApp.directive('pgAlphabet', function() {
  return {
    require: 'ngModel',
    link: function(scope, elm, attrs, ctrl) {
      ctrl.$validators.alphabet = function(modelValue, viewValue) {
        if (ctrl.$isEmpty(modelValue)) {
          // consider empty models to be valid
          return true;
        }
        var INTEGER_REGEXP = /^[A-Za-z]+$/;
        if (INTEGER_REGEXP.test(viewValue)) {
          // it is valid
          return true;
        }
        // it is invalid
        return false;
      };
    }
  };
});

//check for alpha numeric
registrationApp.directive('pgAlphanumeric', function() {
  return {
    require: 'ngModel',
    link: function(scope, elm, attrs, ctrl) {
      ctrl.$validators.alphanumeric = function(modelValue, viewValue) {
        if (ctrl.$isEmpty(modelValue)) {
          // consider empty models to be valid
          return true;
        }
        var INTEGER_REGEXP = /^[a-zA-Z0-9]+$/;
        if (INTEGER_REGEXP.test(viewValue)) {
          // it is valid
          return true;
        }
        // it is invalid
        return false;
      };
    }
  };
});

//confirm pass page.
registrationApp.directive('pgPasswordConfirm', function() {
    return {
        require: "ngModel",
        link: function(scope, ele, att, ctrl) {
            ctrl.$validators.passwordconfirm = function(modelValue) {
                return angular.equals(modelValue,att.pgPasswordConfirm);
            };
        }
    };
});
