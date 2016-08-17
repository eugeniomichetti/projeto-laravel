angular.module('app.services')
    .service('Client', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/client/:id', {id: '@id'}, {
            update: {
                method: 'PUT',
                isArray: true
            },
            query: {
                method: 'GET',
                isArray: true
            }
        });
    });