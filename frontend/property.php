<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Ruthless Real Estate</h2>

<?php include_once('../backend/menu.php'); ?>

<!-- PROPERTY PAGE -->    
<div id="Home" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>Property</h3>
    
    <!-- BUTTONS  -->
    <button type="button" onclick="">Submit</button>
    <button type="button" onclick="">Update</button> 
    <button type="button" onclick="">Delete</button> 
    <button type="button" onclick="">Return to list</button> 
    
    <!-- FORM TO ADD PROPERTY -->
    <form action="/action_page.php">
    Type <select>
  <option value="Apartment">Apartment</option>
  <option value="House">House</option>
  <option value="Unit">Unit</option>
  <option value="Townhouse">Townhouse</option>
        </select>
        <br>
    Street <input type="text" name="Street"> 
        <br>
    Suburb <input type="text" name="Suburb">
        <br>
    State <input type="text" name="State">
        <br>
    Postcode <input type="number" name="Postcode">
        <br>
    List Date <input type="date" name="List Date">
        <br>
    List Price <input type="number" name="List Price">
        <br>
    Sale Date <input type="date" name="Sale Date">
        <br>
    Sale Price <input type="number" name="Sale Price"> 
        <br>
    Description <input type="text" name="Description">
    </form>
       
<h3>Property Features</h3>    
 
    <!-- FORM TO ADD PROPERTY FEATURES -->
    <table>
  <tr>
    <th>Feature Name</th>
    <th>Feature Description</th>
    <th></th>
  </tr>
  
    <tr>
    <td>Helipad</td>
    <td><form>
        <input type="text" name="Helipad_Description">
        </form></td>
    <td><form action="">
<input type="checkbox" name="Helipad" value="Helipad_Checkbox">
</form></td>
  </tr>
    
    <tr>
    <td>Parking</td>
    <td><form>
        <input type="text" name="Parking_Description">
        </form></td>
    <td><form action="">
<input type="checkbox" name="Parking" value="Parking_Checkbox">
</form></td>
  </tr>
    
    <tr>
    <td>Sauna</td>
    <td><form>
        <input type="text" name="Sauna_Description">
        </form></td>
    <td><form action="">
<input type="checkbox" name="Sauna" value="Sauna_Checkbox">
</form></td>
  </tr>
    
    <tr>
    <td>Showroom</td>
    <td><form>
        <input type="text" name="Showroom_Description">
        </form></td>
    <td><form action="">
<input type="checkbox" name="Showroom" value="Showroom_Checkbox">
</form></td>
  </tr>
    
    <tr>
    <td>Swimming pool</td>
    <td><form>
        <input type="text" name="Pool_Description">
        </form></td>
    <td><form action="">
<input type="checkbox" name="Pool" value="Pool_Checkbox">
</form></td>
  </tr>
    
    <tr>
    <td>Tennis Court</td>
    <td><form>
        <input type="text" name="Tennis_Description">
        </form></td>
    <td><form action="">
<input type="checkbox" name="Tennis" value="Tennis_Checkbox">
</form></td>
  </tr>
    
    <tr>
    <td>Wine Cellar</td>
    <td><form>
        <input type="text" name="WIne_Description">
        </form></td>
    <td><form action="">
<input type="checkbox" name="Wine" value="Wine_Checkbox">
</form></td>
  </tr>
    </table>    
    
</div>
     
</body>
</html> 