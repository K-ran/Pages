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
    $scope.posted=0;
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

angular.module('homeApp').controller('myStories',['$scope','getData',function($scope,getData){
    $scope.storyObjects = [];
    $scope.editClick=function(index){
        $scope.index=index;
    }
    getData('./php/XHR/getmystories.php',function(data){
        $scope.storyObjects=data;
        console.log($scope.storyObjects);
    })
}]);

angular.module('homeApp').controller('editBoxController',['$scope','$routeParams',function($scope, $routeParams){
    $scope.object=JSON.parse($routeParams.object);
    $scope.title=$scope.object.topic;
    $scope.description=$scope.object.description;
    $scope.content=$scope.object.content;
    console.log($scope.object.content);
}]);
