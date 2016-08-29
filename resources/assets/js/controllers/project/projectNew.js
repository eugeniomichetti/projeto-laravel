angular.module('app.controllers')
    .controller('projectNewController', function ($scope, $location, $filter, $cookies, Project, Client, appConfig) {
        $scope.project = new Project();
        $scope.status = appConfig.project.status;

        $scope.due_date ={
            opened: false
        };

        $scope.openCalendar = function() {
            $scope.due_date.opened = true;
        };

        $scope.save = function () {
            if ($scope.form.$valid) {
                $scope.project.owner_id = $cookies.getObject('user').id;
                $scope.project.progress = 0;
                //$scope.project.due_date = new Date($scope.project.due_date);
                console.log($scope.project.due_date);
                $scope.project.$save()
                    .then(function () {
                        $location.path('/projects/');
                    });
            }
        };

        $scope.formatName = function (model) {
            if (model) {
                return model.name
            }
            return '';
        };

        $scope.getClients = function (name) {
            return Client.query({
                search: name,
                searchFields: 'name:like'
            }).$promise;
        };

        $scope.selectClient = function ($item) {
            $scope.project.client_id = $item.id;
        };


    });