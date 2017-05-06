var app = angular.module('Blog', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('BlogController', function ($http, $scope) {
    $scope.blog = {
        title: "",
        main_image: "",
        body: "",
        summary: ""
    };
    $scope.show = function () {
        $http.get('show').success(function (response) {
            $scope.blogs = response.data;
        })
    };
    $scope.storeBlog = function () {
        $http({
            method: 'POST',
            url: 'blog',
            data: JSON.stringify($scope.blog),  //forms user object
        }).success(function (data) {
            $scope.show();
        }).error(function (data) {
            console.log(data);
        });
    }
});