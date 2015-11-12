angular.module('homeApp').directive('pgPublishButton',function($http){
    return{
        link: function(scope, element, attrs, ctrl){
            element.on("click",function(){
                console.log(scope.posted);
                var request = $http({
                    url: "./php/XHR/post.php",
                    method: "GET",
                    params: {title:scope.title,
                             description:scope.description,
                             content:scope.content,
                             tags:JSON.stringify(scope.tags)}
                 });
                 request.then(function(response){
                        if(response.data=="true"){
                            console.log("Posted successfully");
                        }
                        else console.log(response.data);
                 });
                 scope.$apply(function(){
                   scope.posted=1;
                 });
            })
        }
    }
});

angular.module('homeApp').directive('pgSaveButton',function($http){
    return{
        link: function(scope, element, attrs, ctrl){

        }
    }
});
