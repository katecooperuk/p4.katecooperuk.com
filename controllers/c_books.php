<?php
class books_controller extends base_controller {
    
   public function __construct() {
        parent::__construct();
        echo "books_controller construct called<br><br>";
    }
    
    public function index() {
        echo "This is the add books page";
    }
}