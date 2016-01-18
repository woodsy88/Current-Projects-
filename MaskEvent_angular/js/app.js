var myApp = angular.module('myApp', ['ngRoute']);

myApp.config(function($routeProvider){
    
    $routeProvider
    
    .when('/',{
        templateUrl: 'pages/clue1.html',
        controller: 'mainController'
        
    })
    
    
    .when('/second',{
        templateUrl: 'pages/clue2.html',
        controller:'secondController'        
        
    })
    
    .when('/third',{
        
        templateUrl: 'pages/clue3.html',
        controller: 'thirdController'
    })
});



myApp.controller('mainController', ['$scope', function($scope) {
    
$scope.name = "Main";
    
}]);


myApp.controller('secondController', ['$scope', '$log', function($scope, $log){
    
    $scope.name = 'second';
    
}]);

myApp.controller('thirdController', ['$scope', '$log', function($scope, $log){
    
    $scope.name = 'third';
    
}]);
