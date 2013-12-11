<?php
class books_controller extends base_controller {
    
   public function __construct() {
        parent::__construct();
        echo "books_controller construct called<br><br>";
    }
    
    public function index() {
        echo "This is the index page";
    }

	public function add_book() {
        echo "This is add book page";
    }

    public function list_book() {
        echo "This is the book list page";
    }
}