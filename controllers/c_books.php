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
	    
	    # Dump out the results of POST to see what the form submitted
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }
    
    
    public function listBook() {
        echo "This is the book list page";
    }
}