<?php
class posts_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
        
            # Send User to login page
			Router::redirect('/users/login');
        }
    }

	/*-------------------------------------------------------------------------------------------------
	Display New Post Form
	-------------------------------------------------------------------------------------------------*/
	
    public function add() {

        # Setup view
        $this->template->content = View::instance('v_posts_add');
        $this->template->title   = "Add Post";

        # Render template
        echo $this->template;
    }
    
    /*-------------------------------------------------------------------------------------------------
	Process New Posts
	-------------------------------------------------------------------------------------------------*/

    public function p_add() {

        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('posts', $_POST);

        # Redirect user back to posts page
        Router::redirect('/posts/');
    }
    
    /*-------------------------------------------------------------------------------------------------
	View All Posts
	-------------------------------------------------------------------------------------------------*/

	public function index() {
	
	 	# Set up view
	 	$this->template->content = View::instance('v_posts_index');
		
		# Set up Query
		$q = 'SELECT 
					posts.content,
					posts.created,
					posts.user_id AS post_user_id,
					users_users.user_id AS follower_id,
					users.first_name,
					users.last_name,
					users.avatar
				FROM posts
				INNER JOIN users_users 
					ON posts.user_id = users_users.user_id_followed
				INNER JOIN users 
					ON posts.user_id = users.user_id
				WHERE users_users.user_id = '.$this->user->user_id.'
				ORDER BY post_id DESC';
							
		# Run Query
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
	}
	
	/*-------------------------------------------------------------------------------------------------
	View Users
	-------------------------------------------------------------------------------------------------*/
	
	public function users() {

    	# Set up the View
		$this->template->content = View::instance("v_posts_users");
		$this->template->title   = "Users";

		# Build the query to get all the users
		$q = "SELECT *
        	FROM users";

			# Execute the query to get all the users. 
			# Store the result array in the variable $users
			$users = DB::instance(DB_NAME)->select_rows($q);

			# Build the query to figure out what connections does this user already have? 
			# I.e. who are they following
			$q = "SELECT * 
				FROM users_users
				WHERE user_id = ".$this->user->user_id;

			# Execute this query with the select_array method
			# select_array will return our results in an array and use the "users_id_followed" field as the index.
			# This will come in handy when we get to the view
			# Store our results (an array) in the variable $connections
			$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

			# Pass data (users and connections) to the view
			$this->template->content->users       = $users;
			$this->template->content->connections = $connections;

			# Render the view
			echo $this->template;
		}
		
	/*-------------------------------------------------------------------------------------------------
	Follow - creates row in users_users table representing one user is following another
	-------------------------------------------------------------------------------------------------*/
	
	public function follow($user_id_followed) {

    	# Prepare the data array to be inserted
		$data = Array(
        	"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
        );

		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);

		# Send them back
		Router::redirect("/posts/users");
	}

	/*-------------------------------------------------------------------------------------------------
	UnFollow - removes specified row in users_users table, removing 'follow' between users
	-------------------------------------------------------------------------------------------------*/
    
    public function unfollow($user_id_followed) {

    	# Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);

		# Send them back
		Router::redirect("/posts/users");
	}
    
} # EOC