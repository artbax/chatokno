function email_validate()
{
	var value = $('#email').val();
	
	$.ajax({
		type: 'POST',
		cache: false,
		url: "http://www.czatokno.warszawa.pl/php/email_validate.php",
		data: {
			'value': value
			
		},
		
		success: function(data){
			
			if(data == 1)
			{
				$('#email_error').text('ten email juz istnieje w bazie');
			}
			else
			{
				$('#email_error').text('');
			}
			   
		   },
		   
		error: function(data)
		{
			alert('brak polaczenia z baza');
		}
		
		
		
	});
	
	
}