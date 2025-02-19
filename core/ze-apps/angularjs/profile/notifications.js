app.controller('ComZeAppsProfileNotificationsCtrl', ['$scope', '$route', '$routeParams', '$location', '$rootScope', '$http', '$interval',
    function ($scope, $route, $routeParams, $location, $rootScope, $http, $interval) {

        $scope.notifications = {};

        var loadNotifications = function(){
            $http.get('/ze-apps/notification/getAll').then(function (response) {
                if (response.data && response.data != false) {
                    var notifications = {};
                    for(var i=0; i < response.data.length; i++){
                        if(notifications[response.data[i].module] == undefined) {
                            notifications[response.data[i].module] = {};
                            notifications[response.data[i].module].notifications = [];
                            notifications[response.data[i].module].color = response.data[i].color;
                        }
                        notifications[response.data[i].module].notifications.push(response.data[i]);
                    }
                    $scope.notifications = notifications;
                }
            });
        };

        loadNotifications();

        $interval(function(){
            loadNotifications();
        }, 30000);

        $scope.hasNotifications = function(){
            return Object.keys($scope.notifications).length;
        };

    }]);