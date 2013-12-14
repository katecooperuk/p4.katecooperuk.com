<?php
class books_controller extends base_controller {
    
   public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        echo "This is the index page";
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
	    
	    # Insert this book into the database
	    $book_id = DB::instance(DB_NAME)->insert('books', $_POST);
	    
	    # confirm book added
        echo 'you added a book';
    }
    
    
    public function listBook() {
        echo "This is the book list page";
    }
}