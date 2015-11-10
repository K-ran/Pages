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


angular.module('homeApp').controller('writeController',['$scope','$http',function($scope, $http){
    $scope.loadTags = function(query) {
        return $http.get('./php/XHR/gettags.php?query=' + query);
    };
}]);

angular.module('homeApp').controller('recentController',['$scope','getData',function($scope,getData){
    $scope.storyObjects = [];
    getData('./php/XHR/getrecentposts.php',function(data){
        $scope.storyObjects=data;
        console.log("Awesome");
    })

    $scope.loadMoreStories= function(){
        getData('./php/XHR/getrecentposts.php',function(data){
            for(var i=0;i<data.length;i++)
            $scope.storyObjects.push(data[i]);
        })
    }
    $scope.test = "this is a test string";
}]);
