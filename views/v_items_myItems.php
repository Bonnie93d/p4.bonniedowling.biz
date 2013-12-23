<!--Users Saved Items____________________-->

<h1>Saved Items</h1>
<table class='table1'>
  <tr>
    <td cclass="TableHeader">Item Name</td>
    <td cclass="TableHeader">List Date</td>
    <td cclass="TableHeader">Date of Sale</td>
    <td cclass="TableHeader">Item Cost</td>
    <td cclass="TableHeader">Actual S&amp;H</td>
    <td cclass="TableHeader">Sale Price</td>
    <td cclass="TableHeader">S&amp;H Charged</td>
    <td cclass="TableHeader">Total Fees</td>
    <td cclass="TableHeader">Net Profit</td>
  </tr>
  <? foreach ($users as $user): ?>
  <tr>
    <td class="itemsBack20"><?=$user['itemName']?></td>
    <td class="itemsBack20"><?=$user['listDate']?></td>
    <td class="itemsBack20"><?=$user['saleDate']?></td>
    <td class="itemsBack20"><?=$user['itemCost']?></td>
    <td class="itemsBack20"><?=$user['actualSH']?></td>
    <td class="itemsBack20"><?=$user['salePrice']?></td>
    <td class="itemsBack20"><?=$user['chargedSH']?></td>
    <td class="itemsBack20"><?=$user['totalFees']?></td>
    <td class="itemsBack20"><?=$user['netProfit']?></td>
    <td class="itemsBack20"><FORM method="LINK"  action="/items/deletePost/<?php echo $user['item_id'].'/'?>'">
        <INPUT TYPE="submit" VALUE="Delete Item">
      </FORM></td>
    <td class="itemsBack20"><FORM method="LINK"  action="/items/editItem/item_id=<?=$user['item_id']?>'">
        <INPUT TYPE="submit" VALUE="Edit Item">
      </FORM></td>
  </tr>
  <? endforeach; ?>
</table>
