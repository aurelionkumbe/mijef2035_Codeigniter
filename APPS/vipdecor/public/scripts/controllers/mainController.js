'use strict';

/**
 * @ngdoc function
 * @name vipdecorangularApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the vipdecorangularApp
 */
angular.module('vipdecorangularApp')

.controller('AppCtrl', function($scope, $rootScope, $location) {

    $rootScope.$on('$routeChangeSuccess', function(event, next, current) {
      if (sessionStorage.getItem('adminconnected')) {
        if (_.includes(['/login', '/register'], $location.path())) {
          $location.path('/');
        }
      }
    });

    if (sessionStorage.getItem('adminconnected')) {
      $scope.isAdminLoggedIn = true;

    } else {
      $scope.isAdminLoggedIn = false;
    }

    $rootScope.$on('adminconnected', function(e, data) {

      $scope.isAdminLoggedIn = true;

      history.go(-1)
    });

    $scope.logout = function() {
      $scope.isAdminLoggedIn = false;
      sessionStorage.removeItem('adminconnected')
      document.refresh();
      $('#btn-logout').hide();
      $('#btn-master').show();
    }
  })
  .controller('LoginCtrl', function($scope, $rootScope, $anchorScroll) {
    $scope.auth = {};
    $anchorScroll('login-page');
    $scope.connect = function() {
      if ($scope.auth.login === "admin" && $scope.auth.passwd === "admin") {
        sessionStorage.setItem('adminconnected', true)
        $rootScope.$emit('adminconnected');
      }
    }
  })
  .controller('MailCtrl', function($scope, $log) {
    $('#page-footer').hide();
    $scope.mail = {};
    $scope.sendMail = function() {
      //$log.info($scope.mail);
    }
  })

.controller('MainCtrl', function() {
  $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider) {
      $('body').removeClass('loading');
    }
  });

})

.controller('DecoCtrl', function($http, $scope) {
  $scope.decorations = {};
  $scope.newDeco = DecorationStruct;
  $scope.newThumb = {};


  $http.get('/api/decorations').then(function(data) {
    $scope.newDeco = {};
    $scope.decoration = (_.first(data.data));
    //done
    $scope.adddeco = function() {

      // TODO implemte le cas ou il sagit d une modification de la decoration
      if ($scope.newDeco.src == undefined || $scope.newDeco.url == "") {
        alert('l\'url de la decoration ne doit pas etre vide')
      } else if ($scope.newDeco.desc == undefined || $scope.newDeco.desc == "") {
        alert('la description de la decoration ne doit pas etre vide')
      } else {
        $http.post('/api/decorations', {
          deco: $scope.newDeco
        }).then(function(res) {
          //alert('res : ' + JSON.stringify(res.data));
          if ($scope.newDeco._id == undefined || $scope.newDeco._id == "") {
            $scope.decorations.photos.push($scope.newDeco);
          } else {
            $scope.decorations.photos = _.reject($scope.decorations.photos, {
              _id: $scope.newDeco._id
            });
            $scope.decorations.photos.push($scope.newDeco);
          }
          $scope.newDeco = {}
        }, function() {
          $scope.newDeco = {}
          $scope.decorations.photos = _.reject($scope.decorations.photos, $scope.newDeco);
        })
      }
    };
    let decorations = {
      photos: data.data,

      changeThumbnails: function(decoration) {
        $scope.decoration = decoration;
      },
      addThumbnail: function() {
        var index = _.indexOf($scope.decorations.photos, $scope.decoration);
        $scope.decorations.photos[index].thumbnails.push($scope.newThumb.src);
        //console.log('index', index);
        $scope.newThumb = {};
      },

      //done
      remove: function(decoration) {
        if (confirm('Voulez vraiment supprimer cette decoration et les photos qu\'elle contient ?')) {
          $http.get('/api/decorations/' + decoration._id + '/delete').then(function(res) {
            $scope.decorations.photos = _.without($scope.decorations.photos, decoration);
          })
        }
      },
      removeThumb: function(thumb) {
        if (confirm('Voulez vraiment supprimer cette image ?')) {
          var index = _.indexOf($scope.decorations.photos, $scope.decoration);
          //var indexThumb = _.indexOf($scope.decorations.photos[index].thumbnails, thumb);
          $scope.decorations.photos[index].thumbnails = _.without($scope.decorations.photos[index].thumbnails, thumb);
        }
      },
      update: function(deco) {
        $scope.newDeco = deco;
      },
      updateThumb: function(thumb) {
        var index = _.indexOf($scope.decorations.photos, $scope.decoration);
        var indexThumb = _.indexOf($scope.decorations.photos[index].thumbnails, thumb);
        var newThumb = prompt('Donnez le lien de la nouvelle image');
        if (newThumb != undefined) {
          $scope.decorations.photos[index].thumbnails[indexThumb] = newThumb;
        }
      }
    }
    $scope.decorations = decorations;
  });

  $scope.nouveauPhotos = function functionName() {

  }


})

