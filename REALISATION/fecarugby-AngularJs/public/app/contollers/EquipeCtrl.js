app.controller('EquipeCtrl', function ($scope, $http,$stateParams){

        $http.get(SITE_URL + '/api/equipes').
        then(function(response) {
            //console.log(response.data);
            $scope.equipes = response.data;
        });
});


app.controller('DivisionCtrl', function ($scope, $http, $stateParams){

          var divisionId = $stateParams.id
          if (divisionId) {
              $http.get(SITE_URL + '/api/division/'+divisionId).
              then(function(response) {
              //console.log(response.data);
              $scope.equipes = response.data;
              });
          };
});