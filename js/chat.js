var $ = jQuery.noConflict();
var updateChatInterval = 500;
var debugMode = true;
var key = 0;

function stripslashes(str) {
str=str.replace(/\\'/g,'\'');
str=str.replace(/\\/g,'"');
str=str.replace(/\\0/g,'\0');
str=str.replace(/\\\\/g,'\\');
return str;
}

function displayError(message) 
{
      // Wyświetla bardziej szczegółowy komunikat, jeżeli włączono tryb debugMode.
      alert("Podczas próby nawiązania połączenia z serwerem wystąpił błąd! " +
                         (debugMode ? message : ""));
}

// Funkcja wyświetlająca komunikat o błedzie skryptu PHP.
function displayPHPError(error)
{
   displayError ("Błąd numer :" + error.errno + "\r\n" +
                     "Treść :"+ error.text + "\r\n" +
                     "Położenie :" + error.location + "\r\n" +
                     "Wiersz :" + error.line + + "\r\n");
}

function loadChat()  // podobna funkcja dla userow loadUsersOnline()
{
	var mode = 'loadChat';
	
	$.ajax({
			type: 'POST',
			url: "http://www.czatokno.warszawa.pl/php/chat.php",
		    cache: false,
		    data: $.param({  
		   			'mode': mode,
					'target': target 
                  }),
		    dataType: 'json',
			error: function(xhr, textStatus, errorThrown) {
				//displayError(textStatus);
            },
			success:  function(data, textStatus)
			{
				if(data.errno != null)
                     displayPHPError(data);
                  else
                     
                     readMessages(data);
			}
			
			
			
		});
		
	setTimeout("loadChat();", updateChatInterval);
}




function readMessages(data, textStatus)
{
        
	$('#chat_room')[0].innerHTML = "";
	
	
	
	$.each(data.messages, function(i, message) {
        // Tworzy kod HTML odpowiedzialny za wyświetlenie wiadomości.
        
        var htmlMessage = "";
		htmlMessage += "<div class=\"list-group-item\" style=\"color:" + message.color + "; font-style:" + message.italic + "; font-weight:" + message.bold + "; text-decoration:" + message.underline+ " \" >";
		htmlMessage += "<small>[" + message.time + "]</small> <b>" + message.name + ":</b> ";
		
		 htmlMessage += stripslashes(message.post);
                 htmlMessage += "</div>";
		
		var isScrolledDown = ($('#chat_room')[0].scrollHeight - $('#chat_room')[0].scrollTop <=
                    $('#chat_room')[0].offsetHeight);
		
		$('#chat_room')[0].innerHTML += htmlMessage;
		
		$('#chat_room')[0].scrollTop = isScrolledDown ? $('#chat_room')[0].scrollHeight : $('#chat_room')[0].scrollTop;
		
		
	});
	
}

function clickPriv(key)
{
	var id = '#priv_id' + key;
	target = $(id).attr('value');
	$('.what_room').text(target);
	
}



$(document).ready(function(){
	
$('#content').css('color', 'black');
$(':input').val('');

$('#submit_button').click(function(event)
{
	
	var mode = 'sendMessage';
	var bold = $('.text_bold').attr('value');
	var italic = $('.text_italic').attr('value');
	var underline = $('.text_underline').attr('value');
	var color = $('#text_color').css('background-color');
	var post = $('#content').val();
	
	
	if(post == '')
	{
	  event.preventDefault();
      	  
	}
	else
	{          debugger;
		   $.ajax({
		   type: "POST",
		   url: "http://www.czatokno.warszawa.pl/php/chat.php",
		   cache: false,
		   data: {  
		   			'mode': mode,
                    'post': post,
				    'bold': bold,
				    'italic': italic,
				    'underline': underline,
				    'color': color,
				    'user': user,
				    'target': target
				 },
		   dataType: 'text',
		   
		   success: function(){
			   $(':input').val('');
		   },
		   
		   error: function(data)
		   {
			   $('#content').text('cos nie tak');
		   },
		   
		});

		
	}
	
});

$('#main_room').click(function(event){
	target = 'main_room';
	$('#main_room').removeClass('btn-info').addClass('btn-primary');
	$('#room_rok_1').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_2').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_3').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_4').removeClass('btn-primary').addClass('btn-info');
	$('.what_room').text('MAIN ROOM');
});

$('#room_rok_1').click(function(event){
	target = 'room_one';
	$('#room_rok_1').removeClass('btn-info').addClass('btn-primary');
	$('#main_room').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_2').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_3').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_4').removeClass('btn-primary').addClass('btn-info');
	$('.what_room').text('PIERWSZY ROK');
	
}); 

$('#room_rok_2').click(function(event){
	target = 'room_two';
	$('#room_rok_2').removeClass('btn-info').addClass('btn-primary');
	$('#main_room').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_1').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_3').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_4').removeClass('btn-primary').addClass('btn-info');
	$('.what_room').text('DRUGI ROK');
	
});

$('#room_rok_3').click(function(event){
	target = 'room_three';
	$('#room_rok_3').removeClass('btn-info').addClass('btn-primary');
	$('#main_room').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_2').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_1').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_4').removeClass('btn-primary').addClass('btn-info');
	$('.what_room').text('TRZECI ROK');
});

$('#room_rok_4').click(function(event){
	target = 'room_four';
	$('#room_rok_4').removeClass('btn-info').addClass('btn-primary');
	$('#main_room').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_2').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_3').removeClass('btn-primary').addClass('btn-info');
	$('#room_rok_1').removeClass('btn-primary').addClass('btn-info');
	$('.what_room').text('CZWARTY ROK');
});









$('#content').attr('autocomplete', 'off');

    
loadChat();
	
	
});	



