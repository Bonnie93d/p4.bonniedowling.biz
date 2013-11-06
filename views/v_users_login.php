<!--MEMBER LOGIN FORM____________________--> 
	<table width="70%" border="0" cellspacing="5" cellpadding="5">
		<tr>
		<td bgcolor: white colspan="2"><h1>LOGIN</h1></td>
		</tr>
		<tr>
		<td bgcolor: white width="8%"></td>
		<td bgcolor: white width="92%">
			<form method="post" action='/users/p_login'>
				<span class="alert"><?=$login_error?></span>
				<fieldset>
				<ul>
					<li>
						<label for="email">Email:</label>
						<input type="text" name="email" class="signupFields" value= "<?php echo $email?>" />
					</li>
					<li>
						<label for="password">Password:</label>
						<input type="password" name="password" class="signupFields" value= "<?php echo $password?>" />
					</li>
					<li>
						<input type="submit" value="Login" class="large blue button" />	
					</li>
				</ul>
				</fieldset>
			</form>
		</td>
		</tr>
	</table>