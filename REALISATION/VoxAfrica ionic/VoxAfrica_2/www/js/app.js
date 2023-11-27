// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.controllers' is found in controllers.js
var voxafrica = angular.module('voxafrica', ['ionic', 'voxafrica.controllers'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);

    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider, $sceDelegateProvider) {

  $sceDelegateProvider.resourceUrlWhitelist([
    // Allow same origin resource loads.
    'self',
    // Allow loading from our assets domain.  Notice the difference between * and **.
    'http://playtv.fr/**',
    'http://www.voxafrica.com/**',
    'http://play.famobi.com/**'
    ]);

  $stateProvider

  .state('app', {
    url: '/app',
    abstract: true,
    templateUrl: 'templates/menu.html',
    controller: 'AppCtrl'
  })
  .state('app.accueil', {
    url: '/accueil',
    views: {
      'menuContent': {
        templateUrl: 'templates/accueil.html',
        controller: 'AppCtrl'
      }
    }
  })  
  .state('app.live', {
    url: '/live',
    views: {
      'menuContent': {
        templateUrl: 'templates/live.html',
        controller: 'AppCtrl'
      }
    }
  })
  .state('app.programme', {
    url: '/programme',
    views: {
      'menuContent': {
        templateUrl: 'templates/programm.html',
        controller: 'AppCtrl'
      }
    }
  })
  .state('app.replay', {
    url: '/replay',
    views: {
      'menuContent': {
        templateUrl: 'templates/replay.html',
        controller: 'AppCtrl'
      }
    }
  })
  .state('app.jeux', {
    url: '/jeux',
    views: {
      'menuContent': {
        templateUrl: 'templates/jeux.html',
        controller: 'AppCtrl'
      }
    }
  })


  .state('app.single', {
    url: '/playlists/:playlistId',
    views: {
      'menuContent': {
        templateUrl: 'templates/playlist.html',
        controller: 'PlaylistCtrl'
      }
    }
  });
  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/app/live');
});
