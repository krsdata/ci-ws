 		$('#normal input[type="password"]').bind('keypress', function(e) 
 		{
			if(e.keyCode==13){
				
				userauth();
			}
		});

		 var  active_app_user = function(user_id) {
 		    	
 		       
 		        $.ajax({
 		            type: "POST",
 		            url: "router/activeuser",
 		            data: {
 		                user_id: user_id
 		            },
 		            success: function(result) {
 		              if(result == 1)
 		              {
 		              	alert("User activated");
 		              }else{

 		              	alert("User deactivated");
 		              }

 		            },
 		            error: function(errorThrown) {

 		            }
 		        });

 		       

 		    }

		function userauth()
		{
						
			var base = $('base')[0].href;
			var token = gettoken();
			var username = $.jCryption.encrypt($("input[name='username']").val(),token);
		    var pswd = $.jCryption.encrypt($("input[name='password']").val(),token); 


		    if(username==''||pswd=='')
		    {
		      $('#alertmsg').show().html('Please Enter Username or Password');
		      setTimeout(function() {$('#alertmsg').hide(); }, 2000);
		      return;
		    }

			 $.ajax({
			 	type: "POST",
			 	url:base+"login/checklogin",
			 	data: {username : username,pswd:pswd},
			 	success:function(result)
			 	{
			 		

			 		if(result=="error")
			 		{
			 			$('#alertmsg').show().html('Please Enter Valid Username and Password');
		      			setTimeout(function() {$('#alertmsg').hide(); }, 2000);
		      			return;	
			 		}
			 		else
			 		{
			 		window.location.href = base+'dashboard';
			 	    }
		          
		     	
		        },
		        error: function(errorThrown) 
		        { 
		         
		        }    
		  });
		    

		}

		function addrouter()
		{
			var base = $('base')[0].href;
			var password = $("#pwd").val();

			if( $("input[name='wifi_address']").val()==''  || $("input[name='ssid']").val()=='' || $("input[name='bssid']").val()=='' || $("#pwd").val()=='' || $("input[name='lat']").val()=='' || $("input[name='long']").val()=='')
			{
			  $('#alertmsg').removeClass('alert-success').addClass('alert-danger').show().html('Please Enter Required Field');
		      setTimeout(function() {$('#alertmsg').hide(); }, 3000);
		      return;

			}

			$.ajax({
			 	type: "POST",
			 	url:base+"router/addrouterdata",
			 	data: $("form").serialize()+ "&pwd=" + password,
			 	success:function(result)
			 	{
			 	
			 	   $('#alertmsg').removeClass('alert-danger').addClass('alert-success').show().html('Entry Added Successfully');
		           setTimeout(function() {window.location.href = base+'router';}, 2000);
          	
		     	
		        },
		        error: function(errorThrown) 
		        { 
		         
		        }    
		  });

		}

		function editrouter(id)
		{
			var base = $('base')[0].href;
			var password = $("#pwd").val();

			if($("input[name='ssid']").val()=='' || $("input[name='bssid']").val()=='' || $("input[name='pwd']").val()=='' || $("input[name='lat']").val()=='' || $("input[name='long']").val()=='')
			{
			  $('#alertmsg').removeClass('alert-success').addClass('alert-danger').show().html('Please Enter Required Field');
		      setTimeout(function() {$('#alertmsg').hide(); }, 3000);
		      return;

			}

			$.ajax({
			 	type: "POST",
			 	url:base+"router/editrouterdata",
			 	data: $("form").serialize()+ "&id=" + id+ "&pwd=" + password,
			 	success:function(result)
			 	{
			 		

			 	   $('#alertmsg').removeClass('alert-danger').addClass('alert-success').show().html('Entry Updated Successfully');
		           setTimeout(function() {window.location.href = base+'router';}, 2000);
          	
		     	
		        },
		        error: function(errorThrown) 
		        { 
		         
		        }    
		  });

		}

     function validate()
     {     		
      $("#register-form").validate({
        rules: {
            full_name: "required",
            email: {
                required: true,
                email: true
            },
            user_name: "required",
            pass_word: {
				equalTo: "#oldpwd",
				required: true

			},
         },
        messages: {
            full_name: "Please enter your name",
            email: "Please enter a valid email address",
            user_name: "Please enter a valid bssid",
            pass_word: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
   }

   function gettoken()
   {
   	return btoa("mysuperp@ssword");
   }

   function showmap(lat,longitude,img)
   {
   		var base = $('base')[0].href;
   		$.ajax({
			 	type: "POST",
			 	url:base+"frontend/showmap",
			 	data: {lat : lat,longitude:longitude,img:img},
			 	success:function(result)
			 	{
			 			 	
			 	 $('#myModal').html(result);
			 	 $('#myModal').modal('show');		 	 
		     	
		        },
		        error: function(errorThrown) 
		        { 
		         
		        }    
		  });



   }
  function loadArticle(pageNumber)
  { 
         var base = $('base')[0].href;  

         $('a#inifiniteLoader').show('fast');

         setTimeout(function() {

			        $.ajax({
			            url: base+"frontend/endlessdata",
			            type:'POST',
			            data: "page_no="+ pageNumber , 
			            success: function(html){
			            	
			            	if(html!='none')
			            	{
			            		$('a#inifiniteLoader').hide('1000');
			            		$("#morewifiid").find('.loading-bar').html('');
			                	$("#morewifiid").append(html);

			            	}
			            	else
			            	{
			            		$('a#inifiniteLoader').html('No More Data');

			            		 setTimeout(function() {$('a#inifiniteLoader').hide('1000');  }, 1000);
			            	}

			            	$("input[name='rating']").rating({hoverEnabled : false});

			            	$("input[name='rating']").on("rating.change", function(event, value, caption) {
                				$(this).rating("refresh", {disabled: true, showClear: false});
            				 });

			             }
			    });
        }, 1000);

          
   }

   function createTicker() 
   {
		    var tickerLIs = jQuery("#blockqoutes");
		    tickerItems = new Array();
		    tickerLIs.each(function(el) {
		        tickerItems.push(jQuery(this).html());
		    });
		    i = 0;
		    rotateTicker();
	}


	function rotateTicker() 
	{
			    if (i == tickerItems.length) {
			        i = 0;
			    }
			    tickerText = tickerItems[i];
			    c = 0;
			    typetext();
			    setTimeout("rotateTicker()", 10000);
			    i++;
	}


	function typetext() 
	{
	var isInTag = false;
    if (jQuery('#blockqoutes').length > 0) {
        var thisChar = tickerText.substr(c, 1);

        if (thisChar == '<') {
            isInTag = true;
        }
        if (thisChar == '>') {
            isInTag = false;
        }
        jQuery('#blockqoutes').html(tickerText.substr(0, c++));
        if (c < tickerText.length + 1)
            if (isInTag) {

              //  typetext();
            } else {
            	//alert('ok');
                setTimeout("typetext()", 28);
            } else {
            	//alert('ok');
            c = 1;
            //tickerText = "";
        }
    }
}

	function addrating(routerid,rating)
	{
		
		var base = $('base')[0].href;
		
		$.ajax({
			 	type: "POST",
			 	url:base+"frontend/addrating",
			 	data: {rating : rating,routerid:routerid},
			 	success:function(result)
			 	{

			 		 		 	 
		     	
		        },
		        error: function(errorThrown) 
		        { 
		         
		        }    
		  });


	}

		function editfaq(id)
		{
			var base = $('base')[0].href;
			

			if($("input[name='answer']").val()=='' || $("input[name='question']").val()=='')
			{
			  $('#alertmsg').removeClass('alert-success').addClass('alert-danger').show().html('Please Enter Required Field');
		      setTimeout(function() {$('#alertmsg').hide(); }, 3000);
		      return;

			}

			$.ajax({
			 	type: "POST",
			 	url:base+"faq/editfaqdata",
			 	data: $("form").serialize()+ "&id=" + id,
			 	success:function(result)
			 	{
			 		

			 	   $('#alertmsg').removeClass('alert-danger').addClass('alert-success').show().html('Entry Updated Successfully');
		           setTimeout(function() {window.location.href = base+'faq';}, 2000);
          	
		     	
		        },
		        error: function(errorThrown) 
		        { 
		         
		        }    
		  });

		}

		function addfaq()
		{
			var base = $('base')[0].href;
			

			if($("input[name='answer']").val()=='' || $("input[name='question']").val()=='')
			{
			  $('#alertmsg').removeClass('alert-success').addClass('alert-danger').show().html('Please Enter Required Field');
		      setTimeout(function() {$('#alertmsg').hide(); }, 3000);
		      return;

			}

			$.ajax({
			 	type: "POST",
			 	url:base+"faq/addfaqdata",
			 	data: $("form").serialize(),
			 	success:function(result)
			 	{
			 	
			 	   $('#alertmsg').removeClass('alert-danger').addClass('alert-success').show().html('Entry Added Successfully');
		           setTimeout(function() {window.location.href = base+'faq';}, 2000);
          	
		     	
		        },
		        error: function(errorThrown) 
		        { 
		         
		        }    
		  });

		}


