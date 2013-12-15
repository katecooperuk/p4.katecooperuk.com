<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

	<!-- JS External Links -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://books.google.com/books/previewlib.js"></script>
	<!-- End JS External Links -->
	
	<!-- Controller Specific CSS/JS -->
	<link rel="stylesheet" href="/css/bookclub.css" type="text/css">
	<script type="text/javascript" src="/js/bookclub.js"></script>
	
	<!-- Google Font Link -->
    <link href='http://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet' type='text/css'>
	
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<!-- Page Wrapper -->
	<div id="pagewrapper">
	
		<!-- Masthead -->
		<header>ChatterBox Book Club</header>
		<!-- End Masthead -->
		
		<!-- Navigation Links -->
		<nav>
			<ul>
				<li><a href='/'>Home</a></li>
				
					<?php if($user): ?>
			
						<li><a href='/users/profile'>Profile</a></li>
						<li><a href='/posts/add'>Add Post</a></li>
						<li><a href='/posts/'>View Posts</a></li>
						<li><a href='/books/'>Bookshelf</a></li>
						<li><a href='/posts/users'>Users</a></li>
						<li><a href='/users/logout'>Logout</a></li>
				
					<?php else: ?>
			
						<li><a href='/users/signup'>Sign Up</a></li>
						<li><a href='/users/login'>Login</a><br></li>
				
					<?php endif; ?>
			</ul>
		</nav>
		<!-- End Navigation Links -->
		
		<!-- Page Content -->
		<?php if($user): ?>
			<div id='login'> You are logged in as <?=$user->first_name?> <?=$user->last_name?></div>
		<?php endif; ?>

		<?php if(isset($content)) echo $content; ?>

		<?php if(isset($client_files_body)) echo $client_files_body; ?>
		<!-- End Page Content -->
		
		<!-- Footer -->
		<footer>
			<p class="footer">Kate Cooper - CSCI E15: Dynamic Web Applications - Project 4</p>
			<p>
				<a href="http://validator.w3.org/check?uri=http%3A%2F%2Fp4.katecooperuk.com%2F">
				<img style="border:0; width:32px; height:32px" src="http://www.w3.org/html/logo/badge/html5-badge-h-solo.png" alt="Valid HTML5!" width="63" height="64" title="HTML5 Powered">
				</a>
				<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img style="border:0; width:88px; height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!">
				</a>
			</p>
		</footer>
		<!-- End Footer -->
		
	</div>
	<!-- End Page Wrapper -->
    
</body>
</html>