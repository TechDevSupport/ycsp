'use strict';

/**
 * @ngdoc function
 * @name ycspApp.controller:RegisterCtrl
 * @description
 * # RegisterCtrl
 * Controller of the ycspApp
 */
angular.module('ycspApp')
    .controller('RegisterCtrl', 
	[
	    'API_URL', 
		'$scope', 
		'$rootScope', 
		'registerService', 
		function (
		    API_URL, 
		    $scope, 
		    $rootScope, 
		    registerService
		) 
		{
		    $scope.registerMessage = '';
            $scope.registerUser = function(data) {
		        registerService.register(data).then(function(response) {
		            if(response.status == 'success') {
					    $scope.registerMessage = response.message;
				    } else {
					    $scope.registerMessage = response.message;
				    }    
		        });
	        }; 
        }
    ]);
