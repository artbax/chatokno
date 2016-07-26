function nick_validate()
{
	var value = $('#nick').val();
	
	$.ajax({
		type: 'POST',
		cache: false,
		url: "http://www.czatokno.warszawa.pl/php/nick_validate.php",
		data: {
			'value': value
			
		},
		
		success: function(data){
			
			if(data == 1)
			{
				$('#nick_error').text('ten nick jest juz zajety');
			}
			else
			{
				$('#nick_error').text('');
			}
			   
		   },
		   
		error: function(data)
		{
			alert('brak polaczenia z baza');
		}
		
		
		
	});
	
	
}