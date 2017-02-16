'use strict';

/**
 * @ngdoc service
 * @name ycspApp.forgotService
 * @description
 * # forgotService
 * Service in the ycspApp.
 */
angular.module('ycspApp')
    .service('forgotService', function (API_URL, $http) {
        return { 
	        forgotPassword: forgotPassword
		};
		
		function getDataComplete(response) {
		    return response.data;
		}

		function getDataFailed(error) {
	        return error.data;
		}
		
		
		/*
		 *  Forgot Process
		 */ 
		function forgotPassword (email) {
		    return	$http({
			    url: API_URL + 'api/v1/forgotPassword',
			    method: 'POST',
			    data: $.param(email)
			})
			.then(getDataComplete)
			.catch(getDataFailed);
		}
  });
