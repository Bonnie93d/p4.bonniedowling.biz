<?php


class items_controller extends base_controller{

        public function __construct(){
                parent::__construct();

                #Verify user is logged in, if not send to login.
                if(!$this->user){
                        Router::redirect("/users/login");
                }
        }
        
#ADD NEW ITEM____________________________________________________
        
        
        public function add(){ 
	        	 		
	 		$client_files_body = Array(
	        '/js/datePicker.js',
	        '/js/ebayCalc.js',
	        '/css/calendar.css'
	        );
	
	    # Use load_client_files to generate the links from the above array
	    
	        $this ->template -> content = View::instance('v_item_new');
		    $this ->template -> title = "Add New Item";
		    $this->template->client_files_body = Utils::load_client_files($client_files_body); 
		    echo $this ->template;
		    
		    
	    }

        
               
        public function p_add(){
        	#Associate this post with this user
            $_POST['user_id'] = $this->user->user_id;
            #Insert
            #We didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us.
            DB::instance(DB_NAME)->insert('items', $_POST);

            #Route back to posts
            //Router::redirect("/items/myItems");
                }
                
        

#MY ITEMS____________________________________________________
        public function myItems() {
				
				
	    
	    	
                # view
                $this->template->content = View::instance("v_items_myItems");
                $this->template->title   = "My Items";
               

                #query to get all of the users except the person logged in
                $q = "SELECT * FROM items WHERE user_id = '".$this->user->user_id."'";

                #set the results in array variable 
                $users = DB::instance(DB_NAME)->select_rows($q);
               

                #Pass data (users and connections) to the view
                $this->template->content->users = $users;
                //$this->template->content->connections = $connections;

                              
                #Render the view
                echo $this->template;
                
        }
        
#EDIT ITEM____________________________________________________  

	

               
        public function p_update(){

        	$q = "UPDATE items 
				SET itemCost ='".$_POST['itemCost']."',
				salePrice ='".$_POST['salePrice']."',
				actualSH = '".$_POST['actualSH']."',
				chargedSH = '".$_POST['chargedSH']."',
				powerSeller = '".$_POST['powerSeller']."',
				format = '".$_POST['format']."',
				category ='".$_POST['category']."',
				subBus ='".$_POST['subBus']."',
				subCamera ='".$_POST['subCamera']."',
				subComputer = '".$_POST['subComputer']."',
				motors = '".$_POST['motors']."',
				motorsSeller = '".$_POST['motorsSeller']."',
				RE = '".$_POST['RE']."',
				duration = '".$_POST['duration']."',
				subVGames = '".$_POST['subVGames']."',
				gallery = '".$_POST['gallery']."',
				listingDesigner = '".$_POST['listingDesigner']."',
				subtitle = '".$_POST['subtitle']."',
				valuePack = '".$_POST['valuePack']."',
				free = '".$_POST['free']."',
				picture = '".$_POST['picture']."',
				pictureSer = '".$_POST['pictureSer']."',
				numPic = '".$_POST['numPic']."',
				bold = '".$_POST['bold']."',
				scheduleListings = '".$_POST['scheduleListings']."',
				reservePrice = '".$_POST['reservePrice']."',
				rPrice = '".$_POST['rPrice']."',
				international = '".$_POST['international']."',
				day30 = '".$_POST['day30']."',
				day10 = '".$_POST['day10']."',
				day21 = '".$_POST['day21']."',
				paymentMethod = '".$_POST['paymentMethod']."',
				paypalOptions = '".$_POST['paypalOptions']."',
				paypalInt = '".$_POST['paypalInt']."',
				customPer = '".$_POST['customPer']."',
				customFlat = '".$_POST['customFlat']."',
				insertFee = '".$_POST['insertFee']."',
				upgradeFees = '".$_POST['upgradeFees']."',
				finalFee = '".$_POST['finalFee']."',
				ebayTotal = '".$_POST['ebayTotal']."',
				paymentFees = '".$_POST['paymentFees']."',
				totalFees = '".$_POST['totalFees']."',
				netProfit = '".$_POST['netProfit']."',
				itemName = '".$_POST['itemName']."',
				saleDate = '".$_POST['saleDate']."',
				saleDate = '".$_POST['saleDate']."'
				WHERE item_id = '".$_POST['item_id']."'";	

            
            $update = DB::instance(DB_NAME)->query($q);
            
            #Route back to posts
            Router::redirect("/items/myItems");
                }
       
       
              
        public function editItem() {
               
			$client_files_body = Array(
	        '/js/datePicker.js',
	        '/js/ebayCalc.js',
	        '/js/itemsEdit.js',
	        '/css/calendar.css'
	        );

	       $this ->template -> content = View::instance('v_item_update');
		   $this ->template -> title = "Edit Item";
		   $this->template->client_files_body = Utils::load_client_files($client_files_body); 
		   
		   
		   echo $this ->template;
        }    
        
        public function p_getInfo(){
        
	        $q = "SELECT *
	        FROM items
	        WHERE item_id = '".$_POST['item_id']."'";
	        
	        $items = DB::instance(DB_NAME)->select_rows($q);
	        
	        foreach($items as $items){
				$arr[1]=$items['itemName'];
				$arr[2]=$items['day10'];
				$arr[3]=$items['day21'];
				$arr[4]=$items['day30'];
				$arr[5]=$items['actualSH'];
				$arr[6]=$items['bold'];					
				$arr[7]=$items['category'];
				$arr[8]=$items['chargedSH'];
				$arr[9]=$items['customFlat'];
				$arr[10]=$items['customPer'];
				$arr[11]=$items['duration'];					
				$arr[12]=$items['ebayTotal'];
				$arr[13]=$items['finalFee'];
				$arr[14]=$items['format'];
				$arr[15]=$items['free'];
				$arr[16]=$items['gallery'];
				$arr[17]=$items['insertFee'];
				$arr[18]=$items['international'];					
				$arr[19]=$items['itemCost'];
				$arr[20]=$items['itemName'];
				$arr[21]=$items['listDate'];
				$arr[22]=$items['listingDesigner'];
				$arr[23]=$items['motors'];					
				$arr[24]=$items['motorsSeller'];
				$arr[25]=$items['netProfit'];
				$arr[26]=$items['numPic'];
				$arr[27]=$items['paymentFees'];
				$arr[28]=$items['paymentMethod'];					
				$arr[29]=$items['paypalInt'];
				$arr[30]=$items['paypalOptions'];
				$arr[31]=$items['picture'];
				$arr[32]=$items['pictureSer'];
				$arr[33]=$items['powerSeller'];					
				$arr[34]=$items['RE'];
				$arr[35]=$items['reservePrice'];
				$arr[36]=$items['rPrice'];
				$arr[37]=$items['saleDate'];
				$arr[38]=$items['salePrice'];					
				$arr[39]=$items['scheduleListings'];
				$arr[40]=$items['subBus'];
				$arr[41]=$items['subCamera'];
				$arr[42]=$items['subComputer'];
				$arr[43]=$items['subtitle'];					
				$arr[44]=$items['subVGames'];
				$arr[45]=$items['totalFees'];
				$arr[46]=$items['upgradeFees'];
				$arr[47]=$items['valuePack'];
			}
			
			$arry = implode(', ',$arr);
			
			echo $arry;
		}
        
        

#DELETE Item____________________________________________________
        public function deletePost($item_id) {

            # Delete this connection
            $where_condition = 'WHERE item_id = '.$item_id.'';
            DB::instance(DB_NAME)->delete('items', $where_condition);

            # Send them back
            Router::redirect("/items/myItems");

        }        


}# end of the class