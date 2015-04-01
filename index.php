 <!doctype html>   
 <html lang="es">         
 <head>                   
 <meta charset="UTF-8"/>                   
<meta name="viewport" content="width=device-width, initial-scale=1">          
<title>Vladimir Vargas</title>  
<style>

.bottom{
	background-color:#03C;
	font-size:16px;
	color: #FFFFFF;
	font-family:"Arial Black", Gadget, sans-serif;
}

</style>
</head>         
<body>                 
<div  class="container-fluid" style="padding: 2%;">                          
<section>                                  
<div class="row" style="text-align:center;font-size:55px;">Chat: <small>Programandores 1.0</small><hr>                                  
</div>                                
<div class="row" style="padding-top:1%;">                                         
<form id="formChat" role="form">                                                
<div class="form-group">                                                        
<label for="user">Usuario:</label>&nbsp;
<input type="text" class="form-control" id="user" name="user"> 
</div>                                    
<div class="form-group">                                                        
<div class="row" style="padding-top:2%;">
 
<div id="conversation" style="height:240px;  border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
</div>                                                               
                                                  
</div>                                                 
<div class="form-group" style="padding-top:1%;">                                                          
<label for="message"><strong>Mensaje:</strong></label><br>                                                         
<textarea id="message" name="message" placeholder="Escribe tu Mensaje..."  class="form-control" rows="3" cols="182"></textarea>                   
</div> 
<br>                                                
<button id="send" class="bottom">Enviar</button></form>                                  
</div>
</section>                  
</div>                  
                
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>                  
<script>                          
$(document).on("ready", function(){  
	registarmensajes();    
	$.ajaxSetup({"cache":false});
	setInterval("loadMensajes()", 500);            
});    


var registarmensajes = function(){
	$("#send").on("click", function(e){
		e.preventDefault();
		var frm = $("#formChat").serialize();
		$.ajax({
			type: "POST",
			url: "registro.php",
			data: frm
		}).done(function(info){
			$("#message").val("");
		var altura=$("#conversation").prop("scrollHeight");
		$("#conversation").scrollTop(altura)			
			console.log( info );
		})
	});
}


var loadMensajes = function(){
	$.ajax({ 
		type:"POST",
		url:"conversacion.php"
	}).done(function(info){
		$("#conversation").html( info );
		$("#conversation p:last-child").css({"background-color": "#09C", "padding-botton": "20px"});
		var altura=$("#conversation").prop("scrollHeight");
		$("#conversation").scrollTop(altura)
	});
}
            
</script>         
</body>
</html>