document.title = "VIP DECOR, Service de decoration tres chick de vos evenements et de location du materiel de decoration";

function loadHeader() {
	$(document).ready(function () {
	  // chargeur asynchone des pages pour les includes dans les onglets
	  $('[neaa-include]').each(function () {
	    var page = $(this).attr('neaa-include');
	    $(this).load(page);
	  })
	});
}
loadHeader()

//--gestion du menu actif -----------------

function activeMenu() {
	$('[neaa-menu]').removeClass('active');
	var menuactif = $('[neaa-active-menu]').attr('neaa-active-menu');
	//console.log('menu', menuactif);
	if (menuactif === undefined || menuactif === '') {
		var $menuAccueil = $('[neaa-menu="acceuil"]');
		//console.log('menuAccueil', $menuAccueil);
		$menuAccueil.addClass('active');
	}else{
		$('[neaa-menu="'+menuactif+'"]').addClass('active');
	}
}
