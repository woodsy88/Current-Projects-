var app = angular.module("eagle",['ngRoute']);


app.config(function ($routeProvider) { 
  $routeProvider 
    .when('/home', { 
      controller: 'HomeController', 
      templateUrl: 'views/home.html' 
    }) 
  .when('/commercial', { 
      controller: 'HomeController', 
      templateUrl: 'views/commercial.html' 
    }) 
  .when('/residential', { 
      controller: 'HomeController', 
      templateUrl: 'views/residential.html' 
    }) 
   .when('/contact', { 
      controller: 'HomeController', 
      templateUrl: 'views/contact.html' 
    }) 
    .otherwise({ 
      redirectTo: '/home' 
    }); 
});

app.controller('HomeController', ['$scope', function($scope) {
    
$scope.name = "home";
    
}]);


myApp.controller('secondController', ['$scope', '$log', function($scope, $log){
    
    $scope.name = 'second';
    
}]);

myApp.controller('thirdController', ['$scope', '$log', function($scope, $log){
    
    $scope.name = 'third';
    
}]);
