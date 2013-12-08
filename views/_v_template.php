<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- CSS Links -->
	<link rel="stylesheet" href="/css/bookclub.css" type="text/css">
	<!-- End CSS Links -->

	<!-- JS Links -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!-- End JS Links -->
	
	<!-- Controller Specific CSS/JS -->
	<link rel="stylesheet" href="/css/chatterbox.css" type="text/css">
	
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>
	<?php if(isset($client_files_body)) echo $client_files_body; ?>	
	
	<!-- Page Wrapper -->
	<div id="pagewrapper">
	
		<!-- Masthead -->
		<header>ChatterBox</header>
		<!-- End Masthead -->
		
		<!-- Navigation Links -->
		<nav>
			<menu>
				<ul>
					<li><a href='/'>Home</a></li>
				
					<?php if($user): ?>
			
						<li><a href='/users/profile'>Profile</a></li>
						<li><a href='/posts/add'>Add Post</a></li>
						<li><a href='/posts/'>View Posts</a></li>
						<li><a href='/posts/users'>Users</a></li>
						<li><a href='/users/logout'>Logout</a></li>
				
					<?php else: ?>
			
						<li><a href='/users/signup'>Sign Up</a></li>
						<li><a href='/users/login'>Login</a><br></li>
				
					<?php endif; ?>
				</ul>
			</menu>
		</nav>
		<!-- End Navigation Links -->
		
		<!-- Page Content -->
		<?php if(isset($content)) echo $content; ?>	
		
			<?php if($user): ?>
				You are logged in as <?=$user->first_name?> <?=$user->last_name?><br>
			<?php endif; ?>
	
			<br>
		<!-- End Page Content -->
	
	</div>
	<!-- End Page Wrapper -->

</body>
</html>