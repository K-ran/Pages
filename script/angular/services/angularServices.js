angular.module('homeApp').factory('getData',['$http',function($http){
    return function(url,callback){
        $http.get(url).then(function(response){
            callback(response.data);
        });
    }
}]);
