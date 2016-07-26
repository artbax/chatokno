var ChatBotInterval = 30000;

function chatBot()
{
	$.ajax({
			
			url: "http://www.czatokno.warszawa.pl/php/chatbot.php",
		    cache: false
		    
			});
		
	setTimeout("chatBot();", ChatBotInterval);
}

$(document).ready(function(){
	
	chatBot();
	
});