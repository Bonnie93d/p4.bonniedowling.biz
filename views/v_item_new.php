<div class="container">
  <div class="header"></div>
  <div class="sidebar1">
    <table class='table1'>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td  class='TotalHeader'><strong>eBay Fees</strong></td>
      </tr>
      <tr>
        <td class='total'>Insertion Fee:<br>
          $<span id='outInsert'></span></td>
      </tr>
      <tr>
        <td class='total'>Upgrade Fees:<br>
          $<span id='outUpgrades'></span></td>
      </tr>
      <tr>
        <td class='total'>Final Sale Fee:<br>
          $<span id='outFinal'></span></td>
      </tr>
      <tr>
        <td class='totalCalc'>$<span id='outTotal'></span><br></td>
      </tr>
      <tr>
        <td class='TotalHeader'><strong>Payment Fees</strong></td>
      </tr>
      <tr>
        <td class='totalPay'>$<span id='outPayment'></span><br>
          <br></td>
      </tr>
      <tr>
        <td class='TotalHeader'><strong>Sales Summary</strong></td>
      </tr>
      <tr>
        <td class='total'>Total Fees:</td>
      </tr>
      <tr>
        <td class='totalSum'>$<span id='outFees'></span></td>
      </tr>
      <tr>
        <td class='total'>Net Profit:</td>
      </tr>
      <tr>
        <td class='totalSum'>$<span id='outProfit'></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <!-- end .sidebar1 --></div>
  <div class="content">

    <table class='table1'>
      <tr>
        <td colspan="4" class="TableHeader">Item Information</td>
      </tr>
       <tr>
        <td colspan="4" class="itemsBack20">Item Name*: <span class="itemsBack">
            <input type='text' class="roundboxLarge" id='itemName'>
            </span></div></td>
      </tr>
      <tr>
        <td class="itemsBack20"><div class='aRight'>List Date: </div></td>
        <td  class="itemsBack20"><div class='aLeft'> <span class="listDate">
            <input type='text' onclick='dispCal()' class="roundbox" id='listDate' readonly="true"> 	
            
                   
            </span></div></td>
        <td colspan="1" class="itemsBack20"><div class='aRight'><span class="itemsBack">Date of Sale:</span></div></td>
        <td class="itemsBack20"><div class='aLeft'> <span class="itemsBack">
            <input type='text' onclick='dispCal()' class="roundbox" id='saleDate' readonly="true"></div>
            </span></div></td>
      </tr>
      
      <tr>
        <td colspan="4" class="itemsBack20"><table class='calendar' id='calendar' border=0 cellpadding=0 cellspacing=0>
           <tr class='monthdisp'>
               <td class='navigate' align='left'><img src='..//libraries/site_images/previous.png' onclick='return prev()' /></td>
               <td align='center' id='month'></td>
               <td class='navigate' align='right'><img src='..//libraries/site_images/next.png' onclick='return next()' /></td>
               </tr>
            <tr>
                <td colspan=3>
                    <table id='dispDays' border=0 cellpadding=4 cellspacing=4>                        
                    </table>                    
                </td>
            </tr>
        </table>

	        
        </td>
      </tr>
      <tr>
        <td class="itemsBack20"><div class='aRight'>Item Cost*: </div></td>
        <td  class="itemsBack20"><div class='aLeft'> <span class="itemsBack">
            <input type='text' class="roundbox" id='itemCost'>
            </span></div></td>
        <td colspan="1" class="itemsBack20"><div class='aRight'><span class="itemsBack">Item's Final Sale Price:</span></div></td>
        <td class="itemsBack20"><div class='aLeft'> <span class="itemsBack">
            <input type='text' id='salePrice' class="roundbox">
            </span></div></td>
      </tr>
      <tr>
        <td class="itemsBack20"><div class='aRight'>Actual S&amp;H:</div></td>
        <td class="itemsBack20"><div class='aLeft'>
            <input type='text' id='actualSH' class="roundbox">
          </div></td>
        <td colspan="1" class="itemsBack20"><div class='aRight'>S&amp;H Charged*:</div></td>
        <td class="itemsBack20"><div class='aLeft'>
            <input type='text' id='chargedSH' class="roundbox">
          </div></td>
      </tr>
    </table>
    <table class='table1'>
      <tr>
        <td colspan="2" class="TableHeader">eBay Listing Information</td>
      </tr>
      <tr>
        <td class="itemsBack">Are you a Power Seller?
          <select id='powerSeller'>
            <option value='0'> </option>
            <option value='1'>No</option>
            <option value='2'>Yes</option>
          </select></td>
        <td class="itemsBack">Listing Format:
          <select id='format'>
            <option value='1'>Auction</option>
            <option value='2'>Fixed (Buy it Now)</option>
            <option value='3'>Store</option>
          </select></td>
      </tr>
      <tr>
        <td class="itemsBack">Category*:
          <select id='category'>
            <option value='0'> </option>
            <option value='1'>Antiques</option>
            <option value='2'>Art</option>
            <option value='3'>Baby</option>
            <option value='4'>Books</option>
            <option value='5'>Business & Industrial</option>
            <option value='6'>Cameras & Photo</option>
            <option value='7'>Cell Phones & Accessories</option>
            <option value='8'>Clothing, Shoes & Accessories</option>
            <option value='9'>Coins & Paper Money</option>
            <option value='10'>Collectibles</option>
            <option value='11'>Computers/Tablets & Networking</option>
            <option value='12'>Consumer Electronics</option>
            <option value='13'>Crafts</option>
            <option value='14'>Dolls & Bears</option>
            <option value='15'>DVDs & Movies</option>
            <option value='16'>eBay Motors</option>
            <option value='17'>Entertainment Memorabilia</option>
            <option value='18'>Gift Cards & Coupons</option>
            <option value='19'>Health & Beauty</option>
            <option value='20'>Home & Garden</option>
            <option value='21'>Jewelry & Watches</option>
            <option value='22'>Music</option>
            <option value='23'>Musical Instruments & Gear</option>
            <option value='24'>Pet Supplies</option>
            <option value='25'>Pottery & Glass</option>
            <option value='26'>Real Estate</option>
            <option value='27'>Specialty Services</option>
            <option value='28'>Sporting Goods</option>
            <option value='29'>Sports Mem, Cards & Fan Shop</option>
            <option value='30'>Stamps</option>
            <option value='31'>Tickets & Experiences</option>
            <option value='32'>Toys & Hobbies</option>
            <option value='33'>Travel</option>
            <option value='34'>Video Games & Consoles</option>
            <option value='35'>Everything Else</option>
          </select></td>
        <td class="itemsBack"><form id=bus1>
            Subcategory:
            <select id='bus'>
              <option value='0'> </option>
              <option value='1'>Heavy Equipment</option>
              <option value='2'>Restaurant & Catering - Concession Trailers & Carts </option>
              <option value='3'>Healthcare, Lab & Life Science - Imaging & Aesthetics Equipment</option>
              <option value='4'>Printing & Graphic Arts - Commercial Printing Presses</option>
              <option value='5' id='busOther'>Other Subcategory</option>
            </select>
          </form>
          <form id='camera1'>
            Subcategory:
            <select id='camera'>
              <option value='0'> </option>
              <option value='6'> Binoculars & Telescopes</option>
              <option value='6'> Camcorders</option>
              <option value='9'> Camera & Photo Accessories</option>
              <option value='6'> Digital Cameras</option>
              <option value='6'> Digital Photo Frames</option>
              <option value='6'> Film Photography</option>
              <option value='6'> Flashes & Flash Accessories</option>
              <option value='6'> Lenses & Filters</option>
              <option value='6'> Lighting & Studio</option>
              <option value='6'> Manuals & Guides</option>
              <option value='9'> Other</option>
              <option value='9'> Replacement Parts & Tools</option>
              <option value='9'> Tripods & Supports</option>
              <option value='6'> Video Production & Editing</option>
              <option value='6'> Vintage Movie & Photography</option>
              <option value='6'> Wholesale Lots</option>
            </select>
          </form>
          <form id='computer1'>
            Subcategory:
            <select id='computer'>
              <option value='0'> </option>
              <option value='9'> Cables & Connectors</option>
              <option value='6'> Computer Components & Parts</option>
              <option value='4'> Desktops & All-In-Ones</option>
              <option value='6'> Drives, Storage & Blank Media</option>
              <option value='6'> Enterprise Networking, Servers</option>
              <option value='6'> Home Networking & Connectivity</option>
              <option value='9'> iPad/Tablet/eBook Accessories</option>
              <option value='4'> iPads, Tablets & eBook Readers</option>
              <option value='9'> Keyboards, Mice & Pointing</option>
              <option value='9'> Laptop & Desktop Accessories</option>
              <option value='4'> Laptops & Netbooks</option>
              <option value='6'> Manuals & Resources</option>
              <option value='6'> Monitors, Projectors & Accs </option>
              <option value='9'> Other</option>
              <option value='9'> Power Protection, Distribution</option>
              <option value='4'> Printers, Scanners & Supplies</option>
              <option value='6'> Software</option>
              <option value='6'> Vintage Computing</option>
              <option value='6'> Wholesale Lots</option>
            </select>
          </form>
          <form id='motors1'>
            Subcategory:
            <select id='motors'>
              <option value='0'> </option>
              <option value='1'> Cars & Trucks, RVs & Campers, and Commercial Trucks</option>
              <option value='2'> Motorcycles, Powersports, Trailers and Boats</option>
              <option value='3'> Powersports under 50cc</option>
              <option value='4'> Other Subcategory</option>
            </select>
            <br>
            Type of Seller:
            <select id='motorsSeller'>
              <option value='0'> </option>
              <option value='1'>Low-Volume Seller</option>
              <option value='2'>High-Volume Seller</option>
            </select>
          </form>
          <form id='RE1'>
            Subcategory:
            <select id='RE'>
              <option value='0'> </option>
              <option value='1'> Timeshare, Land and Manufactured Homes</option>
              <option value='2'> Residential, Commercial and Other Real Estate</option>
            </select>
            <br>
            Listing Duration:
            <select id=duration>
              <option value='0'> </option>
              <option value ='7'>Less than 7 days</option>
              <option value ='10'>10 days</option>
              <option value ='30'>30 days</option>
            </select>
          </form>
          <form id='vGames1'>
            Subcategory:
            <select id='vGames'>
              <option value='0'> </option>
              <option value='9'> Other</option>
              <option value='6'> Prepaid Gaming Cards </option>
              <option value='9'> Replacement Parts & Tools</option>
              <option value='6'> Strategy Guides & Cheats</option>
              <option value='9'> Video Game Accessories</option>
              <option value='4'> Video Game Consoles</option>
              <option value='9'> Video Games</option>
              <option value='6'> Video Gaming Merchandise</option>
              <option value='6'> Wholesale Lots</option>
            </select>
          </form></td>
      </tr>
    </table>
    <table class='table1'>
      <tr>
        <td colspan="2" class='itemsBack'><strong>Listing Options</strong></td>
      </tr>
      <tr>
        <td class='itemsBack'><blockquote>
            <p><span id='gallery1'>
              <input type='checkbox' id='gallery'>
              Gallery</span> <span id='listingDesigner1'><br>
              <input type='checkbox' id='listingDesigner'>
              Listing Designer</span> <span id='subtitle1'><br>
              <input type='checkbox' id='subtitle'>
              Subtitle</span> <span id='valuePack1'><br>
              <input type='checkbox' id='valuePack'>
              Value Pack</span> <span id='free1'>
              <input type='checkbox' id='free'>
              Free Listing</span> <span id='picture1'>
              <input type='checkbox' id='picture'>
              Picture Pack</span><span id='pictureSer1'>
              <input type='checkbox' id='pictureSer'>
              Picture Services<br>
              <span id='numPic1'># of Pictures (first 4 are free)
              <input type='text' id='numPic'>
              </span></span></p>
          </blockquote></td>
        <td class='itemsBack'><span id='bold1'>
          <input type='checkbox' id='bold'>
          Bold</span> <span id='scheduleListings1'><br>
          <input type='checkbox' id='scheduleListings'>
          Schedule Listings</span> <span id='reservePrice1'>
          <input type='checkbox' id='reservePrice'>
          Reserve Price <span id='rPrice1'>$
          <input type='text' id='rPrice'>
          </span></span> <span id='international1'>
          <input type='checkbox' id='international'>
          International Site Visibility</span> <span id='30day1'><br>
          <input type='checkbox' id='30day'>
          30 day </span><span id='day1'>
          <input type='checkbox' id='10day'>
          10 day <br>
          <input type='checkbox' id='21day'>
          21 day <br>
          </span></td>
      </tr>
    </table>
    <table class='table1'>
      <tr>
        <td class="TableHeader">Payment Details</td>
      </tr>
      <tr>
        <td class='itemsBack'><select id='paymentMethod'>
            <option value='0'> </option>
            <option value='1'>PayPal</option>
            <option value='2'>Custom</option>
            <option value='3'>Local Pickup (No payment services fees)</option>
          </select></td>
      </tr>
      <tr>
        <td class='itemsBack'><span id='paypal'> <br>
          PayPal Fee:
          <select id='paypalDrop'>
            <option value='0'> </option>
            <option value='1'>2.9% plus $0.30</option>
            <option value='2'>2.5% plus $0.30</option>
            <option value='3'>2.2% plus $0.30</option>
            <option value='4'>1.9% plus $0.30</option>
            <option value='5'>5% plus $0.05</option>
            <option value='6'>Custom</option>
          </select>
          <br>
          <input type='checkbox' id='paypalInt'>
          International Fee(1% increase) </span> <span id='custom'> <br>
          % of sale
          <input type='text' id='customPer' value = '0'>
          +
          <input type='text' id='customFlat' value = '0'>
          Flat Rate </span><br>
          <br>
          <br></td>
      </tr>
      <tr>
        <span id='add'><td colspan="2" class='itemsBack'><input type="submit" id='addBut' onclick='addBut()' value="ADD ITEM" class="large blue button" /></span></td>
      </tr>
    </table>
   
    <p>&nbsp;</p>
    <p>&nbsp;</p>

<input type='hidden' id='sel' onclick='dispCal()' size=10 readonly='readonly' />
	       