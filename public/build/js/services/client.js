angular.module('app.services')
    .service('Client', function ($resource, $httpParamSerializer,appConfig) {
        function transformData(data, headers) {
            var response = appConfig.utils.transformResponse(data, headers);
            return $httpParamSerializer(response);
        }

        return $resource(appConfig.baseUrl + '/client/:id', {id: '@id'}, {
            save: {
                method: 'POST',
                transformRequest: transformData
            },
            update: {
                method: 'PUT',
                transformRequest: transformData
            },
            query: {
                method: 'GET',
                isArray: true
            }
        });
    });