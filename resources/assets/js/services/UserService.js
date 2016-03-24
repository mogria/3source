var services = angular.module('3source.services');

services
.factory('userService', ['$http', function($http){
    var dungeonService = {
        'getUser': function(id, successCallback, errorCallback) {
            $http.get('/users/' + (+id)).then(successCallback, errorCallback);
        },
        'setDungeon': function(user_id, dungeon_id, successCallback, errorCallback) {
            $http.put('/users/' + (+user_id), {'dungeon_id': dungeon_id}).then(successCallback, errorCallback);
        }
    };
    return dungeonService;

}]);
