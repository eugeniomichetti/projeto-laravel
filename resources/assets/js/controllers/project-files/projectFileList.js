angular.module('app.controllers')
    .controller('projectFileListController', function ($scope, $routeParams, ProjectNote) {
        $scope.projectNotes = ProjectNote.query({id: $routeParams.id});
    });