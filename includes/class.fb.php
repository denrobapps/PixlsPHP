<?php
class fb_singleton extends Facebook
{
	private static $instance;
	
	protected $session;
	
	public $fb;
	
	public function __construct() { 
        $this->fb = parent::__construct(array(
        	'appId' => FACEBOOK_APP_ID,
        	'secret' => FACEBOOK_SECRET_KEY,
        	'cookie' => true
        )); 
    } 
    
    public static function singleton() 
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }
    
    public function ensure_login() {
	    if ($this->fb->getSession()) {
		  echo '<a href="' . $this->fb->getLogoutUrl() . '">Logout</a>';
		} else {
		  echo '<a href="' . $this->fb->getLoginUrl() . '">Login</a>';
		}    	
    }
}