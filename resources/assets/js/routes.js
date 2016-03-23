var app = angular.module('3source');

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: "home.html",
            controller: 'HomeCtrl'

        })
        .otherwise('/');

}]);
