'use strict';

/**
 * @ngdoc service
 * @name ycspApp.dashboardService
 * @description
 * # dashboardService
 * Service in the ycspApp.
 */
angular.module('ycspApp')
  .service('dashboardService', function ($http, API_URL) {
      return { 
	      logout: logout
		};
		
		function getDataComplete(response) {
			return response.data;
		}

		function getDataFailed(error) {
			return error.data;
		}
		
		/*
		 *  Logout Process
		 */ 
		function logout () {
		    return	$http({
			    url: API_URL + 'api/v1/logout'
			})
			.then(getDataComplete)
			.catch(getDataFailed);
		}
  });

