<!--POSTS TABLE---------------------------------------------------------------------------------------->  
	<h1>Hi, <?=$user->first_name?>. See what people are saying.</h1>
	
	<table width="90%"border="1" cellspacing="5" cellpadding="5">
	
		<?php foreach($posts as $post): ?>
		
			<article>
				<!-- Table Row fo Data -->
				<tr >
				<!-- Photo -->
				<td><img  width="135" height="135" class="background" src="../libraries/profile_images/<?php echo $post['profile_image']?>" alt="" title="" /></td>
				
				<!-- Poster's name -->
				<td  width = "80%"><h3> <?=$post['first_name']?> <?=$post['last_name'] ?> posted: </h3>
				<p><?=$post['content'] ?></p>
				
				<!-- Post Time/Date -->
				<span class = "postTime"><time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
				<?=Time::display($post['created'])?>
				</time></span>
				
				<? if($post['post_user_id'] == $user->user_id): ?>
					<FORM method="LINK"  action="/posts/deletePost/<?php echo $post['ID'].'/'?>'">
					<INPUT TYPE="submit" VALUE="Delete Post">
					</FORM>
				<? endif ?>
				</td>
				</tr>
			
			</article>
		
		<?php endforeach; ?>
	</table>


