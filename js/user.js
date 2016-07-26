var updateUsersInterval = 20000;

function loadUsersOnline()
{
	var action = 'loadUsersOnline';
	
	$.ajax({
			type: 'POST',
			url: "http://www.czatokno.warszawa.pl/php/user.php",
		    cache: false,
		    data: $.param({  
		   			'action': action
					 
                  }),
		    dataType: 'json',
			error: function(xhr, textStatus, errorThrown) {
				displayError(textStatus);
            },
			success:  function(data, textStatus)
			{
				if(data.errno != null)
                     displayPHPError(data);
                  else
                     getUsersOnline(data);
			}
			
			
			
		});
		
	setTimeout("loadUsersOnline();", updateUsersInterval);
	
}

function getUsersOnline(data, textStatus)
{
	$('#users_online')[0].innerHTML = "";
	
	$.each(data.usersonline, function(i, users) {
        // Tworzy kod HTML odpowiedzialny za wyswietlenie wiadomosci.
        
			
        var htmlUsersOnline = "";
		htmlUsersOnline += "<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-default\"><img src=\""+users.avatar_small+"\" width=\"40\" height=\"40\"/> " + users.nick + "</button>";
		htmlUsersOnline += "<button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">";
        htmlUsersOnline += "<span class=\"caret\"></span></button>";
		htmlUsersOnline += "<ul class=\"dropdown-menu\" role=\"menu\">";
		htmlUsersOnline += "<li><a href=\"php/priv.php?nick="+users.nick+"&option=priv\"><i class=\"fa fa-hand-o-right fa-fw\"></i>&nbsp;prywatny czat</a></li>";
        htmlUsersOnline += "<li><a href=\"#\"><b>Data:</b> "+users.date+"</a></li>";
        htmlUsersOnline += "<li><a href=\"#\"><b>Imię:</b> "+users.imie+"</a></li>";
        htmlUsersOnline += "<li><a href=\"#\"><b>Nazwisko:</b> "+users.nazwisko+"</a></li>"; 
		htmlUsersOnline += "<li><a href=\"#\"><b>Płeć:</b> "+users.sex+"</a></li>";
		htmlUsersOnline += "<li><a href=\"#\"><b>Opis:</b> "+users.description+"</a></li></ul>";
		htmlUsersOnline += "</div>";
		
		$('#users_online')[0].innerHTML += htmlUsersOnline;
		
		
        
	});
	
}

// funkcja tymczasowa, moze sie nie przydac....
function privChat()
{
  var nickname = $('#priv').attr('value');
  var priv = "<a type=\"button\" class=\"jakas jakas jakas\">Priv</a>" ;
  $('.private_area').append(priv);	
}

$(document).ready(function(){
	

loadUsersOnline();
	

});