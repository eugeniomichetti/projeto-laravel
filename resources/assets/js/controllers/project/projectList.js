angular.module('app.controllers')
    .controller('projectListController',  function ($scope, Project) {
        $scope.projects = Project.query();
    });