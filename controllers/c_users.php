<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function signup() {

        # Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Sign Up";

        # Render template
            echo $this->template;

    }

    public function p_signup() {

    	# Insert this user into the database
		$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

		# For now, just confirm they've signed up - 
		# You should eventually make a proper View for this
		echo 'You\'re signed up';       
    }

} # eoc
