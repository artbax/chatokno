<?php
require_once('php/register_top.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Czat internetowy, Aplikacja webowa służąca do komunikacji online">
<meta name="keywords" content="Chat, okno, OKNO, Czat, czat, czat aplikacja, chat application, programing, php, jquery, ajax">
<meta name="author" content="Artur Borkowski">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Chat-Okno</title>
<link href="css/bootstrap.min.css" rel="stylesheet"> 
<link href="css/login.css" rel="stylesheet">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.11.3.min.js" ></script> 
<script type="text/javascript" src="js/register.js"></script> 
<script type="text/javascript" src="js/nick_validate.js"></script> 
<script type="text/javascript" src="js/email_validate.js"></script>

</head>
<body>

<div class="big_container">
<div class="container"> <!-- naglowek, powitanie, logo czata -->
  <div class="row">
   <div class="col-xs-6 col-xs-offset-3">
   
	 <!-- kod php -->		 
   
   
   </div>
  </div>
  <div class="row">
  <div class="col-xs-6 col-xs-offset-3 well">
  <h3>Witaj na czacie OKNO</h3>
  </div>
  </div>
  <div class="row">
     <div class="col-xs-6 col-xs-offset-3 well">
	     <div class="col-xs-6">
	     <img src="img/okno.jpg" />
		 </div>
		 
		 <div class="col-xs-6">
		 <!-- ile zarejestrowanych ile online -->
	     <p><h4>Zarejestrowanych:</h4></p>
		 <p><h4>Online:</h4></p>
		 </div>
	 </div>
  <div class="row">
  </div>  
  </div>  
</div>


    <div class="container"> <!-- logowanie -->
	   <div class="row">
	   <div class="col-xs-6 col-xs-offset-3">
	   <h4>Logowanie:</h4>
	   </div>
	   </div>
	   <div class="row">
	       <div class="col-xs-6 col-xs-offset-3 well">
		   <form class="form-inline" role="form" action="php/logging.php" method="post">
           
           <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>   
           <input type="email" name="email" class="form-control" maxlength="30" id="exampleInputEmail2" placeholder="Podaj email">
		   
           </div>
           
	   <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>	   
           <input type="password" name="password" class="form-control" maxlength="20" id="exampleInputPassword2" placeholder="Podaj haslo">
		  
           </div>
		   
           <button type="submit" class="btn btn-primary" id="confirm_pass">Wyslij</button>
		  
		   </form>
		   <br />
		   
           <a href="#">Nie pamiętasz hasła?</a>
		   
		     
		  </div>
	   </div>
	   
	</div>
	
	<!-- rejestracja, wysuwany formularz rejestracyjny -->
	<div class="container">
	<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
	<h4>Rejestracja:</h4>
	</div>
	</div>
	<div class="row">
	<div class="col-xs-6 col-xs-offset-3 well">
	<a type="button" class="btn btn-primary" id="start_register">Zarejestruj się</a>
	</div>
	</div>
	</div>
</div> <!-- zamkniecie big_container -->

	
	<!-- forma rejestracji -->
	<div id="register">
	<div class="container">
	<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
	  <button class="btn btn-primary" id="stop_register">
	       <i class="fa fa-arrow-left"></i>
	  </button>    
	</div>
	</div>
	<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
	<h4>Rejestracja nowego użytkownika</h4>
	</div>
	</div>
	
	<div class="row">
	<div class="col-xs-6 col-xs-offset-3 well">
	<!-- wlasciwa forma
	Nick
	Imie
	Nazwisko
	plec
	email
	haslo
	powtorzyc haslo
	
	po rejestracji uzytkownik bedzie mogl uzupelnic swoje dane o krotko opis, dodac avatar 
	-->
	<form class="form" id="reg_form" role="form" action="php/validate.php" method="post">
	       <!-- nick --musi byc unikatowy-->
           <div class="form-group">
           <label class="sr-only" for="nick">Nick</label>
		   
           <input type="text" name="nick" class="form-control required" maxlength="10" id="nick" onblur="nick_validate();" placeholder="Nick"
		   value="<?php echo $_SESSION['values']['nick'] ?>">
		   <div id="nick_error"></div>
		   
		   
		   
           </div>
		   <!-- imie -->
		   <div class="form-group">
           <label class="sr-only" for="Imie">Imię</label>
		   
           <input type="text" name="imie" class="form-control required" maxlength="20" id="imie" placeholder="Imię"
		   value="<?php echo $_SESSION['values']['imie'] ?>">
		   
           </div>
		   
		   <!-- nazwisko -->
		   <div class="form-group">
           <label class="sr-only" for="Nazwisko">Nazwisko</label>
		   
           <input type="text" name="nazwisko" class="form-control required" maxlength="30" id="nazwisko" placeholder="Nazwisko"
		   value="<?php echo $_SESSION['values']['nazwisko'] ?>">
		   
           </div>
		   
		   <!-- plec-->
		   <div class="form-group">
		   <label class="sr-only" for="Plec">Pleć</label>
		   <select class="form-control select" name="plec" id="plec" placeholder="Plec">
		   <?php buildOptions($genderOptions, $_SESSION['values']['plec']); ?>
		   <!--<option>płeć</option>
           <option>Chlopak</option>
           <option>Dziewczyna</option>-->
           </select>
		   </div>
		   
		   <!-- email --musi byc unikatowy-->
           <div class="form-group">
           <label class="sr-only" for="Email">Email</label>
		   <input type="email" name="email" class="form-control required email" maxlength="40" id="email" onblur="email_validate();" placeholder="Email"
		   value="<?php echo $_SESSION['values']['email'] ?>">
		   <div id="email_error"></div>
		   </div>
		   
		   <!-- haslo -->
		   <div class="form-group">
           <label class="sr-only" for="Haslo1">Hasło</label>
		   <input type="password" name="password" class="form-control required pass1" maxlength="10" id="pass1" placeholder="Podaj hasło" value="<?php echo $_SESSION['values']['pass1'] ?>">
		   </div>
		   
		   
		   <!-- powtórzenie hasła -->
		   <div class="form-group">
           <label class="sr-only" for="Haslo2">Powtórz hasło</label>
		   <input type="password" name="password" class="form-control pass2" id="pass2" maxlength="10" placeholder="Powtórz hasło" value="<?php echo $_SESSION['values']['pass2'] ?>">
		   </div>
		   
		   <input type="hidden" name="validationType" value="php" />
           <button type="submit" class="btn btn-primary" id="confirm_register_form">Wyślij</button>
		   <a type="button" class="btn btn-primary" id="reset_register_form" href="php/reset_form.php">Reset</a>
		  
	</form>
	</div>
	</div>
	</div>
	</div>
	
	

</body>
</html>