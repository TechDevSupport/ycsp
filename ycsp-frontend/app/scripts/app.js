'use strict';

/**
 * @ngdoc overview
 * @name ycspApp
 * @description
 * # ycspApp
 *
 * Main module of the application.
 */
angular
  .module('ycspApp', [
    'ngAnimate',
    'ngAria',
    'ngCookies',
    'ngMessages',
    'ngResource',
    'ui.router',
    'ngSanitize',
    'ngTouch'
  ])
  .config(function ($stateProvider, $urlRouterProvider, $httpProvider) {
       $httpProvider.interceptors.push(['$cookies', function($cookies) {
           return {
               'request': function(config) {
                   config.headers = config.headers || {};
                   config.headers['Content-Type'] = 'application/x-www-form-urlencoded';
                   config.headers['Accept'] = 'application/json;odata=verbose';
                   var token = $cookies.get('auth_token');
                   if (token) {
                       config.headers.Authorization = token;
                   }
                   return config;
               }
           };
       }]);
	  
	  $urlRouterProvider.otherwise('/');
	  $stateProvider
		.state('/', {
			url: '/',
			templateUrl: 'views/login.html',
			controller: 'LoginCtrl',
			controllerAs: 'login'
		})
		.state('users', {
			url: '/users',
			templateUrl: 'views/users/users.html',
			controller: 'UsersCtrl',
			controllerAs: 'user'
		 })
		 .state('register', {
			url: '/register',
			templateUrl: 'views/register.html',
			controller: 'RegisterCtrl',
			controllerAs: 'register'
		 })
		 .state('forgot', {
			url: '/forgot',
			templateUrl: 'views/forgot.html',
			controller: 'ForgotCtrl',
			controllerAs: 'forgot'
		 })
		 .state('dashboard', {
			url: '/dashboard',
			templateUrl: 'views/dashboard.html',
			controller: 'DashboardCtrl',
			controllerAs: 'dashboard'
		 });
  });
