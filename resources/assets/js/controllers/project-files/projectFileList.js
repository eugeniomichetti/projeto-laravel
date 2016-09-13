angular.module('app.controllers')
    .controller('projectFileListController', function ($scope, $routeParams, ProjectFile) {
        $scope.projectFiles = ProjectFile.query({id: $routeParams.id});
    });