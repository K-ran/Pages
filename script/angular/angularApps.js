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
      when('/MostRecent', {
        templateUrl: 'templates/storybox.html',
        controller: 'recentController'
      }).
      when('/MyStories', {
        templateUrl: 'templates/mystory.html',
        controller: 'myStories'
      }).
      when('/editBox/:object?', {
        templateUrl: 'templates/editbox.html',
        controller: 'editBoxController'
      }).
      when('/person/:id', {
        templateUrl: 'templates/others_profile.html',
        controller: 'otherPersonController'
      }).
      when('/profile', {
        templateUrl: 'templates/profile.html',
        controller: 'infoController'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);
