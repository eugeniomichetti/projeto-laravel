angular.module('app.controllers')
    .controller('projectNoteEditController', function ($scope, $routeParams, $location, ProjectNote) {
        $scope.projectNote = ProjectNote.get({id: $routeParams.id, idNote: $routeParams.idNote});

        $scope.save = function () {
            if ($scope.form.$valid) {
                ProjectNote.update({id: null, idNote: $scope.projectNote.id}, $scope.projectNote, function () {
                    $location.path('/project/'+ $scope.projectNote.project_id + '/notes');
                });
            }
        };
    });