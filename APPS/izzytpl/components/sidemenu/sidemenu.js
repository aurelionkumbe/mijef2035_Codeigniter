$(function(){

	console.log("alert");
	$(".menu-icon").on("click",function(e){
		e.preventDefault();
		$this = $(this);
		if ($this.hasClass('is-opened')) {
			$this.addClass('is-closed').removeClass('is-opened');
			$("#mySidenav").css("width","0px");
			$this.css("margin-left","0%");
			$this.css("transition","0.5s");
		}else{
			$this.removeClass('is-closed').addClass('is-opened');
			$("#mySidenav").css("width","250px");
			$this.css("margin-left","20%");
			$this.css("transition","0.5s");
		}
	});
});

