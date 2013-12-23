 /*---------Listeners-----------*/

 		//$('button').click(calculate);
 		//$('input,select').change(calculate);
 		document.getElementById('firstName').onblur=firstCheck;
 		document.getElementById('lastName').onblur=lastCheck;
 		document.getElementById('password').onblur=passCheck;
 		document.getElementById('password2').onblur=pass2Check;
 		document.getElementById('sec_question').onblur=questionCheck;
 		document.getElementById('sec_answer').onblur=answerCheck;
 		document.getElementById('email').onblur=emailCheck;
 		document.getElementById('sup').onkeyup=emailCheck;
 		document.getElementById('sup').onkeyup=registerToggle;
 		window.onload=registerToggle();
                
                
 /*---------Check fields and enable/diable register button based inputs-----------*/
 
 	
	 	function firstCheck(){
	 		if(document.getElementById('firstName').value==''){
		 		$('#firstError').html('**Please enter your first name.**');
		 	}
		 	else{
		 		$('#firstError').html('');
		 	}
	 	}
	 	
	 	function lastCheck(){
	 		if(document.getElementById('lastName').value==''){
		 		$('#lastError').html('**Please enter your last name**');
		 	}
		 	else{
		 		$('#lastError').html('');
		 	}
	 	}
	 	
	 	function passCheck(){
	 		if(document.getElementById('password').value==''){
		 		$('#passError').html('**Please specify a password.**');
		 	}
		 	else{
		 		$('#passError').html('');
		 	}
	 	}
	 	
	 	function pass2Check(){
	 		if(document.getElementById('password2').value==''){
		 		$('#passError2').html('**Please confirm your password.**');
		 	}
		 	else{
		 		$('#passError2').html('');
		 	}
		 	if(!document.getElementById('password').value=='' && !document.getElementById('password2').value==''){
			 	if($('#password').val() != $('#password2').val()){
			 		$('#passError').html("**Passwords did not match. Please try again.**");
			 		$('#passError2').html('');
			 		document.getElementById('password').value='';
			 		document.getElementById('password2').value='';
			 	}
			 else{
				 $('#passError').html('');
				 $('#passError2').html('');
			 }
		 	}
		 	
	 	}
	 	
	 	function questionCheck(){
	 		if(document.getElementById('sec_question').value==''){
		 		$('#qError').html('**Please specify a password retrieval question.**');
		 	}
		 	else{
		 		$('#qError').html('');
		 	}
	 	}
	 	
	 	function answerCheck(){
	 		if(document.getElementById('sec_answer').value==''){
		 		$('#answer_error').html('**Please specify a password retrieval answer.**');
		 	}
		 	else{
		 		$('#answer_error').html('');
		 	}
	 	}
	 	
	 	
	 	function registerToggle(){
	 	console.log('running');
	 		
	 		if(document.getElementById('firstName').value==''|| document.getElementById('lastName').value==''||	document.getElementById('password').value==''|| document.getElementById('password2').value=='' || document.getElementById('email').value==''|| document.getElementById('sec_question').value==''||document.getElementById('sec_answer').value==''){
	 		document.getElementById("regButton").style.display = 'none';
	 		document.getElementById("reg").disabled = true;
	 		}
	 		
	 		else{

	 			if($('#password').val() != $('#password2').val()){
	 				document.getElementById("regButton").style.display = 'none';
	 				document.getElementById("reg").disabled = true;
	 			}
	 			else{
		 			document.getElementById("regButton").style.display = 'block';
		 			document.getElementById("reg").disabled = false;
		 			emailCheck()
	 			}
	 		}
	 		

	 	}
	 	
	 	function emailCheck(){
	 		var x = false;
	 		
		 	if(document.getElementById('email').value==''){
		 	$('#emailError').html('**Please enter your email address.**');
		 	}
		 	else{
		 		$('#emailError').html('');
		 		$.ajax({
			 		type: 'POST',
			 		url: '/users/p_testEmail',
			 		success: function(response) { 
				 		 x = response;
				 		 if(x=='false'){
				 		 	$('#emailError').html('**Please enter a valid email address.**');
				 		 	document.getElementById("regButton").style.display = 'none';
				 		 	document.getElementById("reg").disabled = true;
				 		 }	
				 		 if(x=='false2'){
				 		 	$('#emailError').html('**Email already registered, please login to existing account**');
				 		 	document.getElementById("regButton").style.display = 'none';
				 		 	document.getElementById("reg").disabled = true;
				 		 }		 		 
				 		},
				 	data: {
					 		email: $('#email').val(),
					 	},
					 });
					console.log(x);
		 		}
	 	
	 	}

 				
 						
