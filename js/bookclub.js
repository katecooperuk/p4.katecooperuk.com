/*-------------------------------------------------------------------------------------------------
	Form Validation - Email & Blank Fields
-------------------------------------------------------------------------------------------------*/

function validateForm() {
	
	var x=document.forms["appForm"]["email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
		
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
  
		alert("Not a valid e-mail address");
		return false;
		}

	var x=document.forms["appForm"]["first_name"].value;
	if (x==null || x=="") {
		alert("First name must be filled out");
		return false;
	}
	
	var x=document.forms["appForm"]["last_name"].value;
	if (x==null || x=="") {
		alert("Last name must be filled out");
		return false;
	}
	
	var x=document.forms["appForm"]["password"].value;
	if (x==null || x=="") {
		alert("Password must be completed");
		return false;
	}
}


/*-------------------------------------------------------------------------------------------------
	Form Numbers only in ISBN field
-------------------------------------------------------------------------------------------------*/

function validateFormBook() {
	
	var x=document.forms["bookForm"]["title"].value;
	if (x==null || x=="") {
		alert("Title must be completed");
		return false;
	}
	
	var x=document.forms["bookForm"]["author"].value;
	if (x==null || x=="") {
		alert("Author's name must be completed");
		return false;
	}
	
	var x=document.forms["bookForm"]["isbn"].value;
	if (x==null || x=="") {
		alert("ISBN must be completed to enable Google Preview link");
		return false;
	}
	
	var x=document.forms["bookForm"]["isbn"].value;
	if(isNaN(x)) {
		alert("ISBN must be numbers only");
		return false;
	}
}
