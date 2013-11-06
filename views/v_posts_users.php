<!--FOLLOW/UNFOLLOW USERS---------------------------------------------------------------------------------------->  
	<h1>Follow/Unfollow Users</h1>
	
	<table  border="1" cellspacing="5" cellpadding="5">
		<? foreach ($users as $user): ?>
			<!-- Print user's photo & name -->
			<tr >
			<td><img  width="60" height="60" class="background" src="..//libraries/profile_images/<?=$user['profile_image']?>" alt="" title="" /></td>
			<td ><h2><?=$user['first_name']?> <?=$user['last_name']?></h2>
			
			<!-- If there is a connection with this user, sho an unfollow link -->
			<? if(isset($connections[$user['user_id']])): ?>
			<FORM method="LINK"  action="unfollow/<?=$user['user_id'].'/'?>'">
				<INPUT TYPE="submit" VALUE="Unfollow">
			</FORM>
			
			<!-- Otherwise, show the folllow link -->
			<? else: ?>
			<FORM method="LINK"  action="follow/<?=$user['user_id'].'/'?>'">
				<INPUT TYPE="submit" VALUE="Follow">
			</FORM>
			<? endif; ?>
			
			</tr>
		
		<? endforeach; ?>
	
	</table>

