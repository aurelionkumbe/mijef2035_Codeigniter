app.controller('CompetitionCtrl', function ($scope, $timeout, $http, $stateParams) {


    //console.log('stateParams');
    //console.log($stateParams.type);

    var SITE_URL = "http://"+window.location.host;
            

            //recuperation des Competitions
            typeCompetition = $stateParams.type
            $http.get(SITE_URL+'/api/competitions/'+typeCompetition).
            then(function (response) {
                $scope.competitions = response.data;
            }, function (response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });

        // recuperation des matchs et autres infos d un competition
        $scope.getCompetitionWithMatchs = function (selectedCompetition){
        //selectedCompetition = $scope.selectedCompetition;
        //console.log('com');
        //console.log(selectedCompetition);

            // matchs hebdo
            $scope.nbreMatch = 0
            $http.get(SITE_URL+'/api/competitions/'+selectedCompetition+'/hebdo').
            then(function (response) {
                $scope.matchsHebdo = response.data;
                //console.log(response.data);
            });

            // classement 
            $scope.nbreEquipe = 0;
            $http.get(SITE_URL+'/api/competitions/'+selectedCompetition+'/classement/').
            then(function (response) {
                $scope.classement = response.data;
                //console.log(response.data);
            });
            // calandrier 
            $http.get(SITE_URL+'/api/competitions/'+selectedCompetition+'/calandrier/').
            then(function (response) {
                $scope.calandrier = response.data;
                //console.log(response.data);
            });
        

        }

});