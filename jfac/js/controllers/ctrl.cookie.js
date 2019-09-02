/**
 * Created by Julius Alvarado on 9/1/2019.
 */

myApp.controller('JCookieCtrl', ['$scope', '$location', '$http',
        function ($scope,  $location, $http) {
            const vm = this;

            $scope.s_status = 'Scope wired up';

            vm.status = 'JCookie Controller wired up.';
            vm.facId = facIdGlobal;
            vm.clientFac = facSelectGlobal;

           $scope.s_setCookie = function(fac){
                console.log('will make request to PHP for '+fac);
                // http://localhost/latchel/?fac=
                $http.get('http://localhost/latchel/?fac='+fac)
                    .then(function(res) {
                        console.log('response from server:');
                        console.log(res); 
                    }).catch(function(err) {
                        console.log('error from server:');
                        console.log(err);
                    });
           }

        }
    ]
); // Controller