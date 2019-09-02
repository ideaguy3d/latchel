/**
 * Created by Julius Alvarado on 9/1/2019.
 */

myApp.controller('JCookieCtrl', ['$scope', '$location', '$http',
        function ($scope,  $location, $http) {
            const vm = this;

            $scope.s_status = 'Scope wired up';

            vm.status = 'JCookie Controller wired up.';
            vm.facId = facIdGlobal;

           $scope.setCookie = function(){

           }

        }
    ]
); // Controller