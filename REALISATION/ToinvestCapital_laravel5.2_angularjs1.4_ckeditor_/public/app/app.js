// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.controllers' is found in controllers.js
var HOST = document.location.protocol+'//'+document.location.host;
console.log(HOST);

angular.module('ToInvestCapital', [ 'ngAnimate', 'ngSanitize', 'ngResource','ui.router','ToInvestCapital.values','ToInvestCapital.controllers', 'ToInvestCapital.services'])

.run(function() {
  
})

.config(function($stateProvider, $urlRouterProvider) {
  
$stateProvider
 .state('app', {
    url: '/app',
    abstract: true,
    templateUrl: 'templates/menu.html',
    controller: ''
  })
;
  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('');
});
