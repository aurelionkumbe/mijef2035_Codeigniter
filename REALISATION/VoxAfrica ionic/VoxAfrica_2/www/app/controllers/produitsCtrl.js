voxafrica.controller('produit', function ($scope,$state, $http, $stateParams, $timeout){
     /*
      * Fonction de gestion des pages
      * 
      */
      $scope.reload= function (){
        $state.reload(); 
        $location.path('/')
    };
    
    $scope.tvSrc = "http://playtv.fr/player/embed/vox-africa/";

    $http.get('app/data/menu.json')
    .then(function(response) {
        console.log(response.data);
        $scope.menu = response.data;
    });


    $scope.watchTV = function(src){
        console.log(src);
        $scope.tvSrc = src;
    }

    $('#all').hide();
    $('#all').click(function (){
        $('#navbar').removeClass('in');
        $('#all').hide();
    });

    $('.navbar-toggle').click(function (){
        $('#all').show(); 

    });


});
