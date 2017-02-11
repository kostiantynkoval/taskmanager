(function($, undefined){
  		$(function(){

  			//делаем вход в админрегистрацию исчезающим
	  			$('#adminbutton').on('click', function () {
	  				if ($('.adminform').is(':hidden')){
	  					$('.adminform').slideDown( "slow" );
	  				}
	  				else{
	  				$('.adminform').slideUp( "slow" );
	  				}
	  			});

	  			//этот код высчитывает количество задач выводимых в одном ряду и переносит их в новый ряд

  			$(function () {
  				//Находим ширину окна браузера
	  			var myWidth = $(window).width();
	  			//Находим какое количество задач будет выведено в каждом ряду
	  			var tasksInRow;
	  			if (myWidth<768) {tasksInRow = 1} 
	  			else if (myWidth>=768&&myWidth<992) {tasksInRow = 2}
	  			else if (myWidth>=992&&myWidth<1200) {tasksInRow = 3}
	  			else {tasksInRow = 4};
	  			console.log("тасков в ряду", tasksInRow);
	  			var n = $('.task').length;
	  			console.log("всего тасков",n);
	  			var multi = Math.floor(n/tasksInRow);
	  			for (var i = 1; i <= multi; i++) 
	  			{
	  				console.log("вставил после ",(i*tasksInRow-1));
	  				$( "<div class='row'></div>" ).insertAfter( ".task:eq("+(i*tasksInRow-1)+")" );
	  			}

  			});
  	  });
		})(jQuery);