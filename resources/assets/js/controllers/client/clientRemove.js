angular.module('app.controllers')
    .controller('clientRemoveController', function ($scope, $routeParams, $location, Client) {
        $scope.client = Client.get({id: $routeParams.id});

        $scope.remove = function () {
            $scope.client.$delete()
                .then(function () {
                    $location.path("/clients");
                });
        };
    });