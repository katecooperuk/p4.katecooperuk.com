<div class="formcontent">

	<form name='bookForm' method='POST' action='/books/p_addBook' onsubmit='return validateFormBook();'>
	
		Book Title<br>
		<input type='text' name='title'>
		<br><br>
		
		Author<br>
		<input type='text' name='author'>
		<br><br>
		
		ISBN<br>
		<input type='text' maxlength="13" name='isbn'>
		<div id="prompt">Please include ISBN to enable Google Preview link (10 or 13 digit)</div>
		<br><br>
		
	<input type='submit' value='Add Book'>
				
	</form>
	
</div>