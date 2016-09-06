angular.module('app.controllers')
    .controller('projectFileNewController', function ($scope, $location, $routeParams, appConfig, Url, Upload) {

        $scope.save = function () {
            if ($scope.form.$valid) {
                Upload.upload({
                    url: appConfig.baseUrl + Url.getUrlAngular(appConfig.urls.projectFile, {
                        id: $routeParams.id,
                        idFile: ''
                    }),
                    data: {
                        file: $scope.projectFile.file,
                        name: $scope.projectFile.name,
                        description: $scope.projectFile.description,
                        project_id: $routeParams.id
                    }
                }).then(function (resp) {
                    $location.path('/project/' + $routeParams.id + '/files');
                });
            }
        };
    });