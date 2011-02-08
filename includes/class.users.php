<?php
class user {	
	public $me;
	public $user_id;
	public $fb_user_id;
	public $name;
	public $email;
	public $fb_picture;
	public $fb_friends;
	public $fb_access_token;
	public $fb_dirty;
	
	public function __construct() { 
		$fb = fb_singleton::singleton();
        try {
       		$me = $fb->fb->api('/me');
       		$user_id = $fb->fb->getUser();
        } catch (Exception $e) {
        	//Log the error, re-login
        }
    }     
    
	function refresh_data() {
        if($this->me && $this->user_id) {
        	$this->user_id = $user_id;
        	$this->name = $me['name'];
        	$this->email = $me['email'];
        	$this->fb_picture = $me['picture'];
        	foreach ($friends as $key => $data) {
        		$this->fb_friends[] = $data['id'];
        	}
        }
        return $this->put();		
	}
	
	function put() {
		return false;
	}
}