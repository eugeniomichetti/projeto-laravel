angular.module('app.services')
    .service('ProjectNote', function ($resource, $httpParamSerializer, appConfig) {
        function transformData(data, headers) {
            var response = appConfig.utils.transformResponse(data, headers);
            return $httpParamSerializer(response);
        }

        return $resource(appConfig.baseUrl + '/project/:id/note/:idNote',
            {
                id: '@id',
                idNote: '@idNote'
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