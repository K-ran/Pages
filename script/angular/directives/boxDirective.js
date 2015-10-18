angular.module('homeApp').directive('pgLikeCheck',function($http,$compile){
    return {
        link: function(scope, element, attrs, ctrl){
          var liked="false";
            var request = $http({
                url: "./php/XHR/checklike.php",
                method: "GET",
                params: {post_id: scope.object.post_id}
             });
             request.then(function(response){
                liked=response.data;
                console.log(liked);
                if(liked=="true")
                  scope.like=1;
                else
                  scope.like=0;
             });
            element.on("click",function(){
                    var request2 = $http({
                        url: "./php/XHR/dolike.php",
                        method: "GET",
                        params: {post_id: scope.object.post_id}
                     });
                     request2.then(function(response2){
                        if(response2.data=="true"){
                            scope.like=!scope.like;
                        }
                     });
            });
        }
    }
});
