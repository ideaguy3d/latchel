(function () {
    'use strict';

    angular.module('CodeReviewApp', []);
    angular.module('CodeReviewApp')
        .directive('post', [
            function () {
                return {
                    restrict: 'E',
                    replace: true,
                    transclude: true,
                    template: '<div class="lat-ng-container">' +
                        '<div class="post__user" ng-click="toggleCollapse()">user: {{userName}}</div>' +
                        '<div class="post" ng-class="{\'post--collapsed\': collapsed}" ng-transclude></div>' +
                        ' <a ng-cloak data-ng-href="/posts/{{postId}}">Read More</a><ng-transclude></ng-transclude> </div>',
                    scope: {
                        postId: '@',
                        userName: '@'
                    },
                    controller: ['$scope', function ($scope) {
                        $scope.collapsed = true;

                        $scope.toggleCollapse = function () {
                            $scope.collapsed = !$scope.collapsed;
                        };
                    }]
                }
            }
        ]);
}());


