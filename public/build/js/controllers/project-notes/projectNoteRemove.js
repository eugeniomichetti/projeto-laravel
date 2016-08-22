angular.module('app.controllers')
    .controller('projectNoteRemoveController', function ($scope, $routeParams, $location, ProjectNote) {
        $scope.projectNote = ProjectNote.search({id: $routeParams.id});
        console.log($scope.projectNote);
        $scope.remove = function () {
            $scope.projectNote.$delete({id: null, idNote: $scope.projectNote.id})
                .then(function () {
                    $location.path('/project/' + $routeParams.id + '/notes');
                });
        };
    });