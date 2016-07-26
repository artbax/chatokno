<?php session_start();
if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email']) && isset($_SESSION['user_nick']) && !empty($_SESSION['user_nick']) && $_SESSION['access'] == true)
{
	
$target = 'main_room';
$user = $_SESSION['user_nick'];  

require_once('html/header.html.php');
    
?>

<div class="container">
   <div class="row header_row">
       <div class="col-xs-1">
	      <div id="avatar"></div>
		  <script>
         <!-- ladowanie avatara  -->
         //var renew = setInterval('AvatarLoad()', 5000);
		 function AvatarLoad()
		 {
		   $('#avatar').load('php/avatar.php');
		 }
         AvatarLoad();		 
       </script>
	   </div>
	   
	   <!-- zmiana pokoju -->
	  
	  <div class="col-xs-11">
	    
		 <div class="row">
	     <div class="col-xs-12">
         <div class="btn-group btn-group-justified">
         <a type="button" class="btn btn-info" id="main_room">Main chat</a>
         <a type="button" class="btn btn-info" id="room_rok_1">Rok 1.</a>
         <a type="button" class="btn btn-info" id="room_rok_2">Rok 2.</a>
         <a type="button" class="btn btn-info" id="room_rok_3">Rok 3.</a> 
		 <a type="button" class="btn btn-info" id="room_rok_4">Rok 4.</a>
      
         </div>
         </div>
		 </div>
		 
		 <div class="row">
		 <!-- czaty prywatne...buttony do max. 4 prywatnych czatów-->
		 <div class="col-xs-12">
		 <div class="private_area"></div>
		 <!-- tablica z ktorej beda ladowane aktualne priv czaty wyciagane foreach -->
		 <script>
		 var refresh = setInterval('MyPrivLoad()', 1000);
		 function MyPrivLoad()
		 {
		   $('.private_area').load('php/priv.php?nick=user&option=checkPrivateChat');
		 }
                 </script>		 
		 </div>
		 </div>
		 
		 
		 
		 
		 
	  
       
      </div>
   
      
   
   </div>
   
   <!-- tu zaczyna sie srodkowy, najwyzszy row -->
   <div class="row main_row">
   
   <!-- tu zaczyna sie lewa kolumna -->
   <div class="col-xs-2 column_left">
     
      <a href="#" class="list-group-item" id="user_email"><i class="fa fa-user fa-fw"></i>&nbsp;<?php echo $user; ?></a>
	  <a href="php/logout.php" class="list-group-item"><i class="fa fa-sign-out fa-fw"></i>&nbsp; Wyloguj</a>
	  <a href="#" class="list-group-item what_room" >MAIN ROOM </a>
	 
	  
	 
	  
    
	
		  <div class="show_link_1">
		  <a class="list-group-item" href="#"><i class="fa fa-file-image-o fa-fw"></i>&nbsp; Avatar</a>
		  </div>
		  <div class="hidden_link_1">
			   <div id="upload_avatar">
				    <form action="php/upload_avatar.php" method="post" enctype='multipart/form-data'>
				    <input type="file" name="pic" class="pic_form" />
					<button type="submit" class="btn btn-info btn-xs" name="confirm_avatar">dodaj avatar</button>
					</form>
			   </div>
		  </div>
		  
		  <div class="show_link_2">
		  <a class="list-group-item" href="#"><i class="fa fa-pencil fa-fw"></i>&nbsp; Dodaj opis</a>
		  </div>
		  <div class="hidden_link_2">
		      <div id="desc">
			   <textarea name="description_content" class="form-control" id="desc_area" maxlength="300" placeholder="opis"></textarea>
			   <button type="submit" class="btn btn-info btn-xs" id="description_submit" name="confirm_desc">dodaj opis</button>
			  </div>
		  </div>
		  
		  
		  <div class="show_link_3">
		  <a class="list-group-item" href="#"><i class="fa fa-users fa-fw"></i>&nbsp; Uczestnicy</a>
		  </div>
		     <div class="hidden_link_3">
			   <div id="email_form"></div>
			   <div id="tab_email">
			   <table class='table table-bordered table-condensed'>
			   <thead><tr class='info'><th>nick</th><th>email</th><th>status</th></thead>
			   <tbody id="users_list">
			   </tbody>
			   </table>
			   </div>
			   
			   <script>
			   var renew = setInterval('UsersListLoad()', 1000);
		       function UsersListLoad()
		        {
		             $('#users_list').load('php/users_list.php?case=allUsersList');
		        }
			   </script>
	           
			 </div>
		  
	</div>
	 
        
		<!-- tu zaczyna sie srodek -->
        <div class="col-xs-8">
		     
			     <div class="row">
				 
			     <div id="chat_room" class="col-xs-12">
			        <!-- czat room  -->
					
	
	
		
	

			     	
		         </div>
				 
				 
				 </div>
		
		      
		         <div class="row submit_area">
				                                <!-- emotki, kolor tekstu, pogrubienie, pochylenie -->
			                                    <div class="col-xs-3 list-group">
												
												  <div class="row">
												
												    <div class="col-xs-2">
													<div id="emo_item">
													          <a><i class="fa fa-smile-o fa-lg fa-fw center"></i></a>
													</div>
													</div>
						                            
												    <div class="col-xs-2">
													<div id="color_icon">
	                                                           <a><i class="fa fa-eyedropper fa-lg fa-fw center"></i></a>
													</div>
									                <div id="text_color" value="text_color" class="picker"></div>
	                                                </div>
													  
	                                                <div class="col-xs-2">
													<div  value="0" class="text_bold">
		                                                        <a><i class="fa fa-bold fa-lg fa-fw center"></i></a>
	                                                </div>
													</div>
													
													<div class="col-xs-2">
													<div value="0" class="text_italic">
		                                                       <a><i class="fa fa-italic fa-lg fa-fw center"></i></a>
	                                                </div>
												    </div>
													
													<div class="col-xs-2">
													<div value="0" class="text_underline">
		                                                         <a><i class="fa fa-underline fa-lg fa-fw center"></i></a>
	                                                </div>
												    </div>
													
													<div class="col-xs-2">
													<div id="link_item">
													             <a><i class="fa fa-chain fa-lg fa-fw center"></i></a>
													</div>		 
													</div>
													
												
				                                </div>
												</div>
											
				 
				                                 <!-- wpisywanie tekstu -->
				                                 <div class="col-xs-9">
												 <!--<div class="row">-->
							                         <!--<div id="main_input" name="chat_message">-->
													 
												     <input type="text" name="message" id="content" maxlength="300" />
													 
													 
												     <button type="submit" class="btn btn-info" id="submit_button"><i class="fa fa-send fa-lg fa-fw"></i>&nbsp;Wyslij</button>
													 
												     <!--</div>-->
												 <!--</div>-->	 
							                     </div>
				 </div>
			
		
		
		</div>
		
		
        <div class="col-xs-2 column_right">
		<div id="users_online">
		
		</div>
		</div>
		
		
   </div>

<!--link box -->
<div id="link_box">
<input type="text" name="link" id="get_link" />
<button type="submit" class="btn btn-primary" id="add_link">Dodaj</button>
</div>

<!-- picker box -->
<div id="picker_box">

	<div class="pick_color" style="background:#5b0f01" value="#5b0f01"></div>
	<div class="pick_color" style="background:#a71b00" value="#a71b00"></div>
	<div class="pick_color" style="background:#cd4126" value="#cd4126"></div>
	<div class="pick_color" style="background:#dd7e6c" value="#dd7e6c"></div>
	<div class="pick_color" style="background:#990100" value="#990100"></div>

	
	<div class="pick_color" style="background:#670001" value="#670001"></div>
	<div class="pick_color" style="background:#d50006" value="#d50006"></div>
	<div class="pick_color" style="background:#e16668" value="#e16668"></div>
	<div class="pick_color" style="background:#e99a95" value="#e99a95"></div>
	<div class="pick_color" style="background:#fe0000" value="#fe0000"></div>

	
	
	<div class="pick_color" style="background:#7a3f05" value="#7a3f05"></div>
	<div class="pick_color" style="background:#e6903b" value="#e6903b"></div>
	<div class="pick_color" style="background:#f6b26b" value="#f6b26b"></div>
	<div class="pick_color" style="background:#facb9d" value="#facb9d"></div>
	<div class="pick_color" style="background:#fe9903" value="#fe9903"></div>

	
	<div class="pick_color" style="background:#7c5f00" value="#7c5f00"></div>
	<div class="pick_color" style="background:#f1bf38" value="#f1bf38"></div>
	<div class="pick_color" style="background:#fdda66" value="#fdda66"></div>
	<div class="pick_color" style="background:#ffe69b" value="#ffe69b"></div>
	<div class="pick_color" style="background:#ffff01" value="#ffff01"></div>	

	
	<div class="pick_color" style="background:#284e13" value="#284e13"></div>
	<div class="pick_color" style="background:#6aa950" value="#6aa950"></div>
	<div class="pick_color" style="background:#95c47e" value="#95c47e"></div>
	<div class="pick_color" style="background:#b7d7a8" value="#b7d7a8"></div>
	<div class="pick_color" style="background:#00ff01" value="#00ff01"></div>

	
	<div class="pick_color" style="background:#0d333e" value="#0d333e"></div>
	<div class="pick_color" style="background:#46808b" value="#46808b"></div>
	<div class="pick_color" style="background:#74a5b3" value="#74a5b3"></div>
	<div class="pick_color" style="background:#a3c4c9" value="#a3c4c9"></div>
	<div class="pick_color" style="background:#00ffff" value="#00ffff"></div>	

	
	
	<div class="pick_color" style="background:#083763" value="#083763"></div>
	<div class="pick_color" style="background:#3e84c2" value="#3e84c2"></div>
	<div class="pick_color" style="background:#70a7dd" value="#70a7dd"></div>
	<div class="pick_color" style="background:#9fc5e9" value="#9fc5e9"></div>
	<div class="pick_color" style="background:#0200f9" value="#0200f9"></div>

	
	<div class="pick_color" style="background:#20124d" value="#20124d"></div>
	<div class="pick_color" style="background:#664ea4" value="#664ea4"></div>
	<div class="pick_color" style="background:#907cc1" value="#907cc1"></div>
	<div class="pick_color" style="background:#b4a6d7" value="#b4a6d7"></div>
	<div class="pick_color" style="background:#9900fb" value="#9900fb"></div>	

	
	<div class="pick_color" style="background:#4c1131" value="#4c1131"></div>
	<div class="pick_color" style="background:#a44d77" value="#a44d77"></div>
	<div class="pick_color" style="background:#c37ba1" value="#c37ba1"></div>
	<div class="pick_color" style="background:#d7a6bc" value="#d7a6bc"></div>
	<div class="pick_color" style="background:#fc01fc" value="#fc01fc"></div>	

	
	<div class="pick_color" style="background:#000000" value="#000000"></div>
	<div class="pick_color" style="background:#434343" value="#434343"></div>
	<div class="pick_color" style="background:#666666" value="#666666"></div>
	<div class="pick_color" style="background:#000000" value="#000000"></div>
	<div class="empty_pick pick_color" value="none"></div>
</div>
	

<!-- emotki -->
<div id="list_emoticon">
<div id="smile_content">

<div  class="emoticon closesmilies"><img  src='emoticon/smile1.png' title=':smile4:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/twink.png' title=':twink:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/tongue.png' title=':tongue:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/angry.png' title=':angry:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/smile2.png' title=':smile2:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/sad.png' title=':sad:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/evil2.png' title=':evil2:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/evil.png' title=':evil:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/eee.png' title=':eee:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/cool.png' title=':cool:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/angry.png' title=':angry:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/heart.png' title=':heart:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/neutral.png' title=':neutral:'  class="chat_emoticon"></div>
<div  class="emoticon closesmilies"><img  src='emoticon/tongue.png' title=':tongue4:'  class="chat_emoticon"></div>
<div class="clear"></div>
</div>
</div>

</div>


    
	 
<!-- footer w oddzielnym kontenerze -->
<?php
require_once('html/footer.html.php');
}
else
{
	require_once('html/loginform.html.php');
}
?>
