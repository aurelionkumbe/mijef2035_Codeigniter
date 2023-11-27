  app.controller('DirigeantCtrl', function ($scope, $http, $location,$anchorScroll, $stateParams, $filter){

        //----------------------------------------------------------------------------

        $http.get(SITE_URL + '/api/dirigeants').
        then(function(response) {
            //console.log(response.data);
            $scope.dirigeantsStore = response.data;

             //-----------------------------------------------------------------------------
            //console.log('staff');
            //console.log($stateParams.staff);

            var staff = $stateParams.staff
            if (staff) {
              var match ={
                poste:{
                  departement:{
                    nom_dep:staff
                  }
                }
              }
              $scope.dirigeants = $filter('filter')($scope.dirigeantsStore, match, false)
  
            }else{
              $scope.dirigeants = $scope.dirigeantsStore;
            }
        });




        //------------------------------------------------------------------------------
        $scope.bossDetail = {};
        $scope.getBossDetail = function (bossId) {
          
          //gotoBottom;
           // set the location.hash to the id of
          // the element you wish to scroll to.
          $location.hash('bottom');

          // call $anchorScroll()
          $anchorScroll();


            //console.log('id du boss selecionner');
            //console.log(bossId);
            if ($scope.bossDetail.id == bossId) {
              return; // on ne boucle pas
            }
            for (var i = 0; i < $scope.dirigeants.length; i++) {
              dir = $scope.dirigeants[i];
              if (dir.id == bossId) {
                $scope.bossDetail = dir;
                break;
              }
            }

        }



 });