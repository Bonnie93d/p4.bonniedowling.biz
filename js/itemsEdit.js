 /*---------Listeners-----------*/

 		//$('button').click(testBut);
 		//$('input,select').change(calculate);
 		//document.getElementById('addBut').onclick=testBut;
 		//document.getElementById('sup').onkeyup=emailCheck;
 		window.onload=getInfo();
 		
                
                
 /*---------Check fields and enable/diable register button based inputs-----------*/
 		
 		var xx = 0;
					 	
		
		
		function GetUrlValue(VarSearch){
			var ur = document.URL;
			var SearchString = ur.substring(ur.length - 4);
			SearchString = SearchString.substring(0,2);
					return SearchString;
				}
			
		
		
			function getInfo(){
	 		var x = GetUrlValue();
	 		var str;
	 		var resultsArray;
	 		
	 		//document.getElementById('itemUpdate').style.display = 'none';
	 		
	 		
	 		$('#itemID').html(x);
		 	
		 	$.ajax({
			 		type: 'POST',
			 		url: '/items/p_getInfo',
			 		success: function(response) { 
				 		console.log(response);
				 		xx = response;
				 		resultsArray = xx.split(",");
				 		console.log(resultsArray[0]);
				 		document.getElementById('itemName').value=resultsArray[0];
				 		document.getElementById("10day").checked =(resultsArray[1] == ' true');
				 		document.getElementById("21day").checked =(resultsArray[2] == ' true');
				 		document.getElementById("30day").checked =(resultsArray[3] == ' true');
				 		document.getElementById('actualSH').value=resultsArray[4];
				 		document.getElementById("bold").checked=(resultsArray[5] == ' true');
				 		document.getElementById("category").selectedIndex=resultsArray[6];
				 		document.getElementById('chargedSH').value=resultsArray[7];
				 		document.getElementById('customFlat').value=resultsArray[8];
				 		document.getElementById('customPer').value=resultsArray[9];
				 		document.getElementById('duration').selectedIndex=resultsArray[10];
				 		document.getElementById('format').selectedIndex=resultsArray[13];
				 		document.getElementById("free").checked=(resultsArray[14] == ' true');
				 		document.getElementById("gallery").checked=(resultsArray[15] == ' true');
				 		document.getElementById("international").checked =(resultsArray[17] == ' true');
				 		document.getElementById('itemCost').value=resultsArray[18];
				 		document.getElementById('listDate').value=resultsArray[20];
				 		document.getElementById("listingDesigner").checked =(resultsArray[21] == ' true');
				 		document.getElementById('motors').selectedIndex=resultsArray[22];
				 		document.getElementById('motorsSeller').selectedIndex=resultsArray[23];
				 		document.getElementById('numPic').value=resultsArray[25];
				 		document.getElementById('paymentMethod').selectedIndex=resultsArray[27];
				 		document.getElementById("paypalInt").checked =(resultsArray[28] == ' true');
				 		document.getElementById('paypalDrop').selectedIndex=resultsArray[29];
				 		document.getElementById("picture").checked =(resultsArray[30] == ' true');
				 		document.getElementById("pictureSer").checked =(resultsArray[31] == ' true');
				 		document.getElementById('powerSeller').selectedIndex=resultsArray[32];
				 		document.getElementById('RE').selectedIndex=resultsArray[33];
				 		document.getElementById("reservePrice").checked =(resultsArray[34] == ' true');
				 		document.getElementById('rPrice').value=resultsArray[35];
				 		document.getElementById('saleDate').value=resultsArray[36];
				 		document.getElementById('salePrice').value=resultsArray[37];
				 		document.getElementById("scheduleListings").checked =(resultsArray[38] == ' true');
				 		document.getElementById('bus').selectedIndex=resultsArray[39];
				 		document.getElementById('camera').selectedIndex=resultsArray[40];
				 		document.getElementById('computer').selectedIndex=resultsArray[41];
				 		document.getElementById("subtitle").checked =(resultsArray[42] == ' true');
				 		document.getElementById('vGames').selectedIndex=resultsArray[43];
				 		document.getElementById("valuePack").checked =(resultsArray[46] == ' true');
				 		calculate()
				 		},
				 	data: {
					 		item_id: x,
					 	},
					 });
			
			console.log($('#itemUpdate').val());
	 		
			
			}
	 	
	 
	 	
		 	
	 		

	 	
	 	

 				
 						
