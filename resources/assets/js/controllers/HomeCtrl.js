var controllers = angular.module('3source.controllers');

controllers
.controller('HomeCtrl', ['$rootScope', '$scope', 'dungeonService', 'userService', function($rootScope, $scope, dungeonService, userService){
    $rootScope.booted = true;
    dungeonService.getDungeons(function(result) {
        $scope.dungeons = result.data;
    }, function(error) {
    });

    $scope.enterDungeon = function(dungeon_id) {
        userService.setDungeon(1, dungeon_id, function(result) {
            console.log(result);
        }, function(error) {
            console.log(error);
        })
    };

}]);
