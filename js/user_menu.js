var id = 1;
function addDescription()
{ 
     
	var who = user;
	var what = $('#desc_area').val();
	
	$.ajax({
		type: "POST",
		url: "http://www.czatokno.warszawa.pl/php/logged_user.php", // napisac metode w klasie user
		cache: false,
		data: {
			'ktora': 'addDescription',
			'add_description': who,
			'description_content': what
			
			
		}
		
		
	});
}

function openEmailForm(id)
{
	
	var email = $('.email'+id).attr('value');
	
	$('#tab_email').hide();
	
	
	
	$('#email_form').append("<div><input type='text' class='form-control email_title' placeholder='tytuł' maxlength='40' /><textarea class='form-control email_content' maxlength='1000' placeholder='treść' rows='8' cols='30'></textarea><input type='hidden' class='address' value='"+email+"' /><button type='submit' id='send_email' class='btn btn-info' onclick='sendEmail()'>email</button><button type='submit' class='btn btn-info' onclick='closeEmailForm()'>close</button></div>");
	
	
}

function closeEmailForm()
{
	    
		$('#email_form').empty();
		$('#tab_email').show();
		
	
}

function sendEmail()
{
	var title = $('.email_title').val();
	var text = $('.email_content').val();
	var to = $('.address').attr('value');
	
	$.ajax({
		type: "POST",
		url: "http://www.czatokno.warszawa.pl/php/send_email.php",
		data: {
			   'title': title,  // tytul 
			   'text': text,  // tresc maila
               'to': to,  // adres email
               'from': user // nick uzytkownika			   
		},
		dataType: 'text',
		success: function(data, status)
		{
			alert(data);
		}
		
		
		
	});
	
	$('#email_form').empty();
	$('#tab_email').show();
	
}



$(document).ready(function(){
	
	$('.hidden_link_1').hide();
	$('.hidden_link_2').hide(); 
	$('.hidden_link_3').hide(); 
	
	
	$('.show_link_1').click(function(){
	      $('.hidden_link_1').toggle('slow');
		  $('.hidden_link_2').hide(); 
	      $('.hidden_link_3').hide(); 
	      
		  }); 
	
	$('.show_link_2').click(function(){
	       $('.hidden_link_2').toggle('slow');
		   $('.hidden_link_1').hide(); 
	       $('.hidden_link_3').hide(); 
	       
		   });
		   
	$('.show_link_3').click(function(){
	       $('.hidden_link_3').toggle('slow');
	       //$('.table').show();
		   $('.hidden_link_1').hide(); 
	       $('.hidden_link_2').hide(); 
	      
		   });
		   
	
		   
		   
	$('#description_submit').click(function(){
		
		addDescription();
		$('#desc_area').val('');
		$('.hidden_link_2').hide();
		
	});

    

    	
	
	
});