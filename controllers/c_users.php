<?php


class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();

    } 

    public function index() {
        echo "This is the index page";
    }

#SIGNUP ____________________________________________________ 
    public function signup() {
    if($this->user){
	 		Router::redirect("/");
 		}
 		else{
 		
 		$client_files_body = Array(
        '/js/userSignUp.js'
        );

    # Use load_client_files to generate the links from the above array
    
    	//$this->template->client_files_body = Utils::load_client_files($client_files_body); 
        $this ->template -> content = View::instance('v_users_signup');
	    $this ->template -> title = "New User Registration";
	    $this->template->client_files_body = Utils::load_client_files($client_files_body); 
	    echo $this ->template;
	    }
	    
    }
    		   
    		   
	public function p_signup(){
    	#testing data entered
    	$errors = NULL;
    	$passblank = NULL;
    	
    	# remove uneeded fields and cleaning input data
		unset($_POST['password2']);
		unset($_POST['register']);
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
			
		# More data we want stored with the user
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['last_login'] = Time::now();
		$_POST['timezone'] = date_default_timezone_get();
		$_POST['profile_image'] = "default.jpg";
		    
		# Encrypt the password  
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            
		
		# Create an encrypted token via their email address and a random string
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 
		    
		# Insert this user into the database 
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		
		Router::redirect("/users/login");

	}	
    		   
    		     

 #LOGIN  ____________________________________________________ 
 
 	public function login() {
 		if($this->user){
	 		Router::redirect("/");
 		}
 		else{
        $this ->template -> content = View::instance('v_users_login');
	    $this ->template -> title = "Member Login";
	    $this ->template -> client_files_body = "";
	    echo $this ->template;
	    }
	    
    }

    public function p_login() {
    	
    	#Sanitizing data entered
   		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
   		
   		
    	#testing data entered
    	$errors = NULL;
    	
    	#Check if email is blank, if so produce error
    	if(empty($_POST['email'])){
	    	$login_error = "**Please enter your email and password**";
	    	$errors = TRUE;
    	}
    	else{
    	
    	#Check if email is valid, if so produce error
	    	if(!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL )){
		    	$login_error = "**Please enter a valid email address**";
		    	$errors = TRUE;
	    	}
			else{
	    		$login_error = "";
				}
			}
    	
    	#Check if password is blank, if so produce error
    	if(empty($_POST['password'])){
	    	$login_error = "**Please enter a valid email address**";
	    	$errors = TRUE;
    	}
    	else{
	    	$login_error = "";
    	}
    	
    	$pass = $_POST['password'];
    	
    	#check database for login if no errors exist in entered data
    	if ($errors == NULL){    	
			# Hash submitted password so we can compare it against one in the db
			$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
			# Search the db for this email and password
			# Retrieve the token if it's available
			$q = "SELECT token 
	        	FROM users 
				WHERE email = '".$_POST['email']."' 
				AND password = '".$_POST['password']."'";
	
			$token = DB::instance(DB_NAME)->select_field($q);
	
			# If we didn't find a matching token in the database, it means login failed
			if(!$token) {
				$login_error = "**Invalid email or password.Please try again.**";
			    $errors = TRUE;
			}
			else {
			#update last login time
			$_POST['last_login'] = Time::now();
			$qq = "UPDATE users 
				SET last_login = '".$_POST['last_login']."' 
				WHERE email = '".$_POST['email']."'";	
            $update = DB::instance(DB_NAME)->query($qq);
            #set cookie
            setcookie("token", $token, strtotime('+1 year'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/posts/");
	
			}
		}

		## Relaod page with errors and entered data already in form fields
    	if ($errors == TRUE){
	    	$this ->template -> content = View::instance('v_users_login');
		    $this ->template -> title = "Member Login";
		    $this ->template -> client_files_body = "";
		    $this ->template -> content ->login_error = $login_error;
		    $this ->template -> content ->password = $pass;
		    $this ->template -> content ->email = $_POST['email'];
		    echo $this ->template;
    	
    	}
		else{
            setcookie("token", $token, strtotime('+1 year'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/items/add");

			}	
			
	}


#LOG OUT  ____________________________________________________ 
 
    public function logout() {
       //If user is blank, they are not logged in. Redirect them to the login page
        if (!$this->user){
            Router::redirect('/users/login');
        }

        
		$new_token = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 
		$data = Array('token' => $new_token);
		
		DB::instance(DB_NAME)->update("users",$data, 'WHERE user_id ='.$this->user->user_id);
		setcookie("token", "", strtotime('-1 week'), '/');

        Router::redirect("/users/login");
    }



#TEST Email ____________________________________________________ 
		
		public function p_testEmail(){
			if(!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL )){
				echo 'false';
			}
			else{
				$emailTest = 'true';
				#Check if email address entered exists in database
				#SQL query for ID# associated with email entered
				$q = "SELECT user_id
				FROM users
				WHERE email = '".$_POST['email']."'
				";
	
				$test_email = DB::instance(DB_NAME)->select_field($q);
		
				# set email test variable to T/F
				if ($test_email >0){
					$new_email = NULL;
				}
				else {
					$new_email = TRUE;
				} 
    	
				if ($new_email == NULL){
					$emailTest = 'false2';
				}	    	

				echo $emailTest;
			}
	}
    	 				

} # end of the class