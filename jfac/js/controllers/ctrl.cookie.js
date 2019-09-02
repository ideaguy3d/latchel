/**
 * Created by Julius Alvarado on 9/1/2019.
 */

myApp.controller('JCookieCtrl',
    ['$scope', '$location',
        function ($scope,  $location) {
            const vm = this;

            $scope.s_status = 'Scope wired up';

            vm.status = 'JCookie Controller wired up.';

           $scope.setCookie = function(){

           }

        }
    ]
); // Controller