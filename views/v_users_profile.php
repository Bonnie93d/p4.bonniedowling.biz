	<h1><?=$user->first_name?>, edit your profile.</h1>
	<table width="90%" border="0" cellspacing="5" cellpadding="5">
	<tr>
		<td width="24%"><img src="..//libraries/profile_images/<?=$user->profile_image?>" alt="" title="" /></div></td>
		<td width="76%" rowspan="11" valign="top">
		
<!--UPDATE PROFILE____________________--> 		
		<form method="post" action='/users/p_profile'>
			<fieldset>
			<ul>
				<li>
					<span class="alert"><?=$up_status?></span>
					<label for="user_id"></label><span class="alert"><?=$first_error?></span>
					<input type="hidden" name="user_id" class="signupFields" value= "<?php echo $user->user_id?>" />
				</li>
				<li>
					<label for="first_name">First Name:</label><span class="alert"><?=$first_error?></span>
					<input type="text" name="first_name" class="signupFields" value= "<?php echo $user->first_name?>" />
				</li>
				<li>
					<label for="last_name">Last Name:</label><span class="alert"><?=$last_error?></span>
					<input type="text" name="last_name" class="signupFields" value= "<?php echo $user->last_name?>" />
				</li>
				<li>
					<label for="password">Password:</label><span class="alert"><?=$password_error?></span>
					<input type="password" name="password" class="signupFields" value= "" />
				</li>
				<li>
					<label for="password2">Confirm Password:</label><span class="alert"><?=$password2_error?></span>
					<input type="password" name="password2" class="signupFields" value= "" />
				</li>
				<li>
					<label for="email">Email:</label><span class="alert"><?=$email_error?></span>
					<input type="text" name="email" class="signupFields" value= "<?php echo $user->email?>" />
				</li>
				<li>
					<input type="submit" value="Update" class="large blue button" />
				</li>
			</ul>
			</fieldset>
		</form></td>
		</tr>
<!--PROFILE PHOTO UPLOAD____________________--> 
		<tr>
			<td><span class="alert"><?=$image_error?></span></td>
		</tr>
		<tr>
		<td>
		<form name="form" action="/users/im_profile" method="POST"
		enctype="multipart/form-data">
		    <label for="file">UPDATE PROFILE PICTURE</label>
		    <input type="file" name="uploaded_file" id="uploaded_file">
		    <input type="hidden" name="i_name" value="" /><br />
		    <input type="hidden" name="email" value="<?php echo $user->email?>" /><br />
		    <input type="hidden" name="i_name" value="<?php echo $user->user_id.$user->first_name?>"  />
		    
		<input type="submit" name="submit" value="Submit" class="large blue button">
		<input type="hidden" name="MM_insert" value="form" />
		</form></td>
	</tr>
	 </table>

