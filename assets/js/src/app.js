/*global angular: true */
(function () {
    "use strict";

    angular
        .module('restApiDemo', ['ngSanitize', 'ngRoute', 'angularMoment'])
        .config(configure)
        .constant('REST_API_PATH', '/wp/wp-json/wp/v2/');

    function configure($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl:  'wp-content/themes/wp-rest-api-demo-theme/assets/templates/post-list.html',
                controller:   'PostsListController',
                controllerAs: 'PostListCtrl'
            })
            .when('/post/:id', {
                templateUrl: 'wp-content/themes/wp-rest-api-demo-theme/assets/templates/single-post.html',
                controller:  'PostController'
            })
            .when('/search/:s', {
                templateUrl:  'wp-content/themes/wp-rest-api-demo-theme/assets/templates/post-list.html',
                controller:   'PostsSearchController',
                controllerAs: 'PostSearchCtrl'
            })
            .when('/category/:slug', {
                templateUrl:  'wp-content/themes/wp-rest-api-demo-theme/assets/templates/post-list.html',
                controller:   'CategoryPostsController',
                controllerAs: 'CategoryPostsCtrl'
            })
            .otherwise('/');
    }
})();