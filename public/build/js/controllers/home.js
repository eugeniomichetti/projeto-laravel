angular.module('app.controllers')
    .controller('homeController', function ($scope, $cookies) {
        console.log($cookies.getObject('user').email);
    });