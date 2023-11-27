'use strict';

/**
 * @ngdoc overview
 * @name vipdecorangularApp
 * @description
 * # vipdecorangularApp
 *
 * Main module of the application.
 */
angular
  .module('vipdecorangularApp', [
    'ngRoute'
  ])
  .run(function ($rootScope,$window) {
    $rootScope._ = $window._;
    $rootScope.$ = $window.$;
    $rootScope.loki = $window.loki;
  })
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main',
        controller: 'MainCtrl',
        controllerAs: 'main'
      })
      .when('/decoration', {
        templateUrl: 'views/decoration',
        controller: 'DecoCtrl',
        controllerAs: 'deco'
      })
      .when('/materiel', {
        templateUrl: 'views/materiel',
        controller: 'MaterielCtrl',
        controllerAs: 'materiel'
      })
      .when('/photo', {
        templateUrl: 'views/photo',
        controller: 'PhotoCtrl',
        controllerAs: 'main'
      })
      .when('/contact', {
        templateUrl: 'views/contact',
        controller: 'MailCtrl',
        controllerAs: 'mail'
      })
      /// admin routeProvider
      .when('/dashboard', {
        templateUrl: 'views/dashboard',
        controller: 'DashboardCtrl',
        controllerAs: 'dashboard'
      })
      .when('/login', {
        templateUrl: 'views/login',
        controller: 'LoginCtrl',
        controllerAs: 'login'
      })
      .when('/register', {
        templateUrl: 'views/register',
        controller: 'RegisterCtrl',
        controllerAs: 'register'
      })
      .otherwise({
        redirectTo: '/'
      });

  });
