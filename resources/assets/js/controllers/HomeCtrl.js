var controllers = angular.module('3source.controllers');

controllers
.controller('HomeCtrl', ['$rootScope', '$scope', 'dungeonService', function($rootScope, $scope, dungeonService){
    $rootScope.booted = true;
    dungeonService.getDungeons(function(result) {
        console.log(result);
        $scope.dungeons = result.data;
    }, function(error) {
    });

}]);
