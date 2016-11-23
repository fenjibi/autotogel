<?php 
   class Test extends CI_Controller {
  
      public function index() {
		$this->load->view('test');
		// echo "This is default function."; 
      } 
  
      public function hello() { 
         echo "This is hello function."; 
      } 
   } 
?>