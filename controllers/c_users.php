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
        $this ->template -> content = View::instance('v_users_signup');
	    $this ->template -> title = "New User Registration";
	    $this ->template -> client_files_body = "";
	    echo $this ->template;
	    }
	    
    }
    		      
    
    public function p_signup() {
    	#testing data entered
    	$errors = NULL;
    	$passblank = NULL;
    	
    	#Check if first name is blank, if so produce error
    	if(empty($_POST['first_name'])){
	    	$first_error = "**First name is required**";
	    	$errors = TRUE;
    	}
    	else{
	    	$first_error = "";
    	}
    	
    	#Check if last  name is blank, if so produce error
    	if(empty($_POST['last_name'])){
	    	$last_error = "**Last name is required**";
	    	$errors = TRUE;
    	}
    	else{
	    	$last_error = "";
    	}
    	
    	#Check if email is blank, if so produce error
    	if(empty($_POST['email'])){
	    	$email_error = "**Email is required**";
	    	$errors = TRUE;
    	}
    	else{
    	
    	#Check if email is valid, if so produce error
	    	if(!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL )){
		    	$email_error = "**Invalid email format**";
		    	$errors = TRUE;
	    	}
			else{
	    		$email_error = "";
				}
			}
    	
    	#Check if password is blank, if so produce error
    	if(empty($_POST['password'])){
	    	$password_error = "**Password is required**";
	    	$errors = TRUE;
	    	$passblank = TRUE;
    	}
    	else{
	    	$password_error = "";
	    	$pass1 = $_POST['password'];
    	}
    	
    	#Check if confirm password is blank, if so produce error
    	if(empty($_POST['password2'])){
	    	$password2_error = "**Password confirmation is required**";
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
				$password_error = "**Passwords don't match, try again**";
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
	    	$email_error = "**Email already registered, please login to existing account**";
	    	$errors = TRUE;
    	}	    	

    	## Relaod page with errors and entered data already in form fields
    	if ($errors == TRUE){
	    	$this ->template -> content = View::instance('v_users_signup');
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
		    $_POST['profile_image'] = "default.jpg";
		    
			# Encrypt the password  
		    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            
		
		    # Create an encrypted token via their email address and a random string
		    $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 
		    
		    # Insert this user into the database 
		    $user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		    
		    
		    $q = "SELECT user_id
			FROM users
			WHERE email = '".$_POST['email']."'
			";
			
			$id = DB::instance(DB_NAME)->select_field($q);
			
			unset($_POST);
		    $_POST['created']  = Time::now();
		    $_POST['user_id'] = $id;
		    $_POST['user_id_followed'] = $id;
		    
		    $follow = DB::instance(DB_NAME)->insert("users_users", $_POST);
			
			
			# Send them to the main page - or whever you want them to go
			//Router::redirect("/");
		    //echo "all fields valid";
		    //echo 'You\'re signed up';
		    Router::redirect("/users/login");

			}	
			
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
            Router::redirect("/");

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

