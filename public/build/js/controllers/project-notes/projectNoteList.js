angular.module('app.controllers')
    .controller('projectNoteListController', function ($scope, $routeParams, ProjectNote) {
        $scope.projectNotes = ProjectNote.query({id: $routeParams.id});
    });