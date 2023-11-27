app.factory('Produit' ,function ($http, $q){
    
    var factory = {
        produits:false,
        produit:false,
        prod:false,
        getProduit : function (){
            var deferred=$q.defer();
            $http.post('Server/Controller/produitsCtrl.php',{}).
		success(function(data, status){
                        factory.produits = data ;
                        deferred.resolve(factory.produits);
		}).
		error(function(data, status) {
                    deferred.reject('impossible de charger les produits');
		}); 
                return deferred.promise;
        },
        getProduits : function (id){
            var deferred=$q.defer();
            $http.post('Server/Controller/produitsCtrl.php',{cat:id}).
		success(function(data, status){
                               factory.produit=data;
                       
                        deferred.resolve(factory.produit);
		}).
		error(function(data, status) {
                    deferred.reject('impossible de charger les produits');
		}); 
                return deferred.promise;
        },
        getProd : function (id){
            var deferred=$q.defer();
            $http.post('Server/Controller/produitsCtrl.php',{id:id}).
		success(function(data, status){
                        factory.prod=data;
                        deferred.resolve(factory.prod);
		}).
		error(function(data, status) {
                    deferred.reject('impossible de charger les produits');
		}); 
                return deferred.promise;
        }
    };
    return factory;
  });