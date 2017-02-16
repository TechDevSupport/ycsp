'use strict';

/**
 * @ngdoc function
 * @name ycspApp.controller:DashboardCtrl
 * @description
 * # DashboardCtrl
 * Controller of the ycspApp
 */
angular.module('ycspApp')
    .controller('DashboardCtrl', 
	[
	    'API_URL', 
		'dashboardService', 
		'$state', 
		'$cookies', 
		function (
		    API_URL, 
			dashboardService, 
			$state, 
			$cookies
		) 
		{
			var vm = this;
			vm.logout = function() {
				dashboardService.logout().then(function(response) {
		            if(response.status == 'success') {
						$cookies.remove('auth_token');
					    $state.go('/');
					} else {
						console.log('Not logout due to an error.');
					}
		        });
			}
        }
    ]);
