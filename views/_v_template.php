<!DOCTYPE html>

<html>
<!--HEAD____________________-->
<head>
	<meta charset="UTF-8">
    <title><?php if(isset($title)) echo $title; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Controller Specific JS/CSS -->
    <?php if(isset($client_files_head)) echo $client_files_head; ?>
  </head>
  
 <body>
 <div class="container">
<!--HEADER____________________--> 
<header>
	<div class="HeaderImage">		
		<?php if($user): ?>
		<ul class="nav">
		
		<!--MEMBER NAV____________________-->  
		<nav id='access'>
			<ul>
			<li class="navlist">
				<li><a href='/items/add'>Add Item</a></li>
				<li><a href='/items/myItems'>Saved Items</a></li>
				<li><a href='/users/logout'>Log Out</a></li>
				<li></li>
			</ul>
		</nav>
		
		<!--NON-MEMBER NAV____________________-->
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
 
<!--PHP INSERT AREA____________________-->
 
 <div class="content">
 
 <table >
  <tr>
    <td>
	  <?php if(isset($content)) echo $content; ?>

	  <?php if(isset($client_files_body)) echo $client_files_body; ?>
	    
    </div></td>
  </tr>
</table>
    
 </div>
<!--FOOTER____________________-->
    
<footer>
  <div class="footer">



         
	</footer>
	</body>
	</html>
