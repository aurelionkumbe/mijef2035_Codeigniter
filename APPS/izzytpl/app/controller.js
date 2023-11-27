angular.module('izzy', []).controller('MainCtrl', ['$scope', '$http', function($scope,$http) {
  $scope.isOpen = false;

  $scope.newpage ="";
  $scope.pages =[];

  $scope.listPage = function(){
    $http.get('http://localhost:8080/izzytpl/backend/Page/read.php',{}).then(function success(e){
      $scope.pages =e.data.pages;
      $scope.selected = $scope.pages[0].nom;
      console.log($scope.pages[0].nom);
      console.log($scope.selected);
    },function error(e) {
      console.log("error");
    });
  }

  $scope.listPage();

  $scope.addpage =function(){
    $http.post('http://localhost:8080/izzytpl/backend/Page/post.php',{page:$scope.newpage}).then(function success(response) {
      $scope.pages.push({nom:response.data.page.nom});
    },function error(response) {
      console.log("error");
    });
    $scope.newpage = "";
  }

  $scope.bgmodal = function(){
     if ($scope.isOpen == false) {
      $scope.isOpen = true;
    }else{
      $scope.isOpen = false;
    }

    console.log($scope.isOpen);
  }

  $scope.isopen = false;
  $scope.modal = function(){
    if ($scope.isopen == false) {
      $scope.isopen = true;
    }else{
      $scope.isopen = false;
    }

  }
}]);
