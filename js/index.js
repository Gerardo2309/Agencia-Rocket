$(document).ready(function(){

	var flag = false;
	var scroll;

	$(window).scroll(function(){
		scroll = $(window).scrollTop();

		if (scroll > 200) {
			if (!flag) {
				$("header").css({
					"background-color":" black "});
				$("#titulo").css({
					"color":"transparent"
				});
				$("#pre").css({
					"opacity":"0"
				});
				$("#text").css({
					"color":"white"
				});
				$("header nav ul li a").css({
					"color":"White"
				}); 
				flag = true;
			}
		}else{
			if (flag) {
				$("header").css({
					"background-color":"transparent"
				});
				flag = false;
				$("header nav ul li a").css({
					"color":"white"
				});
				$("#titulo").css({
					"color":"black"
				});
				$("#pre").css({
					"opacity":"1"
				});
				$("#text").css({
					"color":"black"
				});


			}
		}
	});

	$(window).scroll(function(){
		scroll = $(window).scrollTop();

		if (scroll > 50) {
			if (!flag) {
				$("#buscarres").css({
					"visibility":" visible "});
				flag = true;
			}
		}else {
			if (flag) {
				$("#buscarres").css({
					"visibility":" hidden "});
				flag = false;
			}
		}
	});
});