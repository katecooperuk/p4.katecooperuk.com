<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    /*-------------------------------------------------------------------------------------------------
	Signup Function
	-------------------------------------------------------------------------------------------------*/
    
    public function signup($error = NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";

        # Pass data to the view
		$this->template->content->error = $error;
        
        # Render the view (localhost/users/signup)
        echo $this->template;
    }

	/*-------------------------------------------------------------------------------------------------
	Process Signup Function
	-------------------------------------------------------------------------------------------------*/

    public function p_signup() {
    
    	# Sanitize Data Entry
    	$_POST = DB::instance(DB_NAME)->sanitize($_POST);
    	
    	# Set up Email / Password Query
    	$q = "SELECT * FROM users WHERE email = '".$_POST['email']."'"; 
    	
    	# Query Database
    	$user_exists = DB::instance(DB_NAME)->select_rows($q);
    	
    		# Check if email exists in database
    		if(!empty($user_exists)){
    		
    			# Send to Login page
    			# Pass error message along - to the login page - indicate 'user-exists' error
	    		Router::redirect('/users/login/user-exists');
    		}
    		
    		# Check if fields are blank
            elseif(empty($_POST['email'])||empty($_POST['password'])||empty($_POST['first_name'])||empty($_POST['last_name'])) {
                        
            # Error Alert - All fields should be filled - users/signup
            Router::redirect('/users/signup/blank-fields'); 
            
            }
    		
    		else {

				# More data we want stored with the user
				$_POST['created']  = Time::now();
				$_POST['modified'] = Time::now();

				# Encrypt the password  
				$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

				# Create an encrypted token via their email address and a random string
				$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

				# Insert this user into the database 
				$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

				# Send to the login page
				Router::redirect('/users/login');
		}
		 
    }

	/*-------------------------------------------------------------------------------------------------
	Login Function
	-------------------------------------------------------------------------------------------------*/
	
	public function login($error = NULL) {

		# Set up the view
		$this->template->content = View::instance("v_users_login");
		$this->template->title   = "Login";

		# Pass data to the view
		$this->template->content->error = $error;

		# Render the view
		echo $this->template;
	}
	
	/*-------------------------------------------------------------------------------------------------
	Process Login Function
	-------------------------------------------------------------------------------------------------*/
	
	public function p_login() {

    	# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token 
        	FROM users 
			WHERE email = '".$_POST['email']."' 
			AND password = '".$_POST['password']."'";

		# If there was, this will return the token
		$token = DB::instance(DB_NAME)->select_field($q);

		# If we didn't find a matching token in the database, it means login failed
		if(!$token) {

        	# Note the addition of the parameter "error"
			Router::redirect("/users/login/invalid-login"); 
		} 
    
		# Login passed
		else {

			# Store token in cookie: (name, value, expiration, path)
        	setcookie("token", $token, strtotime('+1 year'), '/');

			# Send them to the main page - or whever you want them to go
			Router::redirect("/");
		}
	
	}
	
	/*-------------------------------------------------------------------------------------------------
	Profile Function
	-------------------------------------------------------------------------------------------------*/
	public function profile() {

    	# If user is blank, they're not logged in; redirect them to the login page
		if(!$this->user) {
        	Router::redirect('/users/login');
		}

		# If they weren't redirected away, continue:

		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile of".$this->user->first_name;

		# Render template
		echo $this->template;
	}
	
	/*-------------------------------------------------------------------------------------------------
	Logout Function
	-------------------------------------------------------------------------------------------------*/

    public function logout() {
    
    	 # Generate and save a new token for next login
		 $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

		 # Create the data array we'll use with the update method
		 # In this case, we're only updating one field, so our array only has one entry
		 $data = Array("token" => $new_token);

		 # Do the update
		 DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

		 # Delete their token cookie by setting it to a date in the past - effectively logging them out
		 setcookie("token", "", strtotime('-1 year'), '/');

		 # Send them back to the main index.
		 Router::redirect("/");
	}

} # EOC