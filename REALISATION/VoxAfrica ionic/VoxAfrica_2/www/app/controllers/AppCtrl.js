 voxafrica.controller('AppCtrl', function ($scope,$state, $http, $stateParams, $timeout){


    $scope.reload= function (){
        $state.reload(); 
        $location.path('/');
    };

    //$('iframe').contents().find('iframe #dat-menu > div > div.dat-menu-wrapper.dat-menu-padding > a').hide();

    $http.get('../app/data/menu.json')
    .then(function(response) {
        console.log(response.data);
        $scope.menu = response.data;
    });

    $scope.showMenu =  function(id) {
        document.getElementById(id).classList.toggle("w3-show");
    }
    
    $scope.frameUrl = 'http://www.voxafrica.com/';
    $scope.changeFrameUrl = function (url) {

        $scope.frameUrl = url;
    };

    $scope.tvSrc = "http://playtv.fr/player/embed/vox-africa/";
    $scope.watchTV = function(src){
        console.log(src);
        $scope.tvSrc =  src;
    };

})

 ;
