	<table width="70%" border="0" cellspacing="5" cellpadding="5">
	<tr>
		<td bgcolor: white colspan="2"><h1>REGISTER NOW</h1></td>
		<table width="70%" border="0" cellspacing="5" cellpadding="5">
		</tr>
		<tr>
		<td bgcolor: white width="8%"></td>
		<td bgcolor: white width="92%">
<!--SIGNUP FORM____________________-->		
		<form method="post" action='/users/p_signup'>
			<fieldset>
			<ul>
				<li>
					<label for="first_name">First Name:</label><span class="alert"><?=$first_error?></span>
					<input type="text" name="first_name" class="signupFields" value= "<?php echo $first_name?>" />
				</li>
				<li>
					<label for="last_name">Last Name:</label><span class="alert"><?=$last_error?></span>
					<input type="text" name="last_name" class="signupFields" value= "<?php echo $last_name?>" />
				</li>
				<li>
					<label for="password">Password:</label><span class="alert"><?=$password_error?></span>
					<input type="password" name="password" class="signupFields" value= "<?php echo $password?>" />
				</li>
				<li>
					<label for="password2">Confirm Password:</label><span class="alert"><?=$password2_error?></span>
					<input type="password" name="password2" class="signupFields" value= "<?php echo $password2?>" />
				</li>
				<li>
					<label for="email">Email:</label><span class="alert"><?=$email_error?></span>
					<input type="text" name="email" class="signupFields" value= "<?php echo $email?>" />
				</li>
				<li>
					<input type="submit" value="Register" class="large blue button" />
				</li>
			</ul>
			</fieldset>
		</form>
		</td>
	</tr>
	</table>