.controller('MaterielCtrl', function($http, $scope) {

  $http.get('/api/matos').then(function(data) {
    let matos = data.data;
    console.log('matos', matos);
    $scope.matos = matos;
  });
  $http.get('/api/decorations').then(function(data) {
    let decos = data.data;
    $scope.decos = _.slice(decos, 0, 2);
    //let deco = _.first(decos);
    //$scope.slides = _.concat(deco.thumbnails, deco.src);
    //console.log('last deco slides', slides , 'phoro', deco.src);
  });
})

.controller('RegisterCtrl', function($http, $scope) {

})

.controller('PhotoCtrl', function($http, $log, $scope) {
  $scope.newPhoto = {};
  $scope.photosDeGroup = {}
  $scope.groupeChoisi;
  $scope.groupes = {}

  function getGroupes(photos) {
    $scope.groupes = _.uniq(_.map(photos, 'groupe'))
    $scope.groupesmenuactif = _.first($scope.groupes)
  }

  $http.get('/api/photos').then(function(data) {
    $scope.photos = data.data;
    getGroupes($scope.photos)
    $scope.photosDeGroup = _.filter($scope.photos, {
        groupe: _.first($scope.groupes)
      })
      //      alert(JSON.stringify($scope.photosDeGroup ));
  })

  $scope.groupe_remove = function(nomgroupe) {

    if (confirm('Voulez vous supprimer toutes les photos de ce groupe ?')) {
      $http.get('/api/groupes/' + nomgroupe + '/delete').then(function(data) {
        $scope.photos = _.reject($scope.photos, {groupe: nomgroupe});
        $scope.photosDeGroup = _.reject($scope.photosDeGroup, {groupe: nomgroupe});
        $scope.groupesmenuactif  = nomgroupe;
        getGroupes($scope.photos)

          //      alert(JSON.stringify($scope.photosDeGroup ));
      })
    }
  }

    $scope.photo_remove = function(id) {
        let confirmed = confirm('Voulez vous supprimer cette photo ?')
      if (confirmed) {
        $http.get('/api/photos/' + id + '/delete').then(function(data) {
            let tof= _.find($scope.photos, {_id : id});
          $scope.photos = _.reject($scope.photos,tof);
          $scope.photosDeGroup = _.reject($scope.photosDeGroup, {_id : id});
          getGroupes($scope.photos)
          $scope.groupesmenuactif = tof.groupe
            //      alert(JSON.stringify($scope.photosDeGroup ));
        })
      }
    }

  $scope.changeGroup = function(groupeChoisi) {
    $scope.newPhoto.groupe = groupeChoisi
    $scope.groupesmenuactif = groupeChoisi
    $scope.getPhotoByGroup(groupeChoisi);
  }
  $scope.getPhotoByGroup = function(nomgrp) {
    $scope.groupesmenuactif = nomgrp
    $scope.photosDeGroup = _.filter($scope.photos, {
      groupe: nomgrp
    })
  }

  $scope.addphoto = function() {
    //alert(JSON.stringify($scope.newPhoto.groupe))
    if ($scope.newPhoto.groupe == undefined || $scope.newPhoto.groupe == "") {
      alert("Veuillez choisir ou creer le groupe de la photo")
    } else if ($scope.newPhoto.src == undefined || $scope.newPhoto.src == "") {
      alert("Veuillez indiquer l'URL de la photo")
    } else {
      $http.post('/api/photos', {
        photo: $scope.newPhoto
      }).then(function(data) {
        $scope.photos = data.data;
        getGroupes($scope.photos)
          //alert(JSON.stringify(_.find($scope.groupes, $scope.newPhoto.groupe)))
        $scope.photosDeGroup = _.filter($scope.photos, {
          groupe: _.find($scope.groupes, $scope.newPhoto.groupe)
        })
        $scope.newPhoto = {}
      })
    }
  }
});
