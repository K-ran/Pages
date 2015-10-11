angular.module('registrationApp').controller('registrationController',function($scope){
});

angular.module('homeApp').controller('boxController',['$scope','getData',function($scope,getData){
    $scope.storyObjects = [];
    getData('./php/XHR/getposts.php',function(data){
        $scope.storyObjects=data;
        console.log("Awesome");
    })
    $scope.test = "this is a test string";
}]);
