

/*------------------------------------------------------------
 * ===========================================================
 *  CREATION DES ROUTES ET LES REDIRECTIONS
 * ===========================================================
 * ----------------------------------------------------------
 */
var app = angular.module('fecarugby', ['ui.router', 'ngResource', 'ngSanitize']);

app.run(function() {
    
    
});

app.config(uiRouting);

function uiRouting($stateProvider, $urlRouterProvider, $locationProvider) {
    $urlRouterProvider.otherwise('/accueil');
    //  $locationProvider.html5Mode(true);
    $stateProvider.
        state('Accueil', {
            url: '/accueil',
            controller: 'AppCtrl',
            templateUrl: 'app/views/accueil.html'

        }).
        state('Competitions', {
            url: '/competitions/:type', // nationale ou internationale ?
            templateUrl: 'app/views/competition.html',
            controller: 'CompetitionCtrl'
        }).
        state('Clubs', {
            url: '/clubs/:type',
            templateUrl: 'app/views/clubs.html',
            controller: 'EquipeCtrl'
        }).
        state('Division', {
            url: '/clubs/division/:id',
            templateUrl: 'app/views/clubs.html',
            controller: 'DivisionCtrl'
        }).
        state('Dirigeants', {
            url: '/dirigeants/:staff',
            templateUrl: 'app/views/dirigeants.html',
            controller: 'DirigeantCtrl'
        }).
        state('Documents', {
            url: '/documents',
            templateUrl: 'app/views/documents.html',
            controller: 'DocumentCtrl'
        }).
        state('Historique', {
            url: '/historique-federale',
            templateUrl: 'app/views/historique.html',
            controller: 'AppCtrl'
        }).
        state('Internationale', {
            url: '/actualite/internationale',
            templateUrl: 'app/views/actu_internationale.html',
            controller: 'AppCtrl'
        }).
        state('Nationale', {
            url: '/actualite/nationale',
            templateUrl: 'app/views/actu_nationale.html',
            controller: 'AppCtrl'
        }).
        state('Publications', {
            url: '/actualite/nationale',
            templateUrl: 'app/views/publications.html',
            controller: 'AppCtrl'
        }).
        state('Boutique', {
            url: '/boutique',
            templateUrl: 'app/views/boutique.html',
            controller: 'AppCtrl'
        })
        ;
}


