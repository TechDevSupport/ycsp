'use strict';

/**
 * @ngdoc function
 * @name ycspApp.controller:ForgotCtrl
 * @description
 * # ForgotCtrl
 * Controller of the ycspApp
 */
angular.module('ycspApp')
    .controller('ForgotCtrl', 
	[
	    'API_URL', 
		'forgotService', 
		'$state', 
		'$cookies', 
		function (
		    API_URL, 
			forgotService, 
			$state, 
			$cookies
		) 
		{
			var vm = this;
		    vm.errorMessage = '';
            vm.forgotPassword = function(email) {
	            forgotService.forgotPassword(email).then(function(response) {
		            if(response.status == 'success') {
					    // success case
				    } else {
					    vm.errorMessage = 'Invalid email credentials.'
				    }
		        });
	        }; 
        }
    ]);
