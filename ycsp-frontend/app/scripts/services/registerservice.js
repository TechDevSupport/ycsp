'use strict';

/**
 * @ngdoc service
 * @name ycspApp.registerService
 * @description
 * # registerService
 * Service in the ycspApp.
 */
angular.module('ycspApp')
  .service('registerService', function ($http, API_URL) {
      return { 
	      register: register
		};
		
		function getDataComplete(response) {
			return response.data;
		}

		function getDataFailed(error) {
			return error.data;
		}
		
		/*
		 *  Register New user Process
		 */
		function register (data) {
		    return	$http({
			    url: API_URL + 'api/v1/register', 
				method: 'POST',
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data: $.param(data)
			})
			.then(getDataComplete)
			.catch(getDataFailed);
		}
  });

