'use strict';

/**
 * @ngdoc function
 * @name ycspApp.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the ycspApp
 */
angular.module('ycspApp')
    .controller('LoginCtrl', 
	[
	    'API_URL',  
		'loginService', 
		'$state', 
		'$cookies', 
		function (
		    API_URL, 
			loginService, 
			$state, 
			$cookies
		) 
		{
			var vm = this;
		    vm.loginData = {};
		    vm.errorMessage = '';
            vm.dologin = function(loginData) {
	            loginService.dologin(loginData).then(function(response) {
		            if(response.status == 'success') {
					    $state.go('dashboard');
				    } else {
					    vm.errorMessage = 'Invalid email credentials.'
				    }
		        });
	        }; 
        }
    ]);
