'use strict';

/**
 * @ngdoc service
 * @name ycspApp.loginService
 * @description
 * # loginService
 * Service in the ycspApp.
 */
angular.module('ycspApp')
  .service('loginService', function ($http, API_URL) {
      return { 
	      dologin: dologin,
	      logout: logout
		};
		
		function getDataComplete(response) {
			return response.data;
		}

		function getDataFailed(error) {
			return error.data;
		}
		
		/*
		 *  Do login Process
		 */
		function dologin (loginData) {
		    return	$http({
			    url: API_URL + 'api/v1/authenticate', 
				method: 'POST',
				data: $.param(loginData)
			})
			.then(getDataComplete)
			.catch(getDataFailed);
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
