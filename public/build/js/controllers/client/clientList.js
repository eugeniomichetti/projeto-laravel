angular.module('app.controllers')
    .controller('clientListController',  function ($scope, Client) {
        $scope.clients = Client.query();
    });