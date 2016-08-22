angular.module('app.controllers')
    .controller('loginController', function ($scope, $location, $cookies, OAuth, User) {
        $scope.user = {
            username: '',
            password: ''
        };

        $scope.error = {
            status: false,
            message: ''
        };

        $scope.login = function () {
            if ($scope.form.$valid) {
                OAuth.getAccessToken($scope.user)
                    .then(function () {
                        User.authenticated({}, function (data) {
                            $cookies.putObject('user', data);
                            $location.path('home');
                        });
                    }, function (i) {
                        $scope.error.status = true;
                        $scope.error.message = i.data.error_description;
                    });
            }
        };
    });