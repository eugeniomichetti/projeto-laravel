angular.module('app.controllers')
    .controller('projectRemoveController', function ($scope, $routeParams, $location, Project) {
        $scope.project = Project.get({id: $routeParams.id});

        $scope.remove = function () {
            $scope.project.$delete({id: $scope.project.project_id})
                .then(function () {
                    $location.path("/projects");
                });
        };
    });