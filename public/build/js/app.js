var app = angular.module('app', ['ngRoute', 'angular-oauth2', 'app.controllers', 'app.services', 'ui.bootstrap', 'ui.bootstrap.datepickerPopup', 'ui.bootstrap.tpls']);

angular.module('app.controllers', ['ngMessages', 'angular-oauth2']);
angular.module('app.services', ['ngResource']);

app.provider('appConfig', function () {
    var config = {
        baseUrl: 'http://localhost:8000',
        project: {
            status: [
                {value: 1, label: 'Não iniciado'},
                {value: 2, label: 'Iniciado'},
                {value: 3, label: 'Finalizado'}
            ]
        },
        utils: {
            transformResponse: function (data, headers) {
                var headersGetter = headers();
                if (headersGetter['content-type'] == 'application/json' || headersGetter['content-type'] == 'text/json') {
                    var dataJson = JSON.parse(data);
                    if (dataJson.hasOwnProperty('data')) {
                        dataJson = dataJson.data;
                    }
                    return dataJson;
                }
                return data;
            }
        }
    };
    return {
        config: config,
        $get: function () {
            return config;
        }
    }
});

app.config(
    ['$routeProvider', '$httpProvider', 'OAuthProvider', 'OAuthTokenProvider', 'appConfigProvider', function
        ($routeProvider, $httpProvider, OAuthProvider, OAuthTokenProvider, appConfigProvider) {
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8'
        $httpProvider.defaults.headers.put['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8'
        $httpProvider.defaults.transformResponse = function (data, headers) {
            var headersGetter = headers();
            if (headersGetter['content-type'] == 'application/json' || headersGetter['content-type'] == 'text/json') {
                var dataJson = JSON.parse(data);
                if (dataJson.hasOwnProperty('data')) {
                    dataJson = dataJson.data;
                }
                return dataJson;
            }
            return data;
        };
        $routeProvider
            .when('/login', {
                templateUrl: 'build/views/login.html',
                controller: 'loginController'
            })
            .when('/home', {
                templateUrl: 'build/views/home.html',
                controller: 'homeController'
            })
            .when('/clients', {
                templateUrl: 'build/views/client/list.html',
                controller: 'clientListController'
            })
            .when('/clients/new', {
                templateUrl: 'build/views/client/new.html',
                controller: 'clientNewController'
            })
            .when('/clients/:id/edit', {
                templateUrl: 'build/views/client/edit.html',
                controller: 'clientEditController'
            })
            .when('/clients/:id/remove', {
                templateUrl: 'build/views/client/remove.html',
                controller: 'clientRemoveController'
            })
            .when('/project/:id/notes', {
                templateUrl: 'build/views/project-notes/list.html',
                controller: 'projectNoteListController'
            })
            .when('/project/:id/notes/:idNote/show', {
                templateUrl: 'build/views/project-notes/show.html',
                controller: 'projectNoteShowController'
            })
            .when('/project/:id/notes/new', {
                templateUrl: 'build/views/project-notes/new.html',
                controller: 'projectNoteNewController'
            })
            .when('/project/:id/notes/:idNote/edit', {
                templateUrl: 'build/views/project-notes/edit.html',
                controller: 'projectNoteEditController'
            })
            .when('/project/:id/notes/:idNote/remove', {
                templateUrl: 'build/views/project-notes/remove.html',
                controller: 'projectNoteRemoveController'
            })
            .when('/projects', {
                templateUrl: 'build/views/project/list.html',
                controller: 'projectListController'
            })
            .when('/projects/new', {
                templateUrl: 'build/views/project/new.html',
                controller: 'projectNewController'
            })
            .when('/projects/:id/edit', {
                templateUrl: 'build/views/project/edit.html',
                controller: 'projectEditController'
            })
            .when('/projects/:id/remove', {
                templateUrl: 'build/views/project/remove.html',
                controller: 'projectRemoveController'
            });

        OAuthProvider.configure({
            baseUrl: appConfigProvider.config.baseUrl,
            clientId: 'appid1',
            clientSecret: 'secretapp', // optional
            grantPath: 'oauth/access_token'
        });

        OAuthTokenProvider.configure({
            name: 'token',
            options: {
                secure: false
            }
        });
    }]);

app.run(['$rootScope', '$window', 'OAuth', function ($rootScope, $window, OAuth) {
    $rootScope.$on('oauth:error', function (event, rejection) {
        // Ignore `invalid_grant` error - should be catched on `LoginController`.
        if ('invalid_grant' === rejection.data.error) {
            return;
        }

        // Refresh token when a `invalid_token` error occurs.
        if ('invalid_token' === rejection.data.error) {
            return OAuth.getRefreshToken();
        }

        // Redirect to `/login` with the `error_reason`.
        return $window.location.href = '/login?error_reason=' + rejection.data.error;
    });
}]);