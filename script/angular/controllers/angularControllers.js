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
    $scope.publish=function(a){
        var request = $http({
            url: "./php/XHR/post.php",
            method: "GET",
            params: {title:$scope.title,
                     draft:a,
                     description:$scope.description,
                     content:$scope.content,
                     tags:JSON.stringify($scope.tags)}
         });
         request.then(function(response){
                if(response.data=="true"){
                    console.log("Posted successfully");
                    $scope.posted=1+a;
                }
                else console.log(response.data);
         });
    }
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

angular.module('homeApp').controller('editBoxController',['$scope','$routeParams','$http',function($scope, $routeParams,$http){
    $scope.object=JSON.parse($routeParams.object);
    $scope.title=$scope.object.topic;
    $scope.description=$scope.object.description;
    $scope.content=$scope.object.content;
    console.log($scope.object.post_id);
    var request = $http({
        url: "./php/XHR/getedittags.php",
        method: "GET",
        params: {post_id:$scope.object.post_id }
     });
     request.then(function(response){
            $scope.tags=response.data;
     });
     $scope.loadTags = function(query) {
         return $http.get('./php/XHR/gettags.php?query=' + query);
     };
    console.log($scope.object.content);
    $scope.updatepost=function(){
        var request = $http({
            url: "./php/XHR/updatepost.php",
            method: "GET",
            params: {post_id:$scope.object.post_id,
                     title:$scope.title,
                     description:$scope.description,
                     content:$scope.content,
                     tags:JSON.stringify($scope.tags)}
         });
         request.then(function(response){
                if(response.data=="true"){
                    console.log("Posted successfully");
                    $scope.posted=1;
                }
                else console.log(response.data);
         });
    }
}]);

angular.module('homeApp').controller('infoController',['$scope','$http',function($scope,$http){
    $scope.bunty=false;
    $scope.bunty2=false;
    $scope.editButtonLabel="Edit";
    var request = $http({
        url: "./php/XHR/getpersonalinfo.php",
        method: "GET"
     });
     request.then(function(response){
            var info = response.data;
            console.log(response.data);
            $scope.dob=info.dob;
            $scope.first_name=info.first_name;
            $scope.last_name=info.last_name;
            $scope.about_me=info.about_me;
            $scope.gender='m';
     });
    $scope.PersonalEditButton=function(){
        $scope.passheading="Change Password"
    	$scope.bunty=!$scope.bunty;
        $scope.bunty2=!$scope.bunty2;
    	if($scope.bunty==false){
    		$scope.editButtonLabel="Edit";
            console.log($scope.first_name);
            var request = $http({
                url: "./php/XHR/updatepersonalinfo.php",
                method: "GET",
                params: {
                         dob:$scope.dob,
                         first_name:$scope.first_name,
                         last_name:$scope.last_name,
                         gender:$scope.gender,
                         about_me:$scope.about_me
                         }
             });
             request.then(function(response){
                    if(response.data=="true"){
                        console.log(response.data);
                        console.log("Updated successfully");
                    }
                    else console.log(response.data);
             });
    	}
    	else $scope.editButtonLabel="Save";
        console.log($scope.dob);
    }

    $scope.passwordChange=function(){
        if($scope.confirmpassword!=$scope.newpassword)
            return;
        console.log("changing password");
        var request = $http({
            method: "post",
            url: "../php/XHR/changepassword.php",
            data: {
                oldpassword:$scope.oldpassword,
                newpassword:$scope.newpassword
            }
        });
        request.then(function(response){
            console.log(response.data);
            if(response.data=="true"){
                $scope.passheading="Passowrd changed";
                $scope.newpassword="";
                $scope.oldpassword="";
                $scope.confirmpassword="";
            }
            else{
                $scope.passheading="Somethings wrong";
                $scope.newpassword="";
                $scope.oldpassword="";
                $scope.confirmpassword="";
            }
        });
    }

}]);

angular.module('homeApp').controller('otherPersonController',['$scope','$http','$routeParams',function($scope, $http, $routeParams){
    var info;
    var request = $http({
        url: "./php/XHR/getothersinfo.php",
        method: "GET",
        params: {id: $routeParams.id}
     });
     request.then(function(response){
          info = response.data;
          $scope.first_name=info.first_name;
          $scope.last_name=info.last_name;
          $scope.gender=info.gender;
          $scope.dob=info.dob;
          $scope.aboutme=info.about_me;
          if(info.follow=="false")
            $scope.followtext="Follow";
          else  $scope.followtext="Unfollow";
     });

     $scope.followme=function(){
     if(info.follow=="false"){
         var request = $http({
             url: "./php/XHR/follow.php",
             method: "GET",
             params: {id: $routeParams.id}
          });
          request.then(function(response){
              console.log(response.data);
              if(response.data=="true"){
                  $scope.followtext="Unfollow";
                  info.follow="true";
              }
          });
      }
      else {
          var request = $http({
              url: "./php/XHR/unfollow.php",
              method: "GET",
              params: {id: $routeParams.id}
           });
           request.then(function(response){
               console.log(response.data);
               if(response.data=="true"){
                   $scope.followtext="follow";
                   info.follow="false";
               }
           });
      }
     }
}]);
