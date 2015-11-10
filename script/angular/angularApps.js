angular.module('validationDirectives',[]);
angular.module('registrationApp',['validationDirectives']);

angular.module('homeApp',['ngRoute','infinite-scroll','ngTagsInput']);

angular.module('homeApp').config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'templates/storybox.html',
        controller: 'boxController'
      }).
      when('/write', {
        templateUrl: 'templates/writebox.html',
        controller: 'writeController'
      }).
      when('/read', {
        templateUrl: 'templates/storybox.html',
        controller: 'boxController'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);
