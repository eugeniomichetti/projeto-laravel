angular.module('app.services')
    .service('User', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/user', {}, {
            authenticated: {
                url: appConfig.baseUrl + '/user/authenticated',
                method: 'GET'
            }
        });
    });