#PROFILE UPDATE ____________________________________________________ 
 
		public function profile($error = NULL) {
	
	        //If user is blank, they are not logged in. Redirect them to the login page
	        if (!$this->user){
	            Router::redirect('/users/login');
	        }
	
	        //If they were not redirected away, continue:
	
	        //Set up the View
	        $this->template->content = View::instance('v_users_profile');
	        $this->template->title = "Profile of ".$this->user->first_name . " " . $this->user->last_name; 
	        $this->template->content->user_name = $user_name;
	
	        // pass errors, if any
	        $this->template->content->error = $error;
	        
	        //Display the view
	        echo $this->template;
	
	    }
	    
	    public function p_profile() {
    	#testing data entered
    	$errors = NULL;
    	$passblank = NULL;
    	
    	#Check if first name is blank, if so produce error
    	if(empty($_POST['first_name'])){
	    	$first_error = "**First name is required**";
	    	$errors = TRUE;
    	}
    	else{
	    	$first_error = "";
    	}
    	
    	#Check if last  name is blank, if so produce error
    	if(empty($_POST['last_name'])){
	    	$last_error = "**Last name is required**";
	    	$errors = TRUE;
    	}
    	else{
	    	$last_error = "";
    	}
    	
    	#Check if email is blank, if so produce error
    	if(empty($_POST['email'])){
	    	$email_error = "**Email is required**";
	    	$errors = TRUE;
    	}
    	else{
    	
    	#Check if email is valid, if so produce error
	    	if(!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL )){
		    	$email_error = "**Invalid email format**";
		    	$errors = TRUE;
	    	}
			else{
	    		$email_error = "";
				}
			}
    	
    	#Check if password is blank, if so produce error
    	if(empty($_POST['password'])){
	    	$password_error = "";
	    	$passblank = TRUE;
	    	$up_pw = NULL; 
    	}
    	else{
	    	$password_error = "";
	    	$pass1 = $_POST['password'];
    	}
    	
    	#Check if confirm password is blank, if so produce error
    	if(empty($_POST['password2'])){
	    	$password2_error = "";
	    	$passblank = TRUE;
	    	$up_pw = NULL; 
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
				$up_pw =  sha1(PASSWORD_SALT.$pass1); 
			}
			else{
				$errors = TRUE;
				$password_error = "**Passwords don't match, try again**";
				$pass1 = "";
				$pass2 = "";
			}
			
		}  
		
		#Check if email address entered exists in database
		#SQL query for ID# associated with email entered
		$q = "SELECT user_id
	    FROM users
	    WHERE email = '".$_POST['email']."' && user_id != '".$_POST['user_id']."'
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
	    	$email_error = "**Email already registered, please login to existing account**";
	    	$errors = TRUE;
    	}	    	

    	## Relaod page with errors and entered data already in form fields
    	if ($errors == TRUE){
	    	$this->template->content = View::instance('v_users_profile');
	        $this->template->title = "Profile of ".$this->user->first_name . " " . $this->user->last_name; 
	        $this->template->content->user_name = $user_name;
		    $this ->template -> client_files_body = "";
		    $this ->template -> content ->first_error = $first_error;
		    $this ->template -> content ->last_error = $last_error;
		    $this ->template -> content ->password_error = $password_error;
		    $this ->template -> content ->password2_error = $password2_error;
		    $this ->template -> content ->email_error = $email_error;
		    echo $this ->template;
    	
    	}
		else{
		
			# cleaning input data

			$_POST = DB::instance(DB_NAME)->sanitize($_POST);
			
			# More data we want stored with the user

		    $modified = Time::now();
		    		    
			# Encrypt the password  
		    $up_pw = sha1(PASSWORD_SALT.$up_pw);            
		
		    
		    if ($up_pw ==  NULL){

		    $qq = "UPDATE users 
						SET first_name = '".$_POST['first_name']."',
						last_name = '".$_POST['last_name']."',
						email = '".$_POST['email']."',
						modified = '".$modified."'
						
						WHERE user_id = '".$_POST['user_id']."'";	
			$update = DB::instance(DB_NAME)->query($qq); 
			}
			else{
					    $qq = "UPDATE users 
						SET first_name = '".$_POST['first_name']."',
						last_name = '".$_POST['last_name']."',
						email = '".$_POST['email']."',
						modified = '".$modified."',
						password = '".$up_pw."'
						WHERE user_id = '".$_POST['user_id']."'";	
			$update = DB::instance(DB_NAME)->query($qq); 
				
			}

			$up_status = "Upload Complete! ";
		    
		    
		    
		    # Insert this user into the database 
			# Send them to the main page - or whever you want them to go

		    Router::redirect("/posts/");

			}	
			
	}
    
	    public function im_profile() {
	
		# Dump out the results of POST to see what the form submitted
        
		//Сheck for file

		if((!empty($_FILES["uploaded_file"]))) {
			//Check the file is JPG 
		  $filename = basename($_FILES['uploaded_file']['name']);
		  $filename = strtolower($filename);
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  
		  $filename = $_POST['i_name'].".jpg";
		  
		  if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") &&
			    ($_FILES["uploaded_file"]["size"] < 10485760)){
			    
				    #folder the photos will be saved in
				      $save_location = APP_PATH.'/libraries/profile_images/'.$filename;
				      
				      #Move the photo
				    if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$save_location))) {
				      
						$img = imagecreatefromjpeg($save_location);
						$wid = imagesx($img);
						$hght = imagesy($img);
						
						#resize
						$x = imagecreatetruecolor(200, 200);
						
						imagecopyresampled($x, $img, 0, 0, 0, 0, 200, 200, $wid, $hght);
						
						#update saved file
						imagejpeg($x, $save_location);  
						
						#update DB with filename
						$qq = "UPDATE users 
						SET profile_image = '".$filename."' 
						WHERE email = '".$_POST['email']."'";	
						$update = DB::instance(DB_NAME)->query($qq); 


				     $up_status = "Upload Complete! ";

		        } 
		       		  } 
		       else {
		       $up_status = "Error! Please submit a valid JPEG file. ";

			   }
		} 
		
		#return to Profile page with message of success or failure
			$this->template->content = View::instance('v_users_profile');
	        $this->template->title = "Profile of ".$this->user->first_name . " " . $this->user->last_name; 
	        $this->template->content->user_name = $user_name;
		    $this ->template -> client_files_body = "";
		    
		    $this ->template -> content ->image_error = $up_status;
		    echo $this ->template;

			}
			
	   

} # end of the class