'use strict';

/**
 * @ngdoc directive
 * @name ycspApp.directive:passwordMatch
 * @description
 * # passwordMatch
 */
angular.module('ycspApp')
    .directive('passwordMatch', function () {
        return {
            require: 'ngModel',
            scope: {
                reference: '=confirm'
            },
            link: function(scope, elm, attrs, ctrl) {
                 ctrl.$parsers.unshift(function(viewValue, $scope) {
                    var noMatch = viewValue != scope.reference
                    ctrl.$setValidity('noMatch', !noMatch);
                    return (noMatch)?noMatch:!noMatch;
                });

                scope.$watch("reference", function(value) {;
                    ctrl.$setValidity('noMatch', value === ctrl.$viewValue);
                });
            }
        }
  });
