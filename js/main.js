$(document).ready(function(){

    var pickSelect = "";
	
	$('#link_box').hide();
	
	$(".picker").click(function() {
		var pickPos = $(this).position();
		var pickHeight = $(this).height();
		var pickWidth = $(this).width();
		var pickBox = $("#picker_box").outerHeight();
		pickSelect = $(this).attr('value');
		
		if ($('#picker_box:visible').length){  // #picker_box to obszar w kodzie , paleta kolorow
			$("#picker_box").hide();
		}
		else {
			$("#list_emoticon").hide();
			if(boxZone == 1){
				$("#picker_box").css({
					position: "absolute",
					top: pickPos.top + 270 + "px",
					left: (pickPos.left + (pickWidth * 9)) + "px"
				}).show();
			}
			else{
				$("#picker_box").css({
					position: "absolute",
					top: pickPos.top - pickBox + "px",
					left: (pickPos.left - (pickWidth * 3)) + "px"
				}).show();
			}
		}
	});
	
	$(".pick_color").click(function() {              // klasa w #picker_box 
		var color = $(this).attr('value');
		$('#'+ pickSelect).css("background",color);
		$('#'+ pickSelect).css("background-size","100% 100%");
		$("#picker_box").hide();
	});
	
	$(".text_bold").click(function() {      // pogrubienie, pochylenie, podkreslenie
		var checkItem = $(this).attr('value');
		if(checkItem == 0){
			$(this).addClass('sel_item');  //zmienia kolor tla
			$(this).attr('value','bold');
		}
		else {
			$(this).removeClass('sel_item');
			$(this).attr('value','0');
		}
	});
	
	$(".text_italic").click(function() {      // pogrubienie, pochylenie, podkreslenie
		var checkItem = $(this).attr('value');
		if(checkItem == 0){
			$(this).addClass('sel_item');  //zmienia kolor tla
			$(this).attr('value','italic');
		}
		else {
			$(this).removeClass('sel_item');
			$(this).attr('value','0');
		}
	});
	
	$(".text_underline").click(function() {      // podkreslenie
		var checkItem = $(this).attr('value');
		if(checkItem == 0){
			$(this).addClass('sel_item');  //zmienia kolor tla
			$(this).attr('value','underline');
		}
		else {
			$(this).removeClass('sel_item');
			$(this).attr('value','0');
		}
	});
	
	//---------------- dodawanie linka---------------------------------------------------------------
	$('#link_item').click(function(){
		var linkPos = $(this).position();
		var linkBox = $("#link_box").outerHeight();
		
		$("#link_box").css({
					position: "absolute",
					top: linkPos.top + 470 + "px",
					left: linkPos.left + 300 + "px"
				}).show();
		
		
	});
	
	$('#add_link').click(function(){
		var link = $('#get_link').val();  
		var str = link.substring(0, 7);  // zapisanie pierwszych szesciu znakow z linka
	   
	    if(link == '')
		{
		  $('#link_box').hide();	
		}
		else
		{
			
		if(str != 'http://') // jesli nie ma http://
		{
		var linked = "<a href=http://"+ link + " target='_blank'>"+ link + "</a>";
		var content = $('#content').val();
		var contentlink = content + linked;
		$('#content').val(contentlink);
		$('#link_box').hide();
		}
		else
		{
		var linked = "<a href="+ link + " target='_blank'>"+ link + "</a>";
		var content = $('#content').val();
		var contentlink = content + linked;
		$('#content').val(contentlink);
		$('#link_box').hide();	
		}
		    
			
		}
		
	});
	
	
	//-------------------------------------------------------------------------------------------------
	
	$("#emo_item").click(function() {  // emotki 
		var emoPos = $(this).position();  // left i top
		var emoHeight = $(this).height(); // wysokosc
		//var emoWidth = $(this).width();  // szerokosc
		var emoBox = $("#list_emoticon").outerHeight();
		
		if ($('#list_emoticon:visible').length){
			$("#list_emoticon").hide();
		}
		else {
			if(boxZone == 1){
				$("#picker_box").hide();
				$("#list_emoticon").css({
					position: "absolute",
					top: emoPos.top + 390 + "px",
					left: (emoPos.left + 90) + "px"
				}).show();
			}
			else {
				$("#picker_box").hide();
				$("#list_emoticon").css({
					position: "absolute",
					top: emoPos.top  + "px",
					left: (emoPos.left + 10) + "px"
				}).show();	
			}
		}
	});
//---------------------------------------------------------------------------------------------

$('.chat_emoticon').click(function(event){
	var src = $(this).attr('src');
	var content = $('#content').val();
	var img = "<img src='"+ src + "'/>";
	var sum = content + img;
	$('#content').val(sum);
	
	
	
});

//---------------------------------------------------------------------------------------------	
	
	
	
	// hide the emoticon box ...
	
	$('#list_emoticon').on('click', '.closesmilies', function(){
		$('#list_emoticon').hide();
	});	
	
	
	// close smilie and picker if click somwhere else on the page 	

	$(document).mouseup(function (e)
	{
		var clicked = $("#list_emoticon");
		var clicked2 = $("#picker_box");
		var clicked3 = $("#text_pick");
		var clicked4 = $("#high_pick");
		var clicked5 = $("#zoom_emo");
		var clicked6 = $(".opt_open");
		var clicked7 = $("#wrap_options");
		var clicked8 = $(".option_add");
		//var clicked9 = $("#link_box");
		

		if (!clicked.is(e.target) && !clicked2.is(e.target) && !clicked3.is(e.target) 
		&& !clicked4.is(e.target) && !clicked5.is(e.target) && !clicked6.is(e.target) && !clicked7.is(e.target))
		{
			clicked.hide();
			clicked2.hide();
			clicked8.hide();
			//clicked9.hide();
		}
	});
	
	
	
	
	
	
	
	
});




