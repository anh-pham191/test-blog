var app = angular.module('Blog', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('BlogController', function ($http, $scope) {
        $scope.show = function () {
            $http.get('show').success(function (response) {
                $scope.blogs = response.data;
            })
        };
    }
)