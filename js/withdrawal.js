$(function(){
    $(".dropdown-menu a").click(function(){
        $(".currency").text($(this).text());
        $(".currency").val($(this).text());
    });
	
	
		var timerId, percent,time;

		  // reset progress bar
		  percent = 100;
		  time = 30;
		  $('#load').css('width', '0px');
		  $('#load').css('width', percent + '%');
		  $('#load').html(time + 's');
	
	
	$("#waitSpv").on("show.bs.modal", function(){
		
			clearInterval(timerId);


		  timerId = setInterval(function() {

			// increment progress bar
			percent -=3.3333333333333;
			time -= 1;
			$('#load').css('width', percent + '%');
			$('#load').html(time + 's');


			// complete
			if (percent <= 0) {
			  clearInterval(timerId);
			  $('#load').removeClass('progress-bar-striped active');
			  $('#load').css('margin-left','auto');
			  $('#load').css('margin-right','auto');
			  $('#load').html('Timeout');
			  $('#load').css('color','red');
			  
				setTimeout(function() {
					$("#waitSpv").modal("hide");
					location.href = location.href;
					window.location.reload();
					location.reload();
				}, 2000);
			
				setTimeout(function() {
					location.href = location.href;
					window.location.reload();
					location.reload();
				}, 3000);
				
			  // do more ...

			}

		  }, 1000);
		/*
        var myModal = $(this);
		clearTimeout(myModal.data("hideInterval"));
		myModal.data("hideInterval", setTimeout(function(){
			myModal.modal("hide");
		}, 200));
		*/
    });
	
	
	
});