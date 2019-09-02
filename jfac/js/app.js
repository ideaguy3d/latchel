const myApp = angular.module('myApp', ['ngRoute']);

myApp.run(['$rootScope', '$location', function ($rootScope, $location) {
    // check for an error during route switching
    $rootScope.$on('$routeChangeError', function (event, next, previous, error) {
        if (error == 'AUTH_REQUIRED') {
            console.log("jha - in if (error == 'AUTH_REQUIRED'){} block");
            $rootScope.message = 'Sorry, you must log in to access that page';
            $location.path('/login');
        } //Auth Required
    }); //$routeChangeError
}]); //run

myApp.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        // Everything has to be relative to the PHP root
        .when('/', {
            templateUrl: 'jfac/views/view.home.html',
            controller: 'JCookieCtrl',
            controllerAs: 'cookie'
        })
        .otherwise({
            redirectTo: '/'
        });
}]);




//