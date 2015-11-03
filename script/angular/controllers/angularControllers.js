angular.module('registrationApp').controller('registrationController',function($scope){
});

angular.module('homeApp').controller('boxController',['$scope','getData',function($scope,getData){
    $scope.storyObjects = [];
    getData('./php/XHR/getposts.php',function(data){
        $scope.storyObjects=data;
        console.log("Awesome");
    })

    $scope.loadMoreStories= function(){
        getData('./php/XHR/getposts.php',function(data){
            for(var i=0;i<data.length;i++)
            $scope.storyObjects.push(data[i]);
        })
    }
    $scope.test = "this is a test string";
}]);


angular.module('homeApp').controller('writeController',function(){

});
