angular.module('app.services')
    .service('ProjectFile', function ($resource, $httpParamSerializer, appConfig) {
        function transformData(data, headers) {
            var response = appConfig.utils.transformResponse(data, headers);
            return $httpParamSerializer(response);
        }

        return $resource(appConfig.baseUrl + '/project/:id/file/:idFile',
            {
                id: '@id',
                idFile: '@idFile'
            }, {
                save: {
                    method: 'POST',
                    transformRequest: transformData
                },
                update: {
                    method: 'PUT',
                    transformRequest: transformData

                },
            });
    });