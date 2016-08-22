angular.module('app.services')
    .service('ProjectNote', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/project/:id/note/:idNote',
            {
                id: '@id',
                idNote: '@idNote'
            }, {
                update: {
                    method: 'PUT'
                },
                search: {
                    method: 'GET',
                    transformResponse: function (data, headers) {
                        var headersGetter = headers();
                        if (headersGetter['content-type'] == 'application/json' || headersGetter['content-type'] == 'text/json') {
                            var dataJson = JSON.parse(data);
                            if (dataJson.hasOwnProperty('data')) {
                                dataJson = dataJson.data[0];
                            }
                            return dataJson;
                        }
                        return data;
                    }
                }
            });
    });