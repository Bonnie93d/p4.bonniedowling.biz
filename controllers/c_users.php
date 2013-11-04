<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        echo "users_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        $this ->template -> content = View::instance('v_users_signup');
	    $this ->template -> title = "New User Registration";
	    $client_files_head = Array('/css/user_signup.css');
		$this ->template -> client_files_head = Utils::load_client_files($client_files_head);
	    $this ->template -> client_files_body = "";
	    echo $this ->template;
	    
    }
    
        public function p_signup() {

        # Dump out the results of POST to see what the form submitted
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';   
        
        $errors = NULL;
        
        if(empty($_POST['first_name'])){
	    	echo "First name is required";
	    	$errors = TRUE;
    	}
    	
    	if(empty($_POST['last_name'])){
	    	echo "Last name is required";
	    	$errors = TRUE;
    	}
    	
    	if(empty($_POST['password'])){
	    	echo "Password is required";
	    	$errors = TRUE;
    	}
    	
    	if(empty($_POST['email'])){
	    	echo "Email is required";
	    	$errors = TRUE;
    	}
    	if(!empty($_POST['email'])){
	    	if(!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL )){
		    	echo "Invalid email format";
		    	$errors = TRUE;
	    	}
    	}  
    	
    	if ($errors == NULL){
    		echo "no errors";
    	}
    	if ($errors == TRUE){
    		echo "errors";
    	}
    	
    	
 
   
    	     
    }
    		    
        
    public function pp_signup() {
    	#testing data entered
    	$errors = NULL;
    	$passblank = NULL;
    	
    	#Check if first name is blank, if so produce error
    	if(empty($_POST['first_name'])){
	    	$first_error = "First name is required";
	    	$errors = TRUE;
    	}
    	else{
	    	$first_error = "";
    	}
    	
    	#Check if last  name is blank, if so produce error
    	if(empty($_POST['last_name'])){
	    	$last_error = "Last name is required";
	    	$errors = TRUE;
    	}
    	else{
	    	$last_error = "";
    	}
    	
    	#Check if email is blank, if so produce error
    	if(empty($_POST['email'])){
	    	$email_error = "Email is required";
	    	$errors = TRUE;
    	}
    	else{
    	
    	#Check if email is valid, if so produce error
	    	if(!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL )){
		    	$email_error = "Invalid email format";
		    	$errors = TRUE;
	    	}
			else{
	    		$email_error = "";
				}
			}
    	
    	#Check if password is blank, if so produce error
    	if(empty($_POST['password'])){
	    	$password_error = "Password is required";
	    	$errors = TRUE;
	    	$passblank = TRUE;
    	}
    	else{
	    	$password_error = "";
	    	$pass1 = $_POST['password'];
    	}
    	
    	#Check if confirm password is blank, if so produce error
    	if(empty($_POST['password2'])){
	    	$password2_error = "Password confirmation is required";
	    	$errors = TRUE;
	    	$passblank = TRUE;
    	}
    	else{
	    	$password_error = "";
	    	$pass2 = $_POST['password2'];
    	}
    	
    	#Check if Password and confirm password match, if so continue, if not error with blank pw fields
		if ($passblank == NULL){
			if($pass1 === $pass2){
				$password_error = "";
				$pass1 = $_POST['password'];
				$pass2 = $_POST['password2'];
			}
			else{
				$errors = TRUE;
				$password_error = "Passwords don't match, try again";
				$pass1 = "";
				$pass2 = "";
			}
			
		}  
		
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
	    	//GO SOMEWHERE, PRODUCE ERROR MESSAGE
    	}	    	

    	## Relaod page with errors and entered data already in form fields
    	if ($errors == TRUE){
	    	$this ->template -> content = View::instance('v_users_signup_errors');
		    $this ->template -> title = "New User Registration";
		    $client_files_head = Array('/css/user_signup.css');
			$this ->template -> client_files_head = Utils::load_client_files($client_files_head);
		    $this ->template -> client_files_body = "";
		    $this ->template -> content ->first_name = $_POST['first_name'];
		    $this ->template -> content ->first_error = $first_error;
		    $this ->template -> content ->last_name = $_POST['last_name'];
		    $this ->template -> content ->last_error = $last_error;
		    $this ->template -> content ->password = $pass1;
		    $this ->template -> content ->password_error = $password_error;
		    $this ->template -> content ->password2 = $pass2;
		    $this ->template -> content ->password2_error = $password2_error;
		    $this ->template -> content ->email = $_POST['email'];
		    $this ->template -> content ->email_error = $email_error;
		    echo $this ->template;
    	
    	}
		else{
		
			# remove uneeded fields and cleaning input data
			unset($_POST['password2']);
			unset($_POST['register']);
			$_POST = DB::instance(DB_NAME)->sanitize($_POST);
			
			# More data we want stored with the user
		    $_POST['created']  = Time::now();
		    $_POST['modified'] = Time::now();
		    $_POST['last_login'] = Time::now();
		    $_POST['timezone'] = date_default_timezone_get();
		    
			# Encrypt the password  
		    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            
		
		    # Create an encrypted token via their email address and a random string
		    $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 
		    
		    # Insert this user into the database 
		    $user_id = DB::instance(DB_NAME)->insert("users", $_POST);
								
		    # Set cooke to logged in as username is created
		    setcookie("token", $token, strtotime('+1 year'), '/');

			# Send them to the main page - or whever you want them to go
			//Router::redirect("/");
		    echo "all fields valid";
		    echo 'You\'re signed up';

			}	
			
	}


    
    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

	public function profile($user_name = NULL) {
	
	
	    # Pass information to the view instance
	    
	    $this ->template -> content = View::instance('v_users_profile');
		$this ->template -> content ->user_name = $user_name;
	    $this ->template -> title = "Profile";
	    $this ->template -> client_files_head = "";
	    $this ->template -> client_files_body = "";
	    echo $this ->template;
	    
	
	}

} # end of the class