angular.module('app.directives')
    .directive('projectFileDownload', function (appConfig, ProjectFile) {

        return {
            restrict: 'E',
            templateUrl: appConfig.baseUrl + '/build/views/templates/projectFileDownload.html',
            link: function (scope, element, attr) {

            },
            controller: function ($scope, $element, $attrs) {
                $scope.downloadFile = function () {
                    var anchor = $element.children()[0];
                    $(anchor).addClass('disable');
                    $(anchor).text('Carregando...');
                    ProjectFile.download({id: null, idFile: $attrs.idFile}, function (data) {
                        $(anchor).removeClass('disable');
                        $(anchor).attr({
                            href: 'data:application/octet-stream;base64,' + data.file
                        });
                    });
                };
            }
        };
    });