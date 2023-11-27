   app.controller('AppCtrl', function ($scope, $http, $timeout, $location, $anchorScroll){
    /*
    $('.text').hide();
     $('.info button').click(function (e){
            $('.text').hide();
            $(this).parent('.info').children('.text').show()
        });
*/
       console.log(SITE_URL);
       //console.log($scope.host);
        $http.get(SITE_URL + '/api/menus/').
        then(function(response) {
            //console.log(response);
            $scope.menus = response.data;
        });

  
        $scope.gotoBottom = function() {
          // set the location.hash to the id of
          // the element you wish to scroll to.
          $location.hash('bottom');

          // call $anchorScroll()
          $anchorScroll();
        };
        $scope.gotoTop = function() {
          // set the location.hash to the id of
          // the element you wish to scroll to.
          $location.hash('top');

          // call $anchorScroll()
          $anchorScroll();
        };
 });
