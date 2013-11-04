<h1>REGISTER NOW</h1>

<form method="post" action='/users/p_signup'>

    <fieldset>
    
    	<ul>
    		<li>
    			<label for="first_name">First Name:</label><h2><?=$first_error?></h2>
    			<input type="text" name="first_name" value= "<?php echo $first_name?>" />
    		</li>
    		<li>
    			<label for="last_name">Last Name:</label><h2><?=$last_error?></h2>
    			<input type="text" name="last_name" value= "<?php echo $last_name?>" />
    		</li>
    		<li>
    			<label for="password">Password:</label><h2><?=$password_error?></h2>
    			<input type="password" name="password" value= "<?php echo $password?>" />
    		</li>
    		<li>
    			<label for="password2">Confirm Password:</label><h2><?=$password2_error?></h2>
    			<input type="password" name="password2" value= "<?php echo $password2?>" />
    		</li>
    		
    		<li>
    			<label for="email">Email:</label><h2><?=$email_error?></h2>
    			<input type="text" name="email" value= "<?php echo $email?>" />	
    		</li>
    		<li>
    			<input type="submit" value="Register" class="large blue button" />			
    		</li>
    	</ul>
    	
    </fieldset>
    
</form>	

