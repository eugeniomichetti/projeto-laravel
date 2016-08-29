angular.module('app.services')
    .service('Project', function ($resource, $filter, $httpParamSerializer, appConfig) {
        function transformData(data, headers) {
            var response = appConfig.utils.transformResponse(data, headers);
            return $httpParamSerializer(response);
        }

        function formatDate(data, headers) {
            var response = appConfig.utils.transformResponse(data, headers);
            if (angular.isObject(response) && response.hasOwnProperty('due_date')) {
                response.due_date = new Date($filter('date')(response.due_date, 'yyyy/MM/dd'));
                return response;
            }
            return response;
        }

        return $resource(appConfig.baseUrl + '/project/:id', {id: '@id'}, {
            save: {
                method: 'POST',
                transformRequest: transformData,
                transformResponse: formatDate

            },
            update: {
                method: 'PUT',
                transformRequest: transformData
            },

            get: {
                method: 'GET',
                transformResponse: formatDate
            }
        });
    });