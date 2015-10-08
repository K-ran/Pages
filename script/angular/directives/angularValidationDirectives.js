
// This file containd all the directives create for pages
// Please properly comment the directive, what the are used for and where in the site


//-----------------------angular.module('validationDirectives')--------------------------//

//check for alphabets | used in index.php
angular.module('validationDirectives').directive('pgAlphabet', function() {
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
          return true;
        }
        // it is invalid
        return false;
      };
    }
  };
});

//check for alpha numeric | used in index.php
angular.module('validationDirectives').directive('pgAlphanumeric', function() {
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

//password confirm directive | used in index.php
angular.module('validationDirectives').directive('pgPasswordConfirm', function() {
    return {
        require: "ngModel",
        link: function(scope, ele, att, ctrl) {
            ctrl.$validators.passwordconfirm = function(modelValue) {
                return angular.equals(modelValue,att.pgPasswordConfirm);
            };
        }
    };
});

//check for unique username | used in index.php
angular.module('validationDirectives').directive('pgUserUnique', function($http,$q) {
    return {
        require: 'ngModel',
        link: function(scope, element, attrs, ctrl) {
            ctrl.$asyncValidators.usernamevalid = function(modelValue, viewValue) {
                //creating a promice.
                var def = $q.defer();  //a defer object

                //configuring the $http
                var request = $http({
                    method: "post",
                    url: "../php/UserEmailcheck.php",
                    data: {
                        user_name:viewValue
                    }
                });

                request.then(
                    function(response) {
                        console.log(response.data)
                        if(response.data==="true")
                            def.resolve();   //resolve the promise if return value is true
                        else def.reject();   // else reject
                });
                return def.promise;          //return the promise
            };
        }
    };
});


//check for unique email | used in index.php
angular.module('validationDirectives').directive('pgEmailUnique', function($http,$q) {
    return {
        require: 'ngModel',
        link: function(scope, element, attrs, ctrl) {
            ctrl.$asyncValidators.emailvalid = function(modelValue, viewValue) {
                var def = $q.defer();
                var request = $http({
                    method: "post",
                    url: "../php/UserEmailcheck.php",
                    data: {
                        email:viewValue
                    }
                });
                request.then(
                    function(response) {
                        console.log(response.data)
                        if(response.data==="true")
                            def.resolve();
                        else def.reject();
                });
                return def.promise;
            };
        }
    };
});


//-----------------------------------angular.module('homeApp')---------------------------//
