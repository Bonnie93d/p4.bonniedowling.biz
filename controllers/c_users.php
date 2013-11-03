<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        #echo "users_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

	public function profile($user_name) {
	
	
	    # Pass information to the view instance


	    
	    $this ->template -> content = View::instance('v_users_profile');
		$this ->template -> content ->user_name = $user_name;
	    $this ->template -> title = "Profile";
	    echo $this ->template;
	    
	
	}

} # end of the class