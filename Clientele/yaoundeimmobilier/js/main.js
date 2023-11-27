jQuery(function($) {


	// blocage du telechagement des images
	document.addEventListener("contextmenu", function(e){
	    if (e.target.nodeName === "IMG") {
	        e.preventDefault();
	        console.log('interdit de sauvegarder les images');
	    }
	}, false);


	visited = sessionStorage.getItem('visited')

	if(visited == null  || visited == undefined || visited == ""){

        $.get('welcome/compteur').then(function (compteur) {
            $("#myCounter").text(compteur);
            sessionStorage.setItem('visited', compteur)
        })
	}else {
        $("#myCounter").text(visited);
	}

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
	});

	//$('[data-toggle="tooltip"]').tooltip()

    $( '.veux' ).click(function (event) {  
		document.location.href = $(this).attr('link')		
	});


    $( '.toremove' ).hover(function (event) {  
		$(this).toggleClass('w3-card-4', 'w3-card-8')		
	}, function (event) {  
		$(this).toggleClass('w3-card-8', 'w3-card-4')
	});
    $( '.toremove' ).remove();

	$( '.centered' ).each(function( e ) {
		$(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
	});

	$(window).resize(function(){
		$( '.centered' ).each(function( e ) {
			$(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
		});
	});

	//portfolio
	$(window).load(function(){
		$portfolio_selectors = $('.portfolio-filter >li>a');
		if($portfolio_selectors!='undefined'){
			$portfolio = $('.portfolio-items');
			$portfolio.isotope({
				itemSelector : 'li',
				layoutMode : 'fitRows'
			});
			$portfolio_selectors.on('click', function(){
				$portfolio_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$portfolio.isotope({ filter: selector });
				return false;
			});
		}
	});

	//contact form
	/*
	var form = $('.contact-form');
	form.submit(function () {
		$this = $(this);
		$.post($(this).attr('action'), function(data) {
			$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
		},'json');
		return false;
	});
*/
	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});



        counter = {
            $element : null,
            count : 0,
            maxCount : 255,
            interval : null,
            //Initialize
            init : function(compteur){
                this.$element = compteur;
                this.run();
                this.interval = window.setInterval("counter.run();", 50);
            },
            // Run
            run : function(){
                if (this.count === this.maxCount){
                    window.clearInterval(this.interval);
                }

                this.$element.html(this.count);
                this.count++;
            }
        };

        $.fn.counter = function(){
            counter.init(this);
        }

        
       // $("#myCounter").counter();

});

