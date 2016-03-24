var services = angular.module('3source.services');

services
.factory('dungeonService', ['$http', function($http){
    var dungeonService = {
        'getDungeons' : function(successCallback, errorCallback) {
            $http.get('/dungeons').then(successCallback, errorCallback);
        },
        'getDungeon': function(id, successCallback, errorCallback) {
            $http.get('/dungeons/' + (+id)).then(successCallback, errorCallback);
        }
    };
    return dungeonService;

}]);
