$(document).ready(function(){
	
	$('#logout_button').click(function()
	{
		debugger;
		var logout = $('#logout').attr('value');
		var control = 'loggingOut';
		
		$.ajax({
			type: 'POST',
			url: "http://www.czatokno.warszawa.pl/php/logout.php",
		    cache: false,
		    data: {  
		   			'control': control,
					'logout': logout
					 
                  },
		    dataType: 'json',
			error: function(xhr, textStatus, errorThrown) {
				document.window.href = 'http://www.czatokno.warszawa.pl';
            },
			success:  function(data, textStatus)
			{
				
				document.window.href = 'http://www.czatokno.warszawa.pl';
                  
			}
			
			
			
		});
		
	});
	
});	