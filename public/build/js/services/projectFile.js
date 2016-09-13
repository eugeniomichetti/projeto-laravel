angular.module('app.services')
    .service('ProjectFile', function ($resource, $httpParamSerializer, Url, appConfig) {
        function transformData(data, headers) {
            var response = appConfig.utils.transformResponse(data, headers);
            return $httpParamSerializer(response);
        }

        var url = appConfig.baseUrl + Url.getUrlResource(appConfig.urls.projectFile);
        return $resource(url,
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
                download: {
                    method: 'GET',
                    url: url + '/download'
                },
            });
    });