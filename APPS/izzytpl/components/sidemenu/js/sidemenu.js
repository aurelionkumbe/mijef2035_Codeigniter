$(function(){

	$('.menu-icon').on("click",function(e){
		e.preventDefault();
		$this = $(this);
		if ($this.hasClass('is-opened')) {
			$this.addClass('is-closed').removeClass('is-opened');
			$(".sidenav").css('width','0px');
			$this.css('margin-left','0px');
			$this.css('transition','0.5s');
		}else{
			$this.removeClass('is-closed').addClass('is-opened');
			$(".sidenav").css('width','200px');
			$this.css('margin-left','168px');
			$this.css('transition','0.5s');

		}
	})
})