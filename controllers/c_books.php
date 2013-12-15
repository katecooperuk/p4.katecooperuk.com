<?php
class books_controller extends base_controller {
    
   public function __construct() {
        parent::__construct();
        
        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
                      
            # Send User to login page
			Router::redirect('/users/login');
        }
    }
    
	/*-------------------------------------------------------------------------------------------------
	View All Books
	-------------------------------------------------------------------------------------------------*/
    
    public function index() {
	
	 	# Set up view
	 	$this->template->content = View::instance('v_books_index');
	 	$this->template->title   = "Book Shelf";
	 	
	 	# View within a view        
	 	$this->template->content->books_addBook = View::instance('v_books_addBook');
	 	
	 	# Set up Query
		$q = 'SELECT 
					books.title,
					books.author,
					books.isbn,
					books.created,
					users.first_name,
					users.last_name
				FROM books
				INNER JOIN users 
					ON books.user_id = users.user_id';
				
		# Run Query
		$books = DB::instance(DB_NAME)->select_rows($q);
	 	
	 	# Pass $books array to the view
		$this->template->content->books = $books;
        
        # Render the view (localhost/books)
        echo $this->template;
	}
    
    /*-------------------------------------------------------------------------------------------------
	Add Book Function
	-------------------------------------------------------------------------------------------------*/

	public function addBook($error = NULL) {
       
       # Setup view
        $this->template->content = View::instance('v_books_addBook');
        $this->template->title   = "Add Book";

        # Pass data to the view
		$this->template->content->error = $error;
        
        # Render the view (localhost/books/addBook)
        echo $this->template;
       
    }
    
    /*-------------------------------------------------------------------------------------------------
	Process Add Book Function
	-------------------------------------------------------------------------------------------------*/

    public function p_addBook() {
    
    	# Sanitize Data Entry
    	$_POST = DB::instance(DB_NAME)->sanitize($_POST);
    	
    	# Set up Book query
    	$q = "SELECT * FROM books WHERE title = '".$_POST['title']."'"; 
    	
    	# Query Database
    	$book_exists = DB::instance(DB_NAME)->select_rows($q);
    	
    		# Check if book exists in database
    		if(!empty($book_exists)){
    		
    			# Send to Login page
    			# Pass error message along - to the login page - indicate 'user-exists' error
	    		Router::redirect('/books/addBook/book-exists');
    		}
    		
    		else {
	    
			    # More data we want stored with the book
			    $_POST['user_id'] 	= $this->user->user_id;
				$_POST['created']  = Time::now();
				$_POST['modified'] = Time::now();
			    
			    # Insert this book into the database
			    $book_id = DB::instance(DB_NAME)->insert('books', $_POST);
			    
			    
			    # Send User to books/index
		        Router::redirect('/books/');
			}
    }
    
 } #EOC