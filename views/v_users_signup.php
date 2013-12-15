<div class="formcontent">

	<form name='appForm' method='POST' action='/users/p_signup' onsubmit='return validateForm();'>

		First Name<br>
		<input type='text' name='first_name'>
		<br><br>
		
		Last Name<br>
		<input type='text' name='last_name'>
		<br><br>
		
		Email<br>
		<input type='text' name='email'>
		<br><br>
		
		Password<br>
		<input type='password' name='password'>
		<br><br>
		
		<input type='submit' value='Sign Up'>
			
			<?php if(isset($error) && $error == 'blank-fields'): ?>
				<div class='error'>
					All fields need to be completed
				</div>
			<?php elseif(isset($error) && $error == 'invalid-login'): ?>
				<div class='error'>
					Invalid Login, please try again
				</div>
			<?php endif; ?>
	</form>
</div>