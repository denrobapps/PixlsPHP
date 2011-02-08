<?php
class app {
	public $facebook;
	public $user;
	public $pixls;

	public function init_facebook() {
		$this->facebook = fb_singleton::singleton();
		$this->facebook->ensure_login();
	}
	
	public function init_user() {
		$this->user = new user();
		$this->user->refresh_data();
	}
	
	public function init_pixls() {
		
	}
}