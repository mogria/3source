var controllers = angular.module('3source.controllers');

controllers
.controller('HomeCtrl', ['$rootScope', '$scope', function($rootScope, $scope){
    $rootScope.booted = true;
    $scope.items = ['One', 'Two', 'And', 'Three', 'Makes', 'Six'];

}]);
