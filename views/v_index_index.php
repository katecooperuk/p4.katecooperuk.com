<?php if($user): 
		
		# Send to Profile Page
		Router::redirect('/users/profile');
	?>

	<?php else: ?>

		<div id="welcome">
			Welcome to the ChatterBox Book Club<br>
			Login if you already have an account<br>
			or sign up to create an account and<br>
			join in the literary discussion.
		</div>
	
	<?php endif; ?>