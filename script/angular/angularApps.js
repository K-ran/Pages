angular.module('validationDirectives',[]);
angular.module('registrationApp',['validationDirectives']);

angular.module('homeApp',['ngRoute','infinite-scroll']);

angular.module('homeApp').config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'templates/storybox.html',
        controller: 'boxController'
      }).
      when('/write', {
        templateUrl: 'templates/writebox.html',
      }).
      when('/read', {
        templateUrl: 'templates/storybox.html',
        controller: 'boxController'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);
