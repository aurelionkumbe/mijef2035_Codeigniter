

/*------------------------------------------------------------
 * ===========================================================
 *  CREATION DES ROUTES ET LES REDIRECTIONS
 * ===========================================================
 * ----------------------------------------------------------
 */  
 var app = angular.module('voxafrica', ['ui.router']);


 app.config(uiRouting);




 function uiRouting($stateProvider, $urlRouterProvider,$locationProvider, $sceDelegateProvider){
    $urlRouterProvider.otherwise('/accueil');
  //  $locationProviderhtml5Mode(true);
  //  
  //  
  $sceDelegateProvider.resourceUrlWhitelist([
    // Allow same origin resource loads.
    'self',
    // Allow loading from our assets domain.  Notice the difference between * and **.
    'http://youtube.com/**',
    'http://playtv.fr/**',
    'http://www.voxafrica.com/**'
    ]);


  $stateProvider.
  state('Accueil', {
    url: '/accueil',
    controller: 'produit',
    templateUrl: 'template/accueil.html'

}).
  state('Prog', {
    url: '/programme',
    controller: 'produit',
    templateUrl: 'template/programme.html'

}).
  state('Replay', {
    url: '/replay',
    controller: 'produit',
    templateUrl: 'template/replay.html'

}).
  state('Jeux', {
    url: '/jeux',
    controller: 'produit',
    templateUrl: 'template/jeux.html'

})
  ;
}


