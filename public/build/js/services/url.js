angular.module('app.services')
    .service('Url', function ($interpolate) {
        return {
            getUrlAngular: function (url, params) {
                //id = 1, idFile = 2
                //project/1/file/2
                var urlMod = $interpolate(url)(params);
                return urlMod.replace(/\/\//g, '/').replace(/\/$/, '')
            },

            getUrlResource: function (url) {
                //transforma para: '/project/:id/file/:idFile'
                // 'g' significa global, ou seja, percorrerá toda a string
                return url.replace(new RegExp('{{', 'g'), ':').replace(new RegExp('}}', 'g'), '')
            }
        };

    });