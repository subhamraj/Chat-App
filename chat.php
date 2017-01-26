<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>CHAT BY SUBHAM</title>
  <meta name="theme-color" content="#03a9f4"/>
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/Dogfalo/materialize/master/dist/css/materialize.min.css'/>

	  <link rel="stylesheet" href="style.css"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/> 

		  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		  <script src='https://cdn.rawgit.com/Dogfalo/materialize/master/dist/js/materialize.min.js'></script>  
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
	

 		function sendmessage()
        {
          typedtext = document.getElementById('sendie').value;
    		   chat.send(typedtext, name);	
    			        $("#sendie").val("");
    			        	        
                   						    
        } 	 
 
        // ask user for name with popup prompt    
        var name = prompt("Enter your nickname :", "");
        
        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "Guest";	
    	}
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("Nickname: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState();
			 
    	        chat.send(name  +  "  connected", "INFO");	
    			        $(this).val("");
						
    	
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
		document.getElementById("chat-area").style.margin = "25px";
		   </script>

</head>

<body onload="setInterval('chat.update()', 500)">

    <div id="page-wrap">
    
        
        
        <p id="name-area"></p>
        
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
	  <form id="send-message-area" >
          
		  <textarea id="sendie"  maxlength = '100' ></textarea>
			  </form>
	  <button onClick="sendmessage()" id="buttonsend"></button> 
	  
    </div>

</body>

</html>
