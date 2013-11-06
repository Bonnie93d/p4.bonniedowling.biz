<!doctype html>
<html>
<!--HEAD----------------------------------------------------------------------------------------> 
<head>
    <title><?php if(isset($title)) echo $title; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
	<link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- Controller Specific JS/CSS -->
    <?php if(isset($client_files_head)) echo $client_files_head; ?>
  </head>
  
 <body>
  
<!--HEADER---------------------------------------------------------------------------------------->  
<header>
	<div class="HeaderImage">		
		<?php if($user): ?>
		<ul class="nav">
		
		<!--MEMBER NAV-------->  
		<nav id='access'>
			<ul>
			<li class="navlist">
				<li><a href='/posts/add'>Add Post</a></li>
				<li><a href='/posts'>View Posts</a></li>
				<li><a href='/users/profile'>Update Profile</a></li>
				<li><a href='/posts/users'>Follow/Unfollow Users</a></li>
				<li><a href='/users/logout'>Log Out</a></li>
				<li></li>
			</ul>
		</nav>
		
		<!--NON-MEMBER NAV-------->
		<?php else: ?>
		<ul class="nav">
		<nav id='no access'>
			<ul>
			<li class="navlist">
				<li><a href='/users/signup'>New User Registration</a></li>
				<li><a href='/users/login'>Login</a></li>
				<li></li>
				<li></li>
			</ul>
		</nav>
		
		<? endif ?>
	</div>	 
</header>
 
<!--PHP INSERT AREA---------------------------------------------------------------------------------------->
 
 <div class="content">
 
 <table width="90%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td><div align="center">
	            <?php if(isset($content)) echo $content; ?>

    <?php if(isset($client_files_body)) echo $client_files_body; ?>
	    
    </div></td>
  </tr>
</table>
    

<!--FOOTER---------------------------------------------------------------------------------------->
    
<footer>
  <div class="footer">


         <p>© 2013 Chitter Chatter</p>
         
	</footer>
	</body>
	</html